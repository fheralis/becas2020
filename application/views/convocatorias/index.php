<div class="row">
	<div class="offset-md-2 col-md-8">
		<div class="card border-light mb-3">
			<div class="card-header bg-dark text-white"><h1><?php echo $titulo; ?></h1></div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="card mb-3">
							<h3 class="card-header bg-primary text-white">
							<span class="mdi mdi-format-list-bulleted"></span>
							Convocatorias Activas.
							</h3>
							<div class="card-body">
								<h5 class="card-title">Becas en Escuelas Particulares Ciclo Escolar 2020-2021</h5>
								<div class="form-row">
									<div class="form-group form-group col-md-12">
										<p><b>Letras para registro de hoy: <?php echo $letras['letras']; ?></b></p>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="curp"><b>CURP del Solicitante:</b></label>
										<input type="text" class="form-control" id="curp" name="curp" value=""  maxlength="18">
										<small id="grado_cursadoHelp" class="form-text text-muted">Ingrese su <b>CURP</b> conforme a la letra que le corresponde en el calendario el día de hoy.</small>
									</div>
									<!-- <div class="form-group col-md-12">
										<label for="curp"><b>Primer Apellido:</b></label>
										<input type="text" class="form-control" id="primer_apellido" name="primer_apellido" value=""  maxlength="18">
										<small id="grado_cursadoHelp" class="form-text text-muted">Ingrese su <b>Primer Apellido</b> conforme a la letra que le corresponde en el calendario el día de hoy.</small>
									</div> -->
								</div>
								<div class="form-row">
									<div class="form-group form-group col-md-12">
										<label for="nivel_educativo"><b><span class="text-danger"> * </span>Nivel educativo:</b></label>
										<select class="form-control" id="nivel_educativo" name="nivel_educativo">
											<option value="0">SELECCIONE UNA OPCIÓN</option>
											<?php foreach ($niveles_educativos as $ne): ?>
											<option value="<?php echo $ne["nivel_educativo_id"]; ?>"><?php echo $ne["descripcion"]; ?></option>}
											<?php endforeach ?>
										</select>
									</div>
								</div>
								
								<div class="form-row">
									<div class="form-group col-md-3">
										<button type="button" id="btnIngresar" class="btn btn-primary btn-block">Comenzar el registro</button>
									</div>
								</div>
							</div>
							<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url();?>sources/js/functjs.js" type="text/javascript" ></script>
<script>
	$(document).ready(function() {
		$("#btnIngresar").click(function(event) {
			/* Act on the event */
			event.preventDefault();
			ingresarRegistro();
			//location.href = ruta+"index.php/solicitudes/registro/";
			});
	});

	function ingresarRegistro(){
	 /*VARIABLE PARA ALMACENAR LOS MENSAJES DE VALIDACION*/
	  var msg="";
	  /*DATOS A VALIDAR PARA EL ACCESO*/
		var curp=$("#curp").val().toUpperCase();
		var ruta = $("#base_url").val();
		var	tnc = $("#nivel_educativo").val();
		alert(curp);
		/*REGLAS DE VALIDACION*/
		if(!curpValida(curp)){ /*QUTF801122HTCVRS02*/  /*AEXH020302HNELXGA6*/
	  	msg+="<span>La <b>CURP del solicitante</b> no es válida.<span><br>";
	  }

	  if(msg.length>0){
	    mostrarError(msg);
	    msg="";
	  }
	  else{
	  	var url = ruta+"index.php/convocatorias/ingresar_registro/";
	  	//alert(url);
	  	$.ajax({
				type: "POST",
				url: url,
				data: {
		    	curp: curp,
		    	tnc: 	tnc
		    },
				beforeSend: function(){
					$("#btnIngresar").html('<span class="mdi mdi-loading mdi-spin"></span> Verificando...');
					$("#btnIngresar").attr({disabled:true});
				},
				success: function(datos){
					if(datos==1){
						location.href=ruta+"index.php/solicitudes/registro/";
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

</script>