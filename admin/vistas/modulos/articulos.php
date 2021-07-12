<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Gestor Articulos
    </h1>

    <!-- BARRA DE NAV-->
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor Articulos</li>

    </ol>
    
  </section>




  <section class="content">

    <div class="box">
       
      <div class="box-header with-border">
         
       <!--
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArticulo">
          
          Agregar Articulo

        </button>
-->

        <button class="ov-btn-slide-topBut" data-toggle="modal" data-target="#modalAgregarArticulo">

          Agregar Articulo

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablaArticulos" width="100%">
        
          <thead>
         
            <tr>
             
               <th style="width:10px">#</th>
               <th style="width:55px">Estado</th>
               <th>Titulo</th>
               <th>Categoria</th>
               <th>Palabras Clave</th>
               <th>Portada</th>
               <th>Descripción</th>
               <th>Prestados</th>
               <th>Peso</th>
               <th>Precio</th>
               <th style="width:80px">Acciones</th>

            </tr> 

          </thead>   
     
        </table>
          
      </div>

    </div>

  </section>





  <section class="content-header">

  <h1>
    Gestor Categorias
  </h1>

  </section>

  <section class="content">

  <div class="box">
    
    <div class="box-header with-border">
      
        <!--
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoriaM">
          
          Agregar Nueva Categoria

        </button>
-->
        <button class="ov-btn-slide-topBut" data-toggle="modal" data-target="#modalAgregarCategoriaM">

          Agregar Nueva Categoria

        </button>

    </div>

    <div class="box-body">

      <table class="table table-bordered table-striped dt-responsive tablaCategoriasM" width="100%">
      
        <thead>
      
          <tr>
          
            <th style="width:10px">#</th>
            <th>Titulo</th>
            <th style="width:10px">Acciones</th>

          </tr> 

        </thead>   
  
      </table>
        
    </div>

  </div>

  </section>
  
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="numero-parcelas">Numero parcelas</label>
          <select name="form-control" id="numero-parcelas" name="numero-parcelas" oninput="camposParcela();">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
          </select>
        </div>
      </div>
    </div>

    <div class="row" id="lista-parcelas"></div>

    <span id="span-modelo" style="display:none;">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="parcela-0">Valor (R$)</label>
            <input type="text" class="form-control" name="parcela-0" id="parcela-0">
          </div>
        </div>
      </div>
    </span>

    <span id="span-real"></span>

  </div>

</div>



<script>
  
  function camposParcela(){
    var spantestemodelo = $('#span-modelo').html();
    var spantestemodelo_strinf = spantestemodelo.toString();
    var campos = $('#numero-parcelas').val();

    var i;

    i=1;

    var texto = '';
    while(i<=campos){
      texto = texto + spantestemodelo_strinf.replace(/-0/g,'-' + i.toString());
      i = i + 1; 
    }

    $("#span-real").html(texto);
  }

  camposParcela();

</script>




<!--
<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Gestor Categorias
    </h1>
    
  </section>

  <section class="content">

    <div class="box">
       
      <div class="box-header with-border">
         
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoriaM">
          
          Agregar Nueva Categoria

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablaCategoriasM" width="100%">
        
          <thead>
         
            <tr>
             
               <th style="width:10px">#</th>
               <th>Titulo</th>
               <th style="width:10px">Acciones</th>

            </tr> 

          </thead>   
     
        </table>
          
      </div>

    </div>

  </section>

</div>
-->



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

          <button type="button" class="close" data-dismiss="modal">&times;</button>

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
              
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                  <input type="text" class="form-control input-lg validarArticulo tituloArticulo"  placeholder="Ingresar título producto">

                </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-link"></i></span> 

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
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

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
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

                <textarea type="text" maxlength="320" rows="3" class="form-control input-lg descripcionArticulo" placeholder="Ingresar descripción del articulo"></textarea>

              </div>

            </div>


            <!--=====================================
            AGREGAR PALABRAS CLAVES
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

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
                
                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 

                  <input type="number" class="form-control input-lg precio" min="0" step="any" value="0">

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

              <!-- DISPONIBLE -->

              <div class="col-md-4 col-xs-12">
  
                <div class="panel">DISPONIBLE</div>
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-truck"></i></span> 

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

          <button type="button" class="close" data-dismiss="modal">&times;</button>

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
              
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                  <input type="text" class="form-control input-lg validarArticulo tituloArticulo" readonly>

                  <input type="hidden" class="idArticulo">

                </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-link"></i></span> 

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
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

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
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 

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
                
                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 

                  <input type="number" class="form-control input-lg precio" min="0" step="any" value="0">

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

              <!-- DISPONIBLE -->

              <div class="col-md-4 col-xs-12">
  
                <div class="panel">DISPONIBLE</div>
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-truck"></i></span> 

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





















<!--==============================================================================================================================================================================================================================
MODAL AGREGAR NUEVA CATEGORIA
===============================================================================================================================================================================================================================-->

<div id="modalAgregarCategoriaM" class="modal fade" role="dialog">
  
   <div class="modal-dialog">
     
     <div class="modal-content">
       
       <!-- <form role="form" method="post" enctype="multipart/form-data"> -->
         
         <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Categoria</h4>

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

                  <input type="text" class="form-control input-lg validarCategoriaM tituloCategoriaM"  placeholder="Ingresar título de la categoria">

                </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                  <input type="text" class="form-control input-lg rutaCategoriaM" placeholder="Ruta url de la categoria" readonly>

                </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
  
          <button type="button" class="btn btn-primary guardarCategoriaM" style="width:100%;">GUARDAR CATEGORIA</button>

        </div>

       <!-- </form> -->

     </div>

   </div>

</div>







<!--=====================================
MODAL EDITAR CATEGORIA
======================================-->

<div id="modalEditarCategoriaM" class="modal fade" role="dialog">
  
   <div class="modal-dialog">
     
     <div class="modal-content">
       
       <!-- <form role="form" method="post" enctype="multipart/form-data"> -->
         
         <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Categoria</h4>

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

                  <input type="text" class="form-control input-lg validarCategoriaM tituloCategoriaM">
                  
                  <input type="hidden" class="idCategoriaM">

                </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                  <input type="text" class="form-control input-lg rutaCategoriaM" readonly>

                </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
  
          <button type="button" class="btn btn-primary guardarCambiosCategoriaM" style="width:100%;">GUARDAR CAMBIOS</button>

        </div>

       <!-- </form> -->

     </div>

   </div>

</div>



<?php

  $eliminarCategoriaM = new ControladorCategoria();
  $eliminarCategoriaM -> ctrEliminarCategoria();

?>





