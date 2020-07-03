<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_codigos_postales extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	/*obtener colonia del solicitante*/
	public function gets_colonias_municipios_estados($cp){
		$where=array(
			'cp_id'		=>	$cp
		);

		$this->db->from("vw_colonias_municipios_estados");
		$this->db->where($where);
		
		if($query=$this->db->get()){
			return $query->row_array();
		}
		return FALSE;
	}

	//para el select dependiente
	public function gets_select($data){
		$this->db->from("codigos_postales");
		$this->db->where(array("municipio_id"=>$data["municipio_id"]));
		$this->db->order_by("asentamiento","ASC");
		$query=$this->db->get();

		$cad=null;
		if($query->num_rows()>0){
			$cad.="<select id='colonias' name='colonias' class='form-control'>";
			$cad.="<option value='0'>SELECCIONE UNA OPCIÓN</option>";
			foreach ($query->result_array() as $value) {
				if($data["cp_id"]==$value["cp_id"]){
					$cad.="<option selected value='".$value["cp_id"]."'>".$value["asentamiento"].' - TIPO: '. $value["tipo_asentamiento"]. ' - C.P.: ' . $value["cp"] ."</option>";
				}
				else{
					$cad.="<option value='".$value["cp_id"]."'>".$value["asentamiento"].' - TIPO: '. $value["tipo_asentamiento"]. ' - C.P.: ' . $value["cp"] ."</option>";
				}
				

			}
			$cad.="</select>";
			return $cad;
		}
		return "<select id='colonias' name='colonias' class='form-control'></select>";
	}

}

/* End of file Model_colonias.php */
/* Location: ./application/models/Model_colonias.php */