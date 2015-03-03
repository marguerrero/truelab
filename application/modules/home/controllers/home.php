<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
    public function index(){
        $module = "home";
        $action = "_index";
        echo modules::run('base/base/index', $module, $action);
    }

    public function _index(){
        $this->load->view('home');
    }
}