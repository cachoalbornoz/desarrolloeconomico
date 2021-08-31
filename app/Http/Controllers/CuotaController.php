<?php

namespace App\Http\Controllers;

use App\User,
    App\Models\Expediente,
    App\Models\ExpedienteCuota;

use Illuminate\Http\Request;

use Carbon,
    Yajra\DataTables\Facades\DataTables;

class CuotaController extends Controller
{

    public function index(Request $request)
    {
        $expediente = Expediente::find($request->id);
        $cuotas     = ExpedienteCuota::where('expediente', $request->id)->orderBy('fechaVcto', 'asc')->get();

        return view('admin.cuota.index', compact('expediente', 'cuotas'));
    }

    public function create($id)
    {
    }

    public function store(Request $request)
    {
        if ($request->cuotas == 1) {

            $expedienteCuota = ExpedienteCuota::create($request->all());
        } else if ($request->cuotas == 18) {

            $fechaOtorgamiento  = $request->fecha;

            $deuda              = $request->monto;
            $importe            = $request->monto / $request->cuotas;

            $fecha = date('Y-m-d', strtotime("$request->fecha + " . 6 . " months"));
            $fecha = date('Y-m-d', strtotime("$fecha + " . 1 . " months"));
            $fecha = explode('-', $fecha);

            $mes = $fecha[1];
            $año = $fecha[0];

            $fecha = $mes . "/" . "10" . "/" . $año;

            $fecha = date('Y-m-d', strtotime($fecha));

            ExpedienteCuota::create([

                'expediente' => $request->expediente,
                'nroCuota'  => 1,
                'fechaVcto' => $fecha,
                'monto'     => $importe,
            ]);

            if ($mes == 12) {
                $mes = 0;
                $año++;
            }
            $mes++;

            for ($i = 2; $i <= $request->cuotas; $i++) {

                $fecha = date('Y-m-d', strtotime("$fecha + " . 1 . " months"));
                $fecha = date("Y-m-d", strtotime($fecha));

                ExpedienteCuota::create([

                    'expediente' => $request->expediente,
                    'nroCuota'  => $i,
                    'fechaVcto' => $fecha,
                    'monto'     => $importe,
                ]);
            }
        }

        $cuotas     = ExpedienteCuota::where('expediente', $request->expediente)->orderBy('fechaVcto', 'asc')->get();

        $view       = view('admin.cuota.detalle', compact('cuotas'))->render();

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
        ExpedienteCuota::findOrFail($request->id)->delete();

        $cuotas     = ExpedienteCuota::where('expediente', $request->expediente)->orderBy('fechaVcto', 'asc')->get();

        $view   = view('admin.cuota.detalle', compact('cuotas'))->render();

        return response()->json($view);
    }

    public function borrarPlan(Request $request)
    {
        ExpedienteCuota::where('expediente', $request->expediente)->delete();
        $cuotas     = ExpedienteCuota::where('expediente', $request->expediente)->orderBy('fechaVcto', 'asc')->get();

        $view   = view('admin.cuota.detalle', compact('cuotas'))->render();

        return response()->json($view);
    }
}