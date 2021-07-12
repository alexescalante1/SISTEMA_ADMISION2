<?php

require_once "../controladores/admision.controlador.php";
require_once "../modelos/admision.modelo.php";

class TablaEspecialidad{

  public function mostrarTablaEspecialidad(){
	
  	$item = null;
  	$valor = null;

  	$especialidadM = ControladorAdmision::ctrMostrarEspecialidad($item, $valor);
	  
	$datosJson = '

  		{
  			"data":[';

	 	for($i = 0; $i < count($especialidadM); $i++){

			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarEspecialidad' idEspecialidad='".$especialidadM[$i]["idEspecialidad"]."' data-toggle='modal' data-target='#modalEditarEspecialidad'><i class='fa fa-pencil'></i></button></div>";

			$datosJson .='[
					
					"'.($i+1).'",
					"'.$especialidadM[$i]["titulo"].'",
					"'.$acciones.'"	   

			],';

		}

		if($especialidadM==null){
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

$activarCategoriaM = new TablaEspecialidad();
$activarCategoriaM -> mostrarTablaEspecialidad();


