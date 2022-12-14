@extends('layout/layout_sistema')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($listagem) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listagem as $item)
                    <tr>
                        <td scropt="row"> {{$loop->index + 1 }} </td>
                        <td><a href="evento/visualizar/{{ $item->id }}">{{ $item->no_evento }}</a></td>
                        <td>{{count($item->users)}}</td>
                        <td>
                            <a href="/eventos/editar/{{$item->id}}"  class="btn btn-info edit-btn">Editar </a> 
                            <form action="/eventos/{{$item->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"> Deletar </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Você ainda não tem eventos, <a href="/evento/criar">Criar evento</a></p>
    @endif
</div>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que estou participando</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($eventos_participacao))
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventos_participacao as $item)
                    <tr>
                        <td scropt="row"> {{$loop->index + 1 }} </td>
                        <td><a href="evento/visualizar/{{ $item->id }}">{{ $item->no_evento }}</a></td>
                        <td>{{count($item->users)}}</td>
                        <td>
                            <form action="/eventos/sair/{{$item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn">Sair do Evento</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Você ainda não está participando de nenhum evento, <a href="/">Veja todos eventos</a></p>
    @endif
</div>

    
@endsection