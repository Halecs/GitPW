<?php
	require_once('BDlibrary.php');

	/*Crea un nuevo objeto para las consultas*/
	$q = new ConsultaEmpresa();

	/*Comprueba que se ha realizado bien la conexion*/
	if(empty($q->dbc)){
		echo "<h3 align='center'> Error: No se pudo establecer conexion con la base de datos.</h3><br>";
		die();
	}

	$q->addEmpleado($_GET["url"],$_GET["nombre"],$_GET["apellidos"],$_GET["sexo"],$_GET["telefono"],$_GET["direccion"],$_GET["departamento"],$_GET["antiguedad"],$_GET["sueldo"]);
?>