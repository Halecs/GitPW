<?php
	session_start();

require_once('BDlibrary.php');
$q = new ConsultaEmpresa();
$user = array();
$user = $q->buscarUsuario($_GET['usuario'],$_GET['password']);
$token = hash('ripemd128',$_GET['password']);

if((strcmp($user[0],$_GET['usuario']) == 0) && (strcmp($user[1],$token) == 0))
{
	$_SESSION['usuario'] = $user['usuario'];
	$_SESSION['loggedin'] = true;
	$_SESSION['start'] = time();
	$_SESSION['expire'] = $_SESSION['start'] + (1*60);
	echo "$user[2]";
	if($user[2] == 1)
		$_SESSION['admin'] = true;
	else
		$_SESSION['admin'] = false;
	header('Location: /PW/P4/index2.php');
}
else
{
	echo "<h4> Fallo al iniciar sesion, usuario o contraseña incorrectos</h4>";
	echo "<a href='index2.php' role='button'>Volver</a>" ;

}
?>