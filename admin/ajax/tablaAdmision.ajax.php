<?php

require_once "../controladores/admision.controlador.php";
require_once "../modelos/admision.modelo.php";

class TablaEspecialidad{

  public function mostrarTablaEspecialidad(){
	
  	$item = null;
  	$valor = null;

  	$admicionE = ControladorAdmision::ctrMostrarAdmision($item, $valor);
	  
	$datosJson = '

  		{
  			"data":[';

	 	for($i = 0; $i < count($admicionE); $i++){
			
			/*=============================================
  			AGREGAR ETIQUETAS DE ESTADO
  			=============================================*/

  			if($admicionE[$i]["estado"] == 0){

				$colorEstado = "btn-danger";
				$textoEstado = "NO VISIBLE";
				$estadoArticulo = 1;

			}else{

				$colorEstado = "btn-success";
				$textoEstado = "VISIBLE";
				$estadoArticulo = 0;

			}

			$estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' style='width:70px;' idAdmision='".$admicionE[$i]["idAdmision"]."' estadoAdmision='".$estadoArticulo."'>".$textoEstado."</button>";
			
			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCategoriaM' idCategoriaM='".$admicionE[$i]["idAdmision"]."' data-toggle='modal' data-target='#modalEditarCategoriaM'><i class='fa fa-pencil'></i></button></div>";
			$accionesFinal = "<div class='btn-group'><a href='".$admicionE[$i]["ruta"]."'><button class='btn btn-success' ><i class='fa fa-eye'></i></button></a></div>";

			$datosJson .='[
					
					"'.($i+1).'",
					"'.$estado.'",
					"'.$admicionE[$i]["titulo"].'",
					"'.$admicionE[$i]["fecha"].'",
					"'.$accionesFinal.'"	   

			],';

		}

		if($admicionE==null){
			$datosJson .='[
				
				"0",
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

$activarCategoriaM = new TablaEspecialidad();
$activarCategoriaM -> mostrarTablaEspecialidad();


