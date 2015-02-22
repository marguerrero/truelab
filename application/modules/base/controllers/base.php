<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Base extends MX_Controller {
    public function index($module = "", $action = ""){
        $dir = "$module/$module/$action";
        $this->load->view('base', array('location' => $dir));
    }
}