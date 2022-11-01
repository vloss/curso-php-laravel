@extends('layout/layout_sistema')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>


</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($listagem) > 0)
    
    @else
        
    @endif
</div>
    
@endsection