<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TrueLab - Clinic and Diagnostic</title>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('web/css/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('web/css/styles.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('web/js/bootstrap-datepicker/css/bootstrap-datepicker.min.css');?>" />
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.min.css" />
</head>
<body>
 
<div id="container">
    <div class="col-md-2 sidebar">
      <span class="logged-in"><b>Logged in as :  <span class="username-label"><?=$username;?></span></b></span>
      <ul class="nav nav-sidebar">
        <li><a class="<?=$access['add_customer'];?> <?php if($location == 'users/users/_add'): echo "active"; endif; ?>" href="<?php echo base_url('index.php/customer/add');?>">Add Customer Information</a></li>
        <li><a class="<?=$access['edit_customer'];?>" href="<?php echo base_url('index.php/customer/');?>">Edit Customer Information</a></li>
        <li><a class="<?=$access['rad_tech'];?>" href="<?php echo base_url('index.php/radtech');?>">Rad Tech</a></li>
        <li><a class="<?=$access['med_tech'];?>" href="<?php echo base_url('index.php/medtech');?>">Med Tech</a></li>
        <!-- <li><a href="#">Inventory</a></li> -->
        <!-- <li><a href="#">Sales Report</a></li> -->
        <li><a href="<?php echo base_url('index.php/login/logout');?>">Logout</a></li>
      </ul><!--.nav-sidebar-->
    </div><!--.sidebar-->
    <div class="col-md-offset-2 col-md-10 main-container">
      <div class="header">
        <img src="<?php echo site_url('web/images/logo.png');?>" />
      </div><!--header-->
      <div class="module-container">
        <script type="text/javascript" src="<?php echo site_url('web/js/jquery/jquery-1.11.2.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo site_url('web/css/bootstrap/js/bootstrap.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('web/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js');?>"></script>
        <?php echo modules::run("$location", $param); ?>
      </div><!--.module-container-->
    </div><!--.main-container-->
</div>

<script type="text/javascript">
  

</script>
</body>
</html>