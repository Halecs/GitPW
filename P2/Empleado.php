<!DOCTYPE html>
<html lang="es">
<head>
	<title>Ficha del empleado PHP</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body style="background-color:LightYellow;">
	<h2 align="center">Informacion sobre el empleado PHP </h2>
	<center>
	<img src="b1-8.png" width="250" height="250" alt="foto del empleado">
</center>

	<?php
	/*Incluye las funciones de consulta para los empleados */
	require_once('BDlibrary.php');

	/*Crea un nuevo objeto para las consultas*/
	$q = new ConsultaEmpresa();

	/*Comprueba que se ha realizado bien la conexion*/
	if(empty($q->dbc)){
		echo "<h3 align='center'> Error: No se pudo establecer conexion con la base de datos.</h3><br>";
		die();
	}
	$empleado = $q->getOne($_GET["ide"]);
echo <<<END

<div class="container" align= "center">
<h2>Datos personales</h2>
<ul class="list-group" style="width:50%">
<li class="list-group-item"><strong>Nombre:</strong> $empleado[nombre]</li>
<li class="list-group-item"><strong>Apellidos:</strong>  $empleado[apellidos]</li>
<li class="list-group-item"><strong>Telefono:</strong>  $empleado[telefono]</li>
<li class="list-group-item"><strong>Direccion:</strong>  $empleado[direccion]</li>
</ul>
</div>
<div class="container" align= "center">
<h2>Respecto a la empresa</h2>
<ul class="list-group"  style="width:50%">
<li class="list-group-item"><strong>Departamento:</strong>  $empleado[Departamento]</li>
<li class="list-group-item"><strong>Antiguedad:</strong>  $empleado[Antiguedad]</li>
<li class="list-group-item"><strong>Sueldo:</strong>  $empleado[Sueldo]</li>
</ul>
</div>

END;

	?>
</body>
</html>