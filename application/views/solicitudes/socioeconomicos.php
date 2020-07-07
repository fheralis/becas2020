<?php $selected=''; ?>
<br>
<div class="col-md-12">
  <div class="alert alert-dismissible alert-danger" id="alertSocioeconomicos">
    <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
    <p></p>
  </div>
</div>

<!-- INFORMACIO DEL SOCIOECONOMICA -->
<form method="post" role="form" class="formSocioeconomicos" id="formSocioeconomicos">
  <!-- INFORMACION SOCIOECONOMICA -->
  <div>
    <legend class="text-uppercase">Datos del responsable de los egresos del hogar</legend>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="parentesco_responsable"><b><span class="text-danger"> * </span>Parentesco:</b></label>
        <select class="form-control" id="parentesco_responsable" name="parentesco_responsable">
            <option value="0">SELECCIONE UNA OPCIÓN</option>
<?php foreach ($parentescos as $parentesco): ?>
<?php 
        if($infoTutor['parentesco_id']==$parentesco["parentesco_id"]): 
          $selected="selected";
        else:
          $selected="";
        endif 
?>          
          <option <?php echo $selected ?> value="<?php echo $parentesco["parentesco_id"]; ?>"><?php echo $parentesco["descripcion"]; ?></option>}


<?php endforeach ?>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="curp_responsable"><b><span class="text-danger"> * </span>CURP:</b></label>
        <input type="text" class="form-control text-uppercase" id="curp_responsable" name="curp_responsable" value="<?php echo $infoTutor['curp'] ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="nombre_responsable"><b><span class="text-danger"> * </span>Nombre completo:</b></label>
        <input type="text" class="form-control text-uppercase" id="nombre_responsable" name="nombre_responsable" value="<?php echo $infoTutor['nombres'] ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="primer_apellido_responsable"><b><span class="text-danger"> * </span>Primer apellido:</b></label>
        <input type="text" class="form-control text-uppercase" id="primer_apellido_responsable" name="primer_apellido_responsable" value="<?php echo $infoTutor['primer_apellido'] ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="segundo_apellido_responsable"><b>Segundo apellido:</b></label>
        <input type="text" class="form-control text-uppercase" id="segundo_apellido_responsable" name="segundo_apellido_responsable" value="<?php echo $infoTutor['segundo_apellido'] ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="estado_civil_responsable"><b><span class="text-danger"> * </span>Estado civil:</b></label>
        <select class="form-control" id="estado_civil_responsable" name="estado_civil_responsable">
<?php foreach ($estados_civiles as $estado_civil): ?>
<?php 
        if($infoTutor['estado_civil_id']==$estado_civil["estado_civil_id"]): 
          $selected="selected";
        else:
          $selected="";
        endif 
?>      
          <option <?php echo $selected; ?> value="<?php echo $estado_civil["estado_civil_id"]; ?>"><?php echo $estado_civil["descripcion"]; ?></option>}
<?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="trabaja_en_responsable"><b>Lugar donde trabaja:</b></label>
        <input type="text" class="form-control text-uppercase" id="trabaja_en_responsable" name="trabaja_en_responsable" value="<?php echo $infoTutor['trabaja'] ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="cargo_responsable"><b>Cargo:</b></label>
        <input type="text" class="form-control text-uppercase" id="cargo_responsable" name="cargo_responsable" value="<?php echo $infoTutor['cargo'] ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="domicilio_responsable"><b>Domicilio laboral:</b></label>
        <input type="text" class="form-control text-uppercase" id="domicilio_responsable" name="domicilio_responsable" value="<?php echo $infoTutor['domicilio'] ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="percepcion_responsable"><b>Percepción total:</b></label>
        <input type="text" class="form-control" id="percepcion_responsable" name="percepcion_responsable" value="<?php echo $infoTutor['percepcion'] ?>" onkeypress="return filterFloat(event,this);" maxlength="14">
        <small id="percepcion_responsableHelp" class="form-text text-muted">Escribir únicamente números, no poner comas (ejemplo si percibe $8,654.05 escriba solo 8654.05)<br>IMPORTANTE: El salario indicado, debe ser la cantidad percibida sin descuentos (prestamos, aportaciones, pagos) </small>
      </div>
      <div class="form-group col-md-3">
        <label for="total_ingreso_adicional_responsable"><b>Ingresos adicionales:</b></label>
        <input type="text" class="form-control" id="total_ingreso_adicional_responsable" name="total_ingreso_adicional_responsable" value="<?php echo $infoTutor['ingreso_adicional'] ?>" onkeypress="return filterFloat(event,this);" maxlength="14">
        <small id="total_ingreso_adicional_responsableHelp" class="form-text text-muted">Escribir únicamente números, no poner comas. (ejemplo si paga $2,154.50 escriba solo 2154.50) </small>
      </div>
    </div>
  </div>
	
  <br>

  <div>
    <legend> - Estudio Socioeconomico</legend>
<?php foreach($preguntas as $pregunta): ?>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for=""><b><?php echo $pregunta["orden"]." - ".$pregunta["pregunta"]; ?></b></label>
        <select data-libre="<?php echo $pregunta["respuesta_libre"]; ?>" id="p-<?php echo $pregunta["pregunta_id"]; ?>" name="p-<?php echo $pregunta["pregunta_id"]; ?>" class="form-control">
          <option data-libre="N" value="0">ELIJA UNA OPCIÓN</option>
<?php $respuestas=$this->model_respuestas->gets_respuestas($pregunta["pregunta_id"]); ?>

<?php foreach($respuestas as $respuesta): ?>

          <option data-libre="<?php echo $respuesta["respuesta_libre"]; ?>" value="<?php echo $respuesta["respuesta_id"]; ?>"><?php echo $respuesta["respuesta"];?></option>

<?php endforeach; ?>

        </select>
        <input type="hidden" name="preguntas" value="<?php echo $pregunta["pregunta_id"]; ?>" />
      </div>
    </div>
<?php endforeach; ?>
  </div>


  <!-- <fieldset> -->
    <div class="form-row">
      <button type="button" id="btnSocioEconomicos" class="btn btn-primary">Guardar y finalizar registro.</button>
    </div>
  <!-- </fieldset> -->
</form>