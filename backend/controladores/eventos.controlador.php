<?php

class ControladorEventos{

	/*=============================================
	MOSTRAR NUMERO DE EVENTOS
	=============================================*/

	static public function ctrMostrarEventosHoy($item, $valor, $incioHoy, $finalHoy){

		$tabla = "events";

		$respuesta = ModeloEventos::mdlMostrarTotalEventosHoy($tabla, $item, $valor, $incioHoy, $finalHoy);

		return $respuesta;

	}

	static public function ctrMostrarEventosTotal($item, $valor){

		$tabla = "events";

		$respuesta = ModeloEventos::mdlMostrarTotalEventosTotal($tabla, $item, $valor);

		return $respuesta;

	}

}