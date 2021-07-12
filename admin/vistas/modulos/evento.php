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
        <div class="col-lg-12 col-xl-7">
          


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
                                  <table id="tablaAdmision" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th style="width:5px">#</th>
                                      <th style="width:10px">ESTADO</th>
                                      <th>TITULO</th>
                                      <th style="width:80px">FECHA</th>
                                      <th style="width:10px">OP</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                            $admicion = ControladorAdmision::ctrMostrarAdmision(null,null);

                                            foreach ($admicion as $key => $value) {

                                              if($admicion[$key]["estado"] == 0){

                                                $colorEstado = "btn-danger";
                                                $textoEstado = "NO VISIBLE";
                                                $estadoArticulo = 1;
                                        
                                              }else{
                                        
                                                $colorEstado = "btn-success";
                                                $textoEstado = "VISIBLE";
                                                $estadoArticulo = 0;
                                        
                                              }
                                        
                                              $estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' style='width:70px;' idAdmision='".$admicion[$key]["idAdmision"]."' estadoAdmision='".$estadoArticulo."'>".$textoEstado."</button>";
                                              
                                              $accionesFinal = "<div class='btn-group'><a href='".$admicion[$key]["ruta"]."'><button class='btn btn-block btn-success'><i class='fa fa-eye'></i></button></a></div>";

                                              echo '<tr>';
                                                echo '<td>'.$key.'</td>';
                                                echo '<td>'.$estado.'</td>';
                                                echo '<td>'.$admicion[$key]["titulo"].'</td>';
                                                echo '<td>'.$admicion[$key]["fecha"].'</td>';
                                                echo '<td>'.$accionesFinal.'</td>';
                                              echo '</tr>';
                                            }
                                    ?>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th>#</th>
                                      <th>ESTADO</th>
                                      <th>TITULO</th>
                                      <th>FECHA</th>
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
              <a class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalAgregarAdmision">AGREGAR NUEVO EVENTO DE ADMISION</a>

            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->









          <!-- TABLE: LATEST ORDERS -->
          <div class="card">

            <div class="card-header border-transparent">
              <h3 class="card-title">HORARIO DE ATENCION</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                
              </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body p-0">
                  <!-- Main content -->
                  <section class="content">
                        <div class="container-fluid">
                          <div class="row">
                                        



                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                              <div class="form-group">
                                <div class="input-group">
                                  
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
                                  </div>
                                  <input type="time" class="form-control" id="fAini">

                                </div>
                              </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                              <div class="form-group">
                                <div class="input-group">
                                  
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
                                  </div>
                                  <input type="time" class="form-control" id="fAfin">

                                </div>
                              </div>
                            </div>




                              
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                      </section>
                      <!-- /.content -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a class="btn btn-sm btn-info float-right">GUARDAR</a>
            
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->






          </div>
          <!-- /.col -->










        <div class="col-lg-12 col-xl-5">
          






          <!-- TABLE: LATEST ORDERS -->
          <div class="card">

            <div class="card-header border-transparent">
              <h3 class="card-title">ESPECIALIDADES</h3>

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
                                  <table id="tablaEspecialidad" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th style="width:5px">#</th>
                                      <th>TITULO</th>
                                      <th style="width:10px">OP</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                            
                                            $especialidad = ControladorAdmision::ctrMostrarEspecialidad(null,null);

                                            foreach ($especialidad as $key => $value) {

                                              $acciones = "<div class='btn-group'><button class='btn btn-block btn-warning btnEditarEspecialidad' idEspecialidad='".$especialidad[$key]["idEspecialidad"]."' data-toggle='modal' data-target='#modalEditarEspecialidad'><i class='fa fa-edit'></i></button></div>";

                                              echo '<tr>';
                                                echo '<td>'.$key.'</td>';
                                                echo '<td>'.$especialidad[$key]["titulo"].'</td>';
                                                echo '<td>'.$acciones.'</td>';
                                              echo '</tr>';
                                            }
                                    ?>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th>#</th>
                                      <th>TITULO</th>
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
              <a class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalAgregarEspecialidad">AGREGAR NUEVO EVENTO DE ADMISION</a>
            
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->





            <!-- TABLE: LATEST ORDERS -->
            <div class="card">

              <div class="card-header border-transparent">
                <h3 class="card-title">COLEGIOS</h3>

                <div class="card-tools">
                  
                  <!--<button type="button" id="refress" class="btn btn-tool" data-card-widget="card-refresh" data-source="vistas/modulos/test.php" data-source-selector="#card-refresh-content" data-load-on-init="false">-->
                  <button type="button" id="refress" class="btn btn-tool">
                    <i class="fas fa-sync-alt"></i>
                  </button>
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

                                <div class="card" id="RecargarCole">
                                  
                                  <!-- /.card-header -->
                                  <div class="card-body">
                                    <table id="tablaColegios" class="table table-bordered table-striped">
                                      <thead>
                                      <tr>
                                        <th style="width:5px">#</th>
                                        <th style="width:10px">ESTADO</th>
                                        <th>TITULO</th>
                                        <th style="width:80px">FECHA</th>
                                        <th style="width:10px">OP</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      
                                      <?php
                                              $admicion = ControladorAdmision::ctrMostrarAdmision(null,null);

                                              foreach ($admicion as $key => $value) {

                                                if($admicion[$key]["estado"] == 0){

                                                  $colorEstado = "btn-danger";
                                                  $textoEstado = "NO VISIBLE";
                                                  $estadoArticulo = 1;
                                          
                                                }else{
                                          
                                                  $colorEstado = "btn-success";
                                                  $textoEstado = "VISIBLE";
                                                  $estadoArticulo = 0;
                                          
                                                }
                                          
                                                $estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' style='width:70px;' idAdmision='".$admicion[$key]["idAdmision"]."' estadoAdmision='".$estadoArticulo."'>".$textoEstado."</button>";
                                                
                                                $accionesFinal = "<div class='btn-group'><a href='".$admicion[$key]["ruta"]."'><button class='btn btn-success' ><i class='fa fa-eye'></i></button></a></div>";


                                                echo '<tr>';
                                                  echo '<td>'.$key.'</td>';
                                                  echo '<td>'.$estado.'</td>';
                                                  echo '<td>'.$admicion[$key]["titulo"].'</td>';
                                                  echo '<td>'.$admicion[$key]["fecha"].'</td>';
                                                  echo '<td>'.$accionesFinal.'</td>';
                                                echo '</tr>';
                                              }
                                      ?>

                                      </tbody>
                                      <tfoot>
                                      <tr>
                                        <th>#</th>
                                        <th>ESTADO</th>
                                        <th>TITULO</th>
                                        <th>FECHA</th>
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

                <a href="#" class="btn btn-sm btn-secondary float-left">VER MAS</a>

                <a class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalAgregarAdmision">AGREGAR NUEVO EVENTO DE ADMISION</a>




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























<div class="modal fade" id="modalAgregarAdmision">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">AGREGAR EVENTO ADMISION</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-bolt" style="width:20px"></i></span>
              </div>
              <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control validarAdmision tituloAdmision" placeholder="TITULO">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>
              <input type="text" class="form-control rutaEvento" placeholder="RUTA" readonly>
            </div>
          </div>
        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary guardarEvento">GUARDAR</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->




<div class="modal fade" id="modalAgregarEspecialidad">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">AGREGAR ESPECIALIDAD</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-bolt" style="width:20px"></i></span>
              </div>
              <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control validarEspecialidad tituloEspecialidad" placeholder="TITULO">
            </div>
          </div>
        
      </div>
      <div class="modal-footer justify-content-between">

        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary guardarEspecialidad">GUARDAR</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->




<div class="modal fade" id="modalEditarEspecialidad">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">AGREGAR ESPECIALIDAD</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-bolt" style="width:20px"></i></span>
              </div>
              <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control validarEspecialidad tituloEspecialidad" placeholder="TITULO">
              <input type="hidden" class="idEspecialidad">
            </div>
          </div>
        
      </div>
      <div class="modal-footer justify-content-between">
      
        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary guardarCambiosEspecialidad">GUARDAR</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->






