<?php

Class MY_Provincia extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all ()
    {
        $this -> db -> select('*');
        $this -> db -> from('provincia');
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get_provincia_filtro ($filtro, $limit, $start)
    {
        $this -> db -> select('*');
        $this -> db -> from('provincia');

        if(empty($filtro)==FALSE){
            $this -> db -> like('ProvinciaDescripcion', $filtro);
        }
        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        //echo $this -> db ->last_query();
        return $query;
    }

    public function get_provincia ($idProvincia)
    {
        $this -> db -> select('*');
        $this -> db -> from('provincia');
        $this -> db -> where('idProvincia', $idProvincia);
        $this -> db -> limit(1);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function new_provincia($idProvincia, $ProvinciaDescripcion)
    {
        $data = array(
            'idProvincia'  =>$idProvincia,
            'ProvinciaDescripcion' =>$ProvinciaDescripcion
        );
        $this -> db -> insert('provincia', $data);
    }

    public function set_provincia($idProvincia, $ProvinciaDescripcion)
    {
        $data = array(
            'ProvinciaDescripcion' =>$ProvinciaDescripcion
        );
        $this -> db -> where('idProvincia', $idProvincia);
        $this -> db -> update('provincia', $data);
    }

    public function delete_provincia ($idProvincia)
    {
        $this->db->where('idProvincia', $idProvincia);
        $this->db->delete('provincia');

    }

    public function record_count() {
        $this->db->select('*');
        $this->db->from('provincia');
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }
}