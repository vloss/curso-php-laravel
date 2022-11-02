@extends('layout/layout_sistema')

@section('title', 'Visualizar Evento: ' . $item->no_evento)
    
@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/eventos/{{ $item->no_img_evento }}" class="img-fluid" alt="{{ $item->no_evento }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{ $item->title }}</h1>
            <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $item->no_cidade }}</p>
            <p class="events-participants"><ion-icon name="people-outline"></ion-icon> {{count($item->users)}}</p>
            <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $proprietario['name'] }}</p>

@if (!$fl_ja_inscrito)
    <form action="/eventos/join/{{$item->id}}" method="POST">
        @csrf
        @method('POST')
        <a 
            href="/eventos/join/{{$item->id}}" 
            class="btn btn-primary" 
            id="event-submit"
            onclick="event.preventDefault(); this.closest('form').submit();">
            Confirmar Presença
        </a>

    </form>
@else
    <p>Você já está inscrito!</p>
@endif

            
            
            

            <h3>O evento conta com:</h3>
            <ul id="items-list">
                @foreach($item->array_itens as $sub_item)
                  <li><ion-icon name="play-outline"></ion-icon> <span>{{ $sub_item }}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o evento:</h3>
            <p class="event-description">{{ $item->desc_evento }}</p>
        </div>
        </div>
    </div>

@endsection