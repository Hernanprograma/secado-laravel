<div class="container">
    <div class="row profile">
      <div class="col-md-4">
      </div>
		<div class="col-md-4">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="/images/admin.png"class="img-responsive" alt="">
				</div>
        <div class="profile-usertitle-job">
          Operario
        </div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
            Está  abierta la sesion de </span><div class="profile-usertitle-name">
						{{ Auth::user()->name }} que quieres hacer?
					</div>

				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-primary btn-lg" href="{{ url('/home') }}"onclick="event.preventDefault();
          document.getElementById('home-form').submit();">Seguir</button>

					<button type="button" class="btn btn-danger btn-lg" href="{{ url('/logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Cerrar sesión</button>
				</div>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>

        <form id="home-form" action="{{ url('/home') }}" method="GET" style="display: none;">
          {{ csrf_field() }}
        </form>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
    <div class="col-md-4">
    </div>

	</div>
</div>
