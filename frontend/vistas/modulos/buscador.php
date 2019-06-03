<!--=====================================
BARRA PRODUCTOS
======================================-->

<div class="container-fluid well well-sm barraProductos" style="margin-bottom: 10px;">

	<div class="container">
		
		<div class="row">

			<div class="col-sm-12 col-xs-12">
				
				<div class="btn-group pull-right">

						  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="margin: 5px;">
						     Ordenar Productos <span class="caret"></span></button>
						  </button>

					  <ul class="dropdown-menu" role="menu" style="background-color: black;">

					  <?php
					  	
						echo '<li><a style="color: white;" href="'.$url.$rutas[0].'/1/recientes/'.$rutas[3].'">Más reciente</a></li>
							  <li><a style="color: white;" href="'.$url.$rutas[0].'/1/antiguos/'.$rutas[3].'">Más antiguo</a></li>';

						?>

					  </ul>

				</div>

			</div>

		</div>

	</div>

</div>

<!--=====================================
LISTAR PRODUCTOS
======================================-->

<div class="container-fluid productos">

	<div class="container">
		
		<div class="row">

			<!--=====================================
			BREADCRUMB O MIGAS DE PAN
			======================================-->
		<nav aria-label="breadcrumb">
					<ul class="breadcrumb fondoBreadcrumb">
						
						<li class="breadcrumb-item active"><a href="<?php echo $url;  ?>">INICIO</a></li>
						
						<li class="breadcrumb-item active pagActiva"><?php echo $rutas[0]; ?></li>

					</ul>
		</nav>


		<?php 
		/*--=====================================
			LLAMADO DE PAGINACION
			======================================--*/


			if (isset($rutas[1])) {
				/*si se esta usando rutas 2 es por que vienen los valores de recientes o antiguos*/

				if (isset($rutas[2])) {
					
					if ($rutas[2] == "antiguos") {

						$modo = "ASC";

						$_SESSION["ordenar"] = $modo;

					}else{

						$modo = "DESC";

						$_SESSION["ordenar"] = $modo;

					}
				}else{

					$modo = $_SESSION["ordenar"];

				}
					
					$base = ($rutas[1] - 1)*12;
					$tope = 12;

				}else{

					$rutas[1] = 1;
					$base = 0;
					$tope = 12;
					$modo = "DESC";

				}	


		/*--=====================================
			LLAMADO DE PRAODUCTOS, DE CATEGORIAS SUBCATEGORIAS Y DESTACADOS
			======================================--*/

			$productos = null;
			$listaProductos = null;

			$ordenar ="id";
			
				if (isset($rutas[3])) {

					$busqueda = $rutas[3];

							$productos = ControladorProductos::ctrBuscarProductos($busqueda,  $ordenar, $modo, $base, $tope);

						$listaProductos = ControladorProductos::ctrListarProductosBusqueda($busqueda);

						}		
						
						

						

						if (!$productos) {
							

							echo '<div class="col-xs-12 error404 text-center">

								 <h1><small>¡Oops!</small></h1>

								 <h2 style="color:white;">Aún no hay productos en esta sección</h2>

							</div>';

						}else {


								echo '<section id="team">
								<div class="card-columns">';

								

							

							foreach ($productos as $key => $value) {

								echo '
								<div class="card bg-light mb-3">

									<a href="'.$value["ruta"].'">
									    <img class="card-img-top" src="'.$servidor.$value["portada"].'" alt="Card image cap">
									    <div class="card-body">

									    '.$value["id"].'

									      <h5 class="card-title" style="color:black;">'.$value["titulo"].'</h5>';
								
								if ($value["nuevo"] != 0) {

									echo '<span class="badge badge-success">Nuevo</span> ' ;
								}

								if ($value["oferta"] != 0) {

									echo '<span class="badge badge-warning">'.$value["descuentoOferta"].'% off</span>';		

								}

								
								if ($value["precio"] == 0) {
								
									echo '<strong>	articulo gratuito </strong>';

								}else {

									if ($value["oferta"] !=0) {
										
										echo '<strong>  '.$value["precio"].' USD $</strong>';
									}else{

										echo '<strong> USD $ '.$value["precio"].' </strong>';
									}

								}

						echo '</a>

									      <p class="card-text">'.$value["descripcion"].'</p>
									    </div>
									  </div>';
							}
							
								echo'</div>
								</section>';

						}
						
		 ?>
			
			<!--=====================================
			PAGINACIÓN
			======================================-->
			
			<?php

				if(count($listaProductos) != 0){

					$pagProductos = ceil(count($listaProductos)/12);

					if($pagProductos > 4){

						/*=============================================
						LOS BOTONES DE LAS PRIMERAS 4 PÁGINAS Y LA ÚLTIMA PÁG
						=============================================*/

						if($rutas[1] == 1){

							echo '<nav aria-label="Page navigation example">
  									<ul class="pagination">';
							
							for($i = 1; $i <= 4; $i ++){

								echo '<li class="page-item" id="item'.$i.'"><a class="page-link" href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';

							}

							echo ' <li class="page-item disabled">
      									<a class="page-link" href="#" tabindex="-1">...</a>
   													 </li>
								   <li class="page-item" id="item'.$pagProductos.'"><a class="page-link" href="'.$url.$rutas[0].'/'.$pagProductos.'/'.$rutas[2].'/'.$rutas[3].'">'.$pagProductos.'</a></li>
								   <li "page-item"><a class="page-link" href="'.$url.$rutas[0].'/2/'.$rutas[2].'/'.$rutas[3].'">next</a></li>

							</ul>
							</nav>';

						}

						/*=============================================
						LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO
						=============================================*/

						else if($rutas[1] != $pagProductos && 
							    $rutas[1] != 1 &&
							    $rutas[1] <  ($pagProductos/2) &&
							    $rutas[1] < ($pagProductos-3)
							    ){

								$numPagActual = $rutas[1];

								echo '<nav aria-label="Page navigation example">
										<ul class="pagination">
									  <li class="page-item"><a class="page-link" href="'.$url.$rutas[0].'/'.($numPagActual-1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> ';
							
								for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){

									echo '<li class="page-item" id="item'.$i.'"><a class="page-link" href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';

								}

								echo '  <li class="page-item disabled">
      									<a class="page-link" href="#" tabindex="-1">...</a>
   													 </li>
									   <li class="page-item" id="item'.$pagProductos.'"><a class="page-link" href="'.$url.$rutas[0].'/'.$pagProductos.'/'.$rutas[2].'/'.$rutas[3].'">'.$pagProductos.'</a></li>
									   <liclass="page-item" ><a class="page-link" href="'.$url.$rutas[0].'/'.($numPagActual+1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

								</ul>
								</nav>';

						}

						/*=============================================
						LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA
						=============================================*/

						else if($rutas[1] != $pagProductos && 
							    $rutas[1] != 1 &&
							    $rutas[1] >=  ($pagProductos/2) &&
							    $rutas[1] < ($pagProductos-3)
							    ){

								$numPagActual = $rutas[1];
							
								echo '<nav aria-label="Page navigation example">
										<ul class="pagination">
										   <li class="page-item "><a class="page-link" href="'.$url.$rutas[0].'/'.($numPagActual-1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
										   <li class="page-item " id="item1"><a class="page-link" href="'.$url.$rutas[0].'/1/'.$rutas[2].'/'.$rutas[3].'">1</a></li>
										  <li class="page-item disabled">
      									<a class="page-link" href="#" tabindex="-1">...</a>
   													 </li>
										';
							
								for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){

									echo '<li class="page-item" id="item'.$i.'"><a class="page-link" href="'.$url.$rutas[0].'/'.$i.'">'.$i.'/'.$rutas[2].'/'.$rutas[3].'</a></li>';

								}


								echo '  <li class="page-item"><a class="page-link" href="'.$url.$rutas[0].'/'.($numPagActual+1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
									</ul>
									</nav>';
						}

						/*=============================================
						LOS BOTONES DE LAS ÚLTIMAS 4 PÁGINAS Y LA PRIMERA PÁG
						=============================================*/

						else{

							$numPagActual = $rutas[1];

							echo '<nav aria-label="Page navigation example">
									<ul class="pagination">
								   <li class="page-item"><a class="page-link" href="'.$url.$rutas[0].'/'.($numPagActual-1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
								   <li class="page-item" id="item1"><a class="page-link" href="'.$url.$rutas[0].'/1/'.$rutas[2].'/'.$rutas[3].'">1</a></li>
								   <li class="page-item disabled">
      									<a class="page-link" href="#" tabindex="-1">...</a>
   													 </li>
								';
							
							for($i = ($pagProductos-3); $i <= $pagProductos; $i ++){

								echo '<li class="page-item" id="item'.$i.'"><a class="page-link" href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';

							}

							echo ' </ul>
							</nav>';

						}

					}else{

						echo '<ul class="pagination">';
						
						for($i = 1; $i <= $pagProductos; $i ++){

							echo '<li class="page-item" id="item'.$i.'"><a class="page-link" href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';

						}

						echo '</ul>';
				}

				
			}

			
			
			 ?>
		

			</div>

	
		</div>


	</div>