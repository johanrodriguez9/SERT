<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_escudos extends Backend
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modelo_escudo');
		$this->load->model('Modelo_carrera');
		$this->load->model('Modelo_configuracion');
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
		if ( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin() )
		{ 
			redirect('auth/login', 'refresh');
		}else{
			$this->data['listar_carreras']=$this->Modelo_carrera->lista_carrera_area();	
			$tabla='upea_logos';
			$this->data['listar_escudos']=$this->Modelo_configuracion->select_tabla($tabla);
			$this->data['page_content'] = 'backend/institucion/escudos/index_escudos';
			$this->render();
		}
	}
	// adicionar escudo-----------------------------------------------
	public function adicionar(){
			$carrera_id=$this->input->post('id_carrera');
			$imagen_esc_bandera=$_FILES['esc_bandera']['tmp_name'];
			$imagen_escudo=$_FILES['escudo']['tmp_name'];
	// var_dump($imagen_esc_bandera);exit();
			if ($imagen_esc_bandera==null) {
				$imag=$imagen_esc_bandera;
			}else{
				//  if ($ins_logo) {
				// 	unlink("./assets/img_institucion/".$ins_logo);
				// }
				list($ancho,$alto)=getimagesize($_FILES['esc_bandera']['tmp_name']);
				$nuevo_ancho=800;
				$nuevo_alto=500;
				if ($_FILES['esc_bandera']['type']=="image/jpg" || $_FILES['esc_bandera']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_escudos/esc_banderas/esc_".$ima;
					$origen=imagecreatefromjpeg($_FILES['esc_bandera']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					$imag="esc_".$ima;
				}else{
					if ($_FILES['esc_bandera']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_escudos/esc_banderas/esc_".$ima;
						$origen=imagecreatefrompng($_FILES['esc_bandera']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back
						imagefill($destino, 0, 0, $color);
						imagesavealpha($destino, true);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagepng($destino,$ruta);
						$imag="esc_".$ima;
					}else{
							$imag='';
						}
					}
				}

			if ($imagen_escudo==null) {
				$imag_esc=$imagen_escudo;
			}else{
				//  if ($ins_logo) {
				// 	unlink("./assets/img_institucion/".$ins_logo);
				// }
				list($ancho,$alto)=getimagesize($_FILES['escudo']['tmp_name']);
				$nuevo_ancho=500;
				$nuevo_alto=500;
				if ($_FILES['escudo']['type']=="image/jpg" || $_FILES['escudo']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_escudos/escudos/esc_".$ima;
					$origen=imagecreatefromjpeg($_FILES['escudo']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					$imag_esc="esc_".$ima;
				}else{
					if ($_FILES['esc_bandera']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_escudos/escudos/esc_".$ima;
						$origen=imagecreatefrompng($_FILES['escudo']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back
						imagefill($destino, 0, 0, $color);
						imagesavealpha($destino, true);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagepng($destino,$ruta);
						$imag_esc="esc_".$ima;
					}else{
							$imag_esc='';
						}
					}
				}

				$obj=array(
				'logos_id'=>$carrera_id,
				'logos_imagen_esc_bandera'=>$imag,
				'logos_carrera'=>$imag_esc
				);
				$tabla="upea_logos";
				$this->Modelo_configuracion->insertar_tabla_sys($tabla,$obj);
			}
		public function editar_escudos($id){
			$this->data['logos_id']=$id;
			$this->data['listar_carreras']=$this->Modelo_carrera->lista_carrera_area();	
			$this->data['page_content'] = 'backend/institucion/escudos/editar_escudos';
			 $this->render();
		}
		public function guardar_editar(){
			$id=$this->input->post('id');
			$carrera_id=$this->input->post('id_carrera');
			$bandera_ant=$this->input->post('bandera_ant');
			$escudo_ant=$this->input->post('escudo_ant');
			$imagen_esc_bandera=$_FILES['esc_bandera']['tmp_name'];
			$imagen_escudo=$_FILES['escudo']['tmp_name'];
			if ($imagen_esc_bandera==null) {
				$imag=$bandera_ant;
			}else{
				 if ($bandera_ant) {
					unlink("./assets/img_escudos/esc_banderas/".$bandera_ant);
				}
				list($ancho,$alto)=getimagesize($_FILES['esc_bandera']['tmp_name']);
				$nuevo_ancho=800;
				$nuevo_alto=500;
				if ($_FILES['esc_bandera']['type']=="image/jpg" || $_FILES['esc_bandera']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_escudos/esc_banderas/esc_".$ima;
					$origen=imagecreatefromjpeg($_FILES['esc_bandera']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					$imag="esc_".$ima;
				}else{
					if ($_FILES['esc_bandera']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_escudos/esc_banderas/esc_".$ima;
						$origen=imagecreatefrompng($_FILES['esc_bandera']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back
						imagefill($destino, 0, 0, $color);
						imagesavealpha($destino, true);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagepng($destino,$ruta);
						$imag="esc_".$ima;
					}else{
							$imag='';
						}
					}
				}

			if ($imagen_escudo==null) {
				$imag_esc=$escudo_ant;
			}else{
				 if ($imagen_escudo) {
					unlink("./assets/img_escudos/escudos/".$escudo_ant);
				}
				list($ancho,$alto)=getimagesize($_FILES['escudo']['tmp_name']);
				$nuevo_ancho=500;
				$nuevo_alto=500;
				if ($_FILES['escudo']['type']=="image/jpg" || $_FILES['escudo']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_escudos/escudos/esc_".$ima;
					$origen=imagecreatefromjpeg($_FILES['escudo']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					$imag_esc="esc_".$ima;
				}else{
					if ($_FILES['escudo']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_escudos/escudos/esc_".$ima;
						$origen=imagecreatefrompng($_FILES['escudo']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back
						imagefill($destino, 0, 0, $color);
						imagesavealpha($destino, true);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagepng($destino,$ruta);
						$imag_esc="esc_".$ima;
					}else{
							$imag_esc='';
						}
					}
				}
				$obj=array(
				'logos_id'=>$carrera_id,
				'logos_imagen_esc_bandera'=>$imag,
				'logos_carrera'=>$imag_esc
				);
				$tabla="upea_logos";
				$idtabla="logos_id";
				$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$id);
			
		}
	
	}