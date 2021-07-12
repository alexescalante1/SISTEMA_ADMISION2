<?php

class ControladorArticulos{

	/*=============================================
	MOSTRAR INFOARTICULOS
	=============================================*/

	static public function ctrMostrarInfoArticulo($item, $valor){

		$tabla = "detallearticulo";

		$respuesta = ModeloArticulos::mdlMostrarInfoArticulo($tabla, $item, $valor);

		return $respuesta;

	}
	
	/*=============================================
	MOSTRAR TOTAL ARTICULOS
	=============================================*/

	static public function ctrMostrarTotalArticulos($orden){

		$tabla = "detallearticulo";

		$respuesta = ModeloArticulos::mdlMostrarTotalArticulos($tabla, $orden);

		return $respuesta;

	}


	/*=============================================
	MOSTRAR 5 ULTIMOS ARTICULOS
	=============================================*/

	static public function ctrMostrarUltimosArticulos($orden, $tope){

		$tabla = "detallearticulo";

		$respuesta = ModeloArticulos::mdlMostrarUltimosArticulos($tabla, $orden, $tope);

		return $respuesta;

	}

	

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/

	static public function ctrMostrarSumaVentas(){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);

		return $respuesta;

	}


	/*=============================================
	MOSTRAR ARTICULOS
	=============================================*/

	static public function ctrMostrarArticulos($item, $valor){

		$tabla = "detallearticulo";

		$respuesta = ModeloArticulos::mdlMostrarArticulos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR ARTICULOS
	=============================================*/

	static public function ctrMostrarCodArticulos($item, $valor){

		$tabla = "articulos";

		$respuesta = ModeloArticulos::mdlMostrarArticulos($tabla, $item, $valor);

		return $respuesta;
	
	}


	/*=============================================
	MOSTRAR COD ARTICULOS DISPONIBLES
	=============================================*/

	static public function ctrMostrarCodArticulosDisponibles($item, $valor){

		$tabla = "articulos";

		$respuesta = ModeloArticulos::mdlMostrarArticulosDisponibles($tabla, $item, $valor);

		return $respuesta;
	
	}
















	/*=============================================
	SUBIR MULTIMEDIA
	=============================================*/

	static public function ctrSubirMultimedia($datos, $ruta){

		if(isset($datos["tmp_name"]) && !empty($datos["tmp_name"])){

			/*=============================================
			DEFINIMOS LAS MEDIDAS
			=============================================*/

			list($ancho, $alto) = getimagesize($datos["tmp_name"]);	

			$nuevoAncho = 1000;
			$nuevoAlto = 1000;

			/*=============================================
			CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DE LA MULTIMEDIA
			=============================================*/

			$directorio = "../vistas/img/multimedia/".$ruta;

			/*=============================================
			PRIMERO PREGUNTAMOS SI EXISTE UN DIRECTORIO DE MULTIMEDIA CON ESTA RUTA
			=============================================*/

			if (!is_dir($directorio)){
				
				error_reporting(0);
				$crear = mkdir($directorio, 0777, true);
				
			}

			/*=============================================
			DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
			=============================================*/

			if($datos["type"] == "image/jpeg"){

				/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				$rutaMultimedia = $directorio."/".$datos["name"];

				$origen = imagecreatefromjpeg($datos["tmp_name"]);						

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $rutaMultimedia);

			}

			if($datos["type"] == "image/png"){

				/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				$rutaMultimedia = $directorio."/".$datos["name"];

				$origen = imagecreatefrompng($datos["tmp_name"]);						

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagealphablending($destino, FALSE);
		
				imagesavealpha($destino, TRUE);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagepng($destino, $rutaMultimedia);

			}

			return $rutaMultimedia;	

		}

	}






	/*=============================================
	CREAR PRODUCTOS
	=============================================*/


	static public function ctrCrearArticulo($datos){

		date_default_timezone_set('America/Lima');

		$fechaAct = date('Y-m-d H:i:s');

		if(isset($datos["tituloArticulo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloArticulo"]) && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionArticulo"]) ){

				/*=============================================
				VALIDAR IMAGEN PRINCIPAL
				=============================================*/

				$rutaFotoPrincipal = "../vistas/img/productos/default/default.jpg";

				if(isset($datos["fotoPrincipal"]["tmp_name"]) && !empty($datos["fotoPrincipal"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($datos["fotoPrincipal"]["tmp_name"]);	

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPrincipal"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../vistas/img/productos/".$datos["rutaArticulo"].".jpg";

						$origen = imagecreatefromjpeg($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaFotoPrincipal);

					}

					if($datos["fotoPrincipal"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../vistas/img/productos/".$datos["rutaArticulo"].".png";

						$origen = imagecreatefrompng($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
				
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaFotoPrincipal);

					}

				}

				$datosProducto = array(
						"titulo"=>$datos["tituloArticulo"],
						"idCategoria"=>$datos["categoria"],
						"multimedia"=>$datos["multimedia"],
						"ruta"=>$datos["rutaArticulo"],
						"descripcion"=> $datos["descripcionArticulo"],
						"palabrasClave"=> $datos["pClavesArticulo"],
						"prestados"=> 0,
						"precio"=> $datos["precio"],
						"peso"=> $datos["peso"],
						"disponible"=> $datos["disponible"],
						"fechact"=> $fechaAct,
						"imgFotoPrincipal"=>substr($rutaFotoPrincipal,3)
				);

				$respuesta = ModeloArticulos::mdlIngresarArticulo("detallearticulo", $datosProducto);

				return $respuesta;
				

			}else{

					echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre del producto no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';



			}
		
		}

	}

























	/*=============================================
	EDITAR ARTICULOS
	=============================================*/

	static public function ctrEditarArticulo($datos){

		if(isset($datos["idArticulo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloArticulo"])  && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionArticulo"]) ){

				/*=============================================
				ELIMINAR LAS FOTOS DE MULTIMEDIA DE LA CARPETA
				=============================================*/

				$item = "idDetalleArticulo";
				$valor = $datos["idArticulo"];

				$traerProductos = ModeloArticulos::mdlMostrarArticulos("detallearticulo", $item, $valor);

				foreach ($traerProductos as $key => $value) {
				
					$multimediaBD = json_decode($value["multimedia"],true);
					$multimediaEditar = json_decode($datos["multimedia"],true);

					$objectMultimediaBD = array();
					$objectMultimediaEditar = array();

					foreach ($multimediaBD as $key => $value) {

						array_push($objectMultimediaBD, $value["foto"]);

					}

					foreach ($multimediaEditar as $key => $value) {

						array_push($objectMultimediaEditar, $value["foto"]);

					}

					$borrarFoto = array_diff($objectMultimediaBD, $objectMultimediaEditar);

					foreach ($borrarFoto as $key => $value) {
						
						unlink("../".$value);

					}

				}

				/*=============================================
				VALIDAR IMAGEN PRINCIPAL
				=============================================*/

				$rutaFotoPrincipal = "../".$datos["antiguaFotoPrincipalA"];

				if(isset($datos["fotoPrincipal"]["tmp_name"]) && !empty($datos["fotoPrincipal"]["tmp_name"])){

					/*=============================================
					BORRAMOS ANTIGUA FOTO PRINCIPAL
					=============================================*/

					unlink("../".$datos["antiguaFotoPrincipalA"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($datos["fotoPrincipal"]["tmp_name"]);	

					$nuevoAncho = 500;
					$nuevoAlto = 500;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPrincipal"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../vistas/img/productos/".$datos["rutaArticulo"].".jpg";

						$origen = imagecreatefromjpeg($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaFotoPrincipal);

					}

					if($datos["fotoPrincipal"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../vistas/img/productos/".$datos["rutaArticulo"].".png";

						$origen = imagecreatefrompng($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
				
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaFotoPrincipal);

					}

				}
				
		
				$datosArticulo = array(
								"idDetalleArticulo"=>$datos["idArticulo"],
								"tituloArticulo"=>$datos["tituloArticulo"],
								"rutaArticulo"=>$datos["rutaArticulo"],
								"idCategoria"=>$datos["categoria"],
								"descripcionArticulo"=>$datos["descripcionArticulo"],
								"pClavesArticulo"=>$datos["pClavesArticulo"],
								"multimedia"=>$datos["multimedia"],
								"precio"=> $datos["precio"],
								"peso"=> $datos["peso"],
								"disponible"=> $datos["disponible"],
								"imgFotoPrincipal"=>substr($rutaFotoPrincipal,3)
								);


				$respuesta = ModeloArticulos::mdlEditarArticulo("detallearticulo", $datosArticulo);

				return $respuesta;


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre del producto no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "articulos";

							}
						})

			  	</script>';

			}

		}
		
	}
















	/*=============================================
	ELIMINAR PRODUCTO
	=============================================*/

	static public function ctrEliminarArticulo(){

		if(isset($_GET["idArticulo"])){

			$datos = $_GET["idArticulo"];

			/*=============================================
			ELIMINAR MULTIMEDIA
			=============================================*/

			$borrar = glob("vistas/img/multimedia/".$_GET["rutaCabecera"]."/*");

				foreach($borrar as $file){

					unlink($file);

				}

			rmdir("vistas/img/multimedia/".$_GET["rutaCabecera"]);

			/*=============================================
			ELIMINAR FOTO PRINCIPAL
			=============================================*/

			if($_GET["imgPrincipal"] != "" && $_GET["imgPrincipal"] != "vistas/img/productos/default/default.jpg"){

				unlink($_GET["imgPrincipal"]);		

			}

			$respuesta = ModeloArticulos::mdlEliminarArticulo("detallearticulo", $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El articulo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "articulos";

								}
							})

				</script>';

			}		



		}

	}

























	/*=============================================
	CREAR CODIGOS
	=============================================*/

	static public function ctrCrearCodPatrimonial($idDetArt, $codi){

		date_default_timezone_set('America/Lima');

		$fechaAct = date('Y-m-d H:i:s');
		
		if(isset($codi)){

			if(preg_match('/^[a-zA-Z0-9]+$/', $codi)){

				$datosINGR = array(
					"estado"=> 1,
					"codigoPatrimonial"=>$codi,
					"idDetalleArticulo"=>$idDetArt,
					"fechact"=>$fechaAct
				);

				$respuesta = ModeloArticulos::mdlIngresarCodigoPatrimonial("articulos", $datosINGR);

				return $respuesta;

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La codigo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

			  	return;

			}

		}

	}








	/*=============================================
	ELIMINAR COD ART
	=============================================*/

	static public function ctrEliminarCodArticulo(){

		if(isset($_GET["idCodArticulo"])){

			$respuesta = ModeloArticulos::mdlEliminarCodArticulo("articulos", $_GET["idCodArticulo"]);
			
			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El codigo se ha eliminado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "'.$_GET["rutaCodArt"].'";

								}
							})

				</script>';

			}		


		}

	}








	/*=============================================
	CONT CODIGOS
	=============================================*/

	static public function ctrContarCodArticulos($item, $valor, $item2, $valor2){

		$tabla = "articulos";

		$respuesta = ModeloArticulos::mdlContarCodArticulos($tabla, $item, $valor, $item2, $valor2);

		return $respuesta;
	
	}

































	/*=============================================
	CREAR PRESTAMOS
	=============================================*/

	static public function ctrCrearPrestamo($datos){

		if(isset($datos["nombrePrestamista"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $datos["nombrePrestamista"])){

				$datosPrestamo = array(
						"nombrePrestamista"=>$datos["nombrePrestamista"],
						"nombreUsuario"=>$datos["nombreUsuario"],
						"codUsuario"=>$datos["codUsuario"],
						"selecDiasPrestamo"=>$datos["selecDiasPrestamo"],
						"estado"=>1,
						"idDetalleArticulo"=>$datos["idDetalleArticulo"]
				);

				$respuesta = ModeloArticulos::mdlIngresarPrestamo("prestamos", $datosPrestamo);

				return $respuesta;

			}else{

					echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre del prestamista contiene caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "prestar";

							}
						})

			  	</script>';

			}
		
		}

	}


	/*=============================================
	CREAR PRESTAMOS COD
	=============================================*/

	static public function ctrCrearPrestamoCod($datos){

		if(isset($datos["idPrestamo"])){

			$datosPrestamoC = array(
					"idPrestamo"=>$datos["idPrestamo"],
					"idArticulo"=>$datos["idArticulo"],
					"codPatrimonial"=>$datos["codPatrimonial"]
			);

			$respuesta = ModeloArticulos::mdlIngresarPrestamoCod("prestamosarticulos", $datosPrestamoC);

			return $respuesta;
		
		}

	}


	/*=============================================
	MOSTRAR PRESTAMOS
	=============================================*/

	static public function ctrMostrarPrestamos($item, $valor){

		$tabla = "prestamos";

		$respuesta = ModeloArticulos::mdlMostrarPrestamos($tabla, $item, $valor);

		return $respuesta;
	
	}


	/*=============================================
	BUSCAR ARTICULOS
	=============================================*/

	static public function ctrBuscarPrestamo($item, $valor){

		$tabla = "prestamos";

		$respuesta = ModeloArticulos::mdlBuscarPrestamo($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	CONT COD PRESTADOS
	=============================================*/

	static public function ctrContarCodIdPrestamo($item, $valor){

		$tabla = "prestamosarticulos";

		$respuesta = ModeloArticulos::mdlContarCodIdPrestamo($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR ARTICULOS
	=============================================*/

	static public function ctrMostrarArticulosCodPrestados($item, $valor){

		$tabla = "prestamosarticulos";

		$respuesta = ModeloArticulos::mdlMostrarArticulosCodPrestados($tabla, $item, $valor);

		return $respuesta;
	
	}


	/*=============================================
	ELIMINAR COD IDPRESTAMO
	=============================================*/

	static public function ctrEliminarCodIdPrestamo($idPrestamo){

			$respuesta = ModeloArticulos::mdlEliminarCodIdPrestamo("prestamosarticulos", $idPrestamo);
			
			return $respuesta;

	}


	
}