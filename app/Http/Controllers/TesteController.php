<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teste;

class TesteController extends Controller
{
    public function index($id = "vazio"){

        $listagem = Teste::all();

        $data['listagem'] = $listagem;
        $data['id'] = $id;

        return view('teste.index', $data);
    }
}
