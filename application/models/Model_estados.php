<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_estados extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function gets_estados(){

		$this->db->from("estados");
		//$this->db->where($where);
		$this->db->order_by("nombre","ASC");
		
		if($query=$this->db->get()){
			return $query->result_array();
		}
		return false;
	}
	

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */