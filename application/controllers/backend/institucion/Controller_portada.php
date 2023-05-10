<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controller_portada extends Backend{

	public function __construct(){
		parent::__construct();
		$this->load->model('Modelo_portada');
		$this->load->model('Modelo_configuracion');
		$this->load->library('session');
		$this->load->library('Ion_auth');
		$this->load->model('Ion_auth_model');
		$this->lang->load('ion_auth');
		$this->form_validation->set_error_delimiters($this->config->item('error_prefix'), $this->config->item('error_suffix'));
		if (!$this->ion_auth->logged_in()) {
	        //verifica login usuario
	        // redirect('sali', 'refresh');
	        redirect(site_url(Hasher::make(3)));
	    }
		date_default_timezone_set('America/La_Paz');
	}
	public function index(){
		if ( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin() )
		{ 
			redirect('auth/login', 'refresh');
		}else{	
			$tabla='tech_portada';
			$this->data['listar_portada']=$this->Modelo_configuracion->select_tabla($tabla);
			$this->data['page_content'] = 'backend/institucion/portada/index';
			$this->render();
		}
	}

		// adicionar departamento-----------------------------------------------

	public function guardar_portada(){
			// print_r('llego a la funcion');
			$id=0;
			// $titulo=$this->input->post('titulo');
			foreach($_POST['titulo'] as $key => $titulo){
				$id=$id+1;
				if (!empty($_POST['titulo'])){
					$obj=array(
						'portada_titulo'=>$titulo
					);
					$tabla='upea_portada';
					$idtabla='portada_id';
					$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$id);
				}
			}
			$id=0;
			foreach($_POST['subtituloo'] as $key => $subtituloo){
				$id=$id+1;
				if (!empty($_POST['subtituloo'])){
					echo $subtituloo;
					$obj3=array(
						'portada_subtitulo'=>$subtituloo
					);
					$tabla='upea_portada';
					$idtabla='portada_id';
					$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj3,$idtabla,$id);
				}
			}
			$id=0;
			foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name){
				$id=$id+1;
				$ima=0;$ruta=0;
				$origen=0;$destino=0;
 			if(!empty($_FILES["file"]['tmp_name'][$key])){ 
				$anterior_img=$this->Modelo_configuracion->tabla_row('upea_portada','portada_id',$id);
				unlink("./assets/img_portada/".$anterior_img->portada_imagen);
		
				list($ancho,$alto)=getimagesize($_FILES['imagen']['tmp_name'][$key]);
				
				$nuevo_ancho=1920;
            	$nuevo_alto=1080;
				if ($_FILES["file"]['type'][$key]=="image/jpg" || $_FILES["file"]['type'][$key]=="image/jpeg") {					
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_portada/port_".$id.''.$ima;
					$origen=imagecreatefromjpeg($_FILES['image']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
		
					$obj=array(
						'portada_imagen'=>"port_".$id.$ima
					);
					$tabla='upea_portada';
					$idtabla='portada_id';
					$this->Modelo_configuracion-> editar_tabla_sys($tabla,$obj,$idtabla,$id);
				}else{
					if ($_FILES["file"]['type'][$key]=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_portada/port_".$id.''.$ima;
						$origen=imagecreatefromjpeg($_FILES['imagen']['tmp_name'][$key]);
						$size=1920;
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
	
						$obj=array(
							'portada_imagen'=>"port_".$id.$ima
						);
						$tabla='upea_portada';
						$idtabla='portada_id';
						$this->Modelo_configuracion-> editar_tabla_sys($tabla,$obj,$idtabla,$id);
					}else{
						if ($_FILES["file"]['type'][$key]=="image/gif") {
							$ima=round(microtime(true)).'.gif';
							$ruta="assets/img_portada/port_".$id.''.$ima;
							$origen=imagecreatefromjpeg($_FILES['imagen']['tmp_name'][$key]);
							$size=1920;
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
		
							$obj=array(
								'portada_imagen'=>"port_".$id.$ima
							);
							$tabla='upea_portada';
							$idtabla='portada_id';
							$this->Modelo_configuracion-> editar_tabla_sys($tabla,$obj,$idtabla,$id);
						}
					}
				}
			}
		}
	}

}