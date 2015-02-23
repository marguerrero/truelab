$(function(){
    $('.datepicker').datepicker({
      autoclose: true,
      endDate: new Date()
    });
    $('#save-customer-btn').on('click', saveCustomer);

    
});

function saveCustomer(){
        console.log('here')
        var datastring = $('.form-1').serialize();
        $.ajax({
            type: "POST",
            url: "/truelab/index.php/users/saveCustomer",
            data: datastring,
            dataType: "json",
            success: function(data) {
                //var obj = jQuery.parseJSON(data); if the dataType is not specified as json uncomment this
                // do what ever you want with the server response
            },
            error: function(){
                  alert('error handing here');
            }
        });
    }