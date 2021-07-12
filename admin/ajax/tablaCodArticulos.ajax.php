<?php

require_once "../controladores/articulos.controlador.php";
require_once "../modelos/articulos.modelo.php";

require_once "../controladores/categorias.controladorM.php";
require_once "../modelos/categorias.modeloM.php";


class TablaArticulos{
	
  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTOS
  =============================================*/ 

  public function mostrarTablaArticulos($CodPR){
	
	$codONE = null;
	$codTWO = null;
	
	$operatividad = null;
	$estado = null;
	$mantenimiento = null;

	$RUT = "ruta"; 
	$idArticuloD = ControladorArticulos::ctrMostrarInfoArticulo($RUT,$CodPR);
	 
	$item = "idDetalleArticulo";
	$valor = $idArticuloD["idDetalleArticulo"];
	  
  	$productos = ControladorArticulos::ctrMostrarCodArticulos($item, $valor);


	$OpBaja = 0;
	$OpDisponible = 1;
	$OpPrestado = 2;
	$OpMantenimiento = 3;


  	$datosJson = '

  		{
  			"data":[';

	 	for($i = 0; $i < count($productos); $i++){

			
			/*=============================================
  			AGREGAR ETIQUETAS DE ESTADO
			=============================================*/
			  
			if($productos[$i]["estado"] == 0){

				$operatividad = "<button class='btn btn-xs btnBaja btn-danger' idCodArticulo='".$productos[$i]["idArticulo"]."' estadoCodArticulo='".$OpDisponible."'>Baja</button>";
				$mantenimiento = "<button class='btn btn-xs btn-secondary'>No Disponible</button>";
				$estado = "<button class='btn btn-xs btn-secondary'>No Disponible</button>";

			}else{

				if($productos[$i]["estado"] == 1){
					
					$operatividad = "<button class='btn btn-xs btnBaja btn-success' idCodArticulo='".$productos[$i]["idArticulo"]."' estadoCodArticulo='".$OpBaja."'>Activo</button>";
					$mantenimiento = "<button class='btn btn-xs btnMantenimiento btn-success' idCodArticulo='".$productos[$i]["idArticulo"]."' estadoCodArticulo='".$OpMantenimiento."'>Funcional</button>";
					$estado = "<button class='btn btn-xs btnPrestamo btn-success' idCodArticulo='".$productos[$i]["idArticulo"]."' estadoCodArticuloP='".$OpPrestado."'>Disponible</button>";
					
				}else if($productos[$i]["estado"] == 2){

					$operatividad = "<button class='btn btn-xs btnBaja btn-success'>Activo</button>";
					$mantenimiento = "<button class='btn btn-xs btnMantenimiento btn-success'>Funcional</button>";
					$estado = "<button class='btn btn-xs btnPrestamo btn-info' >Prestado</button>";

				}else if($productos[$i]["estado"] == 3){

					$operatividad = "<button class='btn btn-xs btnBaja btn-success' idCodArticulo='".$productos[$i]["idArticulo"]."' estadoCodArticulo='".$OpBaja."'>Activo</button>";
					$mantenimiento = "<button class='btn btn-xs btnMantenimiento btn-warning' idCodArticulo='".$productos[$i]["idArticulo"]."' estadoCodArticulo='".$OpDisponible."'>En Mantenimiento</button>";
					$estado = "<button class='btn btn-xs btnPrestamo btn-secondary' estadoCodArticuloP='".$OpPrestado."'>No Disponible</button>";

				}

			}

			/*=============================================
  			CODIGO NATURAL
			=============================================*/
			
			$cont = 1;
			for($j = $productos[$i]["idDetalleArticulo"];;$cont++){
				if($j<10){
					break;
				}
				$j = $j / 10;
			}
			if($cont==3){
				$codONE = "0";
			}else if($cont==2){
				$codONE = "00";
			}else if($cont==1){
				$codONE = "000";
			}

			$cont = 1;
			for($j = $productos[$i]["idArticulo"];;$cont++){
				if($j<10){
					break;
				}
				$j = $j / 10;
			}
			if($cont==3){
				$codTWO = "00";
			}else if($cont==2){
				$codTWO = "000";
			}else if($cont==4){
				$codTWO = "0";
			}else if($cont==1){
				$codTWO = "0000";
			}

			/*=============================================
  			TRAER LAS ACCIONES
			=============================================*/


			//$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarArticulo' idCodArticulo='".$productos[$i]["idArticulo"]."' data-toggle='modal' data-target='#modalEditarArticulo'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarArticulo' idCodArticulo='".$productos[$i]["idArticulo"]."' ><i class='fa fa-times'></i></button></div>";


			$acciones = "<div class='btn-group'><button class='btn btn-danger btnEliminarArticulo' idCodArticulo='".$productos[$i]["idArticulo"]."' rutaCodArticulo='".$CodPR."'><i class='fa fa-times'></i></button></div>";


			$datosJson .='[
					
					"'.($i+1).'",
					"'.$operatividad.'",
					"'.$mantenimiento.'",
					"'.$codONE.$productos[$i]["idDetalleArticulo"].$codTWO.$productos[$i]["idArticulo"].'",
					"'.$productos[$i]["codigoPatrimonial"].'",
					"'.$productos[$i]["fecha"].'",
					"'.$estado.'"	   

			],';

		}

		if($productos==null){
			$datosJson .='[
				
				"0",
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
ACTIVAR TABLA DE PRODUCTOS
=============================================*/

/*
$activarArticulo = new TablaArticulos();
$activarArticulo -> mostrarTablaArticulos($rutas[0]);
*/

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarArticulo = new TablaArticulos();


#CREAR PRODUCTO
#-----------------------------------------------------------
if(isset($_POST["action"])){

	$activarArticulo -> mostrarTablaArticulos($_POST["name"]);

}else{

	$activarArticulo -> mostrarTablaArticulos(122);

}

