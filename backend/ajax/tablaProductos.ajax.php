<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/subcategorias.controlador.php";
require_once "../modelos/subcategorias.modelo.php";

require_once "../controladores/cabeceras.controlador.php";
require_once "../modelos/cabeceras.modelo.php";


class TablaProductos{

	public function mostrarTablaProductos(){

		$item = null;
		$valor = null;

		$productos = ControladorProductos::ctrMostrarProductos($item, $valor);

		$datosJson = '

		{

			"data":[';

			for ($i=0; $i < count($productos)-1; $i++) {

			/*=============================================================
			=           TRAER LAS CATEGORIAS				             =
			=============================================================*/ 

			$item = "id";
			$valor = $productos[$i]["id_categoria"];

			$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

			if ($categorias["categoria"] == "") {
				
				$categoria = "SIN CATEGORÍA";

			}else{

				$categoria = $categorias["categoria"];
			}

			/*=============================================================
			=           TRAER LAS SUBCATEGORIAS				             =
			=============================================================*/ 

			$item2 = "id";
			$valor2 = $productos[$i]["id_subcategoria"];

			$subcategorias = ControladorSubCategorias::ctrMostrarSubCategorias($item2, $valor2);

			if ($subcategorias[0]["subcategoria"] == "") {
				
				$subcategoria = "SIN SUBCATEGORÍA";

			}else{

				$subcategoria = $subcategorias[0]["subcategoria"];
			}


			/*=============================================================
			=           TRAER LAS CABECERAS		             =
			=============================================================*/

			$item3 ="ruta";
			$valor3 = $productos[$i]["ruta"];

			$cabeceras = ControladorCabeceras::ctrMostrarCabeceras($item3, $valor3);

			if ($cabeceras["portada" != ""]) {
				
				$imagenPortada = "<img src='".$cabeceras["portada"]."' class='img-thumbnail imgPortadaProductos' width='100px'>";
			}else {

				$imagenPortada = "<img src='vistas/img/preloader/kokoro.gif' class='img-thumbnail imgPortadaProductos' width='100px'>";

			}

			/*=============================================================
			=           TRAER IMAGEN PRINCIPAL	             =
			=============================================================*/

			$imagenPrincipal = "<img src='".$productos[$i]["portada"]."' class='img-thumbnail imgTablaProductos' width='100px'>";
/*=============================================
			TRAER MULTIMEDIA
  			=============================================*/

  			if($productos[$i]["multimedia"] != null){

  				$multimedia = json_decode($productos[$i]["multimedia"],true);

  				

  					$vistaMultimedia = "<img src='".$multimedia[0]["foto"]."' class='img-thumbnail imgTablaMultimedia' width='100px'>";

  					

  				

  			}
  			/*=============================================
  			TRAER DETALLES *CHECAR ARRAYS*
  			=============================================*/

  			$detalles = json_decode($productos[$i]["detalles"],true);

  				if($productos[$i]["id"] != null){

  				$medidas = json_encode($detalles["Medidas empaquetado"]);
				$material = json_encode($detalles["Material"]);
				$grado = json_encode($detalles["Grado de terminacion"]);
				$pais = json_encode($detalles["Pais"]);
				$dimensiones = json_encode($detalles["Dimensiones"]);
				$escala = json_encode($detalles["Escala"]);
				$version = json_encode($detalles["Version"]);
				$marca = json_encode($detalles["Marca"]);
				$peso = json_encode($detalles["Peso"]);

				$vistaDetalles = "Medidas empaquetado: ".str_replace(array("[","]",'"'), "", $medidas)." - Material: ".str_replace(array("[","]",'"'), "", $material)." - Grado de terminacion: ".str_replace(array("[","]",'"'), "", $grado)." - Pais: ".str_replace(array("[","]",'"'), "", $pais)." - Dimensiones: ".str_replace(array("[","]",'"'), "", $dimensiones)." - Escala: ".str_replace(array("[","]",'"'), "", $escala)." - Version: ".str_replace(array("[","]",'"'), "", $version)." - Marca: ".str_replace(array("[","]",'"'), "", $marca)." - Peso: ".str_replace(array("[","]",'"'), "", $peso);


  			}


  			/*=============================================
  			TRAER PRECIO
  			=============================================*/

  			if($productos[$i]["precio"] == 0){

  				$precio = "Gratis";
  			
  			}else{

  				$precio = "$ ".number_format($productos[$i]["precio"],2);

  			}

  			/*=============================================
  			TRAER ENTREGA
  			=============================================*/

  			if($productos[$i]["entrega"] == 0){

  				$entrega = "Inmediata";
  			
  			}else{

  				$entrega = $productos[$i]["entrega"]. " días hábiles";

  			}

  			/*=============================================
  			REVISAR SI HAY OFERTAS
  			=============================================*/
  			
			if($productos[$i]["oferta"] != 0){

				if($productos[$i]["precioOferta"] != 0){	

					$tipoOferta = "PRECIO";
					$valorOferta = "$ ".number_format($productos[$i]["precioOferta"],2);

				}else{

					$tipoOferta = "DESCUENTO";
					$valorOferta = $productos[$i]["descuentoOferta"]." %";	

				}	

			}else{

				$tipoOferta = "No tiene oferta";
				$valorOferta = 0;
				
			}

	  		/*=============================================
  			TRAER LAS ACCIONES
  			=============================================*/

  			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' rutaCabecera='".$productos[$i]["ruta"]."' imgPortada='".$cabeceras["portada"]."' imgPrincipal='".$productos[$i]["portada"]."'><i class='fa fa-times'></i></button></div>";

  			/*=============================================
  			CONSTRUIR LOS DATOS JSON
  			=============================================*/


				$datosJson.='[
					
					"'.($i+1).'",
					"'.$productos[$i]["titulo"].'",
					"'.$categoria.'",
					"'.$subcategoria.'",
					"'.$productos[$i]["ruta"].'",
					"'.$cabeceras["descripcion"].'",
				  	"'.$cabeceras["palabrasClaves"].'",
				  	"'.$imagenPortada.'",
				  	"'.$imagenPrincipal.'",
			 	  	"'.$vistaMultimedia.'",
				  	"'.$vistaDetalles.'",
		  			"'.$precio.'",
				  	"'.$productos[$i]["peso"].' kg",
				  	"'.$entrega.'",
				  	"'.$tipoOferta.'",
				  	"'.$valorOferta.'",			
				  	"'.$acciones.'"


				],';

			}


			$datosJson = substr($datosJson, 2, -1);

			$datosJson .= ']

			}';

			echo $datosJson;
	
	}
}

/*=============================================
  			ACTIVAR TABLA PRODUCTOS
=============================================*/

$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();