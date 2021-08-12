<?php 

    $especiali = ControladorAdmision::ctrMostrar("especialidad",null, null);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">LISTA DE INSCRITOS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">INICIO</a></li>
            <li class="breadcrumb-item"><a href="inscripcion">INSCRIPCIONES</a></li>
            <li class="breadcrumb-item active">LISTA DE INSCRITOS</li>
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
                    <h3 class="card-title">INSCRITOS</h3>

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

                    <?php 
                        $postulantes = ControladorAdmision::ctrMostrar("postulante",null, null);
                        $idPostulant = array();
                        foreach($postulantes as $k => $Val){
                          $idPostulant[$Val["idPostulante"]]["dni"] = $Val["dni"];
                          $idPostulant[$Val["idPostulante"]]["nombres"] = $Val["nombre"].", ".$Val["apellidoPat"]." ".$Val["apellidoMat"];
                        }

                        $Objetos = ControladorInscripcion::ctrMostrarM("inscripciones", "idPostulante", "idAdmision", $rutaEventos["idAdmision"], "DESC");
                      
                    ?>

                    <div class="card-body p-0">


                        <!-- Main content -->
                        <section class="content">
                                <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">

                                    <div class="card">
                                        
                                        

                                        <!-- /.card-header -->
                                        <div class="card-body">
                                        <table id="tablaInscritos" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                              <th style="width:5px">#</th>
                                              <th style="width:10px">COD</th>
                                              <th style="width:30px">DNI</th>
                                              <th>NOMBRE</th>
                                              <th style="width:40px">TIPO</th>
                                              <th style="width:50px">ESTADO</th>
                                              <th style="width:60px">FECHA</th>
                                              <th style="width:5px">OP</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
                                            <?php

                                                foreach($Objetos as $key => $value){

                                                    if($value["estado"] == 0){

                                                        $colorEstado = "btn-danger";
                                                        $textoEstado = "INACTIVO";
                                                        $estadoI = 1;
                                            
                                                    }else{
                                            
                                                        $colorEstado = "btn-success";
                                                        $textoEstado = "ACTIVO";
                                                        $estadoI = 0;
                                            
                                                    }
                                            
                                                    $estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' style='width:70px;' idInscripcion='".$value["idInscripcion"]."' estadoInscripcion='".$estadoI."'>".$textoEstado."</button>";
                                                    
                                                    $acciones = "<div class='btn-group'><button class='btn btn-success btnVerInscripcion' idInscripcion='".$value["idInscripcion"]."' data-toggle='modal' data-target='#modalVerInscripcion'><i class='fa fa-eye'></i></button><button class='btn btn-warning btnEditarInscripcion' idInscripcion='".$value["idInscripcion"]."' data-toggle='modal' data-target='#modalEditarInscripcion'><i class='fa fa-edit'></i></button></div>";

                                                    $Len = strlen($value["idInscripcion"]);
                                                    if($Len==2){
                                                        $Len = "0000";
                                                    }else if($Len==3){
                                                        $Len = "000";
                                                    }else if($Len==4){
                                                        $Len = "00";
                                                    }else if($Len==5){
                                                        $Len = "0";
                                                    }else{
                                                        $Len = "";
                                                    }

                                                    echo '
                                                      <tr>
                                                        <td>'.$key.'</td>
                                                        <td>'.$value["idAdmision"].$Len.$value["idInscripcion"].'</td>
                                                        <td>'.$idPostulant[$value["idPostulante"]]["dni"].'</td>
                                                        <td>'.$idPostulant[$value["idPostulante"]]["nombres"].'</td>
                                                        <td style="text-transform:uppercase;">'.$value["Tpostulacion"].'</td>
                                                        <td>'.$estado.'</td>
                                                        <td>'.$value["fecha"].'</td>
                                                        <td>'.$acciones.'</td>
                                                      </tr>
                                                      ';
                                                }
                                                
                                            ?>

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                            <th>#</th>
                                            <th>COD</th>
                                            <th>DNI</th>
                                            <th>NOMBRE</th>
                                            <th>TIPO</th>
                                            <th>ESTADO</th>
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
                    

                    <div class="card-footer clearfix">
                        <a class="btn btn-default float-right" href="<?php echo $rutaEventos["ruta"]; ?>-inscribir">Inscribir Postulante ...</a>
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




<div class="modal fade" id="modalVerInscripcion">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="font-weight: bold;" class="modal-title" id="TitleVDOM"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <div class="row">

            <div class="col-md-10">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>RECEPCIONADO POR:</label>
                        <input type="text" class="form-control def-input nombreAdmin RecepAdminV" readonly>
                        <input style="display:none" id="IDINSCRIP">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>INSCRIPCION EN:</label>
                        <input type="text" class="form-control def-input eAdmision" value="<?php echo $rutaEventos["titulo"]; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>PRIMERA OPCION</label>
                        <select class="form-control def-input Popcion" disabled="disabled">
                            <option >SELECCIONAR ESPECIALIDAD</option>
                            <?php
                                foreach($especiali as $key => $value){
                                    echo '<option value="'.$value["idEspecialidad"].'">'.$value["titulo"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>TIPO DE POSTULACION</label>
                        <select class="form-control def-input Tpostulacion" disabled="disabled">
                            <option >SELECCIONAR TIPO</option>
                            <option value="normal">NORMAL</option>
                            <option value="beca">BECADO</option>
                            <option value="trasIn">TRASLADO INTERNO</option>
                            <option value="trasEx">TRASLADO EXTERNO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SEGUNDA OPCION</label>
                        <select class="form-control def-input Sopcion" disabled="disabled">
                            <option >SELECCIONAR ESPECIALIDAD</option>
                            <?php
                                foreach($especiali as $key => $value){
                                    echo '<option value="'.$value["idEspecialidad"].'">'.$value["titulo"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>

              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                  <label class="formulario__label">VAUCHER DE PAGO</label>
                  <div class="input-group mb-3">
                  
                      <img src="vistas/img/vaucher/default/Default.png" class="previsualizarVaucherP" width="100%" style="border-radius:5px;border: 2px solid rgba(0, 0, 0, 0.3);">

                  </div>
              </div>
            </div>

          </div>
                                
                <hr>

          <div class="row">

            <div class="col-md-10">
                
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>NOMBRES Y APELLIDOS</label>
                          <input type="text" class="form-control def-input nombresApellidos"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label>DOCUMENTO DE IDENTIDAD</label>
                          <input type="text" class="form-control def-input dniT"  readonly>
                      </div>  
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>FECHA DE NACIMIENTO</label>
                            <input type="text" class="form-control def-input fechaT"  readonly>
                        </div>      
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>CORREO ELECTRONICO</label>
                          <input type="text" class="form-control def-input correoT"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label>CELULAR 1</label>
                          <input type="text" class="form-control def-input cel1T"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label>CELULAR 2</label>
                          <input type="text" class="form-control def-input cel2T"  readonly>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>DIRECCION DOMICILIARIA</label>
                          <input type="text" class="form-control def-input direccionT"  readonly>
                      </div>  
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>LOCALIZACION</label>
                        <input type="text" class="form-control def-input localizaT" value="PUNO-PUNO-PUNO" readonly>
                      </div>
                    </div>
                </div>

            </div>

            <div class="col-md-2">

                <div class="form-group">
                    <label class="formulario__label">* FOTO DE PERFIL</label>
                    <div class="input-group mb-3">
                    
                        <img src="vistas/img/perfiles/default/anonymous.png" class="previsualizarPerfilT" width="100%" style="border-radius:5px;border: 2px solid rgba(0, 0, 0, 0.3);">

                    </div>
                </div>
                
                <div class="centradoH">
                    <div class="form-group float-right">
                        <div class="input-group mb-3">
                        <input id="generoTT" type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="info" data-on-text="MASCULINO" data-off-text="FEMENINO" readonly>
                        </div>
                    </div>
                </div>


            </div>

          </div>

          <div class="row">

            <div class="col-md-10">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NOMBRES Y APELLIDOS DEL REPRESENTANTE</label>
                      <input type="text" class="form-control def-input nombreR"  readonly>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>PARENTESCO</label>
                      <select class="formulario__input form-control def-input parentescoR" disabled="disabled">
                            <option >SELECCIONAR</option>
                            <option value="padre">PADRE</option>
                            <option value="madre">MADRE</option>
                            <option value="padreP">PADRE POLITICO</option>
                            <option value="madreP">MADRE POLITICO</option>
                            <option value="hermano">HERMAN@</option>
                            <option value="tio">TIO@ </option>
                            <option value="otro">OTRO PARENTESCO</option>
                            <option value="sin">SIN PARENTESCO</option>
                        </select>
                    </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>CORREO ELECTRONICO DEL REPRESENTANTE</label>
                      <input type="text" class="form-control def-input correoR"  readonly>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>DIRECCION DOMICILIARIA DEL REPRESENTANTE</label>
                      <input type="text" class="form-control def-input direccionR"  readonly>
                    </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>COLEGIO EN QUE SE GRADUO</label>
                      <input type="text" class="form-control def-input colegio"  readonly>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>TIPO DE ESTABLECIMIENTO</label>
                      <select class="form-control def-input Ctipo" disabled="disabled">
                            <option >SELECCIONAR</option>
                            <option value="publico">PUBLICO</option>
                            <option value="particular">PRIVADO</option>
                        </select>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>ESPECIALIDAD</label>
                      <input type="text" class="form-control def-input Cespecialidad"  readonly>
                    </div>
                  </div>


              </div>

            </div>

            <div class="col-md-2">
                <div class="form-group">
                  <label>DNI R</label>
                  <input type="text" class="form-control def-input dniR"  readonly>
                </div>                           
                <div class="form-group">
                  <label>CELULAR R</label>
                  <input type="text" class="form-control def-input celR"  readonly>
                </div>


                <div class="form-group">
                  <label>NOTA</label>
                  <input type="text" class="form-control def-input nota"  readonly>
                </div>

            </div>

          </div>

        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary" id="ImprimirConstancia">IMPRIMIR CONSTANCIA</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->










<div class="modal fade" id="modalEditarInscripcion">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="font-weight: bold;" class="modal-title" id="TitleEDOM"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="formularioE">
        <div class="row">

            <div class="col-md-10">

                <div class="row">

                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label>RECEPCIONADO POR:</label>
                            <input type="text" class="form-control def-input" id="adminRecep" readonly>
                        </div>

                        <div class="form-group">
                            <label>INSCRIPCION EN:</label>
                            <input type="text" class="form-control def-input" value="<?php echo $rutaEventos["titulo"]; ?>" readonly>
                            <input style="display:none" id="IDINSCRITO">
                            <input style="display:none" id="IDATTADMINE" <?php echo 'value="'.$_SESSION["id"].'"'; ?> >
                            <input style="display:none" id="RUTAEVENTE" <?php echo 'value="'.$rutaEventos["ruta"].'"'; ?> >
                        </div>

                        <div class="formulario__grupo" id="grupo__PespecialidadE">
                            <label class="formulario__label">* PRIMERA OPCION</label>
                            <div class="formulario__grupo-input">
                                
                                <select class="formulario__input form-control def-input" id="PespecialidadE">
                                    <option >SELECCIONAR ESPECIALIDAD</option>
                                    <?php
                                        foreach($especiali as $key => $value){
                                            echo '<option value="'.$value["idEspecialidad"].'">'.$value["titulo"].'</option>';
                                        }
                                    ?>
                                </select>

                            </div>
                            <p class="formulario__input-error">Seleccione una Opción.</p>
                            <p class="formulario__input-error2">No puede seleccionar esta opción como primera especialidad.</p>
                        </div>


                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label>MODIFICADO POR:</label>
                            <input type="text" class="form-control def-input" <?php echo 'value="'.$_SESSION["nombre"].'"'; ?> readonly>
                        </div>
                    
                        <div class="formulario__grupo" id="grupo__TpostulanteE">
                            <label class="formulario__label">* TIPO DE POSTULACION</label>
                            <div class="formulario__grupo-input">
                                
                                <select class="formulario__input form-control def-input" id="TpostulanteE">
                                    <option >SELECCIONAR TIPO</option>
                                    <option value="normal">NORMAL</option>
                                    <option value="beca">BECADO</option>
                                    <option value="trasIn">TRASLADO INTERNO</option>
                                    <option value="trasEx">TRASLADO EXTERNO</option>
                                </select>

                            </div>
                            <p class="formulario__input-error">Seleccione una Opción.</p>
                        </div>

                        <div class="formulario__grupo" id="grupo__SespecialidadE">
                            <label class="formulario__label">* SEGUNDA OPCION</label>
                            <div class="formulario__grupo-input">
                                
                                <select class="formulario__input form-control def-input" id="SespecialidadE">
                                    <option >SELECCIONAR ESPECIALIDAD</option>
                                    <?php
                                        foreach($especiali as $key => $value){
                                            echo '<option value="'.$value["idEspecialidad"].'">'.$value["titulo"].'</option>';
                                        }
                                    ?>
                                </select>

                            </div>
                            <p class="formulario__input-error">Seleccione una Opción.</p>
                            <p class="formulario__input-error2">No puede seleccionar esta opción como segunda especialidad.</p>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label class="formulario__label">* VAUCHER DE PAGO</label>
                    <div class="input-group mb-3">
                    
                        <input type="file" id="fileVPE" class="SelIM fotoVaucherP" accept="image/*">
                        <input type="hidden" class="antiguaFotoVaucherP">
                        <label for="fileVPE" class="fileButton">
                            <i class="fas fa-file-image"></i> &nbsp; ADD (10MB)
                        </label>

                        <img src="vistas/img/vaucher/default/Default.png" class="previsualizarVaucherP" width="100%" style="border-radius:5px;border: 2px solid rgba(0, 0, 0, 0.3);">

                    </div>
                </div>
            </div>
        
        </div>



        <div class="row">

            <div class="col-md-10">
                
                <div class="row">
                    <div class="col-md-6">
                        <!-- Grupo: Usuario -->
                        <div class="formulario__grupo" id="grupo__dniTE">
                            <label class="formulario__label">* DOCUMENTO DE IDENTIDAD</label>
                            <div class="formulario__grupo-input">
                                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" class="formulario__input form-control" name="dniTE" id="dniTE" placeholder="INGRESAR EL DNI">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Solo se admiten numeros.</p>
                        </div>    
                    </div>

                    <div class="col-md-6">
                        <!-- Date -->
                        <div class="form-group">
                        <label>* FECHA DE NACIMIENTO</label>
                            <div class="input-group date" id="reservationdateINIT" data-target-input="nearest">
                                <div class="input-group-append" data-target="#reservationdateINIT" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>	
                                <input id="IfechaNacTE" type="text" class="form-control def-input datetimepicker-input" data-target="#reservationdateINIT" data-toggle="datetimepicker"/>
                            </div>
                        </div>
                        <!-- Date and time -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <!-- Grupo: Usuario -->
                        <div class="formulario__grupo" id="grupo__nombreTE">
                            <label class="formulario__label">* NOMBRES</label>
                            <div class="formulario__grupo-input">
                                <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="nombreTE" id="nombreTE" placeholder="INGRESAR EL NOMBRE">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                        </div> 
                    </div>

                    <div class="col-md-4">
                        <!-- Grupo: Usuario -->
                        <div class="formulario__grupo" id="grupo__apellidoTPE">
                            <label class="formulario__label">* APELLIDO PATERNO</label>
                            <div class="formulario__grupo-input">
                                <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="apellidoTPE" id="apellidoTPE" placeholder="INGRESAR EL APELLIDO PATERNO">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Grupo: Usuario -->
                        <div class="formulario__grupo" id="grupo__apellidoTME">
                            <label class="formulario__label">* APELLIDO MATERNO</label>
                            <div class="formulario__grupo-input">
                                <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="apellidoTME" id="apellidoTME" placeholder="INGRESAR EL APELLIDO MATERNO">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Grupo: Usuario -->
                        <div class="formulario__grupo" id="grupo__correoTE">
                            <label class="formulario__label">* CORREO ELECTRONICO</label>
                            <div class="formulario__grupo-input">
                                <input type="email" class="formulario__input form-control" name="correoTE" id="correoTE" placeholder="ex: myname@example.com">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Grupo: Usuario -->
                        <div class="formulario__grupo" id="grupo__direccionTE">
                            <label class="formulario__label">* DIRECCION DOMICILIARIA</label>
                            <div class="formulario__grupo-input">
                                <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="direccionTE" id="direccionTE" placeholder="ex: Av. example Nº123">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- Grupo: Usuario -->
                                <div class="formulario__grupo" id="grupo__departamentoTE">
                                    <label class="formulario__label">* DEPARTAMENTO</label>
                                    <div class="formulario__grupo-input">
                                        <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="departamentoTE" id="departamentoTE" placeholder="PUNO">
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Grupo: Usuario -->
                                <div class="formulario__grupo" id="grupo__provinciaTE">
                                    <label class="formulario__label">* PROVINCIA</label>
                                    <div class="formulario__grupo-input">
                                        <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="provinciaTE" id="provinciaTE" placeholder="PUNO">
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Grupo: Usuario -->
                                <div class="formulario__grupo" id="grupo__distritoTE">
                                    <label class="formulario__label">* DISTRITO</label>
                                    <div class="formulario__grupo-input">
                                        <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="distritoTE" id="distritoTE" placeholder="PUNO">
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Grupo: Usuario -->
                                <div class="formulario__grupo" id="grupo__telefonoT1E">
                                    <label class="formulario__label">* CELULAR 1</label>
                                    <div class="formulario__grupo-input">
                                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" class="formulario__input form-control" name="telefonoT1E" id="telefonoT1E" placeholder="INGRESAR EL NUMERO">
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">Solo se admiten numeros, de 9 digitos.</p>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <!-- Grupo: Usuario -->
                                <div class="formulario__grupo" id="grupo__telefonoT2E">
                                    <label class="formulario__label">CELULAR 2</label>
                                    <div class="formulario__grupo-input">
                                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" class="formulario__input form-control" name="telefonoT2E" id="telefonoT2E" placeholder="INGRESAR EL NUMERO">
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">Solo se admiten numeros, de 9 digitos.</p>
                                </div>


                            </div>
                            
                        </div>
                    </div>
                </div>

                                

            </div>

            <div class="col-md-2">

                <div class="form-group">
                    <label class="formulario__label">* FOTO DE PERFIL</label>
                    <div class="input-group mb-3">
                    
                        <input type="file" id="filePTE" class="SelIM fotoPerfilT" accept="image/*">
                        <input type="hidden" class="antiguaFotoPerfilT">
                        <label for="filePTE" class="fileButton">
                            <i class="fas fa-file-image"></i> &nbsp; ADD (10MB)
                        </label>

                        <img src="vistas/img/perfiles/default/anonymous.png" class="previsualizarPerfilT" width="100%" style="border-radius:5px;border: 2px solid rgba(0, 0, 0, 0.3);">

                    </div>
                </div>
                
                <div class="centradoH">
                    <div class="form-group float-right">
                        <div class="input-group mb-3">
                        <input id="generoTE" type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="info" data-on-text="MASCULINO" data-off-text="FEMENINO">
                        </div>
                    </div>
                </div>


            </div>

        </div>
            

        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        
                        <!-- Grupo: Usuario -->
                        <div class="formulario__grupo" id="grupo__nombreRE">
                            <label class="formulario__label">* NOMBRES Y APELLIDOS DEL REPRESENTANTE</label>
                            <div class="formulario__grupo-input">
                                <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="nombreRE" id="nombreRE" placeholder="INGRESAR EL NOMBRE">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                        </div>

                        <!-- Grupo: Usuario -->
                        <div class="formulario__grupo" id="grupo__correoRE">
                            <label class="formulario__label">* CORREO ELECTRONICO DEL REPRESENTANTE</label>
                            <div class="formulario__grupo-input">
                                <input type="email" class="formulario__input form-control" name="correoRE" id="correoRE" placeholder="ex: myname@example.com">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                        </div>
                    
                    </div>

                    <div class="col-md-6">
                        
                        <div class="formulario__grupo" id="grupo__RparentescoE">
                            <label class="formulario__label">PARENTESCO</label>
                            <div class="formulario__grupo-input">
                                
                                <select class="formulario__input form-control def-input" id="RparentescoE">
                                    <option >SELECCIONAR</option>
                                    <option value="padre">PADRE</option>
                                    <option value="madre">MADRE</option>
                                    <option value="padreP">PADRE POLITICO</option>
                                    <option value="madreP">MADRE POLITICO</option>
                                    <option value="hermano">HERMAN@</option>
                                    <option value="tio">TIO@ </option>
                                    <option value="otro">OTRO PARENTESCO</option>
                                    <option value="sin">SIN PARENTESCO</option>
                                </select>

                            </div>
                            <p class="formulario__input-error">Seleccione una Opción.</p>
                        </div>

                        <!-- Grupo: Usuario -->
                        <div class="formulario__grupo" id="grupo__direccionRE">
                            <label class="formulario__label">* DIRECCION DOMICILIARIA DEL REPRESENTANTE</label>
                            <div class="formulario__grupo-input">
                                <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="direccionRE" id="direccionRE" placeholder="ex: Av. example Nº123">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <!-- Grupo: Usuario -->
                <div class="formulario__grupo" id="grupo__dniRE">
                    <label class="formulario__label">* DNI R</label>
                    <div class="formulario__grupo-input">
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" class="formulario__input form-control" name="dniRE" id="dniRE" placeholder="INGRESAR EL DNI">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Solo se admiten numeros.</p>
                </div>
                <!-- Grupo: Usuario -->
                <div class="formulario__grupo" id="grupo__telefonoR1E">
                    <label class="formulario__label">* CELULAR R</label>
                    <div class="formulario__grupo-input">
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" class="formulario__input form-control" name="telefonoR1E" id="telefonoR1E" placeholder="INGRESAR EL NUMERO">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Solo se admiten numeros, de 9 digitos.</p>
                </div>

            </div>
        </div>



        <div class="row">
            <div class="col-md-10">
                <div class="row">
                      <div class="col-md-6">
                          <!-- Grupo: Usuario -->
                          <div class="formulario__grupo" id="grupo__nombreColeE">
                              <label class="formulario__label">* COLEGIO EN QUE SE GRADUO</label>
                              <div class="formulario__grupo-input">
                                  <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="nombreColeE" id="nombreColeE" placeholder="INGRESAR EL NOMBRE DEL COLEGIO">
                                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                              </div>
                              <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                          </div> 
                      </div>

                      <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="formulario__grupo" id="grupo__TEstAcademicoE">
                                    <label class="formulario__label">TIPO DE ESTABLECIMIENTO</label>
                                    <div class="formulario__grupo-input">
                                        <select class="formulario__input form-control def-input" id="TEstAcademicoE">
                                            <option >SELECCIONAR</option>
                                            <option value="publico">PUBLICO</option>
                                            <option value="particular">PRIVADO</option>
                                        </select>
                                    </div>
                                    <p class="formulario__input-error">Seleccione una Opción.</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                    <!-- Grupo: Usuario -->
                                    <div class="formulario__grupo" id="grupo__especialiAcadmE">
                                        <label class="formulario__label">ESPECIALIDAD</label>
                                        <div class="formulario__grupo-input">
                                            <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="especialiAcadmE" id="especialiAcadmE" placeholder="INGRESAR ESPECIALIDAD">
                                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                        </div>
                                        <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                    </div>
                            </div>
                        </div>
                      </div>
                  </div>
            </div>

            <div class="col-md-2">
                <!-- Grupo: Usuario -->
                <div class="formulario__grupo" id="grupo__calAcadmE">
                    <label class="formulario__label">NOTA</label>
                    <div class="formulario__grupo-input">
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="2" class="formulario__input form-control" name="calAcadmE" id="calAcadmE" placeholder="NOTA">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Solo se admiten numeros.</p>
                </div>
            </div>
        </div>

      </form> 
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary guardarCambiosPostul">GUARDAR CAMBIOS</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->




<script src="vistas/js/gestorInscripcion.js"></script>