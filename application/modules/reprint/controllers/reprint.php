<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reprint extends MX_Controller {

    public function index(){
        $module = "reprint";
        $action = "_index";
        echo modules::run('base/base/index', $module, $action);
    }

    public function _index(){
        $retval = array();
        $this->load->view('reprint/index', $retval);
    }

    public function reprintSelection($cust_id = ""){
        $module = "reprint";
        $action = "_reprintSelection";
        $param = array('cust_id' => $cust_id);
        echo modules::run('base/base/index', $module, $action, $param);
    }

    public function _reprintSelection($param = array()){
        if(!$param)
            redirect('index.php/reprint/');

        $msg_info = "The selected customer doesn't have a existing results records";
        try{
            $cust_id = $param['cust_id'];
            $session_data = $this->session->all_userdata();

            $config = array('cust_id' => $cust_id);
            $this->load->library('CustomerService', $config);
            $check = $this->customerservice->generateServices();

            $data = array();
            if($check){
                $data = $this->customerservice->getServices();
                $msg_info = "Please double check the list of results to be reprinted before submitting.";
            }
        } catch (Exception $e){

        }

        
        $retval = array(
                'data' => $data,
                'allowed' => ($check) ? "" : "hidden" ,
                'msg' => $msg_info,
                'status' => ($check) ? "warning" : "danger"
            );
        // echo '<pre>';
        // print_r($retval);
        // die();
        $this->load->view('reprint/service_selection', $retval);
    }
}