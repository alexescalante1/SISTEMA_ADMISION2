 <?php

$usuarios = ControladorUsuarios::ctrMostrarTotalUsuarios("fecha");
$url = Ruta::ctrRutaServidor();

?>

<!--=====================================
ÚLTIMOS USUARIOS
======================================-->

<!-- USERS LIST -->
<div class="card">
	<div class="card-header">
	<h3 class="card-title">Ultimos Usuarios</h3>

	<div class="card-tools">
		<span class="badge badge-danger">8 New Members</span>
		<button type="button" class="btn btn-tool" data-card-widget="collapse">
		<i class="fas fa-minus"></i>
		</button>
		<button type="button" class="btn btn-tool" data-card-widget="remove">
		<i class="fas fa-times"></i>
		</button>
	</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body p-0">
	<ul class="users-list clearfix">



		<?php

			if(count($usuarios) > 8){
				$totalUsuarios = 8;
			}else{
				$totalUsuarios = count($usuarios);
			}

			for($i = 0; $i < $totalUsuarios; $i ++){

				if($usuarios[$i]["foto"] != ""){
					echo '
					<li>
						<img src="'.$url.$usuarios[$i]["foto"].'" alt="User Image">
						<a class="users-list-name" href="#">'.$usuarios[$i]["nombre"].'</a>
						<span class="users-list-date">Hoy</span>
					</li>
					';

				}else{
					echo '
					<li>
						<img src="vistas/img/usuarios/default/anonymous.png" alt="User Image">
						<a class="users-list-name" href="#">'.$usuarios[$i]["nombre"].'</a>
						<span class="users-list-date">Hoy</span>
					</li>
					';
				}

			}

	    ?> 

	</ul>
	<!-- /.users-list -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer text-center">
	<a href="usuarios">View All Users</a>
	</div>
	<!-- /.card-footer -->
</div>
<!--/.card -->