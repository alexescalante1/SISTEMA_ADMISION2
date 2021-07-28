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
          <h1 class="m-0">INSCRIPCIONES - <?php echo $NameReferenc; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">INICIO</a></li>
            <li class="breadcrumb-item"><a href="inscripcion">INSCRIPCIONES</a></li>
            <li class="breadcrumb-item active"><?php echo $NameReferenc; ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">



        <!-- /.row 
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">DATOS DEL POSTULANTE </h3>
                
              </div>
              <div class="card-body p-0">

              </div>
              
              <div class="card-footer">
                Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
              </div>
            </div>
            
          </div>
        </div>
        -->








		<div class="card card-success">

				<div class="card-header">
					<h3 style="font-weight: bold;" class="card-title">DATOS DEL POSTULANTE</h3>
					<div class="card-tools">

						<button type="button" class="btn btn-tool" data-card-widget="maximize">
							<i class="fas fa-expand"></i>
						</button>

						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-minus"></i>
						</button>

					</div>
					<!-- /.card-tools -->
				</div>
				
				<!-- /.card-header -->
				<div class="card-body">
					
                    <div class="bs-stepper">


                        <div class="bs-stepper-header" role="tablist">

                        <!-- your steps here -->
                        <div class="step" data-target="#general-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="general-part" id="general-part-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">GENERAL</span>
                            </button>
                        </div>
                        <div class="line"></div>

                        <div class="step" data-target="#contac-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="contac-part" id="contac-part-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">CONTACTO</span>
                            </button>
                        </div>
                        <div class="line"></div>

                        <div class="step" data-target="#family-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="family-part" id="family-part-trigger">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">REPRESENTANTE</span>
                            </button>
                        </div>
                        <div class="line"></div>

                        <div class="step" data-target="#academic-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="academic-part" id="academic-part-trigger">
                            <span class="bs-stepper-circle">4</span>
                            <span class="bs-stepper-label">ACADEMICO</span>
                            </button>
                        </div>
                        <div class="line"></div>

                        <div class="step" data-target="#require-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="require-part" id="require-part-trigger">
                            <span class="bs-stepper-circle">5</span>
                            <span class="bs-stepper-label">REQUISITOS</span>
                            </button>
                        </div>

                        </div>



                        <form id="formulario">
                        <div class="bs-stepper-content">

                                <!-- your steps content here -->
                                <div id="general-part" class="content" role="tabpanel" aria-labelledby="general-part-trigger">


                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>INSCRIPCION EN:</label>
                                                <input type="text" class="form-control def-input" value="<?php echo $NameReferenc; ?>" readonly>
                                                <input style="display:none" id="IDEVENTINSCRIP" <?php echo 'value="'.$idReferenc.'"'; ?> >
                                                <input style="display:none" id="IDATTADMIN" <?php echo 'value="'.$_SESSION["id"].'"'; ?> >
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <!-- Grupo: Usuario -->
                                            <div class="formulario__grupo" id="grupo__Tpostulante">
                                                <label class="formulario__label">* TIPO DE POSTULACION</label>
                                                <div class="formulario__grupo-input">
                                                    
                                                    <select class="formulario__input form-control def-input" id="Tpostulante">
                                                        <option value="">SELECCIONAR TIPO</option>
                                                        <option value="normal">NORMAL</option>
                                                        <option value="beca">BECADO</option>
                                                        <option value="trasIn">TRASLADO INTERNO</option>
                                                        <option value="trasEx">TRASLADO EXTERNO</option>
                                                    </select>

                                                </div>
                                                <p class="formulario__input-error">Seleccione una Opción.</p>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="formulario__grupo" id="grupo__Pespecialidad">
                                                <label class="formulario__label">* PRIMERA OPCION</label>
                                                <div class="formulario__grupo-input">
                                                    
                                                    <select class="formulario__input form-control def-input" id="Pespecialidad">
                                                        <option value="">SELECCIONAR ESPECIALIDAD</option>
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

                                            <div class="formulario__grupo" id="grupo__Sespecialidad">
                                                <label class="formulario__label">* SEGUNDA OPCION</label>
                                                <div class="formulario__grupo-input">
                                                    
                                                    <select class="formulario__input form-control def-input" id="Sespecialidad">
                                                        <option value="">SELECCIONAR ESPECIALIDAD</option>
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

                                    <hr>

                                    <div class="row">

                                        <div class="col-md-10">
                                            
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <!-- Grupo: Usuario -->
                                                    <div class="formulario__grupo" id="grupo__dniT">
                                                        <label class="formulario__label">* DOCUMENTO DE IDENTIDAD</label>
                                                        <div class="formulario__grupo-input">
                                                            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" class="formulario__input form-control" name="dniT" id="dniT" placeholder="INGRESAR EL DNI">
                                                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                        </div>
                                                        <p class="formulario__input-error">Solo se admiten numeros.</p>
                                                    </div>    
                                                </div>

                                                <div class="col-md-3">
                                                    <!-- Date -->
                                                    <div class="form-group">
                                                    <label>* FECHA DE NACIMIENTO</label>
                                                        <div class="input-group date" id="reservationdateINIT" data-target-input="nearest">
                                                            <div class="input-group-append" data-target="#reservationdateINIT" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>	
                                                            <input id="IfechaNacT" type="text" class="form-control def-input datetimepicker-input" data-target="#reservationdateINIT" data-toggle="datetimepicker"/>
                                                        </div>
                                                    </div>
                                                    <!-- Date and time -->
                                                </div>
                                            </div>

                                            <!-- Grupo: Usuario -->
                                            <div class="formulario__grupo" id="grupo__nombreT">
                                                <label class="formulario__label">* NOMBRES</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="nombreT" id="nombreT" placeholder="INGRESAR EL NOMBRE">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                            </div>

                                            <!-- Grupo: Usuario -->
                                            <div class="formulario__grupo" id="grupo__apellidoTP">
                                                <label class="formulario__label">* APELLIDO PATERNO</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="apellidoTP" id="apellidoTP" placeholder="INGRESAR EL APELLIDO PATERNO">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                            </div>

                                            <!-- Grupo: Usuario -->
                                            <div class="formulario__grupo" id="grupo__apellidoTM">
                                                <label class="formulario__label">* APELLIDO MATERNO</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="apellidoTM" id="apellidoTM" placeholder="INGRESAR EL APELLIDO MATERNO">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                            </div>
                                                            

                                        </div>
                                        
                                        <div class="col-md-2">
                                        
                                            <div class="form-group">
                                                <label class="formulario__label">* FOTO DE PERFIL</label>
                                                <div class="input-group mb-3">
                                                
                                                    <input type="file" id="filePT" class="SelIM fotoPerfilT" accept="image/*">
                                                    
                                                    <label for="filePT" class="fileButton">
                                                        <i class="fas fa-file-image"></i> &nbsp; ADD (10MB) 4:4
                                                    </label>

                                                    <img src="vistas/img/perfiles/default/anonymous.png" class="previsualizarPerfilT" width="100%" style="border-radius:5px;border: 2px solid rgba(0, 0, 0, 0.3);">

                                                </div>
                                            </div>
                                            
                                            <div class="centradoH">
                                                <div class="form-group float-right">
                                                    <div class="input-group mb-3">
                                                    <input id="generoT" type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="info" data-on-text="MASCULINO" data-off-text="FEMENINO">
                                                    </div>
                                                </div>
                                            </div>
                                        

                                        </div>

                                    </div>
                                    


                                    

                                    <button style="margin-bottom: 20px;" class="btn btn-primary float-right" id="next1">Siguiente</button>
                                </div>














                                <div id="contac-part" class="content" role="tabpanel" aria-labelledby="contac-part-trigger">
                                    
                                    <!-- Grupo: Usuario -->
                                    <div class="formulario__grupo" id="grupo__correoT">
                                        <label class="formulario__label">* CORREO ELECTRONICO</label>
                                        <div class="formulario__grupo-input">
                                            <input type="email" class="formulario__input form-control" name="correoT" id="correoT" placeholder="ex: myname@example.com">
                                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                        </div>
                                        <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Grupo: Usuario -->
                                            <div class="formulario__grupo" id="grupo__telefonoT1">
                                                <label class="formulario__label">* CELULAR 1</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" class="formulario__input form-control" name="telefonoT1" id="telefonoT1" placeholder="INGRESAR EL NUMERO">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Solo se admiten numeros, de 9 digitos.</p>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <!-- Grupo: Usuario -->
                                            <div class="formulario__grupo" id="grupo__telefonoT2">
                                                <label class="formulario__label">CELULAR 2</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" class="formulario__input form-control" name="telefonoT2" id="telefonoT2" placeholder="INGRESAR EL NUMERO">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Solo se admiten numeros, de 9 digitos.</p>
                                            </div>


                                        </div>
                                        
                                    </div>

                                    <!-- Grupo: Usuario -->
                                    <div class="formulario__grupo" id="grupo__direccionT">
                                        <label class="formulario__label">* DIRECCION DOMICILIARIA</label>
                                        <div class="formulario__grupo-input">
                                            <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="direccionT" id="direccionT" placeholder="ex: Av. example Nº123">
                                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                        </div>
                                        <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- Grupo: Usuario -->
                                            <div class="formulario__grupo" id="grupo__departamentoT">
                                                <label class="formulario__label">* DEPARTAMENTO</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="departamentoT" id="departamentoT" placeholder="PUNO">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <!-- Grupo: Usuario -->
                                            <div class="formulario__grupo" id="grupo__provinciaT">
                                                <label class="formulario__label">* PROVINCIA</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="provinciaT" id="provinciaT" placeholder="PUNO">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <!-- Grupo: Usuario -->
                                            <div class="formulario__grupo" id="grupo__distritoT">
                                                <label class="formulario__label">* DISTRITO</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="distritoT" id="distritoT" placeholder="PUNO">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <button class="btn btn-primary float-right" id="next2">Siguiente</button>
                                    <button class="btn btn-danger" onclick="stepper.previous()">Atras</button>
                                </div>









                                <div id="family-part" class="content" role="tabpanel" aria-labelledby="family-part-trigger">
                                    

                                    <div class="row">
                                        <div class="col-md-8">
                                            
                                                <!-- Grupo: Usuario -->
                                                <div class="formulario__grupo" id="grupo__nombreR">
                                                    <label class="formulario__label">* NOMBRES Y APELLIDOS DEL REPRESENTANTE</label>
                                                    <div class="formulario__grupo-input">
                                                        <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="nombreR" id="nombreR" placeholder="INGRESAR EL NOMBRE">
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                                </div>
                                        
                                        </div>

                                        <div class="col-md-4">
                                            
                                                <!-- Grupo: Usuario -->
                                                <div class="formulario__grupo" id="grupo__dniR">
                                                    <label class="formulario__label">* DNI DEL REPRESENTANTE</label>
                                                    <div class="formulario__grupo-input">
                                                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" class="formulario__input form-control" name="dniR" id="dniR" placeholder="INGRESAR EL DNI">
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error">Solo se admiten numeros.</p>
                                                </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            
                                                <!-- Grupo: Usuario -->
                                                <div class="formulario__grupo" id="grupo__correoR">
                                                    <label class="formulario__label">* CORREO ELECTRONICO DEL REPRESENTANTE</label>
                                                    <div class="formulario__grupo-input">
                                                        <input type="email" class="formulario__input form-control" name="correoR" id="correoR" placeholder="ex: myname@example.com">
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                                </div>
                                        
                                        </div>

                                        <div class="col-md-4">
                                                <div class="formulario__grupo" id="grupo__Rparentesco">
                                                    <label class="formulario__label">PARENTESCO</label>
                                                    <div class="formulario__grupo-input">
                                                        
                                                        <select class="formulario__input form-control def-input" id="Rparentesco">
                                                            <option value="">SELECCIONAR</option>
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
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                                <!-- Grupo: Usuario -->
                                                <div class="formulario__grupo" id="grupo__direccionR">
                                                    <label class="formulario__label">* DIRECCION DOMICILIARIA DEL REPRESENTANTE</label>
                                                    <div class="formulario__grupo-input">
                                                        <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="direccionR" id="direccionR" placeholder="ex: Av. example Nº123">
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                                </div>
                                        </div>

                                        <div class="col-md-4">
                                                <!-- Grupo: Usuario -->
                                                <div class="formulario__grupo" id="grupo__telefonoR1">
                                                    <label class="formulario__label">* CELULAR 1 DEL REPRESENTANTE</label>
                                                    <div class="formulario__grupo-input">
                                                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" class="formulario__input form-control" name="telefonoR1" id="telefonoR1" placeholder="INGRESAR EL NUMERO">
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error">Solo se admiten numeros, de 9 digitos.</p>
                                                </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary float-right" id="next3">Siguiente</button>
                                    <button class="btn btn-danger" onclick="stepper.previous()">Atras</button>
                                </div>



                                <div id="academic-part" class="content" role="tabpanel" aria-labelledby="academic-part-trigger">
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <!-- Grupo: Usuario -->
                                            <div class="formulario__grupo" id="grupo__nombreCole">
                                                <label class="formulario__label">* COLEGIO EN QUE SE GRADUO</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="nombreCole" id="nombreCole" placeholder="INGRESAR EL NOMBRE DEL COLEGIO">
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                            </div> 
                                        </div>

                                        <div class="col-md-4">
                                            <div class="formulario__grupo" id="grupo__TEstAcademico">
                                                <label class="formulario__label">TIPO DE ESTABLECIMIENTO</label>
                                                <div class="formulario__grupo-input">
                                                    <select class="formulario__input form-control def-input" id="TEstAcademico">
                                                        <option value="">SELECCIONAR</option>
                                                        <option value="publico">PUBLICO</option>
                                                        <option value="particular">PRIVADO</option>
                                                    </select>
                                                </div>
                                                <p class="formulario__input-error">Seleccione una Opción.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                                <!-- Grupo: Usuario -->
                                                <div class="formulario__grupo" id="grupo__especialiAcadm">
                                                    <label class="formulario__label">ESPECIALIDAD</label>
                                                    <div class="formulario__grupo-input">
                                                        <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="formulario__input form-control" name="especialiAcadm" id="especialiAcadm" placeholder="INGRESAR ESPECIALIDAD">
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error">Solo puede contener letras, de 1 a 15 caracteres.</p>
                                                </div>
                                        </div>

                                        <div class="col-md-4">
                                                <!-- Grupo: Usuario -->
                                                <div class="formulario__grupo" id="grupo__calAcadm">
                                                    <label class="formulario__label">CALIFICACION DE GRADO</label>
                                                    <div class="formulario__grupo-input">
                                                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="2" class="formulario__input form-control" name="calAcadm" id="calAcadm" placeholder="NOTA">
                                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                    </div>
                                                    <p class="formulario__input-error">Solo se admiten numeros.</p>
                                                </div>
                                        </div>
                                    </div>
                                

                                    




                                    <button class="btn btn-primary float-right" id="next4">Siguiente</button>
                                    <button class="btn btn-danger" onclick="stepper.previous()">Atras</button>
                                </div>


                                <div id="require-part" class="content" role="tabpanel" aria-labelledby="require-part-trigger">
                                    
                                    <div class="row">
                                        <div class="col-md-9">
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="formulario__label">* VAUCHER DE PAGO</label>
                                                <div class="input-group mb-3">
                                                
                                                    <input type="file" id="fileVP" class="SelIM fotoVaucherP" accept="image/*">
                                                    
                                                    <label for="fileVP" class="fileButton">
                                                        <i class="fas fa-file-image"></i> &nbsp; ADD 4:4 (10MB)
                                                    </label>

                                                    <img src="vistas/img/perfiles/default/anonymous.png" class="previsualizarVaucherP" width="100%" style="border-radius:5px;border: 2px solid rgba(0, 0, 0, 0.3);">

                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <button id="guardarPostulant" class="btn btn-primary float-right">Enviar</button>
                                    <button class="btn btn-danger" onclick="stepper.previous()">Atras</button>
                                </div>

                        </div>
                        </form>



                        </div>
                    
                    </div>
				<!-- /.card-body -->
                <div class="card-footer clearfix">

                  
                </div>
                <!-- /.card-footer -->
		</div>
		<!-- /.card -->














    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script>

// BS-Stepper Init
document.addEventListener('DOMContentLoaded', function () {
  window.stepper = new Stepper(document.querySelector('.bs-stepper'))
})

</script>