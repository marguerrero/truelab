<?php 

require_once dirname(__FILE__) . '/PHPMailer/class.smtp.php';
require_once dirname(__FILE__) . '/PHPMailer/class.phpmailer.php';

class Mailer extends PHPMailer
{
    function __construct()
    {
        parent::__construct();
        
        $this->IsSMTP(); 
        $this->Host = "smtp.gmail.com"; 
        $this->SMTPDebug = 2; 
        $this->SMTPAuth = TRUE; 
        $this->SMTPSecure = "tls"; 
        $this->Port = 587; 
        $this->Username = 'truelab.clinicdiagnostic.rpts@gmail.com'; 
        $this->Password = 'tru3l@brpts'; 
        $this->Priority = 1; 
        $this->CharSet = 'UTF-8';
        $this->Encoding = '8bit';
        $this->Subject = 'Truelab Clinic Diagnostic';
        $this->ContentType = 'text/html; charset=utf-8\r\n';
        $this->From = 'truelab.clinicdiagnostic.rpts@gmail.com';
        $this->FromName = 'Truelab Clinic Diagnostic';
        $this->WordWrap = 900;
        $this->isHTML(true);
    }
}