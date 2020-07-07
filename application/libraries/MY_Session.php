<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Session extends CI_Session{
	
	public function __construct($params = array()) {
		parent::__construct($params);
	}
	
	//verifica que la session del estudiante exista
	public function verificar_acceso(){
		$login=$this->userdata('login');
		if($login==FALSE || $login==''){
			redirect('index.php/usuarios/login');
		}
	}

  /**
 	* verifica que la sesion exista si es asi el acceso es correcto
 	*/
  public function acceso($session,$permiso)
  {
  	if(!$session->userdata('tlogin')){
  		redirect(base_url().'index.php/usuarios/login');
  	}
  	else{
      if(!in_array($session->userdata('ttipo_usuario_id'),$permiso)){
       	redirect(base_url().'index.php/messages/permisos');
      }
    }
  }

  /*redirecciona a not found*/
	public function redirec_not_found($value){
		if($value==TRUE){
			redirect(base_url().'index.php/error/error_404');
		}
	}
	
}
?>