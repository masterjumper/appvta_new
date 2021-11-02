<?php

Class MY_Rol extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all ()
    {
        $this -> db -> select('*');
        $this -> db -> from('rol');
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get_rol_filtro ($filtro, $limit, $start)
    {
        $this -> db -> select('*');
        $this -> db -> from('rol');

        if(empty($filtro)==FALSE){
            $this -> db -> like('RolDescripcion', $filtro);
        }
        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        //echo $this -> db ->last_query();
        return $query;
    }

    public function get_rol ($idRol)
    {
        $this -> db -> select('*');
        $this -> db -> from('rol');
        $this -> db -> where('idRol', $idRol);
        $this -> db -> limit(1);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function new_rol($idRol, $RolDescripcion)
    {
        $data = array(
            'idRol'  =>$idRol,
            'RolDescripcion' =>$RolDescripcion
        );
        $this -> db -> insert('rol', $data);
    }

    public function set_rol($idRol, $RolDescripcion)
    {
        $data = array(
            'RolDescripcion' =>$RolDescripcion
        );
        $this -> db -> where('idRol', $idRol);
        $this -> db -> update('rol', $data);
    }

    public function delete_rol ($idRol)
    {
        $this->db->where('idRol', $idRol);
        $this->db->delete('rol');

    }

    public function record_count() {
        $this->db->select('*');
        $this->db->from('rol');
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }
}