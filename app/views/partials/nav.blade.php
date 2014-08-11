<header>
	<div class="inner">

		<nav class="navbar navbar-inverse">
			<a class="navbar-brand" href="{{ URL::to('/') }}">Cata App</a>
			<ul class="nav navbar-nav">
				<li class="active"><a href="{{ URL::to('/') }}">Home</a></li>
				<li><a href="{{ URL::to('alumnos') }}">Alumnos</a></li>
				<li><a href="{{ URL::to('cursos') }}">Cursos</a></li>
				<li><a href="{{ URL::to('profesores') }}">Profesores</a></li>
				<li><a href="{{ URL::to('asignaturas') }}">Asignaturas</a></li>
				<li><a href="{{ URL::to('informe-logros') }}">Informes</a></li>
				<li><a href="{{ URL::to('salir') }}">Salir</a></li>
			</ul>
		</nav>

		@if (Auth::check())
			<h3>usuario logeado</h3>
		@endif

	</div>
</header>