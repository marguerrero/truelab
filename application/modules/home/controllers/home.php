<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
    public function index(){
        $module = "home";
        $action = "_index";
        echo modules::run('base/base/index', $module, $action);
    }

    public function _index(){
        $this->load->view('home');
    }

    public function test_email()
    {
        $mail = new Mailer();
        $mail->AddAddress("truelab.clinicdiagnostic.rpts@gmail.com");
        $mail->AddBCC("reymarguerrero@gmail.com");
        $mail->Body = "Please see attached for the report.";
        $mail->Subject = "Truelab Clinic Diagnostic Sales Reports - " . date('Y-m-d');
        $mail->AddAttachment('scripts/reports/TL_reports-DAILY-2015-03-21.xls');
        
        if($mail->Send())
        {
            die('Email sent');
        }
        else
        {
            die('Email not sent');
        }
    }
}