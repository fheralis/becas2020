<?php 
	function header_comprobante($pdf){
		$url=FCPATH."sources/img/SETAB_COLOR.png";
		$pdf->Image($url,20,10,60,20,'PNG','');
		$pdf->SetTextColor(10,10,10);
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(65,8,'', 0, 0, 'R', false);
		$pdf->Cell(125,8,utf8_decode('Subsecretaría de Planeación y Evaluación'), 0, 1, 'L', false);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(65,4,'', 0, 0, 'R', false);
		$pdf->Cell(125,8,utf8_decode('Dirección de Becas'), 0, 1, 'L', false);

		$pdf->Ln(6);
		$pdf->SetFont('Arial','I',8);
		$pdf->Cell(180,8,utf8_decode('"2019, Año del Caudillo del Sur, Emiliano Zapata"'), 0, 1, 'L', false);

	}

	foreach($ccts as $info) {
		$pdf-> SetLeftMargin(20);

		$pdf->AddPage('P','Letter');
		header_comprobante($pdf);
	
		$pdf->Ln(20);
		$pdf->SetFont('Arial','',10);

		$pdf->Cell(180,4,utf8_decode("Asunto: Invitación."), 0, 1, 'R', false);
		$pdf->Cell(180,4,utf8_decode("Villahermosa, Tabasco, a 8 de octubre de 2019."), 0, 1, 'R', false);

		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(180,4,utf8_decode($info["director"]), 0, 1, 'L', false);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(180,4,'('.utf8_decode($info["cct"]).") ".utf8_decode($info["nombre_escuela"]), 0, 1, 'L', false);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(180,4,utf8_decode("P r e s e n t e"), 0, 1, 'L', false);

		$pdf->Ln(4);
		$pdf->SetFont('Arial','',12);
		$txt=utf8_decode("Hago de su conocimiento que el próximo día jueves 10 de octubre del presente año se llevará a efecto la entrega de beneficios del Programa para el Otorgamiento de Becas en Escuelas Particulares de Educación Básica y Media Superior.");
		$pdf->MultiCell(180,5,$txt,0,'J',false);
		$pdf->Ln(3);
		$pdf->SetFont('Arial','',12);
		$txt=utf8_decode("Dado lo anterior es grato nos distinga con su valiosa presencia. El evento se efectuará en la fecha citada, a las 10:00 horas, en el Auditorio de la Academia de Policía del Estado de Tabasco, ubicado en Avenida 16 de Septiembre, S/N, esquina Carlos Pellicer Cámara, C.P. 86190, Villahermosa, Tabasco.");
		$pdf->MultiCell(180,5,$txt,0,'J',false);
		$pdf->Ln(3);
		$pdf->SetFont('Arial','',12);
		$txt=utf8_decode("Sin otro particular, aprovecho la ocasión para saludarle con afecto.");
		$pdf->MultiCell(180,5,$txt,0,'J',false);

		$pdf->Ln(40);

		// $pdf->Line(70,180,150,180);
		$url_firma=FCPATH."sources/img/firma.jpg";
		$pdf->Image($url_firma,85,150,45,30,'JPG','');
		$pdf->Cell(180,5,utf8_decode("Profra. Gabriela Yazmín Pérez Maiza"),0,1, 'C',false);
		$pdf->Cell(180,5,utf8_decode("Directora"),0,1, 'C',false);
		// $pdf->SetFont('Arial','B',12);
		// $pdf->Cell(180,5,utf8_decode("Lic. Guillermo Narváez Osorio"),0,1, 'C',false);
		// $pdf->SetFont('Arial','',12);
		// $pdf->Cell(180,5,utf8_decode("Secretario"),0,1, 'C',false);

		
		$pdf->Ln(55);	
		$pdf->SetFont('Arial','',8);	
		$pdf->SetTextColor(255,255,255);
		$pdf->SetFillColor(157,36,73);
		$pdf->Cell(180,8,utf8_decode("Héroes del 47 S/N, Col. Gil y Sáenz, C.P, 86080 Villahermosa, Tabasco, Mx Tel. (993) 3 13 90 59"), 0, 1, 'C',true);

	}

	
	$pdf->Output('invitaciones_2019.pdf', 'I');
?>