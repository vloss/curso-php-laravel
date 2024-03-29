<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;  
use App\Models\User;

class EventoController extends Controller
{
    public function index(){

        $busca = request('search');

        if($busca){
            $listagem =  Evento::where(
                [['no_evento', 'like', '%'.$busca.'%']]
            )->get();

        } else {
            $listagem =  Evento::all();
        }

        return view('welcome', ['listagem' => $listagem, 'busca' => $busca]);
    }

    public function create(){
        return view('eventos.create');
    }

    public function show($id){

        $user = auth()->user();
        
        $item =  Evento::findOrFail($id);

        $fl_ja_inscrito = false;

        if($user){
            $listagem_participacao = $user->eventosToParticipantes;

            foreach ($listagem_participacao as $key => $value) {
                if($id == $value->id){
                    $fl_ja_inscrito = true;
                }
            }
        }

        $proprietario = User::where('id', $item->user_id)->first()->toArray();
        
        return view('eventos.show', ['item' => $item, 'proprietario' => $proprietario, 'fl_ja_inscrito' => $fl_ja_inscrito]);
    }

    public function dashboard(){

        $user = auth()->user();

        $eventos = $user->eventos;

        $listagem_participacao = $user->eventosToParticipantes;
        
        return view('eventos.dashboard', ['listagem' => $eventos, 'eventos_participacao' => $listagem_participacao ]);
    }

    public function store(Request $request){

        $usuario_logado = auth()->user();

        $evento = new Evento;

        $evento->no_evento      = $request->no_evento;
        $evento->no_cidade      = $request->no_cidade;
        $evento->desc_evento    = $request->desc_evento;
        $evento->fl_privado     = $request->fl_privado;
        $evento->array_itens    = $request->array_itens;
        $evento->dt_evento      = $request->dt_evento;
        $evento->user_id        = $usuario_logado->id;


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

    public function destroy($id){

        Evento::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluido com sucesso!');
    }

    public function edit($id){

        $user = auth()->user();

        $dados = Evento::findOrFail($id);

        if ($user->id != $dados->user_id) {
            return redirect('/dashboard');
        }

        return view('eventos.editar', ['dados' => $dados]);
    }

    public function update(Request $request){

        $req_all = $request->all();

         // Valida IMG
         if ($request->hasFile('no_img_evento') && $request->file('no_img_evento')->isValid()) {
            
            $OBJ_IMG   = $request->no_img_evento;

            $extension = $OBJ_IMG->extension();
            $new_no_img_evento = md5($OBJ_IMG->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->no_img_evento->move(public_path('img/eventos'), $new_no_img_evento);

            $req_all['no_img_evento'] = $new_no_img_evento;
        }

        Evento::findOrFail($request->id)->update($req_all);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function joinEvento($id){
        
        $user = auth()->user();

        $user->eventosToParticipantes()->attach($id);

        $evento = Evento::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento ' .$evento->no_evento. '!');


    }
    public function sair_evento($id){
        
        $user = auth()->user();

        $user->eventosToParticipantes()->detach($id);

        $evento = Evento::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença foi removida do evento ' .$evento->no_evento. '!');

    }
}
