	<div class="row">
		<div class="offset-md-1 col-md-10">
			<div class="card border-light mb-3">
				<div class="card-header bg-dark text-white"><h1><?php echo $titulo . $this->sistema->tnc[$tnc]; ?></h1></div>
				<div class="card-body">

					<div class="col-md-12 alert alert-dismissible alert-warning" role="alert">
					  <ul>
					    <li class="text-uppercase">Ingrese la <b>CURP del solicitante</b> conforme a la letra que le corresponde en el calendario el día de hoy.</li>
					  </ul>
					</div>

					<div class="row">
						<a class="btn btn-link" href="<?php echo base_url(); ?>index.php/convocatorias/"><h3>Regresar...</h3></a>
					</div>

					<div class="row">
						<div class="offset-md-3 col-md-6">
							<div class="alert alert-dismissible alert-danger text-left" id="alert">
			          <p></p>
			        </div>
							<form>
							  <fieldset>
							    <legend class="text-uppercase"><b>
										<span class="mdi mdi-lock text-primary"></span>
							    	<?php echo $this->sistema->tnc[$tnc]; ?></b></legend>							
							    <div class="form-row">
							    	<div>
							    		<p><b>Letras para registro de hoy: <?php echo $letras['letras']; ?></b></p>
							    	</div>
							      <div class="form-group col-md-12">
							        <label for="curp"><b>CURP del Solicitante:</b></label>
							        <input type="text" class="form-control" id="curp" name="curp" value=""  maxlength="18">
							        <small id="grado_cursadoHelp" class="form-text text-muted">Ingrese su <b>CURP</b> conforme a la letra que le corresponde en el calendario el día de hoy.</small>
							      </div>
							    </div>
								</fieldset>
							  <fieldset>
							    <div class="form-row">
							    	<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
							    	<input type="hidden" id="tnc" name="tnc" value="<?php echo $tnc; ?>">
							      <button type="button" id="btnIngresar" class="btn btn-primary btn-block">Ingresar al registro</button>
							    </div>
							  </fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="<?php echo base_url();?>sources/js/functjs.js" type="text/javascript" ></script>
<script src="<?php echo base_url(); ?>sources/js/convocatorias/acceso.js" type="text/javascript" ></script>