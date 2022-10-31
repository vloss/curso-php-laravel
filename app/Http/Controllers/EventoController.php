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

    public function show($id){
        
        $item =  Evento::findOrFail($id);
        
        return view('eventos.show', ['item' => $item]);
    }

    public function store(Request $request){

        $evento = new Evento;

        $evento->no_evento      = $request->no_evento;
        $evento->no_cidade      = $request->no_cidade;
        $evento->desc_evento    = $request->desc_evento;
        $evento->fl_privado     = $request->fl_privado;
        $evento->array_itens    = $request->array_itens;


        // Valida IMG
        if ($request->hasFile('no_img_evento') && $request->file('no_img_evento')->isValid()) {
            
            $OBJ_IMG   = $request->no_img_evento;

            $extension = $OBJ_IMG->extension();
            $new_no_img_evento = md5($OBJ_IMG->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->no_img_evento->move(public_path('img/eventos'), $new_no_img_evento);

            $evento->no_img_evento = $new_no_img_evento;
        }

        $evento->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }
}
