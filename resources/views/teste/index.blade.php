@extends('layout/layout_sistema')

@section('title', 'Titulo Teste')
    
@section('content')

    <p>{{$titulo}}</p>


    @foreach ($resultado as $item)
        <p>{{$item->no_teste}}</p>
    @endforeach
    
@endsection