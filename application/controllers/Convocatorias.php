<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Convocatorias extends CI_Controller {
	private $plantilla='templates/basico/';
	private $body='templates/basico/body';

	public function __construct(){
		parent::__construct();
		$this->load->library("sistema");
		$this->load->model("model_convocatorias");
		$this->load->model("model_convocatorias_letras");
		$this->load->model("model_estudiantes");
	}

	public function home(){

		if(!$this->session->userdata("bulogin")){
			redirect('convocatorias/','refresh');
		}
		$data=array(
			'titulo'								=>	'Home',
			'plantilla'							=>	$this->plantilla,
			'view'									=>	'convocatorias/home',
			//'info'									=>	$this->model_solicitudes->comprobante($this->session->bcurp)
		);
		$this->load->view($this->body,$data);
	}

	public function salir(){
		$session=array('busuario_id','busuario','bnombre','btipo_usuario_id','btipo_usuario','bestatus_usuario_id','bestatus_usuario','bulogin');
		$this->session->unset_userdata($session);
		redirect('convocatorias/','refresh');
	}


	// muestra el formulario que muestra las convocatorias vigentes
	public function index(){

		if($this->session->blogin==TRUE){
			redirect('solicitudes/registro','refresh');
		}
		else{
			$data=array(
				'titulo'								=>	'Sistema de Becas',
				'plantilla'							=>	$this->plantilla,
				'view'									=>	'convocatorias/index'
			);
			$this->load->view($this->body,$data);
		}
	}

	//test de acceso al registro de becas
	public function acceso($tnc=0){
		if(in_array($tnc,$this->sistema->tca)){
			$data=array(
				'titulo'								=>	'Registro en Linea - ',
				'plantilla'							=>	$this->plantilla,
				'tnc'										=>	$tnc,
				'view'									=>	'convocatorias/acceso',
				'letras'								=> 	$this->model_convocatorias_letras->gets_letras_del_dia(1)
			);
			$this->load->view($this->body,$data);
		}
	}

	/*verifica la curp si no esta registrado ya*/
	function ingresar_registro(){

		//BUSCAR LAS LETRAS VALIDAS
		$letras=$this->model_convocatorias_letras->gets_letras_del_dia(1);
		//SUSTRAER LA PRIMERA LETRA
		$letra=substr($this->input->post("curp"),0,1);
		//BUSCAR LA LETRA DE LA CURP EN LA LISTA DE LETRAS VALIDAS
		$pos=strpos($letras["letras"],$letra);

		//$promedio=$this->model_estudiantes->promedio($this->input->post("curp"));

		// if($promedio){
			
		// }

		//RETORNAR EL VALOR OBTENIDO
		if($pos===FALSE){
			echo 2;
		}
		else{
			$tab=0;
			$existe=$this->model_estudiantes->existe_estudiante($this->input->post("curp"));
			
			//print_r($existe);

			if($existe==TRUE){
				if($existe["tab"]==3){
					$tab=3;
				}
				else if($existe["tab"]==2){
					$tab=2;
				}
				else{
					$tab=1;
				}
			}

			$data=array(
				'curp'			=> $this->input->post("curp"),
				'tnc'			=>	$this->input->post("tnc"),
				'tab'			=>	$tab
			);

			$this->_crear_session($data);
			echo 1;	
		}

	}


	//funcion que crea una session de usuario
	public function _crear_session($data){
		$session=array(
			'bcurp'					=>	$data['curp'],
			'btnc'					=>	$data['tnc'],
			'btab'					=>	$data['tab'],
			'bconv'					=>	1,
			'blogin'				=>	TRUE
		);
		$this->session->set_userdata($session);
	}
}

/* End of file Convocatorias.php */
/* Location: ./application/controllers/Convocatorias.php */