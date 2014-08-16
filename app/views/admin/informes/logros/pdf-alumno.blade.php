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
			/*height: 1200px;
			width: 720px;*/
			padding: 45px;
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
			margin-top: 20px;
			margin-bottom: 30px;
			border-collapse: collapse;
		}

		.niveles table {
			width: 400px;
		}

		.niveles table td {
			border: 1px solid;
		}

		.values table td {
			border: 1px solid;
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

		.header {
			height: 100px;
		}

		.info table .content td {
		}
	</style>

</head>

<body class="uppercase">

	@foreach ($data['alumnos'] as $alumno)

	<div id="page">

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


	</div>
	@endforeach

</body>
</html>