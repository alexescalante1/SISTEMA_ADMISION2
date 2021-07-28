<?php

  if($_SESSION["perfil"] != "administrador"){

  echo '
  <script>

    window.location = "inicio";

  </script>
  ';

  return;

}

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ADMINISTRADOR DE PERFILES</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">ADMIN</li>
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
              <h3 class="card-title">PERFILES</h3>

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
                                  <table id="tablaAdmin" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th style="width:5px">#</th>
                                      <th>DNI</th>
                                      <th>NOMBRE</th>
                                      <th>EMAIL</th>
                                      <th>FOTO</th>
                                      <th>PERFIL</th>
                                      <th>ESTADO</th>
                                      <th style="width:10px">OP</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php

                                      $item = null;
                                      $valor = null;

                                      $perfiles = ControladorAdministradores::ctrMostrarAdministradores($item, $valor);

                                      foreach ($perfiles as $key => $value){

                                          echo '
                                          <tr>
                                            <td>'.($key+1).'</td>
                                            <td>'.$value["dniAdmin"].'</td>
                                            <td>'.$value["nombre"].'</td>
                                            <td>'.$value["email"].'</td>
                                            ';

                                            if($value["foto"] != ""){
                                              echo '
                                              <td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>
                                              ';
                                            }else{
                                              echo '
                                              <td><img src="vistas/img/perfiles/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                                              ';
                                            }

                                            echo '
                                            <td>'.$value["perfil"].'</td>
                                            ';

                                            if($value["estado"] != 0){
                                              echo '
                                              <td><button class="btn btn-success btn-xs btnActivar" idPerfil="'.$value["id"].'" estadoPerfil="0">Activado</button></td>
                                              ';
                                            }else{
                                              echo '
                                              <td><button class="btn btn-danger btn-xs btnActivar" idPerfil="'.$value["id"].'" estadoPerfil="1">Desactivado</button></td>
                                              ';
                                            }

                                            echo '
                                            <td>
                                              <div class="btn-group">
                                                <button class="btn btn-warning btnEditarPerfil" idPerfil="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarPerfil"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger btnEliminarPerfil" idPerfil="'.$value["id"].'" fotoPerfil="'.$value["foto"].'"><i class="fa fa-times"></i></button>
                                              </div>  
                                            </td>
                                          </tr>';

                                      }

                                    ?>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                      <th>#</th>
                                      <th>DNI</th>
                                      <th>NOMBRE</th>
                                      <th>EMAIL</th>
                                      <th>FOTO</th>
                                      <th>PERFIL</th>
                                      <th>ESTADO</th>
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

              <a class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalAgregarPerfil">AGREGAR PERFIL</a>

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
MODAL AGREGAR PERFIL
======================================-->

<div class="modal fade" id="modalAgregarPerfil">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">AGREGAR PERFIL</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          

        

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-bolt" style="width:20px"></i></span>
              </div>
              <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" class="form-control" name="nuevoDNI" placeholder="DNI" required>
              <!--<input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control validarAdmision tituloAdmision" placeholder="TITULO">-->
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>

              <input type="text" class="form-control" name="nuevoNombre" placeholder="NOMBRES Y APELLIDOS">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>

              <input type="email" class="form-control" name="nuevoEmail" id="nuevoEmail" placeholder="EMAIL">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>

              <input type="password" class="form-control" name="nuevoPassword" placeholder="CONTRASEÑA">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>

              <select class="form-control input-lg" name="nuevoPerfil">
                
                <option value="">SELECCIONAR PERFIL</option>

                <option value="administrador">Administrador</option>

                <option value="laboratorista">Laboratorista</option>

              </select>

            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              
              <!--
              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p><br>

              <img src="vistas/img/perfiles/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
              -->

              <input type="file" id="fileP" class="SelIM nuevaFoto" name="nuevaFoto" accept="image/*">
              
              <label for="fileP" class="fileButton">
                <i class="fas fa-file-image"></i> &nbsp; SELECCIONAR IMAGEN (2MB)
              </label>

              <img src="vistas/img/perfiles/default/anonymous.png" class="previsualizar" style="width: 100%;border-radius: 5px;">

            </div>
          </div>
        
        </div>

        <div class="modal-footer justify-content-between">

          <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
          <button type="submit" class="btn btn-primary">GUARDAR</button>

        </div>
        
        
        <?php

          $crearPerfil = new ControladorAdministradores();
          $crearPerfil -> ctrCrearPerfil();

        ?>

      </form>
      


    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->














<!--=====================================
EDITAR PERFIL
======================================-->

<div class="modal fade" id="modalEditarPerfil">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">AGREGAR PERFIL</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          

        

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-bolt" style="width:20px"></i></span>
              </div>
              <input type="number" class="form-control" id="editarDNI" name="editarDNI" placeholder="DNI" required>
              <!--<input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control validarAdmision tituloAdmision" placeholder="TITULO">-->
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>

              <input type="text" class="form-control" id="editarNombre" name="editarNombre" placeholder="NOMBRES Y APELLIDOS">
              <input type="hidden" id="idPerfil" name="idPerfil">

            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>

              <input type="email" class="form-control" id="editarEmail" name="editarEmail" placeholder="EMAIL">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>

              <input type="password" class="form-control" name="editarPassword" placeholder="NUEVA CONTRASEÑA">
              <input type="hidden" id="passwordActual" name="passwordActual">

            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
              </div>

              <select class="form-control input-lg" name="editarPerfil">
                
                <option value="" id="editarPerfil"></option>

                <option value="administrador">Administrador</option>

                <option value="laboratorista">Laboratorista</option>

              </select>

            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              
              <!--
              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p><br>

              <img src="vistas/img/perfiles/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
              -->

              <input type="file" id="fileE" class="SelIM nuevaFoto" name="editarFoto" accept="image/*">
              
              <label for="fileE" class="fileButton">
                <i class="fas fa-file-image"></i> &nbsp; SELECCIONAR IMAGEN (2MB)
              </label>

              <img src="vistas/img/perfiles/default/anonymous.png" class="previsualizar" style="width: 100%;border-radius: 5px;">
              
              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>
          </div>
        
        </div>

        <div class="modal-footer justify-content-between">

          <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
          <button type="submit" class="btn btn-primary">GUARDAR</button>

        </div>
        
        
        <?php

          $editarPerfil = new ControladorAdministradores();
          $editarPerfil -> ctrEditarPerfil();

        ?>

      </form>
      


    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!--=====================================
MODAL EDITAR PERFIL
======================================-->
