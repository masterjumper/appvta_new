<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol extends CI_Controller
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
        $this->load->model('MY_Rol');
        $this->load->model('MY_Seguridad');
        $this->load->model('MY_Ultimos_Numeros');
    }

    public function predeterminado()
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['per_page'] = 7;
            redirect(base_url() . "rol");
        }else{
            redirect(base_url());
        }
    }

    public function porpagina($porpagina)
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['per_page'] = $porpagina;
            redirect(base_url() . "rol");
        }else{
            redirect(base_url());
        }

    }

    public function index()
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['breadcumb'] = 'index';
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
            $config['full_tag_close'] = '</ul>';

            $config["base_url"] = base_url() . "rol/index/";
            $config["total_rows"] = $this->MY_Rol->record_count();
            $total_rows = $this->MY_Rol->record_count();

            if ($_SESSION['per_page'] == 0) {
                $_SESSION['per_page'] = $total_rows;
            }
            $config['per_page'] = $_SESSION['per_page'];

            $config["uri_segment"] = 3;
            $config['num_links'] = 20;

            $this->pagination->initialize($config);
            $segment = $this->uri->segment(3);

            if ($total_rows >= $segment) {
                if ($this->uri->segment(3)) {
                    $page = ($this->uri->segment(3));
                } else {
                    $page = 0;
                }
            } else {
                $page = 0;
            }
            $filtro = $this->input->post('filtro');
            $_SESSION['current_page'] = $page;
            $data['roles'] = $this->MY_Rol->get_rol_filtro($filtro, $config["per_page"], $page);
            $data['links'] = $this->pagination->create_links();
            $data['titulo'] = '<i class="fa fa-asterisk" style="font-size: 24px">&nbsp;</i>' . ' Roles';
            $contenido = 'rol/grilla_rol.php';
            $template = $_SESSION['grutem'];
            $this->$template->display($contenido, $data);
        }else{
            redirect(base_url());
        }
    }

    public function update($idRol)
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['breadcumb'] = 'update';
            $_SESSION['current_page'] = $this->uri->segment(3);
            $data['rol'] = $this->MY_Rol->get_rol($idRol);
            $data['provincias'] = $this->MY_Rol->get_all();
            $data['titulo'] = '<i class="fa fa-asterisk" style="font-size: 24px">&nbsp;</i>' . 'Rol';
            $contenido = 'rol/rol.php';
            $template = $_SESSION['grutem'];
            $this->$template->display($contenido, $data);
        }else{
            redirect(base_url());
        }
    }

    public function new_rol()
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['breadcumb'] = 'new';
            $data['titulo'] = '<i class="fa fa-asterisk" style="font-size: 24px">&nbsp;</i>' . 'Nueva Rol';
            $data['roles'] = $this->MY_Rol->get_all();
            $contenido = 'rol/new_rol.php';
            $template = $_SESSION['grutem'];
            $this->$template->display($contenido, $data);
        }else{
            redirect(base_url());
        }
    }


    public function save(){

        $this->form_validation->set_rules('RolDescripcion', 'rol', 'required|max_length[45]');

        if ($this->form_validation->run() == FALSE)
        {
            if($_SESSION['breadcumb'] === 'new'){
                $data['titulo']				= '<i class="fa fa-asterisk" style="font-size: 24px">&nbsp;</i>'.'Nueva Rol';
                $contenido 	                = 'rol/new_rol.php';
                $template                   = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }else{
                $idRol                = $this->input->post('idRol');
                $_SESSION['current_page']   = $this->uri->segment(3);
                $data['rol']          = $this->MY_Rol->get_rol($idRol);
                $data['titulo']				= '<i class="fa fa-asterisk" style="font-size: 24px">&nbsp;</i>'.'Rol';
                $contenido 	                = 'rol/rol.php';
                $template                   = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }
        }
        else
        {
            if($_SESSION['breadcumb'] === 'new'){
                $idRol            = $this->MY_Ultimos_Numeros->get_Ultimo_Numero('rol');
                $RolDescripcion   = $this->input->post('RolDescripcion');

                $data['rol']      = $this->MY_Rol->new_rol($idRol, $RolDescripcion);
                $idRol            = $idRol + 1;
                $this->MY_Ultimos_Numeros->update_Ultimo_Numero('rol', $idRol);
                $this->session->set_flashdata('success', 'Se Agrego con Exito');
                redirect(base_url()."rol");
            }else{
                $idRol            = $this->input->post('idRol');
                $RolDescripcion   = $this->input->post('RolDescripcion');
                $data['rol']      = $this -> MY_Rol ->set_rol($idRol, $RolDescripcion);
                $this->session->set_flashdata('success', 'Se Actualizo con Exito');
                redirect(base_url()."rol");
            }

        }
    }

    public function borrar($idRol)
    {
        if($this->session->userdata('usuid')) {
            $this->session->set_flashdata('delete', $idRol);
            redirect(base_url() . "rol");
        }else{
            redirect(base_url());
        }
    }

    public function delete($idRol)
    {
        $this -> MY_Rol ->delete_rol($idRol);
        redirect(base_url()."rol");
    }

}