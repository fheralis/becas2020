<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_documentos extends CI_Model {


	public function __construct(){
		parent::__construct();
	}
	
	public function gets_documentos(){

		$where=array(
			'convocatoria_id'		=>	1
		);

		$this->db->from("documentos");
		$this->db->where($where);
		$this->db->order_by("orden","ASC");
		
		if($query=$this->db->get()){
			return $query->result_array();
		}
		return false;
	}
	

}

/* End of file Model_documentos.php */
/* Location: ./application/models/Model_documentos.php */