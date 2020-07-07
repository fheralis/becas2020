<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_logs extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function gets_logs(){
		
		$this->db->from("logs");
		
		if($query=$this->db->get()){
			return $query->result_array();
			
		}
		return FALSE;
	}

}

/* End of file Model_log.php */
/* Location: ./application/models/Model_log.php */