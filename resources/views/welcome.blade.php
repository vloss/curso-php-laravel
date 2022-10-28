
@extends('layout/layout_sistema')

@section('title', "Bem Vindos")
    
@section('content')
    

    <div id="search-container" class="col-md-12">
        <h1>Busque um Evento</h1>
        <form action="">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>

    <div id="events-container" class="col-md-12">
        <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os eventos dos próximos dias</p>

        <div id="cards-conteiner" class="row">
            @foreach ($listagem as $item)
                <div class="card col-md-3">
                    <img src="/img/logo.png" alt="{{$item->no_evento}}">
                    <div class="card-body">
                        <p class="card-date">10/09/2022</p>
                        <h5 class="card-title">{{$item->no_evento}}</h5>
                        <p class="card-participants">X Participantes</p>
                        <a href="#" class="btn btn-primary">Saber Mais</a>
                    </div>
                
                </div>
            @endforeach
        </div>
    </div>


@endsection