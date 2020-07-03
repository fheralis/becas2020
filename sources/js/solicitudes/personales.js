
$(document).ready(function(){

  // ocultar el div de los mensajes de validacion
  $('#alertPersonales').hide();
  $('#alertPersonalesHermanos').hide();

  // muestra los estados en el select
  $("#estados").change(function(event) {
		mostrarMunicipios();
	});
  mostrarMunicipios();

  // agrega los datos del hermano en una tabla
  $("#btnAgregarHermanos").click(function(){
    agregarHermano();
  });

  // verificador de datos de los hermanos 'bugs'
  $("#btnVer").click(function(){
    $("#tablaHermanos td").each(function(){
      console.log($(this).text())
    });
  });

  // finalizar con el formulario de datos personales
  $("#btnPersonales").click(function(event) {
    guardarDatosPersonales();
  });

});

function guardarDatosPersonales(){
  /*VARIABLE PARA ALMACENAR LOS MENSAJES DE VALIDACION*/
  var msg="";
  /*Información del Solicitante*/
  var curp=$("#curp").val().toUpperCase();
  var nombre=$("#nombre").val().toUpperCase();
  var primerApellido=$("#primer_apellido").val().toUpperCase();
  var segundoApellido=$("#segundo_apellido").val().toUpperCase();
  var email=$("#email").val();
  // Datos de Domicilio
  var estados=$("#estados").val();
  var municipios=$("#municipios").val();
  var colonias=$("#colonias").val();
  var calle=$("#calle").val().toUpperCase();;
  var numero=$("#numero").val().toUpperCase();;
  // Información Familiar Padre/Madre
  var padres=$("#padres").val();
  var curpPadre=$("#curp_padre").val().toUpperCase();
  var nombrePadre=$("#nombre_padre").val().toUpperCase();
  var primerApellidoPadre=$("#primer_apellido_padre").val().toUpperCase();
  var segundoApellidoPadre=$("#segundo_apellido_padre").val().toUpperCase();
  var situacionFamiliarPadre=$("#situacion_familiar_padre").val();
  var curpMadre=$("#curp_madre").val().toUpperCase();
  var nombreMadre=$("#nombre_madre").val().toUpperCase();
  var primerApellidoMadre=$("#primer_apellido_madre").val().toUpperCase();
  var segundoApellidoMadre=$("#segundo_apellido_madre").val().toUpperCase();
  var situacionFamiliarMadre=$("#situacion_familiar_madre").val();
  var clave=$("#clave").val();

  /*Información del Solicitante*/
  if(!curpValida(curp)){ /*QUTF801122HTCVRS02*/  /*AEXH020302HNELXGA6*/
    msg+="<span>La <b>CURP del solicitante</b> no es válida. <b>(INFORMACIÓN DEL SOLICITANTE)</b><span><br>";
  }
  if(!nombre.length>0){
    msg+="<span>El <b>Nombre del solicitane</b> es un dato requerido. <b>(INFORMACIÓN DEL SOLICITANTE)</b></span><br>";
  }
  if(!primerApellido.length>0){
    msg+="<span>El <b>Primer apellido del solicitane</b> es un dato requerido. <b>(INFORMACIÓN DEL SOLICITANTE)</b></span><br>";
  }
  if(!correoValido(email)){
    msg+="<span>Ingrese un <b>Correo electrónico</b> válido. <b>(INFORMACIÓN DEL SOLICITANTE)</b></span><br>";
  }
  // Datos de Domicilio
  if(estados==0){
    msg+="<span>Por favor seleccione un <b>Estado.</b> <b>(DATOS DE DOMICILIO)</b></span><br>";
  }
  if(municipios==0){
    msg+="<span>Debe de de seleccionar un<b> Municipio.</b> <b>(DATOS DE DOMICILIO)</b></span><br>";
  }
  if(colonias==0){
    msg+="<span>Debe de de seleccionar una <b> Colonia/Localidad.</b> <b>(DATOS DE DOMICILIO)</b></span><br>";
  }
  if(!calle.length>0){
    msg+="<span>La <b>Calle</b> es un dato requerido. <b>(DATOS DE DOMICILIO)</b></span><br>";
  }
  if(!numero.length>0){
    msg+="<span>El <b>Número de casa</b> es un dato requerido. <b>(DATOS DE DOMICILIO)</b></span><br>";
  }

  if(padres==1 || padres==3){
    // Información Familiar (padre)
    if(!curpValida(curpPadre)){ /*QUTF801122HTCVRS02*/  /*AEXH020302HNELXGA6*/
      msg+="<span>Ingrese una <b>CURP</b> válida para el Padre. <b>(INFORMACIÓN FAMILIAR)</b><span><br>";
    }
    if(!nombrePadre.length>0){
      msg+="<span>El <b>Nombre del Padre</b> es un dato requerido. <b>(INFORMACIÓN FAMILIAR)</b></span><br>";
    }
    if(!primerApellidoPadre.length>0){
      msg+="<span>El <b>Primer apellido del Padre</b> es un dato requerido. <b>(INFORMACIÓN FAMILIAR)</b></span><br>";
    }
    if(situacionFamiliarPadre==0){
      msg+="<span>Debe de de seleccionar la <b> Situacion del Padre.</b> <b>(INFORMACIÓN FAMILIAR)</b></span><br>";
    }
  }

  // BIML080605MTCRDSA7

  if(padres==1 || padres==2){
    if(!curpValida(curpMadre)){ /*QUTF801122HTCVRS02*/  /*AEXH020302HNELXGA6*/
      msg+="<span>Ingrese una <b>CURP</b> válida para el Madre. <b>(INFORMACIÓN FAMILIAR)</b><span><br>";
    }
    if(!nombreMadre.length>0){
      msg+="<span>El <b>Nombre del Madre</b> es un dato requerido. <b>(INFORMACIÓN FAMILIAR)</b></span><br>";
    }
    if(!primerApellidoMadre.length>0){
      msg+="<span>El <b>Primer apellido del Madre</b> es un dato requerido. <b>(INFORMACIÓN FAMILIAR)</b></span><br>";
    }
    if(situacionFamiliarMadre==0){
      msg+="<span>Debe de de seleccionar la <b> Situacion de la Madre.</b> <b>(INFORMACIÓN FAMILIAR)</b></span><br>";
    }
  }

  if(!clave.length>0){
    msg+="<span>Escriba por favor una <b>Clave de acceso</b><b></b></span><br>";
  }

  /*VERIFICAR SI OCURRIO UN ERROR SI NO GUARDAR LOS DATOS*/
  if(msg.length>0 && testPersonales==false){
    mostrarErrorPersonales(msg);
  }
  else{
    var url = $("#base_url").val()+"index.php/solicitudes/registro_personales_ajax/";
    $.ajax({
      type: "POST",
      url: url,
      data: {
        "curp" : curp,
        "nombre" : nombre,
        "primer_apellido" : primerApellido,
        "segundo_apellido" : segundoApellido,
        "email" : email,
        "estados" : estados,
        "municipios" : municipios,
        "colonias" : colonias,
        "calle" : calle,
        "numero" : numero,
        "padres" : padres,
        "curp_padre" : curpPadre,
        "nombre_padre" : nombrePadre,
        "primer_apellido_padre" : primerApellidoPadre,
        "segundo_apellido_padre" : segundoApellidoPadre,
        "situacion_familiar_padre" : situacionFamiliarPadre,
        "curp_madre" : curpMadre,
        "nombre_madre" : nombreMadre,
        "primer_apellido_madre" : primerApellidoMadre,
        "segundo_apellido_madre" : segundoApellidoMadre,
        "situacion_familiar_madre" : situacionFamiliarMadre,
        "clave" : clave
      },
      beforeSend: function(){
        $("#btnPersonales").html('<span class="mdi mdi-loading mdi-spin"></span> Verificando...');
        $("#btnPersonales").attr({disabled:true});
      },
      success: function(datos){
        //alert(datos);
        if(datos==1){
          $("#span-1").addClass("mdi-check-circle");
          $('#alertPersonales').hide();
          $('#alertPersonalesHermanos').hide();
          enabledTabs("personales","academicos","#formPersonales");
        }else if(datos==2){
          msg="Ha ocurrido un error.<br>Consulte al administrador del sistema.";
          mostrarErrorPersonales(msg);
        }
        $("#btnPersonales").html('Guardar y continuar con el registro ');
        $("#btnPersonales").attr({disabled:false});
      }
    });
    
  }

}

/*funcion que valida para ingresar a los hermanos*/ 
function agregarHermano(){
  /*VARIABLE PARA ALMACENAR LOS MENSAJES DE VALIDACION*/
  var msg="";
  /*CACHAR LOS VALORES DLE FORMULARIO DE HERMANOS*/
  var curpHermano=$("#curp_hermano").val().toUpperCase();
  var nombreHermano=$("#nombre_hermano").val().toUpperCase();
  var primerApellidoHermano=$("#primer_apellido_hermano").val().toUpperCase();
  var segundoApellidoHermano=$("#segundo_apellido_hermano").val().toUpperCase();

  if(!curpValida(curpHermano)){ /*QUTF801122HTCVRS02*/  /*AEXH020302HNELXGA6*/
    msg+="<span>Debe ingresar la <b>CURP del hermano </b> válida para poder agregarlo. <span><br>";
  }
  if(!nombreHermano.length>0){
    msg+="<span>Debe de ingresar el <b>Nombre del hermano</b> para poder agregarlo.</span><br>";
  }
  if(!primerApellidoHermano.length>0){
    msg+="<span>Debe de ingresar el <b>Primer apellido del hermano</b> para poder agregarlo.</span><br>";
  }

  /*VERIFICAR SI OCURRIO UN ERROR SI NO AGREGAR A LA TABLA DE HERMANOS*/
  if(msg.length>0){
    mostrarErrorPersonalesHermanos(msg);
  }
  else{
    crearItemHermanos();
  }
}

/*MOSTRAR MENSAJE DE ERROR DEL FORMULARIO PERSONAL*/
function mostrarErrorPersonales(msg){
  $('#alertPersonales').hide();
  window.scrollTo(0,0);
  $('#alertPersonales').html("<p>"+msg+"</p>");
  $('#alertPersonales').fadeIn();
}

/*MOSTRAR MENSAJE DE ERROR DEL FORMULARIO DE HERMANOS*/
function mostrarErrorPersonalesHermanos(msg){
  $('#alertPersonalesHermanos').hide();
  $('#alertPersonalesHermanos').html("<p>"+msg+"</p>");
  $('#alertPersonalesHermanos').fadeIn();
}

// muestra los municipios segun el estado seleccionado
function mostrarMunicipios(){
	var url=$("#base_url").val()+"index.php/municipios/gets_select_municipios/";
	$.ajax({
    type: "POST",
    url: url,
    data: {
      estado_id     : $("#estados").val(),
      municipio_id  : $("#municipio_id").val()
    },
    beforeSend: function(){
    	$("#divColonias").html("<select id='colonias' name='colonias' class='form-control'></select>");
      $("#divMunicipios").html(' <p class="text-primary"> Buscando... <span class="mdi mdi-loading mdi-spin" ></span></p> ');
    },
    success: function(data){
      $("#divMunicipios").html(data);
      $("#municipios").bind("change",mostrarColonias);
      mostrarColonias();
    }
  });
}

// muestra las colonias segun el municipio seleccionado
function mostrarColonias(){
	var url=$("#base_url").val()+"index.php/codigos_postales/ajax_select_codigos_postales/";
	$.ajax({
    type: "POST",
    url: url,
    data: {
    	municipio_id : $("#municipios").val(),
      cp_id        : $("#cp_id").val()
    },
    beforeSend: function(){
    	$("#divColonias").html(' <p class="text-primary"> Buscando... <span class="mdi mdi-loading mdi-spin" ></span></p> ');
    },
    success: function(data){
    	$("#divColonias").html(data);
    }
  });
}

// funcion que agrega a la lista de hermanos
function crearItemHermanos() {
    // CREAR LA FILA Y EL NUMERO DE COLUMNAS
    var table = document.getElementById("tablaHermanos");
    var row = table.insertRow(0);
    var fila = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);

    cell1.innerHTML = $("#curp_hermano").val();
    cell2.innerHTML = $("#nombre_hermano").val();
    cell3.innerHTML = $("#primer_apellido_hermano").val();
    cell4.innerHTML = $("#segundo_apellido_hermano").val();
    
    var inputButton = document.createElement("input");
    inputButton.type = "button";
    inputButton.value = "Quitar";
    inputButton.className = "btn btn-sm btn-primary";

    inputButton.onclick = function (){
        var fila = this.parentNode.parentNode;
        var tbody = table.getElementsByTagName("tbody")[0];
        tbody.removeChild(fila);
    }

    cell5.appendChild(inputButton);
    limpiarCamposHermanos();
}

// funcion que limpia los campos de formulario de hermanos
function limpiarCamposHermanos(){
    $("#curp_hermano").val("");
    $("#nombre_hermano").val("");
    $("#primer_apellido_hermano").val("");
    $("#segundo_apellido_hermano").val("");
    $("#curp_hermano").focus();
}







function guardar(){
  /*VARIABLE PARA ALMACENAR LOS MENSAJES DE VALIDACION*/
  var msg="";
  /*DATOS DE LA CARRERA*/
  var carrera=$("#carreras").val().toUpperCase();
  var rvoe=$("#rvoes").val().toUpperCase();
  var fechaInicioCarrera=$("#fecha_inicio_carrera").val().toUpperCase();
  var fechaTerminacionCarrera=$("#fecha_terminacion_carrera").val().toUpperCase();
  /*DATOS DEL PROFESIONISTA*/
  var curp=$("#curp").val().toUpperCase();
  var nombre=$("#nombre").val().toUpperCase();
  var primerApellido=$("#primer_apellido").val().toUpperCase();
  var segundoApellido=$("#segundo_apellido").val().toUpperCase();
  var correoElectronico=$("#correo_electronico").val();
  /*EXPEDICION*/
  var fechaExpedicion=$("#fecha_expedicion").val().toUpperCase();
  var modalidadTitulacion=$("#modalidad_titulacion").val().toUpperCase();
  var fechaExamenProfesional=$("#fecha_examen_profesional").val().toUpperCase();
  var fechaExencionExamenProfesional=$("#fecha_exencion_examen_profesional").val().toUpperCase();
  var cumplioServicioSocial=1;
  if($("#cumplio_servicio_social").prop('checked')==false){
    cumplioServicioSocial=0;
  }
  var fundamentoLegalServicioSocial=$("#fundamento_legal_servicio_social").val().toUpperCase();
  var entidadFederativaExpedicion=$("#entidad_federativa_expedicion").val().toUpperCase();
  /*ANTECEDENTES*/
  var institucionProcedencia=$("#institucion_procedencia").val().toUpperCase();
  var tipoEstudioAntecedente=$("#tipo_estudio_antecedente").val().toUpperCase();
  var entidadFederativaAntecedente=$("#entidad_federativa_antecedente").val().toUpperCase();
  var fechaInicioAntecedente=$("#fecha_inicio_antecedente").val().toUpperCase();
  var fechaTerminacionAntecendente=$("#fecha_terminacion_antecedente").val().toUpperCase();
  var noCedula=$("#no_cedula").val().toUpperCase();

  /*VALIDAR DATOS DEL FORMULARIO (CARRERA)*/
  if(!fechaInicioCarrera.length>0){
    msg+="<span>La <b>Fecha de inicio de carrera</b> es un dato requerido.</span><br>";
  }
  if(!fechaTerminacionCarrera.length>0){
    msg+="<span>La <b>Fecha de terminación de carrera</b> es un dato requerido.</span><br>";
  }
  if(validarFechas(fechaInicioCarrera,fechaTerminacionCarrera)==2 || validarFechas(fechaInicioCarrera,fechaTerminacionCarrera)==1){
    msg+="<span>La <b>Fecha de inicio de la carrera</b> debe de ser menor a la <b>Fecha de terminación de la carrera</b>.<span><br>";
  }

  /*VALIDAR DATOS DEL FORMULARIO (PROFESIONISTA)*/
  if(!curpValida(curp)){ /*QUTF801122HTCVRS02*/  /*AEXH020302HNELXGA6*/
    msg+="<span>Ingrese una <b>CURP</b> válida.<span><br>";
  }
  if(!nombre.length>0){
    msg+="<span>El <b>Nombre</b> es un dato requerido.</span><br>";
  }
  if(!primerApellido.length>0){
    msg+="<span>El <b>Primer apellido</b> es un dato requerido.</span><br>";
  }
  if(!correoValido(correoElectronico)){
    msg+="<span>Ingrese un <b>Correo electrónico</b> válido.</span><br>";
  }

  /*VALIDAR DATOS DEL FORMULARIO (EXPEDICION)*/
  if(!fechaExpedicion.length>0){
    msg+="<span>La <b>Fecha de expedición </b> es un dato requerido.</span><br>";
  }  
  if((modalidadTitulacion<6) && !(fechaExamenProfesional.length>0)){
    msg+="<span>Debe de ingresar la <b>Fecha del examen profesional</b></span><br>";
  }
  else if((modalidadTitulacion==6) && !(fechaExencionExamenProfesional.length>0)){
    msg+="<span>Debe de ingresar la <b>Fecha de exención del examen profesional</b></span><br>";
  }
  
  if(validarFechas(fechaExamenProfesional,fechaExpedicion)==2 || validarFechas(fechaExamenProfesional,fechaExpedicion)==1){
    msg+="<span>La <b>Fecha de expedición</b> debe de ser mayor a la <b>Fecha del examen profesional</b>.<span><br>";
  }
  if(validarFechas(fechaExencionExamenProfesional,fechaExpedicion)==2 || validarFechas(fechaExencionExamenProfesional,fechaExpedicion)==1){
    msg+="<span>La <b>Fecha de expedición</b> debe de ser mayor a la <b>Fecha de exención del examen profesional</b>.<span><br>";
  }

  /*VALIDAR DATOS DEL FORMULARIO (ANTECEDENTE)*/
  if(!institucionProcedencia.length>0){
    msg+="<span>La <b>Institución de procedencia</b> es un dato requerido</span><br>";
  }
  if(!fechaTerminacionAntecendente.length>0){
    msg+="<span>La <b>Fecha de terminación en el antecedente</b> es un dato requerido.</span><br>";
  }

  /*VERIFICAR SI OCURRIO UN ERROR SI NO GUARDAR LOS DATOS*/
  if(msg.length>0){
    mostrarError(msg);
  }
  else{
    var url = $("#base_url").val()+"index.php/titulos/registro_ajax/";
    $.ajax({
      type: "POST",
      url: url,
      data: {
        'carrera' : carrera,
        'rvoe' : rvoe,
        'fecha_inicioCarrera' : fechaInicioCarrera,
        'fecha_terminacion_carrera' : fechaTerminacionCarrera,
        'curp' : curp,
        'nombre' : nombre,
        'primer_apellido' : primerApellido,
        'segundo_apellido' : segundoApellido,
        'correo_electronico' : correoElectronico,
        'fecha_expedicion' : fechaExpedicion,
        'modalidad_titulacion' : modalidadTitulacion,
        'fecha_examen_profesional' : fechaExamenProfesional,
        'fecha_exencion_examen_profesional' : fechaExencionExamenProfesional,
        'cumplio_servicio_social' : cumplioServicioSocial,
        'fundamento_legal_servicio_social' : fundamentoLegalServicioSocial,
        'entidad_federativa_expedicion' : entidadFederativaExpedicion,
        'institucion_procedencia' : institucionProcedencia,
        'tipo_estudio_antecedente' : tipoEstudioAntecedente,
        'entidad_federativa_antecedente' : entidadFederativaAntecedente,
        'fecha_inicio_antecedente' : fechaInicioAntecedente,
        'fecha_terminacion_antecendente' : fechaTerminacionAntecendente,
        'no_cedula' : noCedula
      },
      beforeSend: function(){
        $("#btnGuardar").html(' Procesando... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $("#btnGuardar").attr({disabled:true});
      },
      success: function(datos){
        if(datos==1){
          $('#message').html("Los datos que ingreso se han guardado correctamente.");
          $('#messageBoxAlert').modal('show');
          limpiarCampos();
        }
        else if(datos==2){
          $('#message').html("Ah ocurrido un error.<br>Consulte al administrador del sistema.");
          $('#messageBoxAlert').modal('show');
        }
      }
    });
  }
}