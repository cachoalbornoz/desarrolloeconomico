<?php

namespace App\Http\Controllers;

use App\User,
    App\Models\Expediente,
    App\Models\TipoPago,
    App\Models\ExpedienteEstado,
    App\Models\ExpedienteCuota,
    App\Models\ExpedientePago;

use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

class PagoController extends Controller
{

    public function index(Request $request)
    {
        $expediente = Expediente::find($request->id);
        $pagos      = ExpedientePago::where('expediente', $request->id)->orderBy('fecha', 'desc')->get();
        $tipopago   = TipoPago::orderBy('pago')->pluck('pago', 'id');

        return view('admin.pago.index', compact('expediente', 'pagos', 'tipopago'));
    }

    public function create($id)
    {
    }

    public function store(Request $request)
    {
        // Registro el pago
        $pago           = ExpedientePago::create($request->all());

        // Obtengo todos los pagos realizados
        $pagos          = ExpedientePago::where('expediente', $request->expediente)->orderBy('fecha', 'desc')->get();

        // Obtiene si tiene Entrega Parcial
        $entregaParcial = ExpedienteCuota::where('expediente', $request->expediente)->where('estado', 0)->orderBy('nroCuota', 'asc')->limit(1)->sum('entregaParcial');

        // Calcula el total pagado
        $total_cobrado  =  $pagos->sum('monto') + $entregaParcial;

        // Recorre las cuotas del plan de pago y asigna sin están pagadas completamente o ' pago parcial '
        $cuotas         = ExpedienteCuota::where('expediente', $request->expediente)->where('estado', 0)->orderBy('nroCuota', 'asc')->get();

        foreach ($cuotas as $cuota) {

            if ($total_cobrado >= $cuota->monto) {

                $cuota->pago    = $pago->id;
                $cuota->estado  = 1;
                $cuota->entregaParcial = 0;
                $cuota->save();
            } else {

                if ($total_cobrado > 0) {

                    $cuota->estado  = 0;
                    $cuota->entregaParcial = $total_cobrado;
                    $cuota->save();
                }

                break;
            }

            $total_cobrado = $total_cobrado - $cuota->monto;
        }


        // // Reviso el pago total e informo 
        $expediente = Expediente::find($request->expediente);

        if (($expediente->monto - $pagos->sum('monto') > 0)) {

            $expediente->saldo = $expediente->monto - $pagos->sum('monto');
            $expediente->save();
        } else {

            $expediente->estado = 3;
            $expediente->saldo  = 0;
            $expediente->save();

            // Obtengo el estado que tenia 
            $estado = ExpedienteEstado::where('expediente', $request->expediente)->orderBy('fecha', 'desc')->limit(1);

            $estadoAnt = ($estado->estadoAnt) ? $estado->estadoAnt : 1;

            ExpedienteEstado::create([

                'expediente' => $request->expediente,
                'estado'    => 3,
                'estadoAnt' => $estadoAnt,
                'fecha'     => $request->fecha,
            ]);
        }

        $view       = view('admin.pago.detalle', compact('expediente', 'pagos'))->render();

        return response()->json($view);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy(Request $request)
    {
        ExpedientePago::findOrFail($request->id)->delete();

        $expediente = Expediente::find($request->expediente);
        $pagos      = ExpedientePago::where('expediente', $request->expediente)->orderBy('fecha', 'desc')->get();

        $expediente->saldo = $expediente->monto - $pagos->sum('monto');
        $expediente->save();

        $view   = view('admin.pago.detalle', compact('expediente', 'pagos'))->render();

        return response()->json($view);
    }
}