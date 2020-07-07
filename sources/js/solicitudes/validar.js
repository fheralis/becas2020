$(document).ready(function(){
	$('#alert').hide();
	$("#ico-loading").hide();
	$("#btnValidar").click(irValidar);
});

function irValidar(){
	 /*VARIABLE PARA ALMACENAR LOS MENSAJES DE VALIDACION*/
  var msg="";
  /*DATOS A VALIDAR PARA EL ACCESO*/
	var folio=$("#folio").val();

	/*REGLAS DE VALIDACION*/
	if(!folio.length>0){
    msg+="<span>Escriba por favor el folio de la solicitud</span><br>";
  }

  if(msg.length>0){
    mostrarError(msg);
    msg="";
  }
  else{
  	var url = $("#base_url").val()+"index.php/solicitudes/verificar_solicitud/";

  	$.ajax({
			type: "POST",
			url: url,
			data: {
	    	folio: $("#folio").val()
	    },
			beforeSend: function(){
				$("#btnValidar").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Verificando...');
				$("#btnValidar").attr({disabled:true});
			},
			success: function(datos){
				if(datos==1){
					location.href=$("#base_url").val()+"index.php/solicitudes/validar_solicitud/"+$("#folio").val();
				}else if(datos==2){
					msg="El número de folio que ingreso no es correcto.";
					mostrarError(msg);
					$("#btnValidar").html('Validar....');
					$("#btnValidar").attr({disabled:false});
				}else if(datos==3){
					msg="El número de folio que ingreso ya esta validado.";
					mostrarError(msg);
					$("#btnValidar").html('Validar....');
					$("#btnValidar").attr({disabled:false});
				}else if(datos==4){
					msg="El número de folio que ingreso solo tiene validado el checklist, pero falta el log de evaluación. Favor de reportarlo.";
					mostrarError(msg);
					$("#btnValidar").html('Validar....');
					$("#btnValidar").attr({disabled:false});
				}
			},
			//complete:function(){},
			//error:function(mensaje){}
		});
  }
}

/*MOSTRAR MENSAJE DE ERROR*/
function mostrarError(msg){
  $('#alert').hide();
  //window.scrollTo(0,0);
  $('#alert').html("<p>"+msg+"</p>");
  $('#alert').fadeIn();
}