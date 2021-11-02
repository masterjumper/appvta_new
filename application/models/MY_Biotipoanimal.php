<?php

Class MY_Biotipoanimal extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all ()
    {
        $this -> db -> select('*');
        $this -> db -> from('biotipoanimal');
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get_biotipoanimal_filtro ($filtro, $limit, $start)
    {
        $this -> db -> select('*');
        $this -> db -> from('biotipoanimal');

        if(empty($filtro)==FALSE){
            $this -> db -> like('BiotipoAnimalDescripcion', $filtro);
        }
        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        //echo $this -> db ->last_query();
        return $query;
    }

    public function get_biotipoanimal ($idBiotipoAnimal)
    {
        $this -> db -> select('*');
        $this -> db -> from('biotipoanimal');
        $this -> db -> where('idBiotipoAnimal', $idBiotipoAnimal);
        $this -> db -> limit(1);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function new_biotipoanimal($idBiotipoAnimal, $BiotipoAnimalDescripcion)
    {
        $data = array(
            'idBiotipoAnimal'  =>$idBiotipoAnimal,
            'BiotipoAnimalDescripcion' =>$BiotipoAnimalDescripcion
        );
        $this -> db -> insert('biotipoanimal', $data);
    }

    public function set_biotipoanimal($idBiotipoAnimal, $BiotipoAnimalDescripcion)
    {
        $data = array(
            'BiotipoAnimalDescripcion' =>$BiotipoAnimalDescripcion
        );
        $this -> db -> where('idBiotipoAnimal', $idBiotipoAnimal);
        $this -> db -> update('biotipoanimal', $data);
    }

    public function delete_biotipoanimal ($idBiotipoAnimal)
    {
        $this->db->where('idBiotipoAnimal', $idBiotipoAnimal);
        $this->db->delete('biotipoanimal');

    }

    public function record_count() {
        $this->db->select('*');
        $this->db->from('biotipoanimal');
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }
}