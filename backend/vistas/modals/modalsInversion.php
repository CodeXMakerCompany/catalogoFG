

<!-- Modal(Modificar agregar y eliminar) -->
<div class="modal fade" id="modalInversion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento"></h5>
        <label for="titular">Añade una nueva inversión </label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- html comment -->

        <div class="form-row">
          <div class="form-group col-md-8">  
            <label for="monto">Monto : </label>
            <input type="number" id="txtMonto" class="form-control" placeholder="Hora de la inversión">
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" id="btnAgregarInversion" class="btn btn-success">Agregar</button>
      </div>
    </div>
  </div>
</div>
