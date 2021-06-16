@extends('site.home')
@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-tittle-container">
<hr>
    <h5>Dashboard</h5>
</div>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm">
        total de Jogadores <h1>{{count($jogadores)}}</h1>
    </div>
    <div class="col-sm">
        total de Jogadores Linha <h3>{{count($jogadorLinha)}}</h3>
    </div>
    <div class="col-sm">
        total de Goleiros <h3>{{count($jogadorGoleiro)}}</h3>
    </div>
  </div>
</div>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm">
        <p>
            <h6>Jogadores Linha por nível</h6>
            <h6> Nível 1: {{count($jogadorNivelUm)}}</h6>
            <h6> Nível 2: {{count($jogadorNivelDois)}}</h6>
            <h6> Nível 3: {{count($jogadorNivelTres)}}</h6>
            <h6> Nível 4: {{count($jogadorNivelQuatro)}}</h6>
            <h6> Nível 5: {{count($jogadorNivelCinco)}}</h6>
        </p>
    </div>
    <div class="col-sm">
        <p>
            <h6>Goleiros por nível</h6>
            <h6> Nível 1: {{count($jogadorGoleiroNivelUm)}}</h6>
            <h6> Nível 2: {{count($jogadorGoleiroNivelDois)}}</h6>
            <h6> Nível 3: {{count($jogadorGoleiroNivelTres)}}</h6>
            <h6> Nível 4: {{count($jogadorGoleiroNivelQuatro)}}</h6>
            <h6> Nível 5: {{count($jogadorGoleiroNivelCinco)}}</h6>
        </p>
    </div>
    <div class="col-sm">
        <p>
            total de Partidas <h3>{{count($presencas)}}</h3>
        </p>
    </div>
  </div>
</div>

@endsection

