<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>pdf</title>
</head>

<body class="uppercase">

	@foreach ($data['alumnos'] as $alumno)

	<div id="page">
		<div class="header">
			<div class="left">
				<img src="" alt="" />
			</div>

			<div class="right">
				<h1>Informe niveles de logro</h1>
			</div>
		</div>

		<div class="info">
			<table>
				<tr>
					<td>Nombre</td>
					<td style="border-bottom: 1px solid;">{{ $alumno->nombre }}</td>
					<td>Fecha</td>
					<td style="border-bottom: 1px solid;">1 Agosto 2014</td>
				</tr>

				<tr class="content">
					<td>Profesor Jefe</td>
					<td style="border-bottom: 1px solid;">Catalina Gómez Vega</td>
					<td>Curso</td>
					<td style="border-bottom: 1px solid;">7 año básico</td>
				</tr>
			</table>
		</div>

		<div class="niveles">
			<table>
				<tr>
					<td>nivel de logro</td>
					<td>porcentaje de logro</td>
				</tr>

				<tr>
					<td>alto</td>
					<td>75% - 100%</td>
				</tr>
				<tr>
					<td>medio alto</td>
					<td>50% - 74%</td>
				</tr>
				<tr>
					<td>medio bajo</td>
					<td>25% - 49%</td>
				</tr>
				<tr>
					<td>bajo</td>
					<td>0 - 24%</td>
				</tr>
			</table>
		</div>

		<div class="values">
			<table class="diagnostico">
				<tr align="center">
					<td colspan="3">Diagnostico</td>
				</tr>

				<tr>
					<td>sector</td>
					<td>porcentaje de logro</td>
					<td>nivel de logro</td>
				</tr>

					<?php
					$array_values = array();

					$valores = InformeLogro::where('id_alumno', '=', $alumno->id)->where('id_semestre', '=', 1)->get();

					if ( $valores ):
						foreach ($valores as $value)
						{
							$array_values[] = unserialize($value->values);
						}

						if ( $array_values ):
					?>

						@foreach ($data['asignaturas'] as $key => $asignatura)
						<?php
						$key++;
						$value = $array_values[0][$key];
						if ( $value > 0 )
						{
							if ( $value < 25 ) $porcentaje = 'bajo';
							if ( $value >= 25 ) $porcentaje = 'medio bajo';
							if ( $value >= 50 ) $porcentaje = 'medio alto';
							if ( $value >= 75 ) $porcentaje = 'alto';
						}
						?>
						<tr>
							<td>{{ $asignatura->nombre }}</td>
							<td>{{ $value }}</td>
							<td>
								@if (isset($porcentaje))
									{{ $porcentaje }}
								@endif
							</td>
						</tr>
						@endforeach
					<?php endif; ?>
					<?php endif; ?>
			</table>

			<table class="diagnostico">
				<tr align="center">
					<td colspan="3">PRUEBA C/2 2DO. SEMESTRE	</td>
				</tr>

				<tr>
					<td>sector</td>
					<td>porcentaje de logro</td>
					<td>nivel de logro</td>
				</tr>

					<?php
					$array_values = array();

					$valores = InformeLogro::where('id_alumno', '=', $alumno->id)->where('id_semestre', '=', 1)->get();

					if ( $valores ):
						foreach ($valores as $value)
						{
							$array_values[] = unserialize($value->values);
						}

						if ( $array_values ):
					?>

						@foreach ($data['asignaturas'] as $key => $asignatura)
						<?php
						$key++;
						$value = $array_values[0][$key];
						if ( $value > 0 )
						{
							if ( $value < 25 ) $porcentaje = 'bajo';
							if ( $value >= 25 ) $porcentaje = 'medio bajo';
							if ( $value >= 50 ) $porcentaje = 'medio alto';
							if ( $value >= 75 ) $porcentaje = 'alto';
						}
						?>
						<tr>
							<td>{{ $asignatura->nombre }}</td>
							<td>{{ $value }}</td>
							<td>
								@if (isset($porcentaje))
									{{ $porcentaje }}
								@endif
							</td>
						</tr>
						@endforeach
					<?php endif; ?>
					<?php endif; ?>
			</table>

			<table class="diagnostico">
				<tr align="center">
					<td colspan="3">PRUEBA C/2 3ER. SEMESTRE	</td>
				</tr>

				<tr>
					<td>sector</td>
					<td>porcentaje de logro</td>
					<td>nivel de logro</td>
				</tr>

					<?php
					$array_values = array();

					$valores = InformeLogro::where('id_alumno', '=', $alumno->id)->where('id_semestre', '=', 1)->get();

					if ( $valores ):
						foreach ($valores as $value)
						{
							$array_values[] = unserialize($value->values);
						}

						if ( $array_values ):
					?>

						@foreach ($data['asignaturas'] as $key => $asignatura)
						<?php
						$key++;
						$value = $array_values[0][$key];
						if ( $value > 0 )
						{
							if ( $value < 25 ) $porcentaje = 'bajo';
							if ( $value >= 25 ) $porcentaje = 'medio bajo';
							if ( $value >= 50 ) $porcentaje = 'medio alto';
							if ( $value >= 75 ) $porcentaje = 'alto';
						}
						?>
						<tr>
							<td>{{ $asignatura->nombre }}</td>
							<td>{{ $value }}</td>
							<td>
								@if (isset($porcentaje))
									{{ $porcentaje }}
								@endif
							</td>
						</tr>
						@endforeach
					<?php endif; ?>
					<?php endif; ?>
			</table>

		</div>

	</div>
	@endforeach

</body>
</html>