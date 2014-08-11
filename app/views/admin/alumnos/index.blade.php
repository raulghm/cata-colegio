@extends("layouts/default")
@section("content")

	<script>
	$(document).ready(function() {
    $('#tabla').DataTable( {
      dom: 'T<"clear">lfrtip'
    });
	});
	</script>

	<main>
		<div class="inner">

			<h2>Alumnos</h2>
			<hr>

			<table id="tabla" class="display" cellspacing="0" width="100%">
				<thead>
	        <tr>
            <th>Nombre</th>
	        </tr>
		    </thead>

		    <tfoot>
	        <tr>
            <th>Nombre</th>
	        </tr>
		    </tfoot>

		    <tbody>

		    	@foreach ($alumnos as $alumno)
		    		<tr>
			    		<td>{{ $alumno->nombre }}</td>
			    	</tr>
					@endforeach

		    </tbody>
			</table>

		</div>
	</main>

@stop