<?php

Class MY_Localidad extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all ()
    {
        $this -> db -> select('*');
        $this -> db -> from('localidad');
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get_localidad_filtro ($filtro, $limit, $start)
    {
        $this -> db -> select('L.*, P.ProvinciaDescripcion');
        $this -> db -> from('localidad L');
        $this -> db -> join('provincia P', 'L.Provincia_idProvincia = P.idProvincia');
        if(empty($filtro)==FALSE){
            $this -> db->group_start();
            $this -> db -> like('L.LocalidadDescripcion', $filtro);
            $this -> db -> or_like('P.ProvinciaDescripcion', $filtro);
            $this -> db->group_end();
        }

        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        //echo $this -> db ->last_query();
        return $query;
    }

    public function get_localidad ($idLocalidad)
    {
        $this -> db -> select('*');
        $this -> db -> from('localidad');
        $this -> db -> where('idLocalidad', $idLocalidad);
        $this -> db -> limit(1);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function new_localidad($idLocalidad, $LocalidadDescripcion,$idProvincia, $LocalidadLatitud, $LocalidadLongitud )
    {
        $data = array(
            'idLocalidad'           =>$idLocalidad,
            'LocalidadDescripcion'  =>$LocalidadDescripcion,
            'Provincia_idProvincia' =>$idProvincia,
            'LocalidadLatitud'      =>$LocalidadLatitud,
            'LocalidadLongitud'     =>$LocalidadLongitud
        );
        $this -> db -> insert('localidad', $data);
    }

    public function set_localidad($idLocalidad, $LocalidadDescripcion, $idProvincia, $LocalidadLatitud, $LocalidadLongitud )
    {

        $data = array(
            'LocalidadDescripcion'  =>$LocalidadDescripcion,
            'Provincia_idProvincia' =>$idProvincia,
            'LocalidadLatitud'      =>$LocalidadLatitud,
            'LocalidadLongitud'     =>$LocalidadLongitud
        );
        $this -> db -> where('idLocalidad', $idLocalidad);
        $this -> db -> update('localidad', $data);
    }

    public function delete_localidad ($idLocalidad)
    {
        $this->db->where('idLocalidad', $idLocalidad);
        $this->db->delete('localidad');

    }

    public function record_count() {
        $this->db->select('*');
        $this->db->from('localidad');
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }
}