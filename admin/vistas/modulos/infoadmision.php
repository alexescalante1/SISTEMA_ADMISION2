
<input style="display:none" id="IDCODPRODET" name="IDCODPRODET" <?php echo 'value="'.$infoEventos.'"'; ?> >

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
	<br>

    <!-- Main content -->
    <div class="content">
      <div class="container">
        
		<div class="card">
		  <div class="row">

			<div class="col-lg-6">
				
				<div class="card-body">
					
					



					<?php
						
						$url = Ruta::ctrRutaServidor();
						$item =  "ruta";
					
						$infoAdmision = ControladorAdmision::ctrMostrarInfoAdmision($item, $infoEventos);

						echo '
						
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';

								for($i = 2; $i < 6; $i ++){
											
									echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>';

								}

						echo '
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
								<img class="d-block w-100" src="'.$url.'vistas/img/presentacion/1.png" alt="First slide">
								</div>';

								for($i = 2; $i < 6; $i ++){

									echo '
										<div class="carousel-item">
											<img class="d-block w-100" src="'.$url.'vistas/img/presentacion/'.$i.'.png" alt="Second slide">
										</div>
									';
									
								}

						echo '

							</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
						
						';

					?>










				</div>

			</div>
			<!-- /.col-md-6 -->
			<div class="col-lg-6">
				
				<div class="card-body">
					
					


						
					<?php

						/*=============================================
						TITULO
						=============================================*/				

						$fecha = date('Y-m-d');
						$fechaActual = strtotime('-30 day', strtotime($fecha));
						$fechaNueva = date('Y-m-d', $fechaActual);

						echo '<h1 class="text-muted text-uppercase" style="font-weight: bold;">'.$infoAdmision["titulo"].'</h1>';

						/*=============================================
						DESCRIPCIÓN
						=============================================*/
						
						
						


					?>
							<div class="form-group">
						
									<?php
											echo '
											
											<p class="col-md-12" style="margin-top: -2px;">

												<span class="label label-default" style="font-weight:100;">

													<i class="fa fa-users" style="margin:0px 5px;"></i>  
													540 POSTULANTES EN TOTAL | 

													<i class="fa fa-calendar" style="margin:0px 5px"></i>
													'.$infoAdmision["fecha"].'
													
												</span>

												<span class="label label-default" style="font-weight:100; margin-left:5px;font-weight: bold;">

													<a href="evento"><i class="fa fa-mail-reply" ></i> ATRAS</a>

												</span>

											</p>

											';

									?>

							</div>

								
							

























































				</div>

			</div>
			<!-- /.col-md-6 -->

		  </div>
        </div>
        <!-- /.row -->
		


		<div class="card card-success">

				<div class="card-header">
					<h3 style="font-weight: bold;" class="card-title">PARAMETROS</h3>
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
					


				<h4 class="text-muted" style="font-weight: bold;">PARAMETROS DE ESPECIALIDADES</h4>
				<?php

					$idEsp = array();
					$Mespecialidad = ControladorAdmision::ctrMostrarEspecialidad(null, null);
					for($i = 0; $i < count($Mespecialidad); $i++){
						$idEsp[$Mespecialidad[$i]["idEspecialidad"]] = $Mespecialidad[$i]["titulo"];
					}

					$cup = ControladorAdmision::ctrMostrar("cupos","idAdmision", $infoAdmision[0]);

					for($i = 0; $i < count($cup); $i++){
						
						echo '


							<label for="usr">'.$idEsp[$cup[$i]["idEspecialidad"]].'</label>
							<div class="row">
												
		
								<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
									
								<div class="form-group">
									<div class="input-group">
									
									<div class="input-group-prepend">
										<span class="input-group-text">CUPOS BECADOS</span>
									</div>
									
									<input type="number" min="1" class="form-control" id="cbeca'.$i.'" value="'.$cup[$i]["cupoBeca"].'">
		
									<input style="display:none" id="idCupEspecialidad'.$i.'" value="'.$cup[$i]["idCupos"].'">
		
		
									</div>
								</div>
								</div>
		
								<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
								<div class="form-group">
									<div class="input-group">
									
									<div class="input-group-prepend">
										<span class="input-group-text">CUPOS NORMAL</span>
									</div>
									<input type="number" min="1" class="form-control" id="cnormal'.$i.'" value="'.$cup[$i]["cupoNormal"].'">

									</div>
								</div>
								</div>
		
								<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
								<div class="form-group">
									<div class="input-group">
									
									<div class="input-group-prepend">
										<span class="input-group-text">PUNTAJE MINIMO</span>
									</div>
									
									<input type="number" min="1" class="form-control" id="cpuntaje'.$i.'" value="'.$cup[$i]["puntaje"].'">

									</div>
								</div>
								</div>
		
		
							</div>
							<!-- /.row -->


							';

					}

				?>
				
				
				<br>
				<h4 class="text-muted" style="font-weight: bold;">PARAMETROS DE INSCRIPCION</h4>


				<div class="row">
					

					<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
						<div class="form-group">
							<div class="input-group">
							
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
								</div>
							
								<input type="date" class="form-control" id="fAini">

							</div>
						</div>
					</div>


					<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
						<div class="form-group">
							<div class="input-group">
							
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-code" style="width:20px"></i></span>
								</div>
							
								<input type="date" class="form-control" id="fAfin">

							</div>
						</div>
					</div>


				</div>


				<input style="display:none" id="cantEspe" <?php echo 'value="'.count($cup).'"'; ?> >
				<input style="display:none" id="rutaEvent" <?php echo 'value="'.$infoAdmision[1].'"'; ?> >
				<input style="display:none" id="idEventAd" <?php echo 'value="'.$infoAdmision[0].'"'; ?> >
				
					


				
				</div>
				<!-- /.card-body -->
                <div class="card-footer clearfix">

                  <a class="btn btn-sm btn-info float-right" id="guardarCuposEspeci">GUARDAR</a>
              
                </div>
                <!-- /.card-footer -->
		</div>
		<!-- /.card -->
		
		





























		<div class="card card-success">

			<div class="card-header">
				<h3 style="font-weight: bold;" class="card-title">EXAMEN</h3>
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
			<div class="card-footer clearfix">

				<a class="btn btn-sm btn-info float-left" data-toggle="modal" data-target="#modalAgregarTipoPrueba">AGREGAR NUEVO TIPO DE PRUEBA</a>

			</div>
			<!-- /.card-footer -->
			<!-- /.card-header -->
			<div class="card-body">
				


					





					
					<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
						
							<?php

								$examen = ControladorAdmision::ctrMostrar("examen","idAdmision", $infoAdmision[0]);

								if($examen){
									echo '<input style="display:none" id="idTIPOPRB" value="'.$examen[0]["idExamen"].'">
									
									<li class="nav-item SelectB">
											<a class="nav-link active tipoPruebaSelc" idtipoPrue="'.$examen[0]["idExamen"].'" id="custom-content-below-'.$examen[0]["idExamen"].'-tab" data-toggle="pill" href="#custom-content-below-'.$examen[0]["idExamen"].'" role="tab" aria-controls="custom-content-below-'.$examen[0]["idExamen"].'" aria-selected="true">'.$examen[0]["titulo"].'</a>
									</li>
									<li class="nav-item CloseB" style="margin-top: -10px;">
										<button class="btn-danger botonCerrar" id="idprueba" idprueba="'.$examen[0]["idExamen"].'" value="'.$examen[0]["idExamen"].'">
										x
										</button>
									</li>
									';
								}

								
								for($i = 1; $i < count($examen); $i++){

									echo '
									
									<li class="nav-item SelectB">
										<a class="nav-link tipoPruebaSelc" idtipoPrue="'.$examen[$i]["idExamen"].'" id="custom-content-below-'.$examen[$i]["idExamen"].'-tab" data-toggle="pill" href="#custom-content-below-'.$examen[$i]["idExamen"].'" role="tab" aria-controls="custom-content-below-'.$examen[$i]["idExamen"].'" aria-selected="true">'.$examen[$i]["titulo"].'</a>
									</li>
									<li class="nav-item CloseB" style="margin-top: -10px;">
										<button class="btn-danger botonCerrar" id="idprueba" idprueba="'.$examen[$i]["idExamen"].'" value="'.$examen[$i]["idExamen"].'">
										x
										</button>
									</li>
									
									';

									/*echo '<li class="SelectB"> 				
											<a class="tipoPruebaSelc" data-toggle="tab" href="#t'.$examen[$i]["idExamen"].'" idtipoPrue="'.$examen[$i]["idExamen"].'">
											<i class="fa fa-book"></i> '.$examen[$i]["titulo"].'</a>
										</li>
										<li style="margin-top: -10px;" class="CloseB">
											<button class="btn-danger botonCerrar" id="idprueba" idprueba="'.$examen[$i]["idExamen"].'" value="'.$examen[$i]["idExamen"].'">
											x
											</button>
										</li>';*/

								}

							?>

					</ul>



					<div class="tab-content" id="custom-content-below-tabContent">
						

						<?php

							if($examen){
								echo '
								
								<div class="tab-pane fade show active" id="custom-content-below-'.$examen[0]["idExamen"].'" role="tabpanel" aria-labelledby="custom-content-below-'.$examen[0]["idExamen"].'-tab">
									<h1 class="text-muted" style="font-weight: bold;text-align: center;padding-top:15px;">EXAMEN '.$examen[0]["titulo"].'</h1> 
								</div>
								
								';
							}else {
								echo '<h2>NO HAY REGISTROS</h2>';
							}
							for($i = 1; $i < count($examen); $i++){
								echo '
								
								<div class="tab-pane fade" id="custom-content-below-'.$examen[$i]["idExamen"].'" role="tabpanel" aria-labelledby="custom-content-below-'.$examen[$i]["idExamen"].'-tab">
									<h1 class="text-muted" style="font-weight: bold;text-align: center;padding-top:15px;">EXAMEN '.$examen[$i]["titulo"].'</h1> 
								</div>
								
								';
							}

						?>


					</div>

					

					<?php

						if($examen){
							echo '
							
							<div class="row">
					
								<div class="col-sm-12 col-md-12 col-lg-4 col-xl-2">
									
									<div class="form-group">
										<div class="input-group">
										
											<div class="input-group-prepend">
												<span class="input-group-text">CANTIDAD</span>
											</div>
		
											<select class="form-control input-lg" id="numero-ejercicios" oninput="camposEjercicio();">
												<option value="2">2</option>
												<option value="20">20</option>
												<option value="60">60</option>
												<option value="65">65</option>
												<option value="70">70</option>
												<option value="75">75</option>
												<option value="80">80</option>
												<option value="85">85</option>
												<option value="90">90</option>
												<option value="95">95</option>
												<option value="100">100</option>
											</select>
		
										</div>
									</div>
		
								</div>
		
							</div>

							';
						}

					?>

					

					
					<div class="row" id="lista-ejercicios"></div>

					<span id="span-modelo" style="display:none;">
						
						<h2 class="text-muted" style="font-weight: bold;">EJERCICIO -0</h2>

						<div class="row">
							
							<div class="col-md-2">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" style="color: White;background-color: black;"><i class="fas fa-check" style="width:20px;"></i></span>
										</div>
										<select class="form-control" name="sol-0" id="sol-0" style="font-weight: bold;color: White;background-color: DarkSlateGrey;" required>

											<option value="1">A</option>
											<option value="2">B</option>
											<option value="3">C</option>
											<option value="4">D</option>
											<option value="5">E</option>

										</select>
										
									</div>
								</div>
							</div>



							<div class="col-md-10">

								<div class="form-group">
									<div class="input-group">
										
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-book" style="width:20px"></i></span>
										</div>
										<textarea type="text" maxlength="1000" rows="6" class="form-control" id="descrip-0" placeholder="Ingresar Descripcion" style="padding-top:10px;font-weight: bold;"></textarea>
									
									</div>
								</div>

								<div class="form-group col-md-6 col-sm-6 col-xs-12 ">
									

									<div class="input-group">
										
										<div class="input-group-prepend">
											<span class="input-group-text">A</span>
										</div>
										<textarea type="text" maxlength="320" rows="1" class="form-control" id="opciona-0" placeholder="Respuesta"></textarea>

									</div>
									<div class="input-group" style="padding-top:10px;">
										
										<div class="input-group-prepend">
											<span class="input-group-text">B</span>
										</div>
										<textarea type="text" maxlength="320" rows="1" class="form-control" id="opcionb-0" placeholder="Respuesta"></textarea>

									</div>
									<div class="input-group" style="padding-top:10px;">
										
										<div class="input-group-prepend">
											<span class="input-group-text">C</span>
										</div>
										<textarea type="text" maxlength="320" rows="1" class="form-control" id="opcionc-0" placeholder="Respuesta"></textarea>

									</div>
									<div class="input-group" style="padding-top:10px;">
										
										<div class="input-group-prepend">
											<span class="input-group-text">D</span>
										</div>
										<textarea type="text" maxlength="320" rows="1" class="form-control" id="opciond-0" placeholder="Respuesta"></textarea>

									</div>
									<div class="input-group" style="padding-top:10px;">
										
										<div class="input-group-prepend">
											<span class="input-group-text">E</span>
										</div>
										<textarea type="text" maxlength="320" rows="1" class="form-control" id="opcione-0" placeholder="Respuesta"></textarea>

									</div>
									

								</div>
							</div>


						</div>
						
					</span>

					<span id="span-real-ejercicios"></span>















			</div>
			<!-- /.card-body -->
			<div class="card-footer clearfix">
				
				<?php

					if($examen){
						echo '
						
							<a class="btn btn-sm btn-info float-right" id="guardarEjerciciosA">GUARDAR</a>
							
						';
					}

				?>
				

			</div>
			<!-- /.card-footer -->
		</div>
		<!-- /.card -->



































      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




<!--==============================================================================================================================================================================================================================
MODAL AGREGAR NUEVO TIPO PRUEBA
===============================================================================================================================================================================================================================-->

  <div class="modal fade" id="modalAgregarTipoPrueba">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">AGREGAR TIPO DE PRUEBA</h4>
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
              <input type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control validarPrueba tituloTipoPru" placeholder="NAME">
            </div>
          </div>
        
      </div>
      <div class="modal-footer justify-content-between">

        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary guardarTipoPrue">GUARDAR</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

















