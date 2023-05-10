<?php 
class Modelo_comunidad extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/La_Paz');
	}
	public function listar_comunidad(){
		return $this->db->query("SELECT * FROM tech_comunidad WHERE comunidad_id='1' ")->row();
	}
	
	
}