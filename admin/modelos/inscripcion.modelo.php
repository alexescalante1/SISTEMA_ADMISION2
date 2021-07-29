<?php

require_once "conexion.php";

class ModeloInscripcion{

	/*=============================================
	MOSTRAR
	=============================================*/

	static public function mdlMostrar($tabla, $ordenar, $item, $valor, $base, $tope, $modo){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla WHERE $item = :$item ORDER BY $ordenar $modo LIMIT $base, $tope");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla ORDER BY $ordenar $modo LIMIT $base, $tope");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR GENERAL
	=============================================*/
	static public function mdlMostrarM($tabla, $ordenar, $item, $valor, $modo){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla WHERE $item = :$item ORDER BY $ordenar $modo");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla ORDER BY $ordenar $modo");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;
	
	}

	/*=============================================
	MOSTRAR INFO
	=============================================*/

	static public function mdlMostrarInfo($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	CREAR INSCRIP POSTU
	=============================================*/

	static public function mdlIngresarInscripcion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(dni, nombre, apellidoPat, apellidoMat, fecha, foto) VALUES (:dni, :nombre, :apellidoPat, :apellidoMat, :fecha, :foto)");

		$stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidoPat", $datos["apellidoPat"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidoMat", $datos["apellidoMat"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		if($stmt->execute()){

			$stmt2 = Conexion::conectar()->prepare("SELECT MAX(idPostulante) AS id FROM postulante");
			
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
	CREAR INSCRIP POSTU DETALLE
	=============================================*/

	static public function mdlIngresarInscripcionDetalle($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idPostulante, genero, correo, celularOne, celularTwo, direccion, departamento, provincia, distrito, representante, dniR, correoR, parentescoR, direccionR, celularR, colegio, Ctipo, Cespecialidad, Cnota) VALUES (:idPostulante, :genero, :correo, :celularOne, :celularTwo, :direccion, :departamento, :provincia, :distrito, :representante, :dniR, :correoR, :parentescoR, :direccionR, :celularR, :colegio, :Ctipo, :Cespecialidad, :Cnota)");

		$stmt->bindParam(":idPostulante", $datos["idPostulante"], PDO::PARAM_STR);
		$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":celularOne", $datos["celularOne"], PDO::PARAM_STR);
		$stmt->bindParam(":celularTwo", $datos["celularTwo"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
		$stmt->bindParam(":provincia", $datos["provincia"], PDO::PARAM_STR);
		$stmt->bindParam(":distrito", $datos["distrito"], PDO::PARAM_STR);
		$stmt->bindParam(":representante", $datos["representante"], PDO::PARAM_STR);
		$stmt->bindParam(":dniR", $datos["dniR"], PDO::PARAM_STR);
		$stmt->bindParam(":correoR", $datos["correoR"], PDO::PARAM_STR);
		$stmt->bindParam(":parentescoR", $datos["parentescoR"], PDO::PARAM_STR);
		$stmt->bindParam(":direccionR", $datos["direccionR"], PDO::PARAM_STR);
		$stmt->bindParam(":celularR", $datos["celularR"], PDO::PARAM_STR);
		$stmt->bindParam(":colegio", $datos["colegio"], PDO::PARAM_STR);
		$stmt->bindParam(":Ctipo", $datos["Ctipo"], PDO::PARAM_STR);
		$stmt->bindParam(":Cespecialidad", $datos["Cespecialidad"], PDO::PARAM_STR);
		$stmt->bindParam(":Cnota", $datos["Cnota"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
	
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	CREAR INSCRIPCION CENTRAL
	=============================================*/

	static public function mdlIngresarInscripcionCentral($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Tpostulacion, Popcion, Sopcion, vaucher, estado, idAdmision, idPostulante, idAdmin) VALUES (:Tpostulacion, :Popcion, :Sopcion, :vaucher, :estado, :idAdmision, :idPostulante, :idAdmin)");

		$stmt->bindParam(":Tpostulacion", $datos["Tpostulacion"], PDO::PARAM_STR);
		$stmt->bindParam(":Popcion", $datos["Popcion"], PDO::PARAM_STR);
		$stmt->bindParam(":Sopcion", $datos["Sopcion"], PDO::PARAM_STR);
		$stmt->bindParam(":vaucher", $datos["vaucher"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":idAdmision", $datos["idAdmision"], PDO::PARAM_STR);
		$stmt->bindParam(":idPostulante", $datos["idPostulante"], PDO::PARAM_STR);
		$stmt->bindParam(":idAdmin", $datos["idAdmin"], PDO::PARAM_STR);

		if($stmt->execute()){

			$stmt2 = Conexion::conectar()->prepare("SELECT MAX(idInscripcion) AS id FROM inscripciones");
			
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

}