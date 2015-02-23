<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TrueLab - Clinic and Diagnostic</title>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('web/css/bootstrap/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('web/css/styles.css');?>">
</head>
<body>
 
<div id="container">
    <div class="col-md-2 sidebar">
      <span class="logged-in"><b>Logged in as :  <span class="username-label">reymar</span></b></span>
      <ul class="nav nav-sidebar">
        <li><a class="<?php if($location == 'users/users/_add'): echo "active"; endif; ?>" href="<?php echo base_url('index.php/users/add');?>">Add Customer Information</a></li>
        <li><a href="#">Edit Customer Information</a></li>
        <li><a href="#">Rad Tech</a></li>
        <li><a href="#">Med Tech</a></li>
        <li><a href="#">Inventory</a></li>
        <li><a href="#">Sales Report</a></li>
        <li><a href="#">Logout</a></li>
      </ul><!--.nav-sidebar-->
    </div><!--.sidebar-->
    <div class="col-md-offset-2 col-md-10 main-container">
      <div class="header">
        <img src="<?php echo site_url('web/images/logo.png');?>" />
      </div><!--header-->
      <div class="module-container">
        <?php echo modules::run("$location"); ?>
      </div><!--.module-container-->
    </div><!--.main-container-->
</div>
<script type="text/javascript" src="<?php echo site_url('web/js/jquery/jquery-1.11.2.min.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('web/css/bootstrap/bootstrap.min.js');?>"></script>
</body>
</html>