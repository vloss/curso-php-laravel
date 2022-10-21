<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index($id = null){
        return view('produto', ['id' => $id]);
    }

    public function lista($busca){
        return view('produtos', ['busca' => $busca]);
    }
}
