$(document).ready(function(){
    $('#CalendarioWeb').fullCalendar({
        
        header:{
            left:   'prev,next, Guia',
            center: 'title',
            right:  'month, agendaWeek, agendaDay'
        },
        customButtons:{
            Guia:{
                text:"Guía",
                click:function(){

                    Swal.fire({
                      title: 'Como usar!',
                      text: 'El calendario es intuitivo y totalmente dinámico, sientase libre de probar todas las opciones.',
                      imageUrl: 'dist/img/consultorioGifs/fullC.gif',
                      imageWidth: 400,
                      imageHeight: 200,
                      imageAlt: 'Custom image',
                      animation: false
                    })    

                }
            }
        },
        dayClick:function(date, jsEvent, view){
            limpiarFormulario();
            $('#txtFecha').val(date.format());
            $(this).css('background-color', '#49D49D');
            $("#modalEventos").modal();
        },
            events:'json.php',
        eventClick:function(calEvent,jsEvent,view){
            //titulo
            $('#tituloEvento').html(calEvent.title);

            //mostrar la info del evento en los inputs con los datos jason
            //ojo deben ser los parametros de los calevent como los nombres de los campos en la bd
            //
            $('#txtId').val(calEvent.id);
            $('#txtTitulo').val(calEvent.title);
            $('#txtColor').val(calEvent.color);

            FechaHora= calEvent.start._i.split(" ");
            $('#txtFecha').val(FechaHora[0]);
            $('#txtHora').val(FechaHora[1]);

            $('#txtDescripcion').val(calEvent.description);

            $('#modalEventos').modal();

        },
        editable:true,
        eventDrop:function(calEvent){
            $('#txtId').val(calEvent.id);
            $('#txtTitulo').val(calEvent.title);
            $('#txtColor').val(calEvent.color);
            $('#txtDescripcion').val(calEvent.description);

            var fechaHora =calEvent.start.format().split("T");
            $('#txtFecha').val(fechaHora[0]);
            $('#txtHora').val(fechaHora[1]);

            recolectarDatosGUI();
            enviarInformacion('editar',nuevoEvento);

        }
        

    });
});

var nuevoEvento;

$('#btnAgregar').click(function(){

    recolectarDatosGUI();
    enviarInformacion('agregar',nuevoEvento);      
    
    /* Mensaje alerta: exito */
    Swal.fire(
        'Listo!',
        'Asunto creado!',
        'success'
    ) 

});

$('#btnEliminar').click(function(){

    recolectarDatosGUI();
    enviarInformacion('eliminar',nuevoEvento);      
    
    /* Mensaje alerta: exito */
    Swal.fire(
        'Listo!',
        'Asunto eliminado!',
        'success'
    ) 

});


$('#btnEditar').click(function(){

    recolectarDatosGUI();
    enviarInformacion('editar',nuevoEvento,true);      
    
    /* Mensaje alerta: exito */
    Swal.fire(
        'Listo!',
        'El campo fue actualizado!',
        'success'
    ) 
});

function recolectarDatosGUI(){

    nuevoEvento = {
        id:$('#txtId').val(),
        title:$('#txtTitulo').val(),
        start:$('#txtFecha').val()+" "+$('#txtHora').val(),
        color:$('#txtColor').val(),
        descripcion:$('#txtDescripcion').val(),
        textColor: "#FFFFFF",
        ending:$('#txtFecha').val()+" "+$('#txtHora').val()
    };
}

function enviarInformacion(accion,objEvento,modal){
  $.ajax({
        type:'POST',
        url:'json.php?accion='+accion,
        data:objEvento,
        success:function(msg){

            if (msg) {

                $('#CalendarioWeb').fullCalendar('refetchEvents');
                if (!modal) {
                     $('#modalEventos').modal('toggle');
                }
               
            }
        },
        error:function(){

            /* Mensaje alerta: error */
            Swal.fire({
             type: 'error',
                title: 'Oops...',
                    text: 'Error detectado en la recepcion de datos!',
                    footer: '<a href>Why do I have this issue?</a>'
            })
        }
  }); 
}

$('.clockpicker').clockpicker();

function limpiarFormulario(){
            $('#txtId').val('');
            $('#txtTitulo').val('');
            $('#txtColor').val('');
            $('#txtDescripcion').val('');
}