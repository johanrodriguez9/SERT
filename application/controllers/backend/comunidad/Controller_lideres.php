<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Controller_lideres extends Backend

{

	public function __construct()

	{

		parent::__construct();

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

				

			$tabla='tech_lideres';

			$this->data['listar_lideres']=$this->Modelo_configuracion->select_tabla($tabla);

            



			$this->data['page_content'] = 'backend/Comunidad/lideres/index';

			$this->render();

		}

	}

		public function adicionar(){

			



			$nombre=mb_strtoupper($this->input->post('nombre'),'utf-8');

			// var_dump($nombre);

			$enlace=$this->input->post('enlace');

			$descripcion=$this->input->post('descripcion');

			$imagen=$_FILES['imagen']['tmp_name'];

			if ($imagen==null) {

				$imag=$imagen;

			}else{

				list($ancho,$alto)=getimagesize($_FILES['imagen']['tmp_name']);

				$nuevo_ancho=800;

				$nuevo_alto=500;

				if ($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg") {

					$ima=round(microtime(true)).'.jpg';

					$ruta="assets/img_lideres/lideres_".$ima;

					$origen=imagecreatefromjpeg($_FILES['imagen']['tmp_name']);

					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);

					imagejpeg($destino,$ruta);

					$imag="lideres_".$ima;

				}else{

					if ($_FILES['imagen']['type']=="image/png") {

						$ima=round(microtime(true)).'.png';

						$ruta="assets/img_lideres/lideres_".$ima;

						$origen=imagecreatefrompng($_FILES['imagen']['tmp_name']);

						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back

						imagefill($destino, 0, 0, $color);

						imagesavealpha($destino, true);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);

						imagepng($destino,$ruta);

						$imag="lideres_".$ima;

					}else{

							$imag='';

						}

					}

				}

				$obj=array(

				'lideres_nombre'=>$nombre,

				'lideres_facebook'=>$enlace,

				'lideres_estado'=>1,

				'lideres_foto'=>$imag,

				'lideres_descripcion'=>$descripcion,

				

				);

				$tabla="tech_lideres";

				$this->Modelo_configuracion->insertar_tabla_sys($tabla,$obj);

			}

		public function editar($id){

			$this->data['id']=$id;

			$this->data['page_content'] = 'backend/Comunidad/lideres/editar';

			 $this->render();

		}

		public function guardar_editar(){

			$id=$this->input->post('id');

			$nombre=mb_strtoupper($this->input->post('nombre'),'utf-8');

			$enlace=$this->input->post('enlace');

			$descripcion=$this->input->post('descripcion');

			$imagen_ant=$this->input->post('imagen_ant');





			 $imagen=$_FILES['image']['tmp_name'];

		

			if ($imagen==null) {

				$imag=$imagen_ant;

			}else{

				 if ($imagen_ant) {

					unlink("./assets/img_lideres/".$imagen_ant);

				}

				list($ancho,$alto)=getimagesize($_FILES['image']['tmp_name']);

				$nuevo_ancho=800;

				$nuevo_alto=500;

				if ($_FILES['image']['type']=="image/jpg" || $_FILES['image']['type']=="image/jpeg") {

					$ima=round(microtime(true)).'.jpg';

					$ruta="assets/img_lideres/lider_".$ima;

					$origen=imagecreatefromjpeg($_FILES['image']['tmp_name']);

					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);

					imagejpeg($destino,$ruta);

					$imag="lider_".$ima;

				}else{

					if ($_FILES['image']['type']=="image/png") {

						$ima=round(microtime(true)).'.png';

						$ruta="assets/img_lideres/lider_".$ima;

						$origen=imagecreatefrompng($_FILES['image']['tmp_name']);

						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back

						imagefill($destino, 0, 0, $color);

						imagesavealpha($destino, true);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);

						imagepng($destino,$ruta);

						$imag="lider_".$ima;

					}else{

							$imag='';

						}

					}

				}





	

				$obj=array(

				'lideres_id'=>$id,

				'lideres_nombre'=>$nombre,

				'lideres_facebook'=>$enlace,

				'lideres_foto'=>$imag,

				'lideres_descripcion'=>$descripcion

				);

				$tabla="tech_lideres";

				$idtabla="lideres_id";

				$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$id);

			}

		public function eliminar(){

				$id = $this->input->post('id');

				$imagen = $this->input->post('imagen');

				if ($imagen) {

					unlink("./assets/img_lideres/".$imagen);

					$tabla='tech_lideres';

					$idtabla='lideres_id';

					$this->Modelo_configuracion->eliminar_tabla_sys($tabla,$idtabla,$id);

				}

				

		}

		public function cambiar_estado(){

		$id=$this->input->post('id');

		$active=$this->input->post('estado');

		if ($active==1) {

			$estado='0';

		}else{

			$estado='1';

		}

		$obj=array(

			'lideres_estado'=>$estado

		);

		$tabla='tech_lideres';

		$idtabla='lideres_id';

		$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$id);

	}









}