<?php

	function header_comprobante($pdf){
		$url=FCPATH."sources/img/SETAB_COLOR.png";

		$pdf->Image($url,10,10,60,20,'PNG','');
	
		$pdf->SetTextColor(10,10,10);
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(65,8,'', 0, 0, 'R', false);
		$pdf->Cell(125,8,utf8_decode('Secretaría de Educación'), 0, 1, 'L', false);

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(65,4,'', 0, 0, 'R', false);
		$pdf->Cell(125,8,utf8_decode('Dirección de Becas'), 0, 1, 'L', false);

		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(65,4,'', 0, 0, 'R', false);
		$pdf->Cell(125,4,utf8_decode('Proceso de Becas en Escuelas Particulares'), 0, 1, 'L', false);
		$pdf->Cell(65,4,'', 0, 0, 'R', false);
		$pdf->Cell(125,4,utf8_decode('Nivel Inicial y Básico, ciclo escolar 2019-2020'), 0, 1, 'L', false);
	}



	$pdf->AddPage('P','Letter');
	//$pdf->Image('http://www.setab.gob.mx/img/escudo.jpg',20,10,30,30,'JPG','');
	header_comprobante($pdf);
	
	$solicitante=$info["nombres"]." ".$info["primer_apellido"]." ".$info["segundo_apellido"]." (".$info["curp"].")";
	$domicilio=$info["calle"].", Número: ".$info["numero"];
	$cp=$info["asentamiento"]." C.P.:".$info["cp"].", ".$info["municipio_cp"];
	$tutor=$info["nombres_tutor"]." ".$info["primer_apellido_tutor"]." ".$info["segundo_apellido_tutor"];
	$tutorAll=$info["nombres_tutor"]." ".$info["primer_apellido_tutor"]." ".$info["segundo_apellido_tutor"].", CURP: ".$info["curp_tutor"];
	$percepcion=$info["percepcion"];
	$escuela=$info["nombre_escuela"]." CCT: ".$info["cct"];
	$nivel=$info["nivel_educativo"];

	$p=$padre["nombres"]." ".$padre["primer_apellido"]." ".$padre["segundo_apellido"]." - ".$padre["curp"];
	$m=$madre["nombres"]." ".$madre["primer_apellido"]." ".$madre["segundo_apellido"]." - ".$madre["curp"];

	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);

	$pdf->SetTextColor(255,255,255);
	$pdf->SetFillColor(179,142,93);

	$pdf->Cell(53,4,'Folio:', 0, 0, 'R', true);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(125,4,utf8_decode($info["solicitud_id"]), 0, 1, 'L', false);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(53,4,'Nombre del Solicitante:', 0, 0, 'R', true);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(125,4,utf8_decode($solicitante), 0, 1, 'L', false);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(53,4,'Domicilio:', 0, 0, 'R', true);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(125,4,utf8_decode($domicilio), 0, 1, 'L', false);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(53,4,'Colonia/Localidad:', 0, 0, 'R', true);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(125,4,utf8_decode($cp), 0, 1, 'L', false);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(53,4,'Responsable de los Ingresos:', 0, 0, 'R', true);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(125,4,utf8_decode($tutorAll), 0, 1, 'L', false);

	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(53,4,utf8_decode('Percepción:'), 0, 0, 'R', true);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(125,4,"$".utf8_decode($percepcion), 0, 1, 'L', false);

	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(53,4,'Escuela:', 0, 0, 'R', true);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(125,4,utf8_decode($escuela), 0, 1, 'L', false);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(53,4,'Nivel Educativo:', 0, 0, 'R', true);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(125,4,utf8_decode($nivel), 0, 1, 'L', false);

	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(53,4,'Promedio General:', 0, 0, 'R', true);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(125,4,utf8_decode($info["promedio_general"]), 0, 1, 'L', false);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(53,4,utf8_decode('Promedio en Materias Básicas:'), 0, 0, 'R', true);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(125,4,utf8_decode($info["promedio_basicas"]), 0, 1, 'L', false);

	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(53,4,'Grado Cursado:', 0, 0, 'R', true);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(125,4,utf8_decode($info["grado_cursado"]), 0, 1, 'L', false);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(53,4,utf8_decode('Grado a Cursar:'), 0, 0, 'R', true);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(125,4,utf8_decode($info["grado_cursar"]), 0, 1, 'L', false);

	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(53,4,utf8_decode('Padre:'), 0, 0, 'R', true);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(125,4,utf8_decode($p), 0, 1, 'L', false);

	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(53,4,utf8_decode('Madre:'), 0, 0, 'R', true);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(125,4,utf8_decode($m), 0, 1, 'L', false);



	$pdf->SetTextColor(0,0,0);

	$pdf->Ln(2);
	$pdf->SetFont('Arial','',10);
	$txt=utf8_decode("Bajo protesta de decir verdad, acepto y manifiesto que la información que he proporcionado a la Dirección de Becas, a través de la presente solicitud, es verídica, y advertido de las penas de que incurren los falsos declarantes. Al enviar la presente solicitud, acepto conocer el alcance de los Lineamientos Generales, derechos y obligaciones asociados al Programa de Becas en Escuelas Particulares y me comprometo a cumplir con las responsabilidades que se deriven de resultar beneficiado, establecidos en la convocatoria vigente y Lineamientos Generales establecidos.");
	$pdf->MultiCell(190,5,$txt,0,'J',false);
	$pdf->Ln();
	$txt=utf8_decode("Y Autorizando a que el personal de la Dirección de Becas de la Secretaría de Educación, pueda verificar los datos asentados y en caso de encontrar falsedad o incongruencia en los datos asentados, acepto a que la beca se cancele aun cuando la beca se me haya asignado.");
	$pdf->MultiCell(190,5,$txt,0,'J',false);
	$pdf->Ln();
	$txt=utf8_decode("Asegúrese de completar con exactitud, todos los datos que se le requieren en el formato de solicitud incluyendo padre y madre, independientemente del estado civil; que todos los datos asentados sean correctos y correspondan a la documentación acreditativa que la acompaña. La coherencia de esta información y la documentación acreditativa es fundamental para valorar su solicitud.");
	$pdf->MultiCell(190,5,$txt,0,'J',false);
	$pdf->Ln();

	$txt=utf8_decode("El comprobante de solicitud deberá entregarlo en la Escuela Primaria Profesora Virginia Pérez Gil, ubicada en la Av. Francisco Javier Mina #407 Col. Centro. junto con la documentación requerida en la Convocatoria de Becas en Escuelas Particulares Nivel Básico y Media Superior ciclo 2019 - 2020.");
	$pdf->MultiCell(190,5,$txt,0,'J',false);
	$pdf->Ln(22); 


	$pdf->Line(70,205,140,205);

	$tutor=$info["nombres_tutor"]." ".$info["primer_apellido_tutor"]." ".$info["segundo_apellido_tutor"];

	$pdf->Cell(190,5,utf8_decode($tutor),0,1, 'C',false);
	$pdf->Cell(190,5,utf8_decode("Firma del Responsable"),0,1, 'C',false);
	$pdf->Cell(190,5,utf8_decode("(bolígrafo de tinta azul)"),0,1, 'C',false);


	$pdf->Ln(25);
	$pdf->SetFont('Arial','B',8);
	
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFillColor(157,36,73);
	$pdf->Cell(190,8,utf8_decode("Calle Héroes del 47 S/N Col. Gil y Sáenz, C.P. 86080 Villahermosa, Tabasco, MX"), 0, 1, 'C',true);
	

// 	$pdf->AddPage('P','Letter');
// 	header_comprobante($pdf);



// 	$pdf->Ln(5);
// 	$pdf->SetFont('Arial','B',10);
// 	$pdf->Cell(190,4,utf8_decode('Formato de entrega y validación de documentos'), 0, 1, 'C', false);

// 	$pdf->Ln(5);
// 	$pdf->SetFillColor(255,255,255);
	
// 	$pdf->Cell(45,5,'Folio de solicitud de beca:', 0, 0, 'R', true);
// 	$pdf->Cell(125,5,utf8_decode($info["solicitud_id"]), 0, 1, 'L', false);
// 	$pdf->Line(56,52,190,52);
// 	$pdf->Cell(45,5,'Nombre del alumno:', 0, 0, 'R', true);
// 	$pdf->Cell(125,5,utf8_decode($solicitante), 0, 1, 'L', false);
// 	$pdf->Line(56,57,190,57);
// 	$pdf->Cell(45,5,'Plantel educativo:', 0, 0, 'R', true);
// 	$pdf->Cell(125,5,utf8_decode($info["nombre_escuela"]." - ".$info["cct"]), 0, 1, 'L', false);
// 	$pdf->Line(56,62,190,62);
// 	$pdf->Cell(45,5,'Nivel educativo a cursar:', 0, 0, 'R', true);
// 	$pdf->Cell(65,5,utf8_decode($info["nivel_educativo"]), 0, 0, 'L', false);
// 	$pdf->Line(56,67,190,67);
// 	$pdf->Cell(45,5,'Grado:', 0, 0, 'R', true);
// 	$pdf->Cell(20,5,utf8_decode($info["grado_cursar"]), 0, 1, 'L', false);
// 	$pdf->Cell(45,5,utf8_decode('Fecha de trámite:'), 0, 1, 'R', true);
// 	$pdf->Line(56,72,190,72);


// 	$pdf->Ln(10);
// 	$pdf->Cell(90,5,'', 1, 0, 'C', true);
// 	$pdf->Cell(20,5,'Cumple', 1, 0, 'C', true);
// 	$pdf->Cell(80,5,'', 1, 1, 'C', true);
// 	$pdf->Cell(10,5,'No.', 1, 0, 'C', true);
// 	$pdf->Cell(80,5,'Documentos', 1, 0, 'C', true);
// 	$pdf->Cell(10,5,'Si', 1, 0, 'C', true);
// 	$pdf->Cell(10,5,'No', 1, 0, 'C', true);
// 	$pdf->Cell(80,5,utf8_decode('Observación'), 1, 1, 'C', true);


// $start_x=$pdf->GetX(); //initial x (start of column position)
// $current_y = $pdf->GetY();
// $current_x = $pdf->GetX();

// $cell_width = 10;  //define cell width
// $cell_height=10;    //define cell height

// $pdf->SetFont('Arial','',10);

// $pdf->MultiCell($cell_width,$cell_height,'1          ',1);
// $current_x+=$cell_width;
// $pdf->SetXY($current_x, $current_y);

// $txt=utf8_decode("Comprobante de solicitud emitido por el Sistema Electrónico de Becas (imprimir por duplicado)");

// $pdf->MultiCell(80,$cell_height,$txt,1);
// $current_x+=80;
// $pdf->SetXY($current_x, $current_y);

// $pdf->MultiCell($cell_width,$cell_height,'          ',1);
// $current_x+=$cell_width;
// $pdf->SetXY($current_x, $current_y);

// $pdf->MultiCell($cell_width,$cell_height,'          ',1);
// $current_x+=$cell_width;
// $pdf->SetXY($current_x, $current_y);

// $pdf->SetTextColor(255,255,255);
// $pdf->MultiCell(80,$cell_height,'Comprobante de solicitud emitido por el Sistema Electrónico de Becas (imprimir por duplicado)',1);
// $current_x+=$cell_width;
// $pdf->SetXY($current_x,103);


// $pdf->Ln();               


// $pdf->SetTextColor(0,0,0);
// $pdf->MultiCell($cell_width,$cell_height,'2          ',1);
// $current_x+=$cell_width;

// $txt=utf8_decode("Constancia de inscripción de estudios al ciclo escolar 2019-2020 con los datos establecidos en convocatoria.");

// $pdf->SetXY(20, 113);
// $pdf->MultiCell(80,6.7,$txt,1);


// $pdf->SetXY(100,113);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(110,113);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(120,113);
// $pdf->MultiCell(80,20,'          ',1);


// $pdf->SetTextColor(0,0,0);
// $pdf->MultiCell($cell_width,$cell_height,'3          ',1);

// $txt=utf8_decode("Documento oficial que acredite la calificación del periodo escolar 2018-2019, de acuerdo a lo establecido en convocatoria.");

// $pdf->SetXY(20, 133);
// $pdf->MultiCell(80,6.7,$txt,1);

// $pdf->SetXY(100,133);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(110,133);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(120,133);
// $pdf->MultiCell(80,20,'          ',1);


// $pdf->SetTextColor(0,0,0);
// $pdf->MultiCell($cell_width,$cell_height,'4          ',1);

// $txt=utf8_decode("Acta Nacimiento del alumno(a) copia certificada y copia simple.");

// $pdf->SetXY(20, 153);
// $pdf->MultiCell(80,10,$txt,1);

// $pdf->SetXY(100,153);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(110,153);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(120,153);
// $pdf->MultiCell(80,20,'          ',1);

// $pdf->SetTextColor(0,0,0);
// $pdf->MultiCell($cell_width,$cell_height,'5          ',1);

// $txt=utf8_decode("CURP del alumno en formato actualizado");

// $pdf->SetXY(20, 173);
// $pdf->MultiCell(80,20,$txt,1);

// $pdf->SetXY(100,173);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(110,173);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(120,173);
// $pdf->MultiCell(80,20,'          ',1);

// $pdf->SetTextColor(0,0,0);
// $pdf->MultiCell($cell_width,$cell_height,'6          ',1);

// $txt=utf8_decode("CURP de ambos padres y del tutor (esta situación aplica en el caso de que sea una persona distinta a los padres).");

// $pdf->SetXY(20, 193);
// $pdf->MultiCell(80,6.7,$txt,1);

// $pdf->SetXY(100,193);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(110,193);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(120,193);
// $pdf->MultiCell(80,20,'          ',1);


// $pdf->SetTextColor(0,0,0);
// $pdf->MultiCell($cell_width,$cell_height,'7          ',1);

// $txt=utf8_decode("CURP actualizada de los hermanos. ");

// $pdf->SetXY(20, 213);
// $pdf->MultiCell(80,20,$txt,1);

// $pdf->SetXY(100,213);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(110,213);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(120,213);
// $pdf->MultiCell(80,20,'          ',1);


// $pdf->SetTextColor(0,0,0);
// $pdf->MultiCell($cell_width,$cell_height,'8          ',1);

// $txt=utf8_decode("Solo aplica para el nivel Superior");

// $pdf->SetXY(20, 233);
// $pdf->MultiCell(80,20,$txt,1);

// $pdf->SetXY(100,233);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(110,233);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(120,233);
// $pdf->MultiCell(80,20,'          ',1);


// $pdf->AddPage('P','Letter');
// header_comprobante($pdf);

// $pdf->Ln();



// $start_x=$pdf->GetX(); //initial x (start of column position)
// $current_y = $pdf->GetY();
// $current_x = $pdf->GetX();

// $cell_width = 10;  //define cell width
// $cell_height=10;    //define cell height

// $pdf->SetFont('Arial','',10);

// $pdf->MultiCell($cell_width,$cell_height,'9          ',1);
// $current_x+=$cell_width;
// $pdf->SetXY($current_x, $current_y);

// $txt=utf8_decode("Copia de identificación oficial de ambos padres y tutor.");
// $pdf->MultiCell(80,10,$txt,1);


// $pdf->SetXY(100,38);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(110,38);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(120,38);
// $pdf->MultiCell(80,20,'          ',1);

// $pdf->SetTextColor(0,0,0);
// $pdf->MultiCell($cell_width,$cell_height,'10         ',1);

// $txt=utf8_decode("Original y copia del comprobante de ingresos del tutor (solicitante, padre, madre u otra persona); acorde a lo solicitado en convocatoria.");
// $pdf->SetXY(20,58);
// $pdf->MultiCell(80,6.7,$txt,1);

// $pdf->SetXY(100,58);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(110,58);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(120,58);
// $pdf->MultiCell(80,20,'          ',1);



// $pdf->MultiCell($cell_width,$cell_height,'11         ',1);

// $txt=utf8_decode("Solo aplica para el nivel Superior");
// $pdf->SetXY(20,78);
// $pdf->MultiCell(80,20,$txt,1);

// $pdf->SetXY(100,78);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(110,78);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(120,78);
// $pdf->MultiCell(80,20,'          ',1);

// $pdf->MultiCell($cell_width,$cell_height,'11         ',1);

// $txt=utf8_decode("Solo aplica para el nivel Superior");
// $pdf->SetXY(20,98);
// $pdf->MultiCell(80,20,$txt,1);

// $pdf->SetXY(100,98);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(110,98);
// $pdf->MultiCell(10,10,'          ',1);

// $pdf->SetXY(120,98);
// $pdf->MultiCell(80,20,'          ',1);




// $pdf->Ln(5);

// $pdf->Cell(190,5,"Uso exclusivo del solicitante.",0,1, 'C',false);
// $pdf->Ln();
// $txt=utf8_decode("Acepto, reconozco y valido que todo lo entregado es documento fiel al original, acorde a la revisión realizada y estoy de acuerdo con las observaciones registradas en este documento, tengo conocimiento del alcance de cada una de ellas.");
// $pdf->MultiCell(190,5,$txt,0,'J',false);
// $pdf->Ln();
// $pdf->Cell(190,5,"Nombre y Firma:",0,1, 'L',false);
// $pdf->Line(40,153,140,153);

// $pdf->Ln(20);

// $pdf->Cell(190,5,utf8_decode("Recepción de documentos"),0,1, 'C',false);
// $pdf->Ln();
// $pdf->Cell(190,5,"Nombre y Firma:",0,1, 'L',false);
// $pdf->Line(40,188,140,188);

// $pdf->Ln(20);

// $pdf->Cell(190,5,utf8_decode("Validación de documentos en Sistema Electrónico de Asignación de Becas"),0,1, 'C',false);
// $pdf->Ln();
// $pdf->Cell(190,5,"Nombre y Firma:",0,1, 'L',false);
// $pdf->Line(40,222,140,222);

// $tutor=$info["nombres_tutor"]." ".$info["primer_apellido_tutor"]." ".$info["segundo_apellido_tutor"];

// $pdf->Cell(190,5,utf8_decode($tutor),0,1, 'C',false);
// $pdf->Cell(190,5,utf8_decode("Firma del Responsable"),0,1, 'C',false);
// $pdf->Cell(190,5,utf8_decode("(bolígrafo de tinta negra)"),0,1, 'C',false);






$pdf->Output('comprobante.pdf', 'I');
?>
