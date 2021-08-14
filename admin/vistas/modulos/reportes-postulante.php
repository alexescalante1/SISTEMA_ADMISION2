
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
	<br>

    <!-- Main content -->
    <div class="content">
        
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

											<a href="reportePostulant"><i class="fa fa-mail-reply" ></i> ATRAS</a>

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
				<h3 style="font-weight: bold;" class="card-title">LISTA DE POSTULANTES</h3>
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

			
				<!-- Main content -->
				<section class="content">
						<div class="container-fluid">
						<div class="row">
							<div class="col-12">

							<div class="card">
								
								<?php 

									$servidor = Ruta::ctrRutaServidor();
									$Objetos = ModeloAdmision::mdlMostrarReportPostul("idAdmision", $rutaEventos["idAdmision"]);
								
								?>

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
										<th>P OPCION</th>
										<th>S OPCION</th>
										<th>GENERO</th>
										<th>CORREO</th>
										<th>CEL 1</th>
										<th>CEL 2</th>
										<th>DIRECCION</th>
										<th>DEPARTAMENTO</th>
										<th>PROVINCIA</th>
										<th>DISTRITO</th>
										<th>REPRESENTANTE</th>
										<th>DNI REPRESENTANTE</th>
										<th>CORREO REPRESENTANTE</th>
										<th>PARENTEZCO REPRESENTANTE</th>
										<th>DIRECCION REPRESENTANTE</th>
										<th>CEL REPRESENTANTE</th>
										<th>COLEGIO</th>
										<th>TIPO DE COLEGIO</th>
										<th>ESPECIALIDAD COLEGIO</th>
										<th>NOTA COLEGIO</th>
										<th>FOTO</th>
										<th>VAUCHER</th>
										<th>ESTADO</th>
										<th>FECHA</th>
									</tr>
									</thead>
									<tbody>
									
									<?php

										foreach($Objetos as $key => $value){
											
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
												<td>'.$rutaEventos["idAdmision"].$Len.$value["idInscripcion"].'</td>
												<td>'.$value["dni"].'</td>
												<td>'.$value["nombre"].', '.$value["apellidoPat"].' '.$value["apellidoMat"].'</td>
												<td style="text-transform:uppercase;">'.$value["Tpostulacion"].'</td>
												<td>'.$Objetos[$key][1].'</td>
												<td>'.$Objetos[$key][2].'</td>
												<td>'.$value["genero"].'</td>
												<td>'.$value["correo"].'</td>
												<td>'.$value["celularOne"].'</td>
												<td>'.$value["celularTwo"].'</td>
												<td>'.$value["direccion"].'</td>
												<td>'.$value["departamento"].'</td>
												<td>'.$value["provincia"].'</td>
												<td>'.$value["distrito"].'</td>
												<td>'.$value["representante"].'</td>
												<td>'.$value["dniR"].'</td>
												<td>'.$value["correoR"].'</td>
												<td>'.$value["parentescoR"].'</td>
												<td>'.$value["direccionR"].'</td>
												<td>'.$value["celularR"].'</td>
												<td>'.$value["colegio"].'</td>
												<td>'.$value["Ctipo"].'</td>
												<td>'.$value["Cespecialidad"].'</td>
												<td>'.$value["Cnota"].'</td>
												<td>'.$servidor.$value["foto"].'</td>
												<td>'.$servidor.$value["vaucher"].'</td>
												<td>'.$value["estado"].'</td>
												<td>'.$value["fecha"].'</td>
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
										<th>P OPCION</th>
										<th>S OPCION</th>
										<th>GENERO</th>
										<th>CORREO</th>
										<th>CEL 1</th>
										<th>CEL 2</th>
										<th>DIRECCION</th>
										<th>DEPARTAMENTO</th>
										<th>PROVINCIA</th>
										<th>DISTRITO</th>
										<th>REPRESENTANTE</th>
										<th>DNI REPRESENTANTE</th>
										<th>CORREO REPRESENTANTE</th>
										<th>PARENTEZCO REPRESENTANTE</th>
										<th>DIRECCION REPRESENTANTE</th>
										<th>CEL REPRESENTANTE</th>
										<th>COLEGIO</th>
										<th>TIPO DE COLEGIO</th>
										<th>ESPECIALIDAD COLEGIO</th>
										<th>NOTA COLEGIO</th>
										<th>FOTO</th>
										<th>VAUCHER</th>
										<th>ESTADO</th>
										<th>FECHA</th>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->












