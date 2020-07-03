<?php

	$pids=array(64,13,69,79,100,57,107,35,70,204,213,47,27,93,40,162,21,168,42,46,25);
	
	$alta_demanda=false;
	$cont=0;

	//$pdf = new PDF();
	$pdf->AddPage('P','Letter');
	//$pdf->Image('http://www.setab.gob.mx/img/escudo.jpg',20,10,30,30,'JPG','');
	$pdf->Image('http://localhost/img/SETAB_COLOR.png',10,10,50,20,'PNG','');
	
	$pdf->SetTextColor(10,10,10);
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(55,8,'', 0, 0, 'R', false);
	$pdf->Cell(125,8,utf8_decode('Secretaría de Educación'), 0, 1, 'L', false);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(55,4,'', 0, 0, 'R', false);
	$pdf->Cell(125,4,utf8_decode('Subsecretaria de Educación Media y Superior'), 0, 1, 'L', false);
	$pdf->Cell(55,4,'', 0, 0, 'R', false);
	$pdf->Cell(125,4,utf8_decode('Dirección de Educación Media'), 0, 1, 'L', false);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(55,4,'', 0, 0, 'R', false);
	$pdf->Cell(125,10,utf8_decode('Comprobante Credencial de Registro en línea'), 0, 1, 'L', false);
	//$pdf->Image('http://www.setab.gob.mx/img/ttabasco.jpg',160,5,30,35,'JPG','');
	//$pdf->Image('http://localhost/pu/img/ttabasco.jpg',160,5,30,35,'JPG','');
	
	
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,2,'', 0, 1, 'R', false);
	$pdf->Cell(190,4,utf8_decode('Proceso de Ingreso a la Educación Media 2019, "Examen Único"'), 0, 1, 'R', false);
	$pdf->Cell(190,4,utf8_decode('Ciclo escolar 2019-2020'), 0, 1, 'R', false);
	
	$pdf->Ln(4);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(32,10,"FOLIO: ".$datos_solicitud['id'], 0, 0, 'L', false);
	$pdf->Cell(155,10,"COSTO DEL EXAMEN : $ 60.00 (SESENTA PESOS 00/100 M.N)", 0, 1, 'L', false);
	$pdf->Cell(32,8,'', 0, 0, 'C', false);
	$pdf->Cell(155,8,"FECHA: ".$datos_solicitud['fecha_solicitud']."                                        ESTATUS: ".$datos_solicitud['nombre_estatus'], 0, 1, 'L', false);
	$pdf->Cell(32,8,'', 0, 0, 'C', false);
	$pdf->Cell(155,8,"CURP: ". strtoupper($datos['curp']), 0, 1, 'L', false);
	$pdf->Cell(32,8,'FOTO', 0, 0, 'C', false);
	$pdf->Cell(155,8,utf8_decode("NOMBRE: ".$datos['nombres']." ".$datos['apellido_paterno']." ".$datos['apellido_materno']), 0, 1, 'L', false);
	$pdf->Cell(32,8,'', 0, 0, 'C', false);
	$pdf->Cell(155,8,utf8_decode("DIRECCIÓN: ".$datos['domicilio_linea1']), 0, 1, 'L', false);
	
	$pdf->Rect(10,52,28,8,'D');//folio
	$pdf->Rect(10,62,28,32,'D');//foto
	$pdf->Rect(40,52,155,42,'D');//contenido
	
	$pdf->Ln(2);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(155,8,utf8_decode("EXAMEN:"), 0, 1, 'L', false);
	
	$pdf->SetFont('Arial','',10);
	$txt=utf8_decode("Tomando como base su primera opción, usted debe presentarse el 14 DE JUNIO DEL 2019 A LAS 9:00 A.M. para presentar su examen en modalidad: ESCRITO en el plantel ".$info_plantel['nombre_plantel']." ubicado en ".$info_plantel['ubicacion']." del municipio ".$info_plantel['nombre_municipio']." mostrando este comprobante credencial.");
	$pdf->MultiCell(180,5,$txt,0,'J',false);
	
	$pdf->Ln(2);
	
	$pdf->SetFillColor(157,36,73);
	$pdf->SetTextColor(255,255,255);
	
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(190,8,utf8_decode("Importante:"), 0, 1, 'J',true);
	
	$pdf->Ln(2);
	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(0,0,0);
	$txt="1. - Presentar el mismo dia del registro el Comprobante Credencial en dos tantos y con dos fotografías en el plantel seleccionado como primera opción, efectuando el pago de $60.00 (sesenta pesos 00/100 M.N.) por concepto de Costo de Examen y Recibir su Guía Tematica.\n";
	$txt.="2 .- No podrá presentar el examen en otra sede distinta a la elegida.\n";
	$txt.="3 .- Consultar los Resultados del examen el 30 de julio de 2019 en la página http://examenunico.setab.gob.mx  accesando con su CURP.";
	$pdf->MultiCell(190,6,utf8_decode($txt),0, 'L',false);
	
	$pdf->Ln(2);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(190,6,utf8_decode("Opciones elegidas:"), 0, 1, 'L',false);
	
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(15,5,utf8_decode("ORDEN"),0,0, 'L',false);
	$pdf->Cell(30,5,utf8_decode("MUNICIPIO"),0,0, 'L',false);
	$pdf->Cell(60,5,utf8_decode("PLANTEL"),0,0, 'L',false);
	$pdf->Cell(90,5,utf8_decode("ESPECIALIDAD"),0,1, 'L',false);
	$pdf->SetFont('Arial','',7);
	foreach($datos_opciones as $opciones){

		if(in_array($opciones['pid'],$pids) && $alta_demanda==false && $cont==0) {
	    	$alta_demanda=true;
		}
		$cont++;

		$pdf->Cell(15,5,utf8_decode($opciones['orden_preferencia']),0,0, 'L',false);
		$pdf->Cell(30,5,utf8_decode($opciones['nombre_municipio']),0,0, 'L',false);
		$pdf->Cell(60,5,utf8_decode($opciones['nombre_plantel']),0,0, 'L',false);
		$pdf->Cell(90,5,utf8_decode($opciones['nombre_especialidad']),0,1, 'L',false);
	}
	
	if($alta_demanda==true){
		$pdf->Ln(2);
		$pdf->SetFont('Arial','B',10);
		$txt=utf8_decode("Usted elegido un plantel de alta demanda, por lo que el espacio estará sujeto al resultado de la prueba y a la capacidad de absorción del plantel.");
		$pdf->MultiCell(180,5,$txt,0,'J',false);
	}

	$pdf->Ln(2);
	$pdf->SetFont('Arial','B',10);

	$pdf->Ln(20);
	$pdf->SetFont('Arial','',7);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(93,5,utf8_decode($datos['nombres']." ".$datos['apellido_paterno']." ".$datos['apellido_materno']),0,0, 'C',false);
	$pdf->Cell(93,5,utf8_decode($datos['nombres_tutor']." ".$datos['apellido_paterno_tutor']." ".$datos['apellido_materno_tutor']),0,1, 'C',false);
	$pdf->Ln(1);
	$pdf->Cell(93,5,utf8_decode("FIRMA DEL SUSTENTANTE"),0,0, 'C',false);
	$pdf->Cell(93,5,utf8_decode("FIRMA DEL PADRE O TUTOR"),0,0, 'C',false);
	//$pdf->Cell(63,5,utf8_decode("FIRMA DEL APLICADOR"),0,1, 'C',false);
	$pdf->Line(22,220,90,220);
	$pdf->Line(115,220,185,220);
	//$pdf->Line(138,220,196,220);

	$pdf->Ln(12);
	$pdf->SetFont('Arial','B',8);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(190,8,utf8_decode("Calle Juan Álvarez 102 Esq. Simón Sarlat, Col. Centro, Villahermosa, Tab. C.P. 86000"), 0, 1, 'C',true);
	
	$pdf->Output('comprobante.pdf', 'I');
?>
