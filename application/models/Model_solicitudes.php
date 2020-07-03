<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_solicitudes extends CI_Model {

	public function __construct(){
		parent::__construct();
	}



	/*recaba los datos para general el comprobante*/
	public function comprobante52(){
// 		$where=array(24,159,161,641,211,378,796,22,411,145,247,156,1299,268,
// 49,482,283,182,314,517,110,199,327,590,200,333,636,134,732,19,228,25,455,76,497,191,119,120,203,341,129,16,138,824,160,1319,88,315,544,609,209,352);

		$where=array(26,47,636,950,1110,1299,2152,3030,3148,75,421,514,937,2339,2495,2667,2969,3005,132,343,704,844,1819,1849,3740,3758,4625,134,168,508,590,736,757,893,982,1167,1872,169,682,949,1465,1702,3563,3588,3776,4255,1123,1793,2025,2090,49,144,378,479,526,805,834,1002,1017,1373,1437,1633,1814,2029,2060,2097,2171,2194,2284,2299,2490,2514,2601,2636,2925,24,109,110,136,171,236,309,311,396,402,453,524,545,547,571,710,393,774,896,940,1003,1039,1234,1255,1257,182,257,263,414,501,511,513,523,536,680,686,375,745,828,920,1114,1274,1317,1536,1687,1804,2052,2057,2070,2131,314,324,482,510,779,815,866,936,954,956,977,1012,1032,1252,1253,1426,1428,1826,1870,1948,1967,2027,2050,2101,2102);

		$this->db->from("vw_comprobante");
		$this->db->where_in('solicitud_id',$where);
		
		if($query=$this->db->get()){
			return $query->result_array();
			
		}
		return FALSE;
	}

		/*recaba los datos para general el comprobante*/
	public function solicitud_x_folio($folio){
		$where=array(
			'solicitud_id'		=>	$folio
		);

		$this->db->from("vw_comprobante");
		$this->db->where($where);
		
		if($query=$this->db->get()){
			return $query->row_array();
			
		}
		return FALSE;
	}


	public function verificar_solicitud($data){
		$query=$this->db->get_where('solicitudes',$data);
		if($query->num_rows()>0){
			return 1;
		}
		return 2;
	}

	/*recaba los datos para general el comprobante*/
	public function comprobante($curp){
		$where=array(
			'curp'	=>	$curp
		);

		$this->db->from("vw_comprobante");
		$this->db->where($where);
		
		if($query=$this->db->get()){
			return $query->row_array();
			
		}
		return FALSE;
	}


	public function update_tab($tab,$solicitud){

		$where=array(
			'tab'						=>	$tab,
			"solicitud_id"	=>	$solicitud
		);

		$this->session->btab=$tab;
		
		$sql="update solicitudes set tab=".$tab." where solicitud_id=".$solicitud;

		//$this->db->update('solicitudes',$where);

		if($this->db->query($sql)){
		 	return TRUE;
		}
		return FALSE;

		//$this->db->update('solicitudes',$where);

		// if($this->db->update('solicitudes',$where)){
		//  	return TRUE;
		// }
		// return FALSE;
	}

	/*regresa el id del estudiante*/
	public function get_solicitud_id_curp($curp,$conv){
		$where=array(
			'curp'						=>	$curp,
			'convocatoria_id'	=>	$conv
		);

		$this->db->from("vw_estudiantes_solicitudes");
		$this->db->where($where);
		
		if($query=$this->db->get()){
			$row=$query->row_array();
			return $row["solicitud_id"];
		}
		return FALSE;
	}

	/*regresa el id del estudiante*/
	public function get_solicitud_id($estudiante_id){
		$where=array(
			'estudiante_id'		=>	$estudiante_id,
			'convocatoria_id'	=>	$this->session->userdata("bconv")
		);

		$this->db->from("vw_estudiantes_solicitudes");
		$this->db->where($where);
		
		if($query=$this->db->get()){
			$row=$query->row_array();
			return $row["solicitud_id"];
		}
		return FALSE;
	}
	
	public function registro_academicos_ajax($data){
		//print_r($data);

		if($this->session->userdata("btab")>=2){
			$sol_id=$this->get_solicitud_id($data["estudiante_id"]);
			$this->db->where('solicitud_id',$sol_id);
			/*si los datos se agregaron correctamente*/
			if($this->db->update('solicitudes',$data)){
				return 1;
			}
			else{//si ocurrio un error al momento de guardar los datos
				return 2;
			}
		}
		else{
			if($this->db->insert('solicitudes',$data)){
				$this->session->set_userdata("btab",2);
				return 1;
			}
			else{//si ocurrio un error al momento de guardar los datos
				return 2;
			}
		}

			
	}

}














/* End of file Model_solicitudes.php */
/* Location: ./application/models/Model_solicitudes.php */