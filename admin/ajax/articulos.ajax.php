<?php

require_once "../controladores/articulos.controlador.php";
require_once "../modelos/articulos.modelo.php";

require_once "../controladores/categorias.controladorM.php";
require_once "../modelos/categorias.modeloM.php";

class AjaxArticulo{

	/*=============================================
  	ACTIVAR ARTICULOS
 	=============================================*/	

 	public $activarArticulo;
	public $activarIdA;

	public function ajaxActivarArticulo(){

		$tabla = "detallearticulo";

		$item1 = "disponible";
		$valor1 = $this->activarArticulo;

		$item2 = "idDetalleArticulo";
		$valor2 = $this->activarIdA;

		$respuesta = ModeloArticulos::mdlActualizarArticulos($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}




	/*=============================================
  	ESTADO COD ARTICULOS
 	=============================================*/	

 	public $estadoCodArticulo;
	public $estadoIdCodA;

	public function ajaxEstadoCodArticulo(){

		$tabla = "articulos";

		$item1 = "estado";
		$valor1 = $this->estadoCodArticulo;

		$item2 = "idArticulo";
		$valor2 = $this->estadoIdCodA;

		$respuesta = ModeloArticulos::mdlActualizarArticulos($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}


	/*=============================================
	VALIDAR NO REPETIR ARTICULOS
	=============================================*/	

	public $validarArticulo;

	public function ajaxValidarArticulo(){

		$item = "titulo";
		$valor = $this->validarArticulo;

		$respuesta = ControladorArticulos::ctrMostrarArticulos($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	VALIDAR NO REPETIR CATEGORIA
	=============================================*/	

	public $validarCategoriaM;

	public function ajaxValidarCategoriaM(){

		$item = "titulo";
		$valor = $this->validarCategoriaM;

		$respuesta = ControladorCategoria::ctrValidarCategoria($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	VALIDAR NO REPETIR CODIGO
	=============================================*/	

	public $validarCodPatrimonial;

	public function ajaxValidarCodPatrimonial(){

		$item = "codigoPatrimonial";
		$valor = $this->validarCodPatrimonial;

		$respuesta = ControladorArticulos::ctrMostrarCodArticulos($item, $valor);

		echo json_encode($respuesta);

	}









	/*=============================================
	RECIBIR MULTIMEDIA
	=============================================*/

	public $imagenMultimediaA;
	public $rutaMultimediaA;	

	public function  ajaxRecibirMultimedia(){

		$datos = $this->imagenMultimediaA;
		$ruta = $this->rutaMultimediaA;

		$respuesta = ControladorArticulos::ctrSubirMultimedia($datos, $ruta);

		echo $respuesta;

	}

	/*=============================================
	GUARDAR PRODUCTO Y EDITAR PRODUCTO
	=============================================*/	

	public $tituloArticulo;
	public $rutaArticulo;
	public $seleccionarCategoria;
	public $descripcionArticulo;
	public $pClavesArticulo;
	public $precio;
	public $peso;
	public $disponible;
	public $multimedia;
	public $fotoPrincipal;

	public $idA;
	public $antiguaFotoPrincipalA;

	public function  ajaxCrearArticulo(){

		$datos = array(
			"tituloArticulo"=>$this->tituloArticulo,
			"rutaArticulo"=>$this->rutaArticulo,				
			"categoria"=>$this->seleccionarCategoria,
			"descripcionArticulo"=>$this->descripcionArticulo,
			"pClavesArticulo"=>$this->pClavesArticulo,
			"precio"=>$this->precio,
			"peso"=>$this->peso,
			"disponible"=>$this->disponible,
			"multimedia"=>$this->multimedia,
			"fotoPrincipal"=>$this->fotoPrincipal
			);

		$respuesta = ControladorArticulos::ctrCrearArticulo($datos);

		echo $respuesta;

	}


	/*=============================================
	TRAER ARTICULOS
	=============================================*/	

	public $idArticulo;

	public function ajaxTraerArticulo(){

		$item = "idDetalleArticulo";
		$valor = $this->idArticulo;

		$respuesta = ControladorArticulos::ctrMostrarArticulos($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR ARTICULOS
	=============================================*/	

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

	/*=============================================
	GUARDAR CATEGORIA Y EDITAR CATEGORIA
	=============================================*/	
	public $tituloCategoriaM;
	public $rutaCategoriaM;

	public function  ajaxCrearCategoriaM(){

		$datos = array(
			"tituloCategoriaM"=>$this->tituloCategoriaM,
			"rutaCategoriaM"=>$this->rutaCategoriaM
			);

		$respuesta = ControladorCategoria::ctrCrearCategoria($datos);

		echo $respuesta;

	}

	/*=============================================
	TRAER CATEGORIAS
	=============================================*/	

	public $idCategoriaM;

	public function ajaxTraerCategoria(){

		$item = "idCategoria";
		$valor = $this->idCategoriaM;

		$respuesta = ControladorCategoria::ctrValidarCategoria($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/	

	public $idC;

	public function  ajaxEditarCategoria(){

		$datos = array(
			"idCategoria"=>$this->idC,
			"tituloCategoriaM"=>$this->tituloCategoriaM,
			"rutaCategoriaM"=>$this->rutaCategoriaM
			);

		$respuesta = ControladorCategoria::ctrEditarCategoriaM($datos);
	
		echo $respuesta;

	}









	/*=============================================
	TRAER UNIDADES  DISPONIBLES
	=============================================*/	

	public $idDetArticuloDis;

	public function ajaxTraerUnDisponibles(){

		$item = "idDetalleArticulo";
		$valor = $this->idDetArticuloDis;

		$respuesta = ModeloArticulos::mdlContarCodArticulos("articulos",$item, $valor,"estado",1);

		//echo $respuesta;
		echo json_encode($respuesta);

	}

















	/*=============================================
	GUARDAR COD Y EDITAR COD
	=============================================*/	
	public $codPatrimonialI;
	public $idDetArticulo;

	public function  ajaxCrearCodPatrimonial(){

		$idDetArt = $this->idDetArticulo;
		$codP = $this->codPatrimonialI;

		$respuesta = ControladorArticulos::ctrCrearCodPatrimonial($idDetArt, $codP);

		echo $respuesta;

	}


	/*=============================================
	TRAER ARTICULOS CODIGOS
	=============================================*/	

	public $idArticuloCodP;

	public function ajaxTraerArticulosCodigos(){

		$item = "idDetalleArticulo";
		$valor = $this->idArticuloCodP;

        $respuesta = ControladorArticulos::ctrMostrarCodArticulosDisponibles($item, $valor);

		echo json_encode($respuesta);

	}


	


 }





























/*=============================================
ACTIVAR PRODUCTOS
=============================================*/	

if(isset($_POST["activarArticulo"])){
	
	$activarArticulo = new AjaxArticulo();
	$activarArticulo -> activarArticulo = $_POST["activarArticulo"];
	$activarArticulo -> activarIdA = $_POST["activarIdA"];
	$activarArticulo -> ajaxActivarArticulo();

}


/*=============================================
BAJA COD ARTICULO
=============================================*/	

if(isset($_POST["estadoIdCodA"])){
	
	$bajaCodigoArticuloM = new AjaxArticulo();
	$bajaCodigoArticuloM -> estadoCodArticulo = $_POST["estadoCodArticulo"];
	$bajaCodigoArticuloM -> estadoIdCodA = $_POST["estadoIdCodA"];
	$bajaCodigoArticuloM -> ajaxEstadoCodArticulo();

}


/*=============================================
VALIDAR NO REPETIR PRODUCTO
=============================================*/

if(isset($_POST["validarArticulo"])){

	$valArticulo = new AjaxArticulo();
	$valArticulo -> validarArticulo = $_POST["validarArticulo"];
	$valArticulo -> ajaxValidarArticulo();

}

/*=============================================
VALIDAR NO REPETIR CATEGORIA
=============================================*/

if(isset($_POST["validarCategoriaM"])){

	$valCategoriaM = new AjaxArticulo();
	$valCategoriaM -> validarCategoriaM = $_POST["validarCategoriaM"];
	$valCategoriaM -> ajaxValidarCategoriaM();

}


/*=============================================
VALIDAR CODIGO PATRIMONIAL
=============================================*/

if(isset($_POST["validarCodPatrimonial"])){

	$valCodPatrimonial = new AjaxArticulo();
	$valCodPatrimonial -> validarCodPatrimonial = $_POST["validarCodPatrimonial"];
	$valCodPatrimonial -> ajaxValidarCodPatrimonial();

}


#RECIBIR ARCHIVOS MULTIMEDIA
#-----------------------------------------------------------
if(isset($_FILES["fileM"])){

	$multimedia = new AjaxArticulo();
	$multimedia -> imagenMultimediaA = $_FILES["fileM"];
	$multimedia -> rutaMultimediaA = $_POST["rutaM"];
	$multimedia -> ajaxRecibirMultimedia();

}


#CREAR PRODUCTO
#-----------------------------------------------------------
if(isset($_POST["tituloArticulo"])){

	$producto = new AjaxArticulo();
	$producto -> tituloArticulo = $_POST["tituloArticulo"];
	$producto -> rutaArticulo = $_POST["rutaArticulo"];
	$producto -> seleccionarCategoria = $_POST["seleccionarCategoria"];
	$producto -> descripcionArticulo = $_POST["descripcionArticulo"];
	$producto -> pClavesArticulo = $_POST["pClavesArticulo"];
	$producto -> precio = $_POST["precio"];
	$producto -> peso = $_POST["peso"];
	$producto -> disponible = $_POST["disponible"];

	$producto -> multimedia = $_POST["multimedia"];

	if(isset($_FILES["fotoPrincipal"])){

		$producto -> fotoPrincipal = $_FILES["fotoPrincipal"];

	}else{

		$producto -> fotoPrincipal = null;

	}

	$producto -> ajaxCrearArticulo();

}

#CREAR CATEGORIA
#-----------------------------------------------------------
if(isset($_POST["tituloCategoriaM"])){

	$categoriaM = new AjaxArticulo();
	$categoriaM -> tituloCategoriaM = $_POST["tituloCategoriaM"];
	$categoriaM -> rutaCategoriaM = $_POST["rutaCategoriaM"];

	$categoriaM -> ajaxCrearCategoriaM();

}


#CREAR CODIGO
#-----------------------------------------------------------
if(isset($_POST["codigoPatrimonial"])){

	$codPatrimonialC = new AjaxArticulo();
	$codPatrimonialC -> codPatrimonialI = $_POST["codigoPatrimonial"];
	$codPatrimonialC -> idDetArticulo = $_POST["idDetalleArticulo"];

	$codPatrimonialC -> ajaxCrearCodPatrimonial();

}


/*=============================================
TRAER ARTICULO
=============================================*/
if(isset($_POST["idArticulo"])){

	$traerProducto = new AjaxArticulo();
	$traerProducto -> idArticulo = $_POST["idArticulo"];
	$traerProducto -> ajaxTraerArticulo();

}



/*=============================================
TRAER ARTICULOS DISPONIBLES
=============================================*/
if(isset($_POST["idDetalleArticuloCOD"])){

	$traerArtcCod = new AjaxArticulo();
	$traerArtcCod -> idArticuloCodP = $_POST["idDetalleArticuloCOD"];
	$traerArtcCod -> ajaxTraerArticulosCodigos();

}




/*=============================================
EDITAR ARTICULO
=============================================*/
if(isset($_POST["idA"])){

	$editarArticulo = new AjaxArticulo();
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



/*=============================================
TRAER CATEGORIA
=============================================*/
if(isset($_POST["idCategoriaM"])){

	$traerCategoria = new AjaxArticulo();
	$traerCategoria -> idCategoriaM = $_POST["idCategoriaM"];
	$traerCategoria -> ajaxTraerCategoria();

}


/*=============================================
EDITAR CATEGORIA
=============================================*/
if(isset($_POST["idC"])){

	$editarCategoria = new AjaxArticulo();
	$editarCategoria -> idC = $_POST["idC"];
	$editarCategoria -> tituloCategoriaM = $_POST["editarCategoriaM"];
	$editarCategoria -> rutaCategoriaM = $_POST["rutaCategoriaM"];

	$editarCategoria -> ajaxEditarCategoria();

}




/*=============================================
ARTICULOS DISPONIBLES
=============================================*/
if(isset($_POST["UnDisponibles"])){

	$traerUnDisponibles = new AjaxArticulo();
	$traerUnDisponibles -> idDetArticuloDis = $_POST["UnDisponibles"];
	$traerUnDisponibles -> ajaxTraerUnDisponibles();

}