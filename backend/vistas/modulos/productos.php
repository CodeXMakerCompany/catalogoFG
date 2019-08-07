
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Productos
        <small>Gestor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio </a></li>
        <li class="active">Gestor Productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="box">
        
        <div class="box-header with-border">


          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
            
            Agregar Producto

          </button> 
        

        </div>

        <div class="box-body">

          <table class="table table-bordered table-striped  dt-responsive tablaProductos" width="100%">
            
            
          <thead>
            
            <tr>
              
                <th style="width:10px">#</th>
                <th>Titulo</th>  
                <th>Categoria</th>  
                <th>Subcategoria</th>  
                <th>Ruta</th> 
                <th>Descripcion</th>  
                <th>Palabras claves</th>  
                <th>Portada</th>  
                <th>Imagen Principal</th>  
                <th>Multimedia</th>  
                <th>Detalles</th>  
                <th>Precio</th>  
                <th>Peso</th>  
                <th>Tiempo de entrega</th>  
                <th>Tipo de oferta</th>  
                <th>Valor de oferta</th>  
                <th>Acciones</th>   

            </tr>

          </thead>

          </table>
          

        </div>


      </div>

    </section>
    <!-- /.content -->
  </div>

<!-- MODAL AGREGAR PRODUCTO -->

<div id="modalAgregarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content windowStl">

      <!-- <form role="form" method="post" enctype="multipart/form-data"> -->
        
            <!-- cabeza del modal -->

            <div class="modal-header windowStl colorHeader">
              
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">Agregar Producto</h4>

            </div>
          
            <!-- fin cabeza del modal -->

            <!-- cuerpo del modal -->

            <div class="modal-body">
              
              <div class="box-body">
                
                <!-- Entrada para el titulo -->

                <div class="form-group">
                  
                  <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                  <input type="text" class="form-control input-lg validarProducto nuevoProducto tituloProducto" placeholder="Ingresar titulo producto">  
                  </div>

                </div>
                
                <!-- Entrada para la ruta del producto -->

                <div class="form-group">
                  
                  <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-link"></i></span>

                  <input type="text" class="form-control input-lg rutaProducto" placeholder="Ruta url del producto" readonly>  
                  </div>

                </div>

                <!-- Entrada para la multimedia -->

                <div class="form-group agregarMultimedia">
                  
                <!-- Subir galeria de imagenes -->
                <div class="multimediaFisica needsclick dz-clickable">
                  
                  <div class="dez-message needsclick">
                    
                    Arrastrar o dar click para subir imagenes.

                  </div>


                </div>

              </div>

              <div class="detallesFisicos">
              
              <div class="panel">DETALLES</div>

              <div class="form-group row">
                
                <!-- Medidas empaquetado -->
                      <div class="col-xs-3">
                        <input class="form-control input-lg" type="text" value="MedidasE" readonly>
                      </div>

                      <div class="col-xs-9">
                        <input class="form-control input-lg tagsInput detalleMempaquetado" data-role="tagsinput" type="text"  placeholder="Separe los valores con coma">
                      </div>

              </div>

              <div class="form-group row">
                
                <!-- Material -->
                      <div class="col-xs-3">
                        <input class="form-control input-lg" type="text" value="Material" readonly>
                      </div>

                      <div class="col-xs-9">
                        <input class="form-control input-lg tagsInput detalleMaterial" data-role="tagsinput" type="text"  placeholder="Separe los valores con coma">
                      </div>

              </div>

              <div class="form-group row">
                
                <!-- GradoT -->
                      <div class="col-xs-3">
                        <input class="form-control input-lg" type="text" value="GradoT" readonly>
                      </div>

                      <div class="col-xs-9">
                        <input class="form-control input-lg tagsInput detalleGradoT" data-role="tagsinput" type="text"  placeholder="Separe los valores con coma">
                      </div>

              </div>

              <div class="form-group row">
                
                 <!-- Pais -->
                      <div class="col-xs-3">
                        <input class="form-control input-lg" type="text" value="Pais" readonly>
                      </div>

                      <div class="col-xs-9">
                        <input class="form-control input-lg detallePais" type="text"  placeholder="Descripción">
                      </div>

              </div>

              <div class="form-group row">
                
                  <!-- Dimensiones -->
                      <div class="col-xs-3">
                        <input class="form-control input-lg" type="text" value="Dimensiones" readonly>
                      </div>

                      <div class="col-xs-9">
                        <input class="form-control input-lg detalleDimensiones" type="text"  placeholder="Descripción">
                      </div>

              </div>


              <div class="form-group row">
                
                  <!-- Escala -->
                      <div class="col-xs-3">
                        <input class="form-control input-lg" type="text" value="Escala" readonly>
                      </div>

                      <div class="col-xs-9">
                        <input class="form-control input-lg detalleEscala" type="text"  placeholder="Descripción">
                      </div>

              </div>

              <div class="form-group row">
                
                  <!-- Version -->
                      <div class="col-xs-3">
                        <input class="form-control input-lg" type="text" value="Version" readonly>
                      </div>

                      <div class="col-xs-9">
                        <input class="form-control input-lg detalleVersion" type="text"  placeholder="Descripción">
                      </div>

              </div>

              <div class="form-group row">
                
                  <!-- Marca -->
                      <div class="col-xs-3">
                        <input class="form-control input-lg" type="text" value="Marca" readonly>
                      </div>

                      <div class="col-xs-9">
                        <input class="form-control input-lg detalleMarca" type="text"  placeholder="Descripción">
                      </div>

              </div>

              <div class="form-group row">
                
                 <!-- Peso -->
                      <div class="col-xs-3">
                        <input class="form-control input-lg" type="text" value="Peso" readonly>
                      </div>

                      <div class="col-xs-9">
                        <input class="form-control input-lg detallePeso" type="text"  placeholder="Descripción">
                      </div>

              </div>


            </div>

            <!--=====================================
            AGREGAR CATEGORÍA
            ======================================-->

            <div class="form-group">
                
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg seleccionarCategoria">
                  
                    <option value="">Selecionar Categoría</option>

                  <?php 

                      $item = null;
                      $valor = null;

                      $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                      foreach ($categorias as $key => $value) {
                          
                          echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';

                        }  

                     ?>

                  </select>

                </div>

            </div>

            <!--=====================================
            AGREGAR SUBCATEGORÍA
            ======================================-->

            <div class="form-group entradaSubCategoria" style="display: none">
                
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg seleccionarSubCategoria">
              


                  </select>

                </div>

            </div> 

          <!-- =============================================
            =            AGREGAR DESCRIPCION            =
            =============================================-->
            
            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                <textarea type="text" maxlength="320" class="form-control input-lg descripcionProducto" placeholder="Ingresar descripción del producto."></textarea>
              </div>

            </div>


            <!-- =============================================
            =            AGREGAR PALABRAS CLAVES            =
            =============================================-->
            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg tagsInput pClavesProducto" data-role="tagsinput" placeholder="Ingresar palabras claves">

              </div>

            </div>
            
            <!-- =============================================
            =            AGREGAR FOTO DE PORTADA            =
            =============================================-->
            <div class="form-group">
              
              <div class="panel">SUBIR FOTO DE PORTADA</div>
                
                <input type="file" class="fotoPortada">

                <p class="help-block">Tamaño recomendado 1280px * 720 <br> Peso máximo de la foto 128mb</p>

                <img src="vistas/img/preloader/example.gif" class=" img-thumbnail previsualizarPortada" width="100%">

            </div>

            <!-- =============================================
            =            AGREGAR FOTOS DE MULTIMEDIA          =
            =============================================-->
            
            <div class="form-group">
              
              <div class="panel">SUBIR FOTO PRINCIPAL DEL PRODUCTO</div>
                
                <input type="file" class="fotoPrincipal">

                <p class="help-block">Tamaño recomendado 1280px * 720 <br> Peso máximo de la foto 128mb</p>

                <img src="vistas/img/preloader/kokoro.gif" class="img-thumbnail previsualizarPrincipal" width="200px">

            </div>
            
            <!-- =============================================
            =            AGREGAR PRECIO, PESO Y ENTREGA      =
            =============================================-->
            
            <div class="form-group row">
              
              <!-- PRECIO -->

              <div class="col-md-4 col-xs-12">
                
                <div class="panel">PRECIO</div>

                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                  <input type="number" class="form-control input-lg precio" min="0" step="any">

                </div>

              </div>

              <!-- PESO -->

              <div class="col-md-4 col-xs-12">
                
                <div class="panel">PESO</div>

                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-balance-scale"></i></span>

                  <input type="number" class="form-control input-lg peso" min="0" step="any" value="0">

                </div>

              </div>

              <!-- ENTREGA -->

              <div class="col-md-4 col-xs-12">
                
                <div class="panel">ENTREGA</div>

                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-truck"></i></span>

                  <input type="number" class="form-control input-lg entrega" value="0" step="any" min="0">

                </div>

              </div>

            </div>

            <!-- =============================================
            =            AGREGAR OFERTA                      =
            =============================================-->

            <div class="form-group">
              
              <select class="form-control input-lg selActivarOferta">
                
                <option value="">No tiene oferta</option>
                <option value="oferta">Activar oferta</option>

              </select>

            </div>

            <div class="datosOferta" style="display: none">
              
              <!-- VALOR OFERTAS -->

              <div class="form-group row">
                
                <div class="col-xs-6">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                    <input class="form-control input-lg valorOferta precioOferta" tipo="oferta" type="number" value="0" min="0" placeholder="Precio">

                  </div>

                </div>

                <div class="col-xs-6">
                  
                  <div class="input-group">

                    <input class="form-control input-lg valorOferta descuentoOferta" tipo="descuento" type="number" value="0" min="0" placeholder="Descuento">
                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                  </div>

                </div>

              </div>
              
            </div>



          </div>

        </div>





            <!-- fin cuerpo del modal -->

            <!-- Pie del modal -->

            <div class="modal-footer">
              
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

              <button type="button" class="btn btn-primary guardarProducto">Guardar Producto</button>

            </div>  

            <!--fin  Pie del modal -->
            
      <!-- </form> -->
      
    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">
  
   <div class="modal-dialog">
     
     <div class="modal-content">
          
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--=====================================
            ENTRADA PARA EL TÍTULO
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                  <input type="text" class="form-control input-lg validarProducto tituloProducto" readonly>

                  <input type="hidden" class="idProducto">
                  <input type="hidden" class="idCabecera">

                </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                  <input type="text" class="form-control input-lg rutaProducto" readonly>

                </div>

            </div>

            <!--=====================================
            ENTRADA PARA AGREGAR MULTIMEDIA
            ======================================-->

            <div class="form-group agregarMultimedia"> 

              <!--=====================================
              SUBIR MULTIMEDIA DE PRODUCTO FÍSICO
              ======================================-->

              <div class="row previsualizarImgFisico"></div>
              
              <div class="multimediaFisica needsclick dz-clickable">

                <div class="dz-message needsclick">
                  
                  Arrastrar o dar click para subir imagenes.

                </div>

              </div>
   
            </div>

           <!--=====================================
            AGREGAR CATEGORÍA
            ======================================-->

            <div class="form-group">
                
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg seleccionarCategoria">
                  
                    <option class="optionEditarCategoria"></option>

                    <?php

                    $item = null;
                    $valor = null;

                    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                    foreach ($categorias as $key => $value) {
                      
                      echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                    }

                    ?>

                  </select>

                </div>

            </div>

            <!--=====================================
            AGREGAR SUBCATEGORÍA
            ======================================-->

            <div class="form-group entradaSubcategoria">
                
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg seleccionarSubCategoria">
                  
                    <option class="optionEditarSubCategoria"></option>

                  </select>

                </div>

            </div>

           <!--=====================================
            AGREGAR DESCRIPCIÓN
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" maxlength="320" rows="3" class="form-control input-lg descripcionProducto"></textarea>

              </div>

            </div>

            <!--=====================================
            AGREGAR PALABRAS CLAVES
            ======================================-->

            <div class="form-group editarPalabrasClaves">
              
              <!--   <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                  <input type="text" class="form-control input-lg tagsInput pClavesProducto" data-role="tagsinput"  placeholder="Ingresar palabras claves">

                </div> -->

            </div>

            <!--=====================================
            AGREGAR FOTO DE PORTADA
            ======================================-->

            <div class="form-group">
              
              <div class="panel">SUBIR FOTO PORTADA</div>

              <input type="file" class="fotoPortada">
              <input type="hidden" class="antiguaFotoPortada">

              <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/cabeceras/default/default.jpg" class="img-thumbnail previsualizarPortada" width="100%">

            </div>

            <!--=====================================
            AGREGAR FOTO DE MULTIMEDIA
            ======================================-->

            <div class="form-group">
                
              <div class="panel">SUBIR FOTO PRINCIPAL DEL PRODUCTO</div>

              <input type="file" class="fotoPrincipal">
              <input type="hidden" class="antiguaFotoPrincipal">

              <p class="help-block">Tamaño recomendado 400px * 450px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="200px">

            </div>

            <!--=====================================
            AGREGAR PRECIO, PESO Y ENTREGA
            ======================================-->

            <div class="form-group row">
               
              <!-- PRECIO -->

              <div class="col-md-4 col-xs-12">
  
                <div class="panel">PRECIO</div>
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 

                  <input type="number" class="form-control input-lg precio" min="0" step="any">

                </div>

              </div>

              <!-- PESO -->

              <div class="col-md-4 col-xs-12">
  
                <div class="panel">PESO</div>
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-balance-scale"></i></span> 

                  <input type="number" class="form-control input-lg peso" min="0" step="any" value="0">

                </div>

              </div>

              <!-- ENTREGA -->

              <div class="col-md-4 col-xs-12">
  
                <div class="panel">DÍAS DE ENTREGA</div>
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-truck"></i></span> 

                  <input type="number" class="form-control input-lg entrega" min="0" value="0">

                </div>

              </div>

            </div>

            <!--=====================================
            AGREGAR OFERTAS
            ======================================-->

            <div class="form-group">
              
              <select class="form-control input-lg selActivarOferta">
                
                <option value="">No tiene oferta</option>
                <option value="oferta">Activar oferta</option>
               
              </select>

            </div>

            <div class="datosOferta" style="display:none">
            
              <!--=====================================
              VALOR OFERTAS
              ======================================-->

              <div class="form-group row">
                  
                <div class="col-xs-6">

                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 
                    
                    <input class="form-control input-lg valorOferta precioOferta" tipo="oferta" type="number" value="0" min="0" placeholder="Precio">

                  </div>

                </div>

                <div class="col-xs-6">
                     
                  <div class="input-group">
                       
                    <input class="form-control input-lg valorOferta descuentoOferta" tipo="descuento" type="number" value="0"  min="0" placeholder="Descuento">
                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                  </div>

                </div>

              </div>

            </div>
          
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
  
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary guardarCambiosProducto">Guardar cambios</button>

        </div>

     </div>

   </div>

</div>

  <?php 

    $eliminarProducto = new ControladorProductos();
    $eliminarProducto -> ctrEliminarProducto();

   ?>