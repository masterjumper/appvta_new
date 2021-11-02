<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller
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
        $this->load->model('MY_Persona');
        $this->load->model('MY_Seguridad');
        $this->load->model('MY_Ultimos_Numeros');
    }

    public function predeterminado()
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['per_page'] = 7;
            redirect(base_url() . "persona");
        }else{
            redirect(base_url());
        }
    }

    public function porpagina($porpagina)
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['per_page'] = $porpagina;
            redirect(base_url() . "persona");
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

            $config["base_url"] = base_url() . "persona/index/";
            $config["total_rows"] = $this->MY_Persona->record_count();
            $total_rows = $this->MY_Persona->record_count();

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
            $data['personas'] = $this->MY_Persona->get_persona_filtro($filtro, $config["per_page"], $page);
            $data['links'] = $this->pagination->create_links();
            $data['titulo'] = '<i class="fa fa-user" style="font-size: 24px">&nbsp;</i>' . ' Personas';
            $contenido = 'persona/grilla_persona.php';
            $template = $_SESSION['grutem'];
            $this->$template->display($contenido, $data);
        }else{
            redirect(base_url());
        }
    }

    public function update($idPersona)
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['breadcumb'] = 'update';
            $_SESSION['current_page'] = $this->uri->segment(3);
            $data['persona'] = $this->MY_Persona->get_persona($idPersona);
            $data['provincias'] = $this->MY_Persona->get_all();
            $data['titulo'] = '<i class="fa fa-user" style="font-size: 24px">&nbsp;</i>' . 'Persona';
            $contenido = 'persona/persona.php';
            $template = $_SESSION['grutem'];
            $this->$template->display($contenido, $data);
        }else{
            redirect(base_url());
        }
    }

    public function new_persona()
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['breadcumb'] = 'new';
            $data['titulo'] = '<i class="fa fa-user" style="font-size: 24px">&nbsp;</i>' . 'Nueva Persona';
            $data['personas'] = $this->MY_Persona->get_all();
            $contenido = 'persona/new_persona.php';
            $template = $_SESSION['grutem'];
            $this->$template->display($contenido, $data);
        }else{
            redirect(base_url());
        }
    }


    public function save(){

        $this->form_validation->set_rules('Nombre', 'nombre', 'required|max_length[45]');
        $this->form_validation->set_rules('Apellido', 'apellido', 'required|max_length[45]');
        $this->form_validation->set_rules('mail', 'Mail', 'max_length[45]|valid_email');
        $this->form_validation->set_rules('WP', 'Celular', 'max_length[13]|regex_match[/^[0-9]/]');

        if ($this->form_validation->run() == FALSE)
        {
            if($_SESSION['breadcumb'] === 'new'){
                $data['titulo']				= '<i class="fa fa-user" style="font-size: 24px">&nbsp;</i>'.'Nueva Persona';
                $contenido 	                = 'persona/new_persona.php';
                $template                   = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }else{
                $idPersona                = $this->input->post('idPersona');
                $_SESSION['current_page']   = $this->uri->segment(3);
                $data['persona']          = $this->MY_Persona->get_persona($idPersona);
                $data['titulo']				= '<i class="fa fa-user" style="font-size: 24px">&nbsp;</i>'.'Persona';
                $contenido 	                = 'persona/persona.php';
                $template                   = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }
        }
        else
        {
            if($_SESSION['breadcumb'] === 'new'){
                $idPersona  = $this->MY_Ultimos_Numeros->get_Ultimo_Numero('persona');
                $Nombre     = $this->input->post('Nombre');
                $Apellido   = $this->input->post('Apellido');
                $mail       = $this->input->post('mail');
                $WP         = $this->input->post('WP');

                $data['persona']      = $this->MY_Persona->new_persona($idPersona, $Nombre, $Apellido, $mail, $WP);
                $idPersona            = $idPersona + 1;
                $this->MY_Ultimos_Numeros->update_Ultimo_Numero('persona', $idPersona);
                $this->session->set_flashdata('success', 'Se Agrego con Exito');
                redirect(base_url()."persona");
            }else{
                $idPersona          = $this->input->post('idPersona');
                $Nombre             = $this->input->post('Nombre');
                $Apellido           = $this->input->post('Apellido');
                $mail               = $this->input->post('mail');
                $WP                 = $this->input->post('WP');
                $data['persona']    = $this -> MY_Persona ->set_persona($idPersona, $Nombre, $Apellido, $mail, $WP);
                $this->session->set_flashdata('success', 'Se Actualizo con Exito');
                redirect(base_url()."persona");
            }

        }
    }

    public function borrar($idPersona)
    {
        if($this->session->userdata('usuid')) {
            $this->session->set_flashdata('delete', $idPersona);
            redirect(base_url() . "persona");
        }else{
            redirect(base_url());
        }
    }

    public function delete($idPersona)
    {
        $this -> MY_Persona ->delete_persona($idPersona);
        redirect(base_url()."persona");
    }

}