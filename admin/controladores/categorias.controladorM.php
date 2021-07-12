<?php

class ControladorCategoria{

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarCategoria($item, $valor){

		$tabla = "categoria";

		$respuesta = ModeloCategoria::mdlMostrarCategoria($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrValidarCategoria($item, $valor){

		$tabla = "categoria";

		$respuesta = ModeloCategoria::mdlValidarCategoria($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearCategoria($datos){
		
		if(isset($datos["tituloCategoriaM"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloCategoriaM"])){

				$datos = array(
					"ruta"=>$datos["rutaCategoriaM"],
					"titulo"=>$datos["tituloCategoriaM"]
				);

				$respuesta = ModeloCategoria::mdlIngresarCategoriaM("categoria", $datos);

				return $respuesta;

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

			  	return;

			}

		}

	}




	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarCategoriaM($datos){

		if(isset($datos["idCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["tituloCategoriaM"])){

				$datosCategoria = array(
								"idCategoria"=>$datos["idCategoria"],
								"tituloCategoriaM"=>$datos["tituloCategoriaM"],
								"rutaCategoriaM"=>$datos["rutaCategoriaM"]
				);

				$respuesta = ModeloCategoria::mdlEditarCategoriaM("categoria", $datosCategoria);

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
	ELIMINAR CATEGORIA
	=============================================*/

	static public function ctrEliminarCategoria(){

		if(isset($_GET["idCategoriaM"])){

			/*=============================================
			QUITAR LAS CATEGORIAS DE LOS PRODUCTOS
			=============================================*/
			/*
			$traerProductos = ModeloProductos::mdlMostrarProductos("productos", "id_categoria", $_GET["idCategoria"]);

			if($traerProductos){

				foreach ($traerProductos as $key => $value) {

					$item1 = "id_categoria";
					$valor1 = 0;
					$item2 = "id";
					$valor2 = $value["id"];

					ModeloProductos::mdlActualizarProductos("productos", $item1, $valor1, $item2, $valor2);	
				
				}

			}
			*/
			$respuesta = ModeloCategoria::mdlEliminarCategoria("categoria", $_GET["idCategoriaM"]);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La categoría ha sido borrada correctamente",
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


}