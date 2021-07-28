

/*=============================================
ACTIVAR ADMISION
=============================================*/
$('#tablaAdmision').on("click", ".btnActivar", function(){

	var idAdmision = $(this).attr("idAdmision");
	var estadoAdmision = $(this).attr("estadoAdmision");
	
	var datos = new FormData();
 	datos.append("activarIdAd", idAdmision);
  	datos.append("activarAdmision", estadoAdmision);

  	$.ajax({

	  url:"ajax/admision.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){    

      }

  	})

	if(estadoAdmision == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('NO VISIBLE');
  		$(this).attr('estadoAdmision',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('VISIBLE');
  		$(this).attr('estadoAdmision',0);

  	}

})


/*=============================================
RUTA ARTICULO
=============================================*/

function limpiarURL(texto){
	var texto = texto.toLowerCase(); 
	texto = texto.replace(/[á]/, 'a');
	texto = texto.replace(/[é]/, 'e');
	texto = texto.replace(/[í]/, 'i');
	texto = texto.replace(/[ó]/, 'o');
	texto = texto.replace(/[ú]/, 'u');
	texto = texto.replace(/[ñ]/, 'n');
	texto = texto.replace(/ /g, "-")
	return texto;
}

$(".tituloAdmision").change(function(){
  
	  $(".rutaEvento").val(limpiarURL($(".tituloAdmision").val()));
  
})

/*=============================================
GUARDAR EVENTO
=============================================*/

$(".guardarEvento").click(function(){

	if($(".tituloAdmision").val() != ""){

		agregarEvento();

	}else{

		swal({
	      title: "Llenar todos los campos obligatorios",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;
	}

})

function agregarEvento(){

		var tituloEvento = $(".tituloAdmision").val();
		var rutaEvento = $(".rutaEvento").val();

	 	var datosEvento = new FormData();
		 datosEvento.append("tituloEvento", tituloEvento);
		 datosEvento.append("rutaEvento", rutaEvento);

		$.ajax({
				url:"ajax/admision.ajax.php",
				method: "POST",
				data: datosEvento,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					
					if(respuesta == "error"){
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Algo Salio Mal!'
						  })

					}else{

						Swal.fire({
							title: 'Se Guardo Correctamente',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Continuar'
						  }).then((result) => {
							if (result.isConfirmed) {
							  window.location = "evento";
							}
						  })

					}

				}

		})

}

/*=============================================
GUARDAR ESPECIALIDAD
=============================================*/

$(".guardarEspecialidad").click(function(){

	if($(".tituloEspecialidad").val() != ""){

		agregarEspecialidad();

	}else{

		swal({
	      title: "Llenar todos los campos obligatorios",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;
	}

})



function agregarEspecialidad(){

		var tituloEspecialidad = $(".tituloEspecialidad").val();

	 	var datosEspecialidad = new FormData();
		 datosEspecialidad.append("tituloEspecialidad", tituloEspecialidad);

		$.ajax({
				url:"ajax/admision.ajax.php",
				method: "POST",
				data: datosEspecialidad,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					
					if(respuesta == "ok"){

						Swal.fire({
							title: 'Se Guardo Correctamente',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Continuar'
						  }).then((result) => {
							if (result.isConfirmed) {
							  window.location = "evento";
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

/*=============================================
REVISAR SI EL TITULO DE LA ADMISION YA EXISTE
=============================================*/

$(".validarAdmision").change(function(){

	$(".alert").remove();

	var admisio = $(this).val();

	var datos = new FormData();
	datos.append("validarAdmision", admisio);

	 $.ajax({
	    url:"ajax/admision.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){

    		if(respuesta.length != 0){

    			$(".validarAdmision").parent().after('<div class="alert alert-warning">El título ya existe en la base de datos</div>');

	    		$(".validarAdmision").val("");

    		}

	    }

   	})

})

/*=============================================
REVISAR SI EL TITULO DE LA ESPECIALIDAD YA EXISTE
=============================================*/

$(".validarEspecialidad").change(function(){

	$(".alert").remove();
	var espe = $(this).val();
	
	var datos = new FormData();
	datos.append("validarEspecialidad", espe);

	 $.ajax({
	    url:"ajax/admision.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){

    		if(respuesta.length != 0){

    			$(".validarEspecialidad").parent().after('<div class="alert alert-warning">El título ya existe en la base de datos</div>');

	    		$(".validarEspecialidad").val("");

    		}

	    }

   	})

})

/*=============================================
EDITAR ESPECIALIDAD
=============================================*/

$('#tablaEspecialidad').on("click", ".btnEditarEspecialidad", function(){
	
	var idEspecialidaD = $(this).attr("idEspecialidad");
	
	var datos = new FormData();
	datos.append("idEspecialidad", idEspecialidaD);

	$.ajax({

		url:"ajax/admision.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#modalEditarEspecialidad .idEspecialidad").val(respuesta["idEspecialidad"]);
			$("#modalEditarEspecialidad .tituloEspecialidad").val(respuesta["titulo"]);

			/*=============================================
			GUARDAR CAMBIOS DE ESPECIALIDAD
			=============================================*/	

			$(".guardarCambiosEspecialidad").click(function(){
				
					/*=============================================
					PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
					=============================================*/
					
					if($("#modalEditarEspecialidad .tituloEspecialidad").val() != ""){
							
						editarEspecialidad();

					}else{

						 swal({
					      title: "Llenar todos los campos obligatorios",
					      type: "error",
					      confirmButtonText: "¡Cerrar!"
					    });

						return;

					}					

			})
					
		}

	})

})

function editarEspecialidad(){

	var idEspecialidaD = $("#modalEditarEspecialidad .idEspecialidad").val();
	var titulo = $("#modalEditarEspecialidad .tituloEspecialidad").val();

	var datos = new FormData();
	datos.append("idE", idEspecialidaD);
	datos.append("editarEspecialidad", titulo);

	$.ajax({
			url:"ajax/admision.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
									
				if(respuesta == "ok"){

					Swal.fire({
						title: 'Se Guardo Correctamente',
						icon: 'success',
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'Continuar'
					  }).then((result) => {
						if (result.isConfirmed) {
						  window.location = "evento";
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















/*=============================================
// FUNCIÓN PARA CAMBIAR HORARIO
=============================================*/

$("#guardarHorario").click(function(){

	const convertTime12to24 = (time12h) => {
		const [time, modifier] = time12h.split(' ');
		
		let [hours, minutes] = time.split(':');
		
		if (hours === '12') {
			hours = '00';
		}
		
		if (modifier === 'PM') {
			hours = parseInt(hours, 10) + 12;
		}
		
		return `${hours}:${minutes}:00`;
	}
	  
	

	var Hini = convertTime12to24($("#Hini").val());
	var Hfin = convertTime12to24($("#Hfin").val());

	console.log(Hini);
	console.log(Hfin);

})



var cantidadEspeciali = $("#cantEspe").val();
var idcupos;
var cupbeca;
var cupnormal;
var puntaje;

/*=============================================
GUARDAR LA INFORMACION ESPECIALIDADES
=============================================

$(".cambioInformacion").change(function(){

	for(var i=0;i<cantidadEspeciali;i++){
		idcupos = $("#idCupEspecialidad"+i).val();
		cupbeca = $("#cbeca"+i).val();
		cupnormal = $("#cnormal"+i).val();
		puntaje = $("#cpuntaje"+i).val();

		console.log(idcupos+" "+cupbeca+" "+cupnormal+" "+puntaje);
	}
	
})
*/


/*=============================================
// FUNCIÓN PARA CAMBIAR LA INFORMACIÓN
=============================================*/

$("#guardarCuposEspeci").click(function(){

	for(var i=0;i<cantidadEspeciali;i++){
		idcupos = $("#idCupEspecialidad"+i).val();
		cupbeca = $("#cbeca"+i).val();
		cupnormal = $("#cnormal"+i).val();
		puntaje = $("#cpuntaje"+i).val();

		
		cambiarCupEspecialidad();
	}

	
	var idEAdmis = $("#idEventAd").val();
	var FINIT = $("#FINIT").val();
    var FFINIT = moment(FINIT, "MM/DD/YYYY").format("YYYY-MM-DD");
	var FFIN = $("#FFIN").val();
    var FFFIN = moment(FFIN, "MM/DD/YYYY").format("YYYY-MM-DD");

	console.log(idEAdmis);
    console.log(FFINIT);
	console.log(FFFIN);

	var datosFec = new FormData();
	datosFec.append("MidEAdmi", idEAdmis);
	datosFec.append("Finit", FFINIT);
	datosFec.append("Ffin", FFFIN);
	$.ajax({

		url:"ajax/admision.ajax.php",
		method: "POST",
		data: datosFec,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			
			if(respuesta == "ok"){
				
				console.log("OKS");
			
			}
							
		}

	})


})

function cambiarCupEspecialidad(){
	
	//console.log(idcupos+" "+cupbeca+" "+cupnormal+" "+puntaje);

	var datos = new FormData();
	datos.append("idCupEspecialidad", idcupos);
	datos.append("cbeca", cupbeca);
	datos.append("cnormal", cupnormal);
	datos.append("cpuntaje", puntaje);
	$.ajax({

		url:"ajax/admision.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			
			if(respuesta == "ok"){
				
				console.log("OKA");
				Swal.fire({
					icon: 'success',
					title: 'Se Guardo Correctamente',
					showConfirmButton: false,
					timer: 1500
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


/*=============================================
GUARDAR TIPO PRUEBA
=============================================*/

$(".guardarTipoPrue").click(function(){

	if($(".tituloTipoPru").val() != ""){

		agregarTipoPrueba();

	}else{

		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Llenar Todos los Campos'
		  })

		return;
	}

})


function agregarTipoPrueba(){

		var tituloPrueb = $(".tituloTipoPru").val();
		var idEAdmision = $("#idEventAd").val();

	 	var datosPrue = new FormData();
		 datosPrue.append("tituloPrueb", tituloPrueb);
		 datosPrue.append("idEAdmision", idEAdmision);

		$.ajax({
				url:"ajax/admision.ajax.php",
				method: "POST",
				data: datosPrue,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					
					if(respuesta == "ok"){
						var ruta = $("#rutaEvent").val();
						
						Swal.fire({
							title: 'Se Guardo Correctamente',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Continuar'
						  }).then((result) => {
							if (result.isConfirmed) {
							  window.location = ruta;
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







/*=============================================
ELIMINAR TIPO PRUEBA
=============================================*/

$('.CloseB').on("click", ".botonCerrar", function(){

	var idss = $(this).attr("idprueba");

	console.log(idss);
	
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
			datos.append("idEprueba", idss);
			$.ajax({
	
				url:"ajax/admision.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(rsp){
					var ruta = $("#rutaEvent").val();
					if(rsp == "ok"){
	
						Swal.fire({
							title: 'Se ha Borrado Correctamente',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Continuar'
						  }).then((result) => {
							if (result.isConfirmed) {
							  window.location = ruta;
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

















/*=============================================
CARGAR DATOS EJERCICIOS
=============================================*/

if($('#idTIPOPRB').val()){
	
	var idPBA = $('#idTIPOPRB').val();

	var datos = new FormData();
	datos.append("idVExam", idPBA);

		$.ajax({

			url:"ajax/admision.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){    
				
				$('#numero-ejercicios').val(respuesta);
				camposEjercicio();

				var datosSol = new FormData();
				datosSol.append("idSol", idPBA);

					$.ajax({

						url:"ajax/admision.ajax.php",
						method: "POST",
						data: datosSol,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(MosSol){
							
							if(MosSol[0]){
								
								for(var i=0;i<respuesta;i++){

									$('#sol'+MosSol[i]["num"]).val(MosSol[i]["sol"]);

								}
							}
									
						}

					})

				var datosEjer = new FormData();
				datosEjer.append("idEjerM", idPBA);

					$.ajax({

						url:"ajax/admision.ajax.php",
						method: "POST",
						data: datosEjer,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(MosEjR){
							
							if(MosEjR[0]){
								
								for(var i=0;i<respuesta;i++){

									$('#descrip'+MosEjR[i]["num"]).val(MosEjR[i]["descripcion"]);
									$('#opciona'+MosEjR[i]["num"]).val(MosEjR[i]["Ra"]);
									$('#opcionb'+MosEjR[i]["num"]).val(MosEjR[i]["Rb"]);
									$('#opcionc'+MosEjR[i]["num"]).val(MosEjR[i]["Rc"]);
									$('#opciond'+MosEjR[i]["num"]).val(MosEjR[i]["Rd"]);
									$('#opcione'+MosEjR[i]["num"]).val(MosEjR[i]["Re"]);

								}
							}
									
						}

					})


			}

		})

}

$('.SelectB').on("click", ".tipoPruebaSelc", function(){

	var idtp = $(this).attr("idtipoPrue");
	$('#idTIPOPRB').val(idtp);

	var datos = new FormData();
	datos.append("idVExam", idtp);

		$.ajax({

			url:"ajax/admision.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){    

				$('#numero-ejercicios').val(respuesta);
				camposEjercicio();

				var datosSol = new FormData();
				datosSol.append("idSol", idtp);

					$.ajax({

						url:"ajax/admision.ajax.php",
						method: "POST",
						data: datosSol,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(MosSol){
							
							if(MosSol[0]){
								
								for(var i=0;i<respuesta;i++){

									$('#sol'+MosSol[i]["num"]).val(MosSol[i]["sol"]);

								}
							}
									
						}

					})

				var datosEjer = new FormData();
				datosEjer.append("idEjerM", idtp);

					$.ajax({

						url:"ajax/admision.ajax.php",
						method: "POST",
						data: datosEjer,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(MosEjR){
							
							if(MosEjR[0]){
								
								for(var i=0;i<respuesta;i++){

									$('#descrip'+MosEjR[i]["num"]).val(MosEjR[i]["descripcion"]);
									$('#opciona'+MosEjR[i]["num"]).val(MosEjR[i]["Ra"]);
									$('#opcionb'+MosEjR[i]["num"]).val(MosEjR[i]["Rb"]);
									$('#opcionc'+MosEjR[i]["num"]).val(MosEjR[i]["Rc"]);
									$('#opciond'+MosEjR[i]["num"]).val(MosEjR[i]["Rd"]);
									$('#opcione'+MosEjR[i]["num"]).val(MosEjR[i]["Re"]);

								}
							}
									
						}

					})
			}

		})

})



/*=============================================
GUARDAR - CAMBIAR DATOS EJERCICIOS
=============================================*/

$("#guardarEjerciciosA").click(function(){

	var idPBA = $('#idTIPOPRB').val();
	var NumEjercicios = $('#numero-ejercicios').val();

	var listaSol = {};
	var listaDesc = {};
	var listaRa = {};
	var listaRb = {};
	var listaRc = {};
	var listaRd = {};
	var listaRe = {};

	/*=============================================
	VALIDAR
	=============================================*/
	for(var k=1;k<=NumEjercicios;k++){

		if($('#descrip'+k).val()&&$('#opciona'+k).val()&&$('#opcionb'+k).val()&&$('#opcionc'+k).val()&&$('#opciond'+k).val()&&$('#opcione'+k).val()){

			listaSol[k] = $('#sol'+k).val();
			listaDesc[k] = $('#descrip'+k).val();
	
			listaRa[k] = $('#opciona'+k).val();
			listaRb[k] = $('#opcionb'+k).val();
			listaRc[k] = $('#opcionc'+k).val();
			listaRd[k] = $('#opciond'+k).val();
			listaRe[k] = $('#opcione'+k).val();

		}else{
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Llenar Todos los Campos'
			  })
			return;
		}
		
	}
	

	/*=============================================
	CAMBIAR CANTIDAD EJERCICIOS
	=============================================*/

	var datos = new FormData();
	datos.append("idCExam", idPBA);
	datos.append("cantida", NumEjercicios);

		$.ajax({

			url:"ajax/admision.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){

				//console.log(respuesta);

				/*=============================================
				BORRAR ANT EJERCICIOS
				=============================================*/
				var datosbS = new FormData();
				datosbS.append("idEliSol", idPBA);
					$.ajax({

						url:"ajax/admision.ajax.php",
						method: "POST",
						data: datosbS,
						cache: false,
						contentType: false,
						processData: false,
						success: function(ElEj){
							
							//console.log(ElEj);
							

							/*=============================================
							BORRAR ANT EJERCICIOS
							=============================================*/
							var datosbE = new FormData();
							datosbE.append("idEliEjer", idPBA);
							$.ajax({

								url:"ajax/admision.ajax.php",
								method: "POST",
								data: datosbE,
								cache: false,
								contentType: false,
								processData: false,
								success: function(ElEjr){
									
									//console.log("RES "+ElEjr);

									/*=============================================
									GUARDAR
									=============================================*/

									for(var k=1;k<=NumEjercicios;k++){

										//console.log(k+" "+listaSol[k]+" "+idPBA);

										var datosSol = new FormData();
										datosSol.append("numS", k);
										datosSol.append("solS", listaSol[k]);
										datosSol.append("idEM", idPBA);
										$.ajax({
											url:"ajax/admision.ajax.php",
											method: "POST",
											data: datosSol,
											cache: false,
											contentType: false,
											processData: false,
											success: function(rspT){
												
												//console.log(rspT);

											}

										})

										var datosPrue = new FormData();
										datosPrue.append("numSP", k);
										datosPrue.append("descrip", listaDesc[k]);
										datosPrue.append("opciona", listaRa[k]);
										datosPrue.append("opcionb", listaRb[k]);
										datosPrue.append("opcionc", listaRc[k]);
										datosPrue.append("opciond", listaRd[k]);
										datosPrue.append("opcione", listaRe[k]);
										datosPrue.append("idEMP", idPBA);
										$.ajax({
											url:"ajax/admision.ajax.php",
											method: "POST",
											data: datosPrue,
											cache: false,
											contentType: false,
											processData: false,
											success: function(iPru){
												
												//console.log(iPru);

											}

										})

										
									}


									Swal.fire({
										icon: 'success',
										title: 'Se Guardo Correctamente',
										showConfirmButton: false,
										timer: 1500
									  })
									


								}

							})
							
											
						}

					})
			}

		})


})




/*
("#my-card").refreshBox(options)
$('#my-card [data-card-widget="card-refresh"]').on('loaded.lte.cardrefresh', handleLoadedEvent)
$('#my-card-widget').Widget('toggle')
*/

/*=============================================
FUNCION DE GENERAR CAMPOS DINAMICOS
=============================================*/

function camposEjercicio(){
    var spantestemodelo = $('#span-modelo').html();
    var spantestemodelo_strinf = spantestemodelo.toString();
    var campos = $('#numero-ejercicios').val();

    var i;

    i=1;

    var texto = '';
    while(i<=campos){
      texto = texto + spantestemodelo_strinf.replace(/-0/g,i.toString());
      i = i + 1; 
    }

    $("#span-real-ejercicios").html(texto);
}











$('#ActDark').on('click', function () {
	var idAdmin = $('#IDADMINN').val();
	if ($(this).is(':checked')) {
		
		var datos = new FormData();
		datos.append("idAdmin", idAdmin);
			$.ajax({
	
			url:"ajax/admision.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){

				if(respuesta=="ok"){$('body').addClass('dark-mode')}
				
			}
   
		 })

	} else {

		var datos = new FormData();
		datos.append("idAdmin", idAdmin);
			$.ajax({
	
			url:"ajax/admision.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){

				if(respuesta=="ok"){$('body').removeClass('dark-mode')}
				
			}
   
		 })
		

	}
})




