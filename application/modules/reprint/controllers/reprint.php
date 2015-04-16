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
            $this->load->library('ReprintService', $config);
            $check = $this->reprintservice->generateServices();
            
            $data = array();
            if($check){
                $data = $this->reprintservice->getServices();
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
        
        $this->load->view('reprint/service_selection', $retval);
    }

    public function saveTransaction(){
        $cust_id = $this->input->post('cust_id');
        $services = $this->input->post('prev-service');
        $msg_info = "";
        $err_info = "";
        $receipt = "";
        try{
            $config = array(
                'cust_id' => 2,
                'services' => $services
            );
            $this->load->library('ReprintService', $config);
            $receipt = $this->reprintservice->cloneServices();
            if(!$receipt)
                throw new Exception("Please select at least 1 service", 1);
                
            $msg_info = "Transaction Successfully Saved";
        } 
        catch(Exception $e){
            $err_info = $e->getMessage();
        }
        
        $receipt_no = "test";
        $retval = array(
            'success' => true,
            'status' => ($msg_info) ? "success" : "failure",
            'msg' => ($msg_info) ? $msg_info : $err_info,
            'url_redirect' => base_url("/index.php/customer/review/$receipt")
        );
        echo json_encode($retval);
        return;
    }

    public function test(){
        $config = array(
            'cust_id' => 2,
            'services' => array(134,135)
        );
        $this->load->library('ReprintService', $config);
        $receipt = $this->reprintservice->cloneServices();
        echo '<pre>';
        print_r($receipt);
        die();

    }
}