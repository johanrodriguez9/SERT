<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_tu_universidad extends Backend
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Modelo_escudo');
		// $this->load->model('Modelo_carrera');
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
			// $this->data['listar_carreras']=$this->Modelo_carrera->lista_carrera_area();	
			$tabla='upea_tu_universidad';
			$this->data['listar_tu_universidad']=$this->Modelo_configuracion->select_tabla($tabla);
			$this->data['page_content'] = 'backend/institucion/tu_universidad/index_tu_universidad';
			$this->render();
		}
	}
	// adicionar escudo-----------------------------------------------
	public function adicionar(){
			$razon=$this->input->post('razon');
			$imagen=$_FILES['imagen']['tmp_name'];
			if ($imagen==null) {
				$imag=$imagen;
			}else{
				list($ancho,$alto)=getimagesize($_FILES['imagen']['tmp_name']);
				$nuevo_ancho=800;
				$nuevo_alto=500;
				if ($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_tu_univesidad/razon_".$ima;
					$origen=imagecreatefromjpeg($_FILES['imagen']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					$imag="razon_".$ima;
				}else{
					if ($_FILES['imagen']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_tu_univesidad/razon_".$ima;
						$origen=imagecreatefrompng($_FILES['imagen']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back
						imagefill($destino, 0, 0, $color);
						imagesavealpha($destino, true);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagepng($destino,$ruta);
						$imag="razon_".$ima;
					}else{
							$imag='';
						}
					}
				}

		
				$obj=array(
				'tu_razon'=>$razon,
				'tu_imagen'=>$imag
				);
				$tabla="upea_tu_universidad";
				$this->Modelo_configuracion->insertar_tabla_sys($tabla,$obj);
			}
		public function editar($id){
			$this->data['tu_id']=$id;
			$this->data['page_content'] = 'backend/institucion/tu_universidad/editar_tu_universidad';
			 $this->render();
		}
		public function guardar_editar(){
			$id=$this->input->post('id');
			$razon=$this->input->post('razon');
			$imagen_ant=$this->input->post('imagen_ant');
			$imagen=$_FILES['imagen']['tmp_name'];
			if ($imagen==null) {
				$imag=$imagen_ant;
			}else{
				 if ($imagen_ant) {
					unlink("./assets/img_tu_univesidad/".$imagen_ant);
				}
				list($ancho,$alto)=getimagesize($_FILES['imagen']['tmp_name']);
				$nuevo_ancho=800;
				$nuevo_alto=500;
				if ($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_tu_univesidad/razon_".$ima;
					$origen=imagecreatefromjpeg($_FILES['imagen']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					$imag="razon_".$ima;
				}else{
					if ($_FILES['imagen']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_escudos/imagens/razon_".$ima;
						$origen=imagecreatefrompng($_FILES['imagen']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back
						imagefill($destino, 0, 0, $color);
						imagesavealpha($destino, true);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagepng($destino,$ruta);
						$imag="razon_".$ima;
					}else{
							$imag='';
						}
					}
				}

	
				$obj=array(
				'tu_id'=>$id,
				'tu_razon'=>$razon,
				'tu_imagen'=>$imag
				);
				$tabla="upea_tu_universidad";
				$idtabla="tu_id";
				$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$id);
			
		}
		public function eliminar(){
				$id = $this->input->post('id');
				$imagen = $this->input->post('imagen');
				if ($imagen) {
					unlink("./assets/img_tu_univesidad/".$imagen);
					$tabla='upea_tu_universidad';
					$idtabla='tu_id';
					$this->Modelo_configuracion->eliminar_tabla_sys($tabla,$idtabla,$id);
				}
				
		}
	
	}