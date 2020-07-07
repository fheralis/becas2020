<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_estudiantes extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	/*verificar si el estudiante que inicia session existe*/
	public function iniciar_session($data){
		$query=$this->db->get_where('vw_comprobante',$data);
		if($query->num_rows()>0){
			return 1;
		}
		return 2;
	}

	public function datos_x_folio($folio){
		$where=array(
			'solicitud_id'		=>	$folio
		);

		$this->db->from("vw_comprobante");
		$this->db->where($where);
		
		if($query=$this->db->get()){
			return $query->row_array();
		}
		return FALSE;
	}


	public function promedio($curp){
		$where=array(
			'curp'		=>	$curp
		);

		$this->db->from("control_escolar");
		$this->db->where($where);
		
		if($query=$this->db->get()){
			return $query->row_array();
		}
		return FALSE;
	}

	/*regresa los datos de un estuidiante dada la curp*/
	function gets_estudiantes_t2($curp){
		$where=array(
			'curp'		=>	$curp
		);

		$this->db->from("vw_estudiantes_solicitudes");
		$this->db->where($where);
		
		if($query=$this->db->get()){
			return $query->row_array();
		}
		return FALSE;
	}

	/*regresa el id del estudiante*/
	public function id_estudiante($curp){
		$where=array(
			'curp'		=>	$curp
		);

		$this->db->from("estudiantes");
		$this->db->where($where);
		
		if($query=$this->db->get()){
			return $query->row_array();
		}
		return FALSE;
	}

	/*guardar o actualizar los datos del solicitante*/
	public function registro_personales_ajax($data){
		$estudiantes=array(
			'curp'												=>	$data["curp"],
			'nombres'											=>	$data["nombre"],
			'primer_apellido'							=>	$data["primer_apellido"],
			'segundo_apellido'						=>	$data["segundo_apellido"],
			'email'												=>	$data["email"],
			'cp_id'												=>	$data["colonias"],
			'calle'												=>	$data["calle"],
			'numero'											=>	$data["numero"],
			'padres'											=>	$data["padres"],
			'clave'												=>	$data["clave"],
			'estatus_id'									=>	1
		);

		if($this->session->userdata("btab")>=1){
			$info=$this->id_estudiante($data["curp"]);
			$this->db->where('estudiante_id',$info["estudiante_id"]);
			/*si los datos se agregaron correctamente*/
			if($this->db->update('estudiantes',$estudiantes)){
				$this->borrarPadres($info["estudiante_id"]);
				if($data["padres"]==1 || $data["padres"]==3){
					$padre=array(
						'curp'										=>	$data["curp_padre"],
						'nombres'									=>	$data["nombre_padre"],
						'primer_apellido'					=>	$data["primer_apellido_padre"],
						'segundo_apellido'				=>	$data["segundo_apellido_padre"],
						'parentesco_id'						=>	1,
						'situacion_familiar_id'		=>	$data["situacion_familiar_padre"],
						'estudiante_id'						=>	$info["estudiante_id"]
					);
					$this->db->insert('familiares',$padre);
				}
				
				if($data["padres"]==1 || $data["padres"]==2){
					$madre=array(
						'curp'										=>	$data["curp_madre"],
						'nombres'									=>	$data["nombre_madre"],
						'primer_apellido'					=>	$data["primer_apellido_madre"],
						'segundo_apellido'				=>	$data["segundo_apellido_madre"],
						'parentesco_id'						=>	2,
						'situacion_familiar_id'		=>	$data["situacion_familiar_madre"],
						'estudiante_id'						=>	$info["estudiante_id"]
					);
					$this->db->insert('familiares',$madre);
				}
				return 1;
			}
			else{/*si ocurrio un error al momento de actualizar los datos*/
				return 2;
			}
		}
		else{
			if($this->db->insert('estudiantes',$estudiantes)){
				$id=$this->db->insert_id();
				if($data["padres"]==1 || $data["padres"]==3){
					$padre=array(
						'curp'										=>	$data["curp_padre"],
						'nombres'									=>	$data["nombre_padre"],
						'primer_apellido'					=>	$data["primer_apellido_padre"],
						'segundo_apellido'				=>	$data["segundo_apellido_padre"],
						'parentesco_id'						=>	1,
						'situacion_familiar_id'		=>	$data["situacion_familiar_padre"],
						'estudiante_id'						=>	$id
					);
					$this->db->insert('familiares',$padre);
				}
				
				if($data["padres"]==1 || $data["padres"]==2){
					$madre=array(
						'curp'										=>	$data["curp_madre"],
						'nombres'									=>	$data["nombre_madre"],
						'primer_apellido'					=>	$data["primer_apellido_madre"],
						'segundo_apellido'				=>	$data["segundo_apellido_madre"],
						'parentesco_id'						=>	2,
						'situacion_familiar_id'		=>	$data["situacion_familiar_madre"],
						'estudiante_id'						=>	$id
					);
					$this->db->insert('familiares',$madre);
				}
				return 1;
			}
			else{//si ocurrio un error al momento de guardar los datos
				return 2;
			}
		}
	}


	public function borrarPadres($eid){
		$where=array(
			'estudiante_id' => $eid
		);

		$this->db->where($where);
		$this->db->where_in('parentesco_id',array(1,2));

		if($this->db->delete('familiares') ){

		}
	}




























	/*ACTUALIZA DATOS EN LA TABLA DE TITULOS*/
	public function editar_ajax($data,$titulo_electronico_id){
		$this->db->where('titulo_electronico_id',$titulo_electronico_id);
		/*si los datos se agregaron correctamente*/
		if($this->db->update('titulos',$data)){
			return 1;
		}
		else{/*si ocurrio un error al momento de actualizar los datos*/
			return 2;
		}
	}

	/*INSERTAR DATOS EN LA TABLA DE TITULOS*/
	public function registro_ajax($data){
		/*si los datos se agregaron correctamente*/
		if($this->db->insert('titulos',$data)){
			return 1;
		}
		else{/*si ocurrio un error al momento de guardar los datos*/
			return 2;
		}
	}


















	/*funcion que devuelve solo los municipios participantes en las becas*/
	public function existe_estudiante($curp){
		$where=array(
			'curp'	=>	$curp
		);

		$this->db->from("vw_estudiantes_solicitudes");
		$this->db->where($where);
		
		if($query=$this->db->get()){
			return $query->row_array();
		}
		return FALSE;
	}

}

/* End of file Model_estudiantes.php */
/* Location: ./application/models/Model_estudiantes.php */