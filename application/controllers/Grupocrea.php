<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grupocrea extends CI_Controller
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
        $this->load->model('MY_Grupocrea');
        $this->load->model('MY_Seguridad');
        $this->load->model('MY_Ultimos_Numeros');
    }

    public function predeterminado()
    {
        $_SESSION['per_page'] = 7;
        redirect(base_url()."grupocrea");
    }

    public function porpagina($porpagina)
    {
        $_SESSION['per_page'] = $porpagina;
        redirect(base_url()."grupocrea");
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

        $config["base_url"]         = base_url()."grupocreacrea/index/";
        $config["total_rows"]       = $this->MY_Grupocrea->record_count();
        $total_rows                 = $this->MY_Grupocrea->record_count();

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
        $data['gruposcrea']                 = $this -> MY_Grupocrea ->get_grupocrea_filtro($filtro, $config["per_page"], $page);
        $data['links']                      = $this->pagination->create_links();
        $data['titulo']                     = '<i class="fa fa-users" style="font-size: 24px">&nbsp;</i>'.' Grupos Crea';
        $contenido                          = 'grupocrea/grilla_grupocrea.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function update($idGrupoCREA)
    {
        $_SESSION['breadcumb']              = 'update';
        $_SESSION['current_page']           = $this->uri->segment(3);
        $data['grupocrea']                  = $this->MY_Grupocrea->get_grupocrea($idGrupoCREA);
        $data['titulo']				 		= '<i class="fa fa-users" style="font-size: 24px">&nbsp;</i>'.'Grupo Crea';
        $contenido 	                        = 'grupocrea/grupocrea.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function new_grupocrea()
    {
        $_SESSION['breadcumb']              = 'new';
        $data['titulo']				 		= '<i class="fa fa-users" style="font-size: 24px">&nbsp;</i>'.'Nuevo Grupo Crea';
        $contenido 	                        = 'grupocrea/new_grupocrea.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
    }

    public function save(){

        $this->form_validation->set_rules('GrupoCREADescripcion', 'Grupo CREA', 'required|max_length[45]');

        if ($this->form_validation->run() == FALSE)
        {
            //si hubo un error! chequea si es uno nuevo o una actualizacion
            if($_SESSION['breadcumb'] === 'new'){
                $_SESSION['breadcumb']              = 'new';
                $data['titulo']				 		= '<i class="fa fa-users" style="font-size: 24px">&nbsp;</i>'.'Nuevo Grupo Crea';
                $contenido 	                        = 'grupocrea/new_grupocrea.php';
                $template                           = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }else{
                $_SESSION['breadcumb']              = 'update';
                $_SESSION['current_page']           = $this->uri->segment(3);
                $idGrupoCREA                        = $this->input->post('idGrupoCREA');
                $data['grupocrea']                  = $this->MY_Grupocrea->get_grupocrea($idGrupoCREA);
                $data['titulo']				 		= '<i class="fa fa-users" style="font-size: 24px">&nbsp;</i>'.'Grupo Crea';
                $contenido 	                        = 'grupocrea/grupocrea.php';
                $template                           = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }
        }
        else
        {//si NO hubo error! chequea si es uno nuevo o una actualizacion
            if($_SESSION['breadcumb'] === 'new'){
                $idGrupoCREA            = $this->MY_Ultimos_Numeros->get_Ultimo_Numero('grupocrea');
                $GrupoCREADescripcion   = $this->input->post('GrupoCREADescripcion');
                $data['grupocrea']  = $this->MY_Grupocrea->new_grupocrea($idGrupoCREA, $GrupoCREADescripcion);
                $idGrupoCREA            = $idGrupoCREA + 1;
                $this->MY_Ultimos_Numeros->update_Ultimo_Numero('grupocrea', $idGrupoCREA);
                $this->session->set_flashdata('success', 'Se Agrego con Exito');
                redirect(base_url()."grupocrea");

            }else{
                $idGrupoCREA            = $this->input->post('idGrupoCREA');
                $GrupoCREADescripcion   = $this->input->post('GrupoCREADescripcion');
                $data['grupocrea']  = $this -> MY_Grupocrea ->set_grupocrea($idGrupoCREA, $GrupoCREADescripcion);
                $this->session->set_flashdata('success', 'Se Actualizo con Exito');
                redirect(base_url()."grupocrea");
            }
        }
    }


    public function borrar($idGrupoCREA)
    {
        $this->session->set_flashdata('delete', $idGrupoCREA);
        redirect(base_url()."grupocrea");
    }

    public function delete($idGrupoCREA)
    {
        $this -> MY_Grupocrea ->delete_grupocrea($idGrupoCREA);
        redirect(base_url()."grupocrea");
    }

}