<?php 
	
	$servidor = Ruta::ctrRutaServidor();
	$url = Ruta::ctrRuta();

 ?>

<!--=====================================
TOP
======================================-->

<style>
	
	.imageAdd{
		position:relative;
		box-shadow: 2px 10px 5px 0px rgba(0,0,0,0.75);
		border: 5px solid black;

		background-image: url(vistas/img/plantilla/bannerFigAnime.png);
		
		border-radius: 3px;

    	background-size: 100% 100%;
    	background-repeat: no-repeat;
  
		

	}
</style>




<div class="imageAdd">
<div class="container-fluid barraSuperior" id="top">



	
	<div class="container">


		
		<div class="row">


	
			<!--=====================================
			SOCIAL
			======================================-->

			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 social animated  bounceInLeft slow">
				
				<ul>	

					<?php

					$social = ControladorPlantilla::ctrEstiloPlantilla();

					$jsonRedesSociales = json_decode($social["redesSociales"],true);		

					foreach ($jsonRedesSociales as $key => $value) {

						echo '<li>
								<a href="'.$value["url"].'" target="_blank">
									<i class="fa '.$value["red"].' redSocial '.$value["estilo"].'" aria-hidden="true"></i>
								</a>
							</li>';
					}

					?>
			
				</ul>

				<ul>
					<li><h4 class="introTitle">  Catalogo de figuras by Codexmaker</h4></li>
				</ul>

			</div>

			<!--=====================================
			Logo
			======================================-->

			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 registro animated rotateIn">
				
			


					<?php 

					$icono = ControladorPlantilla::ctrEstiloPlantilla();

						
						
					echo '<a href="http://localhost/catalogoFig/frontend/">
							<img src="'.$servidor.$icono["icono"].'" class="img-responsive imgLogo">
									</a>'

			

					 ?>

						

					</li>

				</ul>



			</div>	


		</div>	

	</div>

</div>
</div>

<!--=====================================
HEADER
======================================-->

<header class="container-fluid">
	
	<div class="container">
		
		<div class="row" id="cabezote">

			

			<!--=====================================
			BLOQUE CATEGORÍAS Y BUSCADOR
			======================================-->

			<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
					
				<!--=====================================
				BOTÓN CATEGORÍAS
				======================================-->

				<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 backColor" id="btnCategorias">
					
					<p>CATEGORÍAS
					
						<span class="pull-right">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</span>
					
					</p>

				</div>

				<!--=====================================
				BUSCADOR
				======================================-->
				
				<div class="input-group col-lg-10 col-md-10 col-sm-8 col-xs-12" id="buscador">
					
					<input type="search" name="buscar" class="form-control" placeholder="Buscar...">	

					<span class="input-group-btn">
						
						<a href="#">

							<button class="btn btn-default backColor" type="submit">
								
								<i class="fa fa-search"></i>

							</button>

						</a>

					</span>

				</div>
			
			</div>

			<!--=====================================
			CARRITO DE COMPRAS
			======================================-->

			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="carrito">
				
				<a href="#">

					<button class="btn btn-default pull-left backColor"> 
						
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					
					</button>
				
				</a>	

				<p class="introTitle">Lista de deseos <span class="cantidadCesta">3</span> <br> MXN $ <span class="sumaCesta">20</span></p>	

			</div>

		</div>

		<!--=====================================
		CATEGORÍAS
		======================================-->

		<div class="col-xs-12 backColor" id="categorias">

			<?php

				$item = null;
				$valor = null;

				$categorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

				foreach ($categorias as $key => $value) {

					echo '<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
							
							<h4>
								<a href="'.$url.$value["ruta"].'" class="pixelCategorias">'.$value["categoria"].'</a>
							</h4>
							
							<hr>

							<ul>';

							$item = "id_categoria";

							$valor = $value["id"];

							$subcategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
							
							foreach ($subcategorias as $key => $value) {
									
									echo '<li><a href="'.$url.$value["ruta"].'" class="pixelSubCategorias">'.$value["subcategoria"].'</a></li>';
								}	
								
							echo '</ul>

						</div>';
				}

			?>	

		</div>

	</div>

</header>


