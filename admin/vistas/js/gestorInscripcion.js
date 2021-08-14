
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const formularioE = document.getElementById('formularioE');
const inputsE = document.querySelectorAll('#formularioE input');

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

const validarFormularioE = (e) => {
	switch (e.target.name) {
		case "correoTE":
			validarCampoE(expresiones.correoT, e.target, 'correoTE', 'correoT');
		break;
		case "telefonoT1E":
			validarCampoE(expresiones.telefonoT1, e.target, 'telefonoT1E', 'telefonoT1');
		break;
		case "telefonoT2E":
			validarCampoE(expresiones.telefonoT2, e.target, 'telefonoT2E', 'telefonoT2');
		break;
        case "dniTE":
			validarCampoE(expresiones.dniT, e.target, 'dniTE', 'dniT');
		break;
		case "nombreTE":
			validarCampoE(expresiones.nombreT, e.target, 'nombreTE', 'nombreT');
		break;
		case "apellidoTPE":
			validarCampoE(expresiones.apellidoTP, e.target, 'apellidoTPE', 'apellidoTP');
		break;
		case "apellidoTME":
			validarCampoE(expresiones.apellidoTM, e.target, 'apellidoTME', 'apellidoTM');
		break;
		case "direccionTE":
			validarCampoE(expresiones.direccionT, e.target, 'direccionTE', 'direccionT');
		break;
		case "departamentoTE":
			validarCampoE(expresiones.departamentoT, e.target, 'departamentoTE', 'departamentoT');
		break;
		case "provinciaTE":
			validarCampoE(expresiones.provinciaT, e.target, 'provinciaTE', 'provinciaT');
		break;
		case "distritoTE":
			validarCampoE(expresiones.distritoT, e.target, 'distritoTE', 'distritoT');
		break;
		case "nombreRE":
			validarCampoE(expresiones.nombreR, e.target, 'nombreRE', 'nombreR');
		break;
		case "dniRE":
			validarCampoE(expresiones.dniR, e.target, 'dniRE', 'dniR');
		break;
		case "correoRE":
			validarCampoE(expresiones.correoR, e.target, 'correoRE', 'correoR');
		break;
		case "direccionRE":
			validarCampoE(expresiones.direccionR, e.target, 'direccionRE', 'direccionR');
		break;
		case "telefonoR1E":
			validarCampoE(expresiones.telefonoR1, e.target, 'telefonoR1E', 'telefonoR1');
		break;
		case "nombreColeE":
			validarCampoE(expresiones.nombreCole, e.target, 'nombreColeE', 'nombreCole');
		break;
		case "especialiAcadmE":
			validarCampoE(expresiones.especialiAcadm, e.target, 'especialiAcadmE', 'especialiAcadm');
		break;
		case "calAcadmE":
			validarCampoE(expresiones.calAcadm, e.target, 'calAcadmE', 'calAcadm');
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

const validarCampoE = (expresion, input, campo, campoE) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campoE] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campoE] = false;
	}
}
/*======================================
VARLIDA INGRESAR POSTULANTE
======================================*/

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

/*======================================
VARLIDA EDITAR POSTULANTE
======================================*/

$("#PespecialidadE").change(function(){
    
	if($(this).val()==""){
		document.getElementById(`grupo__PespecialidadE`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__PespecialidadE`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__PespecialidadE .formulario__input-error2`).classList.remove('formulario__input-error-activo');
		document.querySelector(`#grupo__PespecialidadE .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos["Tpopcion"] = false;
	}else if($(this).val()==$("#SespecialidadE").val()){
		document.getElementById(`grupo__PespecialidadE`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__PespecialidadE`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__PespecialidadE .formulario__input-error`).classList.remove('formulario__input-error-activo');
		document.querySelector(`#grupo__PespecialidadE .formulario__input-error2`).classList.add('formulario__input-error-activo');
        campos["Tpopcion"] = false;
	}else{
		document.getElementById(`grupo__PespecialidadE`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__PespecialidadE`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__PespecialidadE .formulario__input-error`).classList.remove('formulario__input-error-activo');
		document.querySelector(`#grupo__PespecialidadE .formulario__input-error2`).classList.remove('formulario__input-error-activo');
        campos["Tpopcion"] = true;
	}
})

$("#SespecialidadE").change(function(){
	if($(this).val()==""){
		document.getElementById(`grupo__SespecialidadE`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__SespecialidadE`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__SespecialidadE .formulario__input-error2`).classList.remove('formulario__input-error-activo');
		document.querySelector(`#grupo__SespecialidadE .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos["Tsopcion"] = false;
	}else if($(this).val()==$("#PespecialidadE").val()){
		document.getElementById(`grupo__SespecialidadE`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__SespecialidadE`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__SespecialidadE .formulario__input-error`).classList.remove('formulario__input-error-activo');
		document.querySelector(`#grupo__SespecialidadE .formulario__input-error2`).classList.add('formulario__input-error-activo');
        campos["Tsopcion"] = false;
	}else{
		document.getElementById(`grupo__SespecialidadE`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__SespecialidadE`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__SespecialidadE .formulario__input-error`).classList.remove('formulario__input-error-activo');
		document.querySelector(`#grupo__SespecialidadE .formulario__input-error2`).classList.remove('formulario__input-error-activo');
        campos["Tsopcion"] = true;
	}
})

$("#TpostulanteE").change(function(){
	if($(this).val()==""){
		validarCampoSelect(0, 'TpostulanteE');
	}else{
		validarCampoSelect(1, 'TpostulanteE');
	}
})

$("#RparentescoE").change(function(){
	if($(this).val()==""){
		validarCampoSelect(0, 'RparentescoE');
	}else{
		validarCampoSelect(1, 'RparentescoE');
	}
})

$("#TEstAcademicoE").change(function(){
	if($(this).val()==""){
		validarCampoSelect(0, 'TEstAcademicoE');
	}else{
		validarCampoSelect(1, 'TEstAcademicoE');
	}
})

/*======================================
VARLIDA CAMPOS SELECT
======================================*/

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

inputsE.forEach((input) => {
	input.addEventListener('keyup', validarFormularioE);
	input.addEventListener('blur', validarFormularioE);
});


$(function () {

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
	});

	formularioE.addEventListener('submit', (e) => {
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



$("#dniT").change(function(){
  	
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

			if(resPost){

				$("#dniT").val("");
				document.getElementById(`grupo__dniT`).classList.add('formulario__grupo-incorrecto');
				document.getElementById(`grupo__dniT`).classList.remove('formulario__grupo-correcto');
				document.querySelector(`#grupo__dniT i`).classList.add('fa-times-circle');
				document.querySelector(`#grupo__dniT i`).classList.remove('fa-check-circle');
				campos["dniT"] = false;

				Swal.fire({
					icon: 'warning',
					title: 'ESTE POSTULANTE YA EXISTE',
					showConfirmButton: false,
					timer: 1500
					})
			}
			
		}

	})

})

/*=============================================
//  VALIDAR PASOS
=============================================*/

$('#formulario').on("click", "#next1", function(){

//$("#next1").click(function(){
 
    var fechaT = $("#IfechaNacT").val();
    var fotoT = $("#filePT").val();

    if(!fechaT){
        toastr.error('Defina la fecha de Nacimiento.')
    }else if(!fotoT){
        toastr.error('Adjunte la foto del perfil.')
    }else if(campos.Tpostulante && campos.Tpopcion && campos.Tsopcion && campos.dniT && campos.nombreT && campos.apellidoTP && campos.apellidoTM && campos.correoT && campos.telefonoT1 && campos.direccionT && campos.departamentoT && campos.provinciaT && campos.distritoT && fechaT && fotoT){
        stepper.next();
        //formulario.reset();
	}else {
        toastr.error('Todos los campos requeridos deben estar llenos.');
	}

})

$('#formulario').on("click", "#next2", function(){
//$("#next2").click(function(){
 
    if(campos.nombreR && campos.dniR && campos.Rparentesco && campos.telefonoR1 && campos.nombreCole && campos.TEstAcademico){
        stepper.next();
	} else {
        toastr.error('Todos los campos requeridos deben estar llenos.');
	}

})

/*=============================================
//  GUARDAR POSTULANTE
=============================================*/
$('#formulario').on("click", "#guardarPostulant", function(){
//$("#guardarPostulant").click(function(){

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

				if(respuesta != "error"){

					Swal.fire({
						title: 'Se ha Registrado Correctamente',
						icon: 'success',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#2ECC71',
						confirmButtonText: 'Continuar',
						cancelButtonText: 'Imprimir Constancia'
					  }).then((result) => {
						if (result.isConfirmed) {
						
							window.location = rutaEvento+"-inscribir";
								
						}else{

							PrintConstancia(respuesta);
						
							setInterval(
								function(){
									window.location = rutaEvento+"-inscribir";
								},2000
							);

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


$('#tablaInscritos').on("click", ".btnVerInscripcion", function(){

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

							$("#modalVerInscripcion #IDINSCRIP").val(idInscripcion);
							
							var datos4 = new FormData();
							datos4.append("Ttabla", "administradores");
							datos4.append("Titem", "id");
							datos4.append("TidV", respuesta["idAdmin"]);
							$.ajax({
								url:"ajax/inscripcion.ajax.php",
								method: "POST",
								data: datos4,
								cache: false,
								contentType: false,
								processData: false,
								dataType: "json",
								success: function(respAdmin){
									$("#modalVerInscripcion .RecepAdminV").val(respAdmin["nombre"]);
								}
							})

							var Len = respuesta["idInscripcion"].length;
							var Cros = "";
							if(Len==2){
								Cros = "0000";
							}else if(Len==3){
								Cros = "000";
							}else if(Len==4){
								Cros = "00";
							}else if(Len==5){
								Cros = "0";
							}

							$('#TitleVDOM').html("CODIGO DE INSCRIPCION: "+respuesta["idAdmision"]+Cros+respuesta["idInscripcion"]);

							

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


/*=============================================
IMPRIMIR CONSTANCIA
=============================================*/


$("#ImprimirConstancia").click(function(){
	PrintConstancia($("#IDINSCRIP").val());
})

function PrintConstancia(idInscrip){

	/*=============================================
	TRAER DATOS INSCRIPCION
	=============================================*/
	var datos = new FormData();
	datos.append("Ttabla", "inscripciones");
	datos.append("Titem", "idInscripcion");
	datos.append("TidV", idInscrip);
	$.ajax({
		url:"ajax/inscripcion.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			/*=============================================
			TRAER DATOS P OPCION
			=============================================*/
			var datosPe = new FormData();
			datosPe.append("Ttabla", "especialidad");
			datosPe.append("Titem", "idEspecialidad");
			datosPe.append("TidV", respuesta["Popcion"]);
			$.ajax({
				url:"ajax/inscripcion.ajax.php",
				method: "POST",
				data: datosPe,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(resPe){

					/*=============================================
					TRAER DATOS S OPCION
					=============================================*/
					var datosSe = new FormData();
					datosSe.append("Ttabla", "especialidad");
					datosSe.append("Titem", "idEspecialidad");
					datosSe.append("TidV", respuesta["Sopcion"]);
					$.ajax({
						url:"ajax/inscripcion.ajax.php",
						method: "POST",
						data: datosSe,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(resSe){

							/*=============================================
							TRAER NOMBRE ADMISION
							=============================================*/
							var datosSe = new FormData();
							datosSe.append("Ttabla", "eventoadmision");
							datosSe.append("Titem", "idAdmision");
							datosSe.append("TidV", respuesta["idAdmision"]);
							$.ajax({
								url:"ajax/inscripcion.ajax.php",
								method: "POST",
								data: datosSe,
								cache: false,
								contentType: false,
								processData: false,
								dataType: "json",
								success: function(resEvnt){
		
									/*=============================================
									TRAER DATOS POSTULANTE
									=============================================*/
									var datosSe = new FormData();
									datosSe.append("Ttabla", "postulante");
									datosSe.append("Titem", "idPostulante");
									datosSe.append("TidV", respuesta["idPostulante"]);
									$.ajax({
										url:"ajax/inscripcion.ajax.php",
										method: "POST",
										data: datosSe,
										cache: false,
										contentType: false,
										processData: false,
										dataType: "json",
										success: function(resPost){
				
											var Len = respuesta["idInscripcion"].length;
											var Cros = "";
											if(Len==2){Cros = "0000";
											}else if(Len==3){Cros = "000";
											}else if(Len==4){Cros = "00";
											}else if(Len==5){Cros = "0";
											}
											
											var nombresApellidos = resPost["nombre"]+" "+resPost["apellidoPat"]+" "+resPost["apellidoMat"];
											var cod = respuesta["idAdmision"]+Cros+respuesta["idInscripcion"];
											
											window.open("print/fichaInscripcion.php?eAdmision="+resEvnt["titulo"]+"&Popcion="+resPe["titulo"]+"&Sopcion="+resSe["titulo"]+"&nombresApellidos="+nombresApellidos+"&cod="+cod, "popupId");
		
										}
				
									})

								}
							})

						}
					})

				}
			})

		}
	})

	//window.location = "print/jquery.php?ruta=perfiles&Popcion="+Popcion+"&Sopcion="+Sopcion;

}


/*=============================================
EDITAR INSCRIP
=============================================*/

$('#tablaInscritos').on("click", ".btnEditarInscripcion", function(){
	
	campos["Tpostulante"] = true;
	campos["Tpopcion"] = true;
	campos["Tsopcion"] = true;
	campos["Rparentesco"] = true;
	campos["TEstAcademico"] = true;
	campos["dniT"] = true;
	campos["nombreT"] = true;
	campos["apellidoTP"] = true;
	campos["apellidoTM"] = true;
	campos["correoT"] = true;
	campos["telefonoT1"] = true;
	campos["telefonoT2"] = true;
	campos["direccionT"] = true;
	campos["departamentoT"] = true;
	campos["provinciaT"] = true;
	campos["distritoT"] = true;
	campos["nombreR"] = true;
	campos["dniR"] = true;
	campos["correoR"] = true;
	campos["direccionR"] = true;
	campos["telefonoR1"] = true;
	campos["nombreCole"] = true;
	campos["especialiAcadm"] = true;
	campos["calAcadm"] = true;

	$(".previsualizarVaucherP").html("");
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

							$("#modalEditarInscripcion #IDINSCRITO").val(idInscripcion);

							var datos4 = new FormData();
							datos4.append("Ttabla", "administradores");
							datos4.append("Titem", "id");
							datos4.append("TidV", respuesta["idAdmin"]);
							$.ajax({
								url:"ajax/inscripcion.ajax.php",
								method: "POST",
								data: datos4,
								cache: false,
								contentType: false,
								processData: false,
								dataType: "json",
								success: function(respAdmin){
									$("#modalEditarInscripcion #adminRecep").val(respAdmin["nombre"]);
								}
							})

							var Len = respuesta["idInscripcion"].length;
							var Cros = "";
							if(Len==2){
								Cros = "0000";
							}else if(Len==3){
								Cros = "000";
							}else if(Len==4){
								Cros = "00";
							}else if(Len==5){
								Cros = "0";
							}
							
							$('#TitleEDOM').html("CODIGO DE INSCRIPCION: "+respuesta["idAdmision"]+Cros+respuesta["idInscripcion"]);


							$("#modalEditarInscripcion #PespecialidadE").val(respuesta["Popcion"]);
							$("#modalEditarInscripcion #SespecialidadE").val(respuesta["Sopcion"]);
							$("#modalEditarInscripcion #TpostulanteE").val(respuesta["Tpostulacion"]);
							
							$("#modalEditarInscripcion .previsualizarVaucherP").attr("src", respuesta["vaucher"]);
							$("#modalEditarInscripcion .antiguaFotoVaucherP").val(respuesta["vaucher"]);

							$("#modalEditarInscripcion .previsualizarPerfilT").attr("src", resp["foto"]);
							$("#modalEditarInscripcion .antiguaFotoPerfilT").val(resp["foto"]);

							const genero = document.getElementById('generoTE');
							if(respDet["genero"]=="Mujer"){
								if(genero.checked){
									$("#modalEditarInscripcion #generoTE").trigger("click");
								}
							}else{
								if(!genero.checked){
									$("#modalEditarInscripcion #generoTE").trigger("click");
								}
							}

							$("#modalEditarInscripcion #nombreTE").val(resp["nombre"]);
							$("#modalEditarInscripcion #apellidoTPE").val(resp["apellidoPat"]);
							$("#modalEditarInscripcion #apellidoTME").val(resp["apellidoMat"]);
							$("#modalEditarInscripcion #dniTE").val(resp["dni"]);

							var fechaTE = moment(resp["fecha"], "YYYY-MM-DD").format("MM/DD/YYYY");
							$("#modalEditarInscripcion #IfechaNacTE").val(fechaTE);
							
							$("#modalEditarInscripcion #correoTE").val(respDet	["correo"]);
							$("#modalEditarInscripcion #telefonoT1E").val(respDet["celularOne"]);
							$("#modalEditarInscripcion #telefonoT2E").val(respDet["celularTwo"]);
							$("#modalEditarInscripcion #direccionTE").val(respDet["direccion"]);
							$("#modalEditarInscripcion #departamentoTE").val(respDet["departamento"]);
							$("#modalEditarInscripcion #provinciaTE").val(respDet["provincia"]);
							$("#modalEditarInscripcion #distritoTE").val(respDet["distrito"]);
							$("#modalEditarInscripcion #nombreRE").val(respDet["representante"]);
							$("#modalEditarInscripcion #RparentescoE").val(respDet["parentescoR"]);
							$("#modalEditarInscripcion #correoRE").val(respDet["correoR"]);
							$("#modalEditarInscripcion #direccionRE").val(respDet["direccionR"]);
							$("#modalEditarInscripcion #dniRE").val(respDet["dniR"]);
							$("#modalEditarInscripcion #telefonoR1E").val(respDet["celularR"]);

							$("#modalEditarInscripcion #nombreColeE").val(respDet["colegio"]);
							$("#modalEditarInscripcion #TEstAcademicoE").val(respDet["Ctipo"]);
							$("#modalEditarInscripcion #especialiAcadmE").val(respDet["Cespecialidad"]);
							$("#modalEditarInscripcion #calAcadmE").val(respDet["Cnota"]);
							
							//formularioE.reset();  formulario__grupo-incorrecto document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');

							document.querySelectorAll('.formulario__input-error').forEach((input) => {
								input.classList.remove('formulario__input-error-activo');
							});
							document.querySelectorAll('.formulario__grupo-incorrecto').forEach((icono) => {
								icono.classList.remove('formulario__grupo-incorrecto');
							});
							document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
								icono.classList.remove('formulario__grupo-correcto');
							});

							
						}

					})
							
				}

			})
					
		}

	})

})

/*=============================================
GUARDAR CAMBIOS
=============================================*/
$("#modalEditarInscripcion .guardarCambiosPostul").click(function(){

	if(campos.Tpostulante && campos.Tpopcion && campos.Tsopcion && campos.dniT && campos.nombreT && campos.apellidoTP && campos.apellidoTM
		&& campos.correoT && campos.telefonoT1 && campos.direccionT && campos.departamentoT && campos.provinciaT && campos.distritoT
		&& campos.nombreR && campos.dniR && campos.Rparentesco && campos.telefonoR1
		&& campos.nombreCole && campos.TEstAcademico && campos.calAcadm){
					
			editarPostulantes();

	}else{
		toastr.error('Llene todos los campos requeridos.');
		return;
	}
	
})

function editarPostulantes(){

	var idInscrito = $("#modalEditarInscripcion #IDINSCRITO").val();
	var idAttAdmin = $("#modalEditarInscripcion #IDATTADMINE").val();
	var rutaEvento = $("#modalEditarInscripcion #RUTAEVENTE").val();

	var Tpostulante = $("#modalEditarInscripcion #TpostulanteE").val();
	var Tpopcion = $("#modalEditarInscripcion #PespecialidadE").val();
	var Tsopcion = $("#modalEditarInscripcion #SespecialidadE").val();
	var dniT = $("#modalEditarInscripcion #dniTE").val();
	var nombreT = $("#modalEditarInscripcion #nombreTE").val();
	var apellidoTP = $("#modalEditarInscripcion #apellidoTPE").val();
	var apellidoTM = $("#modalEditarInscripcion #apellidoTME").val();
	var fechaT = $("#modalEditarInscripcion #IfechaNacTE").val();

	var fechaTT = moment(fechaT, "MM/DD/YYYY").format("YYYY-MM-DD");

	
	console.log(rutaEvento+" <<<>>>");

	console.log(idInscrito);
	console.log(idAttAdmin);
	console.log(Tpostulante);
	console.log(Tpopcion);
	console.log(Tsopcion);
	console.log(dniT);
	console.log(nombreT);
	console.log(apellidoTP);
	console.log(apellidoTM);
	//console.log(fechaT);
	console.log(fechaTT);


	var generoTT = null;
	const genero = document.getElementById('generoTE');
	//console.log(genero.checked);
	if(genero.checked){
		generoTT = "Hombre";
	}else{
		generoTT = "Mujer";
	}
	console.log(generoTT);


	var correoT = $("#modalEditarInscripcion #correoTE").val();
	var telefonoT1 = $("#modalEditarInscripcion #telefonoT1E").val();
	var telefonoT2 = $("#modalEditarInscripcion #telefonoT2E").val();
	var direccionT = $("#modalEditarInscripcion #direccionTE").val();
	var departamentoT = $("#modalEditarInscripcion #departamentoTE").val();
	var provinciaT = $("#modalEditarInscripcion #provinciaTE").val();
	var distritoT = $("#modalEditarInscripcion #distritoTE").val();

	console.log(correoT);
	console.log(telefonoT1);
	console.log(telefonoT2);
	console.log(direccionT);
	console.log(departamentoT);
	console.log(provinciaT);
	console.log(distritoT);

	var nombreR = $("#modalEditarInscripcion #nombreRE").val();
	var dniR = $("#modalEditarInscripcion #dniRE").val();
	var correoR = $("#modalEditarInscripcion #correoRE").val();
	var Rparentesco = $("#modalEditarInscripcion #RparentescoE").val();
	var direccionR = $("#modalEditarInscripcion #direccionRE").val();
	var telefonoR1 = $("#modalEditarInscripcion #telefonoR1E").val();

	console.log(nombreR);
	console.log(dniR);
	console.log(correoR);
	console.log(Rparentesco);
	console.log(direccionR);
	console.log(telefonoR1);

	var nombreCole = $("#modalEditarInscripcion #nombreColeE").val();
	var TEstAcademico = $("#modalEditarInscripcion #TEstAcademicoE").val();
	var especialiAcadm = $("#modalEditarInscripcion #especialiAcadmE").val();
	var calAcadm = $("#modalEditarInscripcion #calAcadmE").val();

	console.log(nombreCole);
	console.log(TEstAcademico);
	console.log(especialiAcadm);
	console.log(calAcadm);



	var antiguaFotoPerfilT = $("#modalEditarInscripcion .antiguaFotoPerfilT").val();
	var antiguaFotoVaucherP = $("#modalEditarInscripcion .antiguaFotoVaucherP").val();

	console.log(imagenfotoPerfilT);
	console.log(antiguaFotoPerfilT);

	console.log(imagenfotoVaucherP);
	console.log(antiguaFotoVaucherP);



/*=====================================================*/

	var datosInscr = new FormData();
	datosInscr.append("idInscrito", idInscrito);
	datosInscr.append("idAttAdmin", idAttAdmin);
	datosInscr.append("Tpostulante", Tpostulante);
	datosInscr.append("Tpopcion", Tpopcion);
	datosInscr.append("Tsopcion", Tsopcion);

	datosInscr.append("dniT", dniT);
	datosInscr.append("nombreT", nombreT);
	datosInscr.append("apellidoTP", apellidoTP);
	datosInscr.append("apellidoTM", apellidoTM);
	datosInscr.append("fechaTT", fechaTT); ///FEHA

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

	datosInscr.append("imagenfotoPerfilT", imagenfotoPerfilT);
	datosInscr.append("antiguafotoPerfilT", antiguaFotoPerfilT);
	datosInscr.append("imagenfotoVaucherP", imagenfotoVaucherP);
	datosInscr.append("antiguafotoVaucherP", antiguaFotoVaucherP);

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
					
					window.location = rutaEvento+"-ver";
					
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