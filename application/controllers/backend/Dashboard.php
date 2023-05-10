<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Backend
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ion_auth_model');
		$this->load->model('Modelo_miembro');
		$this->lang->load('ion_auth');

		$dato=$this->ion_auth->user()->row();
        $this->id_usuario=$dato->id;
        // $this->id_carrera=$dato->carrera_id;

	}


	public function index()
	{
		if ( ! $this->ion_auth->logged_in() )//OR ! $this->ion_auth->is_admin()
		{
			redirect(site_url(Hasher::make(1))); //redirect('auth/login/backend', 'refresh');
		}
		//elseif ( ! $this->ion_auth->is_admin())
		//{
			//return show_error('You must be an administrator to view this page.');
		//}
		else
		{ 
			$count_user  = $this->db->count_all($this->config->item('tables', 'ion_auth')['users']);
			$count_group = $this->db->count_all($this->config->item('tables', 'ion_auth')['groups']);

			if ($count_user >= 1)
			{
				$this->data['lang_user_plural'] = plural($this->lang->line('user'));
			}
			else
			{
				$this->data['lang_user_plural'] = $this->lang->line('user');
			}

			if ($count_group >= 1)
			{
				$this->data['lang_group_plural'] = plural($this->lang->line('group'));
			}
			else
			{
				$this->data['lang_group_plural'] = $this->lang->line('group');
			}

			$this->data['nbr_user']     = $count_user;
			$this->data['nbr_group']    = $count_group;
			$this->data['subtitle']     = $this->lang->line('dashboard');
			$this->data['carrera']     	= "ing de sistemas";
			// $this->data['carrera']     	= $this->Ion_auth_model->carrera($this->id_carrera); 
			$this->data['page_content'] = 'backend/dashboard';

			$this->render();
		}
	}

	public function perfil()
	{
		$this->data['page_content'] = 'backend/perfil';
		$this->render();
	}
	public function guardar_imagen_usuario(){
		$imagen_a=$this->input->post('imagen_a');
		$user_id=$this->input->post('user_id');
		$imagen=$_FILES['imagen']['tmp_name'];
		if ($imagen==null) {
			$imag='';
		}else{
			list($ancho,$alto)=getimagesize($_FILES['imagen']['tmp_name']);
			$nuevo_ancho=200;
			$nuevo_alto=200;
			// $direccion="assets/img_usuario/user_";
			if ($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg") {
				$ima=round(microtime(true)).'.jpg';
				$ruta="assets/file_usuario/user_".$ima;
				$origen=imagecreatefromjpeg($_FILES['imagen']['tmp_name']);
				$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
				imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
				imagejpeg($destino,$ruta);
				$imag="user_".$ima;
			}else{
				if ($_FILES['imagen']['type']=="image/png") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/file_usuario/user_".$ima;
					$origen=imagecreatefrompng($_FILES['imagen']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagepng($destino,$ruta);
					$imag="user_".$ima;
				}else{
					if ($_FILES['imagen']['type']=="image/gif") {
						$ima=round(microtime(true)).'.jpg';
						$ruta="assets/file_usuario/user_".$ima;
						$origen=imagecreatefromgif($_FILES['imagen']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
						imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagegif($destino,$ruta);
						$imag="user_".$ima;
					}else{
						$imag='';
					}
				}
			}
			if ($imagen_a) {
				unlink("./assets/file_usuario/".$imagen_a);
			}
			$this->db->WHERE('id',$user_id);
			$this->db->update('dp_auth_users',array('imagen'=>$imag));
		}
	}

	public function guardar_nuevo_datos(){
		$nombres=$this->input->post('nombres');
		$apellidos=$this->input->post('apellidos');
		$correo=$this->input->post('correo');
		$user_id=$this->input->post('user_id');
			$this->db->WHERE('id',$user_id);
			$this->db->update('dp_auth_users',array('first_name'=>$nombres,'last_name'=>$apellidos,'email'=>$correo));
		}

	public function validar_usuario(){
		$usu=$this->input->post('usu');
		$obj=$this->db->query("SELECT id FROM dp_auth_users WHERE username='$usu' ")->row();
		if ($obj) {
			echo json_encode(array(0 => 1));
		}else{
			echo json_encode(array(0 => 0));
		}
	}
	public function guardar_nuevo_usuario_pass(){
		$id=$this->input->post('id');
		$name=$this->input->post('name');
		$password=$this->input->post('password');
		$this->Ion_auth_model->guardar_nuevo_usuario_pass($id,$name,$password); 
	}












}
