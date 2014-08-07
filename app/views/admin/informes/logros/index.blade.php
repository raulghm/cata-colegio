@extends("layouts/default")
@section("content")

	<script>
	$(document).ready(function() {
	});
	</script>

	<main>
		<div class="inner">

			<!-- <h2>Informe de logros</h2> -->

			 <select class="form-control" name="agent">
		     @foreach ($cursos as $curso)
					<option value="{{ $curso->id }}">
						{{ $curso->nombre }}
					</option>
		     @endforeach
			</select>

			<br>

			{{ Form::open(array( 'url' => 'informe-logros/store', 'class' => 'form' )) }}

				<table id="tabla" class="display" cellspacing="0" width="100%">
					<thead>
		        <tr>
	            <th>Nombre</th>
	            <th>Valor</th>
		        </tr>
			    </thead>

			    <tfoot>
		        <tr>
	            <th>Nombre</th>
		        </tr>
			    </tfoot>

			    <tbody>

			    	@foreach ($alumnos as $alumno)
			    		<input type="hidden" name="id_alumno[{{ $alumno->id }}]">
			    		<tr>
				    		<td>{{ $alumno->nombre }}</td>
				    		<td><input type="text" name="valor"></td>
				    	</tr>
						@endforeach

			    </tbody>
				</table>

			{{ Form::close() }}

		</div>
	</main>

@stop