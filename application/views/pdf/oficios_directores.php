<?php 
	function header_comprobante($pdf){
		// $url=FCPATH."sources/img/SETAB_COLOR.png";

		// $pdf->Image($url,10,10,60,20,'PNG','');
		// $pdf->Ln(4);
		// $pdf->SetTextColor(10,10,10);
		// $pdf->SetFont('Arial','B',18);
		// $pdf->Cell(65,8,'', 0, 0, 'R', false);
		// $pdf->Cell(125,8,utf8_decode('Secretaría de Educación'), 0, 1, 'L', false);
		
		// $pdf->Ln(6);
		// $pdf->SetFont('Arial','I',8);
		// $pdf->Cell(180,8,utf8_decode('"2019, Año del Caudillo del Sur, Emiliano Zapata"'), 0, 1, 'L', false);

		$url=FCPATH."sources/img/SETAB_COLOR.png";
		$pdf->Image($url,10,10,60,20,'PNG','');
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
		$pdf->AddPage('P','Letter');
		header_comprobante($pdf);

		$oficio="SE/SPyE/DB/BPB/".$info["cct"]."/2019";
		
		$pdf->Ln(2);
		$pdf->SetFont('Arial','',10);
		
		$pdf->SetTextColor(0,0,0);

		$meses=array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

		$dia=date("j");
		$mes=$meses[date("n")-1];

		// $pdf->Cell(190,4,utf8_decode("Villahermosa, Tabasco a ".$dia." de ".$mes." de 2019"), 0, 1, 'R', false);
		$pdf->Cell(190,4,utf8_decode("Villahermosa, Tabasco a 10 de octubre de 2019"), 0, 1, 'R', false);
		// $pdf->Cell(190,4,utf8_decode("Oficio: ".$oficio), 0, 1, 'R', false);
		$pdf->Cell(190,4,utf8_decode("Asunto: Relación de beneficiados, ciclo escolar 2019-2020"), 0, 1, 'R', false);

		$pdf->Ln(4);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,4,utf8_decode($info["director"]), 0, 1, 'L', false);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(190,4,'('.utf8_decode($info["cct"]).") ".utf8_decode($info["nombre_escuela"]), 0, 1, 'L', false);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(190,4,utf8_decode("P r e s e n t e"), 0, 1, 'L', false);

		$pdf->Ln(3);
		$pdf->SetFont('Arial','',9);
		$txt=utf8_decode("Con las facultades que me confiere el artículo 9 del Reglamento Interior de la Secretaría de Educación del estado de Tabasco y de los Lineamientos Generales del Programa para el Otorgamiento de Becas en Escuelas Particulares, que Imparten Educación en el Estado de Tabasco, de los Niveles: Inicial, Básico, Media Superior y Superior, publicados en el Periódico Oficial del estado de Tabasco y derivado del resultado del Sistema Electrónico de Asignación de Becas en escuelas particulares, envío relación de los alumnos que han sido seleccionados (as) como becarios (as) en ese plantel, durante el ciclo escolar 2019-2020, debiendo considerar lo dispuesto en los Lineamientos Generales en mención, conforme a lo establecido en:");
		$pdf->MultiCell(190,5,$txt,0,'J',false);
		$pdf->Ln(2);

		$pdf->Cell(15,4,"*", 0, 0, 'R', false);
		$txt=utf8_decode('Sección I. Disposiciones del Programa, punto Tercero, Fracción I: Beca se refiere al porcentaje de descuento que aplica la Institución sobre los conceptos de inscripción o reinscripción, colegiatura y vacaciones, que se otorga al solicitante del programa.');
		$pdf->MultiCell(175,5,$txt,0,'J',false);
		$pdf->Ln(2);
		$pdf->Cell(15,4,"*", 0, 0, 'R', false);
		$txt=utf8_decode('Sección II. De la Operación del Programa, Punto Quinto, Fracción I. Disposiciones Generales:');
		$pdf->MultiCell(175,5,$txt,0,'J',false);
		$pdf->Ln(2);

		$pdf->Cell(25,4,"p", 0, 0, 'R', false);
		$txt=utf8_decode('La institución educativa deberá aplicar la asignación de la beca otorgada por la Secretaría de Educación a partir del momento en que recibe el oficio y listado de beneficiarios, reintegrando al becario las cantidades que de manera anticipada hubiesen pagado por conceptos de inscripción o reinscripción, colegiaturas y vacaciones del ciclo escolar correspondiente, o en su caso deberán bonificar las colegiaturas de los meses subsecuentes las cantidades que de manera anticipada hubiesen pagado por los conceptos de inscripción o reinscripción, colegiaturas y vacaciones, en el porcentaje autorizado. En el caso de las instituciones educativas que consideren el pago de la colegiatura por un periodo de 12 meses, la beca se extenderá por el mismo lapso.');
		$pdf->MultiCell(165,5,$txt,0,'J',false);
		$pdf->Ln(2);

		$pdf->Cell(25,4,"q", 0, 0, 'R', false);
		$txt=utf8_decode('La Institución Educativa no podrá exigir la realización de pagos o actividades extraordinarias que en cualquier forma pudieran interpretarse como contraprestaciones por las becas otorgadas, ni condicionar la beca a cambio de la permanencia del alumno en los ciclos escolares subsecuentes en la misma.');
		$pdf->MultiCell(165,5,$txt,0,'J',false);
		$pdf->Ln(2);

		$pdf->Cell(25,4,"o", 0, 0, 'R', false);
		$txt=utf8_decode('Cuando en determinada institución educativa, las becas otorgadas por la Dirección de Becas no alcancen a cubrir el cinco por ciento mínimo obligatorio y no exista lista de espera para asignación de beca, la institución deberá cubrir el porcentaje no menor al 5% señalado en la Ley General de Educación, debiendo remitir a la Dirección de Becas la relación de los beneficiarios y porcentaje aplicado, así como las evidencias del cumplimiento.');
		$pdf->MultiCell(165,5,$txt,0,'J',false);
		$pdf->Ln(2);
		
		$pdf->SetFont('Arial','',9);
		$txt=utf8_decode("Sin otro particular no dudando del cabal cumplimiento a lo antes señalado, me permito enviarle un cordial saludo.");
		$pdf->MultiCell(190,5,$txt,0,'J',false);
		$pdf->Ln(32);

		$url_firma=FCPATH."sources/img/firma.jpg";
		$pdf->Image($url_firma,85,210,45,30,'JPG','');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(180,5,utf8_decode("Profra. Gabriela Yazmín Pérez Maiza"),0,1, 'C',false);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(180,5,utf8_decode("Directora"),0,1, 'C',false);

		// $pdf->Line(70,235,140,235);
		// $pdf->SetFont('Arial','B',12);
		// $pdf->Cell(190,5,utf8_decode("Lic. Guillermo Narváez Osorio"),0,1, 'C',false);
		// $pdf->SetFont('Arial','',12);
		// $pdf->Cell(190,5,utf8_decode("Secretario"),0,1, 'C',false);

		$pdf->Ln(2);	
		$pdf->SetFont('Arial','',8);	
		$pdf->SetTextColor(255,255,255);
		$pdf->SetFillColor(157,36,73);
		$pdf->Cell(190,8,utf8_decode("Héroes del 47 S/N, Col. Gil y Sáenz, C.P, 86080 Villahermosa, Tabasco, Mx Tel. (993) 3 13 90 59"), 0, 1, 'C',true);

	}

	
	$pdf->Output('oficio_directores_2019.pdf', 'I');
?>