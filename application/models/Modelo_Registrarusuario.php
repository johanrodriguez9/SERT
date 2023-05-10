<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_Registrarusuario extends CI_Model {

    public $table;
    
    public function __construct(){
        parent::__construct();
        $this->table="auth_usuario";
        $this->table1="dp_auth_users";

    }

    function addusuario($data){
        $res = $this->db->insert($this->table,$data);
        return $res;        
    }

    function ultimo_usuario($data){
        $ultimo = $this->db->insert_id();
        return $ultimo;
        
    }

    function confirmaremailinsert($email){
        $query = $this->db->query("SELECT id FROM dp_auth_users where email like '$email'");
        if( $query->num_rows()>0 )
            return $query->row();
        else        
            return false;
    } 


    function addGruposede($data1){
        return $this->db->insert($this->table1,$data1);
    }

    function confirmaremaicodigo($id,$email){
        $query = $this->db->query("SELECT id_persona, hash_ FROM tech_hashconfirmemail WHERE hash_ = $id and email like '$email'");
        if( $query->num_rows()>0 )
            return $query->row();
        else        
            return false;
    }    

    function confirmaremail($id){
        $query = $this->db->query("SELECT * FROM tech_hashconfirmemail WHERE email like '$id'");
        if( $query->num_rows()>0 )
            return $query->row();
        else        
            return false;
    }    

    function verificarexistentemail($id){
         return $this->db->query("SELECT id, active FROM dp_auth_users WHERE email like '$id' ORDER BY id ASC LIMIT 1")->result();
    }    

    function reenvioverificarexistentemail($id){
        return $this->db->query("SELECT id, username, active FROM dp_auth_users WHERE email like '$id' ORDER BY id ASC LIMIT 1")->result();
    }  

    
    function reenvioconfirmaremail($id){
        $query = $this->db->query("SELECT id_confirm, hash_, email, id_persona FROM `tech_hashconfirmemail` WHERE email like '$id' ORDER BY id_confirm ASC LIMIT 1");
        if( $query->num_rows()>0 )
            return $query->row();
        else        
            return false;
    }    


}
