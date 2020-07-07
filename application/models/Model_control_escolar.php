<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_control_escolar extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

		/*regresa los datos de un estuidiante dada la curp*/
	function gets_estudiantes_t1($curp){
		$where=array(
			'curp'		=>	$curp
		);

		$this->db->from("vw_estudiantes_control_escolar");
		$this->db->where($where);
		
		if($query=$this->db->get()){
			return $query->row_array();
		}
		return FALSE;
	}

	public function gets_info($curp){
		$where=array(
			'curp'	=> $curp
		);

		$this->db->from('vw_control_escolar');
		$this->db->where($where);
		if($query=$this->db->get()){
			return $query->row_array();
		}
		return FALSE;
	}


	public function gets_alumnos(){

		/*$where=array(
			'boleta'	=> 'BE27190029521'
		);

		$CE = $this->load->database('ce',TRUE);
		$CE->from('control_escolar');
		$CE->like($where);
		if($query = $CE->get()){
			return array(
				'alumnos'	=>	$query->result_array(),
				'cont'		=>	$query->num_rows()
			);
		}*/
		return false;
	}

}

/* End of file Model_control_escolar.php */
/* Location: ./application/models/Model_control_escolar.php */