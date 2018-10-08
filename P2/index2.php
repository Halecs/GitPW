<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista de Empleados PHP</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body style="background-color:LightYellow">
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

	/*Muestra los empleados*/
echo <<<END
<div class="container">
<h2>Lista de empleados</h2>
<table class="table table-hover table-striped">
<thead>
<tr>
<th>Id Empleado</th>
<th>Nombre y Apellidos</th>
<th style="width:20%">Mas informacion</th>
</tr>
</thead>
<tbody>
END;

	$empleados = $q->getEmpleados();
	foreach ($empleados as $empleado) {
echo <<<_END
<tr>
<td>$empleado[id]</td>
<td>$empleado[apellidos], $empleado[nombre]</td>
<td align="center" title="Mas informacion sobre el empleado"> &nbsp;&nbsp;<a href="Empleado.php?ide=$empleado[id]">Ver detalles</a></td>
</tr>
_END;
	}

	echo "</tbody>";
	echo "</table>";
	echo "</div>";


?>
</body>
</html>