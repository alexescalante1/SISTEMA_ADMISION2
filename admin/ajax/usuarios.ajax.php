<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

  
  /*=============================================
  ACTIVAR USUARIOS
  =============================================*/	

  public $activarUsuario;
  public $activarId;

  public function ajaxActivarUsuario(){

  	$respuesta = ModeloUsuarios::mdlActualizarUsuario("usuarios", "verificacion", $this->activarUsuario, "id", $this->activarId);

  	echo $respuesta;

  }


  /*=============================================
  VALIDAR USUARIO
  =============================================*/	

  public $validarUsuario;

  public function ajaxValidarUsuario(){

    $item = "codigo";
		$valor = $this->validarUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

  }

  public function ajaxValidarUser(){

    $item = "user";
		$valor = $this->validarUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

  }

}

/*=============================================
ACTIVAR CATEGORIA
=============================================*/

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}



if(isset($_POST["validarUsuarioP"])){

	$validaUsuario = new AjaxUsuarios();
	$validaUsuario -> validarUsuario = $_POST["validarUsuarioP"];
	$validaUsuario -> ajaxValidarUsuario();

}

if(isset($_POST["validarUser"])){

	$validaUsuario = new AjaxUsuarios();
	$validaUsuario -> validarUsuario = $_POST["validarUser"];
	$validaUsuario -> ajaxValidarUser();

}
