<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div id="navbar" class="container-fluid bg-primary">
        <div class="navbar-header">
            <a class="navbar-brand" href="/painel"><img alt="FUTEBOL" src="{{url(mix('site/img/udv.png'))}}" class="img-responsive"></a>
        </div>
        <ul class="nav navbar-nav">
        <li class="nav-item">
                <a class="nav-link" href="/painel">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/jogador/ver">JOGADORES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/presenca/ver">PARTIDAS</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
                <a class="navbar-brand" href="{{ route('admin.logout')}}">Logout</a>
            </li>
        </ul>
    </div>
</nav>



