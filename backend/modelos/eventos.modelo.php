<?php

require_once "conexion.php";

class ModeloEventos{

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarTotalEventosHoy($tabla, $item, $valor, $incioHoy, $finalHoy){

		$stmt = Conexion::conectar()->prepare("SELECT count(id) as 'TotalEventos' FROM events WHERE (START BETWEEN '$incioHoy' and '$finalHoy')");

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