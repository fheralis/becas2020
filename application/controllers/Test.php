<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	private $plantilla='templates/basico/';
	private $body='templates/basico/body';

	public function __construct(){
		parent::__construct();
		$this->load->model('model_preguntas');
		$this->load->model('model_respuestas');
		$this->load->model('model_control_escolar');
		$this->load->model('model_solicitudes');
		$this->load->model('model_tutores_responsables');
		$this->load->model('model_estudiantes');
	}

	public function comprobante($folio){

		$datos=$this->model_estudiantes->datos_x_folio($folio);
		$padre=$this->model_tutores_responsables->padres($datos["curp"],1);
		
		$this->load->library('fpdf/fpdf');
		$data=array(
			'pdf'		=>	$this->fpdf,
			'info'	=>	$this->model_solicitudes->comprobante($datos["curp"]),
			'padre'	=>	$this->model_tutores_responsables->padres($datos["curp"],1),
			'madre'	=>	$this->model_tutores_responsables->padres($datos["curp"],2)
		);
		$this->load->view('pdf/comprobante',$data);
	}

	public function index($curp){
		$padre=$this->model_tutores_responsables->padres($curp,1);
		//print_r($padre);
		$this->load->library('fpdf/fpdf');
		$data=array(
			'pdf'		=>	$this->fpdf,
			'info'	=>	$this->model_solicitudes->comprobante($curp),
			'padre'	=>	$this->model_tutores_responsables->padres($curp,1),
			'madre'	=>	$this->model_tutores_responsables->padres($curp,2)
		);
		$this->load->view('pdf/comprobante',$data);
	}

	public function db(){
		$data=array(
			'titulo'																=>	'Bases de Datos',
			'plantilla'															=>	$this->plantilla,
			'view'																	=>	'test/db',
			'preguntas'															=>	$this->model_preguntas->gets_preguntas(),
			'alumnos'																=>	$this->model_control_escolar->gets_alumnos()
		);
		$this->load->view($this->body,$data);
	}


	/*muestra la vista de los tabs*/
	public function tabs(){
		$data=array(
			'titulo'																=>	'Registro',
			'plantilla'															=>	$this->plantilla,
			'view'																	=>	'test/tabs'
		);
		$this->load->view($this->body,$data);
	}	

	/*muestra la vista de registro*/
	public function registro(){
		$data=array(
			'titulo'																=>	'Registro',
			'plantilla'															=>	$this->plantilla,
			'view'																	=>	'test/registro'
		);
		$this->load->view($this->body,$data);
	}	

	/*muestra la vista de registro*/
	public function preguntas(){
		// $this->session->acceso($this->session,array(1,2));
		$data=array(
			'titulo'																=>	'Preguntas',
			'plantilla'															=>	$this->plantilla,
			'view'																	=>	'test/preguntas',
			'preguntas'															=>	$this->model_preguntas->gets_preguntas()
		);
		$this->load->view($this->body,$data);
	}

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */