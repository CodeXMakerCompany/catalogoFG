<?php

require_once "conexion.php";

class ModeloCabeceras{

	/*=============================================
	MOSTRAR CABECERAS
	=============================================*/

	static public function mdlMostrarCabeceras($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		
		$stmt = null;
	
	}

	/*=============================================
	CREAR CABECERAS
	=============================================*/

	static public function mdlIngresarCabecera($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ruta, titulo, descripcion, palabrasClaves, portada) VALUES (:ruta, :titulo, :descripcion, :palabrasClaves, :portada)");

		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":palabrasClaves", $datos["palabrasClaves"], PDO::PARAM_STR);
		$stmt->bindParam(":portada", $datos["imgPortada"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;


	}
	
}