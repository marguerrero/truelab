$('.customer-select').on('click', selectCustomer);
$('#cust-bday').on('change', calculateAge);
$('.service-sub-cat').on('change',displayPrice);
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
        setTimeout(function(){
            console.log('pressed');
            $('.customer-select').on('click', selectCustomer);
        }, 1000);

    });

    $('#add-more-services').on('click', addMoreService);

    $('.service-cat').on('change',function(){
        var child = $(this).attr('data-child'),
            service_id = $(this).find(':selected').attr('data-id');
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

function selectCustomer(){
    var selection = $(this),
        id = selection.attr('data-id'),
        lastname = selection.attr('data-lastname'),
        firstname = selection.attr('data-firstname'),
        bday = selection.attr('data-bday'),
        gender = selection.attr('data-gender');
        age = selection.attr('data-age');

        
        $('#cust-id').val(id);
        $('#cust-lastname').val(lastname);
        $('#cust-firstname').val(firstname);
        $('#cust-bday').val(bday);
        $('#cust-age').val(age);
        if(gender == 'M'){
            console.log('here');
            $('#gender-male').prop('checked', true);
        }
        else{
            console.log('hey');
            $('#gender-female').prop('checked', true);
        }
        $('.customer-select').off('click', '**');
        return;
}

function displayPrice(){
    var selection = $(this),
        container = selection.parent().parent().parent(),
        reg_price = selection.find(':selected').attr('data-reg-price'),
        disc_price = selection.find(':selected').attr('data-disc-price'),
        has_discount = container.find('.service-discount').attr('checked'),
        service_price = container.find('.service-price');

        service_price.attr('data-reg-price', reg_price);
        service_price.attr('data-disc-price', disc_price);
        service_price.val(reg_price);
        if(has_discount)
            service_price.val(disc_price);
}

function addMoreService(){
    $('.remove-panel').off('click', '**');
    var service_count = $('#service-count').val(),
        next_count = parseInt(service_count,10) + 1;
    if(service_count < 10){
        var html = "<div class='service-form'><div class='row margin-bottom'><a href='#' class='remove-panel'><span class='remove-icon pull-right glyphicon glyphicon-remove'  aria-hidden='true'>&nbsp</span></a></div>" + $('.service-form').html() + "</div><!--.service-form-->";
        $('#service-count').val(next_count);
        $('#service-container').append(html);
        window.location.href = '#add-more-services';
        $('.remove-panel').on('click', removeForm);
    }
    else
        handleResultById({
                success: false,
                msg: 'Customer can only have maximum of 10 services'
            }, 'add-service-alert');
    
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

function calculateAge(){
    var today = new Date(),
         bday = new Date($('#cust-bday').val()),
         partial_age = today - bday,
         age = Math.floor(partial_age/31557600000);
    $('#cust-age').val(age);
    return;
}

function removeForm(event){
    event.preventDefault();
    var panel = $(this).parent().parent();
    console.log(panel);
        panel.slideUp();
    setTimeout(function(){
        panel.remove()
    }, 2000)
}