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
MOSTRAR PRODUCTOS
======================================-->

<?php



$titulosModulos = array("LO MÁS VENDIDO","LO MÁS VISTO"); 

$rutaModulos = array("lo-mas-vendido","lo-mas-visto");

$base = 0;
$tope = 5;
	

if ($titulosModulos[0] == "LO MÁS VENDIDO" ) {
	
	$ordenar = "ventas";

	$item = null;
	$valor = null;

	$ventas = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope);

}

if ($titulosModulos[1] == "LO MÁS VISTO" ) {
	
	$ordenar = "vistas";

	$item = null;
	$valor = null;

	$vistas = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope);


}

$modulos = array($ventas, $vistas);

for ($i=0; $i < count($titulosModulos); $i++) { 
	
	echo '<div class="container-fluid well well-sm barraProductos">

			<div class="container">
				
				<div class="row">
					
					<div class="col-xs-12 organizarProductos">

						<div class="btn-group pull-right">

							 <button type="button" class="btn btn-default btnGuia" id="btnGuia1'.$i.'">
							 	
								<i class="fa fa-th" aria-hidden="true"></i>  

								<span class="col-xs-0 pull-right"> GUÍA </span>

							 </button>

							
						</div>		

					</div>

				</div>

			</div>

		</div>

		<div class="container-fluid productos">
	
			<div class="container">
		
		<div class="row">

		<div class="col-xs-12 tituloDestacado">

			<div class="col-sm-6 col-xs-12">
					
					<h1 class="opcAnimation animated heartBeat"><small class="titlesDecor"> '.$titulosModulos[$i].' </small></h1>

			</div>

			<div class="col-sm-6 col-xs-12">
					
					<a href="'.$rutaModulos[$i].'">
						
						<button class="btn btn-default backColor pull-right">
							
							VER MÁS <span class="fa fa-chevron-right"></span>

						</button>

					</a>

				</div>

			</div>

			<div class="clearfix"></div>

			<hr>

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

									echo '<span class="label label-warning fontSize">Nuevo</span> ' ;
								}

								if ($value["oferta"] != 0) {

									echo '<span class="label label-warning fontSize">'.$value["descuentoOferta"].'% off</span>';		

								}

								
								if ($value["precio"] == 0) {
								
									echo '<strong>	articulo gratuito </strong>';

								}else {

									if ($value["oferta"] !=0) {
										
										echo '<strong> USD $ '.$value["precio"].' </strong> 

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
							
							<i class="fa fa-heart" aria-hidden="true"></i>

						</button> ';

						if ($value["oferta"] !=0) {
							
							echo '<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precioOferta"].'" peso="'.$value["peso"].'"  data-toggle="tooltip" title="Agregar al carrito de compras">
							
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>

						</button>';

						}else{

							echo '<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" peso="'.$value["peso"].'"  data-toggle="tooltip" title="Agregar al carrito de compras">
							
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>

						</button>';
						
						}


						echo '<a href="'.$value["ruta"].'" class="pixelProducto">
						
							<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
								
								<i class="fa fa-eye" aria-hidden="true"></i>

							</button>	
						
						</a>

		
      				</div>
				</div>
			</div>';
	
}

      echo'
    </div>

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

	