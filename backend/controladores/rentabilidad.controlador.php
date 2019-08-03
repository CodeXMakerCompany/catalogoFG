<?php

class ControladorRentabilidad{

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarRentabilidad($item, $valor){

		$tabla = "rentabilidad";

		$respuesta = ModeloRentabilidad::mdlMostrarRentabilidad($tabla, $item, $valor);

		return $respuesta;

	}
}