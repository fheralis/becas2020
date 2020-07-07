<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_usuarios extends CI_Model {

	public function __construct(){
		parent::__construct();
	}


		/*verificar si el usuario que inicia session existe*/
	public function iniciar_session($data){
		$query=$this->db->get_where('usuarios',$data);
		if($query->num_rows()>0){
			return 1;
		}
		return 2;
	}

	/*datos del usuario con el menu*/
	public function gets_usuario($data){
		if($query=$this->db->get_where('vw_usuarios',$data)){
			return $query->row_array();
		}
		return FALSE;
	}






	// public function verificar_usuario(){

	// 	$this->db->from("estados");
	// 	//$this->db->where($where);
	// 	$this->db->order_by("nombre","ASC");
		
	// 	if($query=$this->db->get()){
	// 		return $query->result_array();
	// 	}
	// 	return false;
	// }



}

/* End of file Model_usuarios.php */
/* Location: ./application/models/Model_usuarios.php */