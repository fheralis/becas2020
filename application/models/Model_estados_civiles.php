<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_estados_civiles extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	/*retorna los parentescos que existen en la bd*/
	public function gets_estados_civiles(){
		//$this->db->from();
		
		if($query=$this->db->get("estados_civiles")){
			return $query->result_array();
		}
		return false;

	}		

}

/* End of file Model_estados_civiles.php */
/* Location: ./application/models/Model_estados_civiles.php */