/*=============================================
FUNCION DE GENERAR CAMPOS DINAMICOS
=============================================*/

if($("#numero-ejercicios").val()){
	camposRespuesta();
}

$("#dniTRes").change(function(){
  	
	var dniPost = $(this).val();

	/*=============================================
	TRAER DATOS POSTULANTE
	=============================================*/
	var datosSe = new FormData();
	datosSe.append("Ttabla", "postulante");
	datosSe.append("Titem", "dni");
	datosSe.append("TidV", dniPost);
	$.ajax({
		url:"ajax/inscripcion.ajax.php",
		method: "POST",
		data: datosSe,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(resPost){

			/*=============================================
			TRAER DATOS INSCRIPCION
			=============================================*/
			var datosSe = new FormData();
			datosSe.append("Ttabla", "inscripciones");
			datosSe.append("Titem", "idPostulante");
			datosSe.append("TidV", resPost["idPostulante"]);
			$.ajax({
				url:"ajax/inscripcion.ajax.php",
				method: "POST",
				data: datosSe,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(resInscr){

					if(resInscr){


						/*=============================================
						VALIDA LLENADO
						=============================================*/
						var datosSe = new FormData();
						datosSe.append("Ttabla", "respuestas");
						datosSe.append("Titem", "idInscripcion");
						datosSe.append("TidV", resInscr["idInscripcion"]);
						$.ajax({
							url:"ajax/inscripcion.ajax.php",
							method: "POST",
							data: datosSe,
							cache: false,
							contentType: false,
							processData: false,
							dataType: "json",
							success: function(resResp){

								if(resResp){

									$("#dniTRes").val("");

									Swal.fire({
										icon: 'warning',
										title: 'YA SE REGISTRO LA RESPUESTA',
										showConfirmButton: false,
										timer: 1500
										})
									
								}else{

									var nombresApellidos = resPost["nombre"]+", "+resPost["apellidoPat"]+" "+resPost["apellidoMat"];
									$('#datosPostulante').html('RESPUESTAS DE '+nombresApellidos);

									$('#idEventRes').val(resInscr["idAdmision"]);
									$('#idInscripRes').val(resInscr["idInscripcion"]);


								}
								
							}

						})


					}else{
						
						$("#dniTRes").val("");

						Swal.fire({
							icon: 'error',
							title: 'ESTE POSTULANTE NO ESTA INSCRITO',
							text: 'INGRESE OTRO DNI',
							showConfirmButton: false,
							timer: 2500
							})
						
					}
					
				}

			})

			
		}

	})

})

$("#guardarRespPos").click(function(){

	var rutaEvento = $("#RUTAEVE").val();
	var idInscripRes = $('#idInscripRes').val();
	var idTipoExam = $("#numero-ejercicios option:selected").attr("idTipoExam");
	var CantTipoExam = $("#numero-ejercicios").val();
	var Puntaje = 0;
	var listaProb = [];

	if(idInscripRes && CantTipoExam){

		/*=============================================
		TRAER DATOS EXAMEN
		=============================================*/
		var datosSe = new FormData();
		datosSe.append("Ttabla", "examen");
		datosSe.append("Titem", "idExamen");
		datosSe.append("TidV", idTipoExam);
		$.ajax({
			url:"ajax/inscripcion.ajax.php",
			method: "POST",
			data: datosSe,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function(resExam){

				if(resExam["problemas"]){
					
					var lista = JSON.parse(resExam["problemas"]);
					var localResp = 0;

					for(var i = 0, j = 1; i < lista.length; i++,j++){

						if(document.getElementById('rsa'+j).checked){
							localResp = 1;
						}else if(document.getElementById('rsb'+j).checked){
							localResp = 2;
						}else if(document.getElementById('rsc'+j).checked){
							localResp = 3;
						}else if(document.getElementById('rsd'+j).checked){
							localResp = 4;
						}else if(document.getElementById('rse'+j).checked){
							localResp = 5;
						}

						if(lista[i].sol == localResp){
							Puntaje += parseInt(lista[i].pts, 10);
						}
						
						listaProb.push({"num" : j, "sol" : localResp});

					}listEjercicios = JSON.stringify(listaProb);

					/*=============================================
					CAMBIAR CANTIDAD EJERCICIOS
					=============================================*/

					var datos = new FormData();
					datos.append("ptosEx", Puntaje);
					datos.append("datosProb", listEjercicios);
					datos.append("idExam", idTipoExam);
					datos.append("idAdmision", $("#idEventRes").val());
					datos.append("idInscripcion", $("#idInscripRes").val());

					$.ajax({

						url:"ajax/admision.ajax.php",
						method: "POST",
						data: datos,
						cache: false,
						contentType: false,
						processData: false,
						success: function(respuesta){
							
							if(respuesta=="ok"){
								Swal.fire({
									icon: 'success',
									title: 'Se Guardo Correctamente',
									showConfirmButton: false,
									timer: 1500
								}).then((result) => {
					
									window.location = rutaEvento+"-respuestas";
									
								})
							}else{
								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: 'Algo ha salido Mal!!!'
								})
							}

						}

					})


					
				}
				
			}

		})


	}else{

		Swal.fire({
			icon: 'error',
			title: 'INGRESE UN DNI VALIDO',
			showConfirmButton: false,
			timer: 1500
		  })

		return;
	}

})


function camposRespuesta(){
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
