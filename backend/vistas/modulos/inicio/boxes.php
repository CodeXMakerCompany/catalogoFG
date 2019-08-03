      <div class="row">
        <!-- ./col -->
      <?php 
          $item = null;
          $valor = null;
          $rentabilidad = ControladorRentabilidad::ctrMostrarRentabilidad($item, $valor);
       ?>
        
        <div class="col-lg-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php
              echo 
              $capital = number_format((float)($rentabilidad['capital']-$rentabilidad['egresos']), 2, '.', '')?> <small>mxn</small></h3>

              <p>Capital</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Añadir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>3%</h3>

              <p>Cremiento ventas</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php 
                if ($capital >= $rentabilidad['inversion']) {
                  $ganancia = $capital-$rentabilidad['inversion'];

                 function porcentaje($total, $parte, $redondear = 2) {
                      return round($parte / $total * 100, $redondear);
                      }
          
                $porcentaje = $ganancia;
                 
                $total = $rentabilidad['capital'];
 
                echo porcentaje($total, $porcentaje, 2) . "%<br>";
                }
              ?></h3>

              <p>Ganancias: <?php echo $ganancia ?> mxn</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= number_format((float)$rentabilidad['egresos'], 2, '.', '')?></h3>

              <p>Egresos</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Añadir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=number_format((float)$rentabilidad['inversion'], 2, '.', '');
              ?> <small>mxn</small></h3>

              <p>Inversiones</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="btnInversion small-box-footer">Añadir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div>

