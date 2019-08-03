<?php

require_once "conexion.php";

class ModeloRentabilidad{

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarRentabilidad($tabla, $item, $valor){

		

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetch();
		

			$stmt -> close();
		
			$stmt = null;
	
	}
}