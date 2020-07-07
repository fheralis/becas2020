<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_municipios extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	/*funcion que devuelve solo los municipios participantes en las becas*/
	public function gets_municipios_convocatorias(){
		$where=array(
			'convocatoria_id'	=>	$this->session->userdata("bconv")
		);

		if($this->session->userdata("btnc")==1){
			$tnc=array('1','2');
		}else if($this->session->userdata("btnc")==2){
			$tnc=array('3','4');
		}
		else if($this->session->userdata("btnc")==3){
			$tnc=array('5');
		}		

		$this->db->select('municipio_id,municipio,convocatoria_id');
		$this->db->from("vw_municipios_niveles_educativos");
		$this->db->where($where);
		$this->db->where_in('nivel_educativo_id', $tnc);
		$this->db->group_by(array('municipio_id','municipio','convocatoria_id'));
		$this->db->order_by("municipio","ASC");
		
		if($query=$this->db->get()){
			return $query->result_array();
		}
		return false;
	}

	// /*funcion que devuelve solo los municipios participantes en las becas*/
	// public function gets_municipios_convocatorias(){
	// 	$where=array(
	// 		'convocatoria_id'	=>	1,
	// 	);

	// 	$this->db->from("vw_municipios_convocatorias");
	// 	$this->db->where($where);
	// 	//$this->db->order_by("nombre","ASC");
		
	// 	if($query=$this->db->get()){
	// 		return $query->result_array();
	// 	}
	// 	return false;
	// }

	//para el select dependiente
	public function gets_select($data){
		$query=$this->db->get_where('municipios',array('estado_id'=>$data["estado_id"]));
		$cad=null;
		if($query->num_rows()>0){
			$cad.="<select id='municipios' name='municipios' class='form-control text-uppercase'>";
			$cad.="<option value='0'>SELECCIONE UNA OPCIÓN</option>";
			foreach ($query->result_array() as $value) {

				if($data["municipio_id"]==$value["municipio_id"]){
					$cad.="<option selected value='".$value["municipio_id"]."'>".$value["nombre"]."</option>";
				}
				else{
					$cad.="<option value='".$value["municipio_id"]."'>".$value["nombre"]."</option>";
				}

			}
			$cad.="</select>";
			return $cad;
		}
		return "<select id='municipios' name='municipios' class='form-control text-uppercase'></select>";
	}

}

/* End of file Model_municipios.php */
/* Location: ./application/models/Model_municipios.php */