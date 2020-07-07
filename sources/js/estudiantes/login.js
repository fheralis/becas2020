$(document).ready(function(){
	$('#alert').hide();
	$("#ico-loading").hide();
	$("#btnIniciar").click(iniciarSesion);
});

function iniciarSesion(){
	/*VARIABLE PARA ALMACENAR LOS MENSAJES DE VALIDACION*/
  var msg="";
  /*DATOS A VALIDAR PARA EL ACCESO*/
	var curp=$("#curp").val();
	var clave=$("#clave").val();

	/*REGLAS DE VALIDACION*/
	if(!curp.length>0 || !clave.length>0){
    msg+="<span>La CURP y la clave de acceso son necesarios</span><br>";
  }

  if(msg.length>0){
    mostrarError(msg);
    msg="";
  }
  else{
  	var url = $("#base_url").val()+"index.php/estudiantes/iniciar_session/";
  	$.ajax({
			type: "POST",
			url: url,
			data: {
	    	curp: $("#curp").val(),
	    	clave: $("#clave").val()
	    },
			beforeSend: function(){
				//$("#ico-loading").show();
				$("#btnIniciar").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Verificando...');
				$("#btnIniciar").attr({disabled:true});
			},
			success: function(datos){
				//alert(datos);
				if(datos==1){
					location.href=$("#base_url").val()+"index.php/estudiantes/detalles/";
				}
				else if(datos==2){
					msg="La curp o la clave de acceso son incorrectos.";
					mostrarError(msg);
					
					$("#btnIniciar").html('Iniciar sesión');
					$("#btnIniciar").attr({disabled:false});
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