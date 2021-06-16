@extends('site.home')
@section('title', 'Listar Usuários')

@section('content')

    <h1>Usuários</h1>
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

    <a class="btn btn-small btn-primary" href="{{ action("UsuariosController@create") }}">Cadastrar</a>
    <hr>
    <table width="100%" class="table table-striped table-hover">
        <thead class="thead-dark table-dark">
            <tr>
                <th>Nome</th>
                <th>Perfil de acesso</th>
                <th>E-mail</th>
                <th>Senha</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{$usuario->nome}}</td>
                <td>{{$usuario->perfil}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->senha}}</td>
                <td><a class="alert-link" style="color:#0000FF" href="{{ route('atualizar_usuario', ['id'=>$usuario->id])}}" title="Atualizar Usuário {{ $usuario->nome }}">Editar</a></td>
                <td><a class="alert-link" style="color:#FF0000" href="{{ route('excluir_usuario', ['id'=>$usuario->id])}}" title="Excluir Usuário {{ $usuario->nome }}">Excluir</a></td>
            </tr>
        @endforeach
    </table>

@stop

