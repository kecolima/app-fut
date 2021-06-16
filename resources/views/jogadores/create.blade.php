@extends('site.home')
@section('title', 'Cadastrar Jogadores')

@section('content')

<h1>Cadastro de Jogadores</h1>
@if (count($errors) > 0)
	<div class="alert alert-danger">
	<strong>Erros:</strong>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif
<form action="{{ route('salvar_jogador') }}" method="POST">

    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nível:</strong>
                <select class="form-control" id="nivel" name="nivel">
                    <option value="">Selecione a nível</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Posição:</strong>
                <select class="form-control" id="posicao" name="posicao">
                    <option value="">Selecione a posição</option>
                    <option value="jogador">jogador</option>
                    <option value="goleiro">goleiro</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
        <br>
        <br>
    </div>

</form>
@stop
