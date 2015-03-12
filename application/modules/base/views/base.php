<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TrueLab - Clinic and Diagnostic</title>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('web/css/bootstrap/css/bootstrap.min.css');?>">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo site_url('web/css/styles.css');?>"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('web/js/bootstrap-datepicker/css/bootstrap-datepicker.min.css');?>" />
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.min.css" />

    <script type="text/javascript" src="<?php echo site_url('web/js/jquery/jquery-1.11.2.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('web/css/bootstrap/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('web/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js');?>"></script>

    <style type="text/css">
      body {
        background: #263948;
      }

      #container {
        margin-top: 65px;
      }

      .navbar img {
        width: 210px;
        margin: auto;
      }

      .navbar .img-container {
        width: 220px;
        height: 40px;
        margin: auto;
        margin-top: 3px;
      }

      .nav-sidebar {
        margin-top: 20px;
      }

      .sidebar a {
        color: white;
      }

      .sidebar li a:hover, 
      .sidebar li a:focus {
        border-left: #014aa4 5px solid;
        background-color: #1e303d;
      }

      .sidebar li.active {
        border-left: #d64545 5px solid;
      }

      .sidebar li.active a:hover, 
      .sidebar li.active a:focus {
        border-left: #d64545 0px solid;
      }

      .sidebar {
        width: 250px;
        z-index: 1000;
        position: fixed;
        height: 100%;
        overflow-y: auto;
        margin-top: 15px;
      }

      .body-content {
        background-color: white;
        margin-left: 250px;
      }

      .body-content {
        padding: 10px 50px;
        margin-right: 50px;
        margin-bottom: 25px;
        border-radius: 3px;
        -webkit-box-shadow: 0px 0px 6px 1px rgba(0,0,0,0.51);
        -moz-box-shadow: 0px 0px 6px 1px rgba(0,0,0,0.51);
        box-shadow: 0px 0px 6px 1px rgba(0,0,0,0.51);
      }

      .logged-in-details {
        color: white;
        padding: 5px 15px;
        background-color: #1b2e3d;
        border-left: #003475 5px solid;

        -webkit-box-shadow: 0px 0px 3px -1px rgba(0,0,0,1);
        -moz-box-shadow: 0px 0px 3px -1px rgba(0,0,0,1);
        box-shadow: 0px 0px 3px -1px rgba(0,0,0,1);
      }

      .logged-in-details .user {
        font-weight: bold;
        margin: 0;
      }

      .logged-in-details .user-type, .logged-in-details .user-logout {
        color: #6c7e8c;
        font-size: 12px;
      }

      .logged-in-details .user-logout {
        display: block;
        font-style: italic;
      }
    </style>
</head>
<body>
 
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="img-container">
        <img src="<?php echo site_url('web/images/logo.png');?>" />
      </div>
    </div>
  </nav>
<div id="container">
    <div class="sidebar">
        <div class="logged-in-details">
          <p class="user"><?=$username;?></p>
          <span class="user-type">Radtech</span>
          <a class="user-logout" href="<?php echo base_url('index.php/login/logout');?>">logout</a>
        </div>
      
      <ul class="nav nav-sidebar">
        <li><a class="<?=$access['add_customer'];?> <?php if($location == 'users/users/_add'): echo "active"; endif; ?>" href="<?php echo base_url('index.php/customer/add');?>">Add Customer Information</a></li>
        <li><a class="<?=$access['edit_customer'];?>" href="<?php echo base_url('index.php/customer/');?>">Edit Customer Information</a></li>
        <li><a class="<?=$access['rad_tech'];?>" href="<?php echo base_url('index.php/radtech');?>">Rad Tech</a></li>
        <li><a class="<?=$access['med_tech'];?>" href="<?php echo base_url('index.php/medtech');?>">Med Tech</a></li>
        <!-- <li><a href="#">Inventory</a></li> -->
        <!-- <li><a href="#">Sales Report</a></li> -->

      </ul><!--.nav-sidebar-->
    </div><!--.sidebar-->

      <div class="body-content">
        <?php echo modules::run("$location", $param); ?>
      </div>

</div>

<script type="text/javascript">
  

</script>
</body>
</html>