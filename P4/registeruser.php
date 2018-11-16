<?php
	
	if(strcmp($_GET['password'], $_GET['password2']) == 0)
	{
		require_once('BDlibrary.php');
		$q = new ConsultaEmpresa();
		$token = hash('ripemd128',$_GET['password']);
		$q->registeruser($_GET['usuario'],$token,$_GET['email']);

		echo "<h4>Usuario registrado correctamente</h4>";
		echo"<a href=index2.php role='button'>Volver</a>";
	}
	else
	{
		echo "<h4>Error, las contraseñas no son iguales</h4>";
		echo"<a href=index2.php role='button'>Volver</a>";
	}
?>