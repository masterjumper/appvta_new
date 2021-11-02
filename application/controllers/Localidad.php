<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localidad extends CI_Controller
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
        $this->load->model('MY_Localidad');
        $this->load->model('MY_Provincia');
        $this->load->model('MY_Seguridad');
        $this->load->model('MY_Ultimos_Numeros');
    }

    public function predeterminado()
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['per_page'] = 7;
            redirect(base_url() . "localidad");
        }else{
            redirect(base_url());
        }
    }

    public function porpagina($porpagina)
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['per_page'] = $porpagina;
            redirect(base_url() . "localidad");
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

            $config["base_url"] = base_url() . "localidad/index/";
            $config["total_rows"] = $this->MY_Localidad->record_count();
            $total_rows = $this->MY_Localidad->record_count();

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
            $data['localidades'] = $this->MY_Localidad->get_localidad_filtro($filtro, $config["per_page"], $page);
            $data['links'] = $this->pagination->create_links();
            $data['titulo'] = '<i class="fa fa-location-arrow" style="font-size: 24px">&nbsp;</i>' . ' Localidades';
            $contenido = 'localidad/grilla_localidad.php';
            $template = $_SESSION['grutem'];
            $this->$template->display($contenido, $data);
        }else{
            redirect(base_url());
        }
    }

    public function update($idLocalidad)
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['breadcumb'] = 'update';
            $_SESSION['current_page'] = $this->uri->segment(3);
            $data['localidad'] = $this->MY_Localidad->get_localidad($idLocalidad);
            $data['provincias'] = $this->MY_Provincia->get_all();
            $data['titulo'] = '<i class="fa fa-location-arrow" style="font-size: 24px">&nbsp;</i>' . 'Localidad';
            $contenido = 'localidad/localidad.php';
            $template = $_SESSION['grutem'];
            $this->$template->display($contenido, $data);
        }else{
            redirect(base_url());
        }
    }

    public function new_localidad()
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['breadcumb'] = 'new';
            $data['titulo'] = '<i class="fa fa-location-arrow" style="font-size: 24px">&nbsp;</i>' . 'Nueva Localidad';
            $data['provincias'] = $this->MY_Provincia->get_all();
            $contenido = 'localidad/new_localidad.php';
            $template = $_SESSION['grutem'];
            $this->$template->display($contenido, $data);
        }else{
            redirect(base_url());
        }
    }


    public function save(){

        $this->form_validation->set_rules('LocalidadDescripcion', 'localidad', 'required|max_length[45]');
        $this->form_validation->set_rules('LocalidadLatitud', 'localidad', 'required|max_length[45]');
        $this->form_validation->set_rules('LocalidadLongitud', 'localidad', 'required|max_length[45]');

        if ($this->form_validation->run() == FALSE)
        {
            if($_SESSION['breadcumb'] === 'new'){
                $data['titulo']				= '<i class="fa fa-location-arrow" style="font-size: 24px">&nbsp;</i>'.'Nueva Localidad';
                $contenido 	                = 'localidad/new_localidad.php';
                $template                   = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }else{
                $idLocalidad                = $this->input->post('idLocalidad');
                $_SESSION['current_page']   = $this->uri->segment(3);
                $data['localidad']          = $this->MY_Localidad->get_localidad($idLocalidad);
                $data['titulo']				= '<i class="fa fa-location-arrow" style="font-size: 24px">&nbsp;</i>'.'Localidad';
                $contenido 	                = 'localidad/localidad.php';
                $template                   = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }
        }
        else
        {
            if($_SESSION['breadcumb'] === 'new'){
                $idLocalidad            = $this->MY_Ultimos_Numeros->get_Ultimo_Numero('localidad');
                $idProvincia            = $this->input->post('idProvincia');
                $LocalidadDescripcion   = $this->input->post('LocalidadDescripcion');
                $LocalidadLatitud       = $this->input->post('LocalidadLatitud');
                $LocalidadLongitud      = $this->input->post('LocalidadLongitud');

                $data['localidad']      = $this->MY_Localidad->new_localidad($idLocalidad, $LocalidadDescripcion, $idProvincia, $LocalidadLatitud, $LocalidadLongitud);
                $idLocalidad            = $idLocalidad + 1;
                $this->MY_Ultimos_Numeros->update_Ultimo_Numero('localidad', $idLocalidad);
                $this->session->set_flashdata('success', 'Se Agrego con Exito');
                redirect(base_url()."localidad");
            }else{
                $idLocalidad            = $this->input->post('idLocalidad');
                $LocalidadDescripcion   = $this->input->post('LocalidadDescripcion');
                $idProvincia            = $this->input->post('idProvincia');
                $LocalidadLatitud       = $this->input->post('LocalidadLatitud');
                $LocalidadLongitud      = $this->input->post('LocalidadLongitud');
                $data['localidad']      = $this -> MY_Localidad ->set_localidad($idLocalidad, $LocalidadDescripcion, $idProvincia, $LocalidadLatitud, $LocalidadLongitud);
                $this->session->set_flashdata('success', 'Se Actualizo con Exito');
                redirect(base_url()."localidad");
            }

        }
    }

    public function borrar($idLocalidad)
    {
        if($this->session->userdata('usuid')) {
            $this->session->set_flashdata('delete', $idLocalidad);
            redirect(base_url() . "localidad");
        }else{
            redirect(base_url());
        }
    }

    public function delete($idLocalidad)
    {
        $this -> MY_Localidad ->delete_localidad($idLocalidad);
        redirect(base_url()."localidad");
    }

}