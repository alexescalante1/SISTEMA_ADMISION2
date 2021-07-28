<?php

class ControladorAdmision{

	/*=============================================
	MOSTRAR GENERAL
	=============================================*/
	
	static public function ctrMostrar($tabla, $item, $valor){

		$respuesta = ModeloAdmision::mdlMostrar($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR ESPECIALIDAD
	=============================================*/
	
	static public function ctrMostrarAdmision($item, $valor){

		$tabla = "eventoadmision";

		$respuesta = ModeloAdmision::mdlMostrarEventos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR INFOADMISION
	=============================================*/

	static public function ctrMostrarInfoAdmision($item, $valor){

		$tabla = "eventoadmision";

		$respuesta = ModeloAdmision::mdlMostrarInfoAdmision($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrMostrarEspecialidad($item, $valor){

		$tabla = "especialidad";

		$respuesta = ModeloAdmision::mdlMostrarEspecialidad($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CREAR EVENTO
	=============================================*/

	static public function ctrCrearEvento($datos){
		
		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloEvento"])){

			$datosE = array(
				"titulo"=>$datos["tituloEvento"],
				"ruta"=>$datos["rutaEvento"]
			);

			$respuesta = ModeloAdmision::mdlIngresarEvento("eventoadmision", $datosE);

			return $respuesta;

		}else{

			echo'<script>

				swal({
						type: "error",
						title: "¡La evento no puede ir vacía o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						})

			</script>';

			return;

		}

	}
	/*=============================================
	CREAR ESPECIALIDAD
	=============================================*/

	static public function ctrCrearEspecialidad($datos){
		
		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloEspecialidad"])){

			$datos = array(
				"titulo"=>$datos["tituloEspecialidad"]
			);

			$respuesta = ModeloAdmision::mdlIngresarEspecialidad("especialidad", $datos);

			return $respuesta;

		}else{

			echo'<script>

				swal({
						type: "error",
						title: "¡La especialidad no puede ir vacía o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						})

			</script>';

			return;

		}

	}

	/*=============================================
	CREAR SOL
	=============================================*/

	static public function ctrCrearSol($datos){
		
		$datos = array(
			"num"=>$datos["num"],
			"sol"=>$datos["sol"],
			"idExamen"=>$datos["idExamen"]
		);

		$respuesta = ModeloAdmision::mdlIngresarSol("solucion", $datos);

		return $respuesta;

	}

	/*=============================================
	CREAR EJERCICIOS
	=============================================*/

	static public function ctrCrearEjerc($datos){
		
		/*$datos = array(
			"num"=>$datos["num"],
			"descripcion"=>$datos["descripcion"],
			"Ra"=>$datos["Ra"],
			"Rb"=>$datos["Rb"],
			"Rc"=>$datos["Rc"],
			"Rd"=>$datos["Rd"],
			"Re"=>$datos["Re"],
			"idExamen"=>$datos["idExamen"]
		);*/

		$respuesta = ModeloAdmision::mdlIngresarEjerc("problemas", $datos);

		return $respuesta;

	}

	/*=============================================
	CREAR TIPO PRUEBA
	=============================================*/

	static public function ctrCrearPrueba($datos){
		
		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["titulo"])){
			
			$datosAr = array(
				"titulo"=>$datos["titulo"],
				"cantidad"=>60,
				"idAdmision"=>$datos["idAdmision"]
			);

			$respuesta = ModeloAdmision::mdlIngresarTipoPrueb("examen", $datosAr);

			return $respuesta;

		}else{

			echo'<script>

				swal({
						type: "error",
						title: "¡El titulo no puede ir vacía o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						})

			</script>';

			return;

		}

	}

	/*=============================================
	VALIDAR
	=============================================*/
	static public function ctrValidar($tabla, $item, $valor){

		$respuesta = ModeloAdmision::mdlValidar($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR ESPECIALIDAD
	=============================================*/

	static public function ctrEditarEspecialidad($datos){

		if(isset($datos["idEspecialidad"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloEspecialidad"])){

				$datosEsp = array(
					"idEspecialidad"=>$datos["idEspecialidad"],
					"tituloEspecialidad"=>$datos["tituloEspecialidad"]
				);

				$respuesta = ModeloAdmision::mdlEditarEspecialidad("especialidad", $datosEsp);

				return $respuesta;

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El campo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "evento";

							}
						})

			  	</script>';

			}

		}
		
	}

	/*=============================================
	ELIMINAR EXAM TIPO
	=============================================*/

	static public function ctrEliminarTipoP($datos){

		if(isset($datos["idExamen"])){

			$respuesta = ModeloAdmision::mdlEliminarTipoP("examen", $datos["idExamen"]);

			return "ok";

		}

	}

	/*=============================================
	ELIMINAR SOLUCION
	=============================================*/

	static public function ctrEliminarSol($datos){

		if(isset($datos["idExamen"])){

			$respuesta = ModeloAdmision::mdlEliminarTipoP("solucion", $datos["idExamen"]);

			return "ok";

		}

	}
	
	/*=============================================
	ELIMINAR SOLUCION
	=============================================*/

	static public function ctrEliminarEjer($datos){

		if(isset($datos["idExamen"])){

			$respuesta = ModeloAdmision::mdlEliminarTipoP("problemas", $datos["idExamen"]);

			return "ok";

		}

	}

	/*=============================================
	EDITAR CUPOS ESPECIALIDAD
	=============================================*/

	static public function ctrEditarCuposEspeci($datos){
		
		if(isset($datos["idCupos"])){

				$datosCup = array(
						"idCupos"=>$datos["idCupos"],
						"cupoBeca"=>$datos["cupoBeca"],
						"cupoNormal"=>$datos["cupoNormal"],
						"puntaje"=>$datos["puntaje"]
				);

				$respuesta = ModeloAdmision::mdlEditarCuposEspeci("cupos", $datosCup);

				return $respuesta;

		}
		
	}

	/*=============================================
	EDITAR FECHA EVENTO
	=============================================*/

	static public function ctrEditarFechaEvent($datos){
		
		if(isset($datos["idAdmision"])){

				$datosF = array(
					"idAdmision"=>$datos["idAdmision"],
					"finit"=>$datos["finit"],
					"ffin"=>$datos["ffin"]
				);

				$respuesta = ModeloAdmision::mdlEditarFEvento("eventoadmision", $datosF);

				return $respuesta;

		}
		
	}

}