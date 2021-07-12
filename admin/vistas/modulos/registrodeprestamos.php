<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Registro De Prestamos
    </h1>

    <!-- BARRA DE NAV-->
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Registro De Prestamos</li>

    </ol>
    
  </section>


  <section class="content">

    <div class="box">
       
      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablaRegistroPrestamos" width="100%">
        
          <thead>
         
            <tr>
            
               <th style="width:10px">#</th>
               <th style="width:70px">Acciones</th>
               <th style="width:50px">N. Doc</th>
               <th>Nombres y Apellidos</th>
               <th>Articulo</th>
               <th>Dias de Plazo</th>
               <th>Laboratorista</th>
               <th style="width:100px">Fecha</th>

            </tr> 

          </thead>   
     
        </table>
          
      </div>

    </div>

  </section>

</div>



<!--=====================================
VER PRESTAMO
======================================-->

<div id="modalVisualizarPrestamo" class="modal fade" role="dialog">
  
   <div class="modal-dialog">
     
     <div class="modal-content">
       
       <!-- <form role="form" method="post" enctype="multipart/form-data"> -->
         
         <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Visualizar Prestamo</h4>
          
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
                <div id="TituloArticuloD"></div>
               
              </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DEL PRODUCTO
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                  <input type="text" class="form-control input-lg nombrePrestamista" readonly>

                </div>

            </div>


            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-link"></i></span> 

                  <input type="text" class="form-control input-lg nombreUsuario" readonly>

                </div>

            </div>


            <!--=====================================
            ENTRADA PARA EL TÍTULO
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                  <input type="text" class="form-control input-lg validarUsuarioP codUsuario" readonly>

                  <input type="hidden" class="idDetalleArticulo">
                  <input type="hidden" class="idPrestamoDEV">

                </div>

            </div>

          
            <!--=====================================
            AGREGAR CANTIDAD Y DIAS
            ======================================-->

            <div class="form-group row">
               
              <!-- CANTIDAD -->

              <div class="col-md-8 col-xs-12">
  
                <div class="panel">CANTIDAD DE ARTICULOS</div>

                <div class="form-group">
                  
                    <div class="input-group">
                  
                      <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                      <input type="text" class="form-control input-lg selecNumCodigosArticuloD" readonly>

                    </div>

                </div>

              </div>

              <!-- DIAS -->

              <div class="col-md-4 col-xs-12">
                    
                  <div class="panel">DIAS</div>


                  <div class="form-group">
                  
                    <div class="input-group">
                  
                      <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                      <input type="text" class="form-control input-lg selecDiasPrestamo" readonly>

                    </div>

                  </div>



              </div>


            </div>

                  
            <h5>LISTA DE ARTICULOS</h5>

            <div class="row" id="lista-parcelas"></div>

            <span id="span-modelo-listar-codigosD" style="display:none;">

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                  
                  <input class="form-control input-lg seleccionarCodigoArticuloD-0" type="text" readonly>
                  
                </div>

              </div>

            </span>

            <span id="span-real-listar-codigosD"></span>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        
        <!--
        <div class="modal-footer">
  
          <button type="button" class="btn btn-primary devolverPrestamo" style="width:100%;">DEVOLVER</button>

        </div>
        -->

       <!-- </form> -->

     </div>

   </div>

</div>