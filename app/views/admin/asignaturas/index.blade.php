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

			<h2>Asignaturas</h2>
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

		    	@foreach ($asignaturas as $asignatura)
		    		<tr>
			    		<td>{{ $asignatura->nombre }}</td>
			    	</tr>
					@endforeach

		    </tbody>
			</table>

		</div>
	</main>

@stop