<!--=====================================
USUARIOS
======================================-->


<li class="nav-item dropdown">
	
	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
		<?php
			if($_SESSION["foto"] == ""){
				echo '<img src="vistas/img/perfiles/default/anonymous.png" class="img-circle mr-2" alt="User Image" style="height:30px;">';
			}else{
				echo '<img src="'.$_SESSION["foto"].'" class="img-circle mr-2" alt="User Image" style="height:30px;">';
			}
		?>

		<span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>
	</a>

	<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
		
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user" style="margin-bottom: 0px;">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white"
                   style="background: url('vistas/img/plantilla/fondo3.jpg') center center;">
                <h3 class="widget-user-username text-right"><?php echo $_SESSION["nombre"]; ?></h3>
                <h5 class="widget-user-desc text-right"><?php echo $_SESSION["perfil"]; ?></h5>
              </div>
              <div class="widget-user-image">
			  		<?php

						if($_SESSION["foto"] == ""){
							echo '<img class="img-circle" src="vistas/img/perfiles/default/anonymous.png" alt="User Avatar">';
						}else{
							echo '<img class="img-circle" src="'.$_SESSION["foto"].'" alt="User Avatar">';
						}

					?>
                
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
					 
					 
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
			  <div style="text-aling:center">
				  
			  </div>

            </div>
            <!-- /.widget-user -->
			<a href="salir"><button type="button" class="btn btn-block btn-outline-info"><i class='fa fa-times'></i> LOG OUT</button></a>
	
	</div>

</li>

