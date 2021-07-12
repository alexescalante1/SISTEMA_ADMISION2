<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Prestar Articulos
    </h1>

    <!-- BARRA DE NAV-->
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Prestar Articulos</li>

    </ol>
    
  </section>




  <section class="content">

    <div class="box">

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablaPrestarArticulos" width="100%">
        
          <thead>
         
            <tr>
             
               <th style="width:10px">#</th>
               <th>Acciones</th>
               <th>Portada</th>
               <th>Titulo</th>
               <th>Categoria</th>
               <th>Descripcion</th>
               <th>Palabras Clave</th>
               <th>Prestados</th>
               <th>Peso</th>
               <th>Precio</th>
               

            </tr> 

          </thead>   
     
        </table>
          
      </div>

    </div>



  </section>

</div>






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

<div id="modalPrestarArticulo" class="modal fade" role="dialog">
  
   <div class="modal-dialog">
     
     <div class="modal-content">
       
       <!-- <form role="form" method="post" enctype="multipart/form-data"> -->
         
         <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Prestar Articulo</h4>
          
        </div>



        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                    
                    <img src="vistas/img/productos/default/default.jpg" class="img-thumbnail previsualizarPrincipalA" width="400px">
      
                </div>

              </div>
              <div class="col-md-6">
              
                <!--<input type="text" class="form-control input-lg tituloArticulo" placeholder="xd" readonly>
-->
                <div id="TituloArticuloP"></div>
               
              
              </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                  <input type="text" class="form-control input-lg nombrePrestamista" value="<?php echo $_SESSION["nombre"];?>" readonly>

                </div>

            </div>


            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                  <input type="text" class="form-control input-lg nombreUsuario" readonly>

                </div>

            </div>


            <!--=====================================
            ENTRADA PARA NAME
            ======================================-->
            
            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                  <input type="text" class="form-control input-lg validarUsuarioP codUsuario"  placeholder="Ingresar el Codigo del estudiante">

                  <input type="hidden" class="idDetalleArticulo">
                  <input type="hidden" class="idNotificacions" value="null">

                </div>

            </div>

          
            <!--=====================================
            AGREGAR CANTIDAD Y DIAS
            ======================================-->

            <div class="form-group row">
               
              <!-- CANTIDAD -->

              <div class="col-md-8 col-xs-12">
  
                <div class="panel">CANTIDAD DE ARTICULOS</div>

                <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                    <!--
                    <select class="form-control input-lg seleccionarCategoria">

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
                      <option value="10">11</option>
                      <option value="10">12</option>
                      <option value="10">13</option>
                      <option value="10">14</option>
                      <option value="10">15</option>

                    </select>
                  -->

                  <select class="form-control input-lg selecNumCodigosArticulo" name="form-control" id="numero-codigos" name="numero-codigos" oninput="camposCodigos();">
                    <option value="1">1</option>
                    
                  </select>

                </div>


              </div>

              <!-- DIAS -->

              <div class="col-md-4 col-xs-12">
  
                <div class="panel">DIAS</div>
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-balance-scale"></i></span> 

                  <select class="form-control input-lg selecDiasPrestamo">

                    <option value="3">3</option>
                    <option value="6">6</option>
                    <option value="9">9</option>
                    <option value="12">12</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>

                  </select>

                </div>

              </div>


            </div>

            
            <h5>LISTA DE ARTICULOS</h5>

            <div class="row" id="lista-parcelas"></div>

            <span id="span-modelo-listar-codigos" style="display:none;">

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                  <!--
                  <input class="form-control input-lg seleccionarCodigoArticulo-0" type="text" name="parcela-0" id="parcela-0">
                    -->
                  <select class="form-control input-lg seleccionarCodigoArticulo-0 validarCod" onchange="getval(this);">
                    
                    <option value="">CODIGO</option>
                    <option>LIST</option>

                  </select>
                    

                </div>

              </div>

            </span>

            <span id="span-real-listar-codigos"></span>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
  
          <button type="button" class="btn btn-primary guardarPrestamo" style="width:100%;">PRESTAR</button>

        </div>

       <!-- </form> -->

     </div>

   </div>

</div>



