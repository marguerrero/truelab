<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Users extends MX_Controller {
    public function index()
    {
        // $this->load->view('users_view');
    }

    public function export()
    {
        $this->load->library('CustomerTransactionExport');

        $exporter = new CustomerTransactionExport('P', 'in', array(11, 8.5), true, 'UTF-8', false);
        $exporter->build();
        $exporter->to_file('vrymel_Test.pdf');
    }

    public function add(){
        $module = "users";
        $action = "_add";
        echo modules::run('base/base/index', $module, $action);
    }

    public function _add(){
        $service_options = "<option value='0'>-- SELECT SERVICE --</option>";
        $sub_options = "<option class='service-null' value='0'>-- SELECT SERVICE --</option>";

        $query = $this->db->get('categ_main');
        foreach ($query->result() as $row){
            $service_options .= "<option data-id='{$row->main_test_id}' value='{$row->main_test_id}'>{$row->category}</option>";
        }
        
        $query = $this->db->get('subcat');
        foreach ($query->result() as $row)
            $sub_options .= "<option hidden class='child-options child-{$row->main_test_id}' data-price='{$row->reg_price}' data-discount-price='$row->disc_price' data-parent='{$row->main_test_id}' value={$row->sub_test_id}>{$row->subcateg}</option>";
        
        $retval = array(
            'service_options' => $service_options,
            'sub_options' => $sub_options
        );
        $this->load->view('add_customer/index', $retval);
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

    public function getCustomers() 
    {
        $this->db->from('cust_list');

        $raw_data = $this->db->get()->result_array();
        $response_data = array();
        $num = 0;

        foreach ($raw_data as $key => $value) 
        {
            $response_data[] = array(
                'num' => ++$num,
                'firstname' => $value['firstname'],
                'lastname' => $value['lastname'],
                'birthday' => date('m/d/Y', strtotime($value['bday'])),
                'select' => ''
            );
        }

        die(json_encode(array('data' => $response_data)));
    }

    /*************************
    * For ajax call actions
    *************************/
    public function saveCustomer() {

        $msg_info = "";
        $err_msg = "";
        $data = array();

        try {
            $input = $this->input;
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

            if($this->hasRecord($customer))
            {
                $msg_info = $err_msg = "Customer already exist";
            }
            else
            {
                $this->db->insert('cust_list', $customer);
                $msg_info = "Successfully saved";
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
}
 