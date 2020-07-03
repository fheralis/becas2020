<?php $selected=''; ?>
<br>
<div class="col-md-12">
  <div class="alert alert-dismissible alert-danger" id="alertPersonales">
    <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
    <p></p>
  </div>
</div>

<form id="formPersonales">
  <!-- INFORMACIO DEL SOLICITANTE -->
  <fieldset>
    <legend class="text-uppercase"><b>Información del Solicitante</b></legend>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="curp"><b><span class="text-danger"> * </span>CURP:</b></label>
        <input type="text" class="form-control text-uppercase" id="curp" name="curp" value="<?php echo $info["curp"]; ?>" maxlength="18">
      </div>
      <div class="form-group col-md-4">
        <label for="nombre"><b><span class="text-danger"> * </span>Nombre completo:</b></label>
        <input type="text" class="form-control text-uppercase" id="nombre" name="nombre" value="<?php echo $info['nombres']; ?>" maxlength="45">
      </div>
      <div class="form-group col-md-4">
        <label for="primer_apellido"><b><span class="text-danger"> * </span>Primer apellido:</b></label>
        <input type="text" class="form-control text-uppercase" id="primer_apellido" name="primer_apellido" value="<?php echo $info['primer_apellido']; ?>" maxlength="45">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="segundo_apellido"><b>Segundo apellido:</b></label>
        <input type="text" class="form-control text-uppercase" id="segundo_apellido" name="segundo_apellido" value="<?php echo $info['segundo_apellido']; ?>" maxlength="45">
      </div>
      <div class="form-group col-md-4">
        <label for="email"><b>Email:</b></label>
        <input type="text" class="form-control" id="email" name="email" value="<?php echo $info["email"]; ?>" maxlength="180">
        <small id="emailHelp" class="form-text text-muted">Requerido para recuperar su password, y/o recibir comunicados.</small>
      </div>
      <div class="form-group col-md-4">
        <label for="clave"><b>Contraseña:</b></label>
        <input type="password" class="form-control" id="clave" name="clave" value="<?php echo $info["clave"]; ?>" maxlength="90">
        <small id="emailHelp" class="form-text text-muted">Requerido para la consulta de resultados</small>
      </div>
    </div>
  </fieldset>
  
  <br>
  <!-- DATOS DEL DOMICILIO -->
  <fieldset>
    <legend class="text-uppercase"><b>Datos de Domicilio</b></legend>
    <div class="form-row">
      <div class="form-group form-group col-md-6">
        <label for="estados"><b><span class="text-danger"> * </span>Estado:</b></label>
        <select class="form-control" id="estados" name="estados">
          <option value="0">SELECCIONE UNA OPCIÓN</option>
<?php foreach ($estados as $estado): ?>
<?php 
        if($infoCP['estado_id']==$estado["estado_id"]): 
          $selected="selected";
        else:
          $selected="";
        endif 
?>
          <option <?php echo $selected; ?> value="<?php echo $estado["estado_id"]; ?>"><?php echo $estado["nombre"]; ?></option>}

<?php endforeach ?>
        </select>
      </div>
      <div class="form-group form-group col-md-6">
        <label for="municipios"><b><span class="text-danger"> * </span>Municipio:</b></label>

        <div id="divMunicipios">
          <select id='municipios' name='municipios' class='form-control text-uppercase'>
          </select>
        </div>

      </div>
    </div>
    <div class="form-row">
      <div class="form-group form-group col-md-12">
        <label for="colonias"><b><span class="text-danger"> * </span>Colonia/Localidad:</b></label>
        
        <div id="divColonias">
          <select id='colonias' name='colonias' class='form-control'>
          </select>
        </div>

      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-10">
        <label for="calle"><b><span class="text-danger"> * </span>Calle:</b></label>
        <input type="text" class="form-control text-uppercase" id="calle" name="calle" value="<?php echo $info["calle"]; ?>" maxlength="180">
      </div>
      <div class="form-group col-md-2">
        <label for="numero"><b><span class="text-danger"> * </span>Número de casa:</b></label>
        <input type="text" class="form-control text-uppercase" id="numero" name="numero" value="<?php echo $info["numero"]; ?>" maxlength="20">
      </div>
    </div>
  </fieldset>
  <br>
  <!-- INFORMACION FAMILIAR -->
  <fieldset>
    <legend class="text-uppercase"><b>Información Familiar</b></legend>
    
    <div class="form-row">
      <div class="form-group form-group col-md-4">
        <label for="padres"><b><span class="text-danger"> * </span>En el acta de nacimiento del solicitante aparece:</b></label>
        <select class="form-control" id="padres" name="padres">
<?php if($info["padres"]==1): ?>
          <option selected value=1>AMBOS PADRES</option>
          <option value=2>SOLO LA MADRE</option>
          <option value=3>SOLO EL PADRE</option>
<?php elseif($info["padres"]==2): ?>
          <option value=1>AMBOS PADRES</option>
          <option selected value=2>SOLO LA MADRE</option>
          <option value=3>SOLO EL PADRE</option>
<?php elseif($info["padres"]==3): ?>
          <option value=1>AMBOS PADRES</option>
          <option value=2>SOLO LA MADRE</option>
          <option selected value=3>SOLO EL PADRE</option>
<?php else: ?>
          <option value=1>AMBOS PADRES</option>
          <option value=2>SOLO LA MADRE</option>
          <option value=3>SOLO EL PADRE</option>
<?php endif; ?>

        </select>
      </div>
    </div>

    <h5><b><span class="mdi mdi-chevron-right-box mdi-24px text-secondary"></span>Ingrese aquí los datos de la Padre (Si aparece en el acta de nacimiento del solicitante)</b></h5>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="curp_padre"><b><span class="text-danger"> * </span>CURP:</b></label>
        <input type="text" class="form-control text-uppercase" id="curp_padre" name="curp_padre" value="<?php echo $infoPadre["curp"]; ?>" maxlength="18">
      </div>
      <div class="form-group col-md-4">
        <label for="nombre_padre"><b><span class="text-danger"> * </span>Nombre completo:</b></label>
        <input type="text" class="form-control text-uppercase" id="nombre_padre" name="nombre_padre" value="<?php echo $infoPadre["nombres"]; ?>" maxlength="45">
      </div>
      <div class="form-group col-md-4">
        <label for="primer_apellido_padre"><b><span class="text-danger"> * </span>Primer apellido:</b></label>
        <input type="text" class="form-control text-uppercase" id="primer_apellido_padre" name="primer_apellido_padre" value="<?php echo $infoPadre["primer_apellido"]; ?>" maxlength="45">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="segundo_apellido_padre"><b>Segundo apellido:</b></label>
        <input type="text" class="form-control text-uppercase" id="segundo_apellido_padre" name="segundo_apellido_padre" value="<?php echo $infoPadre["segundo_apellido"]; ?>" maxlength="45">
      </div>
      <div class="form-group form-group col-md-4">
        <label for="situacion_padre"><b><span class="text-danger"> * </span>Situación:</b></label>
        <select class="form-control" id="situacion_familiar_padre" name="situacion_familiar_padre">
          <option value="0">SELECCIONE UNA OPCIÓN</option>
<?php foreach ($situacion_familiares as $situacion): ?>
<?php 
        if($infoPadre["situacion_familiar_id"]==$situacion["situacion_familiar_id"]): 
          $selected="selected";
        else:
          $selected="";
        endif 
?> 
          <option <?php echo $selected; ?> value="<?php echo $situacion["situacion_familiar_id"]; ?>"><?php echo $situacion["nombre"]; ?></option>


<?php endforeach ?>
        </select>
      </div>
    </div>

    <h5><b><span class="mdi mdi-chevron-right-box mdi-24px text-secondary"></span>Ingrese aquí los datos de la Madre (Si aparece en el acta de nacimiento del solicitante)</b></h5>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="curp_madre"><b><span class="text-danger"> * </span>CURP:</b></label>
        <input type="text" class="form-control text-uppercase" id="curp_madre" name="curp_madre" value="<?php echo $infoMadre["curp"]; ?>" maxlength="18">
      </div>
      <div class="form-group col-md-4">
        <label for="nombre_madre"><b><span class="text-danger"> * </span>Nombre completo:</b></label>
        <input type="text" class="form-control text-uppercase" id="nombre_madre" name="nombre_madre" value="<?php echo $infoMadre["nombres"]; ?>" maxlength="45">
      </div>
      <div class="form-group col-md-4">
        <label for="primer_apellido_madre"><b><span class="text-danger"> * </span>Primer apellido:</b></label>
        <input type="text" class="form-control text-uppercase" id="primer_apellido_madre" name="primer_apellido_madre" value="<?php echo $infoMadre["primer_apellido"]; ?>" maxlength="45">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="segundo_apellido_madre"><b>Segundo apellido:</b></label>
        <input type="text" class="form-control text-uppercase" id="segundo_apellido_madre" name="segundo_apellido_madre" value="<?php echo $infoMadre["segundo_apellido"]; ?>" maxlength="45">
      </div>
      <div class="form-group form-group col-md-4">
        <label for="situacion_madre"><b><span class="text-danger"> * </span>Situación:</b></label>
        <select class="form-control" id="situacion_familiar_madre" name="situacion_familiar_madre">
          <option value="0">SELECCIONE UNA OPCIÓN</option>
<?php foreach ($situacion_familiares as $situacion): ?>
<?php 
        if($infoMadre["situacion_familiar_id"]==$situacion["situacion_familiar_id"]): 
          $selected="selected";
        else:
          $selected="";
        endif 
?>
          <option <?php echo $selected; ?> value="<?php echo $situacion["situacion_familiar_id"]; ?>"><?php echo $situacion["nombre"]; ?></option>
<?php endforeach ?>
        </select>
      </div>
    </div>

    <h5><b><span class="mdi mdi-chevron-right-box mdi-24px text-secondary"></span>Hermanos</b></h5>
    
    <div class="form-row">
      <div class="col-md-12 alert alert-dismissible alert-warning" role="alert">
        <ul>
          <li>
            <b>Llene todos los datos y posteriormente haga click en agregar para que se guarde dicha información.</b>
          </li>
        </ul>
        <div class="col-md-12" id="alertPersonalesHermanos">
          <p></p>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="" id="alertPersonalesHermanos">
        <p></p>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="curp_hermano"><b>CURP:</b></label>
        <input type="text" class="form-control text-uppercase" id="curp_hermano" name="curp_hermano" value="" maxlength="18">
      </div>
      <div class="form-group col-md-3">
        <label for="nombre_hermano"><b>Nombre completo:</b></label>
        <input type="text" class="form-control text-uppercase" id="nombre_hermano" name="nombre_hermano" value="" maxlength="45">
      </div>
      <div class="form-group col-md-3">
        <label for="primer_apellido_hermano"><b>Primer apellido:</b></label>
        <input type="text" class="form-control text-uppercase" id="primer_apellido_hermano" name="primer_apellido_hermano" value="" maxlength="45">
      </div>
      <div class="form-group col-md-3">
        <label for="segundo_apellido_hermano"><b>Segundo apellido:</b></label>
        <input type="text" class="form-control text-uppercase" id="segundo_apellido_hermano" name="segundo_apellido_hermano" value="" maxlength="45">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <button type="button" id="btnAgregarHermanos" class="btn btn-secondary">Agregar</button>
        <button type="button" id="btnVer" class="btn btn-secondary">Ver</button>
      </div>
    </div>

    <div class="form-row">
      <dib class="col-md-12">
        <table class="table table-sm table-sm table-bordered" id="tablaHermanos"></table>
      </dib>
    </div>
  </fieldset>

  <br>
  <fieldset>
    <div class="form-row">
      <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
      <input type="hidden" name="municipio_id" id="municipio_id" value="<?php echo $infoCP["municipio_id"]; ?>">
      <input type="hidden" name="cp_id" id="cp_id" value="<?php echo $infoCP["cp_id"]; ?>">
      <button type="button" id="btnPersonales" class="btn btn-primary">Guardar y continuar con el registro.</button>
    </div>
  </fieldset>

</form>