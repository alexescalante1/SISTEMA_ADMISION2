<?php

require_once "../controladores/articulos.controlador.php";
require_once "../modelos/articulos.modelo.php";


class AjaxPrestamo{


	/*=============================================
  	MOD DIAS PRESTAMO
 	=============================================*/	

 	public $ModDiasPrestamo;
	public $idMPrestamo;

	public function ajaxModDiasPrestamo(){

		$tabla = "prestamos";

		$item1 = "plazoDias";
		$valor1 = $this->ModDiasPrestamo;

		$item2 = "idPrestamo";
		$valor2 = $this->idMPrestamo;

		$respuesta = ModeloArticulos::mdlActualizarArticulos($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}


	/*=============================================
  	MOD ESTADO COD ARTIC
 	=============================================*/	

 	public $estadoCodArt;
	public $idMCodPatrimonial;

	public function ajaxModCodArticulo(){

		$tabla = "articulos";

		$item1 = "estado";
		$valor1 = $this->estadoCodArt;

		$item2 = "codigoPatrimonial";
		$valor2 = $this->idMCodPatrimonial;

		$respuesta = ModeloArticulos::mdlActualizarArticulos($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}


	/*=============================================
  	MOD ESTADO PRESTAMO
 	=============================================*/	

 	public $estadoPrestamoArt;
	public $idprestamoDev;

	public function ajaxModEstadoPrestamo(){

		$tabla = "prestamos";

		$item1 = "estado";
		$valor1 = $this->estadoPrestamoArt;

		$item2 = "idPrestamo";
		$valor2 = $this->idprestamoDev;

		$respuesta = ModeloArticulos::mdlActualizarArticulos($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}


	/*=============================================
  	DELETE ID PRESTAMO
 	=============================================*/	

	public $idPrestamoDelete;

	public function ajaxEliminarIdPrestamo(){

		$valor2 = $this->idPrestamoDelete;

		$respuesta = ControladorArticulos::ctrEliminarCodIdPrestamo($valor2);

		echo $respuesta;

	}

	/*=============================================
	GUARDAR PRESTAMO Y EDITAR PRESTAMO
	=============================================*/	

	public $nombrePrestamista;
	public $nombreUsuario;
	public $codUsuario;
	public $selecDiasPrestamo;
	public $idDetArticulo;

	public function  ajaxCrearPrestamo(){

		$datos = array(
			"nombrePrestamista"=>$this->nombrePrestamista,
			"nombreUsuario"=>$this->nombreUsuario,				
			"codUsuario"=>$this->codUsuario,
			"selecDiasPrestamo"=>$this->selecDiasPrestamo,
			"idDetalleArticulo"=>$this->idDetArticulo
			);

		$respuesta = ControladorArticulos::ctrCrearPrestamo($datos);

		echo $respuesta[0];

	}


	public $idPrestamo;
	public $idArticulo;
	public $codPatrimonial;

	public function  ajaxCrearPrestamoCod(){

		$datos = array(
			"idPrestamo"=>$this->idPrestamo,
			"idArticulo"=>$this->idArticulo,				
			"codPatrimonial"=>$this->codPatrimonial
			);

		$respuesta = ControladorArticulos::ctrCrearPrestamoCod($datos);

		echo $respuesta;

	}



	/*=============================================
	TRAER PRESTAMO
	=============================================*/	

	public function ajaxTraerPrestamo(){

		$item = "idPrestamo";
		$valor = $this->idPrestamo;

		$respuesta = ControladorArticulos::ctrBuscarPrestamo($item, $valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	CONT PRESTAMO ID
	=============================================*/	
	public $contIdPrestamo;
	public function ajaxContIdPrestamo(){

		$item = "idPrestamo";
		$valor = $this->contIdPrestamo;

		$respuesta = ControladorArticulos::ctrContarCodIdPrestamo($item, $valor);
		
		echo $respuesta[0];

	}


	/*=============================================
	TRAER CODS PRESTAMO
	=============================================*/	

	public function ajaxCodsPrestamo(){

		$item = "idPrestamo";
		$valor = $this->idPrestamo;

		$respuesta = ControladorArticulos::ctrMostrarArticulosCodPrestados($item, $valor);
		echo json_encode($respuesta);

	}

	/*=============================================
	TRAER ARTICULOS
	=============================================*/	
	/*
	public $idArticulo;

	public function ajaxTraerArticulo(){

		$item = "idDetalleArticulo";
		$valor = $this->idArticulo;

		$respuesta = ControladorArticulos::ctrMostrarArticulos($item, $valor);

		echo json_encode($respuesta);

	}
*/
	/*=============================================
	EDITAR ARTICULOS
	=============================================*/	
/*
	public function  ajaxEditarArticulo(){

		$datos = array(
			"idArticulo"=>$this->idA,
			"tituloArticulo"=>$this->tituloArticulo,
			"rutaArticulo"=>$this->rutaArticulo,
			"categoria"=>$this->seleccionarCategoria,
			"descripcionArticulo"=>$this->descripcionArticulo,					
			"pClavesArticulo"=>$this->pClavesArticulo,
			"precio"=>$this->precio,
			"peso"=>$this->peso,
			"disponible"=>$this->disponible,
			"multimedia"=>$this->multimedia,
			"fotoPrincipal"=>$this->fotoPrincipal,
			"antiguaFotoPrincipalA"=>$this->antiguaFotoPrincipalA
			);

		$respuesta = ControladorArticulos::ctrEditarArticulo($datos);
	
		echo $respuesta;

	}
*/
	
 }




























/*=============================================
PLAZO DIAS ARTICULO
=============================================*/	

if(isset($_POST["ModDiasPrestamo"])){
	
	$ModDiasPresta = new AjaxPrestamo();
	$ModDiasPresta -> ModDiasPrestamo = $_POST["ModDiasPrestamo"];
	$ModDiasPresta -> idMPrestamo = $_POST["idMPrestamo"];
	$ModDiasPresta -> ajaxModDiasPrestamo();

}


/*=============================================
PLAZO DIAS ARTICULO
=============================================*/	

if(isset($_POST["estadoCodArt"])){
	
	$ModDiasPresta = new AjaxPrestamo();
	$ModDiasPresta -> estadoCodArt = $_POST["estadoCodArt"];
	$ModDiasPresta -> idMCodPatrimonial = $_POST["idMCodPatrimonial"];
	$ModDiasPresta -> ajaxModCodArticulo();

}

/*=============================================
PLAZO DIAS ARTICULO
=============================================*/	

if(isset($_POST["estadoPrestamoArt"])){
	
	$ModEstadoPresta = new AjaxPrestamo();
	$ModEstadoPresta -> estadoPrestamoArt = $_POST["estadoPrestamoArt"];
	$ModEstadoPresta -> idprestamoDev = $_POST["idprestamoDev"];
	$ModEstadoPresta -> ajaxModEstadoPrestamo();

}


/*=============================================
DELETE ID PRESTAMO
=============================================*/	

if(isset($_POST["idPrestamoDelete"])){
	
	$DeletIdPrest = new AjaxPrestamo();
	$DeletIdPrest -> idPrestamoDelete = $_POST["idPrestamoDelete"];
	$DeletIdPrest -> ajaxEliminarIdPrestamo();

}

/*=============================================
TRAER ARTICULO
=============================================*/

/*
if(isset($_POST["idArticulo"])){

	$traerProducto = new AjaxPrestamo();
	$traerProducto -> idArticulo = $_POST["idArticulo"];
	$traerProducto -> ajaxTraerArticulo();

}
*/
/*=============================================
EDITAR ARTICULO
=============================================*/

/*
if(isset($_POST["idA"])){

	$editarArticulo = new AjaxPrestamo();
	$editarArticulo -> idA = $_POST["idA"];
	$editarArticulo -> tituloArticulo = $_POST["editarArticulo"];
	$editarArticulo -> rutaArticulo = $_POST["rutaArticulo"];
	$editarArticulo -> seleccionarCategoria = $_POST["seleccionarCategoria"];
	$editarArticulo -> descripcionArticulo = $_POST["descripcionArticulo"];		
	$editarArticulo -> pClavesArticulo = $_POST["pClavesArticulo"];
	$editarArticulo -> precio = $_POST["precio"];
	$editarArticulo -> peso = $_POST["peso"];
	$editarArticulo -> disponible = $_POST["disponible"];
	$editarArticulo -> multimedia = $_POST["multimedia"];

	if(isset($_FILES["fotoPrincipal"])){

		$editarArticulo -> fotoPrincipal = $_FILES["fotoPrincipal"];

	}else{

		$editarArticulo -> fotoPrincipal = null;

	}

	$editarArticulo -> antiguaFotoPrincipalA = $_POST["antiguaFotoPrincipalA"];

	$editarArticulo -> ajaxEditarArticulo();

}
*/

#CREAR PRESTAMO
#-----------------------------------------------------------
if(isset($_POST["nombrePrestamista"])){

	//echo $_POST["nombrePrestamista"];

	$prestamo = new AjaxPrestamo();
	$prestamo -> nombrePrestamista = $_POST["nombrePrestamista"];
	$prestamo -> nombreUsuario = $_POST["nombreUsuario"];
	$prestamo -> codUsuario = $_POST["codUsuario"];
	$prestamo -> selecDiasPrestamo = $_POST["selecDiasPrestamo"];
	$prestamo -> idDetArticulo = $_POST["idDetalleArticuloPresta"];
	$prestamo -> ajaxCrearPrestamo();

}

#CREAR PRESTAMO
#-----------------------------------------------------------
if(isset($_POST["idPrestamo"])){

	$prestamoCod = new AjaxPrestamo();
	$prestamoCod -> idPrestamo = $_POST["idPrestamo"];
	$prestamoCod -> idArticulo = $_POST["idArticulo"];
	$prestamoCod -> codPatrimonial = $_POST["codPatrimonial"];

	$prestamoCod -> ajaxCrearPrestamoCod();

}


#TRAER PRESTAMO
#-----------------------------------------------------------
if(isset($_POST["idVerPrestamo"])){

	$traerPrestamoS = new AjaxPrestamo();
	$traerPrestamoS -> idPrestamo = $_POST["idVerPrestamo"];
	$traerPrestamoS -> ajaxTraerPrestamo();
	
}

#CANT PRESTAMO ID
#-----------------------------------------------------------
if(isset($_POST["contIdPrestamo"])){

	$contIdPrest = new AjaxPrestamo();
	$contIdPrest -> contIdPrestamo = $_POST["contIdPrestamo"];
	$contIdPrest -> ajaxContIdPrestamo();

}


#CODS PRESTAMO ID
#-----------------------------------------------------------
if(isset($_POST["idPrestamoCods"])){

	$codsPrestamo = new AjaxPrestamo();
	$codsPrestamo -> idPrestamo = $_POST["idPrestamoCods"];
	$codsPrestamo -> ajaxCodsPrestamo();

}