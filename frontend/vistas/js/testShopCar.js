/*--=====================================
/*--=====================================
/*--=====================================
/*--=====================================
ADD TO CAR MODULE 1
======================================--*/

var listaCarrito = [];

$(".agregarCarrito").click(function(){


	var idProducto = $(this).attr("idProducto");
	var imagen = $(this).attr("imagen"); 
	var titulo = $(this).attr("titulo");
	var precio = $(this).attr("precio");
	var peso = $(this).attr("peso");

	

	/*--=====================================
	ADD TO THE LOCALSTORAGE THE PRODUCTS ADDED IN THE CAR
	======================================--*/

	listaCarrito.push({"idProducto":idProducto,
						"imagen":imagen,
						"titulo":titulo,
						"precio":precio,
						"peso":peso,
						"cantidad":"1"});


		

	localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));



})




