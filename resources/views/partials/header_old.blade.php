<nav class="navbar navbar-default navbar-fixed-top">
 <div class="container-fluid">



    <!-- NavBar de Navegacion-->

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
           


            <li class="active"><a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}<span class="sr-only">(current)</span></a></li>
            <li ><a href="{{ url('/lineamuestras') }}">Muestras de linea</a></li>
            <li ><a href="{{ url('/muestrascamion') }}">Muestras camión</a></li>
            <li ><a href="{{ url('/gasconsumo') }}">Consumos de gas</a></li>



        </ul>

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
</div>
</div>
</nav>
</div>