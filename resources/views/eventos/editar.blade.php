@extends('layout/layout_sistema')

@section('title', 'Editar Evento')
    

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando evento</h1>
    <form action="/eventos/update/{{$dados->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="no_img_evento">Imagem do Evento:</label><br/>
        <input type="file" name="no_img_evento" id="no_img_evento" class="form-control-file">
        <img src="/img/eventos/{{$dados->no_img_evento}}" alt="" class="img-preview">
      </div>
      
      <div class="form-group">
        <label for="no_evento">Evento:</label>
        <input type="text" class="form-control" id="no_evento" name="no_evento" placeholder="Nome do evento" value="{{$dados->no_evento}}">
      </div>

      <div class="form-group">
        <label for="no_evento">Data do Evento:</label>
        <input type="date" class="form-control" id="dt_evento" name="dt_evento" value="{{$dados->dt_evento->format('Y-m-d')}}">
      </div>

      <div class="form-group">
        <label for="no_cidade">Cidade:</label>
        <input type="text" class="form-control" id="no_cidade" name="no_cidade" placeholder="Local do evento" value="{{$dados->no_cidade}}">
      </div>
      <div class="form-group">
        <label for="fl_privado">O evento é privado?</label>
        <select name="fl_privado" id="fl_privado" class="form-control">
          <option value="0" >Não</option>
          <option value="1" {{ $dados->fl_privado == 1 ? "selected='selected'" : "" }}>Sim</option>
        </select>
      </div>
      <div class="form-group">
        <label for="desc_evento">Descrição:</label>
        <textarea name="desc_evento" id="desc_evento" class="form-control" placeholder="O que vai acontecer no evento?">{{$dados->desc_evento}}</textarea>
      </div>

      <div class="form-group">
        <label for="array_itens">Adicione itens de infraestrutura:</label>
        <div class="form-group">
          <input type="checkbox" name="array_itens[]" value="Cadeiras"> Cadeiras
        </div>
        <div class="form-group">	
          <input type="checkbox" name="array_itens[]" value="Palco"> Palco
        </div>
        <div class="form-group">	
          <input type="checkbox" name="array_itens[]" value="Cerveja grátis"> Cerveja grátis
        </div>
        <div class="form-group">	
          <input type="checkbox" name="array_itens[]" value="Open Food"> Open food
        </div>
        <div class="form-group">	
          <input type="checkbox" name="array_itens[]" value="Brindes"> Brindes
        </div>
      </div>

      <input type="submit" class="btn btn-primary" value="Editar Evento">
    </form>
  </div>
    
@endsection