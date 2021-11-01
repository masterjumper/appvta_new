<?php
/**
 * Created by PhpStorm.
 * User: smuguerza
 * Date: 31/01/2017
 * Time: 01:46 PM
 */
Class MY_Seguridad extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_usuario_password ($usuuser)
    {
        $this -> db -> select('usupass');
        $this -> db -> from('usuario');
        $this -> db -> where('usuuser', $usuuser);
        $this->  db -> limit(1);
        $query = $this -> db ->get() -> row('usupass');
        return $query;
    }

    public function get_usuario ($usuuser)
    {
        //$this -> db -> select('usuario.*, grupo.*, area.*');
        $this -> db -> select('usuario.*, grupo.*');
        $this -> db -> from('usuario, grupo');
        //$this -> db -> from('usuario, grupo, area');
        $this -> db -> where('usuario.usuuser', $usuuser);
        $this -> db -> where('usuario.gruid = grupo.gruid');
        //$this -> db -> where('usuario.areid = area.areid');
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get_usuario_all($limit, $start)
    {
        $this -> db -> select('usuario.*, grupo.*');
        $this -> db -> from('usuario, grupo');
        $this -> db -> where('usuario.gruid = grupo.gruid');
        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    function processLogin($userName=NULL,$password){
        $this->db->select('*');
        $whereCondition = $array = array('usuuser' =>$userName,'usupass'=>$password);
        $this->db->where($whereCondition);
        $this->db->from('usuario');        
        $query = $this->db->get();        
        return $query;
    }
/*
    public function get_usuario_permisos($usuid, $prolnk)
    {
        $this -> db -> select('grupoprograma.*');
        $this -> db -> from('grupoprograma, usuario, programa');
        $this -> db -> where('usuario.usuid',$usuid);
        $this -> db -> where('programa.prolnk',$prolnk);
        $this -> db -> where('usuario.gruid = grupoprograma.gruid');
        $query = $this -> db ->get() -> result();
        return $query;
    }
*/
}