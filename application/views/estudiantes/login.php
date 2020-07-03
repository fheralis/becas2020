	<div class="row">
		<div class="offset-md-1 col-md-10">
			<div class="card border-light mb-3">
				<div class="card-header bg-dark text-white"><h1></h1></div>
				<div class="card-body">

					<div class="row">
						<div class="offset-md-3 col-md-6">						

								<center>
									<span style="font-size: 120px;" class="mdi mdi-account-circle text-secondary"></span>
					      </center>
					      <h1 class="h3 mb-3 font-weight-normal">Acceso</h1>
					      <div class="form-row">

					        <div class="alert alert-dismissible alert-danger text-left" id="alert">
					          <p></p>
					        </div>

					        <div class="form-group col-md-12">
					          <input type="text" class="form-control" id="curp" placeholder="CURP">
					        </div>
					        <div class="form-group col-md-12">
					          <input type="password" class="form-control" id="clave" placeholder="Clave de acceso">
					        </div>
					      </div>
     
					      <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
					      <button type="buttom" id="btnIniciar" class="btn btn-block btn-primary">Iniciar sesión</button>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="<?php echo base_url(); ?>sources/js/estudiantes/login.js" type="text/javascript" ></script>
