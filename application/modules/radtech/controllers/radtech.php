<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Radtech extends MX_Controller {

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
        $param = array('service_id' => $service_id);
        $module = "radtech";
        $action = "_service";
        echo modules::run('base/base/index', $module, $action, $param);
    }

    public function _service($params = array()){
        $service_id = $params['service_id'];
        
        $sql = "
            SELECT * FROM customer_service aa
            LEFT JOIN customer_transaction bb
                ON bb.id=aa.trans_id
            LEFT JOIN cust_list cc
                ON cc.service_id=bb.cust_id
            LEFT JOIN subcat dd
                ON dd.sub_test_id=aa.subcat_id
            WHERE aa.id=$service_id
        ";

        $query = $this->db->query($sql);
        
        //-- Loads Customer Information
        if(!$query)
            redirect('/');
        $query = $query->result()[0];
        $string = $query->transdate;
        $date_recv = new Datetime($string);
        $session_data = $this->session->all_userdata();
        
        $customer_info = array(
            'customer_id' => $query->cust_id,
            'fullname' => "{$query->lastname}, {$query->firstname} {$query->middlename}",
            'age_sex' => $this->_calculateAge($query->bday)."/".$query->sex,
            'bday' => date('m-d-Y', strtotime($query->bday)),
            'date_recv' => $date_recv->format('m-d-Y h:i A'),
            'source' => $session_data['code'],
            'prof-pic' => $query->image,
            'exported' => $query->exported,
            'case_no' => $query->receipt_no,
            'require-pic' => $query->require_pic,
            'physician' => $query->physician
        );
      
        //-- Loads service data
        $q = $this->db->get_where('service_metadata', array('service_id' => $service_id));
        $s_data = array();
        foreach ($q->result() as $key => $value) 
            $s_data[$value->field] = $value->value;
        
        $this->config->load('results');
        $max_result = $this->config->item('max_result');
        for($i = 1; $i <= $max_result; $i++)
            $s_data["result_$i"] = (array_key_exists("result_$i", $s_data)) ? $s_data["result_$i"] : "";
        
        $retval = array(
            'customer' => $customer_info,
            'code' => $query->template_code,
            'result' => $s_data,
            'service_id' => $service_id
        );
        
        $this->load->view('toolbar/index', $retval);
        $this->load->view('radiology/index', $retval);
        $this->load->view('ultrasound/index', $retval);
        $this->load->view('toolbar/lower', $retval);
    }

    public function exportData(){
        $post = $this->input->post();
        $code = $post['code'];

        // $check_exported = $this->db->get_where('customer_service', array('id' => $post['service-id'], 'exported' => 1));
        
        // if($check_exported->num_rows)
            // redirect('/index.php/radtech/service/'.$post['service-id']);

        $err_info = "";
        $msg_info = "";
        $filename = "EXPORT_$code-".date('Y-m-d h:i:s').".pdf";
        try {
            $bypass_arr = array(
                'fullname',
                'age_sex',
                'date_released',
                'physician',
                'bday',
                'case_no',
                'date_recv',
                'cust-id',
                'service-id',
                'code',
                'source',
                'radiologist',
                'prof_pic'
            );

            $u_checker = 0;
            $s_metadata = array();
            foreach ($post as $key => $value) {
                $$key = $value;
                if(!in_array($key, $bypass_arr)){
                    $temp_metadata = array(
                        'service_id' => $post['service-id'],
                        'field' => $key,
                        'value' => $value
                    );
                    $u_checker = ($this->_hasRecord($temp_metadata)) ? ($u_checker + 1) : $u_checker;
                    $s_metadata[] = $temp_metadata;
                }
            }
            if(($u_checker != 0) && ($u_checker != count($s_metadata)))
                redirect('/index.php/radtech/service/'.$post['service-id']);
            $this->db->insert_batch('service_metadata', $s_metadata);
            
            switch ($code) {
                case 'RD':
                     case 'RD':
                    $html = "<br />
                        <h1>CHEST PA VIEW</h1>
                        <p>$result_1</p>
                        <p>$result_2</p>
                        <p>$result_3</p>
                        <p>$result_4</p>
                        <h2>Impression</h2>
                        <h2>$result_5</h2>
                    ";
                    $template = new RadiologyTemplate("Radiology", $html);
                    $template->set_name($fullname);
                    $template->set_age_sex($age_sex);
                    $template->set_date($date_released);
                    $template->set_physician($physician);
                    $template->set_dob($bday);
                    $template->set_case_no($case_no);
                    $template->set_source($source);
                    $template->set_date_received($date_recv);
                    $template->set_date_released(date('m-d-Y h:i A'));
                    $template->set_user_pic($prof_pic);
                    $template->build();
                    ob_end_clean();
                    $template->to_file($filename);
                    break;
                 case 'UTZ':
                    $html = "<br />
                    ";
                    $template = new RadiologyTemplate("Ultrasound", $html);
                    $template->set_name($fullname);
                    $template->set_age_sex($age_sex);
                    $template->set_date($date_released);
                    $template->set_physician($physician);
                    $template->set_case_no($case_no);
                    $template->set_dob($bday);
                    $template->set_source($source);
                    $template->set_date_received($date_recv);
                    $template->set_date_released(date('m-d-Y h:i A'));
                    $template->build();
                    ob_end_clean();
                    $template->to_file($filename);
                    break;
            }

        } catch(Exception $e){
            die($e->getMessage());
        }
        $this->db->where('id', $post['service-id']);
        $this->db->update('customer_service', array('exported' => true));
        return true;
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
                    bb.middlename,
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
                'middlename' => $cust_info->middlename,
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
            $allowed = array('UTZ', 'RD');
            foreach($query->result() as $key => $row){
                $services[] = array(
                    'category' => $row->category,
                    'service' => $row->subcateg,
                    'update' => (in_array($row->template_code, $allowed)) ? "<a href='".site_url('index.php/radtech/service/'.$row->id)."'>Update</a>" : ""
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
            ORDER BY aa.id DESC
        ";
        $query = $this->db->query($sql);
        
        foreach($query->result() as $key => $row){
            $data[] = array(
                'num' => $key + 1,
                'customer' => "{$row->lastname}, {$row->firstname}",
                'reference_no' => $row->receipt_no,
                'services' => $row->services,
                'show' => "<a href='#' data-toggle='modal' data-target='#transaction-details' class='show-details' data-rn='{$row->receipt_no}'><span style='font-size:25px;' class='glyphicon glyphicon-list-alt'></span></a>"
            );
        }
       
        $retval = array('data' => $data);
        echo json_encode($retval);
        return;
    }

    public function getTimestamp(){
        $retval = array(
            'success' => true,
            'status' => 'success',
            'timestamp' => date('m-d-Y h:i A')
        );
        echo json_encode($retval);
        return;
    }

    private function _hasRecord($data) {
        $this->db->from('service_metadata');
        $this->db->where('field', $data['field']);
        $this->db->where('value', $data['value']);
        return ($this->db->get()->num_rows() > 0);
    }

    private function _calculateAge($date){
        $today = new Datetime();
        $bday = new Datetime($date);
        $interval = $today->diff($bday);
        $partial_age = $interval->format('%y');
        $age = floor($partial_age);
        return $age;
    }
}