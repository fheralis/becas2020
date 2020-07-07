<?php 
	function header_comprobante($pdf){
		// $url=FCPATH."sources/img/SETAB_COLOR.png";

		// $pdf->Image($url,10,10,60,20,'PNG','');
	
		// $pdf->SetTextColor(10,10,10);
		// $pdf->SetFont('Arial','B',16);
		
		// $pdf->SetFont('Arial','',14);
		// $pdf->Cell(65,4,'', 0, 0, 'R', false);
		// $pdf->Ln(18);
		
	}

	function header_tabla($pdf,$info){
		$pdf->AddPage('P','Letter');
		header_comprobante($pdf);

		$pdf->Ln(5);	
		
		$pdf->SetFont('Arial','',10);	
		$pdf->Cell(190,4,utf8_decode("CCT: ".$info["cct"]), 0, 1, 'L',false);
		$pdf->Cell(190,4,utf8_decode("ESCUELA: ".$info["nombre_escuela"]), 0, 1, 'L',false);
		$pdf->Ln(0);	
		
		$pdf->SetFont('Arial','',10);	
		$pdf->SetTextColor(255,255,255);
		$pdf->SetFillColor(157,36,73);
		// $pdf->Cell(20,7,utf8_decode("FOLIO"), 1, 0, 'C',true);
		$pdf->Cell(40,7,utf8_decode("CURP"), 1, 0, 'C',true);
		$pdf->Cell(90,7,utf8_decode("NOMBRE"), 1, 1, 'C',true);
		// $pdf->Cell(40,7,utf8_decode("TIPO DE BECA"), 1, 1, 'C',true);
	}

	foreach($ccts as $info) {
		
		header_tabla($pdf,$info);
		
		$alumnos=$this->model_ccts->gets_lista($info["cct_id"]);
		$no_pagina=0;
		
		if($alumnos->num_rows()>0 && $alumnos->num_rows()<=50){
			$no_pagina=1;
		}else if($alumnos->num_rows()>50 && $alumnos->num_rows()<=100){
			$no_pagina=2;
		}

		$pdf->SetFont('Arial','',8);	
		$pdf->SetTextColor(0,0,0);
		
		$i=0;
		foreach ($alumnos->result_array() as $alumno) {
			
			$pdf->SetFont('Arial','',8);	
			$pdf->SetTextColor(0,0,0);
			
			$nombre_completo=$alumno["nombres"]." ".$alumno["primer_apellido"]." ".$alumno["segundo_apellido"];
			$beca="MEDIA BECA (50%)";
			if($alumno["tipo_beca_id"]==1){
				$beca="BECA COMPLETA (100%)";
			}

			// $pdf->Cell(20,4,utf8_decode($alumno["solicitud_id"]), 0, 0, 'L',false);
			$pdf->Cell(40,4,utf8_decode($alumno["curp"]), 0, 0, 'L',false);
			$pdf->Cell(90,4,utf8_decode($nombre_completo), 0, 1, 'L',false);
			// $pdf->Cell(40,4,utf8_decode($beca), 0, 1, 'C',false);

			$i++;
			if($i==50){
				$pdf->Cell(190,7,utf8_decode("Página: 1")."/".$no_pagina,0,0,'C');
				header_tabla($pdf,$info);
			}			
		}
		$pdf->Ln(5);
		$pdf->Cell(190,7,utf8_decode("Página: ").$no_pagina."/".$no_pagina,0,0,'C');
	}

	
	$pdf->Output('listados_2019.pdf', 'I');
?>