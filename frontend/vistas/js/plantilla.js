/*=============================================
PLANTILLA
=============================================*/

//Herramienta tooltip

$('[data-toggle="tooltip"]').tooltip();

$.ajax({

	url:"ajax/plantilla.ajax.php",
	success:function(respuesta){

		var colorFondo = JSON.parse(respuesta).colorFondo;
		var colorTexto = JSON.parse(respuesta).colorTexto;
		var barraSuperior = JSON.parse(respuesta).barraSuperior;
		var textoSuperior = JSON.parse(respuesta).textoSuperior;
		
		$(".backColor, .backColor a").css({"background": colorFondo,
											"color": colorTexto})

		$(".barraSuperior, .barraSuperior a").css({"background": barraSuperior, 
			                                       "color": textoSuperior})

	}


})

/*=============================================
=            Efectos con el scroll            =
=============================================*/

$(window).scroll(function(){

	var scrollY = window.pageYOffset;

	if(window.matchMedia("(min-width:768px)").matches){

		if(scrollY < ($(".banner").offset().top)+190){

			$(".banner img").css({"margin-top":-scrollY/4+"px"})

		}else{

			scrollY = 0;
		}

	}	
	
})

$(function(){
 $.scrollUp({
 scrollText:"",
 scrollSpeed: 2000,
 easingType: "easeOutQuint"
 });
});

/*=====  End of Efectos con el scroll  ======*/

/*=====================================
=            migas de pan            =
=====================================*/

var pagActiva = $(".pagActiva").html();

if (pagActiva != null) {

	var regPagActiva = pagActiva.replace(/-/g, " ");

	$(".pagActiva").html(regPagActiva);
	
}




/*=====  End of migas de pan  ======*/

