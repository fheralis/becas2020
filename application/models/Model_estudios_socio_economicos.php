<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_estudios_socio_economicos extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	/**/
	public function registro_update_es($es){
		
		$data=array(
		  array(
		  	'solicitud_id' 	=> $es["solicitud_id"],
		    'respuesta_id' 	=> $es["p1"]
		  ),
		  array(
		  	'solicitud_id' 	=> $es["solicitud_id"],
		    'respuesta_id' 	=> $es["p2"]
		  ),
		  array(
		  	'solicitud_id' 	=> $es["solicitud_id"],
		    'respuesta_id' 	=> $es["p3"]
		  ),
		  array(
		  	'solicitud_id' 	=> $es["solicitud_id"],
		    'respuesta_id' 	=> $es["p4"]
		  ),
		  array(
		  	'solicitud_id' 	=> $es["solicitud_id"],
		    'respuesta_id' 	=> $es["p5"]
		  )
		);

		if($this->eliminarES($es["solicitud_id"])){
			if($this->db->insert_batch('estudios_socio_economicos',$data)){
				return TRUE;
			}
			else{//si ocurrio un error al momento de guardar los datos
				return FALSE;
			}
		}

	}

	public function eliminarES($solicitud_id){
		$where=array(
			'solicitud_id' => $solicitud_id
		);
		$this->db->where($where);
		if($this->db->delete('estudios_socio_economicos')){
			return TRUE;
		}
		return FALSE;
	}

}

/* End of file Model_estudios_socio_economicos.php */
/* Location: ./application/models/Model_estudios_socio_economicos.php */