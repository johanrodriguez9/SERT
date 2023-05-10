<?php 
class Modelo_portada extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/La_Paz');
	}

	public function listar_portada(){
		return $this->db->query("SELECT * FROM tienda_portada")->result();
	}
	// public function listar_institucion(){
	// 	return $this->db->query("SELECT * FROM upea_institucion WHERE institucion_id='1' ")->row();
	// }
	public function get_tabla($tabla){
		return $this->db->query("SELECT * FROM  $tabla")->result();
	}	

}