/*=============================================
ACTIVAR PERFIL
=============================================*/
$("#tablaAdmin").on("click", ".btnActivar", function(){

	var idPerfil = $(this).attr("idPerfil");
	var estadoPerfil = $(this).attr("estadoPerfil");

	var datos = new FormData();
 	datos.append("activarId", idPerfil);
  	datos.append("activarPerfil", estadoPerfil);

  	$.ajax({

	  url:"ajax/administradores.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){
      	console.log("respuesta", respuesta);
      }

  	})

  	if(estadoPerfil == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoPerfil',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoPerfil',0);

  	}

})

/*=============================================
SUBIENDO LA FOTO DEL PERFIL
=============================================*/
$(".nuevaFoto").change(function(){

  var imagen = this.files[0];
  
  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

      $(".nuevaFoto").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG o PNG!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else if(imagen["size"] > 2000000){

      $(".nuevaFoto").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen no debe pesar más de 2MB!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else{

      var datosImagen = new FileReader;
      datosImagen.readAsDataURL(imagen);

      $(datosImagen).on("load", function(event){

        var rutaImagen = event.target.result;

        $(".previsualizar").attr("src", rutaImagen);

      })

    }
})

/*=============================================
EDITAR PERFIL
=============================================*/
$("#tablaAdmin").on("click", ".btnEditarPerfil", function(){

  var idPerfil = $(this).attr("idPerfil");

  var datos = new FormData();
  datos.append("idPerfil", idPerfil);

  $.ajax({

    url:"ajax/administradores.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 

      $("#editarDNI").val(respuesta["dniAdmin"]);
      $("#editarNombre").val(respuesta["nombre"]);
      $("#idPerfil").val(respuesta["id"]);
      $("#editarEmail").val(respuesta["email"]);
      $("#editarPerfil").html(respuesta["perfil"]);
      $("#editarPerfil").val(respuesta["perfil"]);
      $("#fotoActual").val(respuesta["foto"]);
      $("#passwordActual").val(respuesta["password"]);

      if(respuesta["foto"] != ""){

        $(".previsualizar").attr("src", respuesta["foto"]);

      }

    }


  })


})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$("#tablaAdmin").on("click", ".btnEliminarPerfil", function(){

  var idPerfil = $(this).attr("idPerfil");
  var fotoPerfil = $(this).attr("fotoPerfil");

  Swal.fire({
		title: 'Esta Seguro?',
		text: "¡Si no lo está puede cancelar la accíón!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, Borrar!'
	  }).then((result) => {
		if (result.isConfirmed) {

			var datos = new FormData();
			datos.append("idEliAdminA", idPerfil);
      datos.append("fotoPerfilA", fotoPerfil);
			$.ajax({
				url:"ajax/administradores.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(rsp){
					if(rsp == "ok"){
						Swal.fire({
							title: 'Se ha Borrado Correctamente',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Continuar'
						  }).then((result) => {
                if (result.isConfirmedo) {
                  window.location = "perfiles";
                }
						  })

					}else{
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Algo Salio Mal!'
						  })
					}
									
				}
	
			})
		
		}
	})

})
