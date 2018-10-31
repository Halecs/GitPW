/*CREAMOS BASE DE DATOS */
CREATE DATABASE empresa;

/*Usamos la base de datos*/
USE empresa;

/*Creamos una tabla dentro de la base de datos*/
CREATE TABLE empleados(
	/*definimos los campos de empleados*/
	nombre VARCHAR(256) NOT NULL,
	apellidos VARCHAR(256) NOT NULL,
	telefono int NOT NULL,
	direccion VARCHAR(256) NOT NULL,
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,

	/* Definimos clave primaria*/
	PRIMARY KEY(id)
)

