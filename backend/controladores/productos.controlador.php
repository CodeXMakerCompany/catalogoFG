<?php


class ControladorProductos{

	/*=============================================
	=            MOSTRAR PRODUCTOS         =
	=============================================*/
	static public function ctrMostrarProductos($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	=            SUBIR MULTIMEDIA               =
	=============================================*/

	static public function ctrSubirMultimediaTemporal($datos, $ruta){

		if (isset($datos["tmp_name"]) && !empty($datos["tmp_name"])) {
			
				/*=============================================
				=            DEFINIR MEDIDAS                 =
				=============================================*/

				list($ancho, $alto) = getimagesize($datos["tmp_name"]);

				$nuevoAncho = 1000;
				$nuevoAlto = 1000;

				/*=============================================
				  CREAR DIRECTORIO PARA MANDAR LA FOTO DE LA MULTIMEDIA                 				=
				=============================================*/

				$directorio = "../vistas/img/multimedia/".$ruta;

				/*=============================================
				  PRIMERO PREGUNTAMOS SI EXISTE UN DIRECTORIO DE MULTIMEDIA CON ESTA RUTA                				=
				=============================================*/

				if (!file_exists($directorio)) {
					
					mkdir($directorio, 0755);

				}

				/*=============================================
				  DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP                				=
				=============================================*/

			if ($datos["type"] == "image/jpeg") {
				
				#Guardamos la imagen en el directorio

				$rutaMultimedia = $directorio."/".$datos["name"];

				$origen = imagecreatefromjpeg($datos["tmp_name"]);

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $rutaMultimedia);

			}

			if ($datos["type"] == "image/png") {
				
				#Guardamos la imagen en el directorio

				$rutaMultimedia = $directorio."/".$datos["name"];

				$origen = imagecreatefrompng($datos["tmp_name"]);

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagealphablending($destino, FALSE);

				imagesavealpha($destino, TRUE);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagepng($destino, $rutaMultimedia);

			}

			return $rutaMultimedia;



		}
	}

	/*=============================================
		=            CREAR PRODUCTOS            =
		=============================================*/

		static public function ctrCrearProducto($datos){

			if (isset($datos["tituloProducto"])) {
				

				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$datos["tituloProducto"]) && 
					preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$datos["descripcionProducto"])){
				/*=============================================
				VALIDAR IMAGEN PORTADA
				=============================================*/

				$rutaPortada = "../vistas/img/preloader/example.gif";

				if(isset($datos["fotoPortada"]["tmp_name"]) && !empty($datos["fotoPortada"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($datos["fotoPortada"]["tmp_name"]);	

					$nuevoAncho = 1280;
					$nuevoAlto = 720;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPortada"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaPortada = "../vistas/img/cabeceras/".$datos["rutaProducto"].".jpg";

						$origen = imagecreatefromjpeg($datos["fotoPortada"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);

					}

					if($datos["fotoPortada"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaPortada = "../vistas/img/cabeceras/".$datos["rutaProducto"].".png";

						$origen = imagecreatefrompng($datos["fotoPortada"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
				
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaPortada);

					}

				}

				/*=============================================
				VALIDAR IMAGEN PRINCIPAL
				=============================================*/

				$rutaFotoPrincipal = "../vistas/img/preloader/example.gif";

				if(isset($datos["fotoPrincipal"]["tmp_name"]) && !empty($datos["fotoPrincipal"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($datos["fotoPrincipal"]["tmp_name"]);	

					$nuevoAncho = 400;
					$nuevoAlto = 450;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPrincipal"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../vistas/img/productos/".$datos["rutaProducto"].".jpg";

						$origen = imagecreatefromjpeg($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaFotoPrincipal);

					}

					if($datos["fotoPrincipal"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../vistas/img/productos/".$datos["rutaProducto"].".png";

						$origen = imagecreatefrompng($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
				
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaFotoPrincipal);

					}

				}

				/*=============================================
				PREGUNTAMOS SI VIENE OFERTE EN CAMINO
				=============================================*/

				if($datos["selActivarOferta"] == "oferta"){

					$datosProducto = array(
						   "titulo"=>$datos["tituloProducto"],
						   "idCategoria"=>$datos["categoria"],
						   "idSubCategoria"=>$datos["subCategoria"],
						   "detalles"=>$datos["detalles"],
						   "multimedia"=>$datos["multimedia"],
						   "ruta"=>$datos["rutaProducto"],
						   "titular"=> substr($datos["descripcionProducto"], 0, 225)."...",
						   "descripcion"=> $datos["descripcionProducto"],
						   "palabrasClaves"=> $datos["pClavesProducto"],
						   "precio"=> $datos["precio"],
						   "peso"=> $datos["peso"],
						   "entrega"=> $datos["entrega"],  
						   "imgPortada"=>substr($rutaPortada,3),
						   "imgFotoPrincipal"=>substr($rutaFotoPrincipal,3),
						   "oferta"=>1,
						   "precioOferta"=>$datos["precioOferta"],
						   "descuentoOferta"=>$datos["descuentoOferta"]
					   );


				}else{

					$datosProducto = array(
						   "titulo"=>$datos["tituloProducto"],
						   "idCategoria"=>$datos["categoria"],
						   "idSubCategoria"=>$datos["subCategoria"],
						   "detalles"=>$datos["detalles"],
						   "multimedia"=>$datos["multimedia"],
						   "ruta"=>$datos["rutaProducto"],
						   "titular"=> substr($datos["descripcionProducto"], 0, 225)."...",
						   "descripcion"=> $datos["descripcionProducto"],
						   "palabrasClaves"=> $datos["pClavesProducto"],
						   "precio"=> $datos["precio"],
						   "peso"=> $datos["peso"],
						   "entrega"=> $datos["entrega"],  
						   "imgPortada"=>substr($rutaPortada,3),
						   "imgFotoPrincipal"=>substr($rutaFotoPrincipal,3),
						   "oferta"=>0,
						   "precioOferta"=>0,
						   "descuentoOferta"=>0
					   );

				}

				ModeloCabeceras::mdlIngresarCabecera("cabeceras", $datosProducto);

				$respuesta = ModeloProductos::mdlIngresarProducto("productos", $datosProducto);

				return $respuesta;


			}else{

					echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre del producto no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';



			}
		}
	}

}
