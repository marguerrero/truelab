<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {
    public function index(){
        $session_data = array(
            'username' => "",
            'access_type' => ""
        );
        $this->session->unset_userdata($session_data);
        $this->load->view('login');
    }

    public function logout(){
        $session_data = array(
            'username' => "",
            'access_type' => ""
        );
        $this->session->unset_userdata($session_data);
        redirect('/index.php/login/');
    }

    public function validate(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $field = "";
        $err_msg = "";
        $msg_info = "";
        try {
            if(!$username)
                throw new Exception("Please enter your username", 1);
            if(!$password)
                throw new Exception("Please enter your password", 1);
            $query = $this->db->get_where('users', array('username' => $username));
            if(!$query)
                throw new Exception("Username/Password is incorrect", 1);
            $check = $query->result()[0];
            if(md5($password) != $check->password)
                throw new Exception("Username/Password is incorrect", 1);
                
            // $this->load->library('session');
            $session_data = array(
                'username' => $username,
                'access_type' => $check->access_type
            );
            $this->session->set_userdata($session_data);
            $msg_info = "Successfully Logged In";
        } catch (Exception $e){
            $err_msg = $e->getMessage();
        }

        $retval = array(
            'msg' => ($msg_info) ? $msg_info : $err_msg,
            'status' => ($msg_info) ? 'success' : 'failure',
            'field' => $field
        );
        echo json_encode($retval);
        return;
    }
}