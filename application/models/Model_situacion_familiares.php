<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_situacion_familiares extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function gets_situacion_familiares(){
		
		$this->db->from("situacion_familiares");
		$this->db->order_by("situacion_familiar_id","ASC");
		
		if($query=$this->db->get()){
			return $query->result_array();
		}
		return false;

	}	

}

/* End of file Model_situacion_familiares.php */
/* Location: ./application/models/Model_situacion_familiares.php */