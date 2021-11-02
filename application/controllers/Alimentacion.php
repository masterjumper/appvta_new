<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alimentacion extends CI_Controller
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
        $this->load->model('MY_Alimentacion');
        $this->load->model('MY_Seguridad');
        $this->load->model('MY_Ultimos_Numeros');
    }

    public function predeterminado()
    {
        $_SESSION['per_page'] = 7;
        redirect(base_url()."alimentacion");
    }

    public function porpagina($porpagina)
    {
        $_SESSION['per_page'] = $porpagina;
        redirect(base_url()."alimentacion");
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

        $config["base_url"]         = base_url()."alimentacion/index/";
        $config["total_rows"]       = $this->MY_Alimentacion->record_count();
        $total_rows                 = $this->MY_Alimentacion->record_count();

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
        $data['alimentaciones']             = $this -> MY_Alimentacion ->get_alimentacion_filtro($filtro, $config["per_page"], $page);
        $data['links']                      = $this->pagination->create_links();
        $data['titulo']                     = '<i class="fa fa-envira" style="font-size: 24px">&nbsp;</i>'.' Sistemas de Alimentacion';
        $contenido                          = 'alimentacion/grilla_alimentacion.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function update($idAlimentacion)
    {
        $_SESSION['breadcumb']              = 'update';
        $_SESSION['current_page']           = $this->uri->segment(3);
        $data['alimentacion']               = $this->MY_Alimentacion->get_alimentacion($idAlimentacion);
        $data['titulo']				 		= '<i class="fa fa-envira" style="font-size: 24px">&nbsp;</i>'.'Sistema de Alimentacion';
        $contenido 	                        = 'alimentacion/alimentacion.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function new_alimentacion()
    {
        $_SESSION['breadcumb']              = 'new';
        $data['titulo']				 		= '<i class="fa fa-envira" style="font-size: 24px">&nbsp;</i>'.'Nuevo Sistema de Alimentacion';
        $contenido 	                        = 'alimentacion/new_alimentacion.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function save(){

        $this->form_validation->set_rules('AlimentacionDescripcion', 'Sistema de Alimentacion', 'required|max_length[45]');

        if ($this->form_validation->run() == FALSE)
        {
            if($_SESSION['breadcumb'] === 'new'){
                $data['titulo']				 		= '<i class="fa fa-envira" style="font-size: 24px">&nbsp;</i>'.'Nuevo Sistema de Alimentacion';
                $contenido 	                        = 'alimentacion/new_alimentacion.php';
                $template                           = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }else{
                $idAlimentacion                     = $this->input->post('idAlimentacion');
                $_SESSION['current_page']           = $this->uri->segment(3);
                $data['alimentacion']               = $this->MY_Alimentacion->get_alimentacion($idAlimentacion);
                $data['titulo']				 		= '<i class="fa fa-envira" style="font-size: 24px">&nbsp;</i>'.'Sistema de Alimentacion';
                $contenido 	                        = 'alimentacion/alimentacion.php';
                $template                           = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }
        }
        else
        {
            if($_SESSION['breadcumb'] === 'new'){
                $idAlimentacion            = $this->MY_Ultimos_Numeros->get_Ultimo_Numero('alimentacion');
                $AlimentacionDescripcion   = $this->input->post('AlimentacionDescripcion');
                $data['alimentacion']  = $this->MY_Alimentacion->new_alimentacion($idAlimentacion, $AlimentacionDescripcion);
                $idAlimentacion            = $idAlimentacion + 1;
                $this->MY_Ultimos_Numeros->update_Ultimo_Numero('alimentacion', $idAlimentacion);
                $this->session->set_flashdata('success', 'Se Agrego con Exito');
                redirect(base_url()."alimentacion");

            }else{
                $idAlimentacion            = $this->input->post('idAlimentacion');
                $AlimentacionDescripcion   = $this->input->post('AlimentacionDescripcion');
                $data['alimentacion']  = $this -> MY_Alimentacion ->set_alimentacion($idAlimentacion, $AlimentacionDescripcion);
                $this->session->set_flashdata('success', 'Se Actualizo con Exito');
                redirect(base_url()."alimentacion");
            }

        }
    }

    public function borrar($idAlimentacion)
    {
        $this->session->set_flashdata('delete', $idAlimentacion);
        redirect(base_url()."alimentacion");
    }

    public function delete($idAlimentacion)
    {
        $this -> MY_Alimentacion ->delete_alimentacion($idAlimentacion);
        redirect(base_url()."alimentacion");
    }

}