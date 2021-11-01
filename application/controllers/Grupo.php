<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grupo extends CI_Controller
{
    /**
     * Created by PhpStorm.
     * User: smuguerza
     * Date: 22/05/2017
     * Time: 05:59 AM
     */
    //var $fechadesde = null;
    //var $fechahasta = null;


    function __construct()
    {
        parent::__construct();
        $this->load->model('MY_Grupo');
        $this->load->model('MY_Seguridad');
        $this->load->model('MY_Ultimos_Numeros');
    }

    public function predeterminado()
    {
        $_SESSION['per_page'] = 7;
        redirect(base_url()."grupo");
    }

    public function porpagina($porpagina)
    {
        $_SESSION['per_page'] = $porpagina;
        redirect(base_url()."grupo");
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

        $config["base_url"]         = base_url()."grupo/index/";
        $config["total_rows"]       = $this->MY_Grupo->record_count();
        $total_rows                 = $this->MY_Grupo->record_count();

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

        $_SESSION['current_page']           = $page;
        $data['grupos']                     = $this -> MY_Grupo ->get_grupo_filtro("", $config["per_page"], $page);
        $data['links']                      = $this->pagination->create_links();
        $data['titulo']                     = '<i class="fa fa-users" style="font-size: 24px">&nbsp;</i>'.' Grupos de Usuarios';
        $contenido                          = 'grupo/grilla_grupo.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function update($gruid)
    {
        $data['titulo']				 		= '<i class="fa fa-users" style="font-size: 24px">&nbsp;</i>'.'Grupo de Usuarios';
        $data['grupo']                      = $this->MY_Grupo->get_grupo($gruid);
        $contenido 	                        = 'grupo/grupo.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function new_grupo()

    {
        $data['titulo']				 		= '<i class="fa fa-users" style="font-size: 24px">&nbsp;</i>'.'Nuevo Grupo de Usuarios';
        $contenido 	                        = 'grupo/new_grupo.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function save_new()
    {
        $gruid          = $this->MY_Ultimos_Numeros->get_Ultimo_Numero('grupo');
        $grudsc         = $this->input->post('grudsc');
        $grutem         = $this->input->post('grutem');
        $data['grupo']  = $this->MY_Grupo->new_grupo($gruid, $grudsc, $grutem);
        $gruid          = $gruid + 1;
        $this->MY_Ultimos_Numeros->update_Ultimo_Numero('grupo', $gruid);

        $this->session->set_flashdata('success', 'Se Guardo con Exito');
        redirect(base_url()."grupo");
    }
    
    public function save()
    {
        $gruid          = $this->input->post('gruid');
        $grudsc         = $this->input->post('grudsc');
        $grutem         = $this->input->post('grutem');
        $data['grupo']  = $this -> MY_Grupo ->set_grupo($gruid, $grudsc, $grutem );
        $this->session->set_flashdata('success', 'Se Actualizo con Exito');
        redirect(base_url()."grupo");
    }

    public function borrar($gruid)
    {
        $this->session->set_flashdata('delete', $gruid);
        redirect(base_url()."grupo");
    }
    
    public function delete($gruid)
    {
        $this -> MY_Grupo ->delete_grupo($gruid);
        redirect(base_url()."grupo");
    }

    public function filtro()
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
        
        $config["base_url"]         = base_url()."grupo/index/";
        $config["total_rows"]       = $this->MY_Grupo->record_count();
        $total_rows                 = $this->MY_Grupo->record_count();
        $config["per_page"]         = 7;
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
        $data['grupos']                     = $this -> MY_Grupo ->get_grupo_filtro($filtro, $config["per_page"], $page);
        $data["links"]                      = $this->pagination->create_links();
        $data['titulo']                     = '<i class="fa fa-users" style="font-size: 24px">&nbsp;</i>'.' Grupos de Usuarios';
        $contenido                          = 'grupo/grilla_grupo.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

}