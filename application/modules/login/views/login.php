<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TrueLab - Clinic and Diagnostic</title>
    <link rel="icon" type="image/png" href="<?php echo site_url('web/images/favicon.png');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('web/css/bootstrap/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('web/js/bootstrap-datepicker/css/bootstrap-datepicker.min.css');?>" />
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.min.css" />
    <style type="text/css">
        body {
          padding-top: 40px;
          padding-bottom: 40px;
          background-color: #eee;
        }

        .form-signin {
          max-width: 330px;
          padding: 15px;
          margin: 0 auto;
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
          margin-bottom: 10px;
        }
        .form-signin .checkbox {
          font-weight: normal;
        }
        .form-signin .form-control {
          position: relative;
          height: auto;
          -webkit-box-sizing: border-box;
             -moz-box-sizing: border-box;
                  box-sizing: border-box;
          padding: 10px;
          font-size: 16px;
        }
        .form-signin .form-control:focus {
          z-index: 2;
        }
        .form-signin input[type="email"] {
          margin-bottom: -1px;
          border-bottom-right-radius: 0;
          border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
          margin-bottom: 10px;
          border-top-left-radius: 0;
          border-top-right-radius: 0;
        }
    </style>
</head>
<body>


<div id="container">
    <form class="form-signin">
        <div class="row">
            <!-- spacer -->
            <div style="float: left;" class="alert col-sm-1">
                <p>&nbsp;</p>
            </div>
            <div id="login-msg" class="alert alert-success col-sm-10" role="alert" style="display: none; float: left;">
                <strong></strong><p></p>
            </div>
        </div><!--.row-->
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="username" class="sr-only">Username</label>
        <input type="email" id="username" class="form-control" placeholder="Username" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" placeholder="Password" required>
        <a href="#" id="login-btn" class="btn btn-lg btn-primary btn-block" type="submit">Log in</a>
    </form>
</div><!--.contaienr-->
<div class="row" style="text-align: center;">
  <img src="<?=site_url('/web/images/logo.png');?>" style="width: 500px;">
</div><!--.row-->
<script type="text/javascript" src="<?php echo site_url('web/js/jquery/jquery-1.11.2.min.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('web/css/bootstrap/js/bootstrap.min.js');?>"></script>
<script type="text/javascript">
$('#login-btn').on('click', authenticate);
$('input').keypress(function(event){
     if(event.which == 13) 
        $('#login-btn').trigger('click');
});
function handleResult(data) {
    var el = $('#'+data.id);
    var addClass = (data.success) ? 'alert-success' : 'alert-danger';

    el.removeClass('alert-success').removeClass('alert-danger');
    el.addClass(addClass);
    el.find('p').text(data.msg);

    el.slideDown(400, function() {
        setTimeout(function() {
            el.slideUp();
        }, 5000);
    });
}

function authenticate(){
    var data = {
        'username' : $('#username').val(),
        'password' : $('#password').val()
    },
        btn = $(this);
    
    $.ajax({
        url: '/truelab/index.php/login/validate', 
        method: 'POST',
        data: data,
        success: function(response){
            var response = $.parseJSON(response);
            handleResult({
                success: (response.status == 'success') ? true : false,
                msg: response.msg, 
                id: 'login-msg'
            });
            if(response.status == 'success'){
                window.location.href = '<?=site_url();?>';
            }
        }
    });
}
</script>
</body>
</html>