$(document).ready(function(){
	$('#alert').hide();
	$("#ico-loading").hide();
	$("#btnTerminar").click(terminarValidacion);
});

function terminarValidacion(){
	 /*VARIABLE PARA ALMACENAR LOS MENSAJES DE VALIDACION*/
  var msg="";
  /*DATOS A VALIDAR PARA EL ACCESO*/
	//var folio=$("#folio").val();

  var url = $("#base_url").val()+"index.php/solicitudes/terminar_validacion/";

	$.ajax({
		type: "POST",
		url: url,
		data: {
			folio: $("#folio").val(),
			d1: $("#d1").prop('checked'),
			d2: $("#d2").prop('checked'),
			d3: $("#d3").prop('checked'),
			d4: $("#d4").prop('checked'),
			d5: $("#d5").prop('checked'),
			d6: $("#d6").prop('checked'),
			d7: $("#d7").prop('checked'),
			d8: $("#d8").prop('checked'),
			d9: $("#d9").prop('checked'),
			d10: $("#d10").prop('checked'),
			d11: $("#d11").prop('checked'),
			d12: $("#d12").prop('checked'),
			o1: $("#o1").val(),
			o2: $("#o2").val(),
			o3: $("#o3").val(),
			o4: $("#o4").val(),
			o5: $("#o5").val(),
			o6: $("#o6").val(),
			o7: $("#o7").val(),
			o8: $("#o8").val(),
			o9: $("#o9").val(),
			o10: $("#o10").val(),
			o11: $("#o11").val(),
			o12: $("#o12").val(),
			logs: $("#logs").val()
  	},
		beforeSend: function(){
			$("#btnTerminar").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Verificando...');
			$("#btnTerminar").attr({disabled:true});
		},
		success: function(datos){
			// alert(datos);
			if(datos==1){
				location.href=$("#base_url").val()+"index.php/solicitudes/validar/";
			}else if(datos==2){
				msg="No pudo realizarce la validacion devido a un error interno.";
				mostrarError(msg);
				$("#btnTerminar").html('Iniciar sesión');
				$("#btnTerminar").attr({disabled:false});
			}
		}
	});





	/*REGLAS DE VALIDACION*/
	// if(!folio.length>0){
 //    msg+="<span>Escriba por favor el folio de la solicitud</span><br>";
 //  }

  // if(msg.length>0){
  //   mostrarError(msg);
  //   msg="";
  // }
  // else{
  // 	var url = $("#base_url").val()+"index.php/solicitudes/verificar_solicitud/";

  // 	$.ajax({
		// 	type: "POST",
		// 	url: url,
		// 	data: {
	 //    	folio: $("#folio").val()
	 //    },
		// 	beforeSend: function(){
		// 		$("#btnValidar").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Verificando...');
		// 		$("#btnValidar").attr({disabled:true});
		// 	},
		// 	success: function(datos){
		// 		if(datos==1){
		// 			location.href=$("#base_url").val()+"index.php/solicitudes/validar_solicitud/"+$("#folio").val();
		// 		}else if(datos==2){
		// 			msg="El número de folio que ingreso no es correcto.";
		// 			mostrarError(msg);
		// 			$("#btnValidar").html('Iniciar sesión');
		// 			$("#btnValidar").attr({disabled:false});
		// 		}
		// 	},
		// 	//complete:function(){},
		// 	//error:function(mensaje){}
		// });
  // }
}

/*MOSTRAR MENSAJE DE ERROR*/
function mostrarError(msg){
  $('#alert').hide();
  //window.scrollTo(0,0);
  $('#alert').html("<p>"+msg+"</p>");
  $('#alert').fadeIn();
}