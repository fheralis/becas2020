<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiantes extends CI_Controller {
	private $plantilla='templates/basico/';
	private $body='templates/basico/body';

	public function __construct(){
		parent::__construct();
		$this->load->model("model_estudiantes");
		$this->load->model("model_solicitudes");
	}

	public function index(){}


	public function oficio_52(){
		$this->load->library('fpdf/fpdf');
		$data=array(
			'pdf'		=>	$this->fpdf,
			'infos'	=>	$this->model_solicitudes->comprobante52()
		);
		$this->load->view('pdf/oficio_52',$data);
	}

	//funcion que muestra el formulario de acceso
  function login(){
  	// if($this->session->userdata('tlogin')==TRUE){
  	// 	redirect(base_url().'index.php/home');
  	// }

		$data=array(
			'plantilla'		=>	$this->plantilla,
			'view'				=>	'estudiantes/login',
			'titulo'			=>	'Login'
		);
		$this->load->view($this->body,$data);
  }



  /*funcion que verifica en el modelo si el usuario y el password son corrector*/
  public function iniciar_session(){
  	$data=array(
  		'curp'					=>	$this->input->post('curp'),
  		'clave'					=>	$this->input->post('clave')
  	);

  	$resp=$this->model_estudiantes->iniciar_session($data);

  	if($resp==1){
  		$this->_crear_session($this->input->post('curp'));
  	}
  	echo $resp;
  }

  // muestra el formulario de detalles del registro
	public function detalles(){
		if($this->session->userdata("elogin")==1){
			$data=array(
				'titulo'								=>	'Detalles del solicitante',
				'plantilla'							=>	$this->plantilla,
				'view'									=>	'estudiantes/detalles',
				'info'									=>	$this->model_solicitudes->comprobante($this->session->curp)
			);
			$this->load->view($this->body,$data);
		}
		else{
			redirect('estudiantes/login');
		}
	}

	public function oficio($curp){
		//$padre=$this->model_tutores_responsables->padres($curp,1);
		//print_r($padre);
		$this->load->library('fpdf/fpdf');
		$data=array(
			'pdf'		=>	$this->fpdf,
			'info'	=>	$this->model_solicitudes->comprobante($curp),
			// 'padre'	=>	$this->model_tutores_responsables->padres($curp,1),
			// 'madre'	=>	$this->model_tutores_responsables->padres($curp,2)
		);
		$this->load->view('pdf/oficio',$data);
	}

  //funcion que crea una session de usuario
	public function _crear_session($curp){
		$estudiante=$this->model_solicitudes->comprobante($curp);
		$session=array(
			'estudiante_id'				=>	$estudiante['estudiante_id'],
			'curp'								=>	$estudiante['curp'],
			'nombres'							=>	$estudiante['nombres'],
			'primer_apellido'			=>	$estudiante['primer_apellido'],
			'segundo_apellido'		=>	$estudiante['segundo_apellido'],
			'email'								=>	$estudiante['email'],
			'tipo_situacion_id'		=>	$estudiante['tipo_situacion_id'],
			'elogin'							=>	TRUE
		);
		$this->session->set_userdata($session);
	}

	//funcion que termina la session y redirecciona
	public function salir(){
		$datasession=array('estudiante_id','curp','nombres','primer_apellido','segundo_apellido','email','elogin','tipo_situacion_id');
    $this->session->unset_userdata($datasession);
		$this->session->sess_destroy();
		redirect(base_url()."index.php/estudiantes/login");
	}

}

/* End of file Usuarios.php */
/* Location: ./application/controllers/Usuarios.php */