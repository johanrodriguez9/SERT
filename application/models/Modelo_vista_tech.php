<?php 

class Modelo_vista_tech extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/La_Paz');
	}

	public function listar_categoria($id){
		return $this->db->query("SELECT * FROM tech_tienda tt join tech_categoria tc on (tt.tech_categoria_id=tc.categoria_id) WHERE categoria_id=$id and tienda_estado=1 ORDER BY tienda_id DESC limit 10")->result();
	}

	public function listar_productos($id){
		return $this->db->query("SELECT * FROM tech_tienda WHERE tienda_estado=1 ORDER BY tienda_id DESC limit 10")->result();
	}

	public function listar_producto($id){
		return $this->db->query("SELECT * FROM tech_tienda tt join tech_categoria tc on (tt.tech_categoria_id=tc.categoria_id) WHERE tienda_id=$id")->row();
	}

	public function investigacion(){
		return $this->db->query("SELECT * FROM tech_investigacion ORDER BY investigacion_id DESC limit 1")->row();
	}

	public function listar_servicios_base(){
		return $this->db->query("SELECT * FROM tech_servicio WHERE servicio_estado=1")->result();
	}	

	public function listar_servicios_detalle($id){
		return $this->db->query("SELECT * FROM tech_servicio WHERE servicio_id=$id")->result();
	}	

	
	public function investigacion_unico($id){
		return $this->db->query("SELECT * FROM tech_investigacion Where investigacion_id=$id")->row();
	}

}