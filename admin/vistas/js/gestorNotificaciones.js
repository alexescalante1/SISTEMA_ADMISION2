



/*=============================================
ACTUALIZAR NOTIFICACIONES
=============================================*/

$(".actualizarNotificaciones").click(function(e){

	e.preventDefault();

	var item = $(this).attr("item");

	var datos = new FormData();
 	datos.append("item", item );

  	$.ajax({

  		 url:"ajax/notificaciones.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){

  		  	if(respuesta == "ok"){

      	    	if(item == "nuevosUsuarios"){

      	    		window.location = "usuarios";
      	    	}

      	    	if(item == "nuevasVentas"){

      	    		window.location = "notificacionesM";
      	    	}

      	    }

      	 }

  	})
})


/*=============================================
ELIMINAR CATEGORIA
=============================================*/

$('.tablaNotificaciones tbody').on("click", ".btnEliminarNotificacion", function(){

	var idNotificacion = $(this).attr("idNotificacion");

	swal({
	  title: '¿Está seguro de borrar esta notificacion?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar notificacion!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=notificacionesM&idNotificacion="+idNotificacion;
  
	  }
  
	})
  
  })







/*=============================================
PRESTAR ARTICULO
=============================================*/

$('.tablaNotificaciones tbody').on("click", ".btnPrestarArticuloN", function(){
	
	$(".previsualizarImgAdd").html("");

	const tituloV = document.getElementById("TituloArticuloP");

	var idNotificacion = $(this).attr("idNotificacion");

	
	
	var idButon = $(this).attr("idSelArt");
	var visto = $(".idTiemArt"+idButon).attr('estadoArticulo');

	if(visto=="1"){

		var datos = new FormData();
		datos.append("idNotifEstado", idNotificacion);
		datos.append("estadoNotificacion", 1);
   
		 $.ajax({
   
			url:"ajax/notificaciones.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){    
				
				console.log(respuesta);
	
			}
   
		 })

		$(".idTiemArt"+idButon).addClass('btn-success');
		$(".idTiemArt"+idButon).removeClass('btn-danger');
		$(".idTiemArt"+idButon).html('Visto');
		$(".idTiemArt"+idButon).attr('estadoArticulo',1);

	}
	
	
	var datos = new FormData();
	datos.append("idNotificacion", idNotificacion);

	$.ajax({

		url:"ajax/notificaciones.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(idNotif){
			
			$("#modalPrestarArticulo .nombreUsuario").val(idNotif[0]["nombreTitular"]);
			$("#modalPrestarArticulo .codUsuario").val(idNotif[0]["numDocTitular"]);
			$("#modalPrestarArticulo .selecDiasPrestamo").val(idNotif[0]["dias"]);
			$("#modalPrestarArticulo .idNotificacions").val(idNotif[0]["idNotificacion"]);
			
			var idArticulo = idNotif[0]["idDetalleArticulo"];

			var datos = new FormData();
			datos.append("idArticulo", idArticulo);
		
			$.ajax({
		
				url:"ajax/articulos.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(respuesta){
					
					$("#modalPrestarArticulo .idDetalleArticulo").val(respuesta[0]["idDetalleArticulo"]);
					$("#modalPrestarArticulo .tituloArticulo").val(respuesta[0]["titulo"]);
					
					$("#modalPrestarArticulo .previsualizarPrincipalA").attr("src", respuesta[0]["portada"]);
		
		
					var datosUnDisponibles = new FormData();
					datosUnDisponibles.append("UnDisponibles", respuesta[0]["idDetalleArticulo"]);
					
					$.ajax({
		
							url:"ajax/articulos.ajax.php",
							method: "POST",
							data: datosUnDisponibles,
							cache: false,
							contentType: false,
							processData: false,
							dataType: "json",
							success: function(stock){
		
								tituloV.innerHTML = "<h2 style='color:rgb(83, 83, 83);text-transform: uppercase;margin-top:-4px;margin-bottom:20px;'>"+respuesta[0]["titulo"]+"</h2><h5>PRECIO : S/."+respuesta[0]["precio"]+".00</h5><h5>PESO : "+respuesta[0]["peso"]+"kg</h5><h5>STOCK: "+stock[0]+" Unidades</h5>";
					
								//console.log(stock[0]);
								
								$(".selecNumCodigosArticulo").html('<option value="1">1</option>');
		
								var spantestemodeloNC = $('.selecNumCodigosArticulo').html();
								var spantestemodelo_strinfNC = spantestemodeloNC.toString();
								var CodNume = '';
		
		
								if(stock[0]<15){
		
									if(stock[0]==0){
		
										$(".selecNumCodigosArticulo").html('<option value="0">0</option>');
		
										swal({
											title: "No Hay Stock",
											type: "error",
											confirmButtonText: "¡Cerrar!"
										});
		
									}else{
		
										for(var o = 1; o <= stock[0]; o++){
											CodNume = CodNume + '<option value="'+o+'">'+o+'</option>';
										}
		
										spantestemodelo_strinfNC = spantestemodelo_strinfNC.replace('<option value="1">1</option>',CodNume);
		
										$(".selecNumCodigosArticulo").html(spantestemodelo_strinfNC);
		
									}
								
								}else{
		
									for(var o = 1; o <= 15; o++){
										CodNume = CodNume + '<option value="'+o+'">'+o+'</option>';
									}
		
									spantestemodelo_strinfNC = spantestemodelo_strinfNC.replace('<option value="1">1</option>',CodNume);
		
									$(".selecNumCodigosArticulo").html(spantestemodelo_strinfNC);
								}

								$("#modalPrestarArticulo .selecNumCodigosArticulo").val(idNotif[0]["cantidad"]);
			
								camposCodigos();
		
							}
		
					})
							
				}
		
			})













			
		}

	})





/*
	

	
*/

})