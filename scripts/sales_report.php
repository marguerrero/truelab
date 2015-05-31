<?php

/************************
*  REQUIRED CLASSES
************************/
include '../application/libraries/Mailer.php';
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
    $condition = "";
    
    switch ($argv[1]) {
        case 'daily':
            $report_type = "DAILY";
            $date_filter = date("Y-m-d");
            $condition = "WHERE CAST(transdate as Date) = '$date_filter' ";
            break;
        case 'weekly':
            $report_type = "WEEKLY";
            $date_filter_end = date("Y-m-d");
            $date_filter_start = date("Y-m-d", strtotime ('- 6 days'));
            $condition = " WHERE CAST(transdate as Date) BETWEEN '$date_filter_start' AND '$date_filter_end' ";
            break;
        case 'monthly':
            $report_type = "MONTHLY";
            $date_filter_end = date("Y-m-d");
            $date_filter_start = date("Y-m-d", strtotime ('- 1 month'));
            $condition = " WHERE CAST(transdate as Date) BETWEEN '$date_filter_start' AND '$date_filter_end' ";
            break;
        default:
            $report_type = "DAILY";
            $date_filter = date("Y-m-d");
            $condition = " WHERE CAST(transdate as Date) = '$date_filter' ";
            break;
    }
    $db_info = parse_ini_file('db_config.ini');
    $servername = $db_info['server'];
    $username = $db_info['username'];
    $password = $db_info['password'];
    $dbname = $db_info['dbname'];
    
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
        LEFT JOIN categ_main ee ON ee.main_test_id=dd.main_test_id
        $condition
    ";
    
    
    mysqli_select_db($conn, $dbname);
    $result = $conn->query($sql);
    
    
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
    $total = 0;
    while($row = $result->fetch_assoc()) {
        $disc_type = "";
        $amount = "";
        switch ($row['disc_type']) {
            case 1:
                $disc_type = "Normal Discount";
                $amount = ($row['disc_price']) ? $row['disc_price'] : $row['reg_price'];
                break;
            case 2:
                $disc_type = "Special Discount";
                $amount = ($row['disc_price_2']) ? $row['disc_price_2'] : $row['reg_price'];
                break;
            default:
                $disc_type = "No Discount";
                $amount = $row['reg_price'];
                break;
        }
        
        $data[] = array(
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'receipt_no' => $row['receipt_no'],
            'transdate' => date('m-d-Y h:i A', strtotime($row['transdate']) ),
            'subcateg' => $row['subcateg'],
            'category' => $row['category'],
            'disc_type' => $disc_type,
            'amount' => $amount
        );
        $total += $amount;
    }
    $full_data[] = $data;
    //-- Generate inventory report data
    // $data = $result;
    $sql = " SELECT * FROM inventory ";
    $result = $conn->query($sql);
    $data = array();
    $total_inv = 0;
    while($row = $result->fetch_assoc()) {
        $total_inv += $row['count'];
        $data[] = array(
            'name' => $row['description'],
            'count' => $row['count']
        );
    }
    $full_data[] = $data;
    
    //-- Configuration for Report Generation
    $upper_area = array();
    $upper_area[] = array('label' => 'Report Type', 'value' =>$report_type);
    $upper_area[] = array('label' => 'Date', 'value' => date("Y-m-d"));

    $lower_area = array();
    $lower_area[] = array('label' => 'Total Sales', 'value' => $total );

    $lower_area_2 = array();
    $lower_area_2[] = array('label' => 'Total Items', 'value' => $total_inv );

    $suffix = date("Y-m-d");
    $config = array();
    $config['header'][] = array('First Name', 'Last Name' , 'Receipt No', 'Transaction Date', 'Service', 'Category','Discount Type' ,'Amount');
    $config['header'][] = array('Inventory', 'Quantity');

    $config['title'][] = "Sales Report";
    $config['title'][] = "Invetory Report";
    $config['excel_class'] = 'Excel5';
    $config['filename'] = __cnPREFIX_FILENAME__."-$report_type-$suffix.xls";
    $config['directory'] = __cn_REPORT_DIR__;
    $config['upper_area'] = $upper_area;
    $config['lower_area'][] = $lower_area;
    $config['lower_area'][] = $lower_area_2;

    //--Saves the generated data to local which wil be used as attachment
    // $report_generation = new ReportGeneration($data, $config);
    $report_generation = new ReportGeneration($full_data, $config);
    $report_generation->generateMultipleTab();

    $filename = $config['directory']."/".$config['filename'];
    

    $html_body = "Sales Report for the Month of";
    $mail = new Mailer();
    $mail->AddAddress("truelab.clinicdiagnostic.rpts@gmail.com");
    $mail->AddBCC("reymarguerrero@gmail.com");
    $mail->Body = "Please see attached for the report.";
    $mail->Subject = "Truelab Clinic Diagnostic Sales Reports [$report_type]- " . date('Y-m-d');
    $mail->AddAttachment('reports/'.$config['filename']);
    
    // if($mail->Send())
    // {
    //     die('Email sent');
    // }
    // else
    // {
    //     die('Email not sent');
    // }

    echo "sent \n " ;
}
catch(Exception $e)
{
    echo "CATCH";
    print $e->getMessage();
    // mail($email_to, $email_subject, $email_message."<br><br>ERROR MESSAGE: ".$e->getMessage(), $email_headers);
}
?>
