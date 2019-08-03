
<?php
	include_once 'modelos/conexion.php';

	$consulta = Conexion::conectar()->prepare("SELECT * FROM events");
	$consulta -> execute();

	$consulta2 = Conexion::conectar()->prepare("SELECT * FROM rentabilidad");
	$consulta2 -> execute();

	$accion = (isset($_GET['accion']))?$_GET['accion']:'leer';

	switch ($accion) {
	 	case 'agregar':
	 		//echo "Insertando datos";

	 		$instertSQL = Conexion::conectar()->prepare("INSERT INTO events(title, description, color, textColor, start, ending)
	 			VALUES(:title, :description, :color, :textColor, :start, :ending)");

	 		$nuevoTitulo = $_POST['title'];
	 		$nuevaDesc = $_POST['descripcion'];
	 		$nuevoColor= $_POST['color'];
	 		$nuevoTColor= $_POST['textColor'];
	 		$inicio= $_POST['start'];
	 		$salida= $_POST['ending'];



	 		$instertSQL->bindParam(":title", $nuevoTitulo, PDO::PARAM_STR);
	 		$instertSQL->bindParam(":description", $nuevaDesc, PDO::PARAM_STR);
	 		$instertSQL->bindParam(":color", $nuevoColor, PDO::PARAM_STR);
	 		$instertSQL->bindParam(":textColor", $nuevoTColor, PDO::PARAM_STR);
	 		$instertSQL->bindParam(":start", $inicio, PDO::PARAM_STR);
	 		$instertSQL->bindParam(":ending", $salida, PDO::PARAM_STR);


			if($instertSQL->execute()){

			return "ok";

			}else{

			return "error";
		
			}


	 		echo json_encode($instertSQL);

	 		break;

	 		case 'eliminar':
	 		//echo "Eliminando datos";

	 		$respuesta=false;

	 		if (isset($_POST['id'])) {
	 			
	 			$eliminarSQL = Conexion::conectar()->prepare("DELETE FROM events WHERE id=:id");
	 			$respuesta= $eliminarSQL-> execute(array("id"=>$_POST['id']));

	 		}

	 		echo json_encode($respuesta);

	 		break;
	 		case 'editar':
	 		echo "Modificando datos";

	 		$editarSQL = Conexion::conectar()->prepare("UPDATE events SET title=:title,
	 				description=:description,
	 				color=:color,
	 				textColor=:textColor,
	 				start=:start,
	 				ending=:ending
	 				WHERE id=:id");

	 		$nuevoT = $_POST['title'];
	 		$nuevaD = $_POST['descripcion'];
	 		$nuevoC= $_POST['color'];
	 		$nuevoTC= $_POST['textColor'];
	 		$ini= $_POST['start'];
	 		$sal= $_POST['ending'];
	 		$id= $_POST['id'];

	 		$editarSQL->bindParam(":title", $nuevoT, PDO::PARAM_STR);
	 		$editarSQL->bindParam(":description", $nuevaD, PDO::PARAM_STR);
	 		$editarSQL->bindParam(":color", $nuevoC, PDO::PARAM_STR);
	 		$editarSQL->bindParam(":textColor", $nuevoTC, PDO::PARAM_STR);
	 		$editarSQL->bindParam(":start", $ini, PDO::PARAM_STR);
	 		$editarSQL->bindParam(":ending", $sal, PDO::PARAM_STR);
	 		$editarSQL->bindParam(":id" ,$id, PDO::PARAM_INT);	
	 		
	 		if($editarSQL->execute()){

			return "ok";

			}else{

			return "error";
		
			}


	 		echo json_encode($editarSQL);
	 		break;

	 		case 'agregarInversion':

	 		(int)$inversion = $_POST['inve'];

	 		$editarInversionSQL = Conexion::conectar()->prepare("UPDATE rentabilidad SET inversion=inversion + $inversion
	 				WHERE id=id");

	 		

	 		$editarInversionSQL->bindParam(":inversion", $inversion, PDO::PARAM_STR);
	 		
	 		if($editarInversionSQL->execute()){

			return "ok";

			}else{

			return "error";
		
			}


	 		echo json_encode($editarInversionSQL);

	 			break;
	 	
	 	default:

	 		$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

			echo json_encode($resultado);

	 		break;
	 } 


	


?>

