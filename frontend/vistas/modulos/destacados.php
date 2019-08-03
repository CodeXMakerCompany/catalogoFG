<?php 
	
	$servidor = Ruta::ctrRutaServidor();

	$ruta = "sin-categoria";

	$banner = ControladorProductos::ctrMostrarBanner($ruta);

/*--=====================================
BANNER
======================================-*/

	echo '<figure class="banner">

			<img src="'.$servidor.$banner["img"].'" class="img-responsive" width="100%">	

			<div class="textoBanner textoDer opcAnimation animated tada">
				
				<h1 style="color:#0ff">'.$banner["titulo1"].'</h1>

				<h2 style="color:#fff"><strong>'.$banner["titulo2"].'</strong></h2>

				<h3 style="color:#fff">'.$banner["titulo3"].'</h3>

			</div>

		</figure>';

 ?>

<!--=====================================
MOSTRAR PRODUCTOS
======================================-->

<?php



$titulosModulos = array("LO MÁS VENDIDO","LO MÁS VISTO"); 

$rutaModulos = array("lo-mas-vendido","lo-mas-visto");

$base = 0;
$tope = 6;
	

if ($titulosModulos[0] == "LO MÁS VENDIDO" ) {
	
	$ordenar = "ventas";

	$item = null;
	$valor = null;
	$modo = "DESC";

	$ventas = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);

}

if ($titulosModulos[1] == "LO MÁS VISTO" ) {
	
	$ordenar = "vistas";

	$item = null;
	$valor = null;
	$modo = "DESC";

	$vistas = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);


}

$modulos = array($ventas, $vistas);

for ($i=0; $i < count($titulosModulos); $i++) { 
	
	echo '<div class="container-fluid well well-sm barraProductos">

			<div class="container">
				
				<div class="row">
			
					<div class="col-xs-12 organizarProductos">

						

							 <button type="button" class="btn btn-default btnGuia" id="btnGuia1'.$i.'">
						 	
								<i class="fa fa-th" aria-hidden="true"></i>  

								<span class="col-xs-0 pull-right"> INFO </span>

							 </button>

	
					

					</div>

				</div>

			</div>

		</div>

		<div class="container-fluid productos">
	
			<div class="container">
		
		

		<div class="col-xs-12 tituloDestacado text-center">

			<div class="col-sm-12 col-xs-12">
					
					<h1 class="opcAnimation animated heartBeat"><small class="titlesDecor"> '.$titulosModulos[$i].' </small></h1>

			

			<div class="col-sm-12 col-xs-12 paddingBut">
					
					<a href="'.$rutaModulos[$i].'">
						
						<button class="btn btn-default backColor">
							
							VER MÁS <span class="fa fa-chevron-right"></span>

						</button>

					</a>

				</div>

			</div>

			<div class="clearfix"></div>


				</div>

				<div class="col-xs-12 animated fadeInLeft delay-2s slow">

				<div class="swiper-container">
    <div class="swiper-wrapper">';

foreach ($modulos[$i] as $key => $value) {
	
	echo '<div class="swiper-slide">
				<div class="imgBx">


      		<a href="'.$value["ruta"].'">

      		<img src="'.$servidor.$value["portada"].'" class="img-responsive">

      		</a>

      	</div>
			
			<div class="details">
				
				<h4>
					
					<small>
						
						<a href="'.$value["ruta"].'" class="pixelProducto">
							
							<span style="color: white;">'.$value["titulo"].'</span>

							<br>';
								
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
										
										echo '<strong>  '.$value["precio"].' USD $</strong> 
										<br>

										<strong class="oferta"> USD $ '.$value["precioOferta"].' </strong>';
									}else{

										echo '<strong> USD $ '.$value["precio"].' </strong>';
									}

								}

						echo '</a>	

					</small>			

				</h4>


						<div class="text-center">
						
						<button type="button" class="btn btn-default btn-xs deseos" idProducto="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">
							
							<i class="fa fa-heart" style="color:white;" aria-hidden="true"></i>

						</button> ';

						if ($value["oferta"] !=0) {
							
							echo '<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precioOferta"].'" peso="'.$value["peso"].'"  data-toggle="tooltip" title="Agregar al carrito de compras">
							
							<i class="fa fa-shopping-cart" style="color:white;"  aria-hidden="true"></i>

						</button>';

						}else{

							echo '<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" peso="'.$value["peso"].'"  data-toggle="tooltip" title="Agregar al carrito de compras">
							
							<i class="fa fa-shopping-cart" style="color:white;" aria-hidden="true"></i>

						</button>';
						
						}


						echo '<a href="'.$value["ruta"].'" class="pixelProducto">
						
							<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
								
								<i class="fa fa-eye" style="color:white;"  aria-hidden="true"></i>

							</button>	
						
						</a>

		
      				</div>
				</div>
			</div>';
	
}

      echo'
    </div>

			<br>
		    <!-- Add Pagination -->
		    <div class="swiper-pagination"></div>
		  </div>
		</div>

	</div>

</div>


			</div>

		</div>
			
			';
		}

 ?>
	