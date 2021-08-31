<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaEmpleoUpdateRequest;

use App\Models\EmpresaEmpleo;
use App\Models\DocumentacionEmpleo;
use App\Models\CiudadAll;
use App\Models\Provincia;
use App\Models\TipoCategoria;
use App\Models\TipoInteres;
use App\Models\TipoPyme;
use App\Models\TipoResponsabilidad;
use App\Models\TipoSociedad;
use App\User;
use Auth;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class EmpresaEmpleoController extends Controller
{

    // Listado de empresa pensado en ADMINISTRADORES
    public function indexAdmin(Request $request)
    {

        if ($request->ajax()) {

            $empresa = EmpresaEmpleo::all();

            if ($empresa) {

                return Datatables::of($empresa)
                    ->addIndexColumn()
                    ->editColumn('id', function ($empresa) {
                        return '<a href= "' . route('empresaEmpleo.edit', $empresa->id) . '"><i class="fas fa-pencil-alt"></i></a>';
                    })
                    ->editColumn('razon_social', function ($empresa) {

                        return (isset($empresa->razon_social)) ? $empresa->razon_social : null;
                    })
                    ->addColumn('titular', function ($empresa) {

                        return (isset($empresa->titular)) ? $empresa->Titular->NombreCompleto : null;
                    })    
                    ->addColumn('estado', function ($empresa) {

                        return ($empresa->estado == 24) ? '<i class="fas fa-check text-success"></i> Datos enviados' : '<i class="fas fa-hourglass-half text-danger"></i> cargando ';
                    })
                    ->addColumn('documentacion', function ($empresa) {

                        return '<a href= "' . route('documentacione.edit', $empresa->id) . '">Documentación</a>';                         
                    })
                    ->addColumn('categoria', function ($empresa) {

                        return ($empresa->categoria1) ? $empresa->Categoria1->categoria : null;
                    })
                    ->editColumn('ciudad', function ($empresa) {

                        return ($empresa->ciudad) ? $empresa->Ciudad->nombre : null;
                    })      
                    ->addColumn('habilitar', function ($empresa) {
                        return '<a href="javascript:void(0)" title="Permite empresa modificar sus datos"><i class="fas fa-exclamation text-warning habilitar" id="' . $empresa['id'] . '"></i></a>';
                    })
                    ->addColumn('borrar', function ($empresa) {

                        return '<a href="javascript:void(0)" title="Elimina empresa"><i class="fas fa-trash text-danger borrar" id="' . $empresa['id'] . '"></i></a>';
                    })                    
                    ->rawColumns(['id', 'razon_social', 'titular', 'estado', 'documentacion', 'categoria', 'ciudad', 'habilitar', 'borrar'])
                    ->make(true);
            } else {

                return Datatables::of($empresa)
                    ->addIndexColumn()
                    ->make(true);
            }
        }

        return view('admin.empresasEmpleo.indexAdmin');
    }

    public function vincular(Request $request)
    {
        $usuario = Auth::user();
        $empresas = EmpresaEmpleo::where('titular', $usuario->id)->get();

        return view('admin.empresasEmpleo.vincularEmpresa', \compact('usuario', 'empresas'));
    }

    public function createAsociar(Request $request)
    {
        $empresa = EmpresaEmpleo::create([
            'razon_social' => 'Nueva empresa ',
            'titular' => $request->usuario,
        ]);

        DocumentacionEmpleo::create(['empresa' => $empresa->id]);

        return redirect()->route('empresaEmpleo.edit', $empresa->id);
    }

    public function edit($empresa)
    {
        $empresa = EmpresaEmpleo::find($empresa);

        $usuario = (Auth::user()->hasRole(['user']))
        ? User::where('id', '=', Auth::user()->id)->get()->pluck('nombrecompleto', 'id')
        : User::orderBy('apellido')->get()->pluck('NombreCompleto', 'id');

        $sociedad = TipoSociedad::all()->sortBy('sociedad')->pluck('sociedad', 'id');
        $responsabilidad = TipoResponsabilidad::all()->sortBy('responsabilidad')->pluck('responsabilidad', 'id');

        $ciudad = CiudadAll::all()->sortBy('nombre')->pluck('nombre', 'id');
        $provincia = Provincia::all()->sortBy('nombre')->pluck('nombre', 'id');
        $idprovincia = isset($empresa->Ciudad) ? $empresa->Ciudad->Departamento->provincia : 7;

        $tipopyme = TipoPyme::all()->sortBy('id')->pluck('pyme', 'id');
        $categoria = TipoCategoria::where('id', '=', 7)->get()->pluck('categoria', 'id');

        return view('admin.empresasEmpleo.edit', \compact('empresa', 'usuario', 'sociedad', 'responsabilidad', 'ciudad', 'provincia', 'idprovincia', 'tipopyme', 'categoria'));
    }

    public function update(EmpresaEmpleoUpdateRequest $request, $id)
    {
        $empresa = EmpresaEmpleo::find($id);
        $empresa->fill($request->all());
        isset($request->activo) ? $empresa->activo = 1 : $empresa->activo = 0;
        $empresa->save();

        if (Auth::user()->hasRole(['user'])) {
            return redirect()->route('empresa.vincular');
        }else{
            return redirect()->route('empresaEmpleo.indexAdmin');
        }
    }

    public function habilitar(Request $request)
    {
        $empresa = EmpresaEmpleo::find($request->id);
        $empresa->estado = 20;
        $empresa->save();

        $documentacion = DocumentacionEmpleo::where('empresa', '=', $request->id)->first();
        $documentacion->estado = 20;
        $documentacion->save();

        return response()->json();
    }

    public function enviar(Request $request)
    {
        $empresa = EmpresaEmpleo::find($request->id);
        $empresa->enviado();

        $documentacion = DocumentacionEmpleo::where('empresa', '=', $request->id)->first();
        $documentacion->estado = 24;
        $documentacion->save();

        /////////////////////////////////////////////////////////////////////////////////////
        $titular = User::find($empresa->titular);
        $destinatario = $titular->nombre . ' ' . $titular->apellido;
        $email = $titular->email;
        $denominacion = $empresa->razon_social;
        $data = array('destinatario' => $destinatario, 'denominacion' => $denominacion);
        $mensaje = 'Su documentacion se ha enviado correctamente !';   

        Mail::send('email.envioproyecto', $data, function ($message) use ($destinatario, $email) {
            $message->to($email, $destinatario)->subject('Envío de documentacion');
        });     
        /////////////////////////////////////////////////////////////////////////////////////
        
        $usuario = User::find($request->usuario);
        $empresas = EmpresaEmpleo::where('titular', $usuario->id)->get();

        $view = view('admin.empresasEmpleo.detalleEmpresa', compact('empresas'))->render();

        return new JsonResponse([
            'view'  => $view,
            'message'  => '<b>Datos enviados</b>',
            'type' =>  'error'
        ]);

    }

    public function desvinculaEmpresa(Request $request)
    {
        // Eliminar
        DocumentacionEmpleo::where('empresa', '=', $request->id)->delete();        
        EmpresaEmpleo::find($request->id)->delete();

        // Obtener empresas
        $usuario = User::find($request->usuario);
        $empresas = EmpresaEmpleo::where('titular', $usuario->id)->get();

        $view = view('admin.empresasEmpleo.detalleEmpresa', compact('empresas'))->render();

        return response()->json($view);
    }

    public function destroy(Request $request)
    {

        $empresa = EmpresaEmpleo::find($request->id);
        $empresa->delete();

        return response()->json();
    }
}
