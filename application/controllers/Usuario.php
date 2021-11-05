<?php
/**
 * Created by PhpStorm.
 * User: smuguerza
 * Date: 26/06/2017
 * Time: 08:08 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller
{
    /**
     * Created by PhpStorm.
     * User: smuguerza
     * Date: 22/05/2017
     * Time: 05:59 AM
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('MY_Ultimos_Numeros');
        $this->load->model('MY_Usuario');
        $this->load->model('MY_Grupo');
        //$this->load->model('MY_Tarifa');
    }

    public function predeterminado()
    {
        $_SESSION['per_page'] = 7;
        redirect(base_url()."usuario");
    }

    public function porpagina($porpagina)
    {
        $_SESSION['per_page'] = $porpagina;
        redirect(base_url()."usuario");
    }

    public function index()
    {
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item prev"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['full_tag_close']   = '</ul>';

        $config["total_rows"]       = $this->MY_Usuario->record_count();
        $total_rows                 = $this->MY_Usuario->record_count();

        if($_SESSION['per_page'] == 0){
            $_SESSION['per_page']   = $total_rows;
        }

        $config['per_page']         = $_SESSION['per_page'];

        $config["uri_segment"]      = 3;
        $config['num_links']        = 20;

        $this->pagination->initialize($config);
        $segment                    = $this->uri->segment(3);
        if ($total_rows >= $segment){
            if($this->uri->segment(3)){
                $page = ($this->uri->segment(3)) ;
            }else {
                $page = 0;
            }
        }else {$page = 0;}
        
        $filtro                             = $this->input->post('filtro');
        $estado                             = $this->input->post('estado');
        
        $data['usuarios']                   = $this->MY_Usuario->get_all_filtro($filtro, $estado, $config["per_page"], $page);
        $data['links']                      = $this->pagination->create_links();
        $data['titulo']                     = '<i class="fa fa-user" style="font-size: 24px">&nbsp;</i>'.' Usuarios';
        $data['estado']                     = $estado;
        $contenido                          = 'usuario/usuarios_grilla.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function delete($usuid)
    {
        $this->MY_Usuario->delete_usuario($usuid);
        redirect(base_url() . "index.php?/Usuario/index/".$_SESSION['current_page']);
    }

    public function update($usuid)
    {
        $_SESSION['current_page']           = $this->uri->segment(3);
        $data['grupos']                     = $this->MY_Grupo->get_all();
        $data['usuario']                    = $this->MY_Usuario->get_usuario($usuid);
        $data['titulo']				 		= '<i class="fa fa-user" style="font-size: 24px">&nbsp;</i>'.' Usuario';
        $contenido                          = 'usuario/usuario.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function save()
    {
        $usuid      = $this->input->post('usuid');
        $usupass    = $this->input->post('usupass');        
        $usunom     = trim($this->input->post('usunom'));
        $usuape     = trim($this->input->post('usuape'));
        $usumai     = trim($this->input->post('usumai'));
        $gruid      = $this->input->post('gruid');
        $usuest     = $this->input->post('usuest');

        $this->MY_Usuario->update_usuario($usuid, $usupass, $usunom, $usuape, $usumai, $gruid, $usuest);
        $data['titulo'] = 'Usuario';

        $this->session->set_flashdata('success', 'Se Actualizo con Exito');
        redirect(base_url() . "index.php?/Usuario/index/".$_SESSION['current_page']);
    }

    public function new_usuario(){

        $data['grupos']                     = $this->MY_Grupo->get_all();
        $data['titulo']				 		= '<i class="fa fa-user" style="font-size: 24px">&nbsp;</i>'.'Nuevo Usuario';
        $contenido                          = 'usuario/new_usuario.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function save_new(){
        $usuid      = $this->MY_Ultimos_Numeros->get_Ultimo_Numero('usuario');
        $usuuser    = $this->input->post('usuuser');
        $usupass    = $this->input->post('usupass');
        
        $usunom     = $this->input->post('usunom');
        $usuape     = $this->input->post('usuape');
        $usumai     = $this->input->post('usumai');
        $gruid      = $this->input->post('gruid');
        $usuest     = $this->input->post('usuest');

        //$this->MY_Usuario->new_usuario($usuid,$usuuser, $usupass, $usuleg, $usunom, $usuape, $usumai, $gruid, $usuest, $tarid, $usuidjer);
        $this->MY_Usuario->new_usuario($usuid,$usuuser, $usupass, $usunom, $usuape, $usumai, $gruid, $usuest);
        $usuid      = $usuid + 1;
        $this->MY_Ultimos_Numeros->update_Ultimo_Numero('usuario', $usuid);

        $this->session->set_flashdata('success', 'Se Guardo con Exito');
        redirect(base_url()."usuario");
    }

    public function usuario_modifica_estado($usuid)
    {
        $estado = $this -> MY_Usuario->get_usuest($usuid);
        if($estado == 1){
            $est = 0;
        }
        else {
            $est = 1;
        }
        $this -> MY_Usuario->set_usuest($usuid, $est);
        redirect(base_url() . "index.php?/Usuario/index/".$_SESSION['current_page']);
    }

    public function borrar($usuid)
    {
        $this->session->set_flashdata('delete', $usuid);
        redirect(base_url()."usuario");
    }

}
