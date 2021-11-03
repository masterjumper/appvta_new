<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *        http://example.com/index.php/welcome
	 *    - or -
	 *        http://example.com/index.php/welcome/index
	 *    - or -
	 * Since this controller is set as the default controller in
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
		$data['productos']             		= $this -> MY_Producto ->get_producto_filtro($filtro, $config["per_page"], $page);
        $data['links']                      = $this->pagination->create_links();
        $data['titulo']                     = '<i class="fa fa-barcode" style="font-size: 24px">&nbsp;</i>'.' Productos';
        $contenido                          = 'producto/grilla_producto.php';
        $template                           = $_SESSION['grutem'];
        $this->$template-> display($contenido, $data);		
		//$data['producto'] 	= $this->MY_Producto->get_all();
		//$data['caj_dol'] 	= $this->MY_Caja->get_caj_dol();	
	}

	public function update($proid)
	{
		$data['titulo'] = 'Producto';
		$data['producto'] = $this->MY_Producto->get_pro_all($proid);
		$contenido = 'producto/producto.php';
		//$data['NotificacionesPendientes']   = 1;
		$this->templatesuper->display($contenido, $data);
	}

	public function save()
	{
		$proid = $this->input->post('proid');
		$procodbar = $this->input->post('procodbar');
		$prodsc = $this->input->post('prodsc');
		$proimp = $this->input->post('proimp');
		$this->MY_Producto->set_pro($proid, $procodbar, $prodsc, $proimp);
		$this->index();
	}

	public function save_new()
	{
		$procodbar = $this->input->post('procodbar');
		$prodsc = $this->input->post('prodsc');
		$proimp = $this->input->post('proimp');
		$proid = $this->MY_Ultimos_Numeros->get_Ultimo_Numero('producto');
		$this->MY_Producto->save_new($proid, $procodbar, $prodsc, $proimp);
		$proid = $proid + 1;
		$this->MY_Ultimos_Numeros->update_Ultimo_Numero('producto', $proid);
		$this->index();
	}

	public function new_producto()
	{
		$data['titulo'] = 'Producto';
		$contenido = 'producto/new_producto.php';
		//$data['NotificacionesPendientes']   = 1;
		$this->templatesuper->display($contenido, $data);
	}

	public function delete($proid)
	{
		$this->MY_Producto->delete_pro($proid);
		$this->index();
	}

	public function filtro (){
		$data['titulo'] 	= 'Producto';
		$filtro_procodbar   = $this->input->post('filtro_procodbar');
		$filtro_prodsc      = $this->input->post('filtro_prodsc');
		$data['caj_dol'] 	= $this->MY_Caja->get_caj_dol();
		$data['producto']	= $this->MY_Producto->get_producto_filtro($filtro_procodbar, $filtro_prodsc);
		$contenido = 'producto/grilla_producto.php';
		$this->templatesuper->display($contenido, $data);
	}

}
