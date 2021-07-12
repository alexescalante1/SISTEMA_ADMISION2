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
	CREAR SOL
	=============================================*/

	static public function mdlIngresarSol($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(num, sol, idExamen) VALUES (:num, :sol, :idExamen)");

		$stmt->bindParam(":num", $datos["num"], PDO::PARAM_STR);
		$stmt->bindParam(":sol", $datos["sol"], PDO::PARAM_STR);
		$stmt->bindParam(":idExamen", $datos["idExamen"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	CREAR EJERCICIOS
	=============================================*/

	static public function mdlIngresarEjerc($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(num, descripcion, Ra, Rb, Rc, Rd, Re, idExamen) VALUES (:num, :descripcion, :Ra, :Rb, :Rc, :Rd, :Re, :idExamen)");

		$stmt->bindParam(":num", $datos["num"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":Ra", $datos["Ra"], PDO::PARAM_STR);
		$stmt->bindParam(":Rb", $datos["Rb"], PDO::PARAM_STR);
		$stmt->bindParam(":Rc", $datos["Rc"], PDO::PARAM_STR);
		$stmt->bindParam(":Rd", $datos["Rd"], PDO::PARAM_STR);
		$stmt->bindParam(":Re", $datos["Re"], PDO::PARAM_STR);
		$stmt->bindParam(":idExamen", $datos["idExamen"], PDO::PARAM_STR);

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

}