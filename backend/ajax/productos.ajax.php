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

 			echo $respuesta;

 		}

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
 		
 		/*========================================
 		=      GUARDAR PRODUCTO Y EDITARLO       =
 		========================================*/

 		public $tituloProducto;
 		public $rutaProducto;
 		public $detalles;
 		public $seleccionarCategoria;
 		public $seleccionarSubCategoria;
 		public $descripcionProducto;
 		public $pClavesProducto;
 		public $precio;
 		public $peso;
 		public $entrega;
 		public $multimedia;
 		public $fotoPortada;
 		public $fotoPrincipal;
 		public $selActivarOferta;
 		public $precioOferta;
 		public $descuentoOferta;

 		public $id;
 		public $antiguaFotoPortada;
 		public $antiguaFotoPrincipal;
 		public $idCabecera;


 		public function ajaxCrearProducto(){

 			$datos = array(

							"tituloProducto"=>$this->tituloProducto,
							"rutaProducto"=>$this->rutaProducto,
							"detalles"=>$this->detalles,
							"categoria"=>$this->seleccionarCategoria,
							"subCategoria"=>$this->seleccionarSubCategoria,
							"descripcionProducto"=>$this->descripcionProducto,
							"pClavesProducto"=>$this->pClavesProducto,
							"precio"=>$this->precio,
							"peso"=>$this->peso,
							"entrega"=>$this->entrega,
							"multimedia"=>$this->multimedia,
							"fotoPortada"=>$this->fotoPortada,
							"fotoPrincipal"=>$this->fotoPrincipal,
							"selActivarOferta"=>$this->selActivarOferta,
							"precioOferta"=>$this->precioOferta,
							"descuentoOferta"=>$this->descuentoOferta
							);

 			$respuesta = ControladorProductos::ctrCrearProducto($datos);

 			echo $respuesta;

 		}
		
		/*=============================================
		TRAER PRODUCTOS
		=============================================*/	

		public $idProducto;

		public function ajaxTraerProducto(){

			$item = "id";
			$valor = $this->idProducto;

			$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

			echo json_encode($respuesta);

		}	
	
	/*=============================================
	EDITAR PRODUCTOS
	=============================================*/	

	public function ajaxEditarProducto(){

		$datos = array(
			"idProducto"=>$this->id,
			"tituloProducto"=>$this->tituloProducto,
			"rutaProducto"=>$this->rutaProducto,					
			"categoria"=>$this->seleccionarCategoria,
			"subCategoria"=>$this->seleccionarSubCategoria,
			"descripcionProducto"=>$this->descripcionProducto,
			"pClavesProducto"=>$this->pClavesProducto,
			"precio"=>$this->precio,
			"peso"=>$this->peso,
			"entrega"=>$this->entrega,
			"multimedia"=>$this->multimedia,
			"fotoPortada"=>$this->fotoPortada,
			"fotoPrincipal"=>$this->fotoPrincipal,
			"selActivarOferta"=>$this->selActivarOferta,
			"precioOferta"=>$this->precioOferta,
			"descuentoOferta"=>$this->descuentoOferta,
			"antiguaFotoPortada"=>$this->antiguaFotoPortada,
			"antiguaFotoPrincipal"=>$this->antiguaFotoPrincipal,
			"idCabecera"=>$this->idCabecera
			);

		$respuesta = ControladorProductos::ctrEditarProducto($datos);

	
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
/*========================================
=      CREAR PRODUCTO                   =
========================================*/

if (isset($_POST["tituloProducto"])) {

	 $producto = new AjaxProductos();
	 $producto -> tituloProducto = $_POST["tituloProducto"];
	 $producto -> rutaProducto = $_POST["rutaProducto"];
	 $producto -> detalles = $_POST["detalles"];
	 $producto -> seleccionarCategoria = $_POST["seleccionarCategoria"];
	 $producto -> seleccionarSubCategoria = $_POST["seleccionarSubCategoria"];
	 $producto -> descripcionProducto = $_POST["descripcionProducto"];
	 $producto -> pClavesProducto = $_POST["pClavesProducto"];
	 $producto -> precio = $_POST["precio"];
	 $producto -> peso = $_POST["peso"];
	 $producto -> entrega = $_POST["entrega"];
	 $producto -> multimedia = $_POST["multimedia"];

	 			if (isset($_FILES["fotoPortada"])) {
	 				
	 				$producto -> fotoPortada = $_FILES["fotoPortada"];

	 			}else{

	 				$producto -> fotoPortada = null;

	 			}

	 			if (isset($_FILES["fotoPrincipal"])) {
	 				
	 				$producto -> fotoPrincipal = $_FILES["fotoPrincipal"];

	 			}else{

	 				$producto -> fotoPrincipal = null;

	 			}

	 			$producto -> selActivarOferta = $_POST["selActivarOferta"];
	 			$producto -> precioOferta = $_POST["precioOferta"];
	 			$producto -> descuentoOferta = $_POST["descuentoOferta"];

	 			$producto -> ajaxCrearProducto();

 					}
 	/*=============================================
	TRAER PRODUCTO
	=============================================*/
	if(isset($_POST["idProducto"])){

		$traerProducto = new AjaxProductos();
		$traerProducto -> idProducto = $_POST["idProducto"];
		$traerProducto -> ajaxTraerProducto();

	}

/*=============================================
EDITAR PRODUCTO
=============================================*/
if(isset($_POST["id"])){

	$editarProducto = new AjaxProductos();
	$editarProducto -> id = $_POST["id"];
	$editarProducto -> tituloProducto = $_POST["editarProducto"];
	$editarProducto -> rutaProducto = $_POST["rutaProducto"];		
	$editarProducto -> seleccionarCategoria = $_POST["seleccionarCategoria"];
	$editarProducto -> seleccionarSubCategoria = $_POST["seleccionarSubCategoria"];
	$editarProducto -> descripcionProducto = $_POST["descripcionProducto"];
	$editarProducto -> pClavesProducto = $_POST["pClavesProducto"];
	$editarProducto -> precio = $_POST["precio"];
	$editarProducto -> peso = $_POST["peso"];
	$editarProducto -> entrega = $_POST["entrega"];
	$editarProducto -> multimedia = $_POST["multimedia"];

	if(isset($_FILES["fotoPortada"])){

		$editarProducto -> fotoPortada = $_FILES["fotoPortada"];

	}else{

		$editarProducto -> fotoPortada = null;

	}	

	if(isset($_FILES["fotoPrincipal"])){

		$editarProducto -> fotoPrincipal = $_FILES["fotoPrincipal"];

	}else{

		$editarProducto -> fotoPrincipal = null;

	}	

	$editarProducto -> selActivarOferta = $_POST["selActivarOferta"];
	$editarProducto -> precioOferta = $_POST["precioOferta"];
	$editarProducto -> descuentoOferta = $_POST["descuentoOferta"];		

	$editarProducto -> antiguaFotoPortada = $_POST["antiguaFotoPortada"];
	$editarProducto -> antiguaFotoPrincipal = $_POST["antiguaFotoPrincipal"];
	$editarProducto -> idCabecera = $_POST["idCabecera"];

	$editarProducto -> ajaxEditarProducto();

}				 					