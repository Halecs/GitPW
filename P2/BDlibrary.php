<?php
class ConsultaEmpresa {

	public $usuario = 'i62rejia'

	public $pass = 'i62rejiaPW'

	public $dbc;
}

public function __construct(){
	$this -> dbc = $this -> dbconnect();
}

public function dbconnect(){
	$dbc = null;

	try{
		$dbc = new PDO('mysql:host=localhost; dbname=empresa', 
				$this->usuario, $this->pass, array(PDO::ATR_PERSISTENT => true));
	} catch (PDOException $e) {
		return null;
	}

	return $dbc;
}

public function getEmpleados(){
	$emps = array();
	$sentence = $this ->dbc->prepare("SELECT id, nombre,apellidos FROM empleados");
	if($sentence->execute()){
		while($row = $sentence->fetch()){
			$emps[] = $row;
		}
	}

	return $emps;
}

public function getOne($idempleado){
	$i = 0;
	$empleado = array();
	$sentence = $this->dbc->prepare("SELECT * FROM empleados WHERE id = ?");
	if($sentence->execute()){
		while ($row = sentence->fetch()) {
			$empleado[$i] = $row;
			i++;
		}
	}

	return $empleado;
}
?>