<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller
{

	/**
	 * Index Page for this contproductoler.
	 *
	 * Maps to the following URL
	 *        http://example.com/index.php/welcome
	 *    - or -
	 *        http://example.com/index.php/welcome/index
	 *    - or -
	 * Since this contproductoler is set as the default contproductoler in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->model('MY_Producto');
		$this->load->model('MY_Ultimos_Numeros');
		//$this->load->model('MY_Caja');
	}

    public function predeterminado()
    {
        $_SESSION['per_page'] = 7;
        redirect(base_url()."producto");
    }

    public function porpagina($porpagina)
    {
        $_SESSION['per_page'] = $porpagina;
        redirect(base_url()."producto");
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

        $config["base_url"]         = base_url()."producto/index/";
        $config["total_rows"]       = $this->MY_Producto->record_count();
        $total_rows                 = $this->MY_Producto->record_count();

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
		$data['productos']             		= $this -> MY_Producto ->filtro($filtro, $config["per_page"], $page);
        $data['links']                      = $this->pagination->create_links();
        $data['titulo']                     = '<i class="fa fa-barcode" style="font-size: 24px">&nbsp;</i>'.' Productos';
        $contenido                          = 'producto/grilla_producto.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);		

	}

	
	public function save()
	{
		
		$this->form_validation->set_rules('procodbar', 'producto', 'required|max_length[45]');
		$this->form_validation->set_rules('prodsc', 'producto', 'required|max_length[45]');
		$this->form_validation->set_rules('proimp', 'producto', 'required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            if($_SESSION['breadcumb'] === 'new'){
                $data['titulo']             = '<i class="fa fa-barcode" style="font-size: 24px">&nbsp;</i>'.' Productos';
                $contenido 	                = 'producto/new_producto.php';
                $template                   = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }else{
                $proid                		= $this->input->post('proid');
                $_SESSION['current_page']   = $this->uri->segment(3);
                $data['producto']          	= $this->MY_producto->get($proid);
                $data['titulo']             = '<i class="fa fa-barcode" style="font-size: 24px">&nbsp;</i>'.' Productos';
                $contenido 	                = 'producto/producto.php';
                $template                   = $_SESSION['grutem'];
                $this->$template-> display($contenido, $data);
            }
        }
        else
        {
            if($_SESSION['breadcumb'] === 'new'){
                $proid            	= $this->MY_Ultimos_Numeros->get_Ultimo_Numero('producto');
                $procodbar 			= $this->input->post('procodbar');
				$prodsc 			= $this->input->post('prodsc');
				$proimp 			= $this->input->post('proimp');
                $this->MY_Producto->save($proid, $procodbar, $prodsc, $proimp);
                $proid            	= $proid + 1;
                $this->MY_Ultimos_Numeros->update_Ultimo_Numero('producto', $proid);
                $this->session->set_flashdata('success', 'Se Agrego con Exito');
                redirect(base_url()."producto");
            }else{
                $proid 		= $this->input->post('proid');
				$procodbar 	= $this->input->post('procodbar');
				$prodsc 	= $this->input->post('prodsc');
				$proimp 	= $this->input->post('proimp');
				$this->MY_Producto->set($proid, $procodbar, $prodsc, $proimp);
                $this->session->set_flashdata('success', 'Se Actualizo con Exito');
                redirect(base_url()."producto");
            }

        }
	}

 	public function borrar($proid)
    {   
		if($this->session->userdata('usuid')) {
            $this->session->set_flashdata('delete', $proid);
            redirect(base_url() . "producto");
        }else{
            redirect(base_url());
        }
    }

	public function delete($proid)
    {
        $this -> MY_Producto ->delete($proid);
        redirect(base_url()."producto");
    }

    public function update($proid)
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['breadcumb'] = 'update';
            $_SESSION['current_page'] = $this->uri->segment(3);
            $data['producto'] = $this->MY_Producto->get($proid);            
            $data['titulo']                     = '<i class="fa fa-barcode" style="font-size: 24px">&nbsp;</i>'.' Productos';
            $contenido = 'producto/producto.php';
            $template = $_SESSION['grutem'];
            $this->$template->display($contenido, $data);
        }else{
            redirect(base_url());
        }
    }

	public function new_producto()
    {
        if($this->session->userdata('usuid')) {
            $_SESSION['breadcumb'] = 'new';
            $data['titulo']        = '<i class="fa fa-barcode" style="font-size: 24px">&nbsp;</i>'.'Nuevo Producto';            
            $contenido = 'producto/new_producto.php';
            $template = $_SESSION['grutem'];
            $this->$template->display($contenido, $data);
        }else{
            redirect(base_url());
        }
    }

	
}
