<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_familiares extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	/*regresa los datos del familiar dependiendo del parentesco*/
	public function get_familiar($parentesco,$eid){
		$where=array(
			'parentesco_id'		=>	$parentesco,
			'estudiante_id'		=>	$eid
		);

		$this->db->from("familiares");
		$this->db->where($where);
		
		if($query=$this->db->get()){
			return $query->row_array();
		}
		return FALSE;
	}

}

/* End of file Model_familiares.php */
/* Location: ./application/models/Model_familiares.php */