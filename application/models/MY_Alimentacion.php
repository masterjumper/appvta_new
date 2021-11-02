<?php

Class MY_Alimentacion extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all ()
    {
        $this -> db -> select('*');
        $this -> db -> from('alimentacion');
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get_alimentacion_filtro ($filtro, $limit, $start)
    {
        $this -> db -> select('*');
        $this -> db -> from('alimentacion');

        if(empty($filtro)==FALSE){
            $this -> db -> like('AlimentacionDescripcion', $filtro);
        }
        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        //echo $this -> db ->last_query();
        return $query;
    }

    public function get_alimentacion ($idAlimentacion)
    {
        $this -> db -> select('*');
        $this -> db -> from('alimentacion');
        $this -> db -> where('idAlimentacion', $idAlimentacion);
        $this -> db -> limit(1);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function new_alimentacion($idAlimentacion, $AlimentacionDescripcion)
    {
        $data = array(
            'idAlimentacion'  =>$idAlimentacion,
            'AlimentacionDescripcion' =>$AlimentacionDescripcion
        );
        $this -> db -> insert('alimentacion', $data);
    }

    public function set_alimentacion($idAlimentacion, $AlimentacionDescripcion)
    {

        $data = array(
            'AlimentacionDescripcion' =>$AlimentacionDescripcion
        );
        $this -> db -> where('idAlimentacion', $idAlimentacion);
        $this -> db -> update('alimentacion', $data);
    }

    public function delete_alimentacion ($idAlimentacion)
    {
        $this->db->where('idAlimentacion', $idAlimentacion);
        $this->db->delete('alimentacion');

    }

    public function record_count() {
        $this->db->select('*');
        $this->db->from('alimentacion');
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }
}