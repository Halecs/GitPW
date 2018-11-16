<?php
	session_start();
?>
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

	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{
		require_once('BDlibrary.php');
		$q = new ConsultaEmpresa();

		if(empty($q->dbc)){
			echo "<h3 align='center'> Error: No se pudo establecer conexion con la base de datos.</h3><br>";
			die();
		}

	/*Muestra los empleados*/
echo <<<END
		<div class="container">
<h2>Lista de empleados</h2>
	<a href="formulario.php" class="btn btn-default btn-group" role="button">Agregar nuevo empleado</a>
		<table class="table table-hover table-striped">
	<a href="loggedout.php" class="btn btn-default btn-group" role="button">Cerrar Sesión</a>
		<table class="table table-hover table-striped">
<thead>
<tr>
<th>Id Empleado</th>
<th>Nombre y Apellidos</th>
END;
	if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)
	{
		echo <<<END
		<th style="width:20%">Mas informacion</th>
		<th>Administracion</th>
END;
	}
echo <<<END
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
_END;
	if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)
	{
		echo<<< END
	<td align="center" title="Mas informacion sobre el empleado"> &nbsp;&nbsp;<a href="Empleado.php?ide=$empleado[id]">Ver detalles</a></td>
	<td><a href="Editar.php?ide=$empleado[id]">Editar</a>&nbsp;&nbsp;<a href="Eliminar.php?ide=$empleado[id]">Eliminar</a></td>
	</tr>
END;
	}
	}

	echo "</tbody>";
	echo "</table>";
	echo "</div>";
}
else
{
	echo "<div class='alert alert-danger' role='alert'>
			<h4>Necesitas estar logeado para acceder a esta pagina. </h4>";
echo <<<END
<div class="row">
<div class="span6">
<div class='alert alert-danger' role='alert'>
<h4>Iniciar Sesion</h4>
<form method="GET" action="session.php">
	Usuario:<br>
	<input type="text" name="usuario"></br>
	Contraseña:<br>
	<input type="text" name="password"></br>
	<input type="submit" value="Enviar">
</form>
</div>
</div>
END;

echo <<< END
<div class="span6">
<div class='alert alert-danger' role='alert'>
<h4>Registro</h4>
<form method="GET" action="registeruser.php">
	Usuario:<br>
	<input type="text" name="usuario"></br>
	Contraseña:<br>
	<input type="text" name="password"></br>
	Confirmar Contraseña:<br>
	<input type="text" name="password2"></br>
	Email:<br>
	<input type="text" name="email"></br>
	<input type="submit" value="Enviar">
</form>
</div>
</div>
</div>
END;
}
	$now = time();
	if(isset($_SESSION['expire']) && $now > $_SESSION['expire'])
	{
		session_destroy();
		echo "<div class='alert alert-danger' role='alert'>
			<h4>Sesion expirada</h4>";
	}

?>
</body>
</html>