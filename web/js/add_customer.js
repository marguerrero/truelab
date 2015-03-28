$('#reset-fields').on('click', resetFields);
$('.customer-select').on('click', selectCustomer);
$('#cust-bday').on('change', calculateAge);
$('#customer-transaction').on('click', '.service-discount',displayDiscount);
$('#customer-transaction').on('change', '.service-sub-cat',displayPrice);
$('#customer-transaction').on('change', '.discount-type',displayPrice);
$('#customer-transaction').on('change', '.service-cat',displaySubCategory);
$('#existing-customer-dialog').on('click', '.customer-select', selectCustomer);
$('#save-trans-btn').on('click', saveTransaction);
$(function(){
    var existingCustomerTable = null;
    $('.datepicker').datepicker({
      autoclose: true,
      endDate: new Date()
    });

    existingCustomerTable = $('#existing-customer-dialog table').DataTable({
        "ajax": "/truelab/index.php/customer/getCustomers",
        "columns": [
            { "data": "num" },
            { "data": "lastname" },
            { "data": "firstname" },
            { "data": "birthday" },
            { "data": "select" }
        ]
    });

    $('#existing-customer-btn').click(function(event) {
        event.preventDefault();
        existingCustomerTable.ajax.reload();
    });

    $('#add-more-services').on('click', addMoreService);

    
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

        if(gender == 'M')
            $('#gender-male').prop('checked', true);
        else
            $('#gender-female').prop('checked', true);
        
        $('.customer-select').off('click', '**');
        return;
}

function displayDiscount(){
    var selection = $(this),
        container = selection.parent().parent().parent().parent().parent(),
        discount_checker = container.find('.service-discount-null');
        subcat = container.find('.service-sub-cat').find(':selected'),
        disc_container = container.find('.discount-type');
        reg_price = subcat.attr('data-reg-price'),
        disc_price = subcat.attr('data-disc-price'),
        price_display = container.find('.service-price'),
        disc_container = container.find('.discount-type');
        has_discount = selection.is(':checked');

        if(has_discount){
            price_display.val(disc_price);
            discount_checker.prop('checked', false);
            disc_container.attr('disabled', false);
            disc_container.find('.discount-null').hide();
            disc_container.find('.discount-info').show();
            
            $(disc_container.find('option')[1]).prop('selected', true);
        }
        else{
            disc_container.find('.discount-null').show();
            disc_container.find('.discount-info').hide();
            disc_container.attr('disabled', true);
            price_display.val(reg_price);
            discount_checker.prop('checked', true);
            $(disc_container.find('option')[0]).prop('selected', true);
        }
        return;
}

function displayPrice(){
    var selection = $(this),
        container = selection.parent().parent().parent(),
        reg_price = selection.find(':selected').attr('data-reg-price'),
        disc_price = selection.find(':selected').attr('data-disc-price'),
        disc_price_2 = selection.find(':selected').attr('data-disc-price-2'),
        has_discount = container.find('.service-discount').is(':checked'),
        service_price = container.find('.service-price');
        disc_container = container.find('.discount-type');
        console.log(disc_price_2);
        container.find('.service-discount').prop('checked', false);
        disc_container.find('.discount-type').attr('disabled', true);
        disc_container.find('.discount-null').show();
        disc_container.find('.discount-info').remove();
        if($(this).val() != 0){
            var less = reg_price - disc_price,
                less_2 = reg_price - disc_price_2,
                d_html = "<option data-price='" + disc_price + "' class='discount-info' value='1'> Less than " + less + " PHP ";
            
            if(less_2 != 0){
                d_html += "<option data-price='" + disc_price_2 + "' class='discount-info' value='2'> Less than " + less_2 + " PHP ";
            }
            disc_container.append(d_html);
        }

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
        var html = "<div class='service-form'><div class='row margin-bottom'><a href='#' class='remove-panel'><span class='remove-icon pull-right glyphicon glyphicon-remove'  aria-hidden='true'>&nbsp</span></a></div>" + $('.service-form-generator').html() + "</div><!--.service-form-->";
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
        panel.slideUp();
    setTimeout(function(){
        panel.remove()
    }, 2000)
}

function displaySubCategory(){
    var selection = $(this),
        container = selection.parent().parent().parent(),
        subcat = container.find('.service-sub-cat');
    service_id = $(this).find(':selected').attr('data-id');

    container.find('#service-child-1-dummy').html('<option class="service-null" value="0" selected="selected">-- SELECT SERVICE --</option>');

    var subcatOptions = $(subcat).find('.child-'+ service_id).clone();

    container.find('#service-child-1-dummy').append(subcatOptions);

    $(subcat).find('.service-null').attr('selected', true);
    $(subcat).find('.child-options').hide();
    container.find('.service-price').val("");
    $(subcat).find('.child-'+ service_id).show();
}

function saveTransaction(event){
    var postfields = $('#customer-transaction').serialize(),
        custfields = $('.form-1').serialize();
        button = $(this),
        cust_id = $('#cust-id').val(),
        is_disable = button.hasClass('disabled');
    event.preventDefault();
    if(cust_id)
        postfields += "&cust_id=" + cust_id;
    
    if(is_disable)
        return;
    button.addClass('disabled');
    $.ajax({
        url : '/truelab/index.php/customer/saveTransaction',
        method: 'POST',
        data: postfields,
        success: function(response){
            var response = $.parseJSON(response)
            if(response.status == 'failure'){
                button.removeClass('disabled');
                handleResultById({
                    success: false,
                    msg: response.msg
                }, 'add-service-alert');
                return;
            }
            else {
                handleResultById({
                    success: true,
                    msg: response.msg
                }, 'add-service-alert');
                setTimeout(function(){
                    // window.location.href = "/truelab/index.php/customer/review/"+response.trans_id;
                    redirectReview(response.trans_id);
                }, 1000);
                return;
            }
        }
    });
}

function redirectReview(trans_id){
    var form = $('.photo-upload'),
        url = form.attr('action') + "/" + trans_id;
    // form.html(field);
    form.attr('action', url);
    form.submit();
    return;

}

function resetFields() {
    $('#cust-firstname, #cust-lastname, #cust-id, #cust-bday').val('');
    $('#gender-male').prop('checked', true);
    $('#cust-age').val('0');
    $('.remove-panel').trigger('click');
}
