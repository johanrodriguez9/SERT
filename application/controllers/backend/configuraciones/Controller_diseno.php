<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Controller_diseno extends Backend{
	public function __construct(){

		parent::__construct();
		$this->load->model('Modelo_configuracion');
		$this->load->model('Modelo_tienda');
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
		if ( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin() ){ 
			redirect('auth/login', 'refresh');
		}else{	
			$tabla='tienda_portada';
			$this->data['listar_portada']=$this->Modelo_configuracion->select_tabla($tabla);

			$this->data['page_content'] = 'backend/configuraciones/vista_diseno/diseno_index';
			$this->render();
		}

		
	}

	public function tienda_editar($id_producto){
		
		if ( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin() ){ 
			redirect('auth/login', 'refresh');
		}else{	
			$this->data['id_producto']=$id_producto;
			$this->data['page_content'] = 'backend/configuraciones/vista_tienda/tienda_editar';
		
			$tabla1='tienda_categoria';
			$this->data['categorias']=$this->Modelo_configuracion->select_tabla($tabla1);
		
			$this->render();
		}
		} 

	public function adicionar(){
			$titulo=mb_strtoupper($this->input->post('titulo'),'utf-8');
			
			$id_user=$this->session->userdata('user_id');

			$descripcion=$this->input->post('descripcion');
			$costo=$this->input->post('costo');
			$costo_oferta=$this->input->post('costo_oferta');
			$numero=$this->input->post('numero');
			$categoria=$this->input->post('categoria');
			$fechar=$this->input->post('fecharegistro');
			$fecham=$this->input->post('fechamodificado');

			$imagen=$_FILES['imagen']['tmp_name'];

    		if ($imagen==null) {
				$imag=$cursos_imagen;
			}else{
				if ($imagen) {
					unlink("./assets/img_producto/".$cursos_imagen);
				}
				list($originalWidth,$originalHeight)=getimagesize($_FILES['imagen']['tmp_name']);
				$nuevo_ancho=800;
				$nuevo_alto=500;
				if ($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_producto/user_".$ima;
					$origen=imagecreatefromjpeg($_FILES['imagen']['tmp_name']);
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
					$imag="user_".$ima;
				}else{
					if ($_FILES['imagen']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_producto/user_".$ima;
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
							$imag="user_".$ima;
					}else{
						if ($_FILES['imagen']['type']=="image/gif") {
							$ima=round(microtime(true)).'.gif';
							$ruta="assets/img_producto/user_".$ima;
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
							$imag="user_".$ima;
						}else{
							$imag='';
						}
					}
				}
			}

			$obj=array(
			'producto_titulo'=>$titulo,
			'producto_descripcion'=>$descripcion,
			'producto_referencia'=>$numero,
			'producto_costo'=>$costo,
			'producto_estado'=>'A',
			'producto_fin_fecha_registro'=>$fechar,
			'producto_fin_fecha_modificacion'=>$fecham,
			'producto_imagen'=>$imag,
			'categoria_id'=>$categoria,
			'id_user'=>$id_user,
			);

			$tabla="tienda_producto";
			$id_producto = $this->Modelo_configuracion->insertar_tabla_sys($tabla,$obj);


			if(!empty($_FILES["file"]['tmp_name'])){ 
				$con=0;
				foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name){
					$con=$con+1;
					$ima=0;$ruta=0;
					$origen=0;$destino=0;

					list($originalWidth,$originalHeight)=getimagesize($_FILES["file"]['tmp_name'][$key]);
					$nuevo_ancho=800;
					$nuevo_alto=500;
					if ($_FILES["file"]['type'][$key]=="image/jpg" || $_FILES["file"]['type'][$key]=="image/jpeg") {
						$ima=round(microtime(true)).'.jpg';
						$ruta="assets/img_producto/mini_".$con.''.$ima;
						$origen=imagecreatefromjpeg($_FILES["file"]['tmp_name'][$key]);
						
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
							
						$obj1=array(
							'galeria_imagen'=>"mini_".$con.$ima,
							'producto_id'=>$id_producto
						);
						$tabla1='tienda_galeria';
						$this->Modelo_configuracion->insertar_tabla_sys($tabla1,$obj1);
					}else{
						if ($_FILES["file"]['type'][$key]=="image/png") {
							$ima=round(microtime(true)).'.png';
							$ruta="assets/img_producto/mini_".$con.''.$ima;
							$origen=imagecreatefromjpeg($_FILES["file"]['tmp_name'][$key]);
					
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
							
							$obj1=array(
								'galeria_imagen'=>"mini_".$con.$ima,
								'producto_id'=>$id_producto
							);
							$tabla1='tienda_galeria';
							$this->Modelo_configuracion->insertar_tabla_sys($tabla1,$obj1);
						}else{
							if ($_FILES["file"]['type'][$key]=="image/gif") {
								$ima=round(microtime(true)).'.gif';
								$ruta="assets/img_producto/mini_".$con.''.$ima;
								$origen=imagecreatefromjpeg($_FILES["file"]['tmp_name'][$key]);
					
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

								$obj1=array(
									'galeria_imagen'=>"mini_".$con.$ima,
									'producto_id'=>$id_producto
								);
								$tabla1='tienda_galeria';
								$this->Modelo_configuracion->insertar_tabla_sys($tabla1,$obj1);
							}
						}
					}
				}
			}
	}

	public function editar_producto(){
		
		$id_user=$this->session->userdata('user_id');

		$id_producto=$this->input->post('id_producto');
		$titulo=mb_strtoupper($this->input->post('titulo'),'utf-8');
		$descripcion=$this->input->post('descripcion');
		$costo=$this->input->post('costo');
		$numero=$this->input->post('numero');
		$categoria=$this->input->post('categoria');
		$fecham=$this->input->post('fechamodificado');
		$cursos_imagen=$this->input->post('producto_imagen');

		$imagen=$_FILES['imagen']['tmp_name'];

		if ($imagen==null) {
			$imag=$cursos_imagen;
		}else{
			if ($imagen) {
				unlink("./assets/img_producto/".$cursos_imagen);
			}
			list($originalWidth,$originalHeight)=getimagesize($_FILES['imagen']['tmp_name']);
			$nuevo_ancho=800;
			$nuevo_alto=500;
			if ($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg") {
				$ima=round(microtime(true)).'.jpg';
				$ruta="assets/img_producto/user_".$ima;
				
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
				$imag="user_".$ima;

			}else{
				if ($_FILES['imagen']['type']=="image/png") {
					$ima=round(microtime(true)).'.png';
					$ruta="assets/img_producto/user_".$ima;
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
					$imag="user_".$ima;
				}else{
					if ($_FILES['imagen']['type']=="image/gif") {
						$ima=round(microtime(true)).'.gif';
						$ruta="assets/img_producto/user_".$ima;
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
						$imag="user_".$ima;
					}else{
						$imag='';
					}
				}
			}
		}

		$obj=array(
			'producto_titulo'=>$titulo,
			'producto_descripcion'=>$descripcion,
			'producto_referencia'=>$numero,
			'producto_costo'=>$costo,
			'producto_estado'=>'A',
			'producto_fin_fecha_modificacion'=>$fecham,
			'producto_imagen'=>$imag,
			'categoria_id'=>$categoria,
			'id_user'=>$id_user,
		);

		$tabla="tienda_producto";
		$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,'producto_id',$id_producto);

		if(!empty($_FILES["file"]['tmp_name'])){ 
			$con=0;
			foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name){
				$con=$con+1;
				$ima=0;$ruta=0;
				$origen=0;$destino=0;

				list($originalWidth,$originalHeight)=getimagesize($_FILES["file"]['tmp_name'][$key]);
				$nuevo_ancho=800;
				$nuevo_alto=500;
				if ($_FILES["file"]['type'][$key]=="image/jpg" || $_FILES["file"]['type'][$key]=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_producto/mini_".$con.''.$ima;
					$origen=imagecreatefromjpeg($_FILES["file"]['tmp_name'][$key]);
					
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

					$obj1=array(
						'galeria_imagen'=>"mini_".$con.$ima,
						'producto_id'=>$id_producto
					);
					$tabla1='tienda_galeria';
					$this->Modelo_configuracion->insertar_tabla_sys($tabla1,$obj1);
				}else{
					if ($_FILES["file"]['type'][$key]=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_producto/mini_".$con.''.$ima;
						$origen=imagecreatefromjpeg($_FILES["file"]['tmp_name'][$key]);
					
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
	
						$obj1=array(
							'galeria_imagen'=>"mini_".$con.$ima,
							'producto_id'=>$id_producto
						);
						$tabla1='tienda_galeria';
						$this->Modelo_configuracion->insertar_tabla_sys($tabla1,$obj1);
					}else{
						if ($_FILES["file"]['type'][$key]=="image/gif") {
							$ima=round(microtime(true)).'.gif';
							$ruta="assets/img_producto/mini_".$con.''.$ima;
							$origen=imagecreatefromjpeg($_FILES["file"]['tmp_name'][$key]);
					
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

							$obj1=array(
								'galeria_imagen'=>"mini_".$con.$ima,
								'producto_id'=>$id_producto
							);
							$tabla1='tienda_galeria';
							$this->Modelo_configuracion->insertar_tabla_sys($tabla1,$obj1);
						}
					}
				}
			}
		}	
	}

// modulo productos 
	public function productos(){

		if ( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin() )

		{ 

			redirect('auth/login', 'refresh');

		}else{	

			$tabla='tech_tienda';

			$query='1 ORDER BY tienda_id DESC';

			$this->data['listar_tienda']=$this->Modelo_configuracion->consult($tabla,$query);

			$tabla1='tech_categoria';

			$this->data['categorias']=$this->Modelo_configuracion->select_tabla($tabla1);

			$this->data['page_content'] = 'backend/configuraciones/vista_tienda/tienda_productos';

			$this->render();

		}

	}



		public function producto_detalle($id)

	{

		if ( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin() )

		{ 

			redirect('auth/login', 'refresh');

		}else{	

			$tabla='tech_tienda';

			$query='1 ORDER BY tienda_id DESC';

			$this->data['id']=$id;

			$this->data['listar_tienda']=$this->Modelo_configuracion->consult($tabla,$query);

			$this->data['page_content'] = 'backend/configuraciones/vista_tienda/tienda_producto_detalle';

			$this->render();

		}

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

		public function cambiar_estado_tienda(){

		$id=$this->input->post('id');

		$active=$this->input->post('estado');

		if ($active==1) {

			$estado='0';

		}else{

			$estado='1';

		}

		$obj=array(

			'tienda_estado'=>$estado

		);

		$tabla='tech_tienda';

		$idtabla='tienda_id';

		$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$id);

	}

	public function eliminar_mini_img(){
		$id=$this->input->post('galeria_id');
		$galeria_imagen=$this->input->post('galeria_imagen');
		unlink("./assets/img_producto/".$galeria_imagen);
		$tabla='tienda_galeria';
		$idtabla='galeria_id';
		$this->Modelo_configuracion->eliminar_tabla_sys($tabla,$idtabla,$id);
	}   





}

