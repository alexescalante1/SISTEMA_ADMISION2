
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
	<br>

    <!-- Main content -->
    <div class="content">
      <div class="container">
        
		<div class="card">
		  <div class="row">

			<div class="col-lg-12">
				
				<div class="card-body">
					
				
					<?php

						echo '<h1 class="text-muted text-uppercase" style="font-weight: bold;">'.$rutaEventos["titulo"].'</h1>';

					?>

					<div class="form-group">
				
							<?php
									echo '
									
									<p class="col-md-12" style="margin-top: -2px;">

										<span class="label label-default" style="font-weight:100;">

											<i class="fa fa-calendar" style="margin:0px 5px"></i>
											'.$rutaEventos["fecha"].'
											
										</span>

										<span class="label label-default" style="font-weight:100; margin-left:5px;font-weight: bold;">

											<a href="regRes"><i class="fa fa-mail-reply" ></i> ATRAS</a>

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
			
			<!-- /.card-header -->
			<div class="card-body">
				
				<?php 
					$examen = ControladorAdmision::ctrMostrar("examen","idAdmision", $rutaEventos[0]);
				?>

				<div class="row">
					
					<div class="col-xl-6">
						
						<div class="form-group">
							<div class="input-group">
							
								<div class="input-group-prepend">
									<span class="input-group-text">EXAMEN</span>
								</div>

								<select class="form-control input-lg def-input" id="numero-ejercicios" oninput="camposEjercicio();">
									<option value="">SELECCIONE TIPO</option>
									<?php 
										if($examen){
											foreach($examen as $key => $value){
												echo '<option value="'.$value["cantidad"].'">'.$value["titulo"].'</option>';
											}
										}
									?>
									
								</select>

							</div>
						</div>

						<hr>

						<div>
							<label>* DOCUMENTO DE IDENTIDAD</label>
							<div>
								
								<input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" class="form-control input-lg def-input" name="dniT" id="dniT" placeholder="INGRESAR EL DNI">
								
							</div>
						</div> 

					</div>



					<div class="col-xl-6">
						
						<div class="row" id="lista-ejercicios"></div>

						<span id="span-modelo" style="display:none;">
							
							<div class="clearfix">
								
								<div class="row">
					
									<div class="col-xl-3">

										<label class="spaceR">EJERCICIO -0</label>

									</div>

									<div class="col-xl-9">

										<div class="icheck-success d-inline">
											<input type="radio" name="r-0" id="rsa-0">
											<label for="rsa-0" class="spaceR">
											-0A
											</label>
										</div>
										<div class="icheck-success d-inline">
											<input type="radio" name="r-0" id="rsb-0">
											<label for="rsb-0" class="spaceR">
											-0B
											</label>
										</div>
										<div class="icheck-success d-inline">
											<input type="radio" name="r-0" id="rsc-0">
											<label for="rsc-0" class="spaceR">
											-0C
											</label>
										</div>
										<div class="icheck-success d-inline">
											<input type="radio" name="r-0" id="rsd-0">
											<label for="rsd-0" class="spaceR">
											-0D
											</label>
										</div>
										<div class="icheck-success d-inline">
											<input type="radio" name="r-0" id="rse-0">
											<label for="rse-0" class="spaceR">
											-0E
											</label>
										</div>

									</div>
									
								</div>
								
							</div>

						</span>


						<!-- iCheck -->
						<div class="card card-info">

							<div class="card-header">
								<h3 class="card-title" style="font-weight: bold;">FORMULARIO DE RESPUESTAS</h3>
								
								<div class="card-tools">

									<button type="button" class="btn btn-tool" data-card-widget="collapse">
										<i class="fas fa-minus"></i>
									</button>

								</div>
								<!-- /.card-tools -->
							</div>

							<div class="card-body marginMin">
								
								<span id="span-real-ejercicios"></span>

							</div>
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
						

					</div>

				</div>

			</div>

		</div>
		<!-- /.card -->


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->












