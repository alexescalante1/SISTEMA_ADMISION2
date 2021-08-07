<?php

require_once "../controladores/inscripcion.controlador.php";
require_once "../modelos/inscripcion.modelo.php";

class AjaxInscripcion{

	/*=============================================
	GUARDAR INSCRIP
	=============================================*/

	public $idEvento;
	public $idAttAdmin;
	public $Tpostulante;
	public $Tpopcion;
	public $Tsopcion;

	public $dniT;
	public $nombreT;
	public $apellidoTP;
	public $apellidoTM;
	public $fechaTT;
	public $imagenfotoPerfilT;
	public $antiguafotoPerfilT;

	public $generoT;
	public $correoT;
	public $telefonoT1;
	public $telefonoT2;
	public $direccionT;
	public $departamentoT;
	public $provinciaT;
	public $distritoT;

	public $nombreR;
	public $dniR;
	public $correoR;
	public $Rparentesco;
	public $direccionR;
	public $telefonoR1;

	public $nombreCole;
	public $TEstAcademico;
	public $especialiAcadm;
	public $calAcadm;

	public $imagenfotoVaucherP;
	public $antiguafotoVaucherP;

	public function  ajaxCrearInscripcion(){

		$datos = array(
			"idAdmision"=>$this->idEvento,
			"idAdmin"=>$this->idAttAdmin,
			"Tpostulacion"=>$this->Tpostulante,
			"Popcion"=>$this->Tpopcion,
			"Sopcion"=>$this->Tsopcion,
			"dni"=>$this->dniT,
			"nombre"=>$this->nombreT,
			"apellidoPat"=>$this->apellidoTP,
			"apellidoMat"=>$this->apellidoTM,
			"fecha"=>$this->fechaTT,
			"foto"=>$this->imagenfotoPerfilT,
			"genero"=>$this->generoT,
			"correo"=>$this->correoT,
			"celularOne"=>$this->telefonoT1,
			"celularTwo"=>$this->telefonoT2,
			"direccion"=>$this->direccionT,
			"departamento"=>$this->departamentoT,
			"provincia"=>$this->provinciaT,
			"distrito"=>$this->distritoT,
			"representante"=>$this->nombreR,
			"dniR"=>$this->dniR,
			"correoR"=>$this->correoR,
			"parentescoR"=>$this->Rparentesco,
			"direccionR"=>$this->direccionR,
			"celularR"=>$this->telefonoR1,
			"colegio"=>$this->nombreCole,
			"Ctipo"=>$this->TEstAcademico,
			"Cespecialidad"=>$this->especialiAcadm,
			"Cnota"=>$this->calAcadm,
			"vaucher"=>$this->imagenfotoVaucherP
		);

		$respuesta = ControladorInscripcion::ctrCrearInscripcion($datos);
		
		echo $respuesta;

	}


	/*=============================================
	EDITAR INSCRIP
	=============================================*/	

	public function  ajaxEditarInscripcion(){

		$datos = array(
			"idInscrito"=>$this->idEvento,
			"idAdmin"=>$this->idAttAdmin,
			"Tpostulacion"=>$this->Tpostulante,
			"Popcion"=>$this->Tpopcion,
			"Sopcion"=>$this->Tsopcion,
			"dni"=>$this->dniT,
			"nombre"=>$this->nombreT,
			"apellidoPat"=>$this->apellidoTP,
			"apellidoMat"=>$this->apellidoTM,
			"fecha"=>$this->fechaTT,
			"foto"=>$this->imagenfotoPerfilT,
			"antiguaFoto"=>$this->antiguafotoPerfilT,
			"genero"=>$this->generoT,
			"correo"=>$this->correoT,
			"celularOne"=>$this->telefonoT1,
			"celularTwo"=>$this->telefonoT2,
			"direccion"=>$this->direccionT,
			"departamento"=>$this->departamentoT,
			"provincia"=>$this->provinciaT,
			"distrito"=>$this->distritoT,
			"representante"=>$this->nombreR,
			"dniR"=>$this->dniR,
			"correoR"=>$this->correoR,
			"parentescoR"=>$this->Rparentesco,
			"direccionR"=>$this->direccionR,
			"celularR"=>$this->telefonoR1,
			"colegio"=>$this->nombreCole,
			"Ctipo"=>$this->TEstAcademico,
			"Cespecialidad"=>$this->especialiAcadm,
			"Cnota"=>$this->calAcadm,
			"vaucher"=>$this->imagenfotoVaucherP,
			"antiguoVaucher"=>$this->antiguafotoVaucherP
		);

		$respuesta = ControladorInscripcion::ctrEditarInscripcion($datos);
	
		echo $respuesta;

	}

	
	/*=============================================
  	ACTIVAR INSCRIPC
 	=============================================*/	

	public function ajaxActivarInscripcion(){

		$tabla = "inscripciones";

		$item1 = "estado";
		$valor1 = $this->Tpopcion;

		$item2 = "idInscripcion";
		$valor2 = $this->idEvento;

		$respuesta = ModeloInscripcion::mdlActualizar($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}

	/*=============================================
	TRAER INSCRIPCION
	=============================================*/	

	public $Ttabla;
	public $Titem;
	public $TidV;

	public function ajaxTraer(){

		$tabla = $this->Ttabla;
		$item = $this->Titem;
		$valor = $this->TidV;

		$respuesta = ControladorInscripcion::ctrMostrarInfo($tabla, $item, $valor);

		echo json_encode($respuesta);

	}

 }


/**========================================================================================== */

















/*=============================================
INSCRIBIR POSTULANTE
=============================================*/	

if(isset($_POST["idIEvento"])){

	$inscr = new AjaxInscripcion();
	$inscr -> idEvento = $_POST["idIEvento"];
	$inscr -> idAttAdmin = $_POST["idAttAdmin"];
	$inscr -> Tpostulante = $_POST["Tpostulante"];
	$inscr -> Tpopcion = $_POST["Tpopcion"];
	$inscr -> Tsopcion = $_POST["Tsopcion"];
	$inscr -> dniT = $_POST["dniT"];
	$inscr -> nombreT = $_POST["nombreT"];
	$inscr -> apellidoTP = $_POST["apellidoTP"];
	$inscr -> apellidoTM = $_POST["apellidoTM"];
	$inscr -> fechaTT = $_POST["fechaTT"];
	if(isset($_FILES["imagenfotoPerfilT"])){
		$inscr -> imagenfotoPerfilT = $_FILES["imagenfotoPerfilT"];
	}else{
		$inscr -> imagenfotoPerfilT = null;
	}
	$inscr -> generoT = $_POST["generoT"];
	$inscr -> correoT = $_POST["correoT"];
	$inscr -> telefonoT1 = $_POST["telefonoT1"];
	$inscr -> telefonoT2 = $_POST["telefonoT2"];
	$inscr -> direccionT = $_POST["direccionT"];
	$inscr -> departamentoT = $_POST["departamentoT"];
	$inscr -> provinciaT = $_POST["provinciaT"];
	$inscr -> distritoT = $_POST["distritoT"];
	$inscr -> nombreR = $_POST["nombreR"];
	$inscr -> dniR = $_POST["dniR"];
	$inscr -> correoR = $_POST["correoR"];
	$inscr -> Rparentesco = $_POST["Rparentesco"];
	$inscr -> direccionR = $_POST["direccionR"];
	$inscr -> telefonoR1 = $_POST["telefonoR1"];
	$inscr -> nombreCole = $_POST["nombreCole"];
	$inscr -> TEstAcademico = $_POST["TEstAcademico"];
	$inscr -> especialiAcadm = $_POST["especialiAcadm"];
	$inscr -> calAcadm = $_POST["calAcadm"];
	if(isset($_FILES["imagenfotoVaucherP"])){
		$inscr -> imagenfotoVaucherP = $_FILES["imagenfotoVaucherP"];
	}else{
		$inscr -> imagenfotoVaucherP = null;
	}

	$inscr -> ajaxCrearInscripcion();

}


/*=============================================
EDITAR POSTULANTE
=============================================*/
if(isset($_POST["idInscrito"])){

	$Einsc = new AjaxInscripcion();
	$Einsc -> idEvento = $_POST["idInscrito"];
	$Einsc -> idAttAdmin = $_POST["idAttAdmin"];
	$Einsc -> Tpostulante = $_POST["Tpostulante"];
	$Einsc -> Tpopcion = $_POST["Tpopcion"];
	$Einsc -> Tsopcion = $_POST["Tsopcion"];
	$Einsc -> dniT = $_POST["dniT"];
	$Einsc -> nombreT = $_POST["nombreT"];
	$Einsc -> apellidoTP = $_POST["apellidoTP"];
	$Einsc -> apellidoTM = $_POST["apellidoTM"];
	$Einsc -> fechaTT = $_POST["fechaTT"];
	if(isset($_FILES["imagenfotoPerfilT"])){
		$Einsc -> imagenfotoPerfilT = $_FILES["imagenfotoPerfilT"];
	}else{
		$Einsc -> imagenfotoPerfilT = null;
	}
	$Einsc -> antiguafotoPerfilT = $_POST["antiguafotoPerfilT"];

	$Einsc -> generoT = $_POST["generoT"];
	$Einsc -> correoT = $_POST["correoT"];
	$Einsc -> telefonoT1 = $_POST["telefonoT1"];
	$Einsc -> telefonoT2 = $_POST["telefonoT2"];
	$Einsc -> direccionT = $_POST["direccionT"];
	$Einsc -> departamentoT = $_POST["departamentoT"];
	$Einsc -> provinciaT = $_POST["provinciaT"];
	$Einsc -> distritoT = $_POST["distritoT"];
	$Einsc -> nombreR = $_POST["nombreR"];
	$Einsc -> dniR = $_POST["dniR"];
	$Einsc -> correoR = $_POST["correoR"];
	$Einsc -> Rparentesco = $_POST["Rparentesco"];
	$Einsc -> direccionR = $_POST["direccionR"];
	$Einsc -> telefonoR1 = $_POST["telefonoR1"];
	$Einsc -> nombreCole = $_POST["nombreCole"];
	$Einsc -> TEstAcademico = $_POST["TEstAcademico"];
	$Einsc -> especialiAcadm = $_POST["especialiAcadm"];
	$Einsc -> calAcadm = $_POST["calAcadm"];
	if(isset($_FILES["imagenfotoVaucherP"])){
		$Einsc -> imagenfotoVaucherP = $_FILES["imagenfotoVaucherP"];
	}else{
		$Einsc -> imagenfotoVaucherP = null;
	}
	$Einsc -> antiguafotoVaucherP = $_POST["antiguafotoVaucherP"];


	$Einsc -> ajaxEditarInscripcion();

}


/*=============================================
ACTIVAR INSCRIP
=============================================*/	

if(isset($_POST["activarInscrip"])){
	
	$actI = new AjaxInscripcion();
	$actI -> Tpopcion = $_POST["activarInscrip"];
	$actI -> idEvento = $_POST["activarIdI"];
	$actI -> ajaxActivarInscripcion();

}


/*=============================================
TRAER INSCRIPCION
=============================================*/
if(isset($_POST["Ttabla"])){

	$traerI = new AjaxInscripcion();
	$traerI -> Ttabla = $_POST["Ttabla"];
	$traerI -> Titem = $_POST["Titem"];
	$traerI -> TidV = $_POST["TidV"];
	$traerI -> ajaxTraer();

}
