<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review_customer_info extends CI_Controller 
{
    public function index()
    {
        $this->load_view('index');
    }

    private function load_view($view)
    {
        $template_dir = 'review_customer_info/';
        $this->load->view($template_dir . $view);
    }
}