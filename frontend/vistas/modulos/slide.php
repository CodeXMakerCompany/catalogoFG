 <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
<?php 
	
	$servidor = Ruta::ctrRutaServidor();

	$slide = ControladorSlide::ctrMostrarSlide();

echo'<div id="demo" class="carousel slide" data-ride="carousel">
<!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="http://localhost/catalogoFig/backend/vistas/img/productos/figuras/Alphamax-Skytube-Alice-figuras-de-Anime-japon-s-Sexy-juguetes-adultos-acci-n-juguete-colecci-n.jpg_640x640.jpg" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img src="http://localhost/catalogoFig/backend/vistas/img/productos/figuras/Alphamax-Skytube-Alice-figuras-de-Anime-japon-s-Sexy-juguetes-adultos-acci-n-juguete-colecci-n.jpg_640x640.jpg" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="http://localhost/catalogoFig/backend/vistas/img/productos/figuras/Alphamax-Skytube-Alice-figuras-de-Anime-japon-s-Sexy-juguetes-adultos-acci-n-juguete-colecci-n.jpg_640x640.jpg" alt="New York">
    </div>
  </div>
</div>';
 ?>



 
<br>
  

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>


<!--=====================================
SLIDESHOW  
======================================-->

<div class="container-fluid" id="slide">
	
	<div class="row">
		
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

					<div class="textosSlide" style="top:20%; left:10%; width:40%">
						
						<h1 style="color:'.$titulo1["color"].'">'.$titulo1["texto"].'</h1>

						<h2 style="color:'.$titulo2["color"].'">'.$titulo2["texto"].'</h2>

						<a href="#">
							
							<button class="btn btn-default backColor text-uppercase">

							VER PRODUCTO <span class="fa fa-chevron-right"></span>

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

</div>


	<div align="center">
	<button id="btnSlide" class="backColor">

		<span>Ocultar</span></button>

	</button>
	</div>

