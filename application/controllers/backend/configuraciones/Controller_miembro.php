<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_miembro extends Backend
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modelo_configuracion');
		$this->load->model('Modelo_tienda');
		$this->load->model('Modelo_miembro');
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


	public function index()
	{
		if ( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin() )
		{ 
			redirect('auth/login', 'refresh');
		}else{	
			$this->data['listar_miembro']=$this->Modelo_miembro->listar_miembros();
			$this->data['page_content'] = 'backend/configuraciones/vista_miembro/miembro_index';
			$this->render();
		}
	}
		public function vista_adicionar(){
			$this->data['page_content'] = 'backend/configuraciones/vista_miembro/miembro_adicionar';
			 $this->render();
		}
	public function adicionar_miembro(){
			$nombres=mb_strtoupper($this->input->post('nombres'),'utf-8');
			$apellidos=mb_strtoupper($this->input->post('apellidos'),'utf-8');
			$correo=$this->input->post('correo');
			$celular=$this->input->post('celular');
			$pais=mb_strtoupper($this->input->post('pais'),'utf-8');
			$departamento=mb_strtoupper($this->input->post('departamento'),'utf-8');
			$ciudad=mb_strtoupper($this->input->post('ciudad'),'utf-8');
			$profesion=$this->input->post('profesion');
			$categoria=$this->input->post('categoria');
			$id_user=$this->session->userdata('user_id');

			$imagen=$_FILES['imagen']['tmp_name'];

			if ($imagen==null) {
				$imag=$imagen_ant;
			}else{
				 if ($imagen_ant) {
					unlink("./assets/img_miembro/".$imagen_ant);
				}
				list($ancho,$alto)=getimagesize($_FILES['imagen']['tmp_name']);
				$nuevo_ancho=800;
				$nuevo_alto=500;
				if ($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_miembro/miem_".$ima;
					$origen=imagecreatefromjpeg($_FILES['imagen']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					$imag="miem_".$ima;
				}else{
					if ($_FILES['imagen']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_miembro/miem_".$ima;
						$origen=imagecreatefrompng($_FILES['imagen']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back
						imagefill($destino, 0, 0, $color);
						imagesavealpha($destino, true);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagepng($destino,$ruta);
						$imag="miem_".$ima;
					}else{
							$imag='';
						}
					}
				}

			$documento=$_FILES['documento']['tmp_name'];
			if ($_FILES['documento']['type']=="application/pdf" ) {
				$ext=explode(".", $_FILES['documento']['name']);
				$doc=round(microtime(true)).'.'.end($ext);
				move_uploaded_file($_FILES['documento']['tmp_name'], "assets/doc_curriculum/file_".$doc);
				$docum="file_".$doc;
				}

				$obj=array(
				'miembro_nombres'=>$nombres,
				'miembro_apellidos'=>$apellidos,
				'miembro_correo'=>$correo,
				'miembro_celular'=>$celular,
				'miembro_documento'=>$docum,
				'miembro_pais'=>$pais,
				'miembro_departamento'=>$departamento,
				'miembro_ciudad'=>$ciudad,
				'tech_carrera_id'=>$profesion,
				'miembro_estado'=>0,
				'id_user'=>$id_user,
				'tech_tipo_miembro_tm_id'=>$categoria,
				'miembro_imagen'=>$imag
				);
				$tabla="tech_miembro";
				$this->Modelo_configuracion->insertar_tabla_sys($tabla,$obj);
	}

		public function membresia($id){
        require_once APPPATH."libraries/Fpdf/Fpdf.php"; 
        require_once APPPATH."libraries/phpqrcode/qrlib.php";
        $miembro=$this->Modelo_miembro->datos_miembro($id);
        $codigo=$this->Modelo_miembro->codigo_miembro($id);
        $datos=$this->db->query("SELECT * FROM tech_platilla_membresia WHERE plantilla_id='$id' ")->row();
        $pdf = new FPDF('L','mm',array(140,216));          

        $pdf->AddPage();

        $pdf->SetLeftMargin(10);

        $pdf->SetAutoPageBreak(1, 20);     

        $pdf->Image("./assets/certificados/$datos->plantilla_imagen",10,10,194,114,"jpg");

 

        $pdf->SetTextColor(3,3,3); 

        $pdf->setFont('times', '', 15);

        foreach ($miembro as $value) {
       	$code="PAGINA: http://techbo.org ESTA MEMBRESIA LE PERTENECE A : $value->miembro_nombres $value->miembro_apellidos ID: $codigo->codigo";
        QRcode::png($code,'img.png');
        $pdf->Image("img.png",15,88,30,30,"png");

        	$pdf->Image("./assets/img_miembro/".$value->miembro_imagen,28,28,40,40,"jpg");
        	$pdf->ln(56);
        	$pdf->SetX(20);
        	$pdf->setFont('times', 'B', 15);
        	$pdf->Cell(30,0,'NOMBRES: ',0,'L');
        	$pdf->setFont('times', '', 15);
        	$pdf->Cell(20,0,$value->miembro_nombres,0,'L');
        	$pdf->ln(6);
        	$pdf->SetX(25);
        	$pdf->setFont('times', 'B', 15);
        	$pdf->Cell(35,0,'APELLIDOS: ',0,'L');
        	$pdf->setFont('times', '', 15);
        	$pdf->Cell(20,0,$value->miembro_apellidos,0,'L');
        	$pdf->ln(6);
        	$pdf->SetX(30);
        	$pdf->setFont('times', 'B', 15);
        	$pdf->Cell(30,0,'CARRERA: ',0,'L');
        	$pdf->setFont('times', '', 15);
        	$pdf->Cell(20,0,$value->carrera_nombre,0,'L');
        	$pdf->ln(6);
        	$pdf->SetX(45);
        	$pdf->setFont('times', 'B', 15);
        	$pdf->Cell(10,0,'ID: ',0,'L');
        	$pdf->setFont('times', '', 15);
        	$pdf->Cell(20,0,$codigo->codigo,0,'L');
        }



        

        

        $pdf->SetTextColor(0,51,102); 

        $pdf->setFont('times', 'B', 18);



        $pdf->Cell(0,22,'',0, 1, 'C');



        $nombre='certificado.pdf';

        $pdf->Output($nombre,'I');

    } 


		public function editar_tienda($id){
			$this->data['id']=$id;
			$this->data['page_content'] = 'backend/configuraciones/vista_tienda/tienda_editar';
			 $this->render();
		}
		public function guardar_editar_tienda(){
			$titulo=mb_strtoupper($this->input->post('titulo'),'utf-8');
			$imagen=$_FILES['imagen']['tmp_name'];
			$imagen1=$_FILES['imagen1']['tmp_name'];
			$id_user=$this->input->post('user_id');
			$id=$this->input->post('id');
			$descripcion=$this->input->post('descripcion');
			$fecha_fin=$this->input->post('fecha_fin');
			$costo=$this->input->post('costo');
			$costo_oferta=$this->input->post('costo_oferta');
			$numero=$this->input->post('numero');
			$categoria=$this->input->post('categoria');
			$imagen_ant=$this->input->post('imagen_ant');
			$imagen_ant_2=$this->input->post('imagen_ant_2');
						//////////////////////////// imagen 1
			if ($imagen==null) {
				$imag=$imagen_ant;
			}else{
				 if ($imagen_ant) {
					unlink("./assets/img_tienda/".$imagen_ant);
				}
				list($ancho,$alto)=getimagesize($_FILES['imagen']['tmp_name']);
				$nuevo_ancho=800;
				$nuevo_alto=500;
				if ($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/img_tienda/tien_".$ima;
					$origen=imagecreatefromjpeg($_FILES['imagen']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					$imag="tien_".$ima;
				}else{
					if ($_FILES['imagen']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/img_tienda/tien_".$ima;
						$origen=imagecreatefrompng($_FILES['imagen']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back
						imagefill($destino, 0, 0, $color);
						imagesavealpha($destino, true);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagepng($destino,$ruta);
						$imag="tien_".$ima;
					}else{
							$imag='';
						}
					}
				}
				//////////////////////////////IMAGEN 2
			if ($imagen1==null) {
				$imag1=$imagen_ant_2;
			}else{
				 if ($imagen_ant_2) {
					unlink("./assets/img_tienda/".$imagen_ant_2);
				}
				list($ancho,$alto)=getimagesize($_FILES['imagen1']['tmp_name']);
				$nuevo_ancho=800;
				$nuevo_alto=500;
				if ($_FILES['imagen1']['type']=="image/jpg" || $_FILES['imagen1']['type']=="image/jpeg") {
					$ima1=round(microtime(true)).'.jpg';
					$ruta="assets/img_tienda/tien1_".$ima1;
					$origen=imagecreatefromjpeg($_FILES['imagen1']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					$imag1="tien1_".$ima1;
				}else{
					if ($_FILES['imagen1']['type']=="image/png") {
						$ima1=round(microtime(true)).'.png';
						$ruta="assets/img_tienda/tien1_".$ima1;
						$origen=imagecreatefrompng($_FILES['imagen1']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back
						imagefill($destino, 0, 0, $color);
						imagesavealpha($destino, true);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagepng($destino,$ruta);
						$imag1="tien1_".$ima1;
					}else{
							$imag1='';
						}
					}
				}


				$obj=array(
				'tienda_titulo'=>$titulo,
				'tienda_imagen'=>$imag,
				'tienda_imagen_2'=>$imag1,
				'tienda_fin_fecha_oferta'=>$fecha_fin,
				'tech_categoria_id'=>$categoria,
				'tienda_costo'=>$costo,
				'tienda_oferta_costo'=>$costo_oferta,
				'tienda_referencia'=>$numero,
				'id_user'=>$id_user,
				'tienda_descripcion'=>$descripcion
				);
				$tabla="tech_tienda";
				$idtabla="tienda_id";
				$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$id);
			}

// modulo productos 
	public function productos()
	{
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
		public function cambiar_estado_miembro(){
		$id=$this->input->post('id');
		$active=$this->input->post('estado');
		if ($active==1) {
			$estado='0';
		}else{
			$estado='1';
		}
		$fecha=date("Y-m-d");
		$fecha_final=date("Y-m-d",strtotime($fecha."+ 3 month"));

		$obj=array(
			'miembro_estado'=>$estado,
			'miembro_fecha_inicio_membresia'=>$fecha,
			'miembro_fecha_final_membresia'=>$fecha_final);
		$tabla='tech_miembro';
		$idtabla='miembro_id';
		$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$id);

		$miembro=$this->db->query("SELECT miembro_correo FROM tech_miembro WHERE miembro_id='$id'")->row();
		if ($estado==1) {
		$para      = $miembro->miembro_correo;
		$titulo    = 'Membresia Tech Lab';
		$mensaje   = "!!!Felicidades!!! Su solicitud de ser miembro de tech-lab Bolivia fue aceptada";
		$cabeceras = 'From: techboor@techlab.com' . "\r\n" .
	    'Reply-To: techboor@techlab.com' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

		mail($para, $titulo, $mensaje, $cabeceras);
		}


	}


	public function listar_miembro_categoria(){
			$this->data['listar_miembro_categoria']=$this->Modelo_miembro->listar_categoria();
			$this->data['page_content'] = 'backend/configuraciones/vista_miembro/categoria_miembro';
			$this->render();
		}

	public function adicionar_miembro_categoria(){
			$nombre=mb_strtoupper($this->input->post('nombre'),'utf-8');
			$descripcion=$this->input->post('descripcion');
				$obj=array(
				'tm_titulo'=>$nombre,
				'tm_descripcion'=>$descripcion
				);
				$tabla="tech_tipo_miembro";
				$this->Modelo_configuracion->insertar_tabla_sys($tabla,$obj);
	}
	
	public function cambiar_estado_miembro_categoria(){
		$id=$this->input->post('id');
		$active=$this->input->post('estado');
		if ($active==1) {
			$estado='0';
		}else{
			$estado='1';
		}
		$obj=array(
			'tm_estado'=>$estado
		);
		$tabla='tech_tipo_miembro';
		$idtabla='tm_id';
		$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$id);
	}
	
	public function listar_miembro_carrera(){
			$this->data['listar_miembro_carrera']=$this->Modelo_miembro->listar_carrera();
			$this->data['page_content'] = 'backend/configuraciones/vista_miembro/carrera_miembro';
			$this->render();
		}

	public function adicionar_miembro_carrera(){
			$nombre=mb_strtoupper($this->input->post('nombre_carrera'),'utf-8');
				$obj=array(
				'carrera_nombre'=>$nombre,
				);
				$tabla="tech_miembro_carrera";
				$this->Modelo_configuracion->insertar_tabla_sys($tabla,$obj);
	}
	
	public function cambiar_estado_miembro_carrera(){
		$id=$this->input->post('id');
		$active=$this->input->post('estado');
		if ($active==1) {
			$estado='0';
		}else{
			$estado='1';
		}
		$obj=array(
			'carrera_estado'=>$estado
		);
		$tabla='tech_miembro_carrera';
		$idtabla='carrera_id';
		$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$id);
	}

		public function vista_miembro($id){
			$this->data['datos_miembro']=$this->Modelo_miembro->datos_miembro($id);
			$this->data['page_content'] = 'backend/configuraciones/vista_miembro/vista_miembro';
			$this->render();
		}



		public function editar_platilla($id){
			$this->data['id']=$id;
			$this->data['page_content'] = 'backend/configuraciones/vista_miembro/cambiar_platilla';
			 $this->render();
		}

		public function guardar_editar_platilla(){
			$imagen=$_FILES['imagen']['tmp_name'];
			$id=$this->input->post('id');
			$imagen_ant=$this->input->post('imagen_ant');
						//////////////////////////// imagen 1
			if ($imagen==null) {
				$imag=$imagen_ant;
			}else{
				 if ($imagen_ant) {
					unlink("./assets/certificados/".$imagen_ant);
				}
				list($ancho,$alto)=getimagesize($_FILES['imagen']['tmp_name']);
				$nuevo_ancho=800;
				$nuevo_alto=500;
				if ($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg") {
					$ima=round(microtime(true)).'.jpg';
					$ruta="assets/certificados/mem_".$ima;
					$origen=imagecreatefromjpeg($_FILES['imagen']['tmp_name']);
					$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
					imagejpeg($destino,$ruta);
					$imag="mem_".$ima;
				}else{
					if ($_FILES['imagen']['type']=="image/png") {
						$ima=round(microtime(true)).'.png';
						$ruta="assets/certificados/mem_".$ima;
						$origen=imagecreatefrompng($_FILES['imagen']['tmp_name']);
						$destino=imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
						$color = imagecolorallocatealpha($destino, 0, 0, 0, 127); //fill transparent back
						imagefill($destino, 0, 0, $color);
						imagesavealpha($destino, true);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
						imagepng($destino,$ruta);
						$imag="mem_".$ima;
					}else{
							$imag='';
						}
					}
				}

				$obj=array(
				'plantilla_imagen'=>$imag
				);
				$tabla="tech_platilla_membresia";
				$idtabla="plantilla_id";
				$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$id);
			}



	public function editar_fecha(){
		$id=$this->input->post('id');
		$dato['obj']=$this->db->query("SELECT miembro_id,miembro_fecha_inicio_membresia,miembro_fecha_final_membresia FROM tech_miembro WHERE miembro_id='$id'")->row();
		$this->load->view("backend/configuraciones/vista_miembro/cambiar_fecha_mebresia",$dato);
	}

	public function guardar_fecha(){
		$id=$this->input->post('id_miembro');
		$fecha_inicio=$this->input->post('fecha_inicio');
		$fecha_final=$this->input->post('fecha_final');
				
				$obj=array(
				'miembro_fecha_inicio_membresia'=>$fecha_inicio,
				'miembro_fecha_final_membresia'=>$fecha_final
				);
				$tabla="tech_miembro";
				$idtabla="miembro_id";
				$this->Modelo_configuracion->editar_tabla_sys($tabla,$obj,$idtabla,$id);
	}
}