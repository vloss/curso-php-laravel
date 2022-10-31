@extends('layout/layout_sistema')

@section('title', 'Criar Evento')
    

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/eventos" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="no_img_evento">Imagem do Evento:</label><br/>
        <input type="file" name="no_img_evento" id="no_img_evento" class="form-control-file">
      </div>
      
      <div class="form-group">
        <label for="no_evento">Evento:</label>
        <input type="text" class="form-control" id="no_evento" name="no_evento" placeholder="Nome do evento">
      </div>
      <div class="form-group">
        <label for="no_cidade">Cidade:</label>
        <input type="text" class="form-control" id="no_cidade" name="no_cidade" placeholder="Local do evento">
      </div>
      <div class="form-group">
        <label for="fl_privado">O evento é privado?</label>
        <select name="fl_privado" id="fl_privado" class="form-control">
          <option value="0">Não</option>
          <option value="1">Sim</option>
        </select>
      </div>
      <div class="form-group">
        <label for="desc_evento">Descrição:</label>
        <textarea name="desc_evento" id="desc_evento" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
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

      <input type="submit" class="btn btn-primary" value="Criar Evento">
    </form>
  </div>
    
@endsection