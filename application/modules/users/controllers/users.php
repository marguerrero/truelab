<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Users extends MX_Controller {
    public function index()
    {
        // $this->load->view('users_view');
    }

    //--renders add custoemr page
    public function add(){
        $module = "users";
        $action = "_add";
        echo modules::run('base/base/index', $module, $action);
    }

    public function _add(){
        $this->load->view('add_customer/index');
    }

    //-- renders review page
    public function review(){
        $module = "users";
        $action = "_review";
        echo modules::run('base/base/index', $module, $action);
    }

    public function _review(){
        $this->load->view('review_customer/index');
    }

    /*************************
    * For ajax call actions
    *************************/
    public function saveCustomer(){

        $msg_info = "";
        $err_msg = "";
        $data = array();
        try {
            $input = $this->input;
            $firstname = $input->post('first-name');
            $lastname = $input->post('last-name');
            $gender = $input->post('gender');
            $customer = array(
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'sex' => $gender
                );
            
            
            $this->db->insert('cust_list', $customer);
            $msg_info = "Successfully saved";
        } catch(Exception $e){
            $err_msg = $e->getMessage();
        }

        $retval = array(
            'msg' => ($msg_info) ? $msg_info : $err_msg,
            'status' => ($msg_info) ? "success" : "failure"
        ); 
        echo json_encode($retval);
        die();
    }
}
 