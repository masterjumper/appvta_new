<?php
/**
 * Created by PhpStorm.
 * User: smuguerza
 * Date: 31/01/2017
 * Time: 01:46 PM
 */
Class MY_Usuario extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_filtro ($filtro, $estado, $limit, $start)
    {
        $this -> db -> select('U.*, G.grudsc');
        $this -> db -> from('usuario U');
        $this -> db -> join('grupo G', 'G.gruid = U.gruid');

        if(empty($filtro)==FALSE){
            $this -> db->group_start();
            $this -> db -> like('U.usuuser', $filtro);
            $this -> db -> or_like('U.usuleg', $filtro);
            $this -> db -> or_like('U.usunom', $filtro);
            $this -> db -> or_like('U.usuape', $filtro);
            $this -> db -> or_like('G.grudsc', $filtro);
            $this -> db->group_end();
        }

        if($estado == '2' || $estado == '1'){$this -> db -> where('usuest', $estado);}
        if($estado == '3'){$this->db->not_like('usuest', $estado);}

        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        //echo $this -> db ->last_query();
        return $query;
    }

    public function get_usuario ($usuid)
    {
        $this -> db -> select('usuario.*, grupo.*');
        $this -> db -> from('usuario, grupo');
        $this -> db -> where('usuario.usuid', $usuid);
        $this -> db -> where('usuario.gruid = grupo.gruid');
        $this -> db -> limit(1);
        $query = $this->db->get()-> result();
        return $query;
    }

    public function new_usuario($usuid, $usuuser, $usupass, $usuleg, $usunom, $usuape, $usumai, $gruid, $usuest)
    {//, $tarid
        $data = array(
            'usuid'     =>$usuid,
            'usuuser'   =>$usuuser,
            'usupass'   =>$usupass,
            'usuleg'    =>$usuleg,
            'usunom'    =>$usunom,
            'usuape'    =>$usuape,
            'usumai'    =>$usumai,
            'gruid'     =>$gruid,
            'usuest'    =>$usuest
            //'tarid'     =>$tarid
        );
        $this -> db -> insert('usuario', $data);
    }

    public function get_usuario_all($limit, $start)
    {
        $this -> db -> select('*.usuario, *.grupo');
        $this -> db -> from('usuario, grupo,');
        $this -> db -> where('usuario.gruid = grupo.gruid');
        $this -> db -> limit($limit, $start);
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function record_count()
    {
        $this -> db -> select('*');
        $this -> db -> from('usuario');
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }

    public function save_usuario($username, $password, $usuleg, $nombre, $apellido, $dirmail, $gruid, $usuest) {//,  $tarid, $usuidjer
        $data = array(
            'usuuser'   => $username,
            'usupass'   => $password,
            'usuleg'    => $usuleg,
            'usunom'    => $nombre,
            'usuape'    => $apellido,
            'usumai'    => $dirmail,
            'gruid'     => $gruid,
            'usuest'    => $usuest
            //'tarid'     => $tarid,
            //'usuidjer'  => $usuidjer,
        );
        $this->db->insert('usuarios', $data);
    }

    public function update_usuario($usuid, $usupass,$usuleg, $usunom, $usuape, $usumai, $gruid, $usuest) {//, $tarid, $usuidjer
        $data = array(
            'usupass' => $usupass,
            'usuleg' => $usuleg,
            'usunom'  => $usunom,
            'usuape'  => $usuape,
            'usumai'  => $usumai,
            'gruid'   => $gruid,
            'usuest'  => $usuest
            //'tarid'   => $tarid,
            //'usuidjer'=> $usuidjer,
        );
        $this->db->where('usuid', $usuid);
        $this->db->update('usuario', $data);
    }

    public function delete_usuario($usuid){
        $this->db->where('usuid', $usuid);
        $this->db->delete('usuario');
    }

    public function get_usuest($usuid)
    {
        $this -> db -> select('usuest');
        $this -> db -> from('usuario');
        $this -> db -> where('usuid', $usuid);
        $query = $this -> db -> get() ->row('usuest');
        return $query;
    }

    public function set_usuest($usuid, $usuest)
    {
        $data = array(
            'usuest' =>$usuest
        );
        $this -> db -> where('usuid', $usuid);
        $this -> db -> update('usuario', $data);
    }

    public function get_all_habilitado ()
    {
        $this -> db -> select('*');
        $this -> db -> from('usuario');
        $this -> db -> where('usuest', '1');
        $query = $this -> db ->get() -> result();
        return $query;
    }

    public function get_usupre($usuid)
    {
        $this -> db -> select('usupre');
        $this -> db ->from('usuario');
        $this->db->where('usuid', $usuid);
        $query = $this -> db -> get() ->row('usupre');
        return $query;
    }

    public function set_usupre($usuid, $usupre)
    {
        $data = array(
            'usupre' =>$usupre
        );
        $this -> db -> where('usuid', $usuid);
        $this -> db -> update('usuario', $data);
    }

                                        
    public function update_perfilusuario($usuid, $usupass, $usuleg, $usunom, $usuape, $usumai) {
        $data = array(
            'usupass' => $usupass,
            'usuleg'  => $usuleg,
            'usunom'  => $usunom,
            'usuape'  => $usuape,
            'usumai'  => $usumai
        );
        $this->db->where('usuid', $usuid);
        $this->db->update('usuario', $data);
    }

    public function get_perfilusuario ($usuid)
    {
        $this -> db -> select('usuario.*, grupo.*');
        $this -> db -> from('usuario, grupo');
        $this -> db -> where('usuario.usuid', $usuid);
        $this -> db -> where('usuario.secfabid = sectorfabrica.secfabid');
        $this -> db -> limit(1);
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_usuario_by_usuid ($usuid)
    {
        $this -> db -> select('usuario.*, grupo.*');
        $this -> db -> from('usuario, grupo');
        $this -> db -> where('usuario.usuid', $usuid);
        $this -> db -> where('usuario.gruid = grupo.gruid');
        $this -> db -> limit(1);
        $query = $this->db->get()->result();
        return $query;
    }

}