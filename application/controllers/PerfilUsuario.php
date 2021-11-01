<?php
/**
 * Created by PhpStorm.
 * User: smuguerza
 * Date: 26/06/2017
 * Time: 08:08 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class PerfilUsuario extends CI_Controller
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
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata('usuid')){
            $data['grupos'] = $this->MY_Grupo->get_all();
            $data['usuario']= $this->MY_Usuario->get_usuario($_SESSION['usuid']);
            $data['titulo'] = 'Mi Perfil';
            $contenido      = 'perfilusuario/usuario.php';
            $template       = $_SESSION['grutem'];
            $this->$template-> display($contenido, $data);
        }else{
            redirect(base_url());
        }
    }

    public function confirmar()
    {
        $usuid          = $this->input->post('usuid');
        $usupass        = $this->input->post('usupass');
        $usuleg         = trim($this->input->post('usuleg'));
        $usunom         = trim($this->input->post('usunom'));
        $usuape         = trim($this->input->post('usuape'));
        $usumai         = trim($this->input->post('usumai'));

        //$query      = $this->MY_Seguridad->processLogin($usuario,$password);
        //$this->form_validation->set_rules('usuario', 'Usuario', 'required|callback_validateUser[' . $query->num_rows() . ']');

        $this->form_validation->set_rules('confirmusupass', 'Confirmnacion Contraseña', 'required');
        $this->form_validation->set_rules('usupass', 'Contraseña', 'required|matches[confirmusupass]');

        $this->form_validation->set_rules('usumai', 'Email', 'required|valid_email|max_length[45]');
        $this->form_validation->set_rules('usuleg', 'Legajo', 'required|max_length[15]');
        $this->form_validation->set_rules('usunom', 'Nombre', 'required|max_length[45]');
        $this->form_validation->set_rules('usuape', 'Apellido', 'required|max_length[45]');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_message('required', 'Requiere %s');

        $data['titulo'] = 'Mi Perfil';
        $data['grupos'] = $this->MY_Grupo->get_all();
        $data['usuario']= $this->MY_Usuario->get_usuario($_SESSION['usuid']);

        if ($this->form_validation->run() == FALSE)
        {
            $contenido      = 'perfilusuario/usuario.php';
            $template       = $_SESSION['grutem'];
            $this->$template-> display($contenido, $data);
        }
        else
        {
            $this->MY_Usuario->update_perfilusuario($usuid, $usupass, $usuleg, $usunom, $usuape, $usumai);
            $this->session->set_flashdata('success', 'Se Actualizo con Exito');
            redirect(base_url() . "inicio");
        }

    }

    public function validatePass($confirmusupass){
        /*
        if ($confirmusupass === $usupass){
            return TRUE;
        }else{
            $this->form_validation->set_message('confirmusupass', '%s las Contraseñas No Coinciden');
            return FALSE;
        }
        */
    }



  
}
