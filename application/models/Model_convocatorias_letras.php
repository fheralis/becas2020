<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_convocatorias_letras extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	/*funcion que devuelve las letras para el registro del dia*/
	public function gets_letras_del_dia($conv){
		$where=array(
			'convocatoria_id'	=>	$conv
		);

		$this->db->from("convocatorias_letras");
		$this->db->where($where);
		$this->db->where('curdate() between fecha_inicio and fecha_fin');
		
		if($query=$this->db->get()){
			return $query->row_array();
		}
		return false;
	}

	/*funcion que devuelve las letras para el registro del dia*/
	public function gets_letras_del_dia_array($conv){
		$where=array(
			'convocatoria_id'	=>	$conv
		);

		//$this->db->select('municipio_id,municipio,convocatoria_id');
		$this->db->from("convocatorias_letras");
		$this->db->where($where);
		$this->db->where('curdate() between fecha_inicio and fecha_fin');
		
		if($query=$this->db->get()){
			$rows=$query->result();
			$cad="";
			foreach($rows as $row){
				$cad.=$row->letras.",";
			}
			$cad=substr($cad,0,strlen($cad)-1);
			return $cad;
		}
		return false;
	}

}

/* End of file Model_convocatorias_letras.php */
/* Location: ./application/models/Model_convocatorias_letras.php */