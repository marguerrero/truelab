<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medtech extends MX_Controller {

    /**************************************************
    * Default Customer Information Module Initialization
    **************************************************/

    public function index()
    {
        $module = "medtech";
        $action = "_index";
        echo modules::run('base/base/index', $module, $action);
    }

    public function _index(){
        $retval = array();
        $this->load->view('list_transaction/index', $retval);
    }

    public function service($service_id = ""){
        $param = array('service_id' => $service_id);
        $module = "medtech";
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

        $query = $this->db
                    ->query($sql);

        
        if(!$query)
            redirect('/');
        $query = $query->result()[0];
        $customer_info = array(
            'customer_id' => $query->cust_id,
            'fullname' => "{$query->lastname}, {$query->firstname}",
            'age_sex' => $this->_calculateAge($query->bday)."/".$query->sex,
            'bday' => date('m-d-Y', strtotime($query->bday))
        );
      
       
        $retval = array(
            'customer' => $customer_info,
            'code' => $query->template_code,
            'service_id' => $service_id
        );
        $this->load->view('toolbar/index', $retval);
        $this->load->view('hematology/index', $retval);
        $this->load->view('miscellaneous/index', $retval);
        $this->load->view('fecalysis/index', $retval);
        $this->load->view('clinical_chemistry/index', $retval);
        $this->load->view('urinalysis/index', $retval);
        $this->load->view('toolbar/lower', $retval);
    }

    public function exportData(){
        $post = $this->input->post();
        $code = $post['code'];
        // echo '<pre>';
        // print_r($post);
        // die();
        // ob_start();
        $err_info = "";
        $msg_info = "";
        $filename = "EXPORT_$code-".date('Y-m-d h:i:s').".pdf";
        try {
            foreach ($post as $key => $value) {
                $$key = $value;
            }
            switch ($code) {
                 case 'HE':
                     $template = new HematologyTemplate("TEST", "TEST");
                    $template->set_name($fullname);
                    $template->set_age_sex($age_sex);
                    $template->set_date($date_released);
                    $template->set_physician($physician);
                    $template->set_wbc($result_1);
                    $template->set_hemoglobin($result_2);
                    $template->set_hematocrit($result_3);
                    $template->set_rbc($result_4);
                    $template->set_platelet_count($result_5);
                    $template->set_neutrophils($result_6);
                    $template->set_lymphocytes($result_7);
                    $template->set_monocytes($result_8);
                    $template->set_eosinophils($result_9);
                    $template->set_stabs($result_10);
                    $template->set_remarks($result_11);
                    $template->build();
                    ob_end_clean();
                    $template->to_file($filename);
                    break;
                case 'BT':
                    $retval['result'] = array('test' => "BLOOD TYPE");
                    $this->load->view('miscellaneous/index', $retval);
                    break;
                case 'MX':
                    // $retval['result'] = array('test' => $query->subcateg);
                    // echo '<pre>';
                    // print_r($query);
                    // die();
                    // $test = "TEST";
                    // $result = "TEST";
                    // $fullname = "TEST";
                    // $physician = "TEST";
                    // $age = "TEST";
                    // $date = "TEST";
                    $template = new MiscellaneousTemplate($test, $result);
                    $template->set_name($fullname);
                    $template->set_age_sex($age_sex);
                    $template->set_date($date_released);
                    $template->set_physician($physician);
                    
                    $template->build();
                    ob_end_clean();
                    $template->to_file($filename);
                    echo 'built';
                    break;
                case 'UA':
                    $template = new UrinalysisTemplate();
                    $template->set_name($fullname);
                    $template->set_age_sex($age_sex);
                    $template->set_date($date_released);
                    $template->set_physician($physician);
                    $template->set_color($result_1);
                    $template->set_clarity($result_2);
                    $template->set_protein($result_3);
                    $template->set_glucose($result_4);
                    $template->set_ph($result_5);
                    $template->set_sp_gravity($result_6);
                    $template->set_wbc($result_7);
                    $template->set_rbc($result_8);
                    $template->set_epith_cells($result_9);
                    $template->set_mucous_threads($result_10);
                    $template->set_bacteria($result_11);
                    $template->set_a_urates($result_12);
                    $template->set_fine($result_13);
                    $template->set_coarse($result_14);
                    $template->set_hyaline($result_15);
                    $template->set_others($result_16);
                    $template->build();
                    ob_end_clean();
                    $template->to_file($filename);
                    break;
                case 'CH':
                 
                  $template = new ClinicalChemistryTemplate("TEST", "TEST");
                  $template->set_name($fullname);
                    $template->set_age_sex($age_sex);
                    $template->set_date($date_released);
                    $template->set_physician($physician);
                  $template->set_fbs($result_1);
                    $template->set_hbalc($result_2);
                    $template->set_creatinine($result_3);
                    $template->set_bun($result_4);
                    $template->set_bua($result_5);
                    $template->set_cholesterol($result_6);
                    $template->set_triglyceride($result_7);
                    $template->set_hdl($result_8);
                    $template->set_ldl($result_9);
                    $template->set_sgot($result_10);
                    $template->set_sgpt($result_11);
                    $template->set_alk_phosphatase($result_12);

                    $template->set_total_bilirubin($result_13);
                    $template->set_indirect_bil($result_14);
                    $template->set_direct_bil($result_15);
                    $template->set_total_protein($result_16);
                    // $template->set_albumin($result_);
                    // $template->set_globulin($result_);
                    $template->set_ag_ratio($result_17);
                    $template->set_potassium($result_18);
                    $template->set_sodium($result_19);
                    $template->set_total_calcium($result_20);
                    $template->set_chloride($result_21);
                    $template->set_others($result_22);

                    $template->build();
                    ob_end_clean();
                    $template->to_file($filename);
                    // $this->load->view('fecalysis/index', $retval);
                    break;
                case 'PT':
                    // $retval['result'] = array('test' => $query->subcateg);
                    // $this->load->view('miscellaneous/index', $retval);
                break;
                case 'SE':
                    $template = new FecalysisTemplate("TEST", "TEST");
                    $template->set_name($fullname);
                    $template->set_age_sex($age_sex);
                    $template->set_date($date_released);
                    $template->set_physician($physician);
                    $template->build();
                    ob_end_clean();
                    $template->to_file($filename);
                    break;
                case 'HB':
                    
                    break;
                case 'AFB':
                    // $retval['result'] = array('test' => $query->subcateg);
                    // $this->load->view('miscellaneous/index', $retval);
                    break;
            }
        } catch (Exception $e) {
            $err_info = $e->getMessage();
        }
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
                    'update' => "<a href='".site_url('index.php/medtech/service/'.$row->id)."'>View</a>"
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
                'show' => "<a href='#' data-toggle='modal' data-target='#transaction-details' class='show-details' data-rn='{$row->receipt_no}'><span style='font-size:25px;' class='glyphicon glyphicon-list-alt'></span></a>"
            );
        }
       
        $retval = array('data' => $data);
        echo json_encode($retval);
        return;
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