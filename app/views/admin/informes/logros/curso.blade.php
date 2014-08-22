@extends("layouts/default")
@section("content")

	<script>
	$(document).ready(function() {
		$('.select-cursos').change(function(){
			open('{{ URL::to('informe-logros/curso') }}/' + $('.select-cursos').val(), '_self')
		});

		$('.select-semestres').change(function(){
			open('{{ URL::to('informe-logros/curso') }}/{{ Request::segment(3) }}/' + $('.select-semestres').val(), '_self')
		});
	});
	</script>

	<main class="informe">
		<div class="inner">

			<h2>Informe de logros</h2>

			<div class="actions">
				<?php	if ( Request::segment(3) && Request::segment(4) ):	?>
					<a href="{{ URL::to('test') }}/{{ Request::segment(3) }}/{{ Request::segment(4) }}" class="btn btn-primary">Generar PDF</a>
				<?php endif; ?>
			</div>
			<hr>

			<!-- select curso -->
			<?php echo Form::select('cursos', array('' => 'Selecciona curso...') + $cursos, Request::segment(3), array('class="form-control select-cursos"')); ?>

			<br>

			<!-- select semestre -->
			<?php
			echo Form::select('semestres', array(
				'' => 'Selecciona un semestre...',
				1 => 'Diagnóstico',
				2 => '1 Semestre',
				3 => '2 Semestre',
			), Request::segment(4), array('class="form-control select-semestres"'));
			?>

			<br>

			{{ Form::open(array( 'url' => 'informe-logros/store', 'class' => 'form' )) }}

				<input type="hidden" name="id_curso" value="{{ Request::segment(3) }}">
				<input type="hidden" name="id_semestre" value="{{ Request::segment(4) }}">

				<table id="tabla" class="display" cellspacing="0" width="100%">
					<thead>
		        <tr>
	            <th>Nombre</th>
	            @foreach ($asignaturas as $asignatura)
	            	<th>{{ $asignatura->nombre }}</th>
				    	@endforeach
		        </tr>
			    </thead>

			    <tfoot>
		        <tr>
	            <th>Nombre</th>
		        </tr>
			    </tfoot>

			    <tbody>

			    	@foreach ($alumnos as $key => $alumno)
			    		<input type="hidden" name="id[]" value="{{ $alumno->id }}">
			    		<input type="hidden" name="id_alumno[]" value="{{ $alumno->id }}">
							@if ($informe_logros)
			    			<input type="hidden" name="id_informe[]" value="{{ $informe_logros[$key]['id'] }}">
							@endif

			    		<?php
			    		if ( count($array_values) > 0 )
			    		{
			    			if ( $array_values[$key] > 0 )
			    			{
			    				$array = $array_values[$key];
			    			}
			    		}
					    ?>
			    		<tr>
				    		<td width="280">{{ $alumno->nombre }}</td>
				    		@foreach ($asignaturas as $asignatura)
				    			<?php
				    			if ( isset($array) )
					    		{
					    			$value = $array[$asignatura->id];
					    		}
				    			?>
				    			<input type="hidden" name="id_asignatura[{{ $alumno->id }}][]" value="{{ $asignatura->id }}">
				    			<td><input class="input-value" type="text" name="value[{{ $alumno->id }}][]" value="<?php echo isset($value) ? $value : "" ?>"></td>
				    		@endforeach
				    	</tr>
						@endforeach

			    </tbody>
				</table>

				<input type="submit" value="Guardar">

			{{ Form::close() }}

		</div>
	</main>

@stop