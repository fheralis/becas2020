<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_solicitudes_documentos extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function validado($folio){
		$where=array(
			'solicitud_id'		=>	$folio
		);

		$this->db->from("vw_solicitudes_con_documentos");
		$this->db->where($where);

		if($query=$this->db->get()){
			if($query->num_rows()>0){
		 		return TRUE;
			}
		}
		return FALSE;
	}



	
	public function insert($data){

		$insert=array(
      array(
        'solicitud_id'		=> $data["solicitud_id"],
        'documento_id' 		=> 1,
        'cumple'					=> $data["d1"],
        'observaciones' 	=> $data["o1"],
        'usuario_id'      => $this->session->userdata("busuario_id")
      ),array(
        'solicitud_id'		=> $data["solicitud_id"],
        'documento_id' 		=> 2,
        'cumple'					=> $data["d2"],
        'observaciones' 	=> $data["o2"],
        'usuario_id'      => $this->session->userdata("busuario_id")
      ),array(
        'solicitud_id'		=> $data["solicitud_id"],
        'documento_id' 		=> 3,
        'cumple'					=> $data["d3"],
        'observaciones' 	=> $data["o3"],
        'usuario_id'      => $this->session->userdata("busuario_id")
      ),array(
        'solicitud_id'		=> $data["solicitud_id"],
        'documento_id' 		=> 4,
        'cumple'					=> $data["d4"],
        'observaciones' 	=> $data["o4"],
        'usuario_id'      => $this->session->userdata("busuario_id")
      ),array(
        'solicitud_id'		=> $data["solicitud_id"],
        'documento_id' 		=> 5,
        'cumple'					=> $data["d5"],
        'observaciones' 	=> $data["o5"],
        'usuario_id'      => $this->session->userdata("busuario_id")
      ),array(
        'solicitud_id'		=> $data["solicitud_id"],
        'documento_id' 		=> 6,
        'cumple'					=> $data["d6"],
        'observaciones' 	=> $data["o6"],
        'usuario_id'      => $this->session->userdata("busuario_id")
      ),array(
        'solicitud_id'		=> $data["solicitud_id"],
        'documento_id' 		=> 7,
        'cumple'					=> $data["d7"],
        'observaciones' 	=> $data["o7"],
        'usuario_id'      => $this->session->userdata("busuario_id")
      ),array(
        'solicitud_id'		=> $data["solicitud_id"],
        'documento_id' 		=> 8,
        'cumple'					=> $data["d8"],
        'observaciones' 	=> $data["o8"],
        'usuario_id'      => $this->session->userdata("busuario_id")
      ),array(
        'solicitud_id'		=> $data["solicitud_id"],
        'documento_id' 		=> 9,
        'cumple'					=> $data["d9"],
        'observaciones' 	=> $data["o9"],
        'usuario_id'      => $this->session->userdata("busuario_id")
      ),array(
        'solicitud_id'		=> $data["solicitud_id"],
        'documento_id' 		=> 10,
        'cumple'					=> $data["d10"],
        'observaciones' 	=> $data["o10"],
        'usuario_id'      => $this->session->userdata("busuario_id")
      ),array(
        'solicitud_id'		=> $data["solicitud_id"],
        'documento_id' 		=> 11,
        'cumple'					=> $data["d11"],
        'observaciones' 	=> $data["o11"],
        'usuario_id'      => $this->session->userdata("busuario_id")
      ),array(
        'solicitud_id'		=> $data["solicitud_id"],
        'documento_id' 		=> 12,
        'cumple'					=> $data["d12"],
        'observaciones' 	=> $data["o12"],
        'usuario_id'      => $this->session->userdata("busuario_id")
      )
    );
		
    //print_r($insert);

		if($this->db->insert_batch('solicitudes_documentos',$insert)){
			return TRUE;		
		}
		return FALSE;
	}

}

/* End of file Model_solicitudes_documentos.php */
/* Location: ./application/models/Model_solicitudes_documentos.php */