<?php 

class Modelo_institucion extends CI_Model

{

	function __construct()

	{

		parent::__construct();

		$this->load->database();

		date_default_timezone_set('America/La_Paz');

	}

	public function listar_institucion(){

		return $this->db->query("SELECT * FROM upea_institucion WHERE institucion_id='1' ")->row();

	}

	public function buscar_lider($id){
		return $this->db->query("SELECT l.lideres_id, l.lideres_nombre, l.lideres_foto, l.lideres_facebook, l.lideres_descripcion
		FROM tech_lideres as l 
		WHERE l.lideres_id = $id")->result();

	}

	

}