<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Municipios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("model_municipios");
	}

	public function index(){}

	public function gets_select_municipios(){
		$data=array(
			'estado_id'			=> 	$this->input->post('estado_id'),
			'municipio_id'	=>	$this->input->post('municipio_id')
		);
		echo $this->model_municipios->gets_select($data);
	}

}

/* End of file Municipios.php */
/* Location: ./application/controllers/Municipios.php */