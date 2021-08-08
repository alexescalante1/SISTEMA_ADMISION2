<?php

class ControladorInscripcion{

	static public function ctrMostrar($tabla, $ordenar, $item, $valor, $base, $tope, $modo){

		$respuesta = ModeloInscripcion::mdlMostrar($tabla, $ordenar, $item, $valor, $base, $tope, $modo);

		return $respuesta;
	}

	static public function ctrMostrarM($tabla, $ordenar, $item, $valor, $modo){

		$respuesta = ModeloInscripcion::mdlMostrarM($tabla, $ordenar, $item, $valor, $modo);

		return $respuesta;
	}

	static public function ctrMostrarInfo($tabla, $item, $valor){

		$respuesta = ModeloInscripcion::mdlMostrarInfo($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrCrearInscripcion($datos){
		
		$fotoT = "url";
		$Vaucher = "url";

		$datosIP = array(
			"dni"=>$datos["dni"],
			"nombre"=>$datos["nombre"],
			"apellidoPat"=>$datos["apellidoPat"],
			"apellidoMat"=>$datos["apellidoMat"],
			"fecha"=>$datos["fecha"],
			"foto"=>$fotoT
		);

		$respuesta = ModeloInscripcion::mdlIngresarInscripcion("postulante", $datosIP);

		if($respuesta[0]){

			/*=============================================
			VALIDAR IMAGEN PRINCIPAL
			=============================================*/

			$rutaFotoPrincipal = "../vistas/img/postulantes/default/anonymous.png";

			if(isset($datos["foto"]["tmp_name"]) && !empty($datos["foto"]["tmp_name"])){

				/*=============================================
				DEFINIMOS LAS MEDIDAS
				=============================================*/

				list($ancho, $alto) = getimagesize($datos["foto"]["tmp_name"]);	

				$nuevoAncho = 800;
				$nuevoAlto = 800;

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($datos["foto"]["type"] == "image/jpeg"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$rutaFotoPrincipal = "../vistas/img/postulantes/".$respuesta[0].$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($datos["foto"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $rutaFotoPrincipal);

				}

				if($datos["foto"]["type"] == "image/png"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$rutaFotoPrincipal = "../vistas/img/postulantes/".$respuesta[0].$aleatorio.".png";

					$origen = imagecreatefrompng($datos["foto"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
			
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $rutaFotoPrincipal);

				}

			}

			ModeloInscripcion::mdlActualizar("postulante", "foto",substr($rutaFotoPrincipal,3), "idPostulante", $respuesta[0]);



			$datosIPD = array(
				"idPostulante"=>$respuesta[0],
				"genero"=>$datos["genero"],
				"correo"=>$datos["correo"],
				"celularOne"=>$datos["celularOne"],
				"celularTwo"=>$datos["celularTwo"],
				"direccion"=>$datos["direccion"],
				"departamento"=>$datos["departamento"],
				"provincia"=>$datos["provincia"],
				"distrito"=>$datos["distrito"],
				"representante"=>$datos["representante"],
				"dniR"=>$datos["dniR"],
				"correoR"=>$datos["correoR"],
				"parentescoR"=>$datos["parentescoR"],
				"direccionR"=>$datos["direccionR"],
				"celularR"=>$datos["celularR"],
				"colegio"=>$datos["colegio"],
				"Ctipo"=>$datos["Ctipo"],
				"Cespecialidad"=>$datos["Cespecialidad"],
				"Cnota"=>$datos["Cnota"]
			);

			$respuesta2 = ModeloInscripcion::mdlIngresarInscripcionDetalle("postulantedetalle", $datosIPD);

			if($respuesta2 == "ok"){

				$datosIIS = array(
					"Tpostulacion"=>$datos["Tpostulacion"],
					"Popcion"=>$datos["Popcion"],
					"Sopcion"=>$datos["Sopcion"],
					"vaucher"=>$Vaucher,
					"estado"=>1,
					"idAdmision"=>$datos["idAdmision"],
					"idPostulante"=>$respuesta[0],
					"idAdmin"=>$datos["idAdmin"]
				);

				$respuesta3 = ModeloInscripcion::mdlIngresarInscripcionCentral("inscripciones", $datosIIS);


					/*=============================================
					VALIDAR IMAGEN VAUCHER
					=============================================*/

					$rutaFotoVaucher = "../vistas/img/vaucher/default/Default.png";

					if(isset($datos["vaucher"]["tmp_name"]) && !empty($datos["vaucher"]["tmp_name"])){

						/*=============================================
						DEFINIMOS LAS MEDIDAS
						=============================================*/

						list($ancho, $alto) = getimagesize($datos["vaucher"]["tmp_name"]);	

						$nuevoAncho = 800;
						$nuevoAlto = 800;

						/*=============================================
						DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
						=============================================*/

						if($datos["vaucher"]["type"] == "image/jpeg"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/

							$aleatorio = mt_rand(100,999);

							$rutaFotoVaucher = "../vistas/img/vaucher/".$respuesta3[0].$aleatorio.".jpg";

							$origen = imagecreatefromjpeg($datos["vaucher"]["tmp_name"]);						

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagejpeg($destino, $rutaFotoVaucher);

						}

						if($datos["vaucher"]["type"] == "image/png"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/

							$aleatorio = mt_rand(100,999);

							$rutaFotoVaucher = "../vistas/img/vaucher/".$respuesta3[0].$aleatorio.".png";

							$origen = imagecreatefrompng($datos["vaucher"]["tmp_name"]);						

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagealphablending($destino, FALSE);
					
							imagesavealpha($destino, TRUE);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagepng($destino, $rutaFotoVaucher);

						}

					}

				$RESPTA	= ModeloInscripcion::mdlActualizar("inscripciones", "vaucher",substr($rutaFotoVaucher,3), "idInscripcion", $respuesta3[0]);

				return $RESPTA;
			}

		}else{
			return "error";
		}
		

	}


	static public function ctrEditarInscripcion($datos){
		
		$traer = ModeloInscripcion::mdlMostrarInfo("inscripciones", "idInscripcion", $datos["idInscrito"]);
		
		/*=============================================
		VALIDAR IMAGEN VAUCHER
		=============================================*/

		$rutaFotoVaucher = "../".$datos["antiguoVaucher"];

		if(isset($datos["vaucher"]["tmp_name"]) && !empty($datos["vaucher"]["tmp_name"])){

			/*=============================================
			BORRAMOS ANTIGUA FOTO PRINCIPAL
			=============================================*/

			unlink("../".$datos["antiguoVaucher"]);

			/*=============================================
			DEFINIMOS LAS MEDIDAS
			=============================================*/

			list($ancho, $alto) = getimagesize($datos["vaucher"]["tmp_name"]);	

			$nuevoAncho = 800;
			$nuevoAlto = 800;


			/*=============================================
			DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
			=============================================*/

			if($datos["vaucher"]["type"] == "image/jpeg"){

				/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				$aleatorio = mt_rand(100,999);

				$rutaFotoVaucher = "../vistas/img/vaucher/".$datos["idInscrito"].$aleatorio.".jpg";

				$origen = imagecreatefromjpeg($datos["vaucher"]["tmp_name"]);						

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $rutaFotoVaucher);

			}

			if($datos["vaucher"]["type"] == "image/png"){

				/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				$aleatorio = mt_rand(100,999);

				$rutaFotoVaucher = "../vistas/img/vaucher/".$datos["idInscrito"].$aleatorio.".png";

				$origen = imagecreatefrompng($datos["vaucher"]["tmp_name"]);						

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagealphablending($destino, FALSE);
		
				imagesavealpha($destino, TRUE);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagepng($destino, $rutaFotoVaucher);

			}

		}

		$datosIIS = array(
			"idInscripcion"=>$datos["idInscrito"],
			"Tpostulacion"=>$datos["Tpostulacion"],
			"Popcion"=>$datos["Popcion"],
			"Sopcion"=>$datos["Sopcion"],
			"vaucher"=>substr($rutaFotoVaucher,3),
			"idAdmin"=>$datos["idAdmin"]
		);

		$respuesta3 = ModeloInscripcion::mdlEditarInscripcionCentral("inscripciones", $datosIIS);


		if($respuesta3 == "ok"){


			/*=============================================
			VALIDAR IMAGEN VAUCHER
			=============================================*/

			$rutaFotoPrincipal = "../".$datos["antiguaFoto"];

			if(isset($datos["foto"]["tmp_name"]) && !empty($datos["foto"]["tmp_name"])){

				/*=============================================
				BORRAMOS ANTIGUA FOTO PRINCIPAL
				=============================================*/

				unlink("../".$datos["antiguaFoto"]);

				/*=============================================
				DEFINIMOS LAS MEDIDAS
				=============================================*/

				list($ancho, $alto) = getimagesize($datos["foto"]["tmp_name"]);	

				$nuevoAncho = 800;
				$nuevoAlto = 800;


				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($datos["foto"]["type"] == "image/jpeg"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$rutaFotoPrincipal = "../vistas/img/postulantes/".$traer["idPostulante"].$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($datos["foto"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $rutaFotoPrincipal);

				}

				if($datos["foto"]["type"] == "image/png"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$rutaFotoPrincipal = "../vistas/img/postulantes/".$traer["idPostulante"].$aleatorio.".png";

					$origen = imagecreatefrompng($datos["foto"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
			
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $rutaFotoPrincipal);

				}

			}


			$datosIP = array(
				"idPostulante"=>$traer["idPostulante"],
				"dni"=>$datos["dni"],
				"nombre"=>$datos["nombre"],
				"apellidoPat"=>$datos["apellidoPat"],
				"apellidoMat"=>$datos["apellidoMat"],
				"fecha"=>$datos["fecha"],
				"foto"=>substr($rutaFotoPrincipal,3)
			);
	
			$respuesta = ModeloInscripcion::mdlEditarInscripcion("postulante", $datosIP);

			if($respuesta == "ok"){

				$datosIPD = array(
					"idPostulante"=>$traer["idPostulante"],
					"genero"=>$datos["genero"],
					"correo"=>$datos["correo"],
					"celularOne"=>$datos["celularOne"],
					"celularTwo"=>$datos["celularTwo"],
					"direccion"=>$datos["direccion"],
					"departamento"=>$datos["departamento"],
					"provincia"=>$datos["provincia"],
					"distrito"=>$datos["distrito"],
					"representante"=>$datos["representante"],
					"dniR"=>$datos["dniR"],
					"correoR"=>$datos["correoR"],
					"parentescoR"=>$datos["parentescoR"],
					"direccionR"=>$datos["direccionR"],
					"celularR"=>$datos["celularR"],
					"colegio"=>$datos["colegio"],
					"Ctipo"=>$datos["Ctipo"],
					"Cespecialidad"=>$datos["Cespecialidad"],
					"Cnota"=>$datos["Cnota"]
				);
	
				$respuesta2 = ModeloInscripcion::mdlEditarInscripcionDetalle("postulantedetalle", $datosIPD);
	
				return $respuesta2;

			}

		}
		
	}
}