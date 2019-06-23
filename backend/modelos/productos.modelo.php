<?php 

require_once "conexion.php";

class ModeloProductos{
	

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarProductos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;


	}

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	

	



	static public function mdlIngresarProducto($tabla, $datos){

		/*====Añadir datos de vistas, ventas y nuevo =======*/

		$vistas = 1;
		$ventas = 0;
		$nuevo = 1;

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, id_subcategoria, ruta, titulo, titular, descripcion, multimedia, detalles, precio, portada, oferta, precioOferta, descuentoOferta, peso, entrega, vistas, ventas, nuevo) VALUES (:id_categoria, :id_subcategoria, :ruta, :titulo, :titular, :descripcion, :multimedia, :detalles, :precio, :portada, :oferta, :precioOferta, :descuentoOferta, :peso, :entrega, :vistas, :ventas, :nuevo)");
		/*enlace de datos*/
		$stmt->bindParam(":id_categoria", $datos["idCategoria"], PDO::PARAM_STR);
		$stmt->bindParam(":id_subcategoria", $datos["idSubCategoria"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":titular", $datos["titular"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":multimedia", $datos["multimedia"], PDO::PARAM_STR);
		$stmt->bindParam(":detalles", $datos["detalles"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":portada", $datos["imgFotoPrincipal"], PDO::PARAM_STR);
		$stmt->bindParam(":oferta", $datos["oferta"], PDO::PARAM_STR);
		$stmt->bindParam(":precioOferta", $datos["precioOferta"], PDO::PARAM_STR);
		$stmt->bindParam(":descuentoOferta", $datos["descuentoOferta"], PDO::PARAM_STR);
		$stmt->bindParam(":peso", $datos["peso"], PDO::PARAM_STR);
		$stmt->bindParam(":entrega", $datos["entrega"], PDO::PARAM_STR);

		$stmt->bindParam(":vistas",$vistas, PDO::PARAM_STR);
		$stmt->bindParam(":ventas",$ventas, PDO::PARAM_STR);
		$stmt->bindParam(":nuevo",$nuevo , PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	
}