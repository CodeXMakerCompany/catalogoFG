<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">


	<?php

		session_start();

		$servidor = Ruta::ctrRutaServidor();

		$icono = ControladorPlantilla::ctrEstiloPlantilla();

		echo '<link rel="'.$servidor.$icono["icono"].'">';

		/*=============================================
		MANTENER LA RUTA FIJA DEL PROYECTO
		=============================================*/
		
		$url = Ruta::ctrRuta();

		/*=============================================
		MARCADO DE CABECERA
		=============================================*/

		$rutas = array();

		if(isset($_GET["ruta"])){

			$rutas = explode("/", $_GET["ruta"]);

			$ruta = $rutas[0];

		}else{

			$ruta = "inicio";

		}

		$cabeceras = ControladorPlantilla::ctrTraerCabeceras($ruta);
		
		if(!$cabeceras["ruta"]){

			$ruta = "inicio";

			$cabeceras = ControladorPlantilla::ctrTraerCabeceras($ruta);

			
		}

	?>

	<!--=====================================
	Marcado HTML5
	======================================-->

	<meta name="title" content="<?php echo $cabeceras['titulo']; ?>">

	<meta name="description" content="<?php echo $url.$cabeceras['ruta']; ?>">

	<meta name="keyword" content="<?php echo $cabeceras['palabrasClaves']; ?>">

	<title>Catálogo Figuras</title>

	<!--=====================================
	Marcado de Open Graph FACEBOOK
	======================================-->
	<meta property="og:title"   content="<?php echo $cabeceras['titulo']; ?>">
	<meta property="og:url" content="<?php echo $url.$cabeceras['ruta']; ?>">
	<meta property="og:description" content="<?php echo $cabeceras['descripcion']; ?>">
	<meta property="og:image"  content="<?php echo $cabeceras['portada']; ?>">
	<meta property="og:type"  content="website">	
	<meta property="og:site_name" content="CDX catálogo">
	<meta property="og:locale" content="es_CO">
<!--=====================================
	Marcado para DATOS ESTRUCTURADOS GOOGLE
	======================================-->
	
	<meta itemprop="name" content="<?php echo $cabeceras['titulo']; ?>">
	<meta itemprop="url" content="<?php echo $url.$cabeceras['ruta']; ?>">
	<meta itemprop="description" content="<?php echo $cabeceras['descripcion']; ?>">
	<meta itemprop="image" content="<?php echo $cabeceras['portada']; ?>">


	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/flexslider.css">
	<!--=====================================
	=           HOJAS DE ESTILO PERSONALIZADAS         =
	======================================-->
	
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/swiper.min.css">	
	
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plantilla.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/cabezote.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/slide.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/productos.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/infoproducto.css">		

	

	<!--=====================================
	=            PLUGINS         =
	======================================-->

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.scrollUp.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.flexslider.js"></script>


</head>

<body>





	<div id="loading"></div>



<?php

/*=============================================
CABEZOTE
=============================================*/

include "modulos/cabezote.php";

/*=============================================
CONTENIDO DINÁMICO
=============================================*/

$rutas = array();
$ruta = null;
$infoProducto = null;

if(isset($_GET["ruta"])){

	$rutas = explode("/", $_GET["ruta"]);

	$item = "ruta";
	$valor =  $rutas[0];

	/*=============================================
	URL'S AMIGABLES DE CATEGORÍAS
	=============================================*/

	$rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

	if($rutas[0] == $rutaCategorias["ruta"]){

		$ruta = $rutas[0];

	}

	/*=============================================
	URL'S AMIGABLES DE SUBCATEGORÍAS
	=============================================*/

	$rutaSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

	foreach ($rutaSubCategorias as $key => $value) {
		
		if($rutas[0] == $value["ruta"]){

			$ruta = $rutas[0];

		}

	}

	/*=============================================
	URL'S AMIGABLES DE PRODUCTOS
	=============================================*/

	$rutaProductos = ControladorProductos::ctrMostrarInfoProducto($item, $valor);

	if($rutas[0] == $rutaProductos["ruta"]){

			$infoProducto = $rutas[0];

		}

	/*=============================================
	LISTA BLANCA DE URL'S AMIGABLES
	=============================================*/

	if($ruta != null || $rutas[0] == "lo-mas-vendido" || $rutas[0] == "lo-mas-visto"){

		include "modulos/productos.php";


	}else if ($infoProducto !=null) {
		
			include "modulos/infoproducto.php";

	}else if ($rutas[0] == "buscador") {
		
			include "modulos/buscador.php";

	}else if ($rutas[0] == "inicio"){


		include "modulos/slide.php";
		include "modulos/destacados.php";


	}else{

		include "modulos/error404.php";

	}

	}else{

		include "modulos/slide.php";
		include "modulos/destacados.php";

	}

?>

<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">
<!--=====================================
=            	JS PLUGINS          =
======================================-->
<script src="<?php echo $url; ?>vistas/js/swiper.min.js"></script>

 <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 40,
        stretch: 0,
        depth: 100,
        modifier: 3,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>

<!--=====================================
=   https://developers.facebook.com/      =
======================================-->


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2384102184967681',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.3'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


<script>
	
	$(".btnFacebook").click(function(){

		FB.ui({

			method: 'share',
			display: 'popup',
			href: '<?php echo $url.$_SERVER['REQUEST_URI']; ?>'
		}, function(response){});
	})

</script>

<!--=====================================
=            	JS PERSONALIZADO          =
======================================-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="<?php echo $url; ?>vistas/js/cabezote.js"></script>
<script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>
<script src="<?php echo $url; ?>vistas/js/slide.js"></script>
<script src="<?php echo $url; ?>vistas/js/preloader.js"></script>
<script src="<?php echo $url; ?>vistas/js/buscador.js"></script>
<script src="<?php echo $url; ?>vistas/js/infoproducto.js"></script>
<script src="<?php echo $url; ?>vistas/js/testShopCar.js"></script>




</body>
</html>