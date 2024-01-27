<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Models\Provincia,
    App\Models\CiudadAll,
    App\Models\Departamento;

use DB;

class MapaController extends Controller{

    public function mapaRubros(Request $request)
    {	
        return view('admin.mapas.rubros');
    }

}

