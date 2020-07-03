	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<img src="<?php echo base_url(); ?>sources/img/logob.png" alt="" title="">
		<?php echo nbs(10); ?>
		<h1 class="navbar-brand">
			<b>Sistema Electrónico de Asignación de Becas</b>
		</h1>

  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
	  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
	    <ul class="navbar-nav ml-auto">
<?php if($this->session->userdata("elogin")): ?>
	      <li class="nav-item active">
	        <a class="nav-link" href="<?php echo base_url(); ?>index.php/estudiantes/salir">Salir</a>
	      </li>
<?php endif; ?>	  
<?php if(!$this->session->userdata("blogin")): ?>
	      <!-- <li class="nav-item active">
	        <a class="nav-link" href="<?php echo base_url(); ?>">Inicio</a>
	      </li> -->
<?php endif; ?>	      
<?php if($this->session->userdata("blogin")): ?>
<!-- 			<?php if($this->session->userdata("btab")==3): ?>
				<li class="nav-item active">
	        <a class="nav-link" href="<?php echo base_url(); ?>index.php/solicitudes/detalles"> Detalles del Registro. </a>
	      </li>
			<?php endif; ?>

				<li class="nav-item active">
	        <a class="nav-link" href="<?php echo base_url(); ?>index.php/solicitudes/salir"> Salir. </a>
	      </li> -->
<?php endif; ?>


<?php if($this->session->userdata("bulogin")): ?>
	      <li class="nav-item active">
	        <a class="nav-link" href="<?php echo base_url(); ?>index.php/solicitudes/validar">Validar</a>
	      </li>
		  
		  <li class="nav-item active">
	        <a class="nav-link" target="_blank" href="https://www.gob.mx/curp/">RENAPO</a>
	      </li>
			
		


	      <li class="nav-item active">
	        <a class="nav-link" href="<?php echo base_url(); ?>index.php/convocatorias/salir"> Salir. </a>
	      </li>
<?php endif; ?>	 





	    </ul>
	  </div>
	</nav>

	