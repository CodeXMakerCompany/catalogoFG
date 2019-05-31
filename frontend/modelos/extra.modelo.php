<?php  

require_once "conexion.php";

class ModeloExtra{

	static public function mdlMostrarExtra($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetch();

			$stmt -> close();

			$stmt = null;
	}


}