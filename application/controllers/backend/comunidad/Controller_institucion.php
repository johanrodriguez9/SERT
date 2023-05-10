<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_institucion extends Backend
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modelo_comunidad');
		$this->load->model('Modelo_configuracion');

		$this->load->library('session');
		$this->load->library('Ion_auth');
		$this->load->model('Ion_auth_model');
		$this->lang->load('ion_auth');

		$this->form_validation->set_error_delimiters($this->config->item('error_prefix'), $this->config->item('error_suffix'));
		if (!$this->ion_auth->logged_in()) {
	        // verifica login usuario
	         redirect('sali', 'refresh');
	        redirect(site_url(Hasher::make(3)));
	    }
		date_default_timezone_set('America/La_Paz');

	}


	public function index()
	{
		redirect(site_url(Hasher::make(6)));
	}
	public function admin_institucion(){
			if ( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin()){
				redirect('auth/login', 'refresh');
			}else	{
				$this->data['page_content'] = 'backend/Comunidad/admin_institucion';
				$this->render();
			}	
	}
		public function guardar_comunidad(){

			$comunidad_id=$this->input->post('comunidad_id');
			var_dump($comunidad_id);	
			$ins_logo=$this->input->post('comunidad_logo');
			$nombre=mb_strtoupper($this->input->post('nombre'),'utf-8');
			
			$descripcion=$this->input->post('descripcion');
			
			// var_dump($descripcion);
			$mision=$this->input->post('mision','utf-8');
			$vision=$this->input->post('vision','utf-8');
			
			$objetivo=$this->input->post('objetivo','utf-8');
			$telefono1=$this->input->post('telefono1');
			$telefono2=$this->input->post('telefono2');
			$correo=$this->input->post('correo');
			$facebook=$this->input->post('facebook');
			$youtube=$this->input->post('youtube');
			$twiter=$this->input->post('twiter');
			$direccion=mb_strtoupper($this->input->post('direccion'),'utf-8');
			$api_map=$this->input->post('api_map');
			$imagen=$_FILES['imagen']['tmp_name'];
			// ALMACENAR IMAGEN LOGO
			if ($imagen==null) {
				$imag=$ins_logo;
			}else{
				if ($ins_logo) {
					unlink("./assets/img_comunidad/".$ins_logo);
				}

				$con=$con+1;
				$ima=0;$ruta=0;
				$origen=0;$destino=0;

				list($originalWidth,$originalHeight)=getimagesize($_FILES['imagen']['tmp_name']);
				$nuevo_ancho=800;
				$nuevo_alto=500;
				if ($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_comunidad/comunidad_logo_".$ima;
					$origen=imagecreatefromjpeg($_FILES['imagen']['tmp_name']);						
					$size=1280;
					$ratio = $originalWidth / $originalHeight;
					$targetWidth = $targetHeight = min($size, max($originalWidth, $originalHeight));
					if ($ratio < 1) {
						$targetWidth = $targetHeight * $ratio;
					} else {
						$targetHeight = $targetWidth / $ratio;
					}
					$srcWidth = $originalWidth;
					$srcHeight = $originalHeight;
					$srcX = $srcY = 0;
					$targetImage = imagecreatetruecolor($targetWidth, $targetHeight);
					imagecopyresampled($targetImage, $origen, 0, 0, $srcX, $srcY, $targetWidth, $targetHeight, $srcWidth, $srcHeight);
					imagejpeg($targetImage,$ruta);
					$imag="comunidad_logo_".$ima;
				}else{
					if ($_FILES['imagen']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_comunidad/comunidad_logo_".$ima;
						$origen=imagecreatefrompng($_FILES['imagen']['tmp_name']);
						$size=1280;
						$ratio = $originalWidth / $originalHeight;
						$targetWidth = $targetHeight = min($size, max($originalWidth, $originalHeight));
						if ($ratio < 1) {
							$targetWidth = $targetHeight * $ratio;
						} else {
							$targetHeight = $targetWidth / $ratio;
						}
						$srcWidth = $originalWidth;
						$srcHeight = $originalHeight;
						$srcX = $srcY = 0;
						$targetImage = imagecreatetruecolor($targetWidth, $targetHeight);
						$color = imagecolorallocatealpha($targetImage, 0, 0, 0, 127); //fill transparent back
						imagefill($targetImage, 0, 0, $color);
						imagesavealpha($targetImage, true);
						imagecopyresized($targetImage, $origen, 0, 0, 0, 0, $targetWidth, $targetHeight, $originalWidth, $originalHeight);
						imagepng($targetImage,$ruta);
						$imag="comunidad_logo_".$ima;
					}else{
						if ($_FILES['imagen']['type']=="image/gif") {
							$ima=round(microtime(true)).'.gif';
							$ruta="assets/img_comunidad/comunidad_logo_".$ima;
							$origen=imagecreatefromgif($_FILES['imagen']['tmp_name']);
							$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
							imagegif($destino,$ruta);
							$imag="comunidad_logo_".$ima;
						}else{
							$imag='';
						}
					}
				}
			}
		
				$obj=array(

				// var_dump($obj);	
				'comunidad_nombre'=>$nombre,
		
				'comunidad_logo'=>$imag,
				'comunidad_descripcion'=>$descripcion,
				'comunidad_mision'=>$mision,
				'comunidad_vision'=>$vision,
				'comunidad_objetivo'=>$objetivo,
				'comunidad_telefono1'=>$telefono1,
				'comunidad_telefono2'=>$telefono2,
				'comunidad_correo'=>$correo,
				'comunidad_facebook'=>$facebook,
				'comunidad_youtube'=>$youtube,
				'comunidad_twiter'=>$twiter,
				'comunidad_direccion'=>$direccion,
				'comunidad_api_google_map'=>$api_map,
				'dp_auth_users_id'=>'1'
				);
				// $idtabla="comunidad_id";
				// $tabla="tech_comunidad";
				// $this->Modelo_configuracion->insertar_tabla_sys($tabla,$obj);
					$idtabla="comunidad_id";
				$tabla="tech_comunidad";
				$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$comunidad_id);
		}
}