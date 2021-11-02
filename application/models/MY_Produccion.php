<?php

Class MY_Produccion extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all ()
    {
        $this -> db -> select('*');
        $this -> db -> from('sistemaproduccion');
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get_sistemaproduccion_filtro ($filtro, $limit, $start)
    {
        $this -> db -> select('*');
        $this -> db -> from('sistemaproduccion');

        if(empty($filtro)==FALSE){
            $this -> db -> like('SistemaProduccionDescripcion', $filtro);
        }
        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        //echo $this -> db ->last_query();
        return $query;
    }

    public function get_sistemaproduccion ($idSistemaProduccion)
    {
        $this -> db -> select('*');
        $this -> db -> from('sistemaproduccion');
        $this -> db -> where('idSistemaProduccion', $idSistemaProduccion);
        $this -> db -> limit(1);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function new_sistemaproduccion($idSistemaProduccion, $SistemaProduccionDescripcion)
    {
        $data = array(
            'idSistemaProduccion'  =>$idSistemaProduccion,
            'SistemaProduccionDescripcion' =>$SistemaProduccionDescripcion
        );
        $this -> db -> insert('sistemaproduccion', $data);
    }

    public function set_sistemaproduccion($idSistemaProduccion, $SistemaProduccionDescripcion)
    {
        $data = array(
            'SistemaProduccionDescripcion' =>$SistemaProduccionDescripcion
        );
        $this -> db -> where('idSistemaProduccion', $idSistemaProduccion);
        $this -> db -> update('sistemaproduccion', $data);
    }

    public function delete_sistemaproduccion ($idSistemaProduccion)
    {
        $this->db->where('idSistemaProduccion', $idSistemaProduccion);
        $this->db->delete('sistemaproduccion');

    }

    public function record_count() {
        $this->db->select('*');
        $this->db->from('sistemaproduccion');
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }
}