
@extends('layout/layout_sistema')

@section('title', "Bem Vindos")
    
@section('content')
    

    <div id="search-container" class="col-md-12">
        <h1>Busque um Evento</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>

    <div id="events-container" class="col-md-12">
        @if ($busca)
            <h2>Buscando por: {{$busca}}</h2>    
        @else
            <h2>Próximos Eventos</h2>
            <p class="subtitle">Veja os eventos dos próximos dias</p>    
        @endif

        <div id="cards-conteiner" class="row">
            @foreach ($listagem as $item)
                <div class="card col-md-3">
                    <img src="/img/eventos/{{ $item->no_img_evento }}" alt="{{$item->no_evento}}">
                    <div class="card-body">
                        <p class="card-date">{{date('d/m/Y', strtotime($item->dt_evento))}}</p>
                        <h5 class="card-title">{{$item->no_evento}}</h5>
                        <p class="card-participants">{{count($item->users)}}</p>
                        <a href="/evento/visualizar/{{$item->id}}" class="btn btn-primary">Saber Mais</a>
                    </div>
                
                </div>
            @endforeach

            @if (count($listagem) == 0 && $busca)
                <p>Não foi possível encontrar nenhum evento com {{$busca}}!.  <a href="/">Ver todos Eventos</a></p>
            @elseif (count($listagem) == 0 )
                <p>Não há eventos disponíveis.</p>
            @endif
        </div>
    </div>


@endsection