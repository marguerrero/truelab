<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Entity\CustList; 
class Customer extends MX_Controller {

    /**************************************************
    * Default Customer Information Module Initialization
    **************************************************/

    public function index()
    {
        $module = "customer";
        $action = "_index";
        echo modules::run('base/base/index', $module, $action);
    }

    public function _index(){
        $retval = array();
        $this->load->view('list_customer/index', $retval);
    }

    public function loadTransaction(){
        $sql = "
            SELECT 
                bb.firstname,
                bb.lastname,
                aa.transdate,
                aa.receipt_no,
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
                'num' => $key + 1,
                'customer' => "{$row->firstname} {$row->lastname}",
                'reference_no' => $row->receipt_no,
                'date_of_transaction' => $row->transdate,
                'edit' => "<a href='". site_url('index.php/customer/edit/'.$row->receipt_no) ."' class='edit-btn' data-id='{$row->id}'><span class='glyphicon glyphicon-pencil'></span></a>"
            );
        }
       
        $retval = array('data' => $data);
        echo json_encode($retval);
        return;
    }


    public function export($receipt_no = "")
    {
        if(!$receipt_no)
            redirect('index.php/customer/add');
        
        $sql = "
            SELECT *
            FROM customer_transaction aa
            LEFT JOIN cust_list bb 
                ON aa.cust_id = bb.service_id
            LEFT JOIN customer_service cc
                ON cc.trans_id=aa.id
            LEFT JOIN subcat dd
                ON dd.sub_test_id=cc.subcat_id
            LEFT JOIN categ_main ee
                ON ee.main_test_id = dd.main_test_id
            WHERE aa.receipt_no='$receipt_no'
        ";
        $r = $this->db->query($sql);
        if(!$r)
            redirect('index.php/customer/add');
        $result = array();
        foreach ($r->result() as $key => $value) 
            $result[] = $value;
        
        $session_data = $this->session->all_userdata();
        $customer = array(
            'cust_id' => $result[0]->service_id,
            'firstname' => $result[0]->firstname,
            'middlename' => $result[0]->middlename,
            'lastname' => $result[0]->lastname,
            'gender' => ($result[0]->sex == 'M') ? 'Male' : 'Female',
            'birthday' => date('F d, Y', strtotime($result[0]->bday)),
            'age' => $this->_calculateAge($result[0]->bday),
            'reference_no' => $result[0]->receipt_no,
            'transaction_date' => date('F d, Y', strtotime($result[0]->transdate)),
            'source' => $session_data['code']
        );
        
        
        
        $services = array();
        $total = 0;
        foreach ($result as $key => $value) {
            if($value->amount)
                $price = $value->amount;
            else {
                $price = ($value->has_discount) ? $value->disc_price : $value->reg_price ;
                $price = (!$price) ? $value->reg_price : $price;
            }
            
            $total += $price;
            $service_name = ($value->is_reprint) ? "{$value->subcateg} [REPRINT] " : $value->subcateg;
            $services[] = array(
                'count' => $key + 1,
                'category' => $service_name,
                'price' => number_format($price, 2, '.', '')
            );
        }
        $total = number_format($total, 2, '.', '');
        $retval = array(
            'customer' => $customer,
            'services' => $services,
            'total' => $total
        );
        
        $filename = "EXPORT_TRANS-".date('Y-m-d h:i:s').".pdf";
        $template = new CustomerTransactionExport();
        $template->set_last_name($customer['lastname']);
        $template->set_first_name($customer['firstname']);
        $template->set_middle_name($customer['middlename']);
        $template->set_age($customer['age']);
        $template->set_gender($customer['gender']);
        $template->set_birthday($customer['birthday']);
        $template->set_reference_no($customer['reference_no']);
        $template->set_source($customer['source']);
        $template->set_date(date('Y-m-d', strtotime($result[0]->transdate)) );

        $data = array();
        foreach($services as $key => $value){

            $data[] = array(
                'category' => $value['category'],
                'sub_category' => $value['service'],
                'amount' => $value['price']
            );
        }
        
        $template->set_data($data);
        $template->build();
        $template->to_file('vrymel_Test.pdf');
    }

    /**************************************************
    * Add Customer Information Module Initialization
    **************************************************/
    public function add(){
        $module = "customer";
        $action = "_add";
        echo modules::run('base/base/index', $module, $action);
    }

    public function _add($params){

        $service_options = "<option value='0'>-- SELECT SERVICE --</option>";
        $sub_options = "<option class='service-null' value=''>-- SELECT SERVICE --</option>";

        $query = $this->db->get('categ_main');
        foreach ($query->result() as $row){
            $service_options .= "<option data-id='{$row->main_test_id}' value='{$row->main_test_id}'>{$row->category}</option>";
        }
        
        $query = $this->db->get('subcat');
        foreach ($query->result() as $row){
            
            $reg_price = $row->reg_price;
            $disc_price = (!$row->disc_price) ? $reg_price : $row->disc_price;
            $disc_price_2 = (!$row->disc_price_2) ? $reg_price : $row->disc_price_2;
            // $sub_options .= "<option  data-reg-price='{$row->reg_price}' data-disc-price='$disc_price' class='child-options child-{$row->main_test_id}' data-price='{$row->reg_price}' data-discount-price='$row->disc_price' data-parent='{$row->main_test_id}' value='{$row->sub_test_id}'>{$row->subcateg}</option>";
            //-- fetch available discounts for each service
            $q = $this->db->get_where('service_discounts', array('service_id' => $row->sub_test_id));
            // $discount_ids = array();
            // $discount_val = array();
            // foreach ($q->result() as $key => $value) {
            //     $discount_
            // }
            $sub_options .= "<option style='display:none;' data-reg-price='{$row->reg_price}' data-disc-price='$disc_price' data-disc-price-2='$disc_price_2' class='child-options child-{$row->main_test_id}' data-price='{$row->reg_price}' data-discount-price='$row->disc_price' data-parent='{$row->main_test_id}' value={$row->sub_test_id}>{$row->subcateg}</option>";
        }
        
        
       
        

        $retval = array(
            'service_options' => $service_options,
            'sub_options' => $sub_options
        );
        $this->load->view('add_customer/index', $retval);
    }

    public function displayDiscounts(){
        $s_id = $this->input->post('service-id');
        $err_msg = "";
        $msg_info = "";
        $data = array();
        try{
            $q = $this->db->order_by("disc_amount", "ASC")->get_where('service_discounts', array('service_id' => $s_id));
            if($q->num_rows() == 0)
                throw new Exception("No discount found", 1);
            foreach ($q->result() as $key => $value) {
                $data[] = array(
                    'd_id' => $value->id,
                    'less' => $value->disc_amount
                );
            }
        } catch (Exception $e){
            $err_msg = $e->getMessage();
        }
        $retval = array(
            'success' => true,
            'status' => ($err_msg) ? 'failure' : 'success',
            'data' => $data
        );
        echo json_encode($retval);
        return;
    }

    /**************************************************
    * Edit Customer Information Module Initialization
    **************************************************/
    public function edit($receipt_no = ""){
        $module = "customer";
        $action = "_edit";
        $param = array('receipt_no' => $receipt_no);
        echo modules::run('base/base/index', $module, $action, $param);
    }

    public function _edit($params = array()){
        if(!$params)
            redirect('index.php/customer/add');
        $receipt_no = $params['receipt_no'];

        $service_options = "<option value='0'>-- SELECT SERVICE --</option>";
        $sub_options = "<option class='service-null' value=''>-- SELECT SERVICE --</option>";

        $query = $this->db->get('categ_main');
        foreach ($query->result() as $row){
            $service_options .= "<option data-id='{$row->main_test_id}' value='{$row->main_test_id}'>{$row->category}</option>";
        }
        
        $query = $this->db->get('subcat');
        foreach ($query->result() as $row){
            $reg_price = $row->reg_price;
            $disc_price = (!$row->disc_price) ? $reg_price : $row->disc_price;
            $disc_price_2 = (!$row->disc_price_2) ? $reg_price : $row->disc_price_2;
            // $sub_options .= "<option  data-reg-price='{$row->reg_price}' data-disc-price='$disc_price' class='child-options child-{$row->main_test_id}' data-price='{$row->reg_price}' data-discount-price='$row->disc_price' data-parent='{$row->main_test_id}' value='{$row->sub_test_id}'>{$row->subcateg}</option>";
            $sub_options .= "<option style='display:none;' data-reg-price='{$row->reg_price}' data-disc-price='$disc_price' data-disc-price-2='$disc_price_2' class='child-options child-{$row->main_test_id}' data-price='{$row->reg_price}' data-discount-price='$row->disc_price' data-parent='{$row->main_test_id}' value={$row->sub_test_id}>{$row->subcateg}</option>";
        }
        
        //-- get customer information 
         $sql = "
                SELECT 
                    bb.*,
                    aa.id as trans_id,
                    aa.physician,
                    aa.receipt_no
                FROM
                customer_transaction aa
                LEFT JOIN cust_list bb
                ON bb.service_id=aa.cust_id
                WHERE aa.receipt_no='$receipt_no'
                ORDER BY transdate DESC
        ";

        $query = $this->db->query($sql);
        $r = $query->result();
        $result = $r[0];

        $trans_id = $result->trans_id;
        $birthday = date('m/d/Y', strtotime($result->bday));
        $today = new Datetime();
        $bday = new Datetime($result->bday);
        $interval = $today->diff($bday);
        $partial_age = $interval->format('%y');
        $age = floor($partial_age);
        $customer = array(
            'cust_id' => $result->service_id,
            'firstname' => $result->firstname,
            'middlename' => $result->middlename,
            'lastname' => $result->lastname,
            'birthday' => $birthday,
            'age' => $age,
            'prof-pic' => $result->image,
            'physician' => $result->physician,
            'gender_male' => ($result->sex == 'M') ? 'checked' : '',
            'gender_female' => ($result->sex == 'F') ? 'checked' : '',
            'reference_no' => $result->receipt_no
        );
        
        
        $retval = array(
            'service_options' => $service_options, 
            'sub_options' => $sub_options,
            'customer' => $customer,
            'trans_id' => $trans_id,
            'is_edit' => 1
        );
        $this->load->view('edit_customer/index', $retval);
    }

    public function loadServices(){

        $trans_id = $this->input->get('trans_id');
        //-- get customer services
        $sql = " SELECT 
                    * 
                FROM  customer_service aa 
                LEFT JOIN subcat bb
                ON bb.sub_test_id=aa.subcat_id
                LEFT JOIN categ_main cc
                ON cc.main_test_id=bb.main_test_id
                WHERE aa.trans_id='$trans_id' ";
        $query = $this->db->query($sql);
        
        
        $customer_services = array();
        foreach ($query->result() as $key => $value) {
            if($value->is_reprint == 1){
                $this->load->config('results');
                $amount = $this->config->item('reprint_price');
                $price = $amount;
            }
            elseif($value->amount)
                $price = $value->amount;
            else{
                $price = $value->reg_price;
                switch ($value->disc_type) {
                    case 1:
                        $price = ($value->disc_price) ? $value->disc_price : $value->reg_price;
                        break;
                    case 2:
                        $price = $value->disc_price_2;
                        break;
                }
            }
            
            $customer_services[] = array(
                'category_id' => $value->main_test_id,
                'subcat_id' => $value->subcat_id,
                'service_id' => $value->id,
                'disc_type' => $value->disc_id,
                'exported' => $value->exported,
                'is_reprint' => $value->is_reprint,
                'price' => $price
            );
        }
        
        $service_count = $key + 1;

        $retval = array(
            'customer_services' => $customer_services,
            'count' => $service_count
        );
        echo json_encode($retval);
        return;
    }


    /**************************************************
    * Review Customer Information Module Initialization
    **************************************************/
    //-- renders review page
    public function review($receipt_no = ""){
        $module = "customer";
        $action = "_review";
        $param = array('receipt_no' => $receipt_no);
        echo modules::run('base/base/index', $module, $action, $param);
    }

    public function _review($param = array()){
        if(!$param)
            redirect('index.php/customer/add');
        $receipt_no = $param['receipt_no'];
        $session_data = $this->session->all_userdata();

        $sql = "
            SELECT *
            FROM customer_transaction aa
            LEFT JOIN cust_list bb 
                ON aa.cust_id = bb.service_id
            LEFT JOIN customer_service cc
                ON cc.trans_id=aa.id
            LEFT JOIN subcat dd
                ON dd.sub_test_id=cc.subcat_id
            LEFT JOIN categ_main ee
                ON ee.main_test_id = dd.main_test_id
            WHERE aa.receipt_no='$receipt_no'
        ";

        $r = $this->db->query($sql);

        if(!$r)
            redirect('index.php/customer/add');
        $result = array();
        foreach ($r->result() as $key => $value) 
            $result[] = $value;
        
        
        $customer = array(
            'cust_id' => $result[0]->service_id,
            'firstname' => $result[0]->firstname,
            'lastname' => $result[0]->lastname,
            'middlename' => $result[0]->middlename,
            'gender' => ($result[0]->sex == 'M') ? 'Male' : 'Female',
            'birthday' => date('F d, Y', strtotime($result[0]->bday)),
            'reference_no' => $result[0]->receipt_no,
            'age' => $this->_calculateAge($result[0]->bday),
            'transaction_date' => date('F d, Y', strtotime($result[0]->transdate)),
            'source' => $session_data['code']
        );
        
        $services = array();
        $total = 0;


        
        $this->load->library('Service');
        $service = $this->service;


        foreach ($result as $key => $value) {
            if($value->amount)
                $price = $value->amount;

            else {
                $price = 0;
                switch ($value->disc_type) {
                    case 0:
                        $price = $value->reg_price;
                        break;
                    case 1:
                        $price = ($value->disc_price) ? $value->disc_price : $value->reg_price;
                        break;
                    case 2:
                        $price = $value->disc_price_2;
                        break;
                    default:
                    	$price = 9999;
                    	break;
                }
            }
            $type = $service->checkServiceType($value->template_code);
            
            $reprint_url = "";
            if($value->is_reprint)
                $reprint_url = ($type == 'radtech') ? base_url('index.php/radtech/service/'.$value->id) : base_url('index.php/medtech/service/'.$value->id);;
            
            
            $total += $price;
            $service_name = ($value->is_reprint) ? "{$value->subcateg} [REPRINT] " : $value->subcateg;
            $services[] = array(
                'count' => $key + 1,
                'category' => $value->category,
                'service' => $service_name,
                'price' => number_format($price, 2, '.', ''),
                'is_reprint' => $value->is_reprint,
                'reprint_url' => $reprint_url

            );
        }
        // echo '<pre>';
        // print_r($services);
        // die();
        $total = number_format($total, 2, '.', '');
        $retval = array(
            'customer' => $customer,
            'services' => $services,
            'total' => $total
        );
        $this->load->view('review_customer/index', $retval);

    }


    /*************************
    * For ajax call actions
    *************************/
    public function getCustomers() 
    {
        $this->db->from('cust_list');

        $raw_data = $this->db->get()->result_array();
        $response_data = array();
        $num = 1;

        foreach ($raw_data as $key => $value) 
        {
            $firstname = mysql_escape_string($value['firstname']);
            $lastname = mysql_escape_string($value['lastname']);
            $birthday = date('m/d/Y', strtotime($value['bday']));
            $id = $value['service_id'];
            $gender = $value['sex'];
            $today = new Datetime();
            $bday = new Datetime($value['bday']);
            $interval = $today->diff($bday);
            $partial_age = $interval->format('%y');
            $age = floor($partial_age);
            $response_data[] = array(
                'num' => ++$num,
                'firstname' => $value['firstname'],
                'middlename' => $value['middlename'],
                'lastname' => $value['lastname'],
                'birthday' => $birthday,
                'select' => "<a data-dismiss='modal' data-age='$age' data-gender='$gender' data-bday='$birthday' data-id='$id' data-middlename='{$value['middlename']}' data-firstname='{$value['firstname']}' data-lastname='{$value['lastname']}' data-birthday='{$value['birthday']}' class='customer-select' href='#'> <span class='select-icon glyphicon glyphicon-ok'  aria-hidden='true'>&nbsp</span></a>"
            );
        }

        die(json_encode(array('data' => $response_data)));
    }

    public function upload($receipt_no = ""){
        $msg_info = "";
        $err_msg = "";
        
        try{
            $input = $_FILES['userfile'];
            if($input){
                $prefix = time();
                $origname = $_FILES['userfile']['name'];
                $_FILES['userfile']['name'] = "$prefix-$origname";

                
                $upload = $input['photo'];
                $this->load->library('upload', $config);
                
                $upload_stat = $this->upload->do_upload('userfile',$filename);
                if($upload_stat){
                    $uploaded = $this->upload->data();
                    $filename = $uploaded['file_name'];
                    $transaction = $this->db->get_where('customer_transaction', array('receipt_no' => $receipt_no));
                    $cust_id = $transaction->result()[0]->cust_id;
                    $customer = array(
                        'image' => $filename
                    );
                    $this->db->where('service_id', $cust_id);
                    $this->db->update('cust_list', $customer);
                }
                
            }
            redirect('index.php/customer/review/'.$receipt_no);
        } catch (Exception $e) {
            redirect('index.php/customer/add/');
        }
        return;
    }
    

    public function saveTransaction(){
        $trans_id = "";
        $msg_info = "";
        $err_msg = "";
        $field = "";
        $data = array();

        try {
            $input = $this->input;
            $session_data = $this->session->all_userdata();
            $t_id = $input->post('trans-id');
            $disc_type = $input->post('discount-type');
            $reference_no = $input->post('reference-no');
            $services = $input->post('subcat-id');
            $cust_id = $input->post('cust-id');
            $firstname = $input->post('first-name');
            $lastname = $input->post('last-name');
            $middlename = $input->post('middle-name');
            $gender = $input->post('gender');
            $birthday = str_replace('-', '/', $input->post('bday'));
            $services = $input->post('subcat-id');
            $physician = $input->post('physician');
            $has_discount = $input->post('has-discount');
            $service_price = $input->post('service-price');
            $is_reprint = $input->post('is_reprint');
            $is_exported = $input->post('is_exported');
            $cs_id = $input->post('cs_id');
            

            //-- Validate User Here
            if(!$firstname){
                $field = 'firstname';
                throw new Exception("First Name is required", 1);
            }
            if(!$middlename){
                $field = 'middlename';
                throw new Exception("Middle Name is required", 1);
            }
            if(!$lastname){
                $field = 'lastname';
                throw new Exception("Last Name is required", 1);
            }
            if(!$birthday){
                $field = 'bday';
                throw new Exception("Birthday is required", 1);
            }
            if(!$physician){
                $field = 'physician';
                throw new Exception("Physician is required", 1);
            }
            if(!$services){
                throw new Exception("Please select at least one service", 1);
            }
            if(!$services[0]){
                throw new Exception("Please select at least one service", 1);
            }

            //-- Save entry to customer database

            if(!$cust_id){
                $cust_id = $this->_fetchPK('cust_list');
                $customer = array(
                    'service_id' => $cust_id,
                    'firstname' => trim($firstname),
                    'lastname' => trim($lastname),
                    'middlename' => trim($middlename),
                    'sex' => $gender,
                    'bday' => date('Y-m-d', strtotime($birthday))
                );
                if($this->_hasRecord($customer))
                   throw new Exception("Customer already exists", 1);
                else{
                    $this->db->insert('cust_list', $customer);
                    }
            }
            else {
                $customer = array(
                    'service_id' => $cust_id,
                    'firstname' => trim($firstname),
                    'lastname' => trim($lastname),
                    'middlename' => trim($middlename),
                    'sex' => $gender,
                    'bday' => date('Y-m-d', strtotime($birthday))
                );
                $this->db->where('service_id', $cust_id);
                $this->db->update('cust_list', $customer);
            }
            //-- Save entry to customer transaction

            $trans_id = ($t_id) ? $t_id : $this->_fetchPK('customer_transaction');
            $unique = date('Ymd-His');
            $receipt_no = ($reference_no) ? $reference_no : RECEIPT_INIT."-$unique";
            $transaction = array(
                'receipt_no' => $receipt_no,
                'cust_id' => $cust_id,
                'physician' => $physician
            );

            $this->load->library('InventoryEntity');
            $inventory = $this->inventoryentity;
            if(!$reference_no){
                $transaction['id'] = $trans_id;
                $this->db->insert('customer_transaction', $transaction);
            }
            else {
                $previous_service = $this->db->get_where('customer_service', array('trans_id' => $trans_id));
                if($previous_service->num_rows()){
                    foreach ($previous_service->result() as $key => $value) {
                        
                        $inventory->setServiceId($value->subcat_id);
                        $i_data = $inventory->loadInventory();
                        
                        if($i_data){
                            foreach ($i_data as $k => $v) {
                                $inventory->setId($v['i_id']);
                                $inventory->setCount($v['count']);
                                $inventory->setModifiedBy($session_data['username']);
                                $inventory->setStatus('Updated After transaction');
                                $inventory->setType('INCREMENT');
                                $inventory->save();
                            }
                        }
                        
                        
                    }
                }
                
                $this->db->where('trans_id', $trans_id);
                $this->db->delete('customer_service'); 
                $this->db->flush_cache();
                $this->db->where('id', $trans_id);
                $this->db->update('customer_transaction', $transaction);
                $this->db->flush_cache();
            }

            //-- Save entries to customer service
            $d_count = 0;
            
            foreach ($services as $key => $value) {
                $s_id = $value;
                $d_type = $disc_type[$key];
                $charged = $service_price[$key];
                $reprinted = $is_reprint[$key];
                $exported = $is_exported[$key];
                $service_id_single = $cs_id[$key];
                $service_entry = array(
                    'id' => $service_id_single,
                    'exported' => $exported,
                    'is_reprint' => $reprinted,
                    'subcat_id' => $s_id,
                    'trans_id' => $trans_id,
                    'disc_id' => $d_type,
                    'amount' => $charged
                );
                $this->db->insert('customer_service', $service_entry);

                //-- Decreement inventory if available
                $inventory->setServiceId($s_id);
                $data = $inventory->loadInventory();
                
                if($data){
                    foreach ($data as $key => $value) {
                        $inventory->setId($value['i_id']);
                        $inventory->setCount($value['count']);
                        $inventory->setModifiedBy($session_data['username']);
                        $inventory->setStatus('Updated After transaction');
                        $inventory->setType('DECREMENT');
                        $inventory->save();
                    }
                }
            }
            $msg_info = "Successfully saved";
            
        } catch(Exception $e){
            $err_msg = $e->getMessage();
        }

        $retval = array(
            'msg' => ($msg_info) ? $msg_info : $err_msg,
            'status' => ($msg_info) ? "success" : "failure",
            'field' => $field,
            'trans_id' => $receipt_no
        ); 

        echo json_encode($retval);
        return;
    }


    private function _hasRecord($data) {
        $this->db->from('cust_list');
        $this->db->where('lastname', $data['lastname']);
        $this->db->where('firstname', $data['firstname']);
        return ($this->db->get()->num_rows() > 0);
    }

    private function _fetchPK($tablename){
        $sql = "
            SELECT AUTO_INCREMENT
            FROM information_schema.tables
            WHERE table_name = '$tablename'
            AND table_schema = DATABASE( ) ;
        ";
        $em = $this->doctrine->em;
         $stmt = $em
            ->getConnection()
            ->prepare($sql);
        $stmt->execute();
        $value = $stmt->fetch();
        return $value['AUTO_INCREMENT'];
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
 