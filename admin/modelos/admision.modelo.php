<?php

require_once "conexion.php";

class ModeloAdmision{
	
	/*=============================================
	MOSTRAR GENERAL
	=============================================*/
	static public function mdlMostrar($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		
		$stmt = null;
	
	}

	/*=============================================
	MOSTRAR RES INGRESANTES
	=============================================*/
	static public function mdlMostrarResIngresant($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT res.idRespuestas,res.pnts,res.valid,res.idEspIngreso,inscr.Tpostulacion,inscr.Popcion,inscr.Sopcion, postul.dni, postul.nombre,postul.apellidoPat,postul.apellidoMat FROM $tabla res INNER JOIN inscripciones inscr ON res.idInscripcion = inscr.idInscripcion INNER JOIN postulante postul ON inscr.idPostulante = postul.idPostulante WHERE res.$item = :$item");
			
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		
		$stmt = null;
	
	}

	/*=============================================
	MOSTRAR RES INGRESANTES
	=============================================*/
	static public function mdlMostrarIngresantEspc($tabla, $item, $valor, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("SELECT res.pnts,res.valid,inscr.idAdmision,inscr.idPostulante, postul.dni, postul.nombre,postul.apellidoPat,postul.apellidoMat,inscr.fecha FROM $tabla res INNER JOIN inscripciones inscr ON res.idInscripcion = inscr.idInscripcion INNER JOIN postulante postul ON inscr.idPostulante = postul.idPostulante WHERE res.$item = :$item AND res.$item2 = :$item2 ORDER BY res.pnts DESC");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
		
		$stmt = null;
	
	}

	/*=============================================
	MOSTRAR REPORTE POSTUL
	=============================================*/
	static public function mdlMostrarReportPostul($item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT insc.Tpostulacion,esp.titulo,esptwo.titulo,insc.vaucher,insc.estado,insc.fecha,insc.idInscripcion,postul.dni,postul.nombre,postul.apellidoPat,postul.apellidoMat,postul.foto,postdeta.genero,postdeta.correo,postdeta.celularOne,postdeta.celularTwo,postdeta.direccion,postdeta.departamento,postdeta.provincia,postdeta.distrito,postdeta.representante,postdeta.dniR,postdeta.correoR,postdeta.parentescoR,postdeta.direccionR,postdeta.celularR,postdeta.colegio,postdeta.Ctipo,postdeta.Cespecialidad,postdeta.Cnota FROM inscripciones insc INNER JOIN postulante postul ON insc.idPostulante = postul.idPostulante INNER JOIN postulantedetalle postdeta ON postul.idPostulante = postdeta.idPostulante INNER JOIN especialidad esp ON esp.idEspecialidad = insc.Popcion INNER JOIN especialidad esptwo ON esptwo.idEspecialidad = insc.Sopcion WHERE insc.$item = :$item");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
		
		$stmt = null;
	
	}

	/*=============================================
	MOSTRAR INFOARTICULO
	=============================================*/

	static public function mdlMostrarInfoAdmision($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR
	=============================================*/
	static public function mdlMostrarEventos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idAdmision DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		
		$stmt = null;
	
	}

	static public function mdlMostrarEspecialidad($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY titulo ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		
		$stmt = null;
	
	}

	/*=============================================
	ACTUALIZAR
	=============================================*/

	static public function mdlActualizar($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;
		
	}

	/*=============================================
	CREAR EVENTO
	=============================================*/

	static public function mdlIngresarEvento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ruta, titulo) VALUES (:ruta, :titulo)");

		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);

		if($stmt->execute()){

			$stmt2 = Conexion::conectar()->prepare("SELECT MAX(idAdmision) AS id FROM eventoadmision");
			
			$stmt2 -> execute();

			return $stmt2 -> fetch();
	
			$stmt2 -> close();
	
			$stmt2 = null;
			//return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	CREAR CUPOS
	=============================================*/

	static public function mdlIngresarCupos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idEspecialidad, idAdmision) VALUES (:idEspecialidad, :idAdmision)");

		$stmt->bindParam(":idEspecialidad", $datos["idEspecialidad"], PDO::PARAM_STR);
		$stmt->bindParam(":idAdmision", $datos["idAdmision"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	CREAR ESPECIALIDAD
	=============================================*/

	static public function mdlIngresarEspecialidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(titulo) VALUES (:titulo)");

		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	CREAR RESPUESTAS POST
	=============================================*/

	static public function mdlIngresarRespP($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(pnts, datos, idExam, valid, idEspIngreso, idAdmision, idInscripcion) VALUES (:pnts, :datos, :idExam, :valid, :idEspIngreso, :idAdmision, :idInscripcion)");

		$stmt->bindParam(":pnts", $datos["pnts"], PDO::PARAM_STR);
		$stmt->bindParam(":datos", $datos["datos"], PDO::PARAM_STR);
		$stmt->bindParam(":idExam", $datos["idExam"], PDO::PARAM_STR);
		$stmt->bindParam(":valid", $datos["valid"], PDO::PARAM_STR);
		$stmt->bindParam(":idEspIngreso", $datos["idEspIngreso"], PDO::PARAM_STR);
		$stmt->bindParam(":idAdmision", $datos["idAdmision"], PDO::PARAM_STR);
		$stmt->bindParam(":idInscripcion", $datos["idInscripcion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	VALIDAR
	=============================================*/

	static public function mdlValidar($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
		
		$stmt = null;
	
	}

	/*=============================================
	EDITAR ESPECIALIDAD
	=============================================*/

	static public function mdlEditarEspecialidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo WHERE idEspecialidad = :idEspecialidad");

		$stmt->bindParam(":titulo", $datos["tituloEspecialidad"], PDO::PARAM_STR);
		$stmt -> bindParam(":idEspecialidad", $datos["idEspecialidad"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR ESTADO INGRESO
	=============================================*/

	static public function mdlActualizarEstIngreso($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1, $item2 = :$item2 WHERE $item3 = :$item3");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;
		
	}
	
	/*=============================================
	ELIMINAR TIPO PRUEBA
	=============================================*/

	static public function mdlEliminarTipoP($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idExamen = :idExamen");

		$stmt -> bindParam(":idExamen", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CUPOS ESPECIALIDAD
	=============================================*/

	static public function mdlEditarCuposEspeci($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cupoBeca = :cupoBeca, cupoNormal = :cupoNormal, puntaje = :puntaje WHERE idCupos = :idCupos");

		$stmt -> bindParam(":idCupos", $datos["idCupos"], PDO::PARAM_INT);
		$stmt->bindParam(":cupoBeca", $datos["cupoBeca"], PDO::PARAM_STR);
		$stmt->bindParam(":cupoNormal", $datos["cupoNormal"], PDO::PARAM_STR);
		$stmt->bindParam(":puntaje", $datos["puntaje"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR FECHA EVENTO
	=============================================*/

	static public function mdlEditarFEvento($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET finit = :finit, ffin = :ffin WHERE idAdmision = :idAdmision");

		$stmt -> bindParam(":idAdmision", $datos["idAdmision"], PDO::PARAM_INT);
		$stmt->bindParam(":finit", $datos["finit"], PDO::PARAM_STR);
		$stmt->bindParam(":ffin", $datos["ffin"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	CREAR TIPO PRUEBA
	=============================================*/

	static public function mdlIngresarTipoPrueb($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(titulo, cantidad, idAdmision) VALUES (:titulo, :cantidad, :idAdmision)");

		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":idAdmision", $datos["idAdmision"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	CODIGO INGRESANTES
	=============================================*/

	static public function mdlContarIngresantes($tabla, $expre, $item, $valor, $item2, $valor2, $item3, $valor3){

		//$stmt = Conexion::conectar()->prepare("SELECT count(*) FROM $tabla WHERE $item = :$item");
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE $item $expre :$item AND $item2 = :$item2 AND $item3 = :$item3");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR INGRESANTES RESTANTES
	=============================================*/
	static public function mdlMostrarIngresantRest($tabla, $item, $valor, $item2, $valor2, $base){

		$stmt = Conexion::conectar()->prepare("SELECT res.idRespuestas,res.pnts,res.valid,inscr.Sopcion FROM $tabla res INNER JOIN inscripciones inscr ON res.idInscripcion = inscr.idInscripcion WHERE res.$item = :$item AND res.$item2 = :$item2 ORDER BY res.pnts DESC LIMIT $base, 500");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
		
		$stmt = null;
	
	}

}