$(document).ready(function(){
	$('#alert').hide();
	$("#ico-loading").hide();
	$("#btnIniciar").click(iniciarSesion);
});

function iniciarSesion(){
	 /*VARIABLE PARA ALMACENAR LOS MENSAJES DE VALIDACION*/
  var msg="";
  /*DATOS A VALIDAR PARA EL ACCESO*/
	var usuario=$("#usuario").val();
	var pass=$("#pass").val();

	/*REGLAS DE VALIDACION*/
	if(!usuario.length>0 || !pass.length>0){
    msg+="<span>El nombre de usuario y el passoword son necesarios</span><br>";
  }

  if(msg.length>0){
    mostrarError(msg);
    msg="";
  }
  else{
  	var url = $("#base_url").val()+"index.php/usuarios/iniciar_session/";
  	//alert(url);
  	$.ajax({
			type: "POST",
			url: url,
			data: {
	    	usuario: $("#usuario").val(),
	    	pass: $("#pass").val()
	    },
			beforeSend: function(){
				//$("#ico-loading").show();
				$("#btnIniciar").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Verificando...');
				$("#btnIniciar").attr({disabled:true});
			},
			success: function(datos){
				if(datos==1){
					location.href=$("#base_url").val()+"index.php/convocatorias/home/";
				}else if(datos==2){
					//$("#ico-loading").hide();
					msg="El nombre de usuario o el password son incorrectos.";
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