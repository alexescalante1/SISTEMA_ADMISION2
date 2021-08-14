
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
				<h3 style="font-weight: bold;" class="card-title">LISTA DE INGRESANTES</h3>
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

					$arr = array();
					$especialidades = ControladorAdmision::ctrMostrar("especialidad", null, null);		
					foreach($especialidades as $key => $value){
						$arr[$value["idEspecialidad"]][0] = $value["titulo"];
					}

					$cupos = ControladorAdmision::ctrMostrar("cupos","idAdmision", $rutaEventos[0]);
					
					foreach($cupos as $key => $value){
						echo $arr[$value["idEspecialidad"]][0]." <==> BECA: ".$value["cupoBeca"]." <==> NORMAL: ".$value["cupoNormal"]." <==> PUNTAJE: ".$value["puntaje"]."<br>";
						$arr[$value["idEspecialidad"]][1] = $value["cupoBeca"];
						$arr[$value["idEspecialidad"]][2] = $value["cupoNormal"];
						$arr[$value["idEspecialidad"]][3] = $value["puntaje"];
					}

					echo "<br>";

					$resIngres = ControladorAdmision::ctrMostrarResIngres("respuestas","idAdmision", $rutaEventos[0]);
				
					foreach($resIngres as $key => $value){
						echo $value["idRespuestas"]." <== ID<br>";
						echo $value["pnts"]." ";
						echo $value["valid"]." ";
						echo $value["idEspIngreso"]."<br>";
						echo $value["Tpostulacion"].", ";
						echo $value["Popcion"].", ";
						echo $value["Sopcion"]."<br>";
						echo $value["dni"]." ";
						echo $value["nombre"]." ";
						echo $value["apellidoPat"]." ";
						echo $value["apellidoMat"]." ";

						echo "<br>";



						if($value["Tpostulacion"]=="beca"){
							echo $arr[$value["Popcion"]][1]." ";
							echo $arr[$value["Sopcion"]][1]." ";
						}else if($value["Tpostulacion"]=="normal"){
							echo $arr[$value["Popcion"]][2]." ";
							echo $arr[$value["Sopcion"]][2]." ";
						}

						echo "<br>";

						echo $arr[$value["Popcion"]][3]." === ";
						echo $arr[$value["Sopcion"]][3];

						echo "<br>";

						
						if($value["pnts"]>=$arr[$value["Popcion"]][3]){
							echo "INGRESASTE!! PRIMERA OPCION";
							if($value["Tpostulacion"]=="beca"){
								echo $arr[$value["Popcion"]][1];
								ModeloAdmision::mdlActualizarEstIngreso("respuestas","valid", 5,"idEspIngreso",$value["Popcion"],"idRespuestas",$value["idRespuestas"]);




								$cnt = ModeloAdmision::mdlContarIngresantes("respuestas","valid", 5,"idEspIngreso",$value["Popcion"],"idAdmision", $rutaEventos[0]);
								echo $cnt[0]." <= CONT";
								///VALIDAR TU OPCION




							}else if($value["Tpostulacion"]=="normal"){
								echo $arr[$value["Popcion"]][2];
								ModeloAdmision::mdlActualizarEstIngreso("respuestas","valid", 1,"idEspIngreso",$value["Popcion"],"idRespuestas",$value["idRespuestas"]);
								
								
								
								$cnt = ModeloAdmision::mdlContarIngresantes("respuestas","valid", 1,"idEspIngreso",$value["Popcion"],"idAdmision", $rutaEventos[0]);
								echo $cnt[0]." <= CONT";
								///VALIDAR TU OPCION



							}
						}else if($value["pnts"]>=$arr[$value["Sopcion"]][3]){
							echo "INGRESASTE!! SEGUNDA OPCION";
							if($value["Tpostulacion"]=="beca"){
								echo $arr[$value["Sopcion"]][1];
								ModeloAdmision::mdlActualizarEstIngreso("respuestas","valid", 6,"idEspIngreso",$value["Sopcion"],"idRespuestas",$value["idRespuestas"]);
								
								
								
								
								$cnt = ModeloAdmision::mdlContarIngresantes("respuestas","valid", 6,"idEspIngreso",$value["Sopcion"],"idAdmision", $rutaEventos[0]);
								echo $cnt[0]." <= CONT";
								///VALIDAR TU OPCION





							}else if($value["Tpostulacion"]=="normal"){
								echo $arr[$value["Sopcion"]][2];
								ModeloAdmision::mdlActualizarEstIngreso("respuestas","valid", 2,"idEspIngreso",$value["Sopcion"],"idRespuestas",$value["idRespuestas"]);
								
								
								
								$cnt = ModeloAdmision::mdlContarIngresantes("respuestas","valid", 2,"idEspIngreso",$value["Sopcion"],"idAdmision", $rutaEventos[0]);
								echo $cnt[0]." <= CONT";
								///VALIDAR TU OPCION



							}
						}else{
							echo "NO INGRESASTE";
							ModeloAdmision::mdlActualizarEstIngreso("respuestas","valid", 0,"idEspIngreso",0,"idRespuestas",$value["idRespuestas"]);
						}

						echo "<br><br><br>";

					}


				?>

				






















			</div>

		</div>
		<!-- /.card -->


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->












