<div class="tab-content no padding">
<!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="CalendarioWeb"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>

      <div class="row"> 
        <div class="col-md-3 col-sm-12">

         <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion ion-pie-graph"></i></span>
          
          <?php 
            $item = null;
                      $valor = null;

          $eventosD = ControladorEventos::ctrMostrarEventosHoy($item, $valor);
          $eventosT = ControladorEventos::ctrMostrarEventosTotal($item, $valor);

          ?>

            <div class="info-box-content">
              <span class="info-box-text">Asuntos de hoy:</span>
              <span class="info-box-number"><?php echo $eventosD['TotalEventos']?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="ion ion-pie-graph"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Asuntos totales: </span>
              <span class="info-box-number"><?php echo ($eventosT['TotalEventos'])?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>
        </div>

</div>
