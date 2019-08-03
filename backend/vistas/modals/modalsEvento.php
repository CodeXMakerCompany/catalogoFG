

<!-- Modal(Modificar agregar y eliminar) -->
<div class="modal fade" id="modalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- html comment -->
            
        
        <input type="hidden" id="txtId">

        
        <input type="hidden" id="txtFecha" name="txtFecha">
        
        <div class="form-row">
          <div class="form-group col-md-8">  
            <label for="titulo">Titulo : </label>
            <input type="text" id="txtTitulo" class="form-control" placeholder="Titulo del evento">
          </div>

          <div class="form-group col-md-4">
            <label for="hora">Hora del evento:  </label>

            <div class="input-group clockpicker" data-autoclose="true">
              <input type="text" id="txtHora" value="10:30" class="form-control">
            </div>

            
          </div>
        </div>

      <div class="form-group">
        <label for="descripcion">Descripción : </label>
        <textarea id="txtDescripcion" rows="3" class="form-control"></textarea>
      </div>

      <div class="form-group"> 
        <label for="color">Color : </label>
        <input type="color" value="#7A2FB8"  id="txtColor" class="form-control" style="height: 36px;">
      </div> 

      </div>
      <div class="modal-footer">
        <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
         <button type="button" id="btnEditar" class="btn btn-success">Modificar</button>
          <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
           <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
