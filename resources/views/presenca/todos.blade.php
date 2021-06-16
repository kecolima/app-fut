@extends('site.home')
@section('title', 'Listar Presença')

@section('content')

    <h1>Presença</h1>
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

    <a class="btn btn-small btn-primary" href="{{ action("PresencaController@create") }}">Cadastrar</a>
    <hr>
    <table width="100%" class="table table-striped table-hover">
        <thead class="thead-dark table-dark">
            <tr>
                <th>Partida do dia</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        @foreach($presencas as $presenca)
            <tr>
                <td>{{date("d/m/Y", strtotime($presenca->data))}}</td>
                <td><a class="alert-link" style="color:#008000" href="{{ route('ver_partida', ['id'=>$presenca->id])}}" title="Exibir Partida {{ $presenca->data }}">Exibir Times</a></td>
                <td><a class="alert-link" style="color:#0000FF" href="{{ route('atualizar_presenca', ['id'=>$presenca->id])}}" title="Atualizar Partida {{ $presenca->data }}">Editar</a></td>
                <td><a class="alert-link" style="color:#FF0000" href="{{ route('excluir_presenca', ['id'=>$presenca->id])}}" title="Excluir Partida {{ $presenca->data }}">Excluir</a></td>
            </tr>
        @endforeach
    </table>

@stop

