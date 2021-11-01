<?php
/**
 * Created by PhpStorm.
 * User: smuguerza
 * Date: 25/11/2019
 * Time: 7:55 AM
 */
class Templatesuperusuario{

    protected $_ci;

    function __construct(){

        $this->_ci=&get_instance();

    }

    function display($contenido, $data=null){
        $data['_content']=$this->_ci->load->view($contenido, $data,true);

        $this->_ci->load->view('templatesuperusuario.php',$data);
    }

    function display_error( $contenido, $data=null){

        $data['_content']=$this->_ci->load->view($contenido, $data,true);

        $this->_ci->load->view('template_error.php',$data);
    }


}
?>
