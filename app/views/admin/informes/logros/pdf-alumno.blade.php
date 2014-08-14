<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>pdf</title>

	<style media="screen" type="text/css">

		body {
			font-family: Helvetica;
			margin: 0 auto;
			font-size: 12px;
		}
		#page {
			height: 1200px;
			width: 720px;
			padding: 45px 30px 30px 65px;
		}
		.bor {
			border: 1px solid #000;
			padding: 4px;
		}
		.uppercase {
			text-transform: uppercase;
		}
		hr {
			background:#000;
			color:#000;
			float:none;
			width:100%;
			height:1px;
			margin-top: 22px;
			border:none;
		}
		th, td, caption {
			padding: 1px 10px 1px 5px;
		}
		table {
			width: 100%;
			margin: 0;
			border-collapse: collapse;
		}
		.eval table {
			border: 1px solid #000;
		}
		.eval td {
			border: 1px solid #1a1a1a;
		}
		.left {float:left !important;}
		.right {float:left !important;}
		.align-left {text-align:left;}
		.align-right {text-align:right;}
		.align-center {text-align:center;}
	</style>

</head>

<body class="uppercase">

	<?php //foreach ($datos->result() as $row):?>

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
				<td>Maximo Aguirre</td>
				<td>Fecha</td>
			</tr>

			<tr>
				<td>Profesor Jefe</td>
				<td>Catalina Gómez Vega</td>
				<td>Curso</td>
				<td>7 año básico</td>
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

	<div class="valores">
		<table>
			<tr>
				<td></td>
				<td>Diagnostico</td>
				<td>prueba c/2 2do. semestre</td>
				<td>prueba c/2 3er. semestre</td>
			</tr>
			<tr>
				<td>sector</td>
				<td>porcentaje de logro</td>
				<td>nivel de logro</td>
				<td>porcentaje de logro</td>
				<td>nivel de logro</td>
				<td>porcentaje de logro</td>
				<td>nivel de logro</td>
			</tr>
			<tr>
				<td>lenguaje</td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</div>

	<?php //endforeach;?>

</body>
</html>