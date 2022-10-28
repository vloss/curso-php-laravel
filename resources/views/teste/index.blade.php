@extends('layout/layout_sistema')

@section('title', 'Página de Teste')
    
@section('content')

    <p>Teste</p>

    <p>ID {{ $id }}</p>
    <p>Quantidade {{ count($listagem) }}</p>

    @foreach ($listagem as $item)

        <p>{{$item->no_teste}}</p>
        
    @endforeach
    
@endsection