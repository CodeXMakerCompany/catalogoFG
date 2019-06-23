<?php 
	
	$servidor = Ruta::ctrRutaServidor();
	$url = Ruta::ctrRuta();

 ?>
<!--=====================================
SLIDESHOW  
======================================-->

<div class="container-fluid" id="slide">

		
		<!--=====================================
		DIAPOSITIVAS
		======================================-->

		<ul>

			<?php


				$slide = ControladorSlide::ctrMostrarSlide();

				foreach ($slide as $key => $value) {

					$estiloImgProducto = json_decode($value["estiloImgProducto"], true);

					$titulo1 = json_decode($value["titulo1"], true);
					$titulo2 = json_decode($value["titulo2"], true);

				echo '<li>
				
				<img src="'.$servidor.$value["imgFondo"].'">

				<div class="slideOpciones slideOpcion1">
					
					<img class="imgProducto" src="'.$servidor.$value["imgProducto"].'" style="top:'.$estiloImgProducto["top"].'; right:'.$estiloImgProducto["right"].'; width:'.$estiloImgProducto["width"].'">

					<div class="textosSlide animated bounceInLeft">
						
						<h1 style="color:'.$titulo1["color"].'">'.$titulo1["texto"].'</h1>

						<h2 style="color:'.$titulo2["color"].'">'.$titulo2["texto"].'💖</h2>

						<a href="'.$url.'lo-mas-visto">
							
							<button class="btn btn-default backColor text-uppercase">

							VER MÁS <span class="fa fa-chevron-right"></span>

							</button>

						</a>

					</div>	

				</div>

			</li>';

			}

			 ?>		

		</ul>

		<!--=====================================
		PAGINACIÓN
		======================================-->

		<ol id="paginacion">

			<?php 

				for ($i=1; $i <= count($slide); $i++) { 
					
					echo '<li item="'.$i.'"><span class="fa fa-circle"></span></li>';

				}

			 ?>

		</ol>	

	</div>




	<div align="center">
	<button id="btnSlide" class="backColor">

		<span>Ocultar</span></button>

	</button>
	</div>

