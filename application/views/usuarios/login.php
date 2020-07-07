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
					      <h1 class="h3 mb-3 font-weight-normal">Inicio de sesión</h1>
					      <div class="form-row">

					        <div class="alert alert-dismissible alert-danger text-left" id="alert">
					          <p></p>
					        </div>

					        <div class="form-group col-md-12">
					          <!-- <label for="usuario">Usuario</label> -->
					          <input type="text" class="form-control" id="usuario" placeholder="Usuario">
					        </div>
					        <div class="form-group col-md-12">
					          <!-- <label for="pass">Password</label> -->
					          <input type="password" class="form-control" id="pass" placeholder="Password">
					        </div>
					      </div>

					      <!-- <div id="ico-loading" class="spinner-border m-2 text-primary" role="status">
					        <span class="sr-only">Loading...</span>
					      </div> -->
      
					      <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
					      <!-- <span id="ico-loading" class="mdi mdi-loading mdi-48px mdi-spin text-primary"></span> -->
					      <button type="buttom" id="btnIniciar" class="btn btn-block btn-primary">Iniciar sesión</button>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="<?php echo base_url(); ?>sources/js/usuarios/login.js" type="text/javascript" ></script>
