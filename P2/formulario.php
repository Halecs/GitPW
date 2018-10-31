<!DOCTYPE html>
<html lang="es">
<head>
	<title>Formulario agregar nuevo empleado</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body style="background-color:LightYellow">
	<h2 align='center'>Agregar nuevo empleado</h2>
<?php
  require_once('BDlibrary.php');

  $q = new ConsultaEmpresa();
  if(isset($_GET["nombreform"]))
  {
    $q->addEmpleado($_GET["Url"],$_GET["nombreform"],$_GET["apellidosform"],$_GET["optionsRadios"],$_GET["telefonoform"],$_GET["direccionform"],$_GET["departamento"],$_GET["antiguedad"],$_GET["sueldo"]);
  }
  else
  {

echo <<<END
<center>
<form method="GET" action="formulario.php">
<div class="form-group">
<label for="nombreform">URL Foto</label>
  <input type="text" class="form-control" id="url" placeholder="Introduce url de la foto del empleado" style="width:35%">  
</div>
<div class="form-group">
<label for="nombreform">Nombre</label>
	<input type="text" class="form-control" id="nombreform" placeholder="Introduce nombre del empleado" style="width:35%">  
</div>
<div class="form-group">
	<label for="apellidosform">Apellidos</label>
	<input type="text" class="form-control" id="apellidosform" placeholder="Introduce apellidos del empleado" style="width:35%">  
</div>
<fieldset class="form-group">
    <legend>Sexo</legend>
    <div class="form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1">
        	Hombre
      </label>
    </div>
    <div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
        Mujer
      </label>
    </div>
    <div class="form-check disabled">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3">
        Otro
      </label>
    </div>
  </fieldset>
<div class="form-group">
	<label for="telefonoform">Telefono</label>
	<input type="text" class="form-control" id="telefonoform" placeholder="Introduce telefono del empleado" style="width:25%">  
</div>
<div class="form-group">
	<label for="direccionform">Direccion</label>
	<input type="text" class="form-control" id="direccionform" placeholder="Introduce direccion del empleado" style="width:35%">  
</div>
<fieldset class="form-group">
    <legend>Departamento</legend>
    <div class="form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="departamento" id="RRHH" value="option1">
        Recursos humanos
      </label>
    </div>
    <div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="departamento" id="AT" value="option2">
        Atencion al cliente
      </label>
    </div>
    <div class="form-check disabled">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="departamento" id="Finanzas" value="option3">
        Finanzas
      </label>
    </div>
    <div class="form-check disabled">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="departamento" id="MF" value="option3">
        Manufactura
      </label>
    </div>
  </fieldset>
</div>
<div class="form-group">
	<label for="direccionform">Antiguedad</label>
	<input type="text" class="form-control" id="antiguedad" placeholder="Introduce antiguedad del empleado" style="width:25%">  
</div>
<div class="form-group">
	<label for="direccionform">Sueldo</label>
	<input type="text" class="form-control" id="sueldo" placeholder="Introduce sueldo del empleado" style="width:25%">  
</div>
<input type="submit" value="Submit">
</form>
</center>
END;
}
?>
</body>
</html>