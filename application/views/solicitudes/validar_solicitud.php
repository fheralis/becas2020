<?php 
  //$curp=$this->session->userdata("bcurp"); 
  //$url=base_url()."index.php/test/index/".$curp;
  //$regresar=base_url()."index.php/solicitudes/registro/";

  $solicitante=$datos["nombres"]." ".$datos["primer_apellido"]." ".$datos["segundo_apellido"]." <b>CURP:</b> ".$datos["curp"];
  $domicilio=$datos["calle"].", Número: ".$datos["numero"];
  $cp=$datos["asentamiento"]." <b>C.P.:</b>".$datos["cp"].", ".$datos["municipio_cp"];
  $tutor=$datos["nombres_tutor"]." ".$datos["primer_apellido_tutor"]." ".$datos["segundo_apellido_tutor"];
  $tutorAll=$datos["nombres_tutor"]." ".$datos["primer_apellido_tutor"]." ".$datos["segundo_apellido_tutor"].", <b>CURP:</b> ".$datos["curp_tutor"].", Percepción: $".$datos["percepcion"];
  $escuela=$datos["nombre_escuela"]." <b>CCT:</b> ".$datos["cct"];
  $nivel=$datos["nivel_educativo"];

  $p=$padre["nombres"]." ".$padre["primer_apellido"]." ".$padre["segundo_apellido"]." - ".$padre["curp"];
  $m=$madre["nombres"]." ".$madre["primer_apellido"]." ".$madre["segundo_apellido"]." - ".$madre["curp"];

?>
  <div class="row">
    <div class="offset-md-1 col-md-10">
      <div class="card border-light mb-1">
        <div class="card-header bg-dark text-white"><h1><?php echo $titulo; ?></h1></div>
        <div class="card-body">
          <div class="row">

            

            <div class="jumbotron">
              <div class="col-sm-12">
                <h3>Datos del Solicitante</h3>
                <p><b>Folio: </b><span><?php echo $datos["solicitud_id"];?></span><?php echo nbs(5); ?><b>Nombre del Solicitante: </b><span><?php echo $solicitante;?></span></p>
                <p><b>Domicilio: </b><span><?php echo $domicilio;?></span> <b>Colonia/Localidad: </b><span><?php echo $cp;?></span></p>
                <p><b>Nombre del Responsable de Egresos: </b><span><?php echo $tutor;?></span> <b> Ingresos: </b><span> $<?php echo $datos["percepcion"];?></span></p>
                <p><b>Escuela: </b><span><?php echo $escuela;?></span><?php echo nbs(5); ?><b>Nivel Educativo: </b><span><?php echo $nivel;?></span></p>
                <p><b>Grado cursado: </b><span><?php echo $datos["grado_cursado"];?></span><b> Grado a cursar: </b><span><?php echo $datos["grado_cursar"];?></span></p>
                
                <p><b>Padre: </b><span><?php echo $p; ?></span></p>
                <p><b>Madre: </b><span><?php echo $m; ?></span></p>


                <hr class="my-3">


                <div class="col-md-12">
                  <div class="alert alert-dismissible alert-danger" id="alert">
                    <p></p>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <h3>Documentos Entregados</h3>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <ul>
                        <li class="row">
                          <div class="form-check col-md-6"><b>Documentos</b></div>
                          <div class="col-md-6" ><b>Observaciones</b></div>
                        </li>
    <?php foreach($documentos as $docto): ?>
                        <li class="row">
                          <div class="form-check col-md-6">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="d<?php echo $docto["documento_id"] ?>" id="d<?php echo $docto["documento_id"] ?>" value="1" >
                              <?php echo $docto["orden"] . " - " . $docto["nombre"]; ?>
                            </label>
                          </div>
                          <div class="col-md-6" >
                            <textarea class="col-md-12" name="o<?php echo $docto["documento_id"]; ?>" id="o<?php echo $docto["documento_id"]; ?>" rows="2"></textarea>
                          </div>
                        </li>
    <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>

                
                <hr class="my-3">

                
                <div class="col-md-12">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="logs"><b><span class="text-danger"> * </span>Log de Evaluación:</b></label>
                      <select class="form-control" id="logs" name="logs">
              <?php foreach ($logs as $log): ?>
    <!--           <?php 
                      if($info['municipio_id']==$municipio_conv["municipio_id"]): 
                        $selected="selected";
                      else:
                        $selected="";
                      endif 
              ?> -->
                        <option <?php //echo $selected; ?> value="<?php echo $log["log_id"]; ?>"><?php echo $log["tipo"]." - ".$log["descripcion"]; ?></option>

              <?php endforeach ?>
                      </select>
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label for="">.</label>
                      <br>
                      <input type="hidden" name="folio" id="folio" value="<?php echo $folio; ?>">
                      <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                      <button type="button" id="btnTerminar" class="btn btn-primary">Terminar validación</button>
                    </div>

                  </div>

                </div>




              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

<?php echo br(1); ?>

<!-- <script src="<?php echo base_url(); ?>sources/js/functjs.js" type="text/javascript" ></script>    -->
<script src="<?php echo base_url(); ?>sources/js/solicitudes/validar_solicitud.js" type="text/javascript" ></script>