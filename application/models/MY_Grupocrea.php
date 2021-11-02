<?php

Class MY_Grupocrea extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all ()
    {
        $this -> db -> select('*');
        $this -> db -> from('grupocrea');
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get_grupocrea_filtro ($filtro, $limit, $start)
    {
        $this -> db -> select('*');
        $this -> db -> from('grupocrea');

        if(empty($filtro)==FALSE){
            $this -> db -> like('GrupoCREADescripcion', $filtro);
        }
        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        //echo $this -> db ->last_query();
        return $query;
    }

    public function get_grupocrea ($idGrupoCREA)
    {
        $this -> db -> select('*');
        $this -> db -> from('grupocrea');
        $this -> db -> where('idGrupoCREA', $idGrupoCREA);
        $this -> db -> limit(1);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function new_grupocrea($idGrupoCREA, $GrupoCREADescripcion)
    {
        $data = array(
            'idGrupoCREA'  =>$idGrupoCREA,
            'GrupoCREADescripcion' =>$GrupoCREADescripcion
        );
        $this -> db -> insert('grupocrea', $data);
    }

    public function set_grupocrea($idGrupoCREA, $GrupoCREADescripcion)
    {

        $data = array(
            'GrupoCREADescripcion' =>$GrupoCREADescripcion
        );
        $this -> db -> where('idGrupoCREA', $idGrupoCREA);
        $this -> db -> update('grupocrea', $data);
    }

    public function delete_grupocrea ($idGrupoCREA)
    {
        $this->db->where('idGrupoCREA', $idGrupoCREA);
        $this->db->delete('grupocrea');

    }

    public function record_count() {
        $this->db->select('*');
        $this->db->from('grupocrea');
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }
}