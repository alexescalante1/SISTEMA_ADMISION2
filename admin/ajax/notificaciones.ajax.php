<?php

require_once "../controladores/notificaciones.controladorM.php";
require_once "../modelos/notificaciones.modeloM.php";


Class AjaxNotificaciones{

	/*=============================================
	TRAER ARTICULOS
	=============================================*/	

	public $idNotificacion;

	public function ajaxTraerNotificacion(){

		$item = "idNotificacion";
		$valor = $this->idNotificacion;

		$respuesta = ControladorNotificacionesM::ctrBuscarNotificaciones($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
  	MODIFICAR ESTADO
 	=============================================*/	

 	public $estadoNotificacion;
	public $idNotifEstado;

	public function ajaxEstadoNotificacion(){

		$tabla = "notificacion";

		$item1 = "visto";
		$valor1 = $this->estadoNotificacion;

		$item2 = "idNotificacion";
		$valor2 = $this->idNotifEstado;

		$respuesta = ModeloNotificacionesM::mdlActualizarNotificacion($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}

}

/*=============================================
TRAER ARTICULO
=============================================*/
if(isset($_POST["idNotificacion"])){

	$traerNotificacion = new AjaxNotificaciones();
	$traerNotificacion -> idNotificacion = $_POST["idNotificacion"];
	$traerNotificacion -> ajaxTraerNotificacion();

}


/*=============================================
BAJA COD ARTICULO
=============================================*/	

if(isset($_POST["idNotifEstado"])){
	
	$estadoNotf = new AjaxNotificaciones();
	$estadoNotf -> estadoNotificacion = $_POST["estadoNotificacion"];
	$estadoNotf -> idNotifEstado = $_POST["idNotifEstado"];
	$estadoNotf -> ajaxEstadoNotificacion();

}