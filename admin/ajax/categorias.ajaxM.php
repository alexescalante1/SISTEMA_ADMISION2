<?php

require_once "../controladores/categorias.controladorM.php";
require_once "../modelos/categorias.modeloM.php";




// require_once "../controladores/subcategorias.controlador.php";
require_once "../modelos/subcategorias.modelo.php";

// require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxCategoria{

  /*=============================================
  ACTIVAR CATEGORIA
  =============================================*/	

  public $activarCategoria;
  public $activarId;

  public function ajaxActivarCategoria(){


    ModeloSubCategorias::mdlActualizarSubCategorias("subcategorias", "estado", $this->activarCategoria, "id_categoria", $this->activarId);

    ModeloProductos::mdlActualizarProductos("productos", "estado", $this->activarCategoria, "id_categoria", $this->activarId);

  	$respuesta = ModeloCategorias::mdlActualizarCategoria("categorias", "estado", $this->activarCategoria, "id", $this->activarId);

  	echo $respuesta;

  }

  /*=============================================
  VALIDAR NO REPETIR CATEGORÍA
  =============================================*/ 

  public $validarCategoria;

  public function ajaxValidarCategoria(){

    $item = "categoria";
    $valor = $this->validarCategoria;

    $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

    echo json_encode($respuesta);

  }

  /*=============================================
  EDITAR CATEGORIA
  =============================================*/ 

  public $idCategoria;

  public function ajaxEditarCategoria(){

    $item = "idCategoria";
    $valor = $this->idCategoria;

    $respuesta = ControladorCategoria::ctrMostrarCategoria($item, $valor);

    echo json_encode($respuesta);

  }

}




/*=============================================
ACTIVAR CATEGORIA
=============================================*/

if(isset($_POST["activarCategoria"])){

	$activarCategoria = new AjaxCategoria();
	$activarCategoria -> activarCategoria = $_POST["activarCategoria"];
	$activarCategoria -> activarId = $_POST["activarId"];
	$activarCategoria -> ajaxActivarCategoria();

}

/*=============================================
VALIDAR NO REPETIR CATEGORÍA
=============================================*/

if(isset( $_POST["validarCategoria"])){

  $valCategoria = new AjaxCategoria();
  $valCategoria -> validarCategoria = $_POST["validarCategoria"];
  $valCategoria -> ajaxValidarCategoria();

}

/*=============================================
EDITAR CATEGORIA
=============================================*/
if(isset($_POST["idCategoria"])){

  $editar = new AjaxCategoria();
  $editar -> idCategoria = $_POST["idCategoria"];
  $editar -> ajaxEditarCategoria();

}



