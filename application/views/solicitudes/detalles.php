	<div class="row">
		<div class="offset-md-1 col-md-10">
			<div class="card border-light mb-3">
				<div class="card-header bg-dark text-white"><h1><?php echo $titulo; ?></h1></div>
				<div class="card-body">

					<div class="row">
        		<div class="col-sm-12">
							
							<h3>Felicidades tu registro esta completo</h3>

<?php 
$curp=$this->session->userdata("bcurp"); 
$url=base_url()."index.php/test/index/".$curp;
$regresar=base_url()."index.php/solicitudes/registro/";


$solicitante=$info["nombres"]." ".$info["primer_apellido"]." ".$info["segundo_apellido"]." <b>CURP:</b> ".$info["curp"];
$domicilio=$info["calle"].", Número: ".$info["numero"];
$cp=$info["asentamiento"]." <b>C.P.:</b>".$info["cp"].", ".$info["municipio_cp"];
$tutor=$info["nombres_tutor"]." ".$info["primer_apellido_tutor"]." ".$info["segundo_apellido_tutor"];
$tutorAll=$info["nombres_tutor"]." ".$info["primer_apellido_tutor"]." ".$info["segundo_apellido_tutor"].", <b>CURP:</b> ".$info["curp_tutor"].", Percepción: $".$info["percepcion"];
$escuela=$info["nombre_escuela"]." <b>CCT:</b> ".$info["cct"];
$nivel=$info["nivel_educativo"];

?>
							
							<h5><b><a target="_blank" href="<?php echo $url; ?>">Imprimir comprobante</a></b></h5>

							<div class="col-sm-12">
								<p><b>Folio: </b><span><?php echo $info["solicitud_id"];?></span></p>
								<p><b>Nombre del Solicitante: </b><span><?php echo $solicitante;?></span></p>
								<p><b>Domicilio: </b><span><?php echo $domicilio;?></span> <b>Colonia/Localidad: </b><span><?php echo $cp;?></span></p>
								<p><b>Nombre del Responsable de Egresos: </b><span><?php echo $tutor;?></span> <b> Ingresos: </b><span> $<?php echo $info["percepcion"];?></span></p>
								<p><b>Escuela: </b><span><?php echo $escuela;?></span><b>Nivel Educativo: </b><span><?php echo $nivel;?></span></p>
								<p><b>Grado cursado: </b><span><?php echo $info["grado_cursado"];?></span><b> Grado a cursar: </b><span><?php echo $info["grado_cursar"];?></span></p>
							</div>

							<h5><b><a target="_blank" href="<?php echo $url; ?>">Imprimir comprobante</a></b></h5>

      			</div>
					</div>

				</div>
			</div>
		</div>
	</div>