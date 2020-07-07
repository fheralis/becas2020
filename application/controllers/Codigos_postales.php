<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codigos_postales extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("model_codigos_postales");
	}

	public function index(){}

	public function ajax_select_codigos_postales(){
		$data=array(
			'municipio_id'	=> $this->input->post('municipio_id'),
			'cp_id'					=> $this->input->post('cp_id')
		);
		echo $this->model_codigos_postales->gets_select($data);
	}

}

/* End of file Codigos_postales.php */
/* Location: ./application/controllers/Codigos_postales.php */