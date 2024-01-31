<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class MapaController extends Controller{

    public function mapaRubros(Request $request)
    {	
        $this->getRubrosFile();
        return view('admin.mapas.rubros');
    }

    public function getRubros()
    {	
        $empresas = Empresa::select('razon_social', 'latitud', 'longitud', 'tipo_categoria.id as categoria_id', 'categoria')
            ->whereNotNull('latitud')->whereNotNull('longitud')
            ->leftJoin('tipo_categoria', 'tipo_categoria.id', '=', 'empresa.categoria1')
            ->orderBy('tipo_categoria.id')
            ->get();        

        return response()->json($empresas);
        
    }

    private function getRubrosFile()
    {	
        $empresas = Empresa::select('razon_social', 'latitud', 'longitud', 'tipo_categoria.id as categoria_id', 'categoria')
            ->whereNotNull('latitud')->whereNotNull('longitud')
            ->leftJoin('tipo_categoria', 'tipo_categoria.id', '=', 'empresa.categoria1')
            ->orderBy('tipo_categoria.id')
            ->get();

        $filename = "public/mapas/empresas.js";
        $handle = fopen($filename, 'w+');
        $contenido = "let empresas = " . $empresas . ";";
        fputs($handle, $contenido);
        fclose($handle);
    }

}

