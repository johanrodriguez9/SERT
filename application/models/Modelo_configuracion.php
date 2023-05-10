<?php 
class Modelo_configuracion extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/La_Paz');
	}
	// ELIMINA UN REGISTRO DE UNA TABLA
	public function eliminar_tabla_sys($tabla,$idtabla,$id){
		$this->db->WHERE($idtabla,$id);
		$this->db->delete($tabla);
	}
	// EDITA UN REGISTRO DE UNA TABLA
	public function editar_tabla_sys($tabla,$obj,$idtabla,$id){
		$this->db->WHERE($idtabla,$id);
		$this->db->update($tabla,$obj);
	}
	// INSERTA UN REGISTRO NUEVO A UNA TABLA
	public function insertar_tabla_sys($tabla,$obj){
		$this->db->insert($tabla,$obj);
		return $this->db->insert_id();
	}
	// DEVUELVE TODO LOS DATOS DE UN REGISTRO DE UNA TABLA
	public function tabla_row($tabla,$idtabla,$id){
		return $this->db->query("SELECT * FROM $tabla WHERE $idtabla='$id' ")->row();
	}
	// DEVUELVE TODOS LOS REGISTRO DE UNA TABLA///useeeeeeeee consultaaaaaaa en vez de estooooooooooo el ultimo
	public function select_tabla($tabla){
		return $this->db->query("SELECT* FROM $tabla")->result();
	}
	//DEVUELVE DATOS BUSCADOS DE UNA TABLA ///useeeeeeeee consultaaaaaaa en vez de estooooooooooo el ultimo
	public function selec_registro_result($tabla,$idtabla,$id){
		// return $this->db->query("SELECT * FROM $tabla WHERE $idtabla = '$id'")->result();
	}
	//CONSULTA
	public function consult($tabla,$query){
		return $this->db->query("SELECT * FROM $tabla WHERE $query")->result();
	}
	//trae los ultimos registros solicitados segun condicion solicitado 
	public function ultimos_tres($tabla,$idtabla,$limite){		
		return $this->db->query("SELECT * FROM $tabla ORDER BY $idtabla  LIMIT $limite")->result();
	}

	public function editar_glo($tabla, $dato, $id_tabla, $id_item){
		$this->db->where($id_tabla, $id_item);
		return $this->db->update($tabla, $dato);          
}


	public function categoriabuscar($id){
		return $this->db->query("SELECT * FROM tienda_producto WHERE categoria_id = '$id';")->result();
	}

}