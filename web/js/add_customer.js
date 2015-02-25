$(function(){
    var existingCustomerTable = null;

    $('.datepicker').datepicker({
      autoclose: true,
      endDate: new Date()
    });

    $('#save-customer-btn').on('click', saveCustomer);

    existingCustomerTable = $('#existing-customer-dialog table').DataTable({
        "ajax": "/truelab/index.php/users/getCustomers",
        "columns": [
            { "data": "num" },
            { "data": "lastname" },
            { "data": "firstname" },
            { "data": "birthday" },
            { "data": "select" }
        ]
    });

    $('#existing-customer-btn').click(function() {
        existingCustomerTable.ajax.reload();

        $('#existing-customer-dialog').modal();
    });

    $('#add-more-services').on('click', function(){
        var service_count = $('#service-count').val(),
            next_count = parseInt(service_count,10) + 1;
        if(service_count < 10){
            $('#service-count').val(next_count);
            $('#service-container').append($('.service-form').html());
        }
        else
            handleResultById({
                    success: false,
                    msg: 'Customer can only have maximum of 10 services'
                }, 'add-service-alert');
    });

    $('.service-cat').on('change',function(){
        var child = $(this).attr('data-child'),
            service_id = $(this).find(':selected').attr('data-id');
        console.log($(this).find(':selected'));
        $('#'+child).find('.service-null').attr('selected', true);
        $('#'+child).find('.child-options').hide();
        $('#'+child).find('.child-'+ service_id).show();

    });
});

function validate(form) {
    var proceed = true;
    var inputs = $(form + ' input');

    for(var i = 0; i < inputs.length; i++) {
        var el = $(inputs[i]);
        var val = $.trim(el.val());

        if(el.attr('type') == 'text' && val.length == 0) {
            var fg = el.parents('.form-group');
            fg.addClass('has-error');

            configureFadeInputError(fg);

            proceed = false;
        }
    }

    return proceed;
}

function configureFadeInputError(el) {
    setTimeout(function() {
        el.removeClass('has-error');
    }, 5000);
}

function saveCustomer() {

    if(validate('#customer-form')) {
        var datastring = $('.form-1').serialize();

        $.ajax({
            type: "POST",
            url: "/truelab/index.php/users/saveCustomer",
            data: datastring,
            dataType: "json",
            success: function(data) {
                handleResult(data);
            },
            error: function(){
                alert('error handing here');
            }
        });
    } else {
        handleResult({
            success: false,
            msg: 'Please fill the highlighted fields'
        });
    }
    
}   

function handleResult(data) {
    var el = $('#save-customer-alert');
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

function handleResultById(data, id){
    var el = $('#'+id);
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
function addService(){

}