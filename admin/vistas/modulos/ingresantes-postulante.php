
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
						//echo $arr[$value["idEspecialidad"]][0]." <==> BECA: ".$value["cupoBeca"]." <==> NORMAL: ".$value["cupoNormal"]." <==> PUNTAJE: ".$value["puntaje"]."<br>";
						$arr[$value["idEspecialidad"]][1] = $value["cupoBeca"];
						$arr[$value["idEspecialidad"]][2] = $value["cupoNormal"];
						$arr[$value["idEspecialidad"]][3] = $value["puntaje"];
					}

					function calculoIngreso($arr,$valid,$idEspIngreso,$idRespuestas, $rutaEvent){
						ModeloAdmision::mdlActualizarEstIngreso("respuestas","valid", $valid,"idEspIngreso",$idEspIngreso,"idRespuestas",$idRespuestas);

						if($valid<5){
							$cnt = ModeloAdmision::mdlContarIngresantes("respuestas","<","valid", 5,"idEspIngreso",$idEspIngreso,"idAdmision", $rutaEvent);
						}else{
							$cnt = ModeloAdmision::mdlContarIngresantes("respuestas",">=","valid", 5,"idEspIngreso",$idEspIngreso,"idAdmision", $rutaEvent);
						}

						//echo "<br>".$cnt[0]." == CANTIDAD<br>";

						if($cnt[0]){

							if($valid<5){  ///NORMAL
									
								if($arr[$idEspIngreso][2]<$cnt[0]){
									//echo "EXEDE <br>";

									$ingresantes = ModeloAdmision::mdlMostrarIngresantRest("respuestas","idAdmision", $rutaEvent,"idEspIngreso",$idEspIngreso,$arr[$idEspIngreso][2]-1);

									for($i = 1 ; $i < count($ingresantes) ; $i++){

										//echo $ingresantes[$i]["valid"]."<br>";

										if($ingresantes[$i]["valid"]<5){
											if($ingresantes[0]["pnts"] != $ingresantes[$i]["pnts"]){
									
												if($ingresantes[$i]["valid"] == 1){
													
													if($ingresantes[$i]["pnts"] >= $arr[$ingresantes[$i]["Sopcion"]][3]){
														calculoIngreso($arr,2,$ingresantes[$i]["Sopcion"],$ingresantes[$i]["idRespuestas"], $rutaEvent);
														//ModeloAdmision::mdlActualizarEstIngreso("respuestas","valid", 2,"idEspIngreso",$ingresantes[$i]["Sopcion"],"idRespuestas",$ingresantes[$i]["idRespuestas"]);
														//echo "REASIGNAR ESTUDIANTE<br>";

													}else{

														ModeloAdmision::mdlActualizarEstIngreso("respuestas","valid", 0,"idEspIngreso",0,"idRespuestas",$ingresantes[$i]["idRespuestas"]);
													
													}


												}else{

													ModeloAdmision::mdlActualizarEstIngreso("respuestas","valid", 0,"idEspIngreso",0,"idRespuestas",$ingresantes[$i]["idRespuestas"]);
												
												}
												
											}
										}

									}

								}//echo $arr[$idEspIngreso][2]." ";

							}else{  ///BECADOS
								
								if($arr[$idEspIngreso][1]<$cnt[0]){
									//echo "EXEDE <br>";

									$ingresantes = ModeloAdmision::mdlMostrarIngresantRest("respuestas","idAdmision", $rutaEvent,"idEspIngreso",$idEspIngreso,$arr[$idEspIngreso][1]-1);

									for($i = 1 ; $i < count($ingresantes) ; $i++){
										//echo $ingresantes[$i]["valid"]."<br>";
										if($ingresantes[$i]["valid"]>=5){
											if($ingresantes[0]["pnts"] != $ingresantes[$i]["pnts"]){
											
												if($ingresantes[$i]["valid"] == 5){
													
													if($ingresantes[$i]["pnts"] >= $arr[$ingresantes[$i]["Sopcion"]][3]){
														calculoIngreso($arr,6,$ingresantes[$i]["Sopcion"],$ingresantes[$i]["idRespuestas"], $rutaEvent);
														//ModeloAdmision::mdlActualizarEstIngreso("respuestas","valid", 6,"idEspIngreso",$ingresantes[$i]["Sopcion"],"idRespuestas",$ingresantes[$i]["idRespuestas"]);
														//echo "REASIGNAR ESTUDIANTE<br>";
													}else{
	
														ModeloAdmision::mdlActualizarEstIngreso("respuestas","valid", 0,"idEspIngreso",0,"idRespuestas",$ingresantes[$i]["idRespuestas"]);
													
													}
	
												}else{
	
													ModeloAdmision::mdlActualizarEstIngreso("respuestas","valid", 0,"idEspIngreso",0,"idRespuestas",$ingresantes[$i]["idRespuestas"]);
												
												}
	
											}
										}

									}

								}//echo $arr[$idEspIngreso][1]." ";
							}

							
						}

					}

					$resIngres = ControladorAdmision::ctrMostrarResIngres("respuestas","idAdmision", $rutaEventos[0]);
				

					foreach($resIngres as $key => $value){
						/*
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
						*/
						


						if($value["pnts"]>=$arr[$value["Popcion"]][3]){
							//echo "INGRESASTE!! PRIMERA OPCION";
							if($value["Tpostulacion"]=="beca"){

								calculoIngreso($arr,5,$value["Popcion"],$value["idRespuestas"], $rutaEventos[0]);


							}else if($value["Tpostulacion"]=="normal"){

								calculoIngreso($arr,1,$value["Popcion"],$value["idRespuestas"], $rutaEventos[0]);

							}
						}else if($value["pnts"]>=$arr[$value["Sopcion"]][3]){
							//echo "INGRESASTE!! SEGUNDA OPCION";
							if($value["Tpostulacion"]=="beca"){

								calculoIngreso($arr,6,$value["Sopcion"],$value["idRespuestas"], $rutaEventos[0]);

							}else if($value["Tpostulacion"]=="normal"){
								
								calculoIngreso($arr,2,$value["Sopcion"],$value["idRespuestas"], $rutaEventos[0]);

							}
						}else{
							//echo "NO INGRESASTE";
							ModeloAdmision::mdlActualizarEstIngreso("respuestas","valid", 0,"idEspIngreso",0,"idRespuestas",$value["idRespuestas"]);
						}

						//echo "<br><br><br>";

					}



					


				?>

				
















				<div class="card-outline card-tabs">
					<div class="card-header p-0 pt-1 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">NORMAL</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">BECA</a>
						</li>
						</ul>
					</div>
					<div class="card-body">
						<div class="tab-content" id="custom-tabs-three-tabContent">
						<div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
							<h1 class="text-muted" style="font-weight: bold;text-align: center;padding-top:15px;">INGRESANTES MODALIDAD NORMAL</h1>
							<br>
							<?php 
								foreach($especialidades as $key => $value){
									echo '<h4 class="text-muted" style="font-weight: bold;padding-top:15px;">'.$value["titulo"].'</h4>';
								
									$ingresantes = ModeloAdmision::mdlMostrarIngresantEspc("respuestas","idAdmision", $rutaEventos[0],"idEspIngreso",$value["idEspecialidad"]);

									$num = 1;
									$opc = "";

									echo '
									<table id="tablab'.$value["idEspecialidad"].'" class="table table-bordered table-striped">
										<thead>
										<tr>
											<th style="width:5px">#</th>
											<th style="width:10px">PNTS</th>
											<th style="width:30px">DNI</th>
											<th>NOMBRE</th>
											<th style="width:40px">OPCION</th>
										</tr>
										</thead>
										<tbody>';
											
											foreach($ingresantes as $key => $val){
											
												if($val["valid"]<5){
													
													//echo $num." ==> ".$value["valid"]." ".$value["pnts"]." ".$value["dni"]." ".$value["nombre"]." ".$value["apellidoPat"]." ".$value["apellidoMat"]." ".$value["fecha"]."<br>";
													
													if($val["valid"]==1){
														$opc = "PRIMERA";
													}else{
														$opc = "SEGUNDA";
													}

													echo '
													<tr>
														<td>'.$num.'</td>
														<td>'.$val["pnts"].'</td>
														<td>'.$val["dni"].'</td>
														<td style="text-transform:uppercase;">'.$val["nombre"]." ".$val["apellidoPat"]." ".$val["apellidoMat"].'</td>
														<td>'.$opc.'</td>
													</tr>
													';
													
													$num++;	
												
												}
		
											}

										
										echo '
										</tbody>
										
									</table>
									
									
									<script>

									$(function () {
										$("#tablab'.$value["idEspecialidad"].'").DataTable({
											"responsive": true, "lengthChange": false, "autoWidth": false,
											"buttons": ["copy", "excel", "pdf", "print", "colvis"]
										}).buttons().container().appendTo("#tablab'.$value["idEspecialidad"].'_wrapper .col-md-6:eq(0)");
									});

									</script>
									
									';
								}
							?>
						</div>
						<div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
							<h1 class="text-muted" style="font-weight: bold;text-align: center;padding-top:15px;">INGRESANTES MODALIDAD BECA</h1>
							<br>
							<?php 
								foreach($especialidades as $key => $value){
									echo '<h4 class="text-muted" style="font-weight: bold;padding-top:15px;">'.$value["titulo"].'</h4>';
									//echo '<h5 class="text-muted" style="font-weight: bold;padding-top:15px;">'.' NIMINO: '.$arr[$value["idEspecialidad"]][3].'</h5>';
									$ingresantes = ModeloAdmision::mdlMostrarIngresantEspc("respuestas","idAdmision", $rutaEventos[0],"idEspIngreso",$value["idEspecialidad"]);
									
									$num = 1;
									$opc = "";

									echo '
									<table id="tabla'.$value["idEspecialidad"].'" class="table table-bordered table-striped">
										<thead>
										<tr>
											<th style="width:5px">#</th>
											<th style="width:10px">PNTS</th>
											<th style="width:30px">DNI</th>
											<th>NOMBRE</th>
											<th style="width:40px">OPCION</th>
										</tr>
										</thead>
										<tbody>';
											
											foreach($ingresantes as $key => $val){
											
												if($val["valid"]>=5){
													
													//echo $num." ==> ".$value["valid"]." ".$value["pnts"]." ".$value["dni"]." ".$value["nombre"]." ".$value["apellidoPat"]." ".$value["apellidoMat"]." ".$value["fecha"]."<br>";
													
													if($val["valid"]==1){
														$opc = "PRIMERA";
													}else{
														$opc = "SEGUNDA";
													}
													
													echo '
													<tr>
														<td>'.$num.'</td>
														<td>'.$val["pnts"].'</td>
														<td>'.$val["dni"].'</td>
														<td style="text-transform:uppercase;">'.$val["nombre"]." ".$val["apellidoPat"]." ".$val["apellidoMat"].'</td>
														<td>'.$opc.'</td>
													</tr>
													';
													
													$num++;	
												
												}
		
											}

										
										echo '
										</tbody>
										
									</table>
									
									
									<script>

									$(function () {
										$("#tabla'.$value["idEspecialidad"].'").DataTable({
											"responsive": true, "lengthChange": false, "autoWidth": false,
											"buttons": ["copy", "excel", "pdf", "print", "colvis"]
										}).buttons().container().appendTo("#tabla'.$value["idEspecialidad"].'_wrapper .col-md-6:eq(0)");
									});

									</script>
									
									';

								}
							?>
						
							
						</div>
						</div>
					</div>
					<!-- /.card -->
				</div>





				



			</div>

		</div>
		<!-- /.card -->


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->












