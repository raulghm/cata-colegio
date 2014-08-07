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

			<h2>Cursos</h2>

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

		    	@foreach ($cursos as $curso)
		    		<tr>
			    		<td>{{ $curso->nombre }}</td>
			    	</tr>
					@endforeach

		    </tbody>
			</table>

		</div>
	</main>

@stop