<?php $selected=''; ?>
<br>
<div class="col-md-12">
  <div class="alert alert-dismissible alert-danger" id="alertAcademicos">
    <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
    <p></p>
  </div>
</div>

<!-- INFORMACIO DEL ACADEMICOS -->
<form id="formAcademicos">
  <!-- INFORMACION DEL CICLO ESCOLAR CURSADO -->
  <fieldset>
    <legend class="text-uppercase"><b>Datos del Ciclo Escolar Cursado</b></legend>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="grado_cursado"><b><span class="text-danger"> * </span>Grado cursado:</b></label>
        <input type="text" class="form-control" id="grado_cursado" name="grado_cursado" value="<?php echo $info["grado_cursado"]; ?>" onkeypress="return isNumberInt(this);" maxlength="1">
        <small id="grado_cursadoHelp" class="form-text text-muted"> En niveles medio o superior redondear semestres o cuatrimestres a años. <br>Por ejemplo si cursarás el 3er semestre, escribe 2 </small>
      </div>
      <div class="form-group col-md-4">
        <label for="promedio_general"><b><span class="text-danger"> * </span>Promedio general:</b></label>
        <input type="text" class="form-control" id="promedio_general" name="promedio_general" value="<?php echo $info["promedio_general"]; ?>" onkeypress="return filterFloat(event,this);" maxlength="4" >
      </div>
      <div class="form-group col-md-4">
        <label for="promedio_basicas"><b><span class="text-danger"> * </span>Promedio de materias básicas:</b></label>
        <input type="text" class="form-control" id="promedio_basicas" name="promedio_basicas" value="<?php echo $info["promedio_basicas"]; ?>" onkeypress="return filterFloat(event,this);" maxlength="4">
        <button type="button" id="btnMateriasBasicas" class="btn btn-link"><b>Ver ejemplo de materias básicas.</b></button>
      </div>
    </div>
  </fieldset>
	<br>
  <!-- INFORMACIO DEL CICLO ESCOLAR A CURSAR -->
  <fieldset>
    <legend class="text-uppercase"><b>Datos del Ciclo Escolar a Cursar (El alumno deberá estar inscrito)</b></legend>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="municipios_escuela"><b><span class="text-danger"> * </span>Municipio donde se encuentra la escuela:</b></label>
        <select class="form-control" id="municipios_escuela" name="municipios_escuela">
          <option value="0">SELECCIONE UNA OPCIÓN</option>
<?php foreach ($municipios_conv as $municipio_conv): ?>
<?php 
        if($info['municipio_id']==$municipio_conv["municipio_id"]): 
          $selected="selected";
        else:
          $selected="";
        endif 
?>
          <option <?php echo $selected; ?> value="<?php echo $municipio_conv["municipio_id"]; ?>"><?php echo $municipio_conv["municipio"]; ?></option>

<?php endforeach ?>
        </select>
      </div>
      <div class="form-group form-group col-md-4">
        <label for="niveles_educativos"><b><span class="text-danger"> * </span>Nivel educativo de la escuela:</b></label>

        <div id="divNivelesEducativos">
          <select id='niveles_educativos' name='niveles_educativos' class='form-control'>  
          </select>
        </div>

      </div>
    </div>
    <div class="form-row">
    	<div class="form-group form-group col-md-12">
        <label for="escuelas"><b><span class="text-danger"> * </span>Escuela donde cursará el proximo ciclo escolar:</b></label>
        
        <div id="divCCTs">
          <select id='ccts' name='ccts' class='form-control'></select>
        </div>

      </div>
    </div>
    <div class="form-row">
    	<div class="form-group form-group col-md-4">
      	<label for="grado_cursar"><b><span class="text-danger"> * </span>Grado a cursar:</b></label>
       	<input type="text" class="form-control" id="grado_cursar" name="grado_cursar" value="<?php echo $info["grado_cursar"]; ?>" onkeypress="return isNumberInt(this);" maxlength="1" >
        <small id="grado_cursarHelp" class="form-text text-muted"> En niveles medio o superior redondear semestres o cuatrimestres a años. <br>Por ejemplo si cursarás el 3er semestre, escribe 2 </small>
      </div>
    </div>
  </fieldset>
  <br>
  <fieldset>
    <div class="form-row">
      <input type="hidden" name="municipio_id" id="municipio_id" value="<?php echo $infoCP["municipio_id"]; ?>">
      <button type="button" id="btnAcademicos" class="btn btn-primary">Guardar y continuar con el registro.</button>
    </div>
  </fieldset>
</form>





<!-- MODAL PARA MATERIAS BASICAS -->
<div class="modal fade bd-example-modal-lg" id="messageEjemploMateriasBasicas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Ejemplo para materias básicas</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
          <div class="col-md-6">
            <p>Ejemplo para obtener el promedio en <b>MATERIAS BÁSICAS</b> en educación secundaria:</p>
            <table class="table table-sm table-hover table-bordered ">
              <thead>
                <tr>
                  <th scope="col">MATERIA</th>
                  <th scope="col">CALIFICACIÓN</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row">Español</td>
                  <td>8.7</td>
                </tr>
                <tr>
                  <td scope="row">Matemáticas</td>
                  <td>7.0</td>
                </tr>
                <tr>
                  <td scope="row">Historia Universal</td>
                  <td>9.0</td>
                </tr>
                <tr>
                  <td scope="row">Geografía de México</td>
                  <td>9.8</td>
                </tr>
                <tr>
                  <td scope="row">Formación Cívica y Ética</td>
                  <td>9.0</td>
                </tr>
                <tr>
                  <td scope="row">Biología</td>
                  <td>9.3</td>
                </tr>
                <tr>
                  <td scope="row">Química</td>
                  <td>8.0</td>
                </tr>
                <tr>
                  <td scope="row">Física</td>
                  <td>8.8</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th scope="row">Materias Básicas</th>
                  <td>69.6/8 = 8.7</td>
                </tr>
              </tfoot>
            </table>
          </div>

          <div class="col-md-6">
            <p>No se toman en cuenta:</p>
            <table class="table table-sm table-hover table-bordered ">
              <thead>
                <tr>
                  <th scope="col">MATERIA</th>
                  <th scope="col">CALIFICACIÓN</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row">Expresión y Apreciación Artísticas</td>
                  <td>9.8</td>
                </tr>
                <tr>
                  <td scope="row">Lengua Extranjera</td>
                  <td>9.9</td>
                </tr>
                <tr>
                  <td scope="row">Educación Física</td>
                  <td>9.0</td>
                </tr>
                <tr>
                  <td scope="row">Educación Tecnológica</td>
                  <td>8.0</td>
                </tr>
              </tbody>
            </table>

            <p><b>NOTAS:</b></p>
            <ul>
              <li>Verificar su convocatoria para ver las materias que aplican </li>
              <li>Niveles Preescolar e Inicial no requieren promedio </li>
            </ul>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        
        <input type="hidden" name="tnc" id="tnc" value="<?php echo $this->session->btnc; ?>">
  
        <input type="hidden" name="nivel_educativo_id" id="nivel_educativo_id" value="<?php echo $info["nivel_educativo_id"]; ?>">
        <input type="hidden" name="cct_id" id="cct_id" value="<?php echo $info["cct_id"]; ?>">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      
      </div>
    </div>
  </div>
</div>