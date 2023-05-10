<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_calendario extends Backend{

	public function __construct(){
		parent::__construct();
		$this->load->model('Modelo_calendario');
		$this->load->model('Modelo_curso');

		//$this->load->model('Modelo_escudo');
		//$this->load->model('Modelo_carrera');
		//$this->load->model('Modelo_configuracion');
		$this->load->library('session');
		$this->load->library('Ion_auth');
		$this->load->model('Ion_auth_model');
		$this->lang->load('ion_auth');
		$this->form_validation->set_error_delimiters($this->config->item('error_prefix'), $this->config->item('error_suffix'));
		if (!$this->ion_auth->logged_in()) {
	        redirect(site_url(Hasher::make(3)));
	    }
		date_default_timezone_set('America/La_Paz');
	}

	public function index(){
		if ( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin()){ 
			redirect('auth/login', 'refresh');
		}else{
			
			$tabla='tech_calendario';
			$query='1 ORDER BY id ASC';
			$this->data['listar_calendario']=$this->Modelo_calendario->consult($tabla);

			$this->data['page_content'] = 'backend/Calendario/index_calendario';
			$this->render();
		}
			
	}

    public function guardarevento(){
                    
		$evento            = ucwords($this->input->post('evento'));

		$f_inicio          = $this->input->post('fecha_inicio');
		$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 

		$f_fin             = $this->input->post('fecha_fin'); 
		$seteando_f_final  = date('Y-m-d', strtotime($f_fin));

		$fecha_fin1        = strtotime($seteando_f_final."+ 1 days");
		$fecha_fin         = date('Y-m-d', ($fecha_fin1));  

		$color_evento      = $this->input->post('color_evento');

        $obj=array(
            'evento'=>$evento,
            'color_evento'=>$color_evento,
            'fecha_inicio'=>$fecha_inicio,
            'fecha_fin'=>$fecha_fin,
        );

        $tabla="tech_calendario";
        $this->Modelo_calendario->insertar_tabla_contenido($tabla,$obj);
		
        redirect(site_url(Hasher::make(245)));

    }

    public function modificarevento(){
             
		$idEvento = $this->input->post('idEvento');
		$evento = ucwords($this->input->post('evento'));

		$f_inicio = $this->input->post('fecha_inicio');
		$fecha_inicio = date('Y-m-d', strtotime($f_inicio)); 

		$f_fin = $this->input->post('fecha_fin'); 
		$seteando_f_final = date('Y-m-d', strtotime($f_fin));

		$fecha_fin1 = strtotime($seteando_f_final."+ 1 days");
		$fecha_fin = date('Y-m-d', ($fecha_fin1));  

		$color_evento = $this->input->post('color_evento');

        $obj=array(
            'evento'=>$evento,
            'color_evento'=>$color_evento,
            'fecha_inicio'=>$fecha_inicio,
            'fecha_fin'=>$fecha_fin,
        );

        $tabla="tech_calendario";
        $this->Modelo_calendario->editar_tabla_sys($tabla,$obj,'id',$idEvento);
		
        redirect(site_url(Hasher::make(245)));

    }

	public function drag_drop_evento(){
             		                        
		$idEvento = $this->input->post('idEvento');
		$start = $this->input->post('start');
		$fecha_inicio = date('Y-m-d', strtotime($start)); 
		$end = $this->input->post('end'); 
		$fecha_fin = date('Y-m-d', strtotime($end));  

        $obj=array(
            'fecha_inicio'=>$fecha_inicio,
            'fecha_fin'=>$fecha_fin,
        );

        $tabla="tech_calendario";
        $r1 = $this->Modelo_calendario->editar_tabla_sys($tabla,$obj,'id',$idEvento);
        echo $r1;
		
        // redirect(site_url(Hasher::make(245)));

    }

	public function deleteEvento(){
		$id = $this->input->post('id');
		$r = $this->Modelo_calendario->deleteEvento($id);
		echo $r;

	}



}