<?php
 

/************************
*  REQUIRED CLASSES
************************/
include 'mailer/class.phpmailer.php';
include 'ReportGeneration.php';
include 'phpexcel/PHPExcel.php';

/************************
*  CONSTANTS
************************/
define("__cnWEBMASTER__", "reymarguerrero@gmail.com");
define("__cnPREFIX_FILENAME__", "TL_reports");
define("__cn_REPORT_DIR__", "reports");
define("__cnSUBJECT__", "Truelab Sales Report ");
define("__cn_DATE_EXCEPTION__", "2014-07-02"); //-- Change this date to add exception
define("__cn_LASTTRANS_EXCEPTION__", "4913"); //-- Change this lastest transaction to add exception


/************************
*  CONFIGURATIONS
************************/

function query(&$oDB, $sql, $no_return = false)
{
    ini_set("memory_limit", "1028M");
    $result = pg_query($oDB, $sql) or throwException(pg_last_error($oDB));
    if($error = pg_last_error())
        die("ERROR : $error : $sql");
    
    if (!$no_return)
    {
        $data = array();
        while($row = pg_fetch_assoc($result))
            $data[] = $row;
        
        return $data;
    }
}

function formatNull($str = NULL)
{
    if($str === NULL)
        return "NULL";
    else
        return "'".pg_escape_string($str)."'";
}


function throwException($msg = "Unknown Error")
{
    throw new Exception($msg);
}


try
{
    $db_info = parse_ini_file('db_config.ini');
    $servername = $db_info['server'];
    $username = $db_info['username'];
    $password = $db_info['password'];
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $sql = 
    "
        SELECT  
        firstname, 
        lastname, 
        receipt_no, 
        transdate, 
        dd.subcateg, 
        ee.category, 
        aa.disc_type, 
        dd.reg_price,
        dd.disc_price,
        dd.disc_price_2
        FROM customer_service aa 
        LEFT JOIN customer_transaction bb ON bb.id=aa.trans_id 
        LEFT JOIN cust_list cc ON cc.service_id=bb.cust_id 
        LEFT JOIN subcat dd ON dd.sub_test_id=aa.subcat_id 
        LEFT JOIN categ_main ee ON ee.main_test_id=dd.main_test_id;
    ";
    
    

    $result = $conn->query($sql);
    echo "NO ERROR";
    
	// $result = array();
	// for($i = 0; $i < 5; $i++){
	// 	$result[] = array(
	// 		'firstname' => 'Reymar',
	// 		'lastname' => 'Guerrero',
	// 		'receipt_no' => 'TLDR'
	// 	);
	// }
    if($result === FALSE) { 
        die(mysql_error()); // TODO: better error handling
    }
    
    $data = array();
    while($row = $result->fetch_assoc()) {
        $data[] = array(
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'receipt_no' => $row['receipt_no'],
            'transdate' => $row['transdate'],
            'subcateg' => $row['subcateg'],
            'category' => $row['category'],
            'amount' => $row['reg_price']
        );
    }
    //-- Generate sales report data
    // $data = $result;


    //-- Configuration for Report Generation
    $upper_area = array();
    $upper_area[] = array('label' => 'Date From', 'value' =>"TES");
    $upper_area[] = array('label' => 'Date To', 'value' => "TES");

    $lower_area = array();
    $lower_area[] = array('label' => 'Total Sales', 'value' => "TEST" );

    $config = array();
    $config['header'] = array('First Name', 'Last Name' , 'Receipt No', 'Transaction Date', 'Service', 'Category', 'Amount');
    $config['excel_class'] = 'Excel5';
    $config['filename'] = __cnPREFIX_FILENAME__."_$year-$month.xls";
    $config['directory'] = __cn_REPORT_DIR__;
    $config['upper_area'] = $upper_area;
    $config['lower_area'] = $lower_area;

    //--Saves the generated data to local which wil be used as attachment
    $report_generation = new ReportGeneration($data, $config);
    $report_generation->generate();

    $filename = $config['directory']."/".$config['filename'];
    

    $html_body = "Sales Report for the Month of";
    //--Sends the generated report the the recipients
    // $mail = new phpmailer();
    // if($email_array)
    // {
    //     foreach($email_array as $email)
    //         $mail->AddAddress($email);
    // }
    // $mail->AddBcc(__cnWEBMASTER__);
    // $mail->Host = "localhost";
    // $mail->FromName = "OCOC Report";
    // $mail->From = "webuser@concentrix.com";
    // $mail->Subject  = __cnSUBJECT__;
    // $mail->AddAttachment($filename);
    // $mail->Body = $html_body;
    // $mail->Send();
    echo "sent \n " ;
}
catch(Exception $e)
{
    echo "CATCH";
    print $e->getMessage();
    // mail($email_to, $email_subject, $email_message."<br><br>ERROR MESSAGE: ".$e->getMessage(), $email_headers);
}
?>
