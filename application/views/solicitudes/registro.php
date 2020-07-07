	<div class="row">
		<div class="offset-md-1 col-md-10">
			<div class="card border-light mb-3">
				<div class="card-header bg-dark text-white"><h1><?php echo $titulo; ?></h1></div>
				<div class="card-body">

					<div class="col-md-12 alert alert-dismissible alert-warning" role="alert">
					  <ul>
					    <li class="text-uppercase"><b>Los datos marcados con un asterisco (<span class="text-danger"> * </span>) son obligatorios y sin ellos no podrá completar el registro.</b></li>
					  </ul>
					</div>

					<div class="row">
						<div class="col-md-12">
							<ul class="nav nav-tabs">
							  <li class="nav-item col-md-4">
							    <a class="nav-link active" id="tab-personales" data-toggle="tab" href="#personales"><h5><b>
							    	<span class="mdi mdi-numeric-1-box-multiple-outline mdi-24px"></span>
							    Datos Personales
							    	<span class="mdi mdi-24px text-success" id="span-1"></span>
							  </b></h5></a>
							  </li>
							  <li class="nav-item col-md-4">
							  	<!-- disabled -->
							    <a class="nav-link disabled" id="tab-academicos" data-toggle="tab" href="#academicos"><h5><b>
							    	<span class="mdi mdi-numeric-2-box-multiple-outline mdi-24px"></span>
							    Datos Académicos
							    	<span class="mdi mdi-24px text-success" id="span-2"></span>
							  	</b></h5></a>
							  </li>
							  <li class="nav-item col-md-4">
							  	<!-- disabled -->
							  	<a class="nav-link disabled" id="tab-socioeconomicos" data-toggle="tab" href="#socioeconomicos"><h5><b>
							    	<span class="mdi mdi-numeric-3-box-multiple-outline mdi-24px"></span>
							    Datos Socioeconómicos
							    	<span class="mdi mdi-24px text-success" id="span-3"></span>
							  	</b></h5></a>
							  </li>
							</ul>
							<div id="myTabContent" class="tab-content">
<!-- TAB QUE MUESTRA LA VISTA DE DATOS PERSONALES -->
							  <div class="tab-pane fade show active" id="personales">
									<?php $this->load->view('solicitudes/personales'); ?>
							  </div>
<!-- TAB QUE MUESTRA LA VISTA DE DATOS ACADEMICOS -->
							  <div class="tab-pane fade" id="academicos">
							    <?php $this->load->view('solicitudes/academicos'); ?>
							  </div>
<!-- TAB QUE MUESTRA LA VISTA DE DATOS SOCIOECONOMICOS -->
							  <div class="tab-pane fade" id="socioeconomicos">
									<?php $this->load->view('solicitudes/socioeconomicos'); ?>
							  </div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	
<script src="<?php echo base_url();?>sources/js/functjs.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>sources/js/solicitudes/registro.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>sources/js/solicitudes/personales.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>sources/js/solicitudes/academicos.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>sources/js/solicitudes/socioeconomicos.js" type="text/javascript" ></script>