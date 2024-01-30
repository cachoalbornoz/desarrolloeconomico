<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MapaController extends Controller{

    public function mapaRubros(Request $request)
    {	
        return view('admin.mapas.rubros');
    }

    public function getRubros(Request $request)
    {	
        $empresas = Empresa::select('razon_social', 'latitud', 'longitud')->whereNotNull('latitud')->whereNotNull('longitud')->get();
        Storage::disk('local')->put('mapas/rubros.json', response()->json($empresas));
    }

}

