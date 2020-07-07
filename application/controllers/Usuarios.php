<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	private $plantilla='templates/basico/';
	private $body='templates/basico/body';

	public function __construct(){
		parent::__construct();
		$this->load->model("model_usuarios");
	}

	public function index(){}

	//funcion que muestra el formulario de acceso
  function login(){
  	// if($this->session->userdata('tlogin')==TRUE){
  	// 	redirect(base_url().'index.php/home');
  	// }

		$data=array(
			'plantilla'		=>	$this->plantilla,
			'view'				=>	'usuarios/login',
			'titulo'			=>	'Login'
		);
		$this->load->view($this->body,$data);
  }



  /*funcion que verifica en el modelo si el usuario y el password son corrector*/
  public function iniciar_session(){
  	$data=array(
  		'usuario'								=>	$this->input->post('usuario'),
  		'pass'									=>	md5($this->input->post('pass')),
  		'estatus_usuario_id'		=>	1
  	);

  	$resp=$this->model_usuarios->iniciar_session($data);

  	if($resp==1){
  		$this->_crear_session($data);
  	}
  	echo $resp;
  }

  //funcion que crea una session de usuario
	public function _crear_session($data){
		$usuario=$this->model_usuarios->gets_usuario($data);
		$session=array(
			'busuario_id'					=>	$usuario['usuario_id'],
			'busuario'						=>	$usuario['usuario'],
			'bnombre'							=>	$usuario['nombre'],
			'btipo_usuario_id'		=>	$usuario['tipo_usuario_id'],
			'btipo_usuario'				=>	$usuario['tipo_usuario'],
			'bestatus_usuario_id'	=>	$usuario['estatus_usuario_id'],
			'bestatus_usuario'		=>	$usuario['estatus_usuario'],
			'bulogin'							=>	TRUE
		);
		$this->session->set_userdata($session);
	}

	//funcion que termina la session y redirecciona
	public function salir(){
		$datasession=array('tusuario_id','tusuario','ttipo_usuario_id','ttipo_usuario','tstatus_usuario_id','tstatus_usuario','tinstitucion_id','tnombre_institucion','tlogin');		
    $this->session->unset_userdata($datasession);
		$this->session->sess_destroy();
		redirect(base_url());
	}






}

/* End of file Usuarios.php */
/* Location: ./application/controllers/Usuarios.php */