<?php  
		
 require_once "../controladores/productos.controlador.php";
 require_once "../modelos/productos.modelo.php";

 require_once "../controladores/categorias.controlador.php";
 require_once "../modelos/categorias.modelo.php";

 require_once "../controladores/subcategorias.controlador.php";
 require_once "../modelos/subcategorias.modelo.php";

 require_once "../controladores/cabeceras.controlador.php";
 require_once "../modelos/cabeceras.modelo.php";

 	class AjaxProductos{
 		/*========================================
 		=            VALIDAR PRODUCTO            =
 		========================================*/
 		
 		public $validarProducto;

 		public function ajaxValidarProducto(){

 			$item = "titulo";
 			$valor = $this->validarProducto;

 			$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);
 			echo json_encode($respuesta);
 		} 
 		
 		
 		/*=====  End of VALIDAR PRODUCTO  ======*/
 		
 		/*========================================
 		=      RECIBIR MULTIMEDIA   			=
 		========================================*/

 		public $imagenMultimedia;
 		public $rutaMultimedia;

 		public function ajaxRecibirMultimedia(){

 			$datos = $this->imagenMultimedia;
 			$ruta = $this->rutaMultimedia;

 			$respuesta = ControladorProductos::ctrSubirMultimediaTemporal($datos, $ruta);

 			echo $respuesta;
 		}
 	}

 	/*========================================
 		=      VALIDAR no repetir PRODUCTO   =
 		========================================*/

 	if (isset($_POST["validarProducto"])) {
 			
 			$valProducto = new AjaxProductos();
 			$valProducto -> validarProducto = $_POST["validarProducto"];
 			$valProducto -> ajaxValidarProducto();
 			
 		}

 		/*========================================
 		=      RECIBIR ARCHIVOS MULTIMEDIA   =
 		========================================*/

 			if (isset($_FILES["file"])) {
 					
 					$multimedia = new AjaxProductos();
 					$multimedia -> imagenMultimedia = $_FILES["file"];
 					$multimedia -> rutaMultimedia = $_POST["ruta"];
 					$multimedia -> ajaxRecibirMultimedia();
 					
 				}	