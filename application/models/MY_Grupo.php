<?php

Class MY_Grupo extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all ()
    {
        $this -> db -> select('*');
        $this -> db -> from('grupo');
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get_grupo ($gruid)
    {
        $this -> db -> select('*');
        $this -> db -> from('grupo');
        $this -> db -> where('gruid', $gruid);
        $this -> db -> limit(1);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function new_grupo($gruid, $grudsc, $grutem)
    {
        $data = array(
            'gruid'  =>$gruid,
            'grudsc' =>$grudsc,
            'grutem' =>$grutem
        );
        $this -> db -> insert('grupo', $data);
    }

    public function set_grupo($gruid, $grudsc, $grutem )
    {
        $data = array(
            'grudsc' =>$grudsc,
            'grutem' =>$grutem,
        );
        $this -> db -> where('gruid', $gruid);
        $this -> db -> update('grupo', $data);
    }

    public function delete_grupo ($gruid)
    {
        $this->db->where('gruid', $gruid);
        $this->db->delete('grupo');

    }

    public function record_count() {
        $this->db->select('*');
        $this->db->from('grupo');
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }

    public function get_grupo_filtro ($filtro, $limit, $start)
    {
        $this -> db -> select('*');
        $this -> db -> from('grupo');

        if(empty($filtro)==FALSE){
            $this -> db -> like('grudsc', $filtro);
            $this -> db -> or_like('grutem', $filtro);
        }
        
        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        return $query;
    }

/*
    public function get_usuario ($usu_user)
    {
        $this -> db -> select('*');
        $this -> db -> from('usuarios');
        $this -> db -> where('username', $usu_user);        
        $this->  db -> limit(1);
        $query = $this -> db ->get()->result();
        return $query;
    }

    public function get_rol_usuario ($usu_user)
    {
        $this -> db -> select('idrolusr');
        $this -> db -> from('userxrol');
        $this -> db -> where('iduser', $usu_user);
        $this->db->order_by('idrolusr', 'asc');
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get_usuario_all ($limit, $start)
    {
        $this -> db -> select('*');
        $this -> db -> from('usuarios');        
        //$this->  db -> limit(1);
        $this -> db -> order_by('username', 'asc');
        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get_usuario_filtro ($filtro_username, $filtro_nombre, $filtro_apellido, $filtro_estado, $limit, $start)
    {
        $this -> db -> select('*');
        $this -> db -> from('usuarios');

        if(empty($filtro_username)==FALSE){
            $this -> db -> where('username', $filtro_username);
        }
        if(empty($filtro_nombre)== FALSE){
            $this -> db -> like('nombre', $filtro_nombre);
        }
        if(empty($filtro_apellido)== FALSE){
            $this -> db -> like('apellido', $filtro_apellido);
        }
        if($filtro_estado <> 'a'){
            $this -> db -> where('activo', $filtro_estado);
        }
        $this -> db -> order_by('username');
        $this -> db -> where('estab', '2035');
        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get_usuario_by_username ($usu_user)
    {
        $this -> db -> select('*');
        $this -> db -> from('usuarios');
        $this -> db -> where('username', $usu_user);
        $this -> db -> where('estab', '2035');
        $this->  db -> limit(1);
        $query = $this -> db ->get()->row();
        return $query;
    }

    public function set_usuario_update ($username, $nombre, $apellido, $estado)
    {
        $datos= array(
            'nombre'=>$nombre,
            'apellido'=>$apellido,
            'activo'=>$estado,
            'estab'=>'2035'
        );
        $this -> db -> where('username', $username);
        $this -> db -> update('usuarios', $datos);        
    }

    public function set_usuario_update_estado($username, $estado)
    {
        $datos= array(
            'activo'=>$estado,
        );
        $this -> db -> where('username', $username);
        $this -> db -> update('usuarios', $datos);
    }

    public function get_usuario_estado ($usu_user)
    {
        $this -> db -> select('activo');
        $this -> db -> from('usuarios');
        $this -> db -> where('username', $usu_user);
        $this->  db -> limit(1);
        $query = $this -> db ->get() -> row('activo');
        return $query;
    }

    public function record_count() {
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->order_by('username', 'ASC');
            $consulta = $this->db->get();
            return $consulta->num_rows();
        }

    public function save_usuario($username, $password, $nombre, $apellido, $dirmail, $estado) {
        $data = array(
            'username'          => $username,
            'password'          => $password,
            'nombre'            => $nombre,
            'apellido'          => $apellido,
            'dirmail'           => $dirmail,
            'activo'            => $estado,
//codigo duro
            'estab'             => 2035,
            'descestab'         => 'Hughes',
            'iphost'            => '',
            'razonbloq'         => null,
            'cambiopass'        => 'FALSE',
            'intentosfallidos'  => 0,
            'validalocal'       => 'TRUE',
            'ultimaent'         => null,
        );
        $this->db->insert('usuarios', $data);
    }

    public function save_userxrol($username) {
        $data = array(
            'iduser'    => $username,
            'idrolusr'  => 9,
        );
        $this->db->insert('userxrol', $data);
    }

    public function update_usuario($username, $password, $nombre, $apellido, $dirmail, $estado) {
        $data = array(
            'password'          => $password,
            'nombre'            => $nombre,
            'apellido'          => $apellido,
            'dirmail'           => $dirmail,
            'activo'            => $estado,
        );
        $this->db->where('username', $username);
        $this->db->update('usuarios', $data);
    }
*/
}