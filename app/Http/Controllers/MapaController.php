<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class MapaController extends Controller{

    public function mapaRubros(Request $request)
    {	
        $this->getRubros();
        return view('admin.mapas.rubros');
    }

    private function getRubros()
    {	
        $empresas = Empresa::select('razon_social', 'latitud', 'longitud')->whereNotNull('latitud')->whereNotNull('longitud')->get();
        $filename = "public/mapas/rubros.json";
        $handle = fopen($filename, 'w+');
        fputs($handle, $empresas->toJson(JSON_PRETTY_PRINT));
        fclose($handle);
    }

}

