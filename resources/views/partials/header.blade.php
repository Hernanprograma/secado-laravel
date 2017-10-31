
<div class="navbar navbar-default navbar-fixed-top" role="navigation">

  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
    </div>
    <div class="navbar-collapse collapse">


@if (!Auth::guest())
       <ul class="nav navbar-nav">


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Insertar datos <b class="caret"></b></a>
          <ul class="dropdown-menu">
           <li ><a href="{{ route('lineamuestras.create') }}">Muestras de linea</a></li>
            <li class="divider"></li>
            <li ><a href="{{ route('muestrascamion.create') }}">Muestras camión</a></li>
            <li class="divider"></li>
            <li ><a href="{{ route('gasconsumo.create') }}">Consumos de gas</a></li>
            <li class="divider"></li>
            <li ><a href="{{ route('simbiotica.create') }}">Caudales simbiótica</a></li>

          </ul>
        </li>
      </ul>




      <ul class="nav navbar-nav ">


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informes<b class="caret"></b></a>
          <ul class="dropdown-menu">
           <li ><a href="{{ route('lineamuestras.index') }}">Muestras de linea</a></li>
            <li class="divider"></li>
            <li ><a href="{{ route('muestrascamion.index') }}">Muestras camión</a></li>
            <li class="divider"></li>
            <li ><a href="{{ route('gasconsumo.index') }}">Consumos de gas</a></li>
            <li class="divider"></li>
            <li ><a href="{{ route('simbiotica.index') }}">Caudales simbiótica</a></li>

          </ul>
        </li>

      </ul>
      @endif

      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
        <li><a href="{{ url('/login') }}">Login</a></li>
        <li><a href="{{ url('/register') }}">Register</a></li>
        @else
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="{{ url('/logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              Logout
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </li>
      @endif
    </ul>



  </div><!--/.navbar-collapse -->
</div>
</div>
