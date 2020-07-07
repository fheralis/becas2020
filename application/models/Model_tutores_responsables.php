<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_tutores_responsables extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	public function padres($curp,$parentesco){
		$where=array(
			'curp_solicitante'		=>	$curp,
			'parentesco_id'				=>	$parentesco
		);

		$this->db->from("vw_padres");
		$this->db->where($where);
		
		if($query=$this->db->get()){
			return $query->row_array();
		}
		return FALSE;
	}

	/*regresa los datos del familiar dependiendo del parentesco*/
	public function get_tutor($eid){
		$where=array(
			'estudiante_id'		=>	$eid
		);

		$this->db->from("tutores_responsables");
		$this->db->where($where);
		
		if($query=$this->db->get()){
			return $query->row_array();
		}
		return FALSE;
	}



	/*registrar o actualizar la tabla de tutores*/
	public function registrar_update($data){
		//print_r($data);
		if($this->eliminar_tutor($data["estudiante_id"])){
			if($this->db->insert('tutores_responsables',$data)){
				return TRUE;
			}
			return FALSE;
		}
	}

	public function eliminar_tutor($eid){
		$where=array(
			'estudiante_id' => $eid
		);
		$this->db->where($where);
		if($this->db->delete('tutores_responsables')){
			return TRUE;
		}
		return FALSE;
	} 

}

/* End of file Model_tutores_responsables.php */
/* Location: ./application/models/Model_tutores_responsables.php */