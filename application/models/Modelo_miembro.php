<?php 
class Modelo_miembro extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/La_Paz');
	}

	public function listar_carrera(){
		return $this->db->query("SELECT * FROM tech_miembro_carrera")->result();
	}		
	public function listar_carrera_activo(){
		return $this->db->query("SELECT * FROM tech_miembro_carrera where carrera_estado=1")->result();
	}
	public function listar_categoria(){
		return $this->db->query("SELECT * FROM tech_tipo_miembro")->result();
	}	

	public function listar_categoria_activo(){
		return $this->db->query("SELECT * FROM tech_tipo_miembro where tm_estado=1")->result();
	}	

	public function listar_miembros(){
		return $this->db->query("SELECT * FROM tech_miembro tm join tech_miembro_carrera tc on (tm.tech_carrera_id=tc.carrera_id)")->result();
	}

	public function verificar_miembro($id_user){
		return $this->db->query("SELECT miembro_nombres
		FROM tech_miembro
		WHERE id_user=$id_user")->row();
	}

	public function verificar_miembro_aceptado($id_user){
		return $this->db->query("SELECT miembro_nombres
		FROM tech_miembro
		WHERE miembro_estado=1 and id_user=$id_user")->row();
	}
	public function datos_miembro($id_user){
		return $this->db->query("SELECT *
		FROM tech_miembro m join tech_tipo_miembro tm on (m.tech_tipo_miembro_tm_id=tm.tm_id) join tech_miembro_carrera mc on (m.tech_carrera_id=mc.carrera_id)
		WHERE miembro_estado=1 and id_user=$id_user")->result();
	}

		public function codigo_miembro($id_user){
		return $this->db->query("SELECT LPAD(miembro_id,8,'0') codigo
		FROM tech_miembro
		WHERE id_user=$id_user")->row();
	}
}