
/*=================================
=      Variables            =
=================================*/


var item = 0;
var itemPaginacion = $("#paginacion li");
var imgProducto = $(".imgProducto");
var titulos1 = $('#slide h1');
var titulos2 = $('#slide h2');
var titulos3 = $('#slide h3');
var toogle = false;



/*=================================
=      PAGINACION      =
=================================*/

$("#paginacion li").click(function(){

	item = $(this).attr("item")-1;
	
	movimientoSlide(item);

})

/*=============================================
=           ANIMACION INICIAL         =
=============================================*/

$(imgProducto[item]).animate({"top":-10 + "%", "opacity":0},100)
$(imgProducto[item]).animate({"top":30 + "px", "opacity":1},800)

$(titulos1[item]).animate({"top":-10 + "%", "opacity":0},100)
$(titulos1[item]).animate({"top":30 + "px", "opacity":1},800)

$(titulos2[item]).animate({"top":-10 + "%", "opacity":0},100)
$(titulos2[item]).animate({"top":30 + "px", "opacity":1},800)

$(titulos3[item]).animate({"top":-10 + "%", "opacity":0},100)
$(titulos3[item]).animate({"top":30 + "px", "opacity":1},800)





/*=================================
=      MOVIMIENTO SLIDE      =
=================================*/

function movimientoSlide(item){

	$("#slide ul").animate({"left": item * -100 + "%"}, 1000)

	$("#paginacion li").css({"opacity":.5})

	$(itemPaginacion[item]).css({"opacity":1})

	/*=============================================
=           ANIMACION INICIAL         =
=============================================*/

$(imgProducto[item]).animate({"top":-10 + "%", "opacity":0},100)
$(imgProducto[item]).animate({"top":30 + "px", "opacity":1},800)

$(titulos1[item]).animate({"top":-10 + "%", "opacity":0},100)
$(titulos1[item]).animate({"top":30 + "px", "opacity":1},800)

$(titulos2[item]).animate({"top":-10 + "%", "opacity":0},100)
$(titulos2[item]).animate({"top":30 + "px", "opacity":1},800)

$(titulos3[item]).animate({"top":-10 + "%", "opacity":0},100)
$(titulos3[item]).animate({"top":30 + "px", "opacity":1},800)

}


/*=============================================
=            ESCONDER SLIDE            =
=============================================*/

$("#btnSlide").click(function() {

	if(!toogle){


		toogle = true;

		$("#slide").slideUp("fast");

		$("#btnSlide").html('<i class="fa fa-angle-down"></i>');

	}else{

		toogle = false;

		$("#slide").slideDown("fast");

		$("#btnSlide").html('<span>Ocultar</span>');

	}


	

})
