<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_ofertas extends Backend
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modelo_ofertas');
		$this->load->model('Modelo_carrera');
		$this->load->model('Modelo_configuracion');
		$this->load->library('session');
		$this->load->library('Ion_auth');
		$this->load->model('Ion_auth_model');
		$this->lang->load('ion_auth');
	if (!$this->ion_auth->logged_in()) {
        
        	redirect('sali', 'refresh');
        }
		date_default_timezone_set('America/La_Paz');
	}
	public function index_ofertas(){
		if ( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin() )
		{ 
			redirect('auth/login', 'refresh');
		}else{	
			// $this->data['lista_carreras_vis']=$this->Modelo_carrera->lista_carrera_area();
			// $tabla='upea_ofertas_academicas';
			// $this->data['lista_ofertas']=$this->Modelo_configuracion->select_tabla($tabla);
			$this->data['page_content'] = 'backend/configuraciones/vista_publicaciones/ofertas_academicas/index_ofertas';
			$this->render();
		}
	}
	public function nuevo_ofertas(){
// var_dump($this->input->post('nuevo_eventos'));
		$this->data['page_content'] = 'backend/configuraciones/vista_publicaciones/ofertas_academicas/nuevo_ofertas';
		$this->render();
	}
		

	// CAMNBBIAR ESTADO
	public function cambiar_estado(){
		$id=$this->input->post('id');
		$estado=$this->input->post('active');
		$num=$this->input->post('num');
		
		if($estado == 1){
			$nuevo_estado=0;
		}else{
			$nuevo_estado=1;
		}
		// CAMBIAR ESTADO DE GACETA GRUPO
		if ($num==1) {
			$obj = array('ofertas_estado' =>$nuevo_estado);
			$tabla='upea_ofertas_academicas';
			$idtabla='ofertas_id';
		}
			else{ 
			// CAMBIAR ESTADO DE GACETA UNIVERSITARIA
			if ($num==2) {
			$obj = array('ofertas_estado' =>$nuevo_estado);
			$idtabla='ofertas_id';
			$tabla='upea_ofertas_academicas';
			
			}

		}
		
		$obj = array('ofertas_estado' =>$nuevo_estado);
			$idtabla='ofertas_id';
			$tabla='upea_ofertas_academicas';
		$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$id);
	}
	
		public function eliminar_ofertas(){
		  	$id=$this->input->post('id');
		  	$ofertas_imagen=$this->input->post('ofertas_imagen');
   			// $documento=$this->input->post('documento_nom');
   		
			unlink("./assets/img_ofertas/".$ofertas_imagen);
   			$tabla='upea_ofertas_academicas';
   			$idtabla='ofertas_id';
            $this->Modelo_configuracion->eliminar_tabla_sys($tabla,$idtabla,$id);

	}

		public function guardar_ofertas(){
			// var_dump('guardar_ofertas');
			$ofertas_titulo=mb_strtoupper($this->input->post('titulo'),'utf-8');
			// $ofertas_titulo=$this->input->post('titulo');
			$ofertas_p_inscripcion=$this->input->post('p_inscripcion');
			$ofertas_p_inscripcion_fin=$this->input->post('ofertas_p_inscripcion_fin');
			$ofertas_p_examen=$this->input->post('p_examen');
			$ofertas_p_publicacion=$this->input->post('p_publicacion');
			$ofertas_s_inscripcion=$this->input->post('s_inscripcion');
			$ofertas_s_examen=$this->input->post('s_examen');
			$ofertas_s_publicacion=$this->input->post('s_publicacion');
			$ofertas_descripcion=$this->input->post('descripcion');
			$ofertas_referencia=$this->input->post('referencia');
			$carrera_id=$this->input->post('carrera_id');
			$imagen=$_FILES['imagen']['tmp_name'];
			// var_dump($imagen);exit();
 // var_dump($imagen);
			if ($imagen==null) {
			$imag=$imagen;
			}else{
				list($ancho,$alto)=getimagesize($_FILES['imagen']['tmp_name']);
				$nuevo_ancho=2000;
				$nuevo_alto=2500;
				if ($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_ofertas/ofertas_".$ima;
					$origen=imagecreatefromjpeg($_FILES['imagen']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					$imag="ofertas_".$ima;
				}else{
					if ($_FILES['imagen']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_ofertas/ofertas_".$ima;
						$origen=imagecreatefrompng($_FILES['imagen']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagepng($destino,$ruta);
						$imag="ofertas_".$ima;
					}else{
						if ($_FILES['imagen']['type']=="image/gif") {
							$ima=round(microtime(true)).'.gif';
							$ruta="assets/img_ofertas/ofertas_".$ima;
							$origen=imagecreatefromgif($_FILES['imagen']['tmp_name']);
							$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
							imagegif($destino,$ruta);
							$imag="ofertas_".$ima;
						}else{
							$imag='';
						}
					}
				}
			}
			$obj=array(
			'ofertas_imagen'=>$imag,
			'ofertas_titulo'=>$ofertas_titulo,
			'ofertas_p_inscripciones'=>$ofertas_p_inscripcion,
			'ofertas_p_fecha_examen'=>$ofertas_p_examen,
			'ofertas_p_publicacion'=>$ofertas_p_publicacion,
			'ofertas_s_inscripciones'=>$ofertas_s_inscripcion,
			'ofertas_s_fecha'=>$ofertas_s_examen,
			'ofertas_s_publicaciones'=>$ofertas_s_publicacion,
			'ofertas_descripcion'=>$ofertas_descripcion,
			'ofertas_referencia'=>$ofertas_referencia,
			'carrera_id'=>$carrera_id,
			'ofertas_estado'=>'1'
			);
			$tabla='upea_ofertas_academicas';
			    	$ofertas_id=$this->Modelo_configuracion->insertar_tabla_sys($tabla,$obj);
		}
 	public function editar_ofertas($ofertas_id){
		  $this->data['ofertas_id']=$ofertas_id;
   
    $this->data['page_content'] = 'backend/configuraciones/vista_publicaciones/ofertas_academicas/editar_ofertas';
	$this->render();
    }

    public function editar_guardar_ofertas(){
    	$id=$this->input->post('ofertas_id');
    	$ofertas_imagen=$this->input->post('ofertas_imagen');

    	$ofertas_titulo=mb_strtoupper($this->input->post('titulo'),'utf-8');
		$ofertas_titulo=$this->input->post('titulo');
		$ofertas_p_inscripcion=$this->input->post('p_inscripcion');
		$ofertas_p_examen=$this->input->post('p_examen');
		$ofertas_p_publicacion=$this->input->post('p_publicacion');
		$ofertas_s_inscripcion=$this->input->post('s_inscripcion');
		$ofertas_s_examen=$this->input->post('s_examen');
		$ofertas_s_publicacion=$this->input->post('s_publicacion');
		$ofertas_descripcion=$this->input->post('descripcion');
		$ofertas_referencia=$this->input->post('referencia');
		$carrera_id=$this->input->post('carrera_id');

		$imagen=$_FILES['imagen']['tmp_name'];

		 if ($imagen==null) {
						$imag=$ofertas_imagen;
					}else{
						if ($imagen) {
							unlink("./assets/img_ofertas/".$ofertas_imagen);
						}
						list($ancho,$alto)=getimagesize($_FILES['imagen']['tmp_name']);
						$nuevo_ancho=2000;
						$nuevo_alto=1000;
						if ($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg") {
							$ima=round(microtime(true)).'.jpg';
							$ruta="assets/img_ofertas/ofertas_".$ima;
							$origen=imagecreatefromjpeg($_FILES['imagen']['tmp_name']);
							$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
							imagejpeg($destino,$ruta);
							$imag="ofertas_".$ima;
						}else{
							if ($_FILES['imagen']['type']=="image/png") {
								$ima=round(microtime(true)).'.png';
								$ruta="assets/img_ofertas/ofertas_".$ima;
								$origen=imagecreatefrompng($_FILES['imagen']['tmp_name']);
								$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
								imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
								imagepng($destino,$ruta);
								$imag="ofertas_".$ima;
							}else{
								if ($_FILES['imagen']['type']=="image/gif") {
									$ima=round(microtime(true)).'.gif';
									$ruta="assets/img_ofertas/ofertas_".$ima;
									$origen=imagecreatefromgif($_FILES['imagen']['tmp_name']);
									$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
									imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
									imagegif($destino,$ruta);
									$imag="ofertas_".$ima;
								}else{
									$imag='';
								}
							}
						}
					}


		$obj=array(
		'ofertas_imagen'=>$imag,
		'ofertas_titulo'=>$ofertas_titulo,
		'ofertas_p_inscripciones'=>$ofertas_p_inscripcion,
		'ofertas_p_fecha_examen'=>$ofertas_p_examen,
		'ofertas_p_publicacion'=>$ofertas_p_publicacion,
		'ofertas_s_inscripciones'=>$ofertas_s_inscripcion,
		'ofertas_s_fecha'=>$ofertas_s_examen,
		'ofertas_s_publicaciones'=>$ofertas_s_publicacion,
		'ofertas_descripcion'=>$ofertas_descripcion,
		'ofertas_referencia'=>$ofertas_referencia,
		'carrera_id'=>$carrera_id
		);
		$tabla='upea_ofertas_academicas';
		$idtabla='ofertas_id';
		    	$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$id);
    }

}