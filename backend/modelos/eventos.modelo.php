<?php

require_once "conexion.php";

class ModeloEventos{

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarTotalEventosHoy($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT count(id) as 'TotalEventos' FROM events WHERE start <= CURRENT_TIMESTAMP()");

			$stmt -> execute();

			return $stmt -> fetch();

		$stmt -> close();
		
		$stmt = null;
	
	}

	static public function mdlMostrarTotalEventosTotal($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT count(id) as 'TotalEventos' FROM events");

			$stmt -> execute();

			return $stmt -> fetch();

		$stmt -> close();
		
		$stmt = null;
	
	}
}