<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_institucion extends Backend
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modelo_institucion');
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


	public function index()
	{
		redirect(site_url(Hasher::make(6)));
	}
	public function admin_institucion(){
			if ( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin()){
				redirect('auth/login', 'refresh');
			}else	{
				$this->data['page_content'] = 'backend/institucion/vista_institucion/admin_institucion';
				$this->render();
			}	
	}
	public function guardar_institucion(){
			$institucion_id=$this->input->post('institucion_id');
			$ins_logo=$this->input->post('institucion_logo');
			$ins_foto_rector=$this->input->post('institucion_foto_rector');
			$ins_foto_vicerector=$this->input->post('institucion_foto_vicerector');
			$ins_organigrama=$this->input->post('institucion_organigrama');
			$nombre=mb_strtoupper($this->input->post('nombre'),'utf-8');
			$historia=$this->input->post('historia');
			$sobre=$this->input->post('sobre');
			var_dump($sobre);

			$mision=$this->input->post('mision','utf-8');
			$vision=$this->input->post('vision','utf-8');
			$video_vision=$this->input->post('video_vision');
			$objetivo=$this->input->post('objetivo','utf-8');
			$email1=$this->input->post('correo1');
			$email2=$this->input->post('correo2');
			$celular1=$this->input->post('celular1');
			$celular2=$this->input->post('celular2');
			$facebook=$this->input->post('facebook');
			$youtube=$this->input->post('youtube');
			$twitter=$this->input->post('twitter');
			$ubicacion=mb_strtoupper($this->input->post('ubicacion'),'utf-8');
			$api_map=$this->input->post('api_map');
			$datos_dir=mb_strtoupper($this->input->post('rector'),'utf-8');
			$datos_vice=mb_strtoupper($this->input->post('vicerector'),'utf-8');
		
			
			$imagen=$_FILES['imagen']['tmp_name'];
			$imagen_rector=$_FILES['imagen_rector']['tmp_name'];
			$imagen_vice=$_FILES['imagen_vicerector']['tmp_name'];
			$imagen_organigrama=$_FILES['imagen_organigrama']['tmp_name'];

			// ALMACENAR IMAGEN LOGO
			if ($imagen==null) {
				$imag=$ins_logo;
			}else{
				 if ($ins_logo) {
					unlink("./assets/img_institucion/".$ins_logo);
				}
				list($ancho,$alto)=getimagesize($_FILES['imagen']['tmp_name']);
				$nuevo_ancho=300;
				$nuevo_alto=300;
				if ($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_institucion/ins_logo_".$ima;
					$origen=imagecreatefromjpeg($_FILES['imagen']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					$imag="ins_logo_".$ima;
				}else{
					if ($_FILES['imagen']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_institucion/ins_logo_".$ima;
						$origen=imagecreatefrompng($_FILES['imagen']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back
						imagefill($destino, 0, 0, $color);
						imagesavealpha($destino, true);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagepng($destino,$ruta);
						$imag="ins_logo_".$ima;
					}else{
						if ($_FILES['imagen']['type']=="image/gif") {
							$ima=round(microtime(true)).'.gif';
							$ruta="assets/img_institucion/ins_logo_".$ima;
							$origen=imagecreatefromgif($_FILES['imagen']['tmp_name']);
							$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
							imagegif($destino,$ruta);
							$imag="ins_logo_".$ima;
						}else{
							$imag='';
						}
					}
				}
			}
			// ALMACENAR IMAGEN RECTOR
			if ($imagen_rector==null) {
				$imag_rector=$ins_foto_rector;
			}else{
				if ($ins_foto_rector) {
					unlink("./assets/img_institucion/".$ins_foto_rector);
				}
				list($ancho,$alto)=getimagesize($_FILES['imagen_rector']['tmp_name']);
				$nuevo_ancho=400;
				$nuevo_alto=600;
				if ($_FILES['imagen_rector']['type']=="image/jpg" || $_FILES['imagen_rector']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_institucion/ins_rector".$ima;
					$origen=imagecreatefromjpeg($_FILES['imagen_rector']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					$imag_rector="ins_rector".$ima;
				}else{
					if ($_FILES['imagen_rector']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_institucion/ins_rector".$ima;
						$origen=imagecreatefrompng($_FILES['imagen_rector']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back
						imagefill($destino, 0, 0, $color);
						imagesavealpha($destino, true);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagepng($destino,$ruta);
						$imag_rector="ins_rector".$ima;
					}else{
						if ($_FILES['imagen_rector']['type']=="image/gif") {
							$ima=round(microtime(true)).'.gif';
							$ruta="assets/img_institucion/ins_rector".$ima;
							$origen=imagecreatefromgif($_FILES['imagen_rector']['tmp_name']);
							$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
							imagegif($destino,$ruta);
							$imag_rector="ins_rector".$ima;
						}else{
							$imag_rector=$ins_foto_rector;
						}
					}
				}
			}
			// ALMACENAR IMAGEN VICERECTOR
			if ($imagen_vice==null) {
				$imag_vice=$ins_foto_vicerector;
			}else{
				if ($ins_foto_vicerector) {
					unlink("./assets/img_institucion/".$ins_foto_vicerector);
				}
				list($ancho,$alto)=getimagesize($_FILES['imagen_vicerector']['tmp_name']);
				$nuevo_ancho=400;
				$nuevo_alto=600;
				if ($_FILES['imagen_vicerector']['type']=="image/jpg" || $_FILES['imagen_vicerector']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_institucion/ins_vice".$ima;
					$origen=imagecreatefromjpeg($_FILES['imagen_vicerector']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					$imag_vice="ins_vice".$ima;
				}else{
					if ($_FILES['imagen_vicerector']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_institucion/ins_vice".$ima;
						$origen=imagecreatefrompng($_FILES['imagen_vicerector']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back
						imagefill($destino, 0, 0, $color);
						imagesavealpha($destino, true);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagepng($destino,$ruta);
						$imag_vice="ins_vice".$ima;
					}else{
						if ($_FILES['imagen_vicerector']['type']=="image/gif") {
							$ima=round(microtime(true)).'.gif';
							$ruta="assets/img_institucion/ins_vice".$ima;
							$origen=imagecreatefromgif($_FILES['imagen_vicerector']['tmp_name']);
							$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
							imagegif($destino,$ruta);
							$imag_vice="ins_vice".$ima;
						}else{
							$imag_vice=$ins_foto_vicerector;
						}
					}
				}
			}
			// ALMACENAR IMAGEN ORGANIGRAMA
			if ($imagen_organigrama==null) {
				$imag_org=$ins_organigrama;
			}else{
				if ($ins_organigrama) {
					unlink("./assets/img_institucion/".$ins_organigrama);
				}
				list($ancho,$alto)=getimagesize($_FILES['imagen_organigrama']['tmp_name']);
				$nuevo_ancho=2500;
				$nuevo_alto=1800;
				if ($_FILES['imagen_organigrama']['type']=="image/jpg" || $_FILES['imagen_organigrama']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_institucion/ins_org_".$ima;
					$origen=imagecreatefromjpeg($_FILES['imagen_organigrama']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					$imag_org="ins_org_".$ima;
				}else{
					if ($_FILES['imagen_organigrama']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_institucion/ins_org_".$ima;
						$origen=imagecreatefrompng($_FILES['imagen_organigrama']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back
						imagefill($destino, 0, 0, $color);
						imagesavealpha($destino, true);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagepng($destino,$ruta);
						$imag_org="ins_org_".$ima;
					}else{
						if ($_FILES['imagen_organigrama']['type']=="image/gif") {
							$ima=round(microtime(true)).'.gif';
							$ruta="assets/img_institucion/ins_org_".$ima;
							$origen=imagecreatefromgif($_FILES['imagen_organigrama']['tmp_name']);
							$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
							imagegif($destino,$ruta);
							$imag_org="ins_org_".$ima;
						}else{
							$imag_org=$ins_organigrama;
						}
					}
				}
			}

				$obj=array(
				'institucion_nombre'=>$nombre,
				'institucion_logo'=>$imag,
				'institucion_mision'=>$mision,
				'institucion_sobre_ins'=>$sobre,
				'institucion_vision'=>$vision,
				'institucion_link_video_vision'=>$video_vision,
				'institucion_historia'=>$historia,
				'institucion_objetivo_general'=>$objetivo,
				'institucion_foto_rector'=>$imag_rector,
				'institucion_nom_rector'=>$datos_dir,
				'institucion_foto_vicerector'=>$imag_vice,
				'institucion_nom_vicerector'=>$datos_vice,
				'institucion_correo1'=>$email1,
				'institucion_correo2'=>$email2,
				'institucion_telefono1'=>$celular1,
				'institucion_telefono2'=>$celular2,
				'institucion_api_google_map'=>$api_map,
				'institucion_facebook'=>$facebook,
				'institucion_youtube'=>$youtube,
				'institucion_twitter'=>$twitter,
				'institucion_direccion'=>$ubicacion,
				'institucion_organigrama'=>$imag_org,
				 'dp_auth_users_id'=>'1'
				);
				$idtabla="institucion_id";
				$tabla="upea_institucion";
				$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$institucion_id);
		}
}