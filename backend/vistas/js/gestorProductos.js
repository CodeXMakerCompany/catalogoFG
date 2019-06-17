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