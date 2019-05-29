<?php 
	
	$servidor = Ruta::ctrRutaServidor();

 ?>


<!--=====================================
BANNER
======================================-->



<figure class="banner">

	<img src="vistas/img/plantilla/bannerBegin.png" class="img-responsive" width="100%">	

	<div class="textoBanner textoDer opcAnimation animated tada">
		
		<h1 style="color:#fff">OFERTAS ESPECIALES</h1>

		<h2 style="color:#fff"><strong>15% off</strong></h2>

		<h3 style="color:#fff">Termina el 31 de Septiembre</h3>

	</div>

</figure>

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
					  	
						echo '<li><a style="color: white;" href="'.$url.$rutas[0].'/1/recientes">Más reciente</a></li>
							  <li><a style="color: white;" href="'.$url.$rutas[0].'/1/antiguos">Más antiguo</a></li>';

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

			<ul class="breadcrumb fondoBreadcrumb lead">
				
				<li><a href="<?php echo $url;  ?>">INICIO</a>/</li>
				<li class="active pagActiva"> <?php echo $rutas[0]; ?></li>

			</ul>

		<?php 

			if ($rutas[0] == "lo-mas-vendido") {
				
				$item2 = null;
				$valor2 = null;
				$ordenar = "ventas";



			}else if ($rutas[0] == "lo-mas-visto") {
				

				$item2 = null;
				$valor2 = null;
				$ordenar = "vistas";


			}else {
						$ordenar = "id";
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

			}
						
						
						$base = 0;
						$tope = 8;

						$productos = ControladorProductos::ctrMostrarProductos($ordenar, $item2, $valor2, $base, $tope);

						var_dump(count($productos));

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