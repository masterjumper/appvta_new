<?php

Class MY_Producto extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all()
    {
        $this -> db -> select('*');
        $this -> db ->from('producto');
        $query = $this -> db -> get() ->result();
        return $query;
    }

   
    public function filtro ($filtro, $limit, $start)
    {
        $this -> db -> select('*');
        $this -> db -> from('producto');

        if(empty($filtro)==FALSE){
            $this -> db->group_start();
            $this -> db -> like('procodbar', $filtro);
            $this -> db -> or_like('prodsc', $filtro);
            $this -> db->group_end();
        }
        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get ($proid)
    {
        $this -> db -> select('*');
        $this -> db -> from('producto');
        $this -> db -> where('proid', $proid);
        $this -> db -> limit(1);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function save($proid, $procodbar, $prodsc, $proimp)
    {
        $data = array(
            'proid'  =>$proid,
            'procodbar'  =>$procodbar,
            'prodsc'  =>$prodsc,
            'proimp' =>$proimp
        );
        $this -> db -> insert('producto', $data);
    }

    public function set($proid, $procodbar, $prodsc, $proimp)
    {
        $data = array(
            'procodbar'  =>$procodbar,
            'prodsc'  =>$prodsc,
            'proimp' =>$proimp
        );
        $this -> db -> where('proid', $proid);
        $this -> db -> update('producto', $data);
    }

    public function delete ($proid)
    {
        $this->db->where('proid', $proid);
        $this->db->delete('producto');

    }

    public function record_count() {
        $this->db->select('*');
        $this->db->from('producto');
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }
}