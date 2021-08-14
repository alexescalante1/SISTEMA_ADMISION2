<?php



require_once "../controladores/admision.controlador.php";
require_once "../modelos/admision.modelo.php";

class AjaxAdmision{
	
	/*=============================================
  	ACTIVAR ADMISION
 	=============================================*/	

 	public $activarAdmision;
	public $activarIdAd;

	public function ajaxActivarAdmision(){

		$tabla = "eventoadmision";

		$item1 = "estado";
		$valor1 = $this->activarAdmision;

		$item2 = "idAdmision";
		$valor2 = $this->activarIdAd;

		$respuesta = ModeloAdmision::mdlActualizar($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}


	/*=============================================
  	ACTIVAR DARK
 	=============================================*/	

	public function ajaxActivarDark(){

		session_start();

		$tabla = "administradores";
		
		$item1 = "dark";
		if($_SESSION["estiloPantalla"] == 1){
			
			$valor1 = 0;
			$_SESSION["estiloPantalla"] = 0;

		}else{

			$valor1 = 1;
			$_SESSION["estiloPantalla"] = 1;

		}
		

		$item2 = "id";
		$valor2 = $this->activarIdAd;

		$respuesta = ModeloAdmision::mdlActualizar($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}


	/*=============================================
	GUARDAR EVENTO
	=============================================*/	
	public $tituloEvento;
	public $rutaEvento;
	public $idEvento;

	public function  ajaxCrearEvento(){

		$datos = array(
			"tituloEvento"=>$this->tituloEvento,
			"rutaEvento"=>$this->rutaEvento
		);

		$respuesta = ControladorAdmision::ctrCrearEvento($datos);
		$especialidad = ControladorAdmision::ctrMostrarEspecialidad(null, null);

		for($i = 0; $i < count($especialidad); $i++){

			$datos = array(
				"idAdmision"=>$respuesta[0],
				"idEspecialidad"=>$especialidad[$i]["idEspecialidad"]
			);
			ModeloAdmision::mdlIngresarCupos("cupos", $datos);

		}

		echo $respuesta[0];

	}

	/*=============================================
	VALIDAR NO REPETIR EVENTO
	=============================================*/	

	public $validarAdmision;

	public function ajaxValidarAdmision(){

		$tabla = "eventoadmision";
		$item = "titulo";
		$valor = $this->validarAdmision;
		$respuesta = ControladorAdmision::ctrValidar($tabla,$item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	GUARDAR ESPECIALIDAD
	=============================================*/	
	public $tituloEspecialidad;
	public $idEspecialidad;

	public function  ajaxCrearEspecialidad(){

		$datos = array(
			"tituloEspecialidad"=>$this->tituloEspecialidad
			);

		$respuesta = ControladorAdmision::ctrCrearEspecialidad($datos);

		echo $respuesta;

	}

	/*=============================================
	TRAER ESPECIALIDAD
	=============================================*/	

	public function ajaxTraerEspecialidad(){

		$item = "idEspecialidad";
		$valor = $this->idEspecialidad;
		$respuesta = ControladorAdmision::ctrMostrarEspecialidad($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	TRAER TIPO EXAM
	=============================================*/	

	public function ajaxTraerTExam(){

		$item = "idExamen";
		$valor = $this->idEspecialidad;
		$respuesta = ModeloAdmision::mdlMostrar("examen",$item, $valor);
		echo json_encode($respuesta);

	}

	/*=============================================
	VALIDAR NO REPETIR ESPECIALIDAD
	=============================================*/	

	public $validarEspecialidad;

	public function ajaxValidarEspecialidad(){

		$tabla = "especialidad";
		$item = "titulo";
		$valor = $this->validarEspecialidad;
		$respuesta = ControladorAdmision::ctrValidar($tabla, $item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR ESPECIALIDAD
	=============================================*/	

	public function  ajaxEditarEspecialidad(){

		$datos = array(
			"idEspecialidad"=>$this->idEspecialidad,
			"tituloEspecialidad"=>$this->tituloEspecialidad
		);
		$respuesta = ControladorAdmision::ctrEditarEspecialidad($datos);
	
		echo $respuesta;

	}


	/*=============================================
	EDITAR CUPOS ESPECIALIDAD
	=============================================*/	
	public $idcupos;
	public $cupbeca;
	public $cupnormal;
	public $puntaje;

	public function  ajaxEditarCuposEspeci(){

		$datos = array(
			"idCupos"=>$this->idcupos,
			"cupoBeca"=>$this->cupbeca,
			"cupoNormal"=>$this->cupnormal,
			"puntaje"=>$this->puntaje
			);

		$respuesta = ControladorAdmision::ctrEditarCuposEspeci($datos);
	
		echo $respuesta;

	}

	/*=============================================
	EDITAR FECHAS EVENTO
	=============================================*/	
	public $idEAdm;
	public $Mfini;
	public $Mffin;

	public function  ajaxMEAdmision(){

		$datos = array(
			"idAdmision"=>$this->idEAdm,
			"finit"=>$this->Mfini,
			"ffin"=>$this->Mffin
			);

		$respuesta = ControladorAdmision::ctrEditarFechaEvent($datos);
	
		echo $respuesta;

	}


	/*=============================================
	GUARDAR PRUEBA
	=============================================*/	
	public $tituloPrueb;
	public $idEAdmision;

	public function  ajaxCrearPrueba(){

		$datos = array(
			"titulo"=>$this->tituloPrueb,
			"idAdmision"=>$this->idEAdmision
		);

		$respuesta = ControladorAdmision::ctrCrearPrueba($datos);

		echo $respuesta;

	}

	/*=============================================
	ELIM EXAM TIPO
	=============================================*/	
	public $idEprueba;

	public function  ajaxElimExa(){

		$datos = array(
			"idExamen"=>$this->idEprueba
		);

		$respuesta = ControladorAdmision::ctrEliminarTipoP($datos);

		echo $respuesta;

	}

	/*=============================================
  	CAMBIAR CANT EXAM
 	=============================================*/	
	public $Lproblemas;
	public function ajaxCamCantidad(){

		$tabla = "examen";

		$item1 = "cantidad";
		$valor1 = $this->activarAdmision;
		$item2 = "idExamen";
		$valor2 = $this->activarIdAd;
		$respuesta = ModeloAdmision::mdlActualizar($tabla, $item1, $valor1, $item2, $valor2);
		
		$item1 = "problemas";
		$valor1 = $this->Lproblemas;
		$respuesta = ModeloAdmision::mdlActualizar($tabla, $item1, $valor1, $item2, $valor2);
		echo $respuesta;

	}


	/*=============================================
	GUARDAR RESPUESTAS
	=============================================*/	
	public $ptosEx;
	public $datosProb;

	public function  ajaxIngresarResp(){

		$datos = array(
			"pnts"=>$this->ptosEx,
			"datos"=>$this->datosProb,
			"idExam"=>$this->idEprueba,
			"valid"=>0,
			"idEspIngreso"=>0,
			"idAdmision"=>$this->idEAdm,
			"idInscripcion"=>$this->idEspecialidad
		);

		$respuesta = ControladorAdmision::ctrCrearRespP($datos);

		echo $respuesta;

	}


}


/**========================================================================================== */




















/*=============================================
ACTIVAR ADMISION
=============================================*/	

if(isset($_POST["activarAdmision"])){
	
	$activarAdmisi = new AjaxAdmision();
	$activarAdmisi -> activarAdmision = $_POST["activarAdmision"];
	$activarAdmisi -> activarIdAd = $_POST["activarIdAd"];
	$activarAdmisi -> ajaxActivarAdmision();

}

/*=============================================
ACTIVAR ADMISION
=============================================*/	

if(isset($_POST["idAdmin"])){
	
	$activarD = new AjaxAdmision();
	$activarD -> activarIdAd = $_POST["idAdmin"];
	$activarD -> ajaxActivarDark();

}


/*=============================================
CAMBIAR CANTIDAD EXAM
=============================================*/	

if(isset($_POST["idCExam"])){
	
	$cnExam = new AjaxAdmision();
	$cnExam -> activarAdmision = $_POST["cantida"];
	$cnExam -> activarIdAd = $_POST["idCExam"];
	$cnExam -> Lproblemas = $_POST["problemas"];
	$cnExam -> ajaxCamCantidad();

}

#CREAR EVENTO
#-----------------------------------------------------------
if(isset($_POST["tituloEvento"])){

	$evento = new AjaxAdmision();
	$evento -> tituloEvento = $_POST["tituloEvento"];
	$evento -> rutaEvento = $_POST["rutaEvento"];
	$evento -> ajaxCrearEvento();

}

#CREAR ESPECIALIDAD
#-----------------------------------------------------------
if(isset($_POST["tituloEspecialidad"])){

	$especialidad = new AjaxAdmision();
	$especialidad -> tituloEspecialidad = $_POST["tituloEspecialidad"];

	$especialidad -> ajaxCrearEspecialidad();

}

#CREAR TIPO PRUEBA
#-----------------------------------------------------------
if(isset($_POST["tituloPrueb"])){

	$prueb = new AjaxAdmision();
	$prueb -> tituloPrueb = $_POST["tituloPrueb"];
	$prueb -> idEAdmision = $_POST["idEAdmision"];
	$prueb -> ajaxCrearPrueba();

}

/*=============================================
TRAER ESPECIALIDAD
=============================================*/
if(isset($_POST["idEspecialidad"])){

	$traerEspecialidad = new AjaxAdmision();
	$traerEspecialidad -> idEspecialidad = $_POST["idEspecialidad"];
	$traerEspecialidad -> ajaxTraerEspecialidad();

}

/*=============================================
VALIDAR NO REPETIR ADMISION
=============================================*/

if(isset($_POST["validarAdmision"])){

	$valAdmisi = new AjaxAdmision();
	$valAdmisi -> validarAdmision = $_POST["validarAdmision"];
	$valAdmisi -> ajaxValidarAdmision();

}

/*=============================================
VALIDAR NO REPETIR ESPECIALIDAD
=============================================*/

if(isset($_POST["validarEspecialidad"])){

	$valEspeci = new AjaxAdmision();
	$valEspeci -> validarEspecialidad = $_POST["validarEspecialidad"];
	$valEspeci -> ajaxValidarEspecialidad();

}

/*=============================================
EDITAR ESPECIALIDAD
=============================================*/
if(isset($_POST["idE"])){

	$editarEspecialidad = new AjaxAdmision();
	$editarEspecialidad -> idEspecialidad = $_POST["idE"];
	$editarEspecialidad -> tituloEspecialidad = $_POST["editarEspecialidad"];
	$editarEspecialidad -> ajaxEditarEspecialidad();

}


/*=============================================
EDITAR CUPOS ESPECIALIDAD
=============================================*/
if(isset($_POST["idCupEspecialidad"])){

	$editarCup = new AjaxAdmision();
	$editarCup -> idcupos = $_POST["idCupEspecialidad"];
	$editarCup -> cupbeca = $_POST["cbeca"];
	$editarCup -> cupnormal = $_POST["cnormal"];
	$editarCup -> puntaje = $_POST["cpuntaje"];

	$editarCup -> ajaxEditarCuposEspeci();

}

/*=============================================
ELIMINAR EXAM
=============================================*/
if(isset($_POST["idEprueba"])){

	$elimEx = new AjaxAdmision();
	$elimEx -> idEprueba = $_POST["idEprueba"];
	$elimEx -> ajaxElimExa();

}

/*=============================================
VER TIPO EXAMEN
=============================================*/
if(isset($_POST["idVExam"])){

	$Ex = new AjaxAdmision();
	$Ex -> idEspecialidad = $_POST["idVExam"];
	$Ex -> ajaxTraerTExam();

}

/*=============================================
EDIT FECHA EVENTO
=============================================*/
if(isset($_POST["MidEAdmi"])){

	$MeAd = new AjaxAdmision();
	$MeAd -> idEAdm = $_POST["MidEAdmi"];
	$MeAd -> Mfini = $_POST["Finit"];
	$MeAd -> Mffin = $_POST["Ffin"];
	$MeAd -> ajaxMEAdmision();

}


/*=============================================
INGRESAR RESPUESTAS
=============================================*/
if(isset($_POST["ptosEx"])){

	$inRes = new AjaxAdmision();
	$inRes -> ptosEx = $_POST["ptosEx"];
	$inRes -> datosProb = $_POST["datosProb"];
	$inRes -> idEprueba = $_POST["idExam"];
	$inRes -> idEAdm = $_POST["idAdmision"];
	$inRes -> idEspecialidad = $_POST["idInscripcion"];
	$inRes -> ajaxIngresarResp();

}

