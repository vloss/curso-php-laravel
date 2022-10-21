@extends('layout/layout_sistema')

@section('title', 'Produto Item')

@section('content')

    @if ($id != null)
        <p>ID do Produto: {{$id}}</p>    
    @endif

    

@endsection