<?php 
class Modelo_calendario extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/La_Paz');
	}

	public function consult($tabla){
		return $this->db->query("SELECT * FROM $tabla")->result();
	}

	public function mostrarcalendari($id){
        return $this->db->query("SELECT c.id, c.evento, c.color_evento, c.fecha_inicio, c.fecha_fin, c.id_curso, c.tipo_evento 
		FROM tech_calendario as c
		WHERE c.fecha_inicio like '$id'")->result();
    }

	public function updEvento($param){
		$campos = array(
			'cal_fecha_inicio'=> $param['fecini'], 
			'cal_fecha_final'=> $param['fecfin']
		);

		$this->db->where('cal_id',$param['id']);
		$this->db->update('tech_calendario',$campos);

		if($this->db->affected_rows() == 1){
			return 1;
		}else{
			return 0;
		}
	}

	public function deleteEvento($id){
		$this->db->where('id', $id);
		return $this->db->delete('tech_calendario');
	}

	public function insertar_tabla_contenido($tabla,$obj){
		return $this->db->insert($tabla,$obj);
	}

	public function editar_tabla_sys($tabla,$obj,$idtabla,$id){
		$this->db->WHERE($idtabla,$id);
		return $this->db->update($tabla,$obj);
	}

}