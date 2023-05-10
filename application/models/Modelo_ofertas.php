<?php 
class Modelo_ofertas extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/La_Paz');
	}
	
	public function id_tabla_ofertas($id){
		return $this->db->query("SELECT * FROM upea_ofertas_academicas where ofertas_id=$id ")->row();
	}
	

}