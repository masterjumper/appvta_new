<?php

Class MY_Destino extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all ()
    {
        $this -> db -> select('*');
        $this -> db -> from('destino');
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get_destino_filtro ($filtro, $limit, $start)
    {
        $this -> db -> select('*');
        $this -> db -> from('destino');

        if(empty($filtro)==FALSE){
            $this -> db -> like('Destinodescripcion ', $filtro);
        }
        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        //echo $this -> db ->last_query();
        return $query;
    }

    public function get_destino ($idDestino)
    {
        $this -> db -> select('*');
        $this -> db -> from('destino');
        $this -> db -> where('idDestino', $idDestino);
        $this -> db -> limit(1);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function new_destino($idDestino, $Destinodescripcion )
    {
        $data = array(
            'idDestino'  =>$idDestino,
            'Destinodescripcion ' =>$Destinodescripcion 
        );
        $this -> db -> insert('destino', $data);
    }

    public function set_destino($idDestino, $Destinodescripcion )
    {

        $data = array(
            'Destinodescripcion ' =>$Destinodescripcion 
        );
        $this -> db -> where('idDestino', $idDestino);
        $this -> db -> update('destino', $data);
    }

    public function delete_destino ($idDestino)
    {
        $this->db->where('idDestino', $idDestino);
        $this->db->delete('destino');

    }

    public function record_count() {
        $this->db->select('*');
        $this->db->from('destino');
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }
}