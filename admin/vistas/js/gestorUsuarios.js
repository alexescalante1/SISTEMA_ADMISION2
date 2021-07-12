/*=============================================
CARGAR LA TABLA DINÁMICA DE USUARIOS
=============================================*/

// $.ajax({

// 	url:"ajax/tablaUsuarios.ajax.php",
// 	success:function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	}

// })

/*=============================================
ACTIVAR USUARIO
=============================================*/

$(".tablaUsuarios tbody").on("click", ".btnActivar", function(){

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
 	datos.append("activarId", idUsuario);
  	datos.append("activarUsuario", estadoUsuario);

  	$.ajax({

  		 url:"ajax/usuarios.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	    
      	    // console.log("respuesta", respuesta);

      	} 	 

  	});

  	if(estadoUsuario == 1){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoUsuario',0);
  	
  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoUsuario',1);

  	}

})



/*=============================================
VALIDAR EMAIL REPETIDO
=============================================*/

var validarUserI = false;

$("#regUser").change(function(){

	var validarUsuarioP = $("#regUser").val();

	var datos = new FormData();
	datos.append("validarUser", validarUsuarioP);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			
			console.log(respuesta);

			if(respuesta == "false"){

				$(".alert").remove();
				validarUserI = false;

			}else{
				
				$("#regUser").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> El usuario ya existe en la base de datos</div>')

				validarUserI = true;

			}

		}

	})

})





$("#regCodigo").change(function(){

	$(".alert").remove();

	var nombre = $("#regCodigo").val();
	
	if(nombre != ""){

		var expresion = /^[0-9]*$/;

		if(!expresion.test(nombre)){

			$("#regCodigo").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong>Solo se admite Numeros</div>')

			return false;

		}else if(nombre.length != 8){
			
			$("#regCodigo").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong>Solo Se admite 8 digitos</div>')

			return false;
		}

	}else{

		$("#regCodigo").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}

})

$("#regUsuario").change(function(){

	$(".alert").remove();

	var nombre = $("#regUsuario").val();

	if(nombre != ""){

		var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if(!expresion.test(nombre)){

			$("#regUsuario").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

			return false;

		}

	}else{

		$("#regUsuario").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}

})

$("#regUser").change(function(){

	$(".alert").remove();

	var nombre = $("#regUser").val();

	if(nombre != ""){

		var expresion = /^[a-zA-Z0-9]*$/;

		if(!expresion.test(nombre)){

			$("#regUser").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

			return false;

		}

	}else{

		$("#regUser").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}

})


$("#regEmail").change(function(){

	$(".alert").remove();

	var email = $("#regEmail").val();

	if(email != ""){

		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if(!expresion.test(email)){

			$("#regEmail").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> Escriba correctamente el correo electrónico</div>')

			return false;

		}


	}else{

		$("#regEmail").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}

})

$("#regPassword").change(function(){

	$(".alert").remove();

	var password = $("#regPassword").val();

	if(password != ""){

		var expresion = /^[a-zA-Z0-9]*$/;

		if(!expresion.test(password)){

			$("#regPassword").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

			return false;

		}

	}else{

		$("#regPassword").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;

	}

})













/*=============================================
VALIDAR EL REGISTRO DE USUARIO
=============================================*/
function registroUsuario(){

	$(".alert").remove();
	/*=============================================
	VALIDAR EL CODIGO
	=============================================*/

	var nombre = $("#regCodigo").val();
	
	if(nombre != ""){

		var expresion = /^[0-9]*$/;

		if(!expresion.test(nombre)){

			$("#regCodigo").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong>Solo se admite Numeros</div>')

			return false;

		}else if(nombre.length != 8){
			
			$("#regCodigo").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong>Solo Se admite 8 digitos</div>')

			return false;
		}

	}else{

		$("#regCodigo").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}
	
	/*=============================================
	VALIDAR EL NOMBRE
	=============================================*/

	var nombre = $("#regUsuario").val();

	if(nombre != ""){

		var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if(!expresion.test(nombre)){

			$("#regUsuario").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

			return false;

		}

	}else{

		$("#regUsuario").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}

	/*=============================================
	VALIDAR EL USER
	=============================================*/

	var nombre = $("#regUser").val();

	if(nombre != ""){

		var expresion = /^[a-zA-Z0-9]*$/;

		if(!expresion.test(nombre)){

			$("#regUser").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

			return false;

		}
		if(validarUserI == true){
			
			$("#regUser").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> El usuario ya existe en la base de datos</div>')

			return false;
		}

	}else{

		$("#regUser").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}

	/*=============================================
	VALIDAR EL EMAIL
	=============================================*/

	var email = $("#regEmail").val();

	if(email != ""){

		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if(!expresion.test(email)){

			$("#regEmail").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> Escriba correctamente el correo electrónico</div>')

			return false;

		}

	}else{

		$("#regEmail").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}


	/*=============================================
	VALIDAR CONTRASEÑA
	=============================================*/

	var password = $("#regPassword").val();

	if(password != ""){

		var expresion = /^[a-zA-Z0-9]*$/;

		if(!expresion.test(password)){

			$("#regPassword").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

			return false;

		}

	}else{

		$("#regPassword").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;

	}

	return true;
}
