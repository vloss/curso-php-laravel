@extends('layout/layout_sistema')

@section('title', "Produtos Title")
    
@section('content')
    

<h1>Página de Produtos</h1>
<a href="/contatos">Contato</a>
<a href="/">Voltar</a>

@if ($busca != '')
    <p>Busca por: {{$busca}}</p>    
@endif


@endsection