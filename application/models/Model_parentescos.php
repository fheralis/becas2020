<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_parentescos extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	/*retorna los parentescos que existen en la bd*/
	public function gets_parentescos(){
		//$this->db->from();
		
		if($query=$this->db->get("parentescos")){
			return $query->result_array();
		}
		return false;

	}	


}

/* End of file Model_parentesco.php */
/* Location: ./application/models/Model_parentesco.php */