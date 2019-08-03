/*NOTA LAS VARIABLES GLOBALES VAN AFUERA YA QUE DESPUES DE LAS FUNCIONES 
CONTIENE LOS DATOS NECESARIOS PARA INCRUSTARLAS A BD, REPORTES,LOGICA, ETC*/
/*=============================================================
=            CARGAR LA TABLA DINAMICA DE PRODUCTOS            =
=============================================================*/

$('.tablaProductos').DataTable({

	"ajax":"ajax/tablaProductos.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
    "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

});


/*=====  End of CARGAR LA TABLA DINAMICA DE PRODUCTOS  ======*/

/*=====================================================
=            Revisar si el producto existe            =
=====================================================*/

$(".validarProducto").change(function(){

	$(".alert").remove();

	/*=====  captura de texto  ======*/
	var producto = $(this).val();

	var datos = new FormData();
	datos.append("validarProducto", producto);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){

			if (respuesta.length != 0) {

				$(".validarProducto").parent().after('<div class="alert alert-warning">Este título de producto ya existe en la base de datos</div>');

	    		$(".validarProducto").val("");

			}

		}

	})

})



/*=====  End of Revisar si el producto existe  ======*/

/*=========================================
=            RUTA DEL PRODUCTO            =
=========================================*/

function limpiarUrl(texto){

	var texto = texto.toLowerCase();
	texto = texto.replace(/[á]/, 'a');
	texto = texto.replace(/[é]/, 'e');
	texto = texto.replace(/[í]/, 'i');
	texto = texto.replace(/[ó]/, 'o');
	texto = texto.replace(/[ú]/, 'u');
	texto = texto.replace(/[ñ]/, 'n');
	texto = texto.replace(/ /g, "-");

	return texto;
}

$(".nuevoProducto").change(function(){

	$(".rutaProducto").val(limpiarUrl($(".nuevoProducto").val()));

})

/*=====  End of RUTA DEL PRODUCTO  ======*/

/*=======================================================
=            AGREGAR MULTIMEDIA CON DROPZONE            =
=======================================================*/
var arrayFiles = [];


$(".multimediaFisica").dropzone({

/*=====  Este plugin puede subir cualquier otro 
tipo de archivo y sus extensiones  ======*/

	url: "/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png",
	maxFilesize: 2,
	maxFiles: 10,
	init: function(){

		this.on("addedfile", function(file){

			arrayFiles.push(file);
		})

		this.on("removedfile", function(file){


			var index = arrayFiles.indexOf(file);

			arrayFiles.splice(index, 1); 
		})
	}

})

/*=====  End of AGREGAR MULTIMEDIA CON DROPZONE  ======*/

/*================================================
=            SELECCIONAR SUBCATEGORIA            =
================================================*/

$(".seleccionarCategoria").change(function(){

	var categoria = $(this).val();

	$(".seleccionarSubCategoria").html("");

	var datos = new FormData();
	datos.append("idCategoria", categoria);

	$.ajax({
		url:"ajax/subCategorias.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){

			$(".entradaSubCategoria").show();

			respuesta.forEach(funcionForEach);

			function funcionForEach(item, index){

				$(".seleccionarSubCategoria").append(

						'<option value="'+item["id"]+'">'+item["subcategoria"]+'</option>'
					)
			}

		}

	})
})



/*=====  End of SELECCIONAR SUBCATEGORIA  ======*/

/*===================================================
=            SUBIENDO LA FOTO DE PORTADA            =
===================================================*/

var imagenPortada = null;

$(".fotoPortada").change(function(){

	imagenPortada = this.files[0];

	/*=====  Validar que la img sea JPG O PNG  ======*/

	if (imagenPortada["type"] != "image/jpeg" && imagenPortada["type"] != "image/png") {

		$(".fotoPortada").val("");

			swal({
				title: "Error al subir la imagen",
				text: "!La imagen debe estar en formato JPG o PNG!",
				type: "error",
				confirmButtonText: "!Cerrar!"
			});

	}else if(imagenPortada["size"] > 200000){

		$(".fotoPortada").val("");

		swal({
				title: "Error al subir la imagen",
				text: "!La imagen no debe pesar mas de 2MB",
				type: "error",
				confirmButtonText: "!Cerrar!"
			});

	}else{

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagenPortada);

		$(datosImagen).on("load", function(event){

			var rutaImagen = event.target.result;

			$(".previsualizarPortada").attr("src", rutaImagen);

		})
	}


})

/*=====  End of SUBIENDO LA FOTO DE PORTADA  ======*/

/*===================================================
=            SUBIENDO LA FOTO PRINCIPAL DEL PRODUCTO          =
===================================================*/

var imagenFotoPrincipal = null;

$(".fotoPrincipal").change(function(){

	imagenFotoPrincipal = this.files[0];

	/*=====  Validar que la img sea JPG O PNG  ======*/

	if (imagenFotoPrincipal["type"] != "image/jpeg" && imagenFotoPrincipal["type"] != "image/png") {

		$(".fotoPrincipal").val("");

			swal({
				title: "Error al subir la imagen",
				text: "!La imagen debe estar en formato JPG o PNG!",
				type: "error",
				confirmButtonText: "!Cerrar!"
			});

	}else if(imagenFotoPrincipal["size"] > 200000){

		$(".fotoPortada").val("");

		swal({
				title: "Error al subir la imagen",
				text: "!La imagen no debe pesar mas de 2MB",
				type: "error",
				confirmButtonText: "!Cerrar!"
			});

	}else{

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagenFotoPrincipal);

		$(datosImagen).on("load", function(event){

			var rutaImagen = event.target.result;

			$(".previsualizarPrincipal").attr("src", rutaImagen);

		})
	}


})

/*=====  End of SUBIENDO LA FOTO Principal  ======*/

/*======================================
=            ACTIVAR OFERTA            =
======================================*/

function activarOferta(event) {

	if (event == "oferta") {

		$(".datosOferta").show();
		$(".valorOferta").prop("required", true);
		$(".valorOferta").val("");

	}else{

		$(".datosOferta").hide();
		$(".valorOferta").prop("required", false);
		$(".valorOferta").val("");
	}

}

$(".selActivarOferta").change(function(){


	activarOferta($(this).val())

})

/*=====  End of ACTIVAR OFERTA  ======*/

/*====================================
=            VALOR OFERTA            =
====================================*/

$(".valorOferta").change(function(){

	if($(".precio").val()!= 0){

		if($(this).attr("tipo") == "oferta"){

			var descuento = 100 - (Number($(this).val())*100/Number($(".precio").val()));

			$(".precioOferta").prop("readonly",true);
			$(".descuentoOferta").prop("readonly",false);
			$(".descuentoOferta").val(Math.ceil(descuento));	

		}

		if($(this).attr("tipo") == "descuento"){

			var oferta = Number($(".precio").val())-(Number($(this).val())*Number($(".precio").val())/100);
			
			$(".descuentoOferta").prop("readonly",true);
			$(".precioOferta").prop("readonly",false);
			$(".precioOferta").val(oferta);

		}

	}else{

	 swal({
	      title: "Error al agregar la oferta",
	      text: "¡Primero agregue un precio al producto!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	 $(".precioOferta").val(0);
	 $(".descuentoOferta").val(0);

	 return;

	}

})


/*=====  End of VALOR OFERTA  ======*/


/*======================================
=            CAMBIAR PRECIO            =
======================================*/

$(".precio").change(function(){

	$(".precioOferta").val(0);
	 $(".descuentoOferta").val(0);

})

/*=====  End of CAMBIAR PRECIO  ======*/

/*===========================================
=            GUARDAR EL PRODUCTO            =
===========================================*/

var multimediaFisica = null;

$(".guardarProducto").click(function(){

	/*=====  Paso1: preguntar si los campos del formulario estan llenos  ======*/
	if ($(".tituloProducto").val() != "" &&
		$(".seleccionarCategoria").val() != "" &&
		$(".seleccionarSubCategoria").val() != "" &&
		$(".descripcionProducto").val() != "" &&
		$(".pClavesProducto").val() != ""){

		if (arrayFiles.length > 0 && $(".rutaProducto").val() != "") {

			var listaMultimedia = [];

			for (var i = 0; i < arrayFiles.length; i++) {
				
				/*=====  se designa la ruta donde se creara la carpeta
				y el archivo que viene en el array dependiente del
				numero de imagenes seleccionadas  ======*/
				var datosMultimedia = new FormData();
				datosMultimedia.append("file", arrayFiles[i]);
				datosMultimedia.append("ruta", $(".rutaProducto").val());
				
				$.ajax({
					url:"ajax/productos.ajax.php",
					method:"POST",
					data: datosMultimedia,
					cache: false,
					contentType: false,
					processData: false,
					success:function(respuesta){

							/*Al array listaMultimendia se le añadira el dato foto
							y con subst se quitaran los ../ ya que tendra un 3 como parametro
							*/
							listaMultimedia.push({"foto" : respuesta.substr(3)});

							multimediaFisica = JSON.stringify(listaMultimedia);

								if (multimediaFisica != null) {

									$(".valorMultimedia").val(listaMultimedia);

								}else{

									swal({
											title: "El campo multimedia no debe estar vacio",
											type: "error",
											confirmButtonText: "!Cerrar!"
										});

									return;
								}

					}

				})

			}

		}

		}else {

			swal({
		      title: "Llenar los campos obligatorios",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

		    return;
		}

		setTimeout(function(){

								/*!!!ALMACENAMOS TODOS LOS CAMPOS DEL PRODUCTO*/

								var tituloProducto = $(".tituloProducto").val();
								var rutaProducto = $(".rutaProducto").val();
								var seleccionarCategoria = $(".seleccionarCategoria").val();
								var seleccionarSubCategoria = $(".seleccionarSubCategoria").val();
								var descripcionProducto = $(".descripcionProducto").val();
								var pClavesProducto = $(".pClavesProducto").val();
								var precio = $(".precio").val();
								var peso = $(".peso").val();
								var entrega = $(".entrega").val();
								var selActivarOferta = $(".selActivarOferta").val();
								var precioOferta = $(".precioOferta").val();
								var descuentoOferta = $(".descuentoOferta").val();
								
								var detalles = {"Medidas empaquetado": $(".detalleMempaquetado").tagsinput('items'),
												"Material": $(".detalleMaterial").tagsinput('items'),
												"Grado de terminacion": $(".detalleGradoT").tagsinput('items'),
												"Pais": $(".detallePais").val(),
												"Dimensiones": $(".detalleDimensiones").val(),
												"Escala": $(".detalleEscala").val(),
												"Version": $(".detalleVersion").val(),
												"Marca": $(".detalleMarca").val(),
												"Peso": $(".detallePeso").val()};
								
								var detallesString = JSON.stringify(detalles);

								/*========================
								con estos datos se mandan al ajax                   =
								========================*/
			
								var datosProducto = new FormData();
								datosProducto.append("tituloProducto",tituloProducto);
								datosProducto.append("rutaProducto",rutaProducto);
								datosProducto.append("detalles",detallesString);
								datosProducto.append("seleccionarCategoria",seleccionarCategoria);
								datosProducto.append("seleccionarSubCategoria",seleccionarSubCategoria);
								datosProducto.append("descripcionProducto",descripcionProducto);
								datosProducto.append("pClavesProducto",pClavesProducto);
								datosProducto.append("precio",precio);
								datosProducto.append("peso",peso);
								datosProducto.append("entrega",entrega);
								datosProducto.append("multimedia",multimediaFisica);
								datosProducto.append("fotoPortada",imagenPortada);
								datosProducto.append("fotoPrincipal",imagenFotoPrincipal);
								datosProducto.append("selActivarOferta",selActivarOferta);
								datosProducto.append("precioOferta",precioOferta);
								datosProducto.append("descuentoOferta",descuentoOferta);
								
								$.ajax({
									url:"ajax/productos.ajax.php",
									method:"POST",
									data: datosProducto,
									cache: false,
									contentType: false,
									processData: false,
									success:function(respuesta){


										if(respuesta == "ok"){

						swal({
						  type: "success",
						  title: "El producto ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})
					}

				}


								})


							},1000)
})

/*=====  End of GUARDAR EL PRODUCTO  ======*/
