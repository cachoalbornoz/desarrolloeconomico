<?php

namespace App\Http\Controllers;

use App\Models\AuditoriaSistema;
use Illuminate\Http\Request;

use App\User;
use App\Models\Expediente;
use App\Models\Proyecto;
use App\Models\ExpedienteUbicacion;
use App\Models\ExpedienteEstado;
use App\Models\CiudadAll;
use App\Models\Provincia;
use App\Models\ProyectoUser;
use App\Models\TipoRubro;
use Auth;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Yajra\DataTables\Facades\DataTables;

class ExpedienteController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $expediente    = expediente::where("estado", "!=", "99")->get();

            if ($expediente) {
                return Datatables::of($expediente)
                    ->addIndexColumn()
                    ->addColumn('id', function ($expediente) {
                        return '<a href= "' . route('expediente.edit', $expediente->id) . '">' . $expediente->id . '</a>';
                    })
                    ->addColumn('titular', function ($expediente) {
                        return ($expediente->titular) ? substr($expediente->Titular->NombreCompleto,0,20): null;
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
                        return ($expediente->rubro) ? substr($expediente->Rubro->rubro,0,20) : null;
                        ;
                    })
                    ->editColumn('ciudad', function ($expediente) {
                        return ($expediente->ciudad) ? substr($expediente->Ciudad->nombre,0,20) : null;
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

        $estados        = ['19', '20', '24'];
        $usuarios= DB::table('users')->where('habilitado', 1)
            ->selectRaw('id, CONCAT(apellido," ",nombre) as titular')
            ->orderBy('titular')->pluck('titular', 'id');

        $proyectos      =    DB::table('proyecto as p')
            ->whereIn('p.estado', $estados)
            ->leftJoin('users as u', 'p.titular', '=', 'u.id')
            ->selectRaw('p.id, CONCAT(u.apellido," ",u.nombre, " (", p.denominacion,")") as DenominacionCompleta')
            ->orderBy('DenominacionCompleta')
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

        ProyectoUser::create([
            'proyecto_id' => $expediente->proyecto,
            'user_id' => $expediente->titular,
        ]);

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
        $usuarios= DB::table('users')->where('habilitado', 1)
            ->selectRaw('id, CONCAT(apellido," ",nombre) as titular')
            ->orderBy('titular')->pluck('titular', 'id');

        //$proyectos      = Proyecto::where('estado', 24)->get()->pluck('DenominacionCompleta', 'id');
        $estados        = ['19', '20', '24'];
        $proyectos      =    DB::table('proyecto as p')
            ->whereIn('p.estado', $estados)
            ->leftJoin('users as u', 'p.titular', '=', 'u.id')
            ->selectRaw('p.id, CONCAT(u.apellido," ",u.nombre, " (", p.denominacion,")") as DenominacionCompleta')
            ->orderBy('DenominacionCompleta')
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
        Expediente::find($request->id)->update(['estado' => 99]);
        AuditoriaSistema::create([
            'codigo' => '4',                    // Elimina
            'tabla' => 'EXPEDIENTE',            // Tabla donde elimina registros
            'usuario' => Auth::user()->id
        ]);

        return response()->json();
    }
}
