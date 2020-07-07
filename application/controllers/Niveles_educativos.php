<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Niveles_educativos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("model_niveles_educativos");
	}

	public function gets_select_niveles(){
		$where=array(
			'convocatoria_id'			=>	$this->session->userdata("bconv"),
			'municipio_id'				=>	$this->input->post('municipio_id'),
			'nivel_educativo_id'	=>	$this->input->post('nivel_educativo_id')
		);
		// $where_in=array(1,2);

		// $data=array(
		// 	'where'					=>	$where,
		// 	'where_in'			=>	$where_in
		// );
		echo $this->model_niveles_educativos->gets_select($where);
	}

}

/* End of file Niveles_educativos.php */
/* Location: ./application/controllers/Niveles_educativos.php */