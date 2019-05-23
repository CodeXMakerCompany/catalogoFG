<?php

class ControladorProductos{

	/*=============================================
	MOSTRAR CATEGORÍAS
	=============================================*/

	static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloProductos::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR SUBCATEGORÍAS
	=============================================*/

	static public function ctrMostrarSubCategorias($item, $valor){

		$tabla = "subcategorias";

		$respuesta = ModeloProductos::mdlMostrarSubCategorias($tabla, $item, $valor);

		return $respuesta;

	}


	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductos($ordenar){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $ordenar);

		return $respuesta;

	}

}

