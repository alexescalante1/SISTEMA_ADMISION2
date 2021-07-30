

const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
    dniT: /^\d{8,9}$/,
	nombreT: /^[A-ZÀ-ÿ\s]{1,20}$/,
	apellidoTP: /^[A-ZÀ-ÿ\s]{1,20}$/,
	apellidoTM: /^[A-ZÀ-ÿ\s]{1,20}$/,
	correoT: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefonoT1: /^\d{9,14}$/, // 7 a 14 numeros.
	telefonoT2: /^\d{9,14}$/, // 7 a 14 numeros.
	direccionT: /^[a-zA-ZÀ-ÿ0-9.º\s\_\-]{4,40}$/, // Letras, numeros, guion y guion_bajo
	departamentoT: /^[A-ZÀ-ÿ]{1,15}$/,
	provinciaT: /^[A-ZÀ-ÿ]{1,15}$/,
	distritoT: /^[A-ZÀ-ÿ]{1,15}$/,
	nombreR: /^[A-ZÀ-ÿ\s]{1,60}$/,
	dniR: /^\d{8,9}$/,
	correoR: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	direccionR: /^[a-zA-ZÀ-ÿ0-9.º\s\_\-]{4,40}$/,
	telefonoR1: /^\d{9,14}$/, // 7 a 14 numeros.
	nombreCole: /^[a-zA-ZÀ-ÿ0-9.º\s\_\-]{4,60}$/,
	especialiAcadm: /^[a-zA-ZÀ-ÿ0-9.º\s\_\-]{4,30}$/,
	calAcadm: /^\d{1,3}$/

}

const campos = {
	Tpostulante: false,
    Tpopcion: false,
    Tsopcion: false,
	Rparentesco: false,
	TEstAcademico: false,
    dniT: false,
	nombreT: false,
	apellidoTP: false,
	apellidoTM: false,
	correoT: false,
	telefonoT1: false,
	telefonoT2: false,
	direccionT: false,
	departamentoT: false,
	provinciaT: false,
	distritoT: false,
	nombreR: false,
	dniR: false,
	correoR: false,
	direccionR: false,
	telefonoR1: false,
	nombreCole: false,
	especialiAcadm: false,
	calAcadm: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "correoT":
			validarCampo(expresiones.correoT, e.target, 'correoT');
		break;
		case "telefonoT1":
			validarCampo(expresiones.telefonoT1, e.target, 'telefonoT1');
		break;
		case "telefonoT2":
			validarCampo(expresiones.telefonoT2, e.target, 'telefonoT2');
		break;
        case "dniT":
			validarCampo(expresiones.dniT, e.target, 'dniT');
		break;
		case "nombreT":
			validarCampo(expresiones.nombreT, e.target, 'nombreT');
		break;
		case "apellidoTP":
			validarCampo(expresiones.apellidoTP, e.target, 'apellidoTP');
		break;
		case "apellidoTM":
			validarCampo(expresiones.apellidoTM, e.target, 'apellidoTM');
		break;
		case "direccionT":
			validarCampo(expresiones.direccionT, e.target, 'direccionT');
		break;
		case "departamentoT":
			validarCampo(expresiones.departamentoT, e.target, 'departamentoT');
		break;
		case "provinciaT":
			validarCampo(expresiones.provinciaT, e.target, 'provinciaT');
		break;
		case "distritoT":
			validarCampo(expresiones.distritoT, e.target, 'distritoT');
		break;
		case "nombreR":
			validarCampo(expresiones.nombreR, e.target, 'nombreR');
		break;
		case "dniR":
			validarCampo(expresiones.dniR, e.target, 'dniR');
		break;
		case "correoR":
			validarCampo(expresiones.correoR, e.target, 'correoR');
		break;
		case "direccionR":
			validarCampo(expresiones.direccionR, e.target, 'direccionR');
		break;
		case "telefonoR1":
			validarCampo(expresiones.telefonoR1, e.target, 'telefonoR1');
		break;
		case "nombreCole":
			validarCampo(expresiones.nombreCole, e.target, 'nombreCole');
		break;
		case "especialiAcadm":
			validarCampo(expresiones.especialiAcadm, e.target, 'especialiAcadm');
		break;
		case "calAcadm":
			validarCampo(expresiones.calAcadm, e.target, 'calAcadm');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

$("#Pespecialidad").change(function(){
    
	if($(this).val()==""){
		document.getElementById(`grupo__Pespecialidad`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__Pespecialidad`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__Pespecialidad .formulario__input-error2`).classList.remove('formulario__input-error-activo');
		document.querySelector(`#grupo__Pespecialidad .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos["Tpopcion"] = false;
	}else if($(this).val()==$("#Sespecialidad").val()){
		document.getElementById(`grupo__Pespecialidad`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__Pespecialidad`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__Pespecialidad .formulario__input-error`).classList.remove('formulario__input-error-activo');
		document.querySelector(`#grupo__Pespecialidad .formulario__input-error2`).classList.add('formulario__input-error-activo');
        campos["Tpopcion"] = false;
	}else{
		document.getElementById(`grupo__Pespecialidad`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__Pespecialidad`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__Pespecialidad .formulario__input-error`).classList.remove('formulario__input-error-activo');
		document.querySelector(`#grupo__Pespecialidad .formulario__input-error2`).classList.remove('formulario__input-error-activo');
        campos["Tpopcion"] = true;
	}
})

$("#Sespecialidad").change(function(){
	if($(this).val()==""){
		document.getElementById(`grupo__Sespecialidad`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__Sespecialidad`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__Sespecialidad .formulario__input-error2`).classList.remove('formulario__input-error-activo');
		document.querySelector(`#grupo__Sespecialidad .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos["Tsopcion"] = false;
	}else if($(this).val()==$("#Pespecialidad").val()){
		document.getElementById(`grupo__Sespecialidad`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__Sespecialidad`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__Sespecialidad .formulario__input-error`).classList.remove('formulario__input-error-activo');
		document.querySelector(`#grupo__Sespecialidad .formulario__input-error2`).classList.add('formulario__input-error-activo');
        campos["Tsopcion"] = false;
	}else{
		document.getElementById(`grupo__Sespecialidad`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__Sespecialidad`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__Sespecialidad .formulario__input-error`).classList.remove('formulario__input-error-activo');
		document.querySelector(`#grupo__Sespecialidad .formulario__input-error2`).classList.remove('formulario__input-error-activo');
        campos["Tsopcion"] = true;
	}
})

$("#Tpostulante").change(function(){
	if($(this).val()==""){
		validarCampoSelect(0, 'Tpostulante');
	}else{
		validarCampoSelect(1, 'Tpostulante');
	}
})

$("#Rparentesco").change(function(){
	if($(this).val()==""){
		validarCampoSelect(0, 'Rparentesco');
	}else{
		validarCampoSelect(1, 'Rparentesco');
	}
})

$("#TEstAcademico").change(function(){
	if($(this).val()==""){
		validarCampoSelect(0, 'TEstAcademico');
	}else{
		validarCampoSelect(1, 'TEstAcademico');
	}
})

const validarCampoSelect = (val, campo) => {
	if(val){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

$(function () {

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
	});

});
/*=============================================
SUBIENDO FOTOS
=============================================*/

var imagenfotoPerfilT = null;

$(".fotoPerfilT").change(function(){

	imagenfotoPerfilT = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagenfotoPerfilT["type"] != "image/jpeg" && imagenfotoPerfilT["type"] != "image/png"){

  		$(".fotoPerfilT").val("");
          
          Swal.fire({
            icon: 'error',
            title: 'Error al subir la imagen',
            text: '¡La imagen debe estar en formato JPG o PNG!'
          })

  	}else if(imagenfotoPerfilT["size"] > 5000000){

  		$(".fotoPerfilT").val("");
          
          Swal.fire({
            icon: 'error',
            title: 'Error al subir la imagen',
            text: '¡La imagen no debe pesar más de 5MB!'
          })

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagenfotoPerfilT);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarPerfilT").attr("src", rutaImagen);

  		})

  	}

})


var imagenfotoVaucherP = null;

$(".fotoVaucherP").change(function(){

	imagenfotoVaucherP = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagenfotoVaucherP["type"] != "image/jpeg" && imagenfotoVaucherP["type"] != "image/png"){

  		$(".fotoVaucherP").val("");
          
          Swal.fire({
            icon: 'error',
            title: 'Error al subir la imagen',
            text: '¡La imagen debe estar en formato JPG o PNG!'
          })

  	}else if(imagenfotoVaucherP["size"] > 5000000){

  		$(".fotoVaucherP").val("");

          Swal.fire({
            icon: 'error',
            title: 'Error al subir la imagen',
            text: '¡La imagen no debe pesar más de 5MB!'
          })

  	}else{

  		var datosImagen2 = new FileReader;
  		datosImagen2.readAsDataURL(imagenfotoVaucherP);

  		$(datosImagen2).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarVaucherP").attr("src", rutaImagen);

  		})

  	}

})

/*=============================================
//  VALIDAR PASOS
=============================================*/

$("#next1").click(function(){
 
    var fechaT = $("#IfechaNacT").val();
    var fotoT = $("#filePT").val();

    if(!fechaT){
        toastr.warning('Defina la fecha de Nacimiento.')
    }
    if(!fotoT){
        toastr.warning('Adjunte la foto del perfil.')
    }

    if(campos.Tpostulante && campos.Tpopcion && campos.Tsopcion && campos.dniT && campos.nombreT && campos.apellidoTP && campos.apellidoTM && fechaT && fotoT){
        stepper.next();
        //formulario.reset();
	} else {
        toastr.error('Todos los campos requeridos deben estar llenos.');
	}

})

$("#next2").click(function(){
 
    if(campos.correoT && campos.telefonoT1 && campos.direccionT && campos.departamentoT && campos.provinciaT && campos.distritoT){
        stepper.next();
	} else {
        toastr.error('Todos los campos requeridos deben estar llenos.');
	}

})

$("#next3").click(function(){
 
    if(campos.nombreR && campos.dniR && campos.Rparentesco && campos.telefonoR1){
        stepper.next();
	} else {
        toastr.error('Todos los campos requeridos deben estar llenos.');
	}

})

$("#next4").click(function(){
 
    if(campos.nombreCole && campos.TEstAcademico && campos.calAcadm){
        stepper.next();
	} else {
        toastr.error('Todos los campos requeridos deben estar llenos.');
	}

})

/*=============================================
//  GUARDAR POSTULANTE
=============================================*/

$("#guardarPostulant").click(function(){

	var idEvento = $("#IDEVENTINSCRIP").val();
    var idAttAdmin = $("#IDATTADMIN").val();
	var rutaEvento = $("#RUTAEVENT").val();

    var Tpostulante = $("#Tpostulante").val();
    var Tpopcion = $("#Pespecialidad").val();
    var Tsopcion = $("#Sespecialidad").val();
    var dniT = $("#dniT").val();
    var nombreT = $("#nombreT").val();
    var apellidoTP = $("#apellidoTP").val();
    var apellidoTM = $("#apellidoTM").val();
    var fechaT = $("#IfechaNacT").val();

    var fechaTT = moment(fechaT, "MM/DD/YYYY").format("YYYY-MM-DD");

    console.log(idEvento);
    console.log(idAttAdmin);
    console.log(Tpostulante);
    console.log(Tpopcion);
    console.log(Tsopcion);
    console.log(dniT);
    console.log(nombreT);
    console.log(apellidoTP);
    console.log(apellidoTM);
    console.log(fechaT);
	console.log(fechaTT);
    console.log(imagenfotoPerfilT);



    var generoTT = null;
    const genero = document.getElementById('generoT');
    console.log(genero.checked);
    if(genero.checked){
		generoTT = "Hombre";
        console.log("ES HOMBRE");
    }else{
		generoTT = "Mujer";
        console.log("ES MUJER");
    }


    var correoT = $("#correoT").val();
    var telefonoT1 = $("#telefonoT1").val();
    var telefonoT2 = $("#telefonoT2").val();
    var direccionT = $("#direccionT").val();
    var departamentoT = $("#departamentoT").val();
    var provinciaT = $("#provinciaT").val();
    var distritoT = $("#distritoT").val();

    console.log(correoT);
    console.log(telefonoT1);
    console.log(telefonoT2);
    console.log(direccionT);
    console.log(departamentoT);
    console.log(provinciaT);
    console.log(distritoT);

    var nombreR = $("#nombreR").val();
    var dniR = $("#dniR").val();
	var correoR = $("#correoR").val();
    var Rparentesco = $("#Rparentesco").val();
    var direccionR = $("#direccionR").val();
    var telefonoR1 = $("#telefonoR1").val();

    console.log(nombreR);
    console.log(dniR);
	console.log(correoR);
    console.log(Rparentesco);
    console.log(direccionR);
    console.log(telefonoR1);

    var nombreCole = $("#nombreCole").val();
    var TEstAcademico = $("#TEstAcademico").val();
    var especialiAcadm = $("#especialiAcadm").val();
    var calAcadm = $("#calAcadm").val();

    console.log(nombreCole);
    console.log(TEstAcademico);
    console.log(especialiAcadm);
    console.log(calAcadm);




    var fotoVP = $("#fileVP").val();
    console.log(imagenfotoVaucherP);




    if(!fotoVP){
        toastr.warning('Adjunte la foto del Vaucher.')
    }else{

		var datosInscr = new FormData();
		datosInscr.append("idIEvento", idEvento);
		datosInscr.append("idAttAdmin", idAttAdmin);
		datosInscr.append("Tpostulante", Tpostulante);
		datosInscr.append("Tpopcion", Tpopcion);
		datosInscr.append("Tsopcion", Tsopcion);

		datosInscr.append("dniT", dniT);
		datosInscr.append("nombreT", nombreT);
		datosInscr.append("apellidoTP", apellidoTP);
		datosInscr.append("apellidoTM", apellidoTM);
		datosInscr.append("fechaTT", fechaTT); ///FEHA

		
		datosInscr.append("imagenfotoPerfilT", imagenfotoPerfilT);

		datosInscr.append("generoT", generoTT);
		datosInscr.append("correoT", correoT);
		datosInscr.append("telefonoT1", telefonoT1);
		datosInscr.append("telefonoT2", telefonoT2);
		datosInscr.append("direccionT", direccionT);
		datosInscr.append("departamentoT", departamentoT);
		datosInscr.append("provinciaT", provinciaT);
		datosInscr.append("distritoT", distritoT);

		datosInscr.append("nombreR", nombreR);
		datosInscr.append("dniR", dniR);
		datosInscr.append("correoR", correoR);
		datosInscr.append("Rparentesco", Rparentesco);
		datosInscr.append("direccionR", direccionR);
		datosInscr.append("telefonoR1", telefonoR1);

		datosInscr.append("nombreCole", nombreCole);
		datosInscr.append("TEstAcademico", TEstAcademico);
		datosInscr.append("especialiAcadm", especialiAcadm);
		datosInscr.append("calAcadm", calAcadm);

		datosInscr.append("imagenfotoVaucherP", imagenfotoVaucherP);

	   $.ajax({
			url:"ajax/inscripcion.ajax.php",
			method: "POST",
			data: datosInscr,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){

				console.log("RESPUESTA");
				console.log(respuesta);

				if(respuesta == "ok"){

					Swal.fire({
						title: 'Se ha Registrado Correctamente',
						icon: 'success',
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'Continuar'
					}).then((result) => {
						
						window.location = rutaEvento+"-inscribir";
						
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




/*=============================================
ACTIVAR INSCRIPC
=============================================*/
$('#tablaInscritos').on("click", ".btnActivar", function(){

	console.log("SI");

	var idInscripcion = $(this).attr("idInscripcion");
	var estadoInscripcion = $(this).attr("estadoInscripcion");

	var datos = new FormData();
 	datos.append("activarIdI", idInscripcion);
  	datos.append("activarInscrip", estadoInscripcion);

  	$.ajax({

	  url:"ajax/inscripcion.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){    
          
          // console.log("respuesta", respuesta);

      }

  	})

	if(estadoInscripcion == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('INACTIVO');
  		$(this).attr('estadoInscripcion',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('ACTIVO');
  		$(this).attr('estadoInscripcion',0);

  	}

})







$(".btnVerInscripcion").click(function(){

	var idInscripcion = $(this).attr("idInscripcion");

	var datos = new FormData();
	datos.append("Ttabla", "inscripciones");
	datos.append("Titem", "idInscripcion");
	datos.append("TidV", idInscripcion);

	$.ajax({

		url:"ajax/inscripcion.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			var datos2 = new FormData();
			datos2.append("Ttabla", "postulante");
			datos2.append("Titem", "idPostulante");
			datos2.append("TidV", respuesta["idPostulante"]);

			$.ajax({

				url:"ajax/inscripcion.ajax.php",
				method: "POST",
				data: datos2,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(resp){
					
					var datos3 = new FormData();
					datos3.append("Ttabla", "postulantedetalle");
					datos3.append("Titem", "idPostulante");
					datos3.append("TidV", respuesta["idPostulante"]);

					$.ajax({

						url:"ajax/inscripcion.ajax.php",
						method: "POST",
						data: datos3,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(respDet){
							
							$("#modalVerInscripcion .Popcion").val(respuesta["Popcion"]);
							$("#modalVerInscripcion .Sopcion").val(respuesta["Sopcion"]);
							$("#modalVerInscripcion .Tpostulacion").val(respuesta["Tpostulacion"]);
							$("#modalVerInscripcion .previsualizarVaucherP").attr("src", respuesta["vaucher"]);

							$("#modalVerInscripcion .previsualizarPerfilT").attr("src", resp["foto"]);

							const genero = document.getElementById('generoTT');
							if(respDet["genero"]=="Mujer"){
								if(genero.checked){
									$("#modalVerInscripcion #generoTT").trigger("click");
								}
							}else{
								if(!genero.checked){
									$("#modalVerInscripcion #generoTT").trigger("click");
								}
							}

							$("#modalVerInscripcion .nombresApellidos").val(resp["nombre"]+ " "+resp["apellidoPat"]+" "+resp["apellidoMat"]);
							$("#modalVerInscripcion .dniT").val(resp["dni"]);
							$("#modalVerInscripcion .fechaT").val(resp["fecha"]);
							
							$("#modalVerInscripcion .correoT").val(respDet	["correo"]);
							$("#modalVerInscripcion .cel1T").val(respDet["celularOne"]);
							$("#modalVerInscripcion .cel2T").val(respDet["celularTwo"]);
							$("#modalVerInscripcion .direccionT").val(respDet["direccion"]);
							$("#modalVerInscripcion .localizaT").val(respDet["departamento"]+" - "+respDet["provincia"]+" - "+respDet["distrito"]);
							$("#modalVerInscripcion .nombreR").val(respDet["representante"]);
							$("#modalVerInscripcion .parentescoR").val(respDet["parentescoR"]);
							$("#modalVerInscripcion .correoR").val(respDet["correoR"]);
							$("#modalVerInscripcion .direccionR").val(respDet["direccionR"]);
							$("#modalVerInscripcion .dniR").val(respDet["dniR"]);
							$("#modalVerInscripcion .celR").val(respDet["celularR"]);

							$("#modalVerInscripcion .colegio").val(respDet["colegio"]);
							$("#modalVerInscripcion .Ctipo").val(respDet["Ctipo"]);
							$("#modalVerInscripcion .Cespecialidad").val(respDet["Cespecialidad"]);
							$("#modalVerInscripcion .nota").val(respDet["Cnota"]);

						}

					})

					
							
				}

			})
					
		}

	})





















})