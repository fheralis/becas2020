<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_solicitudes_logs extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function validado($folio){
		$where=array(
			'solicitud_id'		=>	$folio
		);

		$this->db->from("vw_solicitudes_con_logs");
		$this->db->where($where);
		
		if($query=$this->db->get()){
			if($query->num_rows()>0){
				return TRUE;
			}
		}
		return FALSE;
	}
	

	public function insert($data){

		if($this->db->insert('solicitudes_logs',$data)){
			return TRUE;
		}
		return FALSE;
	}

}

/* End of file Model_solicitudes_logs.php */
/* Location: ./application/models/Model_solicitudes_logs.php */