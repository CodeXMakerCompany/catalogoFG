<?php 

				
				$item1 = "ruta";
				$valor1 = $rutas[0];

				$categoria = ControladorProductos::ctrMostrarCategorias($item1, $valor1);

				if(!$categoria){

				$subCategoria = ControladorProductos::ctrMostrarSubCategorias($item1, $valor1);

				$item2 = "id_subcategoria";
					$valor2 = $subCategoria[0]["id"];

				}else {

					$item2 = "id_categoria";
					$valor2 = $categoria["id"];
				}

				$ordenar = "id";

				$productos = ControladorProductos::ctrMostrarProductos($ordenar, $item2, $valor2);

				var_dump($productos);

				if (!$productos) {
					

					echo 'aun no hay productos en esta seccion';

				}
				
 ?>