



<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ url('/') }}">Inicio<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @if (Auth::user()->user == 1)
              Administrdor
              <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
<ul class="dropdown-menu forAnimate" role="menu">
 <li><a href="{{url('register')}}">Crear usuario</a></li>
 <li><a href="#">Modificar Usuario</a></li>
            @endif



            @if (Auth::user()->user == 0)
                Usuario
                <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
  <ul class="dropdown-menu forAnimate" role="menu">
   <li><a href="#">Modificar Perfil</a></li>
          @endif

  </ul>

        <li ><a href="#">Libros<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
        <li ><a href="#">Tags<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              {{ Auth::user()->name }}
              <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
<ul class="dropdown-menu forAnimate" role="menu">
  <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">Salir</a></li>
 <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
    </form>
      </ul>
    </div>
  </div>
</nav>
