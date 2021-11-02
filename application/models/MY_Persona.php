<?php

Class MY_Persona extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all ()
    {
        $this -> db -> select('*');
        $this -> db -> from('persona');
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get_persona_filtro ($filtro, $limit, $start)
    {
        $this -> db -> select('*');
        $this -> db -> from('persona');

        if(empty($filtro)==FALSE){
            $this -> db -> like('Nombre', $filtro);
            $this -> db -> or_like('Apellido', $filtro);
            $this -> db -> or_like('mail', $filtro);
            $this -> db -> or_like('WP', $filtro);
        }
        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        //echo $this -> db ->last_query();
        return $query;
    }

    public function get_persona ($idPersona)
    {
        $this -> db -> select('*');
        $this -> db -> from('persona');
        $this -> db -> where('idPersona', $idPersona);
        $this -> db -> limit(1);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function new_persona($idPersona, $Nombre, $Apellido, $mail, $WP)
    {
        $data = array(
            'idPersona'  =>$idPersona,
            'Nombre' =>$Nombre,
            'Apellido' =>$Apellido,
            'mail' =>$mail,
            'WP' =>$WP
        );
        $this -> db -> insert('persona', $data);
    }

    public function set_persona($idPersona, $Nombre, $Apellido, $mail, $WP)
    {
        $data = array(
            'Nombre' =>$Nombre,
            'Apellido' =>$Apellido,
            'mail' =>$mail,
            'WP' =>$WP
        );
        $this -> db -> where('idPersona', $idPersona);
        $this -> db -> update('persona', $data);
    }

    public function delete_persona ($idPersona)
    {
        $this->db->where('idPersona', $idPersona);
        $this->db->delete('persona');

    }

    public function record_count() {
        $this->db->select('*');
        $this->db->from('persona');
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }
}