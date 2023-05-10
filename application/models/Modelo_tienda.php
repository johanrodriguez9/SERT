<?php 
class Modelo_tienda extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/La_Paz');
	}

	public function listar_tienda($id){
		return $this->db->query("SELECT* FROM tech_tienda tt join tech_categoria tc on (tt.tech_categoria_id=tc.categoria_id) where tienda_id=$id")->row();
	}	

	public function id_tabla_producto($id){
		return $this->db->query("SELECT* FROM tienda_producto where producto_id=$id ")->row();
	}

	public function id_tabla_imag_mini($id){
		return $this->db->query("SELECT* FROM tienda_galeria where producto_id=$id")->result();
	}

	public function id_tabla_imag_mini3d($id){
		return $this->db->query("SELECT* FROM tienda_galeria3d where producto_id=$id")->result();
	}

	public function selectgalleria($id){		
		return $this->db->query("SELECT * FROM tienda_galeria as tg
		INNER JOIN tienda_producto as tp on tg.producto_id = tp.producto_id 
		WHERE tg.producto_id = $id")->result();
	}
	
	public function selectproducto($id){		
		return $this->db->query("SELECT * FROM tienda_producto as tp
		WHERE tp.producto_id = $id")->result();
	}

	public function seleccionaroferta($id){		
		return $this->db->query("SELECT * FROM tienda_producto_oferta as tpo
		INNER join tienda_producto as tpa ON tpo.tienda_oferta_producto_id = tpa.producto_id
		WHERE tpa.producto_id = $id")->result();
	}
	
	public function productocount(){		
		return $this->db->query("SELECT tpa.tienda_producto_adquirido_id, tp.producto_titulo, tp.producto_costo, tp.producto_imagen, tp.producto_id, COUNT(tpa.tienda_producto_adquirido_producto_id) FROM tienda_producto as tp
		INNER JOIN tienda_producto_adquirido as tpa on tp.producto_id = tpa.tienda_producto_adquirido_producto_id
		GROUP BY tpa.tienda_producto_adquirido_producto_id ORDER BY tpa.tienda_producto_adquirido_id ASC LIMIT 3;")->result();
	}
	

	public function selecttemporada($id){		
		return $this->db->query("SELECT * FROM tienda_producto as tp 
		inner join tienda_temporada as tt on tp.temporada_id = tt.temporada_id
		WHERE tp.producto_id = $id")->result();
	}

	public function selectproductoeditar($id){
		return $this->db->query("SELECT * FROM tienda_producto as tp 
		inner join tienda_temporada as tt on tp.temporada_id = tt.temporada_id
		inner join tienda_temporada_genero as ttg on tp.temporada_genero_id = ttg.temporada_genero_id
		inner join tienda_categoria as tc on tc.categoria_id = tp.categoria_id
		WHERE tp.producto_id = $id")->row();
	}

	public function selectproductotemporada($id){
		return $this->db->query("SELECT * FROM tienda_producto as tp 
		inner join tienda_temporada as tt on tp.temporada_id = tt.temporada_id
		WHERE tt.temporada_id = $id")->result();
	}

	function getbuscarinventario($id){
        return $this->db->query("SELECT * FROM tienda_producto as tp 
		WHERE tp.producto_titulo like '$id';")->result();
    }

	function insertar_tabla_sys($data){
        return $this->db->insert('tienda_inventario',$data);
    }

}












