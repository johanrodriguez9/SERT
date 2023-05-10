<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_techbo extends CI_Controller {

	public function __construct()	{
		parent::__construct();
		$this->load->model('Modelo_calendario');
		$this->load->model('Modelo_comunidad');
		$this->load->model('Modelo_vista_tech');
		$this->load->model('Modelo_institucion');
		$this->load->model('Modelo_configuracion');
		$this->load->model('Modelo_tienda');

		$this->load->helper('funciones_helper');
		date_default_timezone_set('America/La_Paz');

	}

	public function index(){
		
		$dato['listar_institucion']=$this->Modelo_comunidad->listar_comunidad();
		$tabla_p='tienda_producto';
		$dato['listar_producto']=$this->Modelo_configuracion->select_tabla($tabla_p);
		
		$tabla_p='tienda_categoria';
		$dato['listar_categoria']=$this->Modelo_configuracion->select_tabla($tabla_p);
		

		$tabla_portada='tienda_portada';
		$dato['listar_portada']=$this->Modelo_configuracion->select_tabla($tabla_portada);
		
		$dato['contenido']="frontend/vista_index";
		$this->load->view('frontend/vista_techbo',$dato);
	}

	public function vista_tienda(){
		$dato['listar_institucion']=$this->Modelo_comunidad->listar_comunidad();
	
		$tabla_p='tienda_producto';
		$dato['listar_producto']=$this->Modelo_configuracion->select_tabla($tabla_p);

		$tabla_p='tienda_producto';
		$dato['listar_producto']=$this->Modelo_configuracion->select_tabla($tabla_p);

		$dato['contenido']="frontend/vista_tienda_detalle";
		$this->load->view('frontend/vista_techbo',$dato);
	}

	
	public function vista_tienda_producto(){
		$dato['listar_institucion']=$this->Modelo_comunidad->listar_comunidad();
		$dato['listar_top_adquiridos']=$this->Modelo_tienda->productocount();

		$tabla_p='tienda_producto';
		$dato['listar_producto']=$this->Modelo_configuracion->select_tabla($tabla_p);

		$dato['contenido']="frontend/vista_tienda";
		$this->load->view('frontend/vista_techbo',$dato);
	}

	public function vista_tienda_producto_pro(){
		$dato['listar_institucion']=$this->Modelo_comunidad->listar_comunidad();
		$dato['listar_top_adquiridos']=$this->Modelo_tienda->productocount();

		$tabla_p='tienda_producto';
		$dato['listar_producto']=$this->Modelo_configuracion->select_tabla($tabla_p);

		$tabla_p1='tienda_temporada';
		$dato['listar_temporada']=$this->Modelo_configuracion->select_tabla($tabla_p1);

		$dato['contenido']="frontend/vista_tienda_producto";
		$this->load->view('frontend/vista_techbo',$dato);
	}

	public function vista_tienda_producto_temporada($id){
		$dato['listar_institucion']=$this->Modelo_comunidad->listar_comunidad();
		$dato['listar_top_adquiridos']=$this->Modelo_tienda->productocount();

		$dato['listar_producto']=$this->Modelo_tienda->selectproductotemporada($id);
		
		$tabla_p1='tienda_temporada';
		$dato['listar_temporada']=$this->Modelo_configuracion->select_tabla($tabla_p1);

		$dato['contenido']="frontend/vista_tienda_producto_temporada";
		$this->load->view('frontend/vista_techbo',$dato);
	}

	public function vista_detalle_tienda($id){
		$dato['listar_institucion']=$this->Modelo_comunidad->listar_comunidad();
		$dato['listar_top_adquiridos']=$this->Modelo_tienda->productocount();
		
		$tabla_p='tienda_producto';
		$dato['listar_producto']=$this->Modelo_configuracion->select_tabla($tabla_p);

		$dato['listar_galeria']=$this->Modelo_tienda->selectgalleria($id);
		
		$dato['producto_id_1']=$id;

		$dato['listar_producto_detalle']=$this->Modelo_tienda->selectproducto($id);
		
		$dato['contenido']="frontend/vista_tienda_detalle";
		$this->load->view('frontend/vista_techbo',$dato);
	}

	public function vista_detalle_carrito($id){		
		$dato['contenido']="frontend/vista_tienda_carrito";
		$this->load->view('frontend/vista_techbo',$dato);
	}

	public function mostrar_reporte(){ 
        $idpres=$this->input->post('idprestamoin');
    	$idsoli=$this->input->post('idsoliin');

        require_once APPPATH."libraries/fpdf/fpdf.php";

        $pdf = new FPDF('P','mm','A4');          
        $pdf->AddPage();
        $pdf->SetLeftMargin(10);
        $pdf->SetAutoPageBreak(1, 20);    
        $pdf->Image('assets/logos/logo1.jpeg',45,20,120);
        $pdf->ln(30);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->ln(8);
        $pdf->Cell(0, 10,'REPORTE GENERAL', 0, 1, 'C');
        $pdf->Cell(0, 0,'',1, 1, 'C');

        $pdf->ln(5);
        $data_1 = $this->prestamo->buscar_prodcuto($idpres, $idsoli);

        foreach($data_1 as $fila){
            
            $pdf->SetFont('Arial', 'B', 12);

            $pdf->ln(5);
            
        }

        $nombre='producto'.$idpres.$idsoli.'.pdf';
        header('Content-Type: application/json');
        
        $pdf->Output($nombre,'F');        
        echo json_encode(['url' => $nombre]);

        
        $data=[
            'documento_pdf' => $nombre
        ];
        
        $this->prestamo->updateprestamodocumento($data);
        
        echo json_encode($data);

        
    }

	public function vista_categoria_detalle($id){		
		$tabla_p='tienda_producto';
		$idtabla = 'producto_id';
		$dato['listar_producto']=$this->Modelo_configuracion->categoriabuscar($id);

		$dato['contenido']="frontend/vista_categoria_detalle";
		$this->load->view('frontend/vista_techbo',$dato);
	}

	public function productotresd(){
		$id = $this->input->post('id');
		$select = $this->Modelo_tienda->id_tabla_imag_mini3d($id);
		echo json_encode($select);
	}
	
	public function tienda_categoria($id){
		$dato['listar_tienda_categoria']=$this->Modelo_vista_tech->listar_categoria($id);
		$tabla='tech_categoria';
		$query='1 ORDER BY categoria_id DESC';
		$dato['categoria']=$this->Modelo_configuracion->consult($tabla,$query);
		$dato['contenido']="frontend/vista_tienda_categoria";
		$this->load->view('frontend/vista_techbo',$dato);
	}

	public function producto($id){
		$dato['producto']=$this->Modelo_vista_tech->listar_producto($id);
		$tabla='tech_tienda';
		$query='1 ORDER BY tienda_id DESC limit 10';
		$dato['listar_tienda']=$this->Modelo_configuracion->consult($tabla,$query);
		$dato['contenido']="frontend/vista_producto";
		$this->load->view('frontend/vista_techbo',$dato);
	}

	public function vista_servicios(){
		$dato['listar_servicios']=$this->Modelo_vista_tech->listar_servicios_base();
		$dato['contenido']="frontend/vista_servicios";
		$this->load->view('frontend/vista_techbo',$dato);
	}

	public function vista_servicios_detalle($id){
		$dato['listar_servicios_detalle']=$this->Modelo_vista_tech->listar_categoria($id);
		$tabla='tech_categoria';
		$query='1 ORDER BY categoria_id DESC';
		$dato['categoria']=$this->Modelo_configuracion->consult($tabla,$query);
		$dato['contenido']="frontend/vista_servicios_detalle";

		$this->load->view('frontend/vista_techbo',$dato);
	}


	public function vista_frontend_mostrar(){
        // $idcurso=$this->input->post('aa');

        $idcurso=$this->input->post('aa');
        $id_calendari = $this->Modelo_calendario->mostrarcalendari($idcurso);
		// var_dump($id_calendari);
		// echo json_encode($id_calendari);
		echo '<div class="swiper mySwiper">';
		echo 	'<div class="swiper-wrapper">';
		$count=1;
				foreach($id_calendari as $fila) {             
					echo '<div class="swiper-slide">
					<h6 class="app-title-num">'.$count.'</h6>
					<h6 class="app-title">'.$fila->evento.'</h6>
					<h6 class="app-title-nomc">'.$fila->tipo_evento.'</h6>
					</div>';
					$count=$count+1;
					// echo json_encode($fila->evento);
				}
			echo '</div>';
		echo '</div>';
    }


}

