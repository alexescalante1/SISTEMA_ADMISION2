
<input style="display:none" id="IDCODPRODET" name="IDCODPRODET" <?php echo 'value="'.$infoArticulos.'"'; ?> >

<!--=====================================
INFOPRODUCTOS
======================================-->
<div class="container-fluid infoproducto content-wrapper">
	
	<div class="content">
		
		<div class="box">


			<div class="container">

			<div class="row">
			<?php

				$item =  "ruta";
				
				$infoarticulo = ControladorArticulos::ctrMostrarInfoArticulo($item, $infoArticulos);

				$mda = json_decode($infoarticulo["multimedia"],true);
				/*=============================================
				VISOR DE IMÁGENES
				=============================================*/
/*
				if($infoproducto["tipo"] == "fisico"){
*/
					echo '<div class="col-md-5 col-sm-6 col-xs-12 ">

							<br>
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">';

								if($mda != null){
									
									echo '<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
									for($i = 1; $i < count($mda); $i ++){
										
										echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';
	
									}								
	
								}

								echo '
								</ol>
							
								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">';

								if($mda != null){

									echo '<div class="item active">
											<img src="'.$mda[0]["foto"].'" alt="...">
											<div class="carousel-caption">
											...
											</div>
										</div>';

									for($i = 1; $i < count($mda); $i ++){
	
										echo '<div class="item">
											<img src="'.$mda[$i]["foto"].'" alt="...">
											<div class="carousel-caption">
											...
											</div>
										</div>';
										
									}								
	
								}
								
								echo '

								</div>
							
								<!-- Controls -->
								<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
								</a>
							</div>

						</div>';			
/*
				}else{

					/*=============================================
					VISOR DE VIDEO
					=============================================*/
/*
					echo '<div class="col-sm-6 col-xs-12">
							
						<iframe class="videoPresentacion" src="https://www.youtube.com/embed/'.$infoproducto["multimedia"].'?rel=0&autoplay=0" width="100%" frameborder="0" allowfullscreen></iframe>

					</div>';

				}			
*/
			?>

			<!--=====================================
			PRODUCTO
			======================================-->

			<?php
/*
				if($infoproducto["tipo"] == "fisico"){
*/
					echo '<div class="col-md-7 col-sm-6 col-xs-12">';
/*
				}else{

					echo '<div class="col-sm-6 col-xs-12">';
				}
*/
			?>

				<!--=====================================
				REGRESAR A LA TIENDA
				======================================-->

				<!--
				<div class="col-xs-6">
					
					<h6>
						
						<a href="javascript:history.back()" class="text-muted">
							
							<i class="fa fa-reply"></i> Regresar al Gestor de Articulos

						</a>

					</h6>

				</div>
				-->
				<div class="clearfix"></div>

				<!--=====================================
				ESPACIO PARA EL PRODUCTO
				======================================-->



				<?php

					/*=============================================
					TITULO
					=============================================*/				
					/*
					if($infoproducto["oferta"] == 0){
*/
						$fecha = date('Y-m-d');
						$fechaActual = strtotime('-30 day', strtotime($fecha));
						$fechaNueva = date('Y-m-d', $fechaActual);


						echo '<h1 class="text-muted text-uppercase">'.$infoarticulo["titulo"].'</h1>';


						/*
						if($fechaNueva > $infoproducto["fecha"]){

							echo '<h1 class="text-muted text-uppercase">'.$infoarticulo["titulo"].'</h1>';

						}else{

							echo '<h1 class="text-muted text-uppercase">'.$infoproducto["titulo"].'

							<br>

							<small>
						
								<span class="label label-warning">Nuevo</span>

							</small>

							</h1>';

						}



						*/



					/*=============================================
					DESCRIPCIÓN
					=============================================*/		

					echo '<p>'.$infoarticulo["descripcion"].'</p>';

				?>
				
				<!--=====================================
				GRAFICAS ARTICULO
				======================================-->
					<br>
					
					<div class="chart-responsive">
						
						<div class="col-md-6 col-sm-6 col-xs-12">
							<canvas id="pieDisponible" height="250"></canvas>
						</div>
						
						<?php

						$colores = array("#FF4C4C","#90FF4C","#4CD2FF","#FFC112");
						$datosGraficaText = array("Baja","Disponible","Prestado","Mantenimiento");

						$Gbaja = ControladorArticulos::ctrContarCodArticulos("estado", 0, "idDetalleArticulo", $infoarticulo["idDetalleArticulo"]);

						$Gdisponible = ControladorArticulos::ctrContarCodArticulos("estado", 1, "idDetalleArticulo", $infoarticulo["idDetalleArticulo"]);

						$Gprestado = ControladorArticulos::ctrContarCodArticulos("estado", 2, "idDetalleArticulo", $infoarticulo["idDetalleArticulo"]);

						$Gmantenimiento = ControladorArticulos::ctrContarCodArticulos("estado", 3, "idDetalleArticulo", $infoarticulo["idDetalleArticulo"]);

						$datosGraficaT = array($Gbaja[0],$Gdisponible[0],$Gprestado[0],$Gmantenimiento[0]);

						?>

						<script>
						
						var pieChartCanvas = $('#pieDisponible').get(0).getContext('2d');
						var pieChart       = new Chart(pieChartCanvas);
						
						var PieData        = [

						<?php

							if($Gbaja[0]+$Gdisponible[0]+$Gprestado[0]+$Gmantenimiento[0]){
								for($i = 0; $i < 4; $i++){

									echo "{
										value    : ".$datosGraficaT[$i].",
										color    : '".$colores[$i]."',
										highlight: '".$colores[$i]."',
										label    : '".$datosGraficaText[$i]."'
									},";
							
								}
							}else{
								echo "{
									value    : 1,
									color    : '#D8D8D8',
									highlight: '#D8D8D8',
									label    : 'sin articulos'
								},";
							}

						?>
							
						];

						var pieOptions     = {
							segmentShowStroke    : true,
							segmentStrokeColor   : '#fff',
							segmentStrokeWidth   : 1,
							percentageInnerCutout: 50,
							animationSteps       : 150,
							animationEasing      : 'easeOutBounce',
							animateRotate        : true,
							animateScale         : false,
							responsive           : true,
							maintainAspectRatio  : false,
							legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
							tooltipTemplate      : '<%=label%>'
						};

						pieChart.Doughnut(PieData, pieOptions);

						</script>
						

						<div class="col-md-6 col-sm-6 col-xs-12">

						<ul class="chart-legend clearfix">

							<?php

							for($i = 0; $i < 4; $i++){

								echo '<li><i class="fa fa-circle-o" style="color:'.$colores[$i].';margin:0px 7px"></i> '.$datosGraficaT[$i].' '.$datosGraficaText[$i].'</li>';

							}

							?>

						</ul>
							
							
						</div>

	        		</div>
					
					<!--
					<input type="text" class="knob" value="80" data-width="200" data-height="200" data-fgcolor="blue" data-readonly="true">
					-->
				

					<div class="form-group">
					
						<?php
								echo '
								
								<h4 class="col-md-12 col-sm-0 col-xs-0" style="margin-top: 20px">

									<span class="label label-default" style="font-weight:100">

										<i class="fa fa-line-chart" style="margin:0px 5px"></i> Prestado 
										'.$infoarticulo["prestados"].' veces | 

										<i class="fa fa-balance-scale" style="margin:0px 5px"></i>
										'.$infoarticulo["peso"].' Kg |
										
										<i class="fa fa-credit-card-alt" style="margin:0px 5px"></i>
										Precio: S/.<span class="vistas">'.$infoarticulo["precio"].'</span> .00

									</span>

								</h4>

								';

						?>

					</div>

				</div>

				
			</div>
			</div>
			
			
			<br>


			<div class="box-header with-border">
	 
				<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCodArticulo">
				
				Agregar Nuevo Codigo

				</button>

			</div>
			<div class="box-body ">

				<table class="table table-bordered table-striped dt-responsive tablaCodArticulos" width="100%">

					<thead>
					
						<tr>
						
						<th style="width:10px">#</th>
						<th>Operatividad</th>
						<th>Mantenimiento</th>
						<th>Codigo Natural</th>
						<th>Codigo Patrimonial</th>
						<th>Fecha de creacion</th>
						<th>Estado</th>

						</tr> 

					</thead>   

				</table>
				
			</div>


		</div>

		</div>

	</div>

</div>






<!--==============================================================================================================================================================================================================================
MODAL AGREGAR COD ARTICULO
===============================================================================================================================================================================================================================-->

<div id="modalAgregarCodArticulo" class="modal fade" role="dialog">
  
   <div class="modal-dialog">
     
     <div class="modal-content">
       
       <!-- <form role="form" method="post" enctype="multipart/form-data"> -->
         
         <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Codigo Patrimonial</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--=====================================
            ENTRADA PARA EL CODIGO PATRIMONIAL
            ======================================-->
			
            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                  <input type="text" class="form-control input-lg validarCodPatrimonial codPatrimonial"  placeholder="Ingresar Codigo Patrimonial">
						
				  <input type="hidden" class="idArticuloRef" <?php echo 'value="'.$infoarticulo["idDetalleArticulo"].'"'; ?> >

				  <input type="hidden" class="rutaArticulo" <?php echo 'value="'.$infoArticulos.'"'; ?> >

                </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
  
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary guardarCodPatrimonial">Guardar Codigo</button>

        </div>

       <!-- </form> -->

     </div>

   </div>

</div>



<?php

  $eliminarCodArticulo = new ControladorArticulos();
  $eliminarCodArticulo -> ctrEliminarCodArticulo();

?>
















