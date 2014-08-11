@extends("layouts/default")
@section("content")

	<script>
	$(document).ready(function() {
		$('.select-cursos').change(function(){
			open('{{ URL::to('informe-logros/curso') }}/' + $('.select-cursos').val(), '_self')
		});
	});
	</script>

	<main>
		<div class="inner">

			<h2>Informe de logros</h2>
			<hr>

			<select class="form-control select-cursos" name="agent">
				<option>Selecciona un curso...</option>
		    @foreach ($cursos as $curso)
					<option value="{{ $curso->id }}">
						{{ $curso->nombre }}
					</option>
		    @endforeach
			</select>

			<br>

			<h4>Primero seleccionar un curso</h4>

		</div>
	</main>

@stop