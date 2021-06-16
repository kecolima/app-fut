@extends('site.home')
@section('title', 'Listar Presença')

@section('content')

    <h3>Partida do dia {{$dataPartida}}</h3>
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

    <hr>
    @php
        $aux = 1
    @endphp
    @foreach($times as $time)
        <table width="100%" class="table table-striped table-hover">
            <h4>Time {{$aux}}</h4>
            <tr class="thead-dark">
                <th>Jogadores</th>
                <th>Nível</th>
                <th>Posição</th>
            </tr>
            @foreach($time as $jogador)
                <tr>
                    <td>{{$jogador->nome}}</td>
                    <td>{{$jogador->nivel}}</td>
                    <td>{{$jogador->posicao}}</td>
                </tr>
            @endforeach
        </table>
        @php
            $aux++
        @endphp
    @endforeach

@stop

