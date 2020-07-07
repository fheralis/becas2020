	<div class="row">
		<div class="offset-md-2 col-md-8">
			<div class="card border-light mb-3">
				<div class="card-header bg-dark text-white"><h1><?php echo $titulo; ?></h1></div>
				<div class="card-body">
					
					<h3>10.57.18.80</h3>
					<div class="row">
						<ul>
<?php foreach($preguntas as $pregunta): ?>
							<li><?php echo $pregunta["pregunta"]; ?></li>
<?php endforeach ?>
						</ul>
					</div>

					<br>
					<h3>192.168.12.23</h3>
					<div class="row">
						<ul>
<?php foreach($alumnos["alumnos"] as $alumno): ?>
							<li><?php echo $alumno["nombre"]; ?></li>
<?php endforeach ?>
						</ul>
					</div>
					<div class="row">
						<p><b>Total:</b><span><?php echo $alumnos["cont"]; ?></span></p>
					</div>


				</div>
			</div>
		</div>
	</div>