<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitudes extends CI_Controller {
	private $plantilla='templates/basico/';
	private $body='templates/basico/body';

	public function __construct(){
		parent::__construct();
		$this->load->model('model_estados');
		$this->load->model('model_municipios');
		$this->load->model('model_preguntas');
		$this->load->model('model_respuestas');
		$this->load->model('model_situacion_familiares');
		$this->load->model('model_parentescos');
		$this->load->model('model_estados_civiles');
		$this->load->model('model_control_escolar');
		$this->load->model('model_estudiantes');
		$this->load->model('model_solicitudes');
		$this->load->model('model_familiares');
		$this->load->model('model_codigos_postales');
		$this->load->model('model_estudios_socio_economicos');
		$this->load->model('model_tutores_responsables');
		$this->load->model('model_documentos');
		$this->load->model('model_logs');
		$this->load->model('model_solicitudes_documentos');
		$this->load->model('model_solicitudes_logs');
	}

	public function index(){}


	public function validar_solicitud($sol=0){

		if(!$this->session->userdata("bulogin")){
			redirect('convocatorias/','refresh');
		}


		if($sol==0){
			redirect('solicitudes/validar/','refresh');
		}
		else{
			$datos=$this->model_solicitudes->solicitud_x_folio($sol);

			$data=array(
				'titulo'					=>	'Validar solicitud',
				'plantilla'				=>	$this->plantilla,
				'view'						=>	'solicitudes/validar_solicitud',
				'datos'						=>	$datos,
				'padre'						=>	$this->model_tutores_responsables->padres($datos["curp"],1),
				'madre'						=>	$this->model_tutores_responsables->padres($datos["curp"],2),
				'documentos'			=>	$this->model_documentos->gets_documentos(),
				'logs'						=>	$this->model_logs->gets_logs(),
				'folio'						=>	$sol
			);
			$this->load->view($this->body,$data);
		}
	}


	public function terminar_validacion(){

		$data=array(
			"solicitud_id"		=>	$this->input->post("folio"),
			"d1"							=>	$this->input->post("d1"),
			"d2"							=>	$this->input->post("d2"),
			"d3"							=>	$this->input->post("d3"),
			"d4"							=>	$this->input->post("d4"),
			"d5"							=>	$this->input->post("d5"),
			"d6"							=>	$this->input->post("d6"),
			"d7"							=>	$this->input->post("d7"),
			"d8"							=>	$this->input->post("d8"),
			"d9"							=>	$this->input->post("d9"),
			"d10"							=>	$this->input->post("d10"),
			"d11"							=>	$this->input->post("d11"),
			"d12"							=>	$this->input->post("d12"),
			"o1"							=>	$this->input->post("o1"),
			"o2"							=>	$this->input->post("o2"),
			"o3"							=>	$this->input->post("o3"),
			"o4"							=>	$this->input->post("o4"),
			"o5"							=>	$this->input->post("o5"),
			"o6"							=>	$this->input->post("o6"),
			"o7"							=>	$this->input->post("o7"),
			"o8"							=>	$this->input->post("o8"),
			"o9"							=>	$this->input->post("o9"),
			"o10"							=>	$this->input->post("o10"),
			"o11"							=>	$this->input->post("o11"),
			"o12"							=>	$this->input->post("o12")
		);
	
		if($this->model_solicitudes_documentos->insert($data)==TRUE){

			$dat=array(
				"solicitud_id"		=>	$this->input->post("folio"),
				"log_id"			=>	$this->input->post("logs"),
				'usuario_id'      	=>	$this->session->userdata("busuario_id")
			);

			if($this->model_solicitudes_logs->insert($dat)){
				echo 1;
			}
			else{
				echo 2;
			}
		}
		else{
			echo 2;
		}

		//print_r($data);

	}



	// muestra el formulario de detalles del registro
	public function validar(){

		if(!$this->session->userdata("bulogin")){
			redirect('convocatorias/','refresh');
		}

		$data=array(
			'titulo'								=>	'Validar solicitud',
			'plantilla'							=>	$this->plantilla,
			'view'									=>	'solicitudes/validar',
		);
		$this->load->view($this->body,$data);
	}

	public function verificar_solicitud(){
		$data=array(
  		'solicitud_id'	=>	$this->input->post('folio')
  	);


		if($this->model_solicitudes_documentos->validado($this->input->post('folio'))==TRUE && $this->model_solicitudes_logs->validado($this->input->post('folio'))==TRUE){
			echo 3;
		}
		else if($this->model_solicitudes_documentos->validado($this->input->post('folio'))==TRUE && $this->model_solicitudes_logs->validado($this->input->post('folio'))==FALSE){
			echo 4;
		}
		else{
			echo $this->model_solicitudes->verificar_solicitud($data);
		}
	}


	// muestra el formulario de detalles del registro
	public function detalles(){
		$data=array(
			'titulo'								=>	'Detalles del registro',
			'plantilla'							=>	$this->plantilla,
			'view'									=>	'solicitudes/detalles',
			'info'									=>	$this->model_solicitudes->comprobante($this->session->bcurp)
		);
		$this->load->view($this->body,$data);
	}

	/*guarda los datos personales del solicitante*/
	public function registro_personales_ajax(){
		$data=array(
			'curp'												=>	$this->input->post("curp"),
			'nombre'											=>	$this->input->post("nombre"),
			'primer_apellido'							=>	$this->input->post("primer_apellido"),
			'segundo_apellido'						=>	$this->input->post("segundo_apellido"),
			'email'												=>	$this->input->post("email"),
			'estados'											=>	$this->input->post("estados"),
			'municipios'									=>	$this->input->post("municipios"),
			'colonias'										=>	$this->input->post("colonias"),
			'calle'												=>	$this->input->post("calle"),
			'numero'											=>	$this->input->post("numero"),
			'padres'											=>	$this->input->post("padres"),
			'curp_padre'									=>	$this->input->post("curp_padre"),
			'nombre_padre'								=>	$this->input->post("nombre_padre"),
			'primer_apellido_padre'				=>	$this->input->post("primer_apellido_padre"),
			'segundo_apellido_padre'			=>	$this->input->post("segundo_apellido_padre"),
			'situacion_familiar_padre'		=>	$this->input->post("situacion_familiar_padre"),
			'curp_madre'									=>	$this->input->post("curp_madre"),
			'nombre_madre'								=>	$this->input->post("nombre_madre"),
			'primer_apellido_madre'				=>	$this->input->post("primer_apellido_madre"),
			'segundo_apellido_madre'			=>	$this->input->post("segundo_apellido_madre"),
			'situacion_familiar_madre'		=>	$this->input->post("situacion_familiar_madre"),
			'clave'												=>	$this->input->post("clave")
		);
		//print_r($data);
		echo $this->model_estudiantes->registro_personales_ajax($data);
	}

	/*guarda los datos academicos del solicitante*/
	public function registro_academicos_ajax(){
		$estudiante=$this->model_estudiantes->id_estudiante($this->session->userdata("bcurp"));

		if($this->session->userdata("btab")==1){
			$tab=2;
		}
		else if($this->session->userdata("btab")==2){
			$tab=2;
		}
		else if($this->session->userdata("btab")==3){
			$tab=3;
		}

		$data=array(
			'estudiante_id'				=>	$estudiante["estudiante_id"],
			"convocatoria_id" 		=> 	$this->session->userdata("bconv"),
			"grado_cursado" 			=> 	$this->input->post("grado_cursado"),
      "promedio_general" 		=> 	$this->input->post("promedio_general"),
      "promedio_basicas" 		=> 	$this->input->post("promedio_basicas"),
      "cct_id" 							=> 	$this->input->post("ccts"),
      "grado_cursar" 				=> 	$this->input->post("grado_cursar"),
      "tipo_situacion_id" 	=> 	1,
      "tab" 								=> 	$tab,
      "estatus_id" 					=> 	1
		);
		//print_r($data);
		echo $this->model_solicitudes->registro_academicos_ajax($data);
	}

	/*guarda los datos socioeconomicos del solicitante*/
	public function registro_socioeconomicos_ajax(){

		$estudiante=$this->model_estudiantes->id_estudiante($this->session->userdata("bcurp"));

		$responsable=array(
			"curp"									=>	$this->input->post("curp_responsable"),
			"nombres"								=>	$this->input->post("nombre_responsable"),
			"primer_apellido"				=>	$this->input->post("primer_apellido_responsable"),
			"segundo_apellido"			=>	$this->input->post("segundo_apellido_responsable"),
			"parentesco_id"					=>	$this->input->post("parentesco_responsable"),
			"estado_civil_id"				=>	$this->input->post("estado_civil_responsable"),
			"trabaja"								=>	$this->input->post("trabaja_en_responsable"),
			"cargo"									=>	$this->input->post("cargo_responsable"),
			"domicilio"							=>	$this->input->post("domicilio_responsable"),
			"percepcion"						=>	$this->input->post("percepcion_responsable"),
			"ingreso_adicional"			=>	$this->input->post("total_ingreso_adicional_responsable"),
			"estudiante_id"					=>	$estudiante["estudiante_id"]
		);

		$solicitud_id=$this->model_solicitudes->get_solicitud_id_curp($this->session->userdata("bcurp"),$this->session->userdata("bconv"));

		$es=array(
			"p1"						=>	$this->input->post("p1"),
			"p2"						=>	$this->input->post("p2"),
			"p3"						=>	$this->input->post("p3"),
			"p4"						=>	$this->input->post("p4"),
			"p5"						=>	$this->input->post("p5"),
			'solicitud_id'	=>	$solicitud_id
		);

		$tr=$this->model_tutores_responsables->registrar_update($responsable);
		$se=$this->model_estudios_socio_economicos->registro_update_es($es);
		$sol=$this->model_solicitudes->update_tab(3,$solicitud_id);

		//print_r($es);

		if($tr==TRUE && $se==TRUE && $sol==TRUE){
			echo 1;
		}
		else{
			echo 2;
		}

	}

	/*funcion que controla la vista de registro de solicitudes*/
	public function registro(){
		
		//echo $this->session->btnc;
		
		if(!$this->session->userdata('blogin')){
			redirect('convocatorias/','refresh');
		}
		else{

			if($this->session->btab==3){
				redirect('solicitudes/detalles','refresh');
			}else{
				if($this->session->userdata("btab")==0){
					$info=$this->control_escolar();
					$infoPadre=FALSE;
					$infoMadre=FALSE;
					$infoCP=array(
						'estado_id'						=>	27,
						'municipio_id'				=>	0,
						'cp_id'								=>	0
					);
					//$infoCP=FALSE;
					$infoTutor=FALSE;
				}
				else if($this->session->userdata("btab")==1){
					$info=$this->model_control_escolar->gets_estudiantes_t1($this->session->userdata("bcurp"));
					$infoPadre=$this->model_familiares->get_familiar(1,$info["estudiante_id"]);
					$infoMadre=$this->model_familiares->get_familiar(2,$info["estudiante_id"]);
					$infoCP=$this->model_codigos_postales->gets_colonias_municipios_estados($info['cp_id']);
					$infoTutor=FALSE;
				}
				else if($this->session->userdata("btab")==2){
					$info=$this->model_estudiantes->gets_estudiantes_t2($this->session->userdata("bcurp"));
					$infoPadre=$this->model_familiares->get_familiar(1,$info["estudiante_id"]);
					$infoMadre=$this->model_familiares->get_familiar(2,$info["estudiante_id"]);
					$infoCP=$this->model_codigos_postales->gets_colonias_municipios_estados($info['cp_id']);
					$infoTutor=FALSE;
				}
				else if($this->session->userdata("btab")==3){
					$info=$this->model_estudiantes->gets_estudiantes_t2($this->session->userdata("bcurp"));
					$infoPadre=$this->model_familiares->get_familiar(1,$info["estudiante_id"]);
					$infoMadre=$this->model_familiares->get_familiar(2,$info["estudiante_id"]);
					$infoCP=$this->model_codigos_postales->gets_colonias_municipios_estados($info['cp_id']);
					$infoTutor=$this->model_tutores_responsables->get_tutor($info["estudiante_id"]);
				}
				
				// echo "TAB:".$this->session->userdata("btab")."<br />";
				// print_r($info);

				$data=array(
					'titulo'								=>	'Registro',
					'plantilla'							=>	$this->plantilla,
					'view'									=>	'solicitudes/registro',
					'estados'								=>	$this->model_estados->gets_estados(),
					'situacion_familiares'	=>	$this->model_situacion_familiares->gets_situacion_familiares(),
					'municipios_conv'				=>	$this->model_municipios->gets_municipios_convocatorias(),
					'parentescos'						=>	$this->model_parentescos->gets_parentescos(),
					'estados_civiles'				=>	$this->model_estados_civiles->gets_estados_civiles(),
					'preguntas'							=>	$this->model_preguntas->gets_preguntas(),
					//'info'									=>	$this->getInfo()
					'info'									=>	$info,
					'infoPadre'							=>	$infoPadre,
					'infoMadre'							=>	$infoMadre,
					'infoCP'								=>	$infoCP,
					'infoTutor'							=>	$infoTutor
				);
				$this->load->view($this->body,$data);
			}
		}

	}


	/*CARGAR LOS DATOS DE CONTROL ESCOLAR SI EXISTEN*/
	public function control_escolar(){
		$info=$this->model_control_escolar->gets_info($this->session->userdata("bcurp"));
		//QUTF801122HTCVRS02
		if($info==FALSE){
			return array(
				'curp'											=>	'',
				'nombres'										=>	'',
				'primer_apellido'						=>	'',
				'segundo_apellido'					=>	'',
				'email'											=>	'',
				'estados'										=>	27,
				'calle'											=>	'',
				'numero'										=>	'',
				'grado_cursado'							=>	'',
				'promedio_general'					=>	'',
				'promedio_basicas'					=>	'',
				'grado_cursar'							=>	'',
				'nivel_educativo_id'				=>	'0',
				'clave'											=>	''
			);
		}
		else{
			return $info;
		}

	}





	/*GENERA LOS VALORES POR DEFECTO DE LOS FORMULARIOS DE REGISTRO O MUESTRA LO QUE YA ESTA GUARDADO*/
	public function getInfo(){
		$info=array(
			'curp'											=>	'QUTF801122HTCVRS02',
			'nombre'										=>	'FAUSTO EMMANUEL',
			'primer_apellido'						=>	'QUEVEDO',
			'segundo_apellido'					=>	'TORRES',
			'email'											=>	'fausto.quevedo@gmail.com',
			'estados'										=>	27,

			'calle'											=>	'AV. ZARAGOZA',
			'numero'										=>	'114',

			'curp_padre'								=>	'QUTF801122HTCVRS01',
			'nombre_padre'							=>	'FAUSTO',
			'primer_apellido_padre'			=>	'QUEVEDO',
			'segundo_apellido_padre'		=>	'RAMOS',
			'curp_madre'								=>	'QUTF801122HTCVRS03',
			'nombre_madre'							=>	'MARIA DEL CARMEN',
			'primer_apellido_madre'			=>	'TORRES',
			'segundo_apellido_madre'		=>	'RAMOS',
		);
		// $info=array(
		// 	'curp'											=>	'',
		// 	'nombre'										=>	'',
		// 	'primer_apellido'						=>	'',
		// 	'segundo_apellido'					=>	'',
		// 	'email'											=>	'',
		// 	'estados'										=>	27,

		// 	'calle'											=>	'',
		// 	'numero'										=>	'',

		// 	'curp_padre'								=>	'',
		// 	'nombre_padre'							=>	'',
		// 	'primer_apellido_padre'			=>	'',
		// 	'segundo_apellido_padre'		=>	'',
		// 	'curp_madre'								=>	'',
		// 	'nombre_madre'							=>	'',
		// 	'primer_apellido_madre'			=>	'',
		// 	'segundo_apellido_madre'		=>	'',
		// );
		return $info;
	}

	public function salir(){
		$session=array('bcurp','btnc','bconv','blogin');
		$this->session->unset_userdata($session);
		redirect('convocatorias/','refresh');
	}

}

/* End of file Solicitudes.php */
/* Location: ./application/controllers/Solicitudes.php */