<!--begin navbar -->
<div class="navbar-header">

    <button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <!--logo -->
    <a href="{{ url('/') }}" class="navbar-brand" id="logo"><img src="images/logo.png"></a>

</div>

<div id="navbar-collapse-02" class="collapse navbar-collapse">

    <ul class="nav navbar-nav navbar-right">

        <li><a href="#home">Inicio</a></li>
        <li><a href="#schedule">Cronograma</a></li>
        <li><a href="#category">Categorias</a></li>
        <li><a href="#history">Histórico</a></li>
        <li><a href="#reglamento">Reglamento</a></li>
        <li><a href="#app">App</a></li>
        <li><a href="#pqr">PQR</a></li>
        <li class="dropdown">
            <a href="#" class="discover-btn btn-alert dropdown-toggle" role="button" aria-haspopup="true"
                aria-expanded="false" id="dropdownMenuButton" data-toggle="dropdown">Registro</a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="registro" url="/registro" href="#">Registrar Participantes</a></li>
                <li><a class="registro" url="/equipo" href="#">Registrar Equipos</a></li>
                <li><a class="registro" url="/proyecto" href="#">Registrar Proyectos</a></li>
            </ul>
        </li>

    </ul>
</div>
<!--end navbar -->

</div>
<!--end container -->

</nav>
<!--end nav -->
