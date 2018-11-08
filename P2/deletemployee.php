<?php
	require_once('BDlibrary.php');

	$q = new ConsultaEmpresa();

	if(empty($q->dbc)){
		echo "<h3 align='center'> Error: No se pudo establecer conexion con la base de datos.</h3><br>";
		die();
	}
	$id=$_GET["idempleado"];
	$q->deleteEmpleado($id);

	header('Location: /PW/index2.php');
?>