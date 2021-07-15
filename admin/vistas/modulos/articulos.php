<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">PARAMETROS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">PARAMETROS</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">



      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-lg-12">
          


          <!-- TABLE: LATEST ORDERS -->
          <div class="card">

            <div class="card-header border-transparent">
              <h3 class="card-title">EVENTOS DE ADMISION</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                  <i class="fas fa-expand"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body p-0">


                  <!-- Main content -->
                <section class="content">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-12">

                              <div class="card">
                                
                                

                                <!-- /.card-header -->
                                <div class="card-body">
                                  <table id="tablaArticulo" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th style="width:10px">#</th>
                                      <th style="width:55px">ESTADO</th>
                                      <th>TITULO</th>
                                      <th>CATEGORIA</th>
                                      <th>PALABRAS CLAVE</th>
                                      <th>PORTADA</th>
                                      <th>DESCRIPCION</th>
                                      <th>PRESTADOS</th>
                                      <th>PESO</th>
                                      <th>PRECIO</th>
                                      <th style="width:80px">OP</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                            
                                            $idCat = array();
                                            
                                            $categoria = ControladorCategoria::ctrMostrarCategoria(null, null);
                                            
                                            for($i = 0; $i < count($categoria); $i++){
                                            
                                              $idCat[$categoria[$i]["idCategoria"]] = $categoria[$i]["titulo"];
                                            
                                            }

                                            $articulos = ControladorArticulos::ctrMostrarArticulos(null, null);

                                            foreach ($articulos as $key => $value) {
                                              
                                              /*=============================================
                                              AGREGAR ETIQUETAS DE ESTADO
                                              =============================================*/

                                              if($articulos[$key]["disponible"] == 0){

                                                $colorEstado = "btn-danger";
                                                $textoEstado = "Desactivado";
                                                $estadoArticulo = 1;
                                        
                                              }else{
                                        
                                                $colorEstado = "btn-success";
                                                $textoEstado = "Activado";
                                                $estadoArticulo = 0;
                                        
                                              }
                                        
                                              $disponible = "<button class='btn btn-xs btnActivar ".$colorEstado."' idArticulo='".$articulos[$key]["idDetalleArticulo"]."' estadoArticulo='".$estadoArticulo."'>".$textoEstado."</button>";
                                              
                                              $imagenPrincipal = "<a href='".$articulos[$key]["ruta"]."'><img src='".$articulos[$key]["portada"]."' class='img-thumbnail imgTablaPrincipal' width='100px'></a>";
                                              
                                              $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarArticulo' idArticulo='".$articulos[$key]["idDetalleArticulo"]."' data-toggle='modal' data-target='#modalEditarArticulo'><i class='fa fa-edit'></i></button><button class='btn btn-danger btnEliminarArticulo' idArticulo='".$articulos[$key]["idDetalleArticulo"]."' rutaCabecera='".$articulos[$key]["ruta"]."' imgPrincipal='".$articulos[$key]["portada"]."'><i class='fa fa-times'></i></button></div>";

                                              $accionesFinal = "<div class='btn-group'><a href='".$articulos[$key]["ruta"]."'><button class='btn btn-success' ><i class='fa fa-eye'></i></button></a><button class='btn btn-warning btnEditarArticulo' idArticulo='".$articulos[$key]["idDetalleArticulo"]."' data-toggle='modal' data-target='#modalEditarArticulo'><i class='fa fa-edit'></i></button></div>";

                                              echo '<tr>';
                                                echo '<td>'.$key.'</td>';
                                                echo '<td>'.$disponible.'</td>';
                                                echo '<td>'.$articulos[$key]["titulo"].'</td>';
                                                echo '<td>'.$idCat[$articulos[$key]["idCategoria"]].'</td>';
                                                echo '<td>'.$articulos[$key]["palabrasClave"].'</td>';
                                                echo '<td>'.$imagenPrincipal.'</td>';
                                                echo '<td>'.$articulos[$key]["descripcion"].'</td>';
                                                echo '<td>'.$articulos[$key]["prestados"].'</td>';
                                                echo '<td>'.$articulos[$key]["peso"].'</td>';
                                                echo '<td>'.$articulos[$key]["precio"].'</td>';
                                                echo '<td>'.$acciones.'</td>';
                                              echo '</tr>';

                                            }
                                    ?>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th>#</th>
                                      <th>ESTADO</th>
                                      <th>TITULO</th>
                                      <th>CATEGORIA</th>
                                      <th>PALABRAS CLAVE</th>
                                      <th>PORTADA</th>
                                      <th>DESCRIPCION</th>
                                      <th>PRESTADOS</th>
                                      <th>PESO</th>
                                      <th>PRECIO</th>
                                      <th>OP</th>
                                    </tr>
                                    </tfoot>
                                  </table>
                                </div>
                                <!-- /.card-body -->
                              </div>
                              <!-- /.card -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                  </section>
                      <!-- /.content -->





            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

              <a class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalAgregarArticulo">AGREGAR NUEVO EVENTO DE ADMISION</a>
              
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->



        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
























<!--=====================================
MODAL AGREGAR NUEVO ARTICULO
======================================-->

<div id="modalAgregarArticulo" class="modal fade" role="dialog">
  
   <div class="modal-dialog">
     
     <div class="modal-content">
       
       <!-- <form role="form" method="post" enctype="multipart/form-data"> -->
         
         <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#2b96fa; color:white">

          
          <h4 class="modal-title">AGREGAR ARTICULO</h4>

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
              
                  <input type="text" class="form-control input-lg validarArticulo tituloArticulo"  placeholder="Ingresar título producto">

                </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <input type="text" class="form-control input-lg rutaArticulo" placeholder="Ruta url del producto" readonly>

                </div>

            </div>

           <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO
            ======================================-->

            <!--
            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span> 

                  <select class="form-control input-lg seleccionarTipo">
                    
                    <option value="">Selecionar tipo de producto</option>

                    <option value="virtual">Virtual</option>

                    <option value="fisico">Físico</option>            
    
                  </select>

                </div>

            </div>
            -->


            


           <!--=====================================
            AGREGAR CATEGORÍA
            ======================================-->

            <div class="form-group">
                
                <div class="input-group">
              
                  <select class="form-control input-lg seleccionarCategoria">
                  
                    <option value="">Selecionar categoría</option>

                    <?php

                    $item = null;
                    $valor = null;

                    $categoria = ControladorCategoria::ctrMostrarCategoria($item, $valor);

                    foreach ($categoria as $key => $value) {
                      
                      echo '<option value="'.$value["idCategoria"].'">'.$value["titulo"].'</option>';
                    }

                    ?>

                  </select>

                </div>

            </div>




            <!--=====================================
            AGREGAR SUBCATEGORÍA
            ======================================-->
            <!--
            <div class="form-group  entradaSubcategoria" style="display:none">
              
               <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg seleccionarSubCategoria">

                  </select>

                </div>

            </div>
            -->
           <!--=====================================
            AGREGAR DESCRIPCIÓN
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
              
                <textarea type="text" maxlength="320" rows="3" class="form-control input-lg descripcionArticulo" placeholder="Ingresar descripción del articulo"></textarea>

              </div>

            </div>


            <!--=====================================
            AGREGAR PALABRAS CLAVES
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <input type="text" class="form-control input-lg tagsInput pClavesArticulo" data-role="tagsinput"  placeholder="Ingresar palabras claves">

                </div>

            </div>




            <!--=====================================
            AGREGAR FOTO DE PORTADA
            ======================================-->
            <!--
            <div class="form-group">
              
              <div class="panel">SUBIR FOTO PORTADA</div>

              <input type="file" class="fotoPortada">

              <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/cabeceras/default/default.jpg" class="img-thumbnail previsualizarPortada" width="100%">

            </div>
            -->
            
            <!--=====================================
            AGREGAR FOTO DE MULTIMEDIA
            ======================================-->

            <div class="form-group">
                
              <div class="panel">SUBIR FOTO PRINCIPAL DEL ARTICULO</div>

              <input type="file" class="fotoPrincipalA">

              <p class="help-block">Tamaño recomendado 500px * 500px <br> Peso máximo de la foto 5MB</p>

              <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipalA" width="400px">

            </div>


            <!--=====================================
            ENTRADA PARA AGREGAR MULTIMEDIA
            ======================================-->

            <div class="form-group agregarMultimedia">
              
              <div class="panel">SUBIR IMAGENES DEL ARTICULO</div>

              <div class="multimediaAdd needsclick dz-clickable">

                <div class="dz-message needsclick">
                  
                  Arrastrar o dar click para subir imagenes.

                </div>

              </div>

            </div>




            <!--=====================================
            AGREGAR PRECIO, PESO Y ENTREGA
            ======================================-->

            <div class="form-group row">
               
              <!-- PRECIO -->

              <div class="col-md-4 col-xs-12">
  
                <div class="panel">PRECIO</div>
                
                <div class="input-group">
                
                  <input type="number" class="form-control input-lg precio" min="0" step="any" value="0">

                </div>

              </div>

              <!-- PESO -->

              <div class="col-md-4 col-xs-12">
  
                <div class="panel">PESO</div>
              
                <div class="input-group">
              
                  <input type="number" class="form-control input-lg peso" min="0" step="any" value="0">

                </div>

              </div>

              <!-- DISPONIBLE -->

              <div class="col-md-4 col-xs-12">
  
                <div class="panel">DISPONIBLE</div>
              
                <div class="input-group">
              
                  <!--<input type="number" class="form-control input-lg disponible" min="0" max="2" value="1">
                    -->
                  <select class="form-control input-lg disponible">

                    <option value="1">Si</option>
                    <option value="0">No</option>

                  </select>

                </div>

              </div>

            </div>

        
          
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
  
          <!--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                  -->
          
          <!--<button type="button" class="btn btn-primary guardarArticulo" style="width:100%;">GUARDAR ARTICULO</button>
                  -->    
          <button type="button" class="ov-btn-slide-top guardarArticulo">GUARDAR ARTICULO</button>
          
        </div>

       <!-- </form> -->

     </div>

   </div>

</div>



























<!--=====================================
MODAL EDITAR ARTICULO
======================================-->

<div id="modalEditarArticulo" class="modal fade" role="dialog">
  
   <div class="modal-dialog">
     
     <div class="modal-content">
       
       <!-- <form role="form" method="post" enctype="multipart/form-data"> -->
         
         <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <h4 class="modal-title">Editar Articulo</h4>

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
              
                  <input type="text" class="form-control input-lg validarArticulo tituloArticulo" readonly>

                  <input type="hidden" class="idArticulo">

                </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <input type="text" class="form-control input-lg rutaArticulo" readonly>

                </div>

            </div>

           <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO
            ======================================-->

            <!--
            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span> 

                  <select class="form-control input-lg seleccionarTipo">
                    
                    <option value="">Selecionar tipo de producto</option>

                    <option value="virtual">Virtual</option>

                    <option value="fisico">Físico</option>            
    
                  </select>

                </div>

            </div>
            -->


            


           <!--=====================================
            AGREGAR CATEGORÍA
            ======================================-->

            <div class="form-group">
                
                <div class="input-group">
              
                  <select class="form-control input-lg seleccionarCategoria">
                  
                    <option class="optionEditarCategoria"></option>
                    <?php

                    $item = null;
                    $valor = null;

                    $categoria = ControladorCategoria::ctrMostrarCategoria($item, $valor);

                    foreach ($categoria as $key => $value) {
                      
                      echo '<option value="'.$value["idCategoria"].'">'.$value["titulo"].'</option>';
                    }

                    ?>

                  </select>

                </div>

            </div>




            <!--=====================================
            AGREGAR SUBCATEGORÍA
            ======================================-->
            <!--
            <div class="form-group  entradaSubcategoria" style="display:none">
              
               <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg seleccionarSubCategoria">

                  </select>

                </div>

            </div>
            -->
           <!--=====================================
            AGREGAR DESCRIPCIÓN
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
              
                <textarea type="text" maxlength="320" rows="3" class="form-control input-lg descripcionArticulo"></textarea>

              </div>

            </div>


            <!--=====================================
            AGREGAR PALABRAS CLAVES
            ======================================-->

            <div class="form-group editarPalabrasClavesA">
              <!--
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                  <input type="text" class="form-control input-lg tagsInput pClavesArticulo">

                </div> 
              -->
            </div>




            <!--=====================================
            AGREGAR FOTO DE PORTADA
            ======================================-->
            <!--
            <div class="form-group">
              
              <div class="panel">SUBIR FOTO PORTADA</div>

              <input type="file" class="fotoPortada">

              <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/cabeceras/default/default.jpg" class="img-thumbnail previsualizarPortada" width="100%">

            </div>
            -->
            
            <!--=====================================
            AGREGAR FOTO DE MULTIMEDIA
            ======================================-->

            <div class="form-group">
                
              <div class="panel">SUBIR FOTO PRINCIPAL DEL ARTICULO</div>

              <input type="file" class="fotoPrincipalA">
              <input type="hidden" class="antiguaFotoPrincipalA">

              <p class="help-block">Tamaño recomendado 500px * 500px <br> Peso máximo de la foto 5MB</p>

              <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipalA" width="400px">

            </div>


            <!--=====================================
            ENTRADA PARA AGREGAR MULTIMEDIA
            ======================================-->

            <div class="form-group agregarMultimedia"> 
              
            
              <div class="row previsualizarImgAdd"></div>
              
             <!-- <div class="panel">SUBIR IMAGENES DEL ARTICULO</div>  -->

              <div class="multimediaAdd needsclick dz-clickable">

                <div class="dz-message needsclick">
                  
                  Arrastrar o dar click para subir imagenes.

                </div>

              </div>

            </div>




            <!--=====================================
            AGREGAR PRECIO, PESO Y DISPONIBLE
            ======================================-->

            <div class="form-group row">
               
              <!-- PRECIO -->

              <div class="col-md-4 col-xs-12">
  
                <div class="panel">PRECIO</div>
                
                <div class="input-group">
                
                  <input type="number" class="form-control input-lg precio" min="0" step="any" value="0">

                </div>

              </div>

              <!-- PESO -->

              <div class="col-md-4 col-xs-12">
  
                <div class="panel">PESO</div>
              
                <div class="input-group">
              
                  <input type="number" class="form-control input-lg peso" min="0" step="any" value="0">

                </div>

              </div>

              <!-- DISPONIBLE -->

              <div class="col-md-4 col-xs-12">
  
                <div class="panel">DISPONIBLE</div>
              
                <div class="input-group">
              
                  <!--<input type="number" class="form-control input-lg disponible" min="0" max="2" value="1">
                  -->
                  <select class="form-control input-lg disponible">

                    <option value="1">Si</option>
                    <option value="0">No</option>

                  </select>
                </div>

              </div>

            </div>

        
          
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-primary guardarCambiosArticulo" style="width:100%;">GUARDAR ARTICULO</button>

        </div>

       <!-- </form> -->

     </div>

   </div>

</div>



<?php

  $eliminarArticulo = new ControladorArticulos();
  $eliminarArticulo -> ctrEliminarArticulo();

?>