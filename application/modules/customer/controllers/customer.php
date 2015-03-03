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
                'num' => $key,
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


    public function export()
    {
        $this->load->library('CustomerTransactionExport');

        $exporter = new CustomerTransactionExport('P', 'in', array(11, 8.5), true, 'UTF-8', false);
        $exporter->build();
        $exporter->to_file('vrymel_Test.pdf');
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
        $sub_options = "<option class='service-null' value='0'>-- SELECT SERVICE --</option>";

        $query = $this->db->get('categ_main');
        foreach ($query->result() as $row){
            $service_options .= "<option data-id='{$row->main_test_id}' value='{$row->main_test_id}'>{$row->category}</option>";
        }
        
        $query = $this->db->get('subcat');
        foreach ($query->result() as $row){
            $reg_price = $row->reg_price;
            $disc_price = (!$row->disc_price) ? $reg_price : $row->disc_price;
            $sub_options .= "<option  data-reg-price='{$row->reg_price}' data-disc-price='$disc_price' class='child-options child-{$row->main_test_id}' data-price='{$row->reg_price}' data-discount-price='$row->disc_price' data-parent='{$row->main_test_id}' value='{$row->sub_test_id}'>{$row->subcateg}</option>";
            // $sub_options .= "<option style='display:none;' data-reg-price='{$row->reg_price}' data-disc-price='$disc_price' class='child-options child-{$row->main_test_id}' data-price='{$row->reg_price}' data-discount-price='$row->disc_price' data-parent='{$row->main_test_id}' value={$row->sub_test_id}>{$row->subcateg}</option>";
        }
        
        
       
        

        $retval = array(
            'service_options' => $service_options,
            'sub_options' => $sub_options
        );
        $this->load->view('add_customer/index', $retval);
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
        $sub_options = "<option class='service-null' value='0'>-- SELECT SERVICE --</option>";

        $query = $this->db->get('categ_main');
        foreach ($query->result() as $row){
            $service_options .= "<option data-id='{$row->main_test_id}' value='{$row->main_test_id}'>{$row->category}</option>";
        }
        
        $query = $this->db->get('subcat');
        foreach ($query->result() as $row){
            $reg_price = $row->reg_price;
            $disc_price = (!$row->disc_price) ? $reg_price : $row->disc_price;
            $sub_options .= "<option hidden data-reg-price='{$row->reg_price}' data-disc-price='$disc_price' class='child-options child-{$row->main_test_id}' data-price='{$row->reg_price}' data-discount-price='$row->disc_price' data-parent='{$row->main_test_id}' value={$row->sub_test_id}>{$row->subcateg}</option>";
        }
        
        //-- get customer information 
         $sql = "
                SELECT 
                    bb.*,
                    aa.id as trans_id,
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
            'lastname' => $result->lastname,
            'birthday' => $birthday,
            'age' => $age,
            'gender_male' => ($result->sex == 'M') ? 'checked' : '',
            'gender_female' => ($result->sex == 'F') ? 'checked' : '',
            'reference_no' => $result->receipt_no
        );
        
        
        $retval = array(
            'service_options' => $service_options,
            'sub_options' => $sub_options,
            'customer' => $customer,
            'trans_id' => $trans_id
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
        
        // $r = $query->result()[0];
        // $price = ($r->has_discount) ? $r->disc_price : $r->reg_price;
        // $price = (!$price) ? $reg_price : $price;
        // $first_service = array(
        //     'category_id' => $r->main_test_id,
        //     'subcat_id' => $r->subcat_id,
        //     'has_discount' => ($r->has_discount) ? 'checked' : '',
        //     'price' => $price
        // );
        
        $customer_services = array();
        foreach ($query->result() as $key => $value) {
            $price = ($value->has_discount)  ? $value->disc_price : $value->reg_price;
            $price = (!$price) ? $value->reg_price : $price;
            $customer_services[] = array(
                'category_id' => $value->main_test_id,
                'subcat_id' => $value->subcat_id,
                'has_discount' => ($value->has_discount) ? true : false,
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
            'firstname' => $result[0]->firstname,
            'lastname' => $result[0]->lastname,
            'gender' => ($result[0]->sex == 'M') ? 'Male' : 'Female',
            'birthday' => date('F d, Y', strtotime($result[0]->bday)),
            'reference_no' => $result[0]->receipt_no,
            'transaction_date' => date('F d, Y', strtotime($result[0]->transdate))
        );
        
        $services = array();
        $total = 0;
        foreach ($result as $key => $value) {
            $price = ($value->has_discount) ? $value->disc_price : $value->reg_price ;
            $price = (!$price) ? $value->reg_price : $price;
            $total += $price;
            $services[] = array(
                'count' => $key + 1,
                'category' => $value->category,
                'service' => $value->subcateg,
                'price' => number_format($price, 2, '.', '')
            );
        }
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
                'lastname' => $value['lastname'],
                'birthday' => $birthday,
                'select' => "<a data-dismiss='modal' data-age='$age' data-gender='$gender' data-bday='$birthday' data-id='$id' data-firstname='{$value['firstname']}' data-lastname='{$value['lastname']}' data-birthday='{$value['birthday']}' class='customer-select' href='#'> <span class='select-icon glyphicon glyphicon-ok'  aria-hidden='true'>&nbsp</span></a>"
            );
        }

        die(json_encode(array('data' => $response_data)));
    }


    public function saveCustomer() {

        $msg_info = "";
        $err_msg = "";
        $data = array();

        try {
            $input = $this->input;
            $cust_id = $input->post('cust-id');
            $firstname = $input->post('first-name');
            $lastname = $input->post('last-name');
            $gender = $input->post('gender');
            $birthday = $input->post('bday');
            $birthday = date('Y-m-d', strtotime($birthday));
            $customer = array(
                'firstname' => trim($firstname),
                'lastname' => trim($lastname),
                'sex' => $gender,
                'bday' => $birthday
            );

            if($cust_id){
                $this->db->where('service_id', $cust_id);
                $this->db->update('cust_list', $customer);
            }
            else{
                if($this->hasRecord($customer))
                {
                    $msg_info = $err_msg = "Customer already exist";

                    // $this->db->where('service_id', $id);
                    // $this->db->update('cust_list', $customer);
                }
                else
                {
                    $this->db->insert('cust_list', $customer);
                    $msg_info = "Successfully saved";
                }
                
            }
        } catch(Exception $e){
            $err_msg = $e->getMessage();
        }

        $retval = array(
            'msg' => ($msg_info) ? $msg_info : $err_msg,
            'success' => (empty($err_msg))
        ); 

        die(json_encode($retval));
    }

    private function hasRecord($data) 
    {
        $this->db->from('cust_list');
        $this->db->where('lastname', $data['lastname']);
        $this->db->where('firstname', $data['firstname']);
        //-- include bday?
        // $this->db->where('bday', $data['bday']);

        return ($this->db->get()->num_rows() > 0);
    }

    public function saveTransaction(){
        $trans_id = "";
        $msg_info = "";
        $err_msg = "";
        $field = "";
        $data = array();

        try {
            $input = $this->input;
            $services = $input->post('subcat-id');
            $cust_id = $input->post('cust_id');
            $firstname = $input->post('first-name');
            $lastname = $input->post('last-name');
            $gender = $input->post('gender');
            $birthday = $input->post('bday');
            // $birthday = date('Y-m-d', strtotime($birthday));
            $services = $input->post('subcat-id');
            $has_discount = $input->post('has-discount');

            //-- Validate User Here
            if(!$firstname){
                $field = 'firstname';
                throw new Exception("First Name is required", 1);
            }
            if(!$lastname){
                $field = 'lastname';
                throw new Exception("Last Name is required", 1);
            }
            if(!$birthday){
                $field = 'bday';
                throw new Exception("Birthday is required", 1);
            }
            
            
            if(!$services){
                throw new Exception("Please select at least one service", 1);
                
            }

            //-- Save entry to customer database
            if(!$cust_id){
                $cust_id = $this->_fetchPK('cust_list');
                $customer = array(
                    'service_id' => $cust_id,
                    'firstname' => trim($firstname),
                    'lastname' => trim($lastname),
                    'sex' => $gender,
                    'bday' => date('Y-m-d', strtotime($birthday))
                );
                if($this->hasRecord($customer))
                   throw new Exception("Customer already exists", 1);
                else{;
                    $this->db->insert('cust_list', $customer);
                    }
            }
            else {
                $customer = array(
                    'service_id' => $cust_id,
                    'firstname' => trim($firstname),
                    'lastname' => trim($lastname),
                    'sex' => $gender,
                    'bday' => date('Y-m-d', strtotime($birthday))
                );
                $this->db->where('service_id', $cust_id);
                $this->db->update('cust_list', $customer);
            }
            //-- Save entry to custoemer transaction
            $trans_id = $this->_fetchPK('customer_transaction');
            $unique = date('YmdHis');
            $receipt_no = RECEIPT_INIT."-$trans_id$unique";
            $transaction = array(
                'receipt_no' => $receipt_no,
                'cust_id' => $cust_id
            );
            $this->db->insert('customer_transaction', $transaction);

            //-- Save entries to customer service
            foreach ($services as $key => $value) {
                $s_id = $value;
                $discount = $has_discount[$key];
                $service_entry = array(
                    'subcat_id' => $s_id,
                    'has_discount' => $discount,
                    'trans_id' => $trans_id
                );
                $this->db->insert('customer_service', $service_entry);
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
}
 