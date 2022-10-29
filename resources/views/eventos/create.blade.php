@extends('layout/layout_sistema')

@section('title', 'Criar Evento')
    

@section('content')

    

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Criar Eventos</h1>
        <form action="/eventos" method="POST">

            @csrf 

            <div class="form-group">
                <label for="no_evento">Evento</label>
                <input type="text" class="form-control" id="no_evento" name="no_evento" placeholder="Nome do Evento">
            </div>

            <div class="form-group">
                <label for="no_cidade">Cidade</label>
                <input type="text" class="form-control" id="no_cidade" name="no_cidade" placeholder="Local do Evento">
            </div>

            <div class="form-group">
                <label for="fl_privado">O Evento é privado ?</label>
                <select name="fl_privado" id="fl_privado" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>

            <div class="form-group">
                <label for="desc_evento">Descrição</label>
                <textarea name="desc_evento" id="desc_evento" class="form-control" placeholder="O que vai acontecer no Evento..."></textarea>
            </div>

            <input type="submit" value="Criar Evento" class="btn btn-primary">
        </form>
    </div>
    
@endsection