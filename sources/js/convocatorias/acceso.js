$(document).ready(function(){
	$('#alert').hide();
	// $("#ico-loading").hide();
	$("#btnIngresar").click(ingresarRegistro);
});

function ingresarRegistro(){
	 /*VARIABLE PARA ALMACENAR LOS MENSAJES DE VALIDACION*/
  var msg="";
  /*DATOS A VALIDAR PARA EL ACCESO*/
	var curp=$("#curp").val().toUpperCase();
	
	/*REGLAS DE VALIDACION*/
	if(!curpValida(curp)){ /*QUTF801122HTCVRS02*/  /*AEXH020302HNELXGA6*/
  	msg+="<span>La <b>CURP del solicitante</b> no es válida.<span><br>";
  }

  if(msg.length>0){
    mostrarError(msg);
    msg="";
  }
  else{
  	var url = $("#base_url").val()+"index.php/convocatorias/ingresar_registro/";
  	//alert(url);
  	$.ajax({
			type: "POST",
			url: url,
			data: {
	    	curp: curp,
	    	tnc: 	$("#tnc").val()
	    },
			beforeSend: function(){
				$("#btnIngresar").html('<span class="mdi mdi-loading mdi-spin"></span> Verificando...');
				$("#btnIngresar").attr({disabled:true});
			},
			success: function(datos){
				if(datos==1){
					location.href=$("#base_url").val()+"index.php/solicitudes/registro/";
				}else if(datos==2){
					// msg="La CURP ingresada ya esta asociada con un registro.<br/>";
					// msg+="Si lo que quieres es consultar tu solicitud da click aqui.";
					msg="La <b>CURP</b> ingresada no es válida para el registro de hoy.<br/>";
					mostrarError(msg);
					
					$("#btnIngresar").html('Ingresar al registro');
					$("#btnIngresar").attr({disabled:false});
				}
			}
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