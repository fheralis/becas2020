<?php

	function header_comprobante($pdf,$info){
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
	}

	foreach ($infos as $info) {

		// if($info["tipo_situacion_id"]==1 || $info["tipo_situacion_id"]==3){
		// 	redirect("estudiantes/detalles");
		// }
	
		$pdf->AddPage('P','Letter');
		header_comprobante($pdf,$info);
		
		$solicitante=$info["nombres"]." ".$info["primer_apellido"]." ".$info["segundo_apellido"];
		$domicilio=$info["calle"].", Número: ".$info["numero"];
		$cp=$info["asentamiento"]." C.P.:".$info["cp"].", ".$info["municipio_cp"];
		$tutor=$info["nombres_tutor"]." ".$info["primer_apellido_tutor"]." ".$info["segundo_apellido_tutor"];
		$tutorAll=$info["nombres_tutor"]." ".$info["primer_apellido_tutor"]." ".$info["segundo_apellido_tutor"].", CURP: ".$info["curp_tutor"];
		$percepcion=$info["percepcion"];
		$escuela=$info["nombre_escuela"]." CCT: ".$info["cct"];
		$nivel=$info["nivel_educativo"];

		$oficio="SE/SPyE/DB/BPB/".$info["solicitud_id"]."/2019";
		$expediente=$info["solicitud_id"]."/".$info["cct"];

		$pdf->Ln(5);
		$pdf->SetFont('Arial','',10);
		
		$pdf->SetTextColor(0,0,0);

		$tipo_beca="0%";
		if($info["tipo_beca_id"]==1){
			$tipo_beca="100%";
		}
		else if($info["tipo_beca_id"]==3){
			$tipo_beca="50%";
		}

		$meses=array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

		$dia=date("j");
		$mes=$meses[date("n")-1];

		$pdf->Cell(190,4,utf8_decode("Villahermosa, Tabasco a 10 de ".$mes." de 2019"), 0, 1, 'R', false);
		$pdf->Cell(190,4,utf8_decode("Expediente:  ".$expediente), 0, 1, 'R', false);
		$pdf->Cell(190,4,utf8_decode("Asunto: Asignación de beca ciclo escolar 2019-2020"), 0, 1, 'R', false);

		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(190,4,utf8_decode($solicitante), 0, 1, 'L', false);
		$pdf->Ln(1);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(190,4,utf8_decode("Presente"), 0, 1, 'L', false);

		$pdf->Ln(5);
		$pdf->SetFont('Arial','',10);
		$txt=utf8_decode("Con las facultades que me confiere el artículo 36 del Reglamento Interior de la Secretaría de Educación del Estado de Tabasco, los Lineamientos Generales del Programa para el Otorgamiento de Becas en Escuelas Particulares, que Imparten Educación en el Estado de Tabasco, de los Niveles: Inicial, Básico, Media Superior y Superior, publicados en el Periódico Oficial del estado de Tabasco y en atención a la solicitud de beca que presentó su tutor, le comunico que ha sido seleccionado (a) con el otorgamiento de una beca del ".$tipo_beca.", para cursar sus estudios del nivel educativo ".$info["nivel_educativo"].", en el plantel particular ".$info["nombre_escuela"].", durante el ciclo escolar 2019-2020; aplicado a los conceptos de inscripción o reinscripción, colegiatura y vacaciones, que se otorga al solicitante del programa.");
		$pdf->MultiCell(190,5,$txt,0,'J',false);
		$pdf->Ln(5);

		$txt=utf8_decode('Por su parte la Institución Educativa debe considerar, lo establecido en la Sección II. de la Operación del Programa, Punto Quinto, Fracción I. Disposiciones Generales, inciso "p" que se transcribe.');
		$pdf->MultiCell(190,5,$txt,0,'J',false);
		$pdf->Ln(5);

		$pdf->SetFont('Arial','I',10);
		$txt=utf8_decode('"La institución educativa deberá aplicar la asignación de la beca otorgada por la Secretaría de Educación a partir del momento en que recibe el oficio y listado de beneficiarios, reintegrando al becario las cantidades que de manera anticipada hubiesen pagado por conceptos de inscripción o reinscripción, colegiaturas y vacaciones del ciclo escolar correspondiente, o en su caso deberán bonificar las colegiaturas de los meses subsecuentes las cantidades que de manera anticipada hubiesen pagado por los conceptos de inscripción o reinscripción, colegiaturas y vacaciones, en el porcentaje autorizado. En el caso de las instituciones educativas que consideren el pago de la colegiatura por un periodo de 12 meses, la beca se extenderá por el mismo lapso."');
		$pdf->MultiCell(190,5,$txt,0,'J',false);
		$pdf->Ln(5);

		$pdf->SetFont('Arial','',10);
		$txt=utf8_decode("La beca y el porcentaje otorgado en el presente oficio, es vigente únicamente para el ciclo escolar 2019-2020.");
		$pdf->MultiCell(190,5,$txt,0,'J',false);
		$pdf->Ln(8);

		$pdf->SetFont('Arial','',10);
		$txt=utf8_decode("Sin otro particular me permito enviarle un cordial saludo.");
		$pdf->MultiCell(190,5,$txt,0,'J',false);
		$pdf->Ln(33);

		// $pdf->SetFont('Arial','B',10);
		// $pdf->Cell(190,5,utf8_decode("Lic. Guillermo Narváez Osorio"),0,1, 'C',false);
		// $pdf->SetFont('Arial','',10);
		// $pdf->Cell(190,5,utf8_decode("Secretario"),0,1, 'C',false);
		
		$url_firma=FCPATH."sources/img/firma.jpg";
		$pdf->Image($url_firma,85,185,45,30,'JPG','');

		// $pdf->Line(70,205,140,205);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(190,5,utf8_decode("Profra. Gabriela Yazmín Pérez Maiza"),0,1, 'C',false);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(190,5,utf8_decode("Directora"),0,1, 'C',false);

		$pdf->Ln(5);
		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(190,4,utf8_decode("Nota: El presente oficio se debe conservar únicamente como constancia de su situación de becario."), 0, 1, 'L', false);


		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',8);
		
		$pdf->SetTextColor(255,255,255);
		$pdf->SetFillColor(157,36,73);
		$pdf->Cell(190,8,utf8_decode("Héroes del 47 S/N, Col. Gil y Sáenz, C.P, 86080 Villahermosa, Tabasco, Mx Tel. (993) 3 13 90 59"), 0, 1, 'C',true);
	
	}

	$pdf->Output('folios.pdf', 'I');

?>