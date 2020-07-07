<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_niveles_educativos extends CI_Model {


	public function __construct(){
		parent::__construct();
	}
	
	public function gets_niveles_educativos(){
		$resultado = $this->db->get('niveles_educativos');
		if($resultado->num_rows() > 0 )
			return $resultado->result_array();
		else
			return FALSE;
	}

	//para el select dependiente
	public function gets_select($data){

		if($this->session->userdata("btnc")==1){
			$tnc=array('1','2');
		}else if($this->session->userdata("btnc")==2){
			$tnc=array('3','4');
		}
		else if($this->session->userdata("btnc")==3){
			$tnc=array('5');
		}

		$where=array(
			'convocatoria_id'			=>	$data["convocatoria_id"],
			'municipio_id'				=>	$data['municipio_id']
		);

		$this->db->from("vw_niveles_educativos_convocatorias");
		$this->db->where($where);
		$this->db->where_in('nivel_educativo_id', $tnc);
		$this->db->order_by("nivel_educativo_id","ASC");
		$query=$this->db->get();

		$cad=null;
		if($query->num_rows()>0){
			$cad.="<select id='niveles_educativos' name='niveles_educativos' class='form-control'>";
			$cad.="<option value='0'>SELECCIONE UNA OPCIÓN</option>";
			foreach ($query->result_array() as $value) {
				if($data["nivel_educativo_id"]==$value["nivel_educativo_id"]) {
					$cad.="<option selected value='".$value["nivel_educativo_id"]."'>".$value["descripcion"]."</option>";
				}
				else{
					$cad.="<option value='".$value["nivel_educativo_id"]."'>".$value["descripcion"]."</option>";
				}
			}
			$cad.="</select>";
			return $cad;
		}
		return "<select id='niveles_educativos' name='niveles_educativos' class='form-control'></select>";
	}

}

/* End of file Model_niveles_educativos.php */
/* Location: ./application/models/Model_niveles_educativos.php */