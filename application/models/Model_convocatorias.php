<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_convocatorias extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	public function convocatorias_vigentes(){

		$where=array(
			'status_convocatoria'		=>	1
		);


		$this->db->from("convocatorias");
		$this->db->where($where);
		$this->db->order_by("convocatoria_id","ASC");
		
		if($query=$this->db->get()){
			return $query->result_array();
		}
		return false;
	}
}

/* End of file Model_convocatorias.php */
/* Location: ./application/models/Model_convocatorias.php */