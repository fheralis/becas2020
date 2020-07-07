<?php $selected=''; ?>
<br>
<div class="col-md-12">
    <div class="alert alert-dismissible alert-danger" id="alertPersonales">
        <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
        <p></p>
    </div>
</div>
<form id="formPersonales">
    <!-- INFORMACIÓN DEL SOLICITANTE -->
    <!-- **************************************************************************************************************************  -->
    <fieldset>
        <legend class="text-uppercase"><b>Información del Solicitante</b></legend>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="curp"><b><span class="text-danger"> * </span>CURP:</b></label>
                <input type="text" class="form-control text-uppercase" id="curp" name="curp" value="<?php echo $info["curp"]; ?>" maxlength="18">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nombre"><b><span class="text-danger"> * </span>Nombre completo:</b></label>
                <input type="text" class="form-control text-uppercase" id="nombre" name="nombre" value="<?php echo $info['nombres']; ?>" maxlength="45">
            </div>
            <div class="form-group col-md-4">
                <label for="primer_apellido"><b><span class="text-danger"> * </span>Primer apellido:</b></label>
                <input type="text" class="form-control text-uppercase" id="primer_apellido" name="primer_apellido" value="<?php echo $info['primer_apellido']; ?>" maxlength="45">
            </div>
            <div class="form-group col-md-4">
                <label for="segundo_apellido"><b>Segundo apellido:</b></label>
                <input type="text" class="form-control text-uppercase" id="segundo_apellido" name="segundo_apellido" value="<?php echo $info['segundo_apellido']; ?>" maxlength="45">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="fecha_nacimiento"><b><span class="text-danger"> *</span> Fecha de nacimiento:</b></label>
                <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $info["fecha_nacimiento"]; ?>" maxlength="10">
                <small id="emailHelp" class="form-text text-muted">Fecha de nacimiento del solicitante</small>
            </div>
            <div class="form-group col-md-4">
                <label for="genero"><b><span class="text-danger"> *</span> Genero:</b></label>
                <select name="genero" id="genero" class="form-control">
                    <option selected value="0">SELECCIONE OPCIÓN</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                </select>
                <small id="generoHelp" class="form-text text-muted">Sexo del solicitante</small>
            </div>
            <div class="form-group col-md-4">
                <label for="telefono"><b><span class="text-danger"> *</span> Teléfono:</b></label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $info["telefono"]; ?>" maxlength="10">
                <small id="TelefonoHelp" class="form-text text-muted">Teléfono casa o celular del solicitante</small>
            </div>
            <div class="form-group col-md-4">
                <label for="email"><b><span class="text-danger"> *</span> Email:</b></label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $info["email"]; ?>" maxlength="180">
                <small id="emailHelp" class="form-text text-muted">Requerido para recuperar su password, y/o recibir comunicados.</small>
            </div>
            <div class="form-group col-md-4">
                <label for="clave"><b><span class="text-danger"> *</span> Contraseña:</b></label>
                <input type="password" class="form-control" id="clave" name="clave" value="<?php echo $info["clave"]; ?>" maxlength="90">
                <small id="clavelHelp" class="form-text text-muted">Requerido para la consulta de resultados</small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="discapacidad"><b><span class="text-danger"> *</span> Discapacidad:</b></label>
                <select name="discapacidad" id="discapacidad" class="form-control">
                    <option selected value="0">SELECCIONE OPCIÓN</option>
                    <option value="1">Si</option>
                    <option value="2">No</option>
                </select>
                <small id="discapacidadHelp" class="form-text text-muted">Requerido si el solicitante tiene alguna discapacidad</small>
            </div>
            <div class="form-group col-md-6">
                <label for="discapacidad"><b>Mencione la discapacidad:</b></label>
                <input type="text" class="form-control" id="nombre_discapacidad" name="nombre_discapacidad">
            </div>
        </div>
    </fieldset>
    <hr>
    <!-- **************************************************************************************************************************  -->
    <!-- DATOS DEL DOMICILIO -->
    <!-- **************************************************************************************************************************  -->
    <fieldset>
        <legend class="text-uppercase"><b>Datos del Domicilio</b></legend>
        <div class="form-row">
            <div class="form-group col-sm-6">
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
    <hr>
    <!-- **************************************************************************************************************************  -->
    <!-- INFORMACION FAMILIAR -->
    <!-- **************************************************************************************************************************  -->
    <fieldset>
        <legend class="text-uppercase"><b>Información Familiar</b></legend>
        <div class="form-row">
            <div class="form-group col-md-4">
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
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="actividad_padre"><b><span class="text-danger"> *</span> Realiza alguna actividad remunerada:</b></label>
                <select name="actividad_padre" id="actividad_padre" class="form-control">
                    <option selected value="0">SELECCIONE OPCIÓN</option>
                    <option value="1">Si</option>
                    <option value="2">No</option>
                </select>
                <small id="actividad_padre_Help" class="form-text text-muted">Requerido para ingresar datos económicos</small>
            </div>
            <div class="form-group col-md-4">
                <label for="lugar_trabajo_padre"><b>Lugar de Trabajo:</b></label>
                <input type="text" class="form-control text-uppercase" id="lugar_trabajo_padre" name="lugar_trabajo_padre" value="<?php echo $infoPadre["lugar_trabajo_padre"]; ?>" maxlength="45">
            </div>
            <div class="form-group col-md-4">
                <label for="ocupacion_padre"><b>Ocupación/Cargo:</b></label>
                <input type="text" class="form-control text-uppercase" id="ocupacion_padre" name="ocupacion_padre" value="<?php echo $infoPadre["ocupacion_padre"]; ?>" maxlength="45">
            </div>
            <div class="form-group col-md-4">
                <label for="ingreso_mensual_padre"><b>Ingreso Mensual:</b></label>
                <input type="text" class="form-control text-uppercase" id="ingreso_mensual_padre" name="ingreso_mensual_padre" value="<?php echo $infoPadre["ingreso_mensual_padre"]; ?>" maxlength="45">
                <small id="Ingreso_Mensual_Help" class="form-text text-muted">Total de percepciones, sin descuentos (impuestos, hipotecas, préstamos, etc.),
                sin centavos</small>
            </div>
            <div class="form-group col-md-4">
                <label for="ingreso_mensual_padre"><b>Ingresos Adicionales:</b></label>
                <input type="text" class="form-control text-uppercase" id="ingreso_mensual_padre" name="ingreso_mensual_padre" value="<?php echo $infoPadre["ingreso_mensual_padre"]; ?>" maxlength="45">
                <small id="Ingreso_Adicional_lHelp" class="form-text text-muted">Escribir unicamente números, no poner comas<br>(Ejemplo: Si paga $2,154.50 escriba solo $2154)</small>
            </div>
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
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="actividad_madre"><b><span class="text-danger"> *</span> Realiza alguna actividad remunerada:</b></label>
            <select name="actividad_madre" id="actividad_madre" class="form-control">
                <option selected value="0">SELECCIONE OPCIÓN</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
            <small id="actividad_madre_Help" class="form-text text-muted">Requerido para ingresar datos económicos</small>
        </div>
        <div class="form-group col-md-4">
            <label for="lugar_trabajo_madre"><b>Lugar de Trabajo:</b></label>
            <input type="text" class="form-control text-uppercase" id="lugar_trabajo_madre" name="lugar_trabajo_madre" value="<?php echo $infomadre["lugar_trabajo_madre"]; ?>" maxlength="45">
        </div>
        <div class="form-group col-md-4">
            <label for="ocupacion_madre"><b>Ocupación/Cargo:</b></label>
            <input type="text" class="form-control text-uppercase" id="ocupacion_madre" name="ocupacion_madre" value="<?php echo $infomadre["ocupacion_madre"]; ?>" maxlength="45">
        </div>
        <div class="form-group col-md-4">
            <label for="ingreso_mensual_madre"><b>Ingreso Mensual:</b></label>
            <input type="text" class="form-control text-uppercase" id="ingreso_mensual_madre" name="ingreso_mensual_madre" value="<?php echo $infomadre["ingreso_mensual_madre"]; ?>" maxlength="45">
            <small id="Ingreso_Mensual_Help" class="form-text text-muted">Total de percepciones, sin descuentos (impuestos, hipotecas, préstamos, etc.),
            sin centavos</small>
        </div>
        <div class="form-group col-md-4">
            <label for="ingreso_mensual_madre"><b>Ingresos Adicionales:</b></label>
            <input type="text" class="form-control text-uppercase" id="ingreso_mensual_madre" name="ingreso_mensual_madre" value="<?php echo $infomadre["ingreso_mensual_madre"]; ?>" maxlength="45">
            <small id="Ingreso_Adicional_lHelp" class="form-text text-muted">Escribir unicamente números, no poner comas<br>(Ejemplo: Si paga $2,154.50 escriba solo $2154)</small>
        </div>
    </div>
</div>
<hr>
<!-- **************************************************************************************************************************  -->
<!-- Datos de los Hermanos -->
<!-- **************************************************************************************************************************  -->
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
    <div class="form-group col-md-2">
        <label for="curp_hermano"><b>CURP:</b></label>
        <input type="text" class="form-control text-uppercase" id="curp_hermano" name="curp_hermano" value="" maxlength="18">
    </div>
    <div class="form-group col-md-2">
        <label for="nombre_hermano"><b>Nombre completo:</b></label>
        <input type="text" class="form-control text-uppercase" id="nombre_hermano" name="nombre_hermano" value="" maxlength="45">
    </div>
    <div class="form-group col-md-2">
        <label for="primer_apellido_hermano"><b>Primer apellido:</b></label>
        <input type="text" class="form-control text-uppercase" id="primer_apellido_hermano" name="primer_apellido_hermano" value="" maxlength="45">
    </div>
    <div class="form-group col-md-2">
        <label for="segundo_apellido_hermano"><b>Segundo apellido:</b></label>
        <input type="text" class="form-control text-uppercase" id="segundo_apellido_hermano" name="segundo_apellido_hermano" value="" maxlength="45">
    </div>
    <div class="form-group col-md-4">
        <label for="parentesco_hermanos"><b><span class="text-danger"> * </span>Parentesco:</b></label>
        <select class="form-control" id="parentesco_hermanos" name="parentesco_hermanos">
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
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <button type="button" id="btnAgregarHermanos" class="btn btn-secondary">Agregar</button>
        <button type="button" id="btnVer" class="btn btn-secondary">Ver</button>
    </div>
</div>
<div class="form-row">
    <div class="col-md-12">
    <table class="table table-sm table-sm table-bordered" id="tablaHermanos"></table>
</div>
</div>
</fieldset>
<hr>
<!-- **************************************************************************************************************************  -->
<!-- Botón Guardar -->
<!-- **************************************************************************************************************************  -->
<fieldset>
<legend><span class="mdi mdi-chevron-right-box mdi-24px text-secondary"></span> Ingrese los datos del Tutor</legend>
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
<hr>
<div class="col-md-12 alert alert-dismissible alert-warning" role="alert">
            <ul>
                <li class="text-uppercase"><b>Antes de continuar a la siguiente sección, revise que los datos sean correctos, una vez guardados  se inhabilita su modificación.</b></li>
            </ul>
        </div>
</fieldset>
<fieldset>    
    <div class="form-row">
        
        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
        <input type="hidden" name="municipio_id" id="municipio_id" value="<?php echo $infoCP["municipio_id"]; ?>">
        <input type="hidden" name="cp_id" id="cp_id" value="<?php echo $infoCP["cp_id"]; ?>">
        <button type="button" id="btnPersonales" class="btn btn-primary">Guardar y continuar con el registro.</button>
    </div>
</fieldset>
</form>