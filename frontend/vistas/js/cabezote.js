/*=============================================
=            VARIABLES				          =
=============================================*/
var item = 0;
var imgdDL = $(".imgLoge");



/*=============================================
=           ANIMACION INICIAL         =
=============================================*/
$(imgdDL[item]).animate({"top":-10 + "%", "opacity":0},100)
$(imgdDL[item]).animate({"top":30 + "px", "opacity":1},600)


/*=============================================
CABEZOTE
=============================================*/

$("#btnCategorias").click(function(){

	if(window.matchMedia("(max-width:767px)").matches){

		$("#btnCategorias").after($("#categorias").slideToggle("fast"))

	}else{

		$("#cabezote").after($("#categorias").slideToggle("fast"))
		
	}
	
	
		
})