<script type="text/javascript">
    $('#template-select').val('');
    $('#template-select').on('change', displayTemplate);
    $('#export').on('click', exportData);
    $('#print-preview-btn').on('click', displayReview);
    $(document).on('ready', initializeTemplate);

    function displayTemplate(){
        var tmpl = $(this).find(':selected').attr('data-template');
        if(!tmpl){
            $('#export').addClass('disabled');
            return;
        }
        $('#export').removeClass('disabled');
        $('.template').hide().removeClass('active-template');
        $('#'+tmpl).addClass('active-template').fadeIn();
    }

    function exportData(){
        var is_disabled = $('#export').hasClass('disabled');
        if(!is_disabled)
            $('#template-select').val('');
        var msg = "The customer service had already been exported. You can not edit any results again.";
        $('#message-info').removeClass('alert-success').addClass('alert-danger');
        $('#message-info span').html(msg);
        $('#export').addClass('disabled')
        $('.active-template').find('form').submit();
    }

    function initializeTemplate(){
        var tp_code = $('#code').val(),
            prof_pic = $('.prof-pic').val(),
            exported = $('#exported').val(),
            require_pic = $('#require-pic').val();

        if(!tp_code){
            alert('No template code for the selected service. Please consult your administrator');
            return;
        }
        
        $('#template-select').find('[data-template='+tp_code+']')
            .prop('selected',true)
            .trigger('change');

        if((require_pic == 1) && (prof_pic == "") ) {
            var msg = "The customer has no picture. Please upload one to proceed.";
            $('#message-info').removeClass('alert-success').addClass('alert-danger');
            $('#message-info span').html(msg);
            $('#export').addClass('disabled')
        }
        if(require_pic == 1)
            $('.review-profile').show();
        if(exported == 1 ){
            var msg = "The customer service had already been exported. You can not edit any results again.";
            $('#message-info').removeClass('alert-success').addClass('alert-danger');
            $('#message-info span').html(msg);
            $('.active-template input').prop('readonly', true);
            $('.active-template textarea').prop('readonly', true);
            // $('#export').addClass('disabled')
        }

        $('#message-info').show();
    }

    function displayReview(){
        var template = $('.active-template').html();
        $('.template-container').html(template);
        
        $('#print-preview').find('h1').css('background', '#fff').css('font-size', '14px').css('font-weight', 'bold').css('background', 'rgb(47,99, 161)').css('color','#fff');
        $('#print-preview').find('td').css('border', 'none');
        $('#print-preview').find('input').prop('disabled', 'true').attr('placeholder', '');
        $('#print-preview').find('textarea').prop('disabled', 'true').attr('placeholder', '').css({'background': 'none', 'border':'none', 'box-shadow':'none'});
        $('#print-preview').find('input[name=fullname]').css('text-align', 'center');
        $('#print-preview').find('input[name=radiologist]').css('text-align', 'center');
        $('.template-container').find('div').css('margin-top','0px').css('margin-bottom','0px');
        var date_released_container = $('#print-preview').find('#customer-service').find('tr:eq(3)');
        date_released_container.find('td[colspan=3]').remove();

        //-- Update the values from the templates
        var main_template = $('.active-template').find('input');
        $(main_template).each(function(key, val){
            var name = $(val).attr('name'),
                i_val = $(val).val(),
                review_container = $('.template-container');
            review_container.find('input[name='+ name +']').val(i_val).css('box-shadow', 'none');
        });
        var main_template_2 = $('.active-template').find('textarea');
        $(main_template_2).each(function(key, val){
            var name = $(val).attr('name'),
                i_val = $(val).val(),
                review_container = $('.template-container');
            review_container.find('textarea[name='+ name +']').val(i_val).css('box-shadow', 'none');
        });

        $.ajax({
            url:'/truelab/index.php/medtech/getTimestamp', 
            success:function(response){ 
                var data = $.parseJSON(response),
                    date_released = data.timestamp,
                    html = "<td style='border:none'>Date released</td><td style='border:none'>:</td><td style='border:none'>"+ '<input style="box-shadow:none;" type="text" readonly="" class="form-control" value="'+ date_released +'" name="date_recv" disabled="" placeholder="">' +  "</td>" ;
                    date_released_container.append(html);
            } 
        });
    }
</script>
    