<?php
class ConsultaEmpresa {

	public $usuario = 'i62rejia';

	public $pass = 'i62rejiaPW';

	public $dbc;


public function __construct(){
	$this->dbc = $this->dbconnect();
}

public function dbconnect(){
	$dbc = null;

	try{
		$dbc = new PDO('mysql:host=localhost;dbname=empresa', 
				$this->usuario, $this->pass, array(PDO::ATTR_PERSISTENT => true));
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
	$empleado = array();
	$sentence = $this->dbc->prepare("SELECT * FROM empleados WHERE id = $idempleado");
	if($sentence->execute()){
		while ($row = $sentence->fetch()) {
			$empleado = $row;
		}
	}

	return $empleado;
}

/*public function deleteEmpleado($idempleado)
{

}

public function modifyEmpleado()
{

}*/

public function addEmpleado($url,$nombre,$apellidos,$sexo,$telefono,$direccion,$departamento,$antiguedad,$sueldo)
{

	$id = $this->dbc->prepare("SELECT id+1 FROM empleados where id = (SELECT max(id) FROM empleados)");
	$id->execute();
	$ide = $id->fetch();
	$sentence = $this->dbc->prepare("INSERT INTO empleados 
										VALUES $url,$nombre,$apellidos,$telefono,$direccion,$ide,$departamento,$antiguedad,$sueldo");
	$sentence->execute();
}

}
?>