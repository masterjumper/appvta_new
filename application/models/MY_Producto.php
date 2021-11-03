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

   
    public function get_producto_filtro ($filtro, $limit, $start)
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

    public function get_producto ($idproducto)
    {
        $this -> db -> select('*');
        $this -> db -> from('producto');
        $this -> db -> where('idproducto', $idproducto);
        $this -> db -> limit(1);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function new_producto($idproducto, $productoDescripcion)
    {
        $data = array(
            'idproducto'  =>$idproducto,
            'productoDescripcion' =>$productoDescripcion
        );
        $this -> db -> insert('producto', $data);
    }

    public function set_producto($idproducto, $productoDescripcion)
    {
        $data = array(
            'productoDescripcion' =>$productoDescripcion
        );
        $this -> db -> where('idproducto', $idproducto);
        $this -> db -> update('producto', $data);
    }

    public function delete_producto ($idproducto)
    {
        $this->db->where('idproducto', $idproducto);
        $this->db->delete('producto');

    }

    public function record_count() {
        $this->db->select('*');
        $this->db->from('producto');
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }
}