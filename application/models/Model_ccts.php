<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ccts extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function invitaciones(){
		$this->db->from("vw_escuelas_centro");
		$query=$this->db->get();
		return $query->result_array();
	}

	public function oficios_directores(){
		$this->db->from("vw_oficios_directores");
		$where=array(
			" cct_id"	=>	282
		);
		$this->db->where($where);
		$this->db->order_by("nombre_escuela","ASC");
		$query=$this->db->get();
		return $query->result_array();
	}

	public function gets_lista($cct_id){
		$where=array(
			'tipo_situacion_id'			=>	2,
			'cct_id'								=>	$cct_id
		);

		$this->db->from("vw_comprobante");
		$this->db->where($where);
		$this->db->order_by("solicitud_id","ASC");
		if($query=$this->db->get()){
			return $query;
		}
	}
	

	//para el select dependiente
	public function gets_select($data){
		$this->db->from("vw_ccts_convocatorias");
		$this->db->where($data["where"]);
		$this->db->order_by("nombre_escuela","ASC");
		$query=$this->db->get();

		$cad=null;
		if($query->num_rows()>0){
			$cad.="<select id='ccts' name='ccts' class='form-control'>";
			$cad.="<option value='0'>SELECCIONE UNA OPCIÓN</option>";
			foreach ($query->result_array() as $value) {
				if($data["cct_id"]==$value["cct_id"]) {
					$cad.="<option selected value='".$value["cct_id"]."'>".$value["nombre_escuela"]." - ".$value["cct"]."</option>";
				}
				else{
					$cad.="<option value='".$value["cct_id"]."'>".$value["nombre_escuela"]." - ".$value["cct"]."</option>";
				}
			}
			$cad.="</select>";
			return $cad;
		}
		return "<select id='ccts' name='ccts' class='form-control'></select>";
	}

}

/* End of file Model_ccts.php */
/* Location: ./application/models/Model_ccts.php */