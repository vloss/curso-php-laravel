<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Teste;

class TesteController extends Controller
{
    public function index(){

        $resultado = Teste::all();

        $data['titulo'] = "Oi";

        $data['resultado'] = $resultado;

        return view('teste/index', $data);
    }
    //
}
