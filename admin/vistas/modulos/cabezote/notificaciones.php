<?php

if($_SESSION["perfil"] != "administrador"){

	return;	

}

$nuevasNotificaciones = ControladorNotificacionesM::ctrContarNotificaciones("notificacion","visto", 0);
$usuariosMorosos = ControladorNotificacionesM::ctrContarNotificaciones("usuarios","verificacion", 1);

$totalNotificaciones = $usuariosMorosos[0] + $nuevasNotificaciones[0];

?>

<!--=====================================
NOTIFICACIONES
======================================-->

<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
	<i class="far fa-bell"></i>
	<span class="badge badge-warning navbar-badge"><?php  echo $totalNotificaciones; ?></span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
	<span class="dropdown-item dropdown-header">Tienes <?php  echo $totalNotificaciones; ?> Notificaciones Nuevas</span>
	
	<div class="dropdown-divider"></div>
	<a href="notificacionesM" class="dropdown-item">
	<i class="fas fa-envelope mr-2"></i> <?php  echo $nuevasNotificaciones[0]; ?> Prestamos Pendientes
	<span class="float-right text-muted text-sm">3 mins</span>
	</a>

	<div class="dropdown-divider"></div>
	<a href="usuarios" class="dropdown-item">
	<i class="fas fa-users mr-2"></i> <?php  echo $usuariosMorosos[0]; ?> Usuarios Morosos
	<span class="float-right text-muted text-sm">12 hours</span>
	</a>

	<div class="dropdown-divider"></div>
	<a href="#" class="dropdown-item">
	<i class="fas fa-file mr-2"></i> 3 new reports
	<span class="float-right text-muted text-sm">2 days</span>
	</a>

	<div class="dropdown-divider"></div>
	<a href="#" class="dropdown-item dropdown-footer">Mostrar Todas las Notificaciones</a>
</div>
</li>


