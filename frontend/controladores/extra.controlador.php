<?php 

class ControladorExtra{

	public function ctrMostrarExtra(){


		$tabla = "extras";

		$respuesta = ModeloExtra::mdlMostrarExtra($tabla);

		return $respuesta;

	}


}
