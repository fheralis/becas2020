	<main role="main">
	  <div class="jumbotron">
	    <div class="container">
				<form method="post" role="form" class="frmEstudio" id="frmEstudio">
					<fieldset>
						<legend> - Estudio Socioeconomico</legend>
<?php foreach($preguntas as $pregunta): ?>
						<div class="form-row">
					    <div class="form-group col-md-6">
					      <label for=""><b><?php echo $pregunta["orden"]." - ".$pregunta["pregunta"]; ?></b></label>
					      <select data-libre="<?php echo $pregunta["respuesta_libre"]; ?>" onchange="verVal(this);" id="<?php echo $pregunta["pregunta_id"]; ?>" name="<?php echo $pregunta["pregunta_id"]; ?>" class="form-control">
									<option data-libre="N" value="0">ELIJA UNA OPCIÓN</option>
	<?php $respuestas=$this->model_respuestas->gets_respuestas($pregunta["pregunta_id"]); ?>
	
	<?php foreach($respuestas as $respuesta): ?>
		
									<option data-libre="<?php echo $respuesta["respuesta_libre"]; ?>" value="<?php echo $respuesta["respuesta_id"]; ?>"><?php echo $respuesta["respuesta"];?></option>

	<?php endforeach; ?>

					      </select>
					    </div>
	<?php if($pregunta["respuesta_libre"]=="S"): ?>
					    <div class="form-group col-md-6" id="div<?php echo $pregunta["pregunta_id"]; ?>" style="display:none;">
					      <label for="">.</label>
					      <input type="text" class="form-control text-uppercase" name="<?php echo $pregunta["pregunta_id"]."-".$respuesta["respuesta_id"]; ?>" id="<?php echo $pregunta["pregunta_id"]."-".$respuesta["respuesta_id"]; ?>" placeholder="">
					    </div>
	<?php endif; ?>
					  </div>
<?php endforeach; ?>
					</fieldset>

					<button type="submit" class="btn btn-primary">Guardar</button>

				</form>

	  <!-- <div class="container">
	    <div class="row">
	      <div class="col-md-4">
	        <h2>Heading</h2>
	        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
	        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
	      </div>
	      <div class="col-md-4">
	        <h2>Heading</h2>
	        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
	        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
	      </div>
	      <div class="col-md-4">
	        <h2>Heading</h2>
	        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
	        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
	      </div>
	    </div>
	    <hr>
	  </div>  -->

	</main>

	<script src="<?php echo base_url();?>sources/js/test/preguntas.js" type="text/javascript" ></script>