<?php 
	
	$servidor = Ruta::ctrRutaServidor();
	$url = Ruta::ctrRuta();


	?>
<!--=============================================
=            BREADCRUMB INFOPRODUCTOS            =
============================================= -->

<div class="container-fluid breadCStl">
	

    				<ul class="breadcrumb fondoBreadcrumb">
						
						<li class="breadcrumb-item active"><a href="<?php echo $url;  ?>">INICIO</a></li>
						
						<li class="breadcrumb-item active pagActiva"><?php echo $rutas[0]; ?></li>

					</ul>
  

</div>

<div class="container-fluid infoproducto">
	
	<div class="container">
		
		<div class="row">

			<?php 

				$item = "ruta";
				$valor = $rutas[0];

				$infoproducto = ControladorProductos::ctrMostrarInfoProducto($item, $valor);

				

				$multimedia = json_decode($infoproducto["multimedia"], true);




				/*=============================================
				=            VISOR DE IMAGENES           =
				=============================================*/

				echo '<div class="col-md-5 col-sm-6 col-xs-12 visorImg">
				
				<figure class="visor">';

				if ($multimedia != null) {

				for ($i=0; $i < count($multimedia) ; $i++) { 
					

					echo '<img id="lupa'.($i+1).'" class="img-thumbnail" src="'.$servidor.$multimedia[$i]["foto"].'">';
				}
			
				echo '</figure>

				<!-- Place somewhere in the <body> of your page -->
				<div class="flexslider">
				  <ul class="slides">';

				  		for ($i=0; $i < count($multimedia) ; $i++) { 
					

					echo '<li>
				      <img value="'.($i+1).'" class="img-thumbnail" src="'.$servidor.$multimedia[$i]["foto"].'" alt="'.$infoproducto["titulo"].'">
				    </li>';

					}

				}

   
				  echo '</ul>
				</div>

			</div>';
			 ?>
			
			

	<div class="col-md-5 col-sm-6 col-xs-12 visorImg">

		<!--=============================================
		=            REGRESAR A LA TIENDA            =
		============================================= -->

		<div class="col-xs-6">
			
			<h6>
				
				<a href="javascript:history.back()" class="text-muted">
					
					<i class="fa fa-reply"></i> Continuar comprando

				</a>

			</h6>

		</div>

		<!--=============================================
		=            COMPARTIR EN REDES SOCIALES            =
		============================================= -->

		<div class="col-xs-6">
			
			<h6>
				
				

					<div class="dropdown pull-right">

					  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
					   <i class="fa fa-share-alt-square"></i> Share
					  </button>

					  <div class="dropdown-menu compartirRedes">

					    <a class="dropdown-item btnFacebook" href="#"><i class="fa fa-facebook"></i> Facebook</a>

					  </div>
					

					</div>

			</h6>

		</div>

		<div class="clearfix"></div>

		<!--=============================================
		=            ESPACIO PARA EL PRODUCTO           =
		============================================= -->
		
			<?php

					/*=============================================
					TITULO
					=============================================*/				
					
					if($infoproducto["oferta"] == 0){

						if($infoproducto["nuevo"] == 0){

							echo '<h1 class="titleStl text-uppercase">'.$infoproducto["titulo"].'</h1>';

						}else{

							echo '<h1 class="titleStl text-uppercase">'.$infoproducto["titulo"].'

							<br>

							<small>
						
								<span class="badge badge-success">Nuevo</span>

							</small>

							</h1>';

						}

					}else{

						if($infoproducto["nuevo"] == 0){

							echo '<h1 class="titleStl text-uppercase">'.$infoproducto["titulo"].'

							<br>

							<small>
						
								<span class="badge badge-warning">'.$infoproducto["descuentoOferta"].'% off</span>

							</small>
							
							</h1>';

						}else{

							echo '<h1 class="titleStl text-uppercase">'.$infoproducto["titulo"].'

							<br>

							<small>
								<span class="badge badge-success">Nuevo</span> 
								<span class="badge badge-warning">'.$infoproducto["descuentoOferta"].'% off</span> 


							</small>
							
							</h1>';

						}
					}

					/*=============================================
					PRECIO
					=============================================*/
					if ($infoproducto["oferta"] == 0) {

						

						echo '<h2 class="priceStl">USD $'.$infoproducto["precio"].'</h2>';



					}else{

						echo '<h2><span><strong class="oferta">USD $'.$infoproducto["precio"].'</strong></span>


							<span class="priceStl">
	
								USD $'.$infoproducto["precioOferta"].'

							</span>


						</h2>';
					}

					/*=============================================
					DESCRIPCION
					=============================================*/

					echo '<p class="descripctionStl">'.$infoproducto["descripcion"].'</p>';
					
			 ?>
			 <hr>

			 <h2 class="titleStl">Detalles</h2>

			 <div class="form-group row">

				<?php 

					if ($infoproducto["detalles" !=null]) {
						

						$detalles = json_decode($infoproducto["detalles"],true);

						echo '<div class="iconStl col-xs-12">
				
							<li>
								<i class="fa fa-heart"></i> '.$detalles["Material"][0].' / '.$detalles["Material"][1].'
							</li>
							<li>
								<i class="fa fa-battery-full"></i> '.$detalles["Grado de terminacion"][0].' 
							</li>
							<li>
								<i class="fa fa-globe"></i> '.$detalles["Pais"][0].'
							</li>
							<li>
								<i class="fa fa-arrow-circle-up"></i> '.$detalles["Dimensiones"][0].'
							</li>
							<li>
								<i class="fa fa-balance-scale"></i> '.$detalles["Escala"][0].'
							</li>
							<li>
								<i class="fa fa-code-fork"></i> '.$detalles["Version"][0].'
							</li>
							<li>
								<i class="fa fa-copyright"></i> '.$detalles["Marca"][0].'
							</li>
							<li>
								<i class="fa fa-cube"></i> '.$detalles["Peso"][0].'
							</li>
							<li>
								<i class="fa fa-truck"></i> '.$detalles["Medidas empaquetado"][0].' x
								'.$detalles["Medidas empaquetado"][1].'
								x
								'.$detalles["Medidas empaquetado"][2].'
							</li>

						</div>';


					}

					/*=============================================
					ENTREGA
					=============================================*/

					if ($infoproducto["entrega"] == 0) {
						
						echo '<span class="badge badge-warning">ENTREGA INMEDIATA</span> ';
					}else{

						echo '<h4 class="col-md-12 col-sm-12 col-xs-12">

								<hr>

								<span class="entregaStl">

									<i class="fa fa-clock-o" ></i>
									Entrega en '.$infoproducto["entrega"].' dias |
									<i class="fa fa-shopping-cart" ></i>
									'.$infoproducto["ventas"].' ventas | <i class="fa fa-eye" ></i>
			                             Visto por <span class="vistas" tipo="'.$infoproducto["precio"].'">'.$infoproducto["vistas"].' </span> personas
								</span>

							</h4>';
					}

				 ?>
					

			 </div>


		<!--=====================================
				BOTONES DE COMPRA
				======================================-->

				<div class="row botonesCompra">



				<?php

					

						echo '<div class="col-md-6 col-xs-12">';

							

								echo '<button class="btn btn-default btn-block btn-lg backColor">

								SOLICITAR AHORA

								<br><small>Proximamente</small>

								</button>';


							echo '</div>';

				


							echo '<div class="col-lg-6 col-md-8 col-xs-12">
									
									<button class="btn btn-default btn-block btn-lg backColor">

									ADICIONAR AL CARRITO

									<br><small>Proximamente</small> 

									<i class="fa fa-shopping-cart"></i>

									</button>

								</div>';

						

					

				?>	
		

		<!--=============================================
		=            ZONA DE LUPA           =
		============================================= -->	

			<figure class="lupa">

				<img src="" alt="">
			</figure>	


		</div>

	</div>

	</div>

</div>