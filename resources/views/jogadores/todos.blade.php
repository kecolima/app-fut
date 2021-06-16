@extends('site.home')
@section('title', 'Listar Jogadores')

@section('content')

    <h1>Jogadores</h1>
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

    <a class="btn btn-small btn-primary" href="{{ action("JogadorController@create") }}">Cadastrar</a>
    <hr>
    <table width="100%" class="table table-striped table-hover">
        <thead class="thead-dark table-dark">
            <tr>
                <th>Nome</th>
                <th>Nível</th>
                <th>Posição</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        @foreach($jogadores as $jogador)
            <tr>
                <td>{{$jogador->nome}}</td>
                <td>{{$jogador->nivel}}</td>
                <td>{{$jogador->posicao}}</td>
                <td><a class="alert-link" style="color:#0000FF" href="{{ route('atualizar_jogador', ['id'=>$jogador->id])}}" title="Atualizar Jogador {{ $jogador->nome }}">Editar</a></td>
                <td><a class="alert-link" style="color:#FF0000" href="{{ route('excluir_jogador', ['id'=>$jogador->id])}}" title="Excluir Jogador {{ $jogador->nome }}">Excluir</a></td>
            </tr>
        @endforeach
    </table>

@stop

