<?php
	require_once('BDlibrary.php');

	$q = new ConsultaEmpresa();

	if(empty($q->dbc)){
		echo "<h3 align='center'> Error: No se pudo establecer conexion con la base de datos.</h3><br>";
		die();
	}

	$q->modifyEmpleado($_GET["urlfoto"],$_GET["nombre"],$_GET["apellidos"],$_GET["sexo"],$_GET["telefono"],$_GET["direccion"],$_GET["departamento"],$_GET["antiguedad"],$_GET["sueldo"],$_GET["idd"]);

	header('Location: /PW/P3/index2.php');
?>