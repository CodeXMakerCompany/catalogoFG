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

<div class="container-fluid well well-sm barraProductos">

	<div class="container">
		
		<div class="row">

			<div class="col-sm-6 col-xs-12">
				
				<div class="btn-group">
					
					 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">

					  Ordenar Productos <span class="caret"></span></button>

					  <ul class="dropdown-menu" role="menu">

					  <?php
					  	
						echo '<li><a href="'.$url.$rutas[0].'/1/recientes">Más reciente</a></li>
							  <li><a href="'.$url.$rutas[0].'/1/antiguos">Más antiguo</a></li>';

						?>

					  </ul>

				</div>

			</div>
			
			<div class="col-sm-6 col-xs-12 organizarProductos">

				<div class="btn-group pull-right">

					 <button type="button" class="btn btn-default btnGrid" id="btnGrid0">
					 	
						<i class="fa fa-th" aria-hidden="true"></i>  

						<span class="col-xs-0 pull-right"> GRID</span>

					 </button>

					 <button type="button" class="btn btn-default btnList" id="btnList0">
					 	
						<i class="fa fa-list" aria-hidden="true"></i> 

						<span class="col-xs-0 pull-right"> LIST</span>

					 </button>
					
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

			<ul class="breadcrumb fondoBreadcrumb text-uppercase">
				
				<li><a href="<?php echo $url;  ?>">INICIO</a></li>
				<li class="active pagActiva"><?php echo $rutas[0] ?></li>

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


						echo '<div class="card-columns">';

						

					

					foreach ($productos as $key => $value) {
						echo '
jeje

						';
					}
					
					'</div>';
				}
				
 ?>