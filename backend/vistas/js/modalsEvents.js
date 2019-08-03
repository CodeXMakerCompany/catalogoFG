var nuevoEvento;



$('#btnAgregarInversion').click(function(){

    recolectarDatosGUIinversion();
    enviarInformacionInversion('agregarInversion',nuevoEvento);      
    
    
});

function recolectarDatosGUIinversion(){

    nuevoEvento = {
        inve:$('#txtMonto').val()
    };
}

function enviarInformacionInversion(accion,objEvento){
  $.ajax({
        type:'POST',
        url:'json.php?accion='+accion,
        data:objEvento,
        success:function(msg){

            if (msg) {

                /* Mensaje alerta: exito */
    Swal.fire(
        'Listo!',
        'El campo fue actualizado!',
        'success'
    ) 
               
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


function limpiarFormulario(){
            $('#numMonto').val('');
}

$('.btnInversion').click(function(){

    $("#modalInversion").modal();
    

});
