<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biotipoanimal extends CI_Controller
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
        $this->load->model('MY_Biotipoanimal');
        $this->load->model('MY_Seguridad');
        $this->load->model('MY_Ultimos_Numeros');
    }

    public function predeterminado()
    {
        $_SESSION['per_page'] = 7;
        redirect(base_url()."biotipoanimal");
    }

    public function porpagina($porpagina)
    {
        $_SESSION['per_page'] = $porpagina;
        redirect(base_url()."biotipoanimal");
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

        $config["base_url"]         = base_url()."biotipoanimal/index/";
        $config["total_rows"]       = $this->MY_Biotipoanimal->record_count();
        $total_rows                 = $this->MY_Biotipoanimal->record_count();

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
        $data['biotipoanimales']            = $this -> MY_Biotipoanimal ->get_biotipoanimal_filtro($filtro, $config["per_page"], $page);
        $data['links']                      = $this->pagination->create_links();
        $data['titulo']                     = '<i class="fa fa-bullseye" style="font-size: 24px">&nbsp;</i>'.' Biotipo Animal';
        $contenido                          = 'biotipoanimal/grilla_biotipoanimal.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function update($idBiotipoAnimal)
    {
        $_SESSION['breadcumb']              = 'update';
        $_SESSION['current_page']           = $this->uri->segment(3);
        $data['biotipoanimal']                 = $this->MY_Biotipoanimal->get_biotipoanimal($idBiotipoAnimal);
        $data['titulo']				 		= '<i class="fa fa-bullseye" style="font-size: 24px">&nbsp;</i>'.'Biotipo Animal';
        $contenido 	                        = 'biotipoanimal/biotipoanimal.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function new_biotipoanimal()
    {
        $_SESSION['breadcumb']              = 'new';
        $data['titulo']				 		= '<i class="fa fa-bullseye" style="font-size: 24px">&nbsp;</i>'.'Nuevo Biotipo Animal';
        $contenido 	                        = 'biotipoanimal/new_biotipoanimal.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function save(){

        $this->form_validation->set_rules('BiotipoAnimalDescripcion', 'Biotipo Animal', 'required|max_length[45]');

        if ($this->form_validation->run() == FALSE)
        {
            if($_SESSION['breadcumb'] === 'new'){
                $data['titulo']				 		= '<i class="fa fa-bullseye" style="font-size: 24px">&nbsp;</i>'.'Nuevo Biotipo Animal';
                $contenido 	                        = 'biotipoanimal/new_biotipoanimal.php';
                $template                           = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }else{
                $idBiotipoAnimal                = $this->input->post('idBiotipoAnimal');
                $_SESSION['current_page']           = $this->uri->segment(3);
                $data['biotipoanimal']              = $this->MY_Biotipoanimal->get_biotipoanimal($idBiotipoAnimal);
                $data['titulo']				 		= '<i class="fa fa-bullseye" style="font-size: 24px">&nbsp;</i>'.'Biotipo Animal';
                $contenido 	                        = 'biotipoanimal/biotipoanimal.php';
                $template                           = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }
        }
        else
        {
            if($_SESSION['breadcumb'] === 'new'){
                $idBiotipoAnimal            = $this->MY_Ultimos_Numeros->get_Ultimo_Numero('biotipoanimal');
                $BiotipoAnimalDescripcion   = $this->input->post('BiotipoAnimalDescripcion');
                $data['biotipoanimal']      = $this->MY_Biotipoanimal->new_biotipoanimal($idBiotipoAnimal, $BiotipoAnimalDescripcion);
                $idBiotipoAnimal            = $idBiotipoAnimal + 1;
                $this->MY_Ultimos_Numeros->update_Ultimo_Numero('biotipoanimal', $idBiotipoAnimal);
                $this->session->set_flashdata('success', 'Se Agrego con Exito');
                redirect(base_url()."biotipoanimal");
            }else{
                $idBiotipoAnimal            = $this->input->post('idBiotipoAnimal');
                $BiotipoAnimalDescripcion   = $this->input->post('BiotipoAnimalDescripcion');
                $data['biotipoanimal']  = $this -> MY_Biotipoanimal ->set_biotipoanimal($idBiotipoAnimal, $BiotipoAnimalDescripcion);
                $this->session->set_flashdata('success', 'Se Actualizo con Exito');
                redirect(base_url()."biotipoanimal");
            }
        }
    }

    public function borrar($idBiotipoAnimal)
    {
        $this->session->set_flashdata('delete', $idBiotipoAnimal);
        redirect(base_url()."biotipoanimal");
    }

    public function delete($idBiotipoAnimal)
    {
        $this -> MY_Biotipoanimal ->delete_biotipoanimal($idBiotipoAnimal);
        redirect(base_url()."biotipoanimal");
    }

}