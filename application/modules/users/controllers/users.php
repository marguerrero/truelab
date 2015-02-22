<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Users extends MX_Controller {
    public function index()
    {
        // $this->load->view('users_view');
    }

    public function add(){
        $module = "users";
        $action = "_add";
        echo modules::run('base/base/index', $module, $action);
    }

    public function _add(){
        $this->load->view('add_customer/index');
    }

    public function review(){
        $module = "users";
        $action = "_review";
        echo modules::run('base/base/index', $module, $action);
    }

    public function _review(){
        $this->load->view('review_customer/index');
    }
}
 