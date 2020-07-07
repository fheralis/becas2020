<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_preguntas extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function gets_preguntas(){
		$where=array(
			'estatus_id'			=>	1,
			'convocatoria_id'	=>	1
		);

		$this->db->from("preguntas");
		$this->db->where($where);
		$this->db->order_by("orden","ASC");
		
		if($query=$this->db->get()){
			return $query->result_array();
		}
		return false;

	}	

}

/* End of file model_preguntas.php */
/* Location: ./application/models/model_preguntas.php */