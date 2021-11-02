<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    /**
     * Created by PhpStorm.
     * User: smuguerza
     * Date: 30/04/2021
     * Time: 06:36 AM
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('MY_Seguridad');
        //$this->load->helper(array('url', 'html', 'form'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->session->sess_destroy();
        $this->load->view('login/login');
    }

    public function verificar()
    { echo 'entro?';  
        /*        
        $usuario    = $this->input->post('usuario');
        $password   = $this->input->post('password');
        //$query      = $this -> MY_Seguridad -> get_usuario_password($usuario);
        $query      = $this->MY_Seguridad->processLogin($usuario,$password);

        $this->form_validation->set_rules('usuario', 'Usuario', 'required|callback_validateUser[' . $query->num_rows() . ']');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');
       
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_message('required', 'Requiere %s');

        if ($this->form_validation->run() == FALSE) {
            //redirect(base_url());            
            $this->index();
        }else{
            $query = $this->MY_Seguridad-> get_usuario ($usuario);

            if($query){
             $user = array(
                'usuid'     => $query[0]->usuid,
                'usuario'   => $query[0]->usuuser,
                'usunom'    => $query[0]->usunom,
                'usuape'    => $query[0]->usuape,
                'gruid'     => $query[0]->gruid,
                'grutem'    => $query[0]->grutem,
                'per_page'  => 7);

                $this->session->set_userdata($user);

                $data['titulo']             = 'Inicio';
                $contenido                  = 'contenido/vacio.php';
                $template                   = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);                
            }            
        }
        */
        
/* 
        if (trim($query) == trim($password)) {
            //buscar programas del usuario
            //buscar las notificaciones
            $usuario_datos              = $this -> MY_Seguridad -> get_usuario($usuario);
            foreach($usuario_datos as $usudat){
                $_SESSION['usuid']   = $usudat->usuid;
                $_SESSION['usuario'] = $usuario;
                $_SESSION['usunom']  = $usudat->usunom;
                $_SESSION['usuape']  = $usudat->usuape;
                $_SESSION['gruid']   = $usudat->gruid;
                $_SESSION['grutem']  = trim($usudat->grutem);
              }
            //$_SESSION['NotPen']         = 0;
            //$data['notificaciones']     = 0;
            $data['titulo']             = 'Inicio';
            $contenido                  = 'contenido/vacio.php';
            $template                   = $_SESSION['grutem'];
            $template                           = $_SESSION['grutem'];
            $this->$template-> display($contenido, $data);

            }else {
                    $contenido          = 'errors/html/error_general.php';
                    $data['heading']    = 'Error de Acceso';
                    $data['message']    = 'Usuario y/o Contrseña Incorrectos';
                    $data['url_login']  = '/';
                    //$template           = $_SESSION['grutem'];
                    $this->templateforall->display_error($contenido, $data);
             } */
             
    }

    public function inicio()
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['NotPen']     = 0;
            $data['NotPen']         = $_SESSION['NotPen'];
            //$data['notificaciones'] = $this->MY_Notificacion->get_notificacion_by_usuid($_SESSION['usuid']);
            $data['titulo']         = '<i class="fa fa-home"></i>'.' Inicio';
            $contenido = 'contenido/vacio.php';
            $template                   = $_SESSION['grutem'];
            $this->$template-> display($contenido, $data);
            //$this->templateusuario_inicio->display($contenido, $data);
        }else{
            $this->session->sess_destroy();
            redirect(base_url());            
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
/*
    public function successpage(){
        $usuario_datos              = $this -> MY_Seguridad -> get_usuario($usuario);
        foreach($usuario_datos as $usudat){
            $_SESSION['usuid']   = $usudat->usuid;
            $_SESSION['usuario'] = $usuario;
            $_SESSION['usunom']  = $usudat->usunom;
            $_SESSION['usuape']  = $usudat->usuape;
            $_SESSION['gruid']   = $usudat->gruid;
            $_SESSION['grutem']  = trim($usudat->grutem);
            $_SESSION['per_page']= 7;
          }
        //$_SESSION['NotPen']         = 0;
        //$data['notificaciones']     = 0;
        $data['titulo']             = 'Inicio';
        $contenido                  = 'contenido/vacio.php';
        $template                   = $_SESSION['grutem'];
        $template                   = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);
       }
       */
       /** Custom Validation Method*/
        public function validateUser($userName,$recordCount){
            if ($recordCount != 0){
                return TRUE;
            }else{
                $this->form_validation->set_message('validateUser', '%s o Contraseña Invalido');
                return FALSE;
            }
        }
       }