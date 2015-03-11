<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medtech extends MX_Controller {

    /**************************************************
    * Default Customer Information Module Initialization
    **************************************************/

    public function index()
    {
        $module = "radtech";
        $action = "_index";
        echo modules::run('base/base/index', $module, $action);
    }

    public function _index(){
        $retval = array();
        $this->load->view('list_transaction/index', $retval);
    }

    public function service($service_id = ""){
        $param = array('service_id');
        $module = "medtech";
        $action = "_service";
        echo modules::run('base/base/index', $module, $action, $param);
    }

    public function _service($params = array()){
        $service_id = $params['service_id'];
        $retval = array();
        // $this->load->view('sputum/index', $retval);
        // $this->load->view('pregnancy/index', $retval);
        // $this->load->view('miscellaneous/index', $retval);
        // $this->load->view('hematology/index', $retval);
        // $this->load->view('hbsag/index', $retval);
        // $this->load->view('fecalysis/index', $retval);
        // $this->load->view('clinical_chemistry/index', $retval);
        $this->load->view('anti_hav/index', $retval);
    }

     public function loadSingleTransaction(){
        $receipt_no = $this->input->get('receipt_no');

        $msg_info = "";
        $err_info = "";
        $customer_info = array();
        $services = array();
        try {
            $sql = "
                SELECT 
                    bb.firstname,
                    bb.lastname,
                    bb.sex,
                    bb.bday,
                    aa.receipt_no,
                    aa.id,
                    aa.transdate
                FROM
                customer_transaction aa
                LEFT JOIN cust_list bb
                ON bb.service_id=aa.cust_id
                WHERE aa.receipt_no='$receipt_no'
                ORDER BY transdate DESC
            ";
            $query = $this->db->query($sql);
            $cust_info = $query->result()[0];
            $trans_id = $cust_info->id;
            $today = new Datetime();
            $bday = new Datetime($cust_info->bday);
            $interval = $today->diff($bday);
            $partial_age = $interval->format('%y');
            $age = floor($partial_age);
            $customer_info = array(
                'firstname' => $cust_info->firstname,
                'lastname' => $cust_info->lastname,
                'gender' => $cust_info->sex,
                'bday' => date('F d, Y', strtotime($cust_info->bday)),
                'age' => $age,
                'reference_no' => $cust_info->receipt_no,
                'transdate' => date('F d, Y', strtotime($cust_info->transdate))
            );

            $sql = "
                SELECT * FROM 
                customer_service aa
                LEFT JOIN subcat bb
                ON bb.sub_test_id=aa.subcat_id
                LEFT JOIN categ_main cc 
                ON cc.main_test_id=bb.main_test_id
                WHERE aa.trans_id='$trans_id'
            ";
            $query = $this->db->query($sql);

            foreach($query->result() as $key => $row){
                $services[] = array(
                    'category' => $row->category,
                    'service' => $row->subcateg,
                    'update' => "<a href='#'>Update</a>"
                );
            }
            
            $msg_info = "Successfully fetched";
        } catch(Exception $e){
            $err_info = $e->getMessage();
        }

        $retval = array(
            'customer_info' => $customer_info,
            'services' => $services,
            'msg' => ($msg_info) ? $msg_info : $err_info,
            'status' => ($msg_info) ? 'success' : 'failure'
        );
        echo json_encode($retval);
        return;
    }

    public function loadTransaction(){
        $sql = "
            SELECT 
                bb.firstname,
                bb.lastname,
                aa.receipt_no,
                (SELECT GROUP_CONCAT(subcateg) FROM customer_service a LEFT JOIN subcat b ON b.sub_test_id=a.subcat_id WHERE a.trans_id=aa.id) as services,
                aa.id
            FROM
            customer_transaction aa
            LEFT JOIN cust_list bb
            ON bb.service_id=aa.cust_id
            ORDER BY transdate DESC
        ";
        $query = $this->db->query($sql);
        
        foreach($query->result() as $key => $row){
            $data[] = array(
                'num' => $key,
                'customer' => "{$row->lastname}, {$row->firstname}",
                'reference_no' => $row->receipt_no,
                'services' => $row->services,
                'show' => "<a href='#' data-toggle='modal' data-target='#transaction-details' class='show-details' data-id='{$row->receipt_no}'><span style='font-size:25px;' class='glyphicon glyphicon-list-alt'></span></a>"
            );
        }
       
        $retval = array('data' => $data);
        echo json_encode($retval);
        return;
    }
}