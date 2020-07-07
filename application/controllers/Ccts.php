<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ccts extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("model_ccts");
	}


	public function invitaciones(){
		$this->load->library('fpdf/fpdf');
		$data=array(
			'pdf'		=>	$this->fpdf,
			'ccts'	=>	$this->model_ccts->invitaciones(),
		);
		$this->load->view('pdf/invitaciones',$data);
	}

	public function listados137(){
		$this->load->library('fpdf/fpdf');
		$data=array(
			'pdf'		=>	$this->fpdf,
			'ccts'	=>	$this->model_ccts->invitaciones(),
		);
		$this->load->view('pdf/listados137',$data);
	}










	public function index(){}

	/*fuincion que genera el select de ccts*/
	public function ajax_select_ccts(){
		$where=array(
			'convocatoria_id'			=>	$this->session->userdata("bconv"),
			'municipio_id'				=>	$this->input->post('municipio_id'),
			'nivel_educativo_id'	=>	$this->input->post('nivel_educativo_id')
		);
		$data=array(
			'where'		=>	$where,
			'cct_id'	=>	$this->input->post('cct_id')
		);
		echo $this->model_ccts->gets_select($data);
	}

	public function oficios_directores($cct=""){
		// $where=array(
		// 	'cct like '			=>	$cct
		// );

		$this->load->library('fpdf/fpdf');
		$data=array(
			'pdf'		=>	$this->fpdf,
			'ccts'	=>	$this->model_ccts->oficios_directores(),
		);
		$this->load->view('pdf/oficios_directores',$data);
	}

	public function listados(){
		$this->load->library('fpdf/fpdf');
		$data=array(
			'pdf'		=>	$this->fpdf,
			'ccts'	=>	$this->model_ccts->oficios_directores(),
		);
		$this->load->view('pdf/listados',$data);
	}

	public function gets_lista($cct_id){
		$lista=$this->model_ccts->gets_lista($cct_id);
	}

}

/* End of file Ccts.php */
/* Location: ./application/controllers/Ccts.php */