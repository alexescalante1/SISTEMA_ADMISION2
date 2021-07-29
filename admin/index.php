<?php


require_once "controladores/plantilla.controlador.php";
require_once "controladores/admision.controlador.php";
require_once "modelos/admision.modelo.php";

require_once "controladores/inscripcion.controlador.php";
require_once "modelos/inscripcion.modelo.php";

require_once "controladores/administradores.controlador.php";



require_once "controladores/articulos.controlador.php";
require_once "controladores/categorias.controladorM.php";
require_once "controladores/notificaciones.controladorM.php";



require_once "modelos/administradores.modelo.php";


require_once "modelos/articulos.modelo.php";
require_once "modelos/categorias.modeloM.php";
require_once "modelos/notificaciones.modeloM.php";


require_once "modelos/rutas.php";

$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();