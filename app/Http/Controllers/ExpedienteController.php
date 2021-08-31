<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User,
    App\Models\Expediente,
    App\Models\Proyecto,
    App\Models\ExpedienteUbicacion,
    App\Models\ExpedienteEstado,
    App\Models\CiudadAll,
    App\Models\Provincia,
    App\Models\TipoRubro;

use DB;

use Yajra\DataTables\Facades\DataTables;

class ExpedienteController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {

            $expediente    = expediente::all();

            if ($expediente) {

                return Datatables::of($expediente)
                    ->addIndexColumn()
                    ->addColumn('id', function ($expediente) {

                        return '<a href= "' . route('expediente.edit', $expediente->id) . '">' . $expediente->id . '</a>';
                    })
                    ->addColumn('titular', function ($expediente) {

                        return $expediente->Titular->NombreCompleto;
                    })
                    ->addColumn('dni', function ($expediente) {

                        return ($expediente->Titular->dni);
                    })
                    ->addColumn('icono', function ($expediente) {
                        return (isset($expediente->estado)) ? $expediente->Estado->icono : null;
                    })
                    ->addColumn('estado', function ($expediente) {
                        return (isset($expediente->estado)) ? $expediente->Estado->estado : null;
                    })
                    ->editColumn('ano', function ($expediente) {
                        $date = date("Y", strtotime($expediente->fecha_otorgamiento));
                        return $date;
                    })
                    ->editColumn('rubro', function ($expediente) {
                        return ($expediente->rubro) ? $expediente->Rubro->rubro : null;;
                    })
                    ->editColumn('ciudad', function ($expediente) {

                        return ($expediente->ciudad) ? $expediente->Ciudad->nombre : null;
                    })
                    ->addColumn('borrar', function ($expediente) {

                        return '<a href="javascript:void(0)" title="Elimina expediente"><i class="fas fa-trash text-danger borrar" id="' . $expediente['id'] . '"></i></a>';
                    })

                    ->rawColumns(['id', 'titular', 'icono', 'estado', 'fecha_otorgamiento', 'rubro', 'ciudad', 'borrar'])
                    ->make(true);
            } else {

                return Datatables::of($expediente)
                    ->addIndexColumn()
                    ->make(true);
            }
        }

        return view('admin.expediente.index');
    }

    public function create()
    {
        $expediente     = null;
        $idprovincia    = null;

        $estados        = ['24'];
        $usuarios       = User::whereHas('proyectos', static function ($query) use ($estados) {
            return $query->where('estado', '=', $estados);
        })->orderBy('apellido')->get()->pluck('nombrecompleto', 'id');

        //$proyectos      = Proyecto::where('estado', 24)->get()->pluck('DenominacionCompleta', 'id');

        $proyectos      =    DB::table('proyecto as p')
            ->where('p.estado', '=', 24)
            ->join('users as u', 'p.titular', '=', 'u.id')
            ->orderBy('u.apellido', 'ASC')
            ->selectRaw('p.id, CONCAT(u.apellido," ",u.nombre, " (", p.denominacion,")") as DenominacionCompleta')
            ->get()
            ->pluck('DenominacionCompleta', 'id');

        $ciudad         = CiudadAll::all()->sortBy('nombre')->pluck('nombre', 'id');
        $provincia      = Provincia::all()->sortBy('nombre')->pluck('nombre', 'id');
        $rubro          = TipoRubro::orderBy('rubro')->pluck('rubro', 'id');

        return view('admin.expediente.CrearEditar', \compact('ciudad', 'provincia', 'idprovincia', 'rubro', 'expediente', 'usuarios', 'proyectos'));
    }

    public function store(Request $request)
    {
        $expediente = Expediente::create($request->all());

        $expediente->saldo = $request->monto;

        $expediente->save();

        ExpedienteUbicacion::create([
            'expediente'    => $expediente->id,
            'ubicacion'     => 1,
            'fecha'         => $request->fecha_otorgamiento,
            'observacion'   => 'INICIO TRAMITE',
        ]);

        ExpedienteEstado::create([
            'expediente'    => $expediente->id,
            'estado'        => 1,
            'estadoAnt'     => 1,
            'fecha'         => $request->fecha_otorgamiento
        ]);

        $notification = array(
            'message' => 'Expediente creado !',
            'alert-type' => 'success'
        );

        return redirect()->route('expediente.edit', $expediente->id)->with($notification);
    }

    public function edit($id)
    {
        $expediente     = Expediente::find($id);

        $estados        = ['24'];
        $usuarios       = User::whereHas('proyectos', static function ($query) use ($estados) {
            return $query->where('estado', '=', $estados);
        })->orderBy('apellido')->get()->pluck('nombrecompleto', 'id');

        //$proyectos      = Proyecto::where('estado', 24)->get()->pluck('DenominacionCompleta', 'id');

        $proyectos      =    DB::table('proyecto as p')
            ->where('p.estado', '=', 24)
            ->join('users as u', 'p.titular', '=', 'u.id')
            ->orderBy('u.apellido', 'ASC')
            ->selectRaw('p.id, CONCAT(u.apellido," ",u.nombre, " (", p.denominacion,")") as DenominacionCompleta')
            ->get()
            ->pluck('DenominacionCompleta', 'id');

        $ciudad         = CiudadAll::all()->sortBy('nombre')->pluck('nombre', 'id');
        $provincia      = Provincia::all()->sortBy('nombre')->pluck('nombre', 'id');
        $idprovincia    = isset($expediente->Ciudad) ? $expediente->Ciudad->Departamento->provincia : 7;
        $rubro          = TipoRubro::orderBy('rubro')->pluck('rubro', 'id');

        return view('admin.expediente.CrearEditar', \compact('ciudad', 'idprovincia', 'provincia', 'rubro', 'usuarios', 'expediente', 'proyectos'));
    }

    public function update(Request $request, $id)
    {
        $expediente = Expediente::find($id);
        $expediente->update($request->all());

        //$expediente->users()->sync($request->user);

        $notification = array(
            'message' => 'Expediente actualizado !',
            'alert-type' => 'success'
        );
        return redirect()->route('expediente.edit', $expediente->id)->with($notification);
    }

    public function destroy(Request $request)
    {

        $expediente = Expediente::find($request->id);
        $expediente->delete();

        return response()->json();
    }
}