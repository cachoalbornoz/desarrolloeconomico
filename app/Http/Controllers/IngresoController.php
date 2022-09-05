<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IngresoController extends Controller
{
    public function index()
    {
        return view('base.home');
    }

    public function getIngresosFuturos()
    {	
        
    }
}
