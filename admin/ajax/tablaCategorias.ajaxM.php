<?php

require_once "../controladores/categorias.controladorM.php";
require_once "../modelos/categorias.modeloM.php";

class TablaCategoriasM{

  /*=============================================
  MOSTRAR LA TABLA DE CATEGORIAS
  =============================================*/ 

  public function mostrarTablaCategoriasM(){
	
  	$item = null;
  	$valor = null;

  	$categoriasM = ControladorCategoria::ctrMostrarCategoria($item, $valor);
	  
	$datosJson = '

  		{
  			"data":[';

	 	for($i = 0; $i < count($categoriasM); $i++){

			//$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCategoriaM' idCategoriaM='".$categoriasM[$i]["idCategoria"]."' data-toggle='modal' data-target='#modalEditarCategoriaM'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCategoriaM' idCategoriaM='".$categoriasM[$i]["idCategoria"]."'><i class='fa fa-times'></i></button></div>";

			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCategoriaM' idCategoriaM='".$categoriasM[$i]["idCategoria"]."' data-toggle='modal' data-target='#modalEditarCategoriaM'><i class='fa fa-pencil'></i></button></div>";

			$datosJson .='[
					
					"'.($i+1).'",
					"'.$categoriasM[$i]["titulo"].'",
					"'.$acciones.'"	   

			],';

		}

		if($categoriasM==null){
			$datosJson .='[
				
				"0",
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
ACTIVAR TABLA DE CATEGORIAS
=============================================*/ 
$activarCategoriaM = new TablaCategoriasM();
$activarCategoriaM -> mostrarTablaCategoriasM();


