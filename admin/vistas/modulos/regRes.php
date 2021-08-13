<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">REGISTRO DE RESPUESTAS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">INICIO</a></li>
            <li class="breadcrumb-item active">REGISTRO DE RESPUESTAS</li>
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
                                        <table id="tablaEvAdmi" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                            <th style="width:10px">OP</th>
                                            <th>TITULO</th>
                                            <th style="width:80px">INICIO</th>
                                            <th style="width:80px">FINAL</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
                                            <?php

                                                    $admicion = ControladorAdmision::ctrMostrar("eventoadmision","estado",1);

                                                    foreach ($admicion as $key => $value) {
                                                        $accionesFinal = "<div class='btn-group'><a href='".$admicion[$key]["ruta"]."-respuestas'><button class='btn btn-block btn-success'><i class='fa fa-check'></i></button></a></div>";
                                                        echo '
                                                        <tr>
                                                            <td>'.$accionesFinal.'</td>
                                                            <td>'.$admicion[$key]["titulo"].'</td>
                                                            <td>'.$admicion[$key]["finit"].'</td>
                                                            <td>'.$admicion[$key]["ffin"].'</td>
                                                        </tr>
                                                        ';
                                                    }
                                            ?>

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                            <th>OP</th>
                                            <th>TITULO</th>
                                            <th>INICIO</th>
                                            <th>FINAL</th>
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

