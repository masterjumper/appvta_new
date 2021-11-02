<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provincia extends CI_Controller
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
        $this->load->model('MY_Provincia');
        $this->load->model('MY_Seguridad');
        $this->load->model('MY_Ultimos_Numeros');
    }

    public function predeterminado()
    {
        $_SESSION['per_page'] = 7;
        redirect(base_url()."provincia");
    }

    public function porpagina($porpagina)
    {
        $_SESSION['per_page'] = $porpagina;
        redirect(base_url()."provincia");
    }

    public function index()
    {
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
        $config['full_tag_close']   = '</ul>';

        $config["base_url"]         = base_url()."provincia/index/";
        $config["total_rows"]       = $this->MY_Provincia->record_count();
        $total_rows                 = $this->MY_Provincia->record_count();

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
        $_SESSION['current_page']           = $page;
        $data['provincias']             = $this -> MY_Provincia ->get_provincia_filtro($filtro, $config["per_page"], $page);
        $data['links']                      = $this->pagination->create_links();
        $data['titulo']                     = '<i class="fa fa-flag-o" style="font-size: 24px">&nbsp;</i>'.' Provincias';
        $contenido                          = 'provincia/grilla_provincia.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function update($idProvincia)
    {
        $_SESSION['breadcumb']              = 'update';
        $_SESSION['current_page']           = $this->uri->segment(3);
        $data['provincia']               = $this->MY_Provincia->get_provincia($idProvincia);
        $data['titulo']				 		= '<i class="fa fa-flag-o" style="font-size: 24px">&nbsp;</i>'.'Provincia';
        $contenido 	                        = 'provincia/provincia.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function new_provincia()
    {
        $_SESSION['breadcumb']              = 'new';
        $data['titulo']				 		= '<i class="fa fa-flag-o" style="font-size: 24px">&nbsp;</i>'.'Nuevo Provincia';
        $contenido 	                        = 'provincia/new_provincia.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function save(){

        $this->form_validation->set_rules('ProvinciaDescripcion', 'Provincia', 'required|max_length[45]');

        if ($this->form_validation->run() == FALSE)
        {
            if($_SESSION['breadcumb'] === 'new'){
                $data['titulo']				 		= '<i class="fa fa-flag-o" style="font-size: 24px">&nbsp;</i>'.'Nuevo Provincia';
                $contenido 	                        = 'provincia/new_provincia.php';
                $template                           = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }else{
                $idProvincia                     = $this->input->post('idProvincia');
                $_SESSION['current_page']           = $this->uri->segment(3);
                $data['provincia']               = $this->MY_Provincia->get_provincia($idProvincia);
                $data['titulo']				 		= '<i class="fa fa-flag-o" style="font-size: 24px">&nbsp;</i>'.'Provincia';
                $contenido 	                        = 'provincia/provincia.php';
                $template                           = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }
        }
        else
        {
            if($_SESSION['breadcumb'] === 'new'){
                $idProvincia            = $this->MY_Ultimos_Numeros->get_Ultimo_Numero('provincia');
                $ProvinciaDescripcion   = $this->input->post('ProvinciaDescripcion');
                $data['provincia']  = $this->MY_Provincia->new_provincia($idProvincia, $ProvinciaDescripcion);
                $idProvincia            = $idProvincia + 1;
                $this->MY_Ultimos_Numeros->update_Ultimo_Numero('provincia', $idProvincia);
                $this->session->set_flashdata('success', 'Se Agrego con Exito');
                redirect(base_url()."provincia");

            }else{
                $idProvincia            = $this->input->post('idProvincia');
                $ProvinciaDescripcion   = $this->input->post('ProvinciaDescripcion');
                $data['provincia']  = $this -> MY_Provincia ->set_provincia($idProvincia, $ProvinciaDescripcion);
                $this->session->set_flashdata('success', 'Se Actualizo con Exito');
                redirect(base_url()."provincia");
            }

        }
    }

    public function borrar($idProvincia)
    {
        $this->session->set_flashdata('delete', $idProvincia);
        redirect(base_url()."provincia");
    }

    public function delete($idProvincia)
    {
        $this -> MY_Provincia ->delete_provincia($idProvincia);
        redirect(base_url()."provincia");
    }

}