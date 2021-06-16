
@extends('site.home')
@section('title', 'Marcar Presença')

@section('content')

<h1>Cadastrar Presença</h1>
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
<form action="{{ route('salvar_presenca') }}" method="POST">

    @csrf

    <div class="row">
        <div class="form-check">

        </div>
        <div class="form-check">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Data da Partida</strong>
                    <input type="date" name="data" id="data" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Número de jogadores por time</strong>
                    <input type="text" name="tamanhoTime" id="tamanhoTime" class="form-control" placeholder="0">
                </div>
            </div>
            <table width="100%" class="table table-striped table-hover">
                <thead class="thead-dark table-dark">
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Jogadores</th>
                        <th>Posição</th>
                        <th>Nível</th>
                    </tr>
                </thead>
                @foreach($jogadores as $jogador)
                    <tr>
                        <td></td>
                        <td><input class="form-check-input" type="checkbox" value="{{$jogador->nome}}" name="jogador[{{$jogador->id}}]" id="jogador[{{$jogador->id}}]"></td>
                        <td>{{$jogador->nome}}</td>
                        <td>{{$jogador->posicao}}</td>
                        <td>{{$jogador->nivel}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
        <br>
        <br>
    </div>

</form>
@stop





