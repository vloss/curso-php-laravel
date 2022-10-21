<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;  

class EventoController extends Controller
{
    public function index(){

        $listagem =  Evento::all();

        return view('welcome', ['listagem' => $listagem]);
    }

    public function create(){
        return view('eventos.create');
    }
}
