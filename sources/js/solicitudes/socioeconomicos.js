
$(document).ready(function(){
	
	//$('#formSocioeconomicos').submit(function(event) {
		// var str = $(this).serialize();
		// alert(str);
		// return false;
	//});

	$('#alertSocioeconomicos').hide();

	$("#parentesco_responsable").change(function(){
		rellenarParentesco();
	});

	$("#btnSocioEconomicos").click(function(event){
		guardarbtnSocioEconomicos();
	});

});


function guardarbtnSocioEconomicos(){
	/*VARIABLE PARA ALMACENAR LOS MENSAJES DE VALIDACION*/
  var msg="";
  /*Datos del responsable de los egresos del hogar*/
  var curpResponsable=$("#curp_responsable").val().toUpperCase();
  var nombreResponsable=$("#nombre_responsable").val().toUpperCase();
  var primerApellidoResponsable=$("#primer_apellido_responsable").val().toUpperCase();
  var segundoApellidoResponsable=$("#segundo_apellido_responsable").val().toUpperCase();
  var parentescoResponsable=$("#parentesco_responsable").val();
  var estadoCivilResponsable=$("#estado_civil_responsable").val();
  var trabajaEnResponsable=$("#trabaja_en_responsable").val().toUpperCase();
  var cargoResponsable=$("#cargo_responsable").val().toUpperCase();
  var domicilioResponsable=$("#domicilio_responsable").val().toUpperCase();
  var percepcionResponsable=$("#percepcion_responsable").val();
  var totalIngresoAdicionalResponsable=$("#total_ingreso_adicional_responsable").val();

  /*Datos del responsable de los egresos del hogar*/
  if(parentescoResponsable==0){
    msg+="<span>El <b>Parentesco del responsable</b> es un dato requerido. <b>(DATOS DEL RESPONSABLE DE LOS EGRESOS DEL HOGAR)</b><span><br>";
  }
  if(!curpValida(curpResponsable)){ /*QUTF801122HTCVRS02*/  /*AEXH020302HNELXGA6*/
    msg+="<span>La <b>CURP del responsable</b> no es válida. <b>(DATOS DEL RESPONSABLE DE LOS EGRESOS DEL HOGAR)</b><span><br>";
  }
  if(!nombreResponsable.length>0){
    msg+="<span>El <b>Nombre del responsable</b> es un dato requerido. <b>(DATOS DEL RESPONSABLE DE LOS EGRESOS DEL HOGAR)</b></span><br>";
  }
  if(!primerApellidoResponsable.length>0){
    msg+="<span>El <b>Primer apellido del responsable</b> es un dato requerido. <b>(DATOS DEL RESPONSABLE DE LOS EGRESOS DEL HOGAR)</b></span><br>";
  }
  if(!trabajaEnResponsable.length>0){
    msg+="<span>El <b>Lugar donde trabaja el responsable</b> es un dato requerido. <b>(DATOS DEL RESPONSABLE DE LOS EGRESOS DEL HOGAR)</b></span><br>";
  }
  if(!cargoResponsable.length>0){
    msg+="<span>El <b>Cargo del responsable</b> es un dato requerido. <b>(DATOS DEL RESPONSABLE DE LOS EGRESOS DEL HOGAR)</b></span><br>";
  }
  if(!domicilioResponsable.length>0){
    msg+="<span>El <b>Domicilio del responsable</b> es un dato requerido. <b>(DATOS DEL RESPONSABLE DE LOS EGRESOS DEL HOGAR)</b></span><br>";
  }
  if(!percepcionResponsable.length>0){
    msg+="<span>La <b>Percepción total del responsable</b> es un dato requerido. <b>(DATOS DEL RESPONSABLE DE LOS EGRESOS DEL HOGAR)</b></span><br>";
  }
  if(!totalIngresoAdicionalResponsable.length>0){
    msg+="<span>Los <b>Ingresos adicionales del responsable</b> es un dato requerido. <b>(DATOS DEL RESPONSABLE DE LOS EGRESOS DEL HOGAR)</b></span><br>";
  }
  /*verificar las respuestas del estudio*/
  if(!validarEstudio()){
  	msg+="<span>Debe responder todas las preguntas del <b> Estudio Socioeconomico.</b> <b>(ESTUDIO SOCIOECONOMICO)</b></span><br>";
  }
  /*VERIFICAR SI OCURRIO UN ERROR SI NO GUARDAR LOS DATOS*/
  if(msg.length>0 && testSocioEconomicos==false){
    mostrarErrorSocioeconomicos(msg);
  }
  else{




    var url = $("#base_url").val()+"index.php/solicitudes/registro_socioeconomicos_ajax/";
    $.ajax({
      type: "POST",
      url: url,
      data: {
        "curp_responsable" : curpResponsable,
        "nombre_responsable" : nombreResponsable,
        "primer_apellido_responsable" : primerApellidoResponsable,
        "segundo_apellido_responsable" : segundoApellidoResponsable,
        "parentesco_responsable" : parentescoResponsable,
        "estado_civil_responsable" : estadoCivilResponsable,
        "trabaja_en_responsable" : trabajaEnResponsable,
        "cargo_responsable" : cargoResponsable,
        "domicilio_responsable" : domicilioResponsable,
        "percepcion_responsable" : percepcionResponsable,
        "total_ingreso_adicional_responsable" : totalIngresoAdicionalResponsable,
        "p1" : $("#p-1").val(),
        "p2" : $("#p-2").val(),
        "p3" : $("#p-3").val(),
        "p4" : $("#p-4").val(),
        "p5" : $("#p-5").val()

      },
      beforeSend: function(){
        // $("#btnSocioEconomicos").html('<span class="mdi mdi-loading mdi-spin"></span> Verificando...');
        // $("#btnSocioEconomicos").attr({disabled:true});
      },
      success: function(datos){
        //alert(datos);
        if(datos==1){
          $('#alertSocioeconomicos').hide();
          $("#span-3").addClass("mdi-check-circle");
          $("#formSocioeconomicos > fieldset").prop('disabled',true);
          window.scrollTo(0,0);
          irHome();
        }else if(datos==2){
          msg="Ah ocurrido un error.<br>Consulte al administrador del sistema.";
          mostrarErrorSocioeconomicos(msg);
        }
        $("#btnSocioEconomicos").html('Guardar y finalizar registro.');
        $("#btnSocioEconomicos").attr({disabled:false});
      }
    });
  //  	$('#alertSocioeconomicos').hide();
	 //  $("#span-3").addClass("mdi-check-circle");
		// //$("#formSocioeconomicos > fieldset").prop('disabled',true);
		// window.scrollTo(0,0);
		// irHome();
  }
}

function rellenarParentesco(){
	if($("#parentesco_responsable").val()==1){
		$("#curp_responsable").val($("#curp_padre").val());
		$("#nombre_responsable").val($("#nombre_padre").val());
		$("#primer_apellido_responsable").val($("#primer_apellido_padre").val());
		$("#segundo_apellido_responsable").val($("#segundo_apellido_padre").val());
	}
	else if($("#parentesco_responsable").val()==2){
		$("#curp_responsable").val($("#curp_madre").val());
		$("#nombre_responsable").val($("#nombre_madre").val());
		$("#primer_apellido_responsable").val($("#primer_apellido_madre").val());
		$("#segundo_apellido_responsable").val($("#segundo_apellido_madre").val());
	}
	else{
		$("#curp_responsable").val("");
		$("#nombre_responsable").val("");
		$("#primer_apellido_responsable").val("");
		$("#segundo_apellido_responsable").val("");
	}
}

/*funcion que valida las preguntas del estudio socioeconomico*/
function validarEstudio(){
	var preguntas = document.getElementsByName("preguntas");
  var i = 0;
  for(i=0;i<preguntas.length;i++){
  	if($("#p-"+preguntas[i].value).val()==0){
  		return false;
  	}
  }
  return true;
}

/*MOSTRAR MENSAJE DE ERROR DEL FORMULARIO SOCIOECONOMICOS*/
function mostrarErrorSocioeconomicos(msg){
  $('#alertSocioeconomicos').hide();
  window.scrollTo(0,0);
  $('#alertSocioeconomicos').html("<p>"+msg+"</p>");
  $('#alertSocioeconomicos').fadeIn();
}

// function verVal(val){
// 	var select = $(val).find("option:selected");
// 	var option = select.data("libre");

// 	var id=$(val).attr("id");//+"-"+$(val).val();

// 	if(option=='S'){
// 		$("#div"+id).show();
// 	}else{
// 		$("#div"+id).hide();
// 	}
// }