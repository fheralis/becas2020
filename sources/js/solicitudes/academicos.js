
$(document).ready(function(){

  $('#alertAcademicos').hide();

  // mostrar los niveles cuando se selecciona un municipio
	$("#municipios_escuela").change(function(event) {
    mostrarNiveles();
	});

  mostrarNiveles();

  // configuracion del modal de materias basicas
  $('#messageEjemploMateriasBasicas').modal({
    backdrop: 'static',
    keyboard: true,
    show: false
  });

  // mostrar el modal de materias basicas
  $("#btnMateriasBasicas").click(function(){
    $('#messageEjemploMateriasBasicas').modal('show');
  });

  $("#btnAcademicos").click(function(event) {
    guardarDatosAcademicos();
  });

});

function guardarDatosAcademicos(){
  /*VARIABLE PARA ALMACENAR LOS MENSAJES DE VALIDACION*/
  var msg="";
  /*Información del Solicitante*/
  var gradoCursado=$("#grado_cursado").val();
  var promedioGeneral=parseFloat($("#promedio_general").val());
  var promedioBasicas=$("#promedio_basicas").val();
  var municipiosEscuela=$("#municipios_escuela").val();
  var nivelesEducativos=$("#niveles_educativos").val();
  var CCTs=$("#ccts").val();
  var gradoCursar=$("#grado_cursar").val();

  // Datos del Ciclo Escolar Cursado
  if($("#grado_cursado").val()==""){
    msg+="<span>El <b> Grado cursado</b> no es valido. <b>(DATOS DEL CICLO ESCOLAR CURSADO)</b></span><br>";
  }
  if(promedioGeneral<8 || promedioGeneral>10 || $("#promedio_general").val()==""){
    msg+="<span>El <b> Promedio general</b> no es valido. <b>(DATOS DEL CICLO ESCOLAR CURSADO)</b></span><br>";
  }
  if(promedioBasicas<9 || promedioBasicas>10 || $("#promedio_basicas").val()==""){
    msg+="<span>El <b> Promedio de materias básicas</b> no es valido. <b>(DATOS DEL CICLO ESCOLAR CURSADO)</b></span><br>";
  }
  /*Información del Solicitante*/
  if(municipiosEscuela==0){
    msg+="<span>El <b>Municipio donde se encuentra la escuela</b> es un dato requerido. <b>(DATOS DEL CICLO ESCOLAR A CURSAR)</b></span><br>";
  }
  if(nivelesEducativos==0){
    msg+="<span>El <b>Nivel Educativo de la escuela</b> es un dato requerido. <b>(DATOS DEL CICLO ESCOLAR A CURSAR)</b></span><br>";
  }
  if(CCTs==0){
    msg+="<span>La <b>Escuela donde cursará el proximo ciclo escolar</b> es un dato requerido. <b>(DATOS DEL CICLO ESCOLAR A CURSAR)</b></span><br>";
  }
  if($("#grado_cursar").val()==""){
    msg+="<span>El <b> Grado a cursar</b> no es valido. <b>(DATOS DEL CICLO ESCOLAR A CURSAR)</b></span><br>";
  }

  /*VERIFICAR SI OCURRIO UN ERROR SI NO GUARDAR LOS DATOS*/
  if(msg.length>0 && testAcademico==false){
    mostrarErrorAcademicos(msg);
  }
  else{
    var url = $("#base_url").val()+"index.php/solicitudes/registro_academicos_ajax/";
    $.ajax({
      type: "POST",
      url: url,
      data: {
        "grado_cursado" : gradoCursado,
        "promedio_general" : promedioGeneral,
        "promedio_basicas" : promedioBasicas,
        "municipios_escuela" : municipiosEscuela,
        "niveles_educativos" : nivelesEducativos,
        "ccts" : CCTs,
        "grado_cursar" : gradoCursar
      },
      beforeSend: function(){
        $("#btnAcademicos").html('<span class="mdi mdi-loading mdi-spin"></span> Verificando...');
        $("#btnAcademicos").attr({disabled:true});
      },
      success: function(datos){
        if(datos==1){
          $('#alertAcademicos').hide();
          $("#span-2").addClass("mdi-check-circle");
          enabledTabs("academicos","socioeconomicos","#formAcademicos");
        }else if(datos==2){
          msg="Ah ocurrido un error.<br>Consulte al administrador del sistema.";
          mostrarErrorAcademicos(msg);
        }
        $("#btnAcademicos").html('Guardar y continuar con el registro');
        //$("#btnAcademicos").attr({disabled:false});
      }
    });
    // $('#alertAcademicos').hide();
    // $("#span-2").addClass("mdi-check-circle");
    // enabledTabs("academicos","socioeconomicos","#formAcademicos");
  }
}

/*MOSTRAR MENSAJE DE ERROR DEL FORMULARIO ACADEMICO*/
function mostrarErrorAcademicos(msg){
  $('#alertAcademicos').hide();
  window.scrollTo(0,0);
  $('#alertAcademicos').html("<p>"+msg+"</p>");
  $('#alertAcademicos').fadeIn();
}

// funcion que buscar de la base de datos los nieveles segfun el municipio
function mostrarNiveles(){
	var url=$("#base_url").val()+"index.php/niveles_educativos/gets_select_niveles/";
	$.ajax({
    type: "POST",
    url: url,
    data: {
      municipio_id :        $("#municipios_escuela").val(),
      nivel_educativo_id :  $("#nivel_educativo_id").val() 
    },
    beforeSend: function(){
    	$("#divCCTs").html("<select id='ccts' name='ccts' class='form-control'></select>");
      $("#divNivelesEducativos").html(' <p class="text-primary"> Buscando... <span class="mdi mdi-loading mdi-spin" ></span></p> ');
    },
    success: function(data){
      $("#divNivelesEducativos").html(data);
      $("#niveles_educativos").bind("change",mostrarCCT);
      mostrarCCT();
    }
  });
}

// mostrar las ccts segun el mnicipio y lel nivel educativo
function mostrarCCT(){
	var url=$("#base_url").val()+"index.php/ccts/ajax_select_ccts/";
	$.ajax({
    type: "POST",
    url: url,
    data: {
    	municipio_id : $("#municipios_escuela").val(),
    	nivel_educativo_id : $("#niveles_educativos").val(),
      cct_id : $("#cct_id").val()
    },
    beforeSend: function(){
    	$("#divCCTs").html(' <p class="text-primary"> Buscando... <span class="mdi mdi-loading mdi-spin" ></span></p> ');
    },
    success: function(data){
    	$("#divCCTs").html(data);
    }
  });
}
