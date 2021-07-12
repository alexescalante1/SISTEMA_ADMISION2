<?php

require_once "../controladores/articulos.controlador.php";
require_once "../modelos/articulos.modelo.php";

class TablaArticulos{

  /*=============================================
  MOSTRAR LA TABLA DE ARTICULOS
  =============================================*/ 

  public function mostrarTablaArticulos(){
	
  	$item = null;
  	$valor = null;
	$idArt = array();
	
	$articulos = ControladorArticulos::ctrMostrarArticulos($item, $valor);
	
	for($i = 0; $i < count($articulos); $i++){
	
		$idArt[$articulos[$i]["idDetalleArticulo"]] = $articulos[$i]["titulo"];
	
	}

	$prestamos = ControladorArticulos::ctrMostrarPrestamos("estado", 0);

  	$datosJson = '

  		{
  			"data":[';

	 	for($i = 0; $i < count($prestamos); $i++){

			/*=============================================
  			TRAER LAS ACCIONES
  			=============================================*/

			$accionesV = "<div class='btn-group'><button class='btn btn-success btnVisualizarPrestamo' idVPrestamo='".$prestamos[$i]["idPrestamo"]."' data-toggle='modal' data-target='#modalVisualizarPrestamo'><i class='fa fa-eye'></i></button></div>";

			//$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarArticulo' idArticulo='".$articulos[$i]["idDetalleArticulo"]."' data-toggle='modal' data-target='#modalEditarArticulo'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarArticulo' idArticulo='".$articulos[$i]["idDetalleArticulo"]."' rutaCabecera='".$articulos[$i]["ruta"]."' imgPrincipal='".$articulos[$i]["portada"]."'><i class='fa fa-times'></i></button></div>";

			$datosJson .='[
					
					"'.($i+1).'",
					"'.$accionesV.'",
					"'.$prestamos[$i]["numDocTitular"].'",
					"'.$prestamos[$i]["nombreTitular"].'",
					"'.$idArt[$prestamos[$i]["idDetalleArticulo"]].'",
					"'.$prestamos[$i]["plazoDias"].'",
					"'.$prestamos[$i]["nombrePrestamista"].'",
					"'.$prestamos[$i]["fecha"].'"
				
			],';

		}

		

		if($prestamos==null){
			$datosJson .='[
				
				"0",
				"null",
				"null",
				"null",
				"null",
				"null",
				"null",
				"null"	   

			],';
		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']

		}';

		echo $datosJson;

  }


}

/*=============================================
ACTIVAR TABLA DE ARTICULOS
=============================================*/ 
$activarArticulo = new TablaArticulos();
$activarArticulo -> mostrarTablaArticulos();


