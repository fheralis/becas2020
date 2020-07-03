<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_respuestas extends CI_Model {

	public function gets_respuestas($pregunta){

		$where=array(
			"pregunta_id"	=>	$pregunta,
			"estatus_id"	=>	1
		);

		$this->db->from("respuestas");
		$this->db->where($where);
		$this->db->order_by("orden","ASC");
		if($query=$this->db->get()){
			return $query->result_array();
		}
		return FALSE;
	}

}

/* End of file Model_respuestas.php */
/* Location: ./application/models/Model_respuestas.php */