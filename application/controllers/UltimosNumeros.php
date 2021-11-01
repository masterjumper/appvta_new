<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UltimosNumeros extends CI_Controller {

	function __construct()

	{
		parent::__construct();
		$this->load->model('MY_Ultimos_Numeros');	
	}

	public function index()
	{		
		$data['ultimo_numero']          	= $this -> MY_Ultimos_Numeros ->get_All_Ultimos_Numeros();
		$data['titulo']  					= 'Ultimos Numeros';
		$contenido 							= 'ultimos_numeros/grilla_ultimo_numero.php';
		$template                           = $_SESSION['grutem'];
		$this->$template-> display($contenido, $data);
	}

	public function new_ultimos_numeros()
	{			
		$data['titulo']				 		= 'Ultimos Numeros';
		$contenido 	                        = 'ultimos_numeros/new_ultimo_numero.php';
		//$data['NotificacionesPendientes']   = 1;
		$template                           = $_SESSION['grutem'];
		$this->$template-> display($contenido, $data);
	}

	public function save_new()
	{
		$ultnrodsc 	= $this->input->post('ultnrodsc');
		$ultnroval 	= $this->input->post('ultnroval');
		$ultnroid  	= $this->MY_Ultimos_Numeros->get_last_Ultimos_Numeros();
		$ultnroid 	= $ultnroid + 1;
		$this->MY_Ultimos_Numeros->save_new($ultnroid,  $ultnrodsc, $ultnroval);
		$this->index();
	}

	public function update($ultnroid)
	{		
		$data['titulo']				 		= 'Ultimos Numeros';
		$data['ultimo_numero']			= $this->MY_Ultimos_Numeros->get_ult_all($ultnroid);
		$contenido 	                        = 'ultimos_numeros/ultimo_numero.php';
		//$data['NotificacionesPendientes']   = 1;
		$template                           = $_SESSION['grutem'];
		$this->$template-> display($contenido, $data);
	}

	public function save()
	{
		$ultnroid 	= $this->input->post('ultnroid');
		$ultnrodsc  = $this->input->post('ultnrodsc');
		$ultnroval  = $this->input->post('ultnroval');
		$this -> MY_Ultimos_Numeros->set_ult($ultnroid,  $ultnrodsc, $ultnroval);
		$this -> index();
	}

	public function delete($ultnroid)
	{
		$this->MY_Ultimos_Numeros->delete_ult($ultnroid);
		$this->index();
	}


}

?>
