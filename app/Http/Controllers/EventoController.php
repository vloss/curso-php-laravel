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

    public function store(Request $request){

        $evento = new Evento;

        $evento->no_evento      = $request->no_evento;
        $evento->no_cidade      = $request->no_cidade;
        $evento->desc_evento    = $request->desc_evento;
        $evento->fl_privado     = $request->fl_privado;

        $evento->save();

        return redirect('/');
    }
}
