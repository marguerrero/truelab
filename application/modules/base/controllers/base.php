<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Base extends MX_Controller {
    public function index($module = "", $action = "", $param = ""){
        $session_data = $this->session->all_userdata();
        if(!$session_data['username'])
            redirect('/index.php/login/');
        $access_type = $session_data['access_type'];
        $access = array();
        switch ($access_type) {
            case 'superadmin':
                $role = "Super Admin";
                $access = array(
                    'add_customer' => "",
                    'edit_customer' => "",
                    'rad_tech' => "",
                    'med_tech' => ""
                );
                break;
            case 'user':
                $role = "User";
                $access = array(
                    'add_customer' => "",
                    'edit_customer' => "",
                    'rad_tech' => "hidden",
                    'med_tech' => "hidden"
                );
                break;
            case 'rad_tech':
                $role = "Rad Tech";
                $access = array(
                    'add_customer' => "hidden",
                    'edit_customer' => "hidden",
                    'rad_tech' => "",
                    'med_tech' => "hidden"
                );
                break;
            case 'med_tech':
                $role = "Med Tech";
                $access = array(
                    'add_customer' => "hidden",
                    'edit_customer' => "hidden",
                    'rad_tech' => "hidden",
                    'med_tech' => ""
                );
                break;
            default:
                # code...
                break;
        }
        $username = $session_data['username'];
        $dir = "$module/$module/$action";
        $retval = array(
            'location' => $dir,
            'param' => $param,
            'username' => $username,
            'access' => $access,
            'role' => $role
        );
        
        $this->load->view('base', $retval);
    }
}