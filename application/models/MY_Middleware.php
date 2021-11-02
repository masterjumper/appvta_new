<?php

Class MY_Middleware extends CI_Model
{
    public function __construct()
    {
        $this->controller->load->library('session');
    }

    public function index ()
    {
        if($this->session->userdata('usuid')) {
            return;
        }else{
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }


}