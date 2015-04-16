<div class="row">
    <h1> Reprint Customer Information</h1>
    <ol class="breadcrumb">
      <li>Customer Selection</li>
      <li class="active"><a href="#">Service Selection</a></li>
      <li>Print Receipt</li>
    </ol>
    <div class="alert alert-<?=$status;?> col-md-5">
        <?=$msg;?>
    </div>
</div>
<div class="row margin-left-sm">
    <form id="customer-transaction" class="form-horizontal form-1">
    <input type="hidden" id="" name="cust_id" value="<?=$is_edit;?>" />
    
    <fieldset class="<?=$allowed;?>">
        <legend>Services Selection</legend>
        <div id="service-container" class="form-horizontal">
            <div class="service-form">
                <div class="form-group">
                    <label for="service-1" class="col-sm-2 control-label">Existing Results</label>
                    <div class="col-sm-10">
                        <select name="prev-service[]" data-child="service-child-1" class="form-control service-cat" id="service-1">
                            <option value="">SELECT EXISTING RESULT</option>
                            <?php foreach($data as $val): ?>
                                <option value="<?=$val->service_id;?>"><?=$val->subcateg;?> [<?=$val->receipt_no;?>]</option>
                            <?php endforeach;?>
                        </select>
                    </div><!--.col-sm-10-->
                </div><!--.form-group-->
                <div class="hr-line"></div>
            </div><!--.service-form-->
        </div>
    </fieldset>
    </form><!--.main-form-->
    <div id="add-service-alert" class="alert alert-success col-sm-10" role="alert" style="display: none; float: left;">
        <strong></strong><p></p>
    </div>
</div><!--.row-->
<?php if(count($data) > 0): ?>
<div id="button-footer" class="row margin-bottom ">
    <!-- <button class="btn btn-default">Reset</button> -->
    <button class="btn btn-default" id="add-more-services">Add More Services</button>
    <!-- <button class="pull-right btn btn-success">Save Transaction</button> -->
    <a href="#" class="pull-right btn btn-success " id="save-trans-btn" >Save Transaction</a>
</div><!--.row-->
<?php endif; ?>
<!-- For generating elements only -->
<div style="display:none;" class="service-form-generator">
    <div class="form-group">
        <label for="service-1" class="col-sm-2 control-label">Existing Results</label>
        <div class="col-sm-10">
            <select name="prev-service[]" data-child="service-child-1" class="form-control service-cat" id="service-1">
                <option value="">SELECT EXISTING RESULT</option>
                <?php foreach($data as $val): ?>
                    <option value="<?=$val->service_id;?>"><?=$val->subcateg;?> [<?=$val->receipt_no;?>]</option>
                <?php endforeach;?>
            </select>
        </div><!--.col-sm-10-->
    </div><!--.form-group-->
    <div class="hr-line"></div>
</div><!--.service-form-generator-->

<script type="text/javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $('#add-more-services').on('click', addService);
    $('.service-form').on('click', '.remove-panel', removeService);
    $('#save-trans-btn').on('click', saveTransaction);

    function addService(){
        var options = $('.service-form-generator').html(),
            html = "<div class='row remove-container' style='margin-bottom:15px;'><a href='#' class='remove-panel'><span class='remove-icon pull-right glyphicon glyphicon-remove'  aria-hidden='true'>&nbsp</span></a></div>";
            html += options;
            
        $('.service-form').append(html);
    }

    function removeService(event){
        event.preventDefault();
        var container = $(this).parents('.remove-container'),
            service = container.next();
        service.slideUp();
        container.remove();
        setTimeout(function(){
            service.remove();
        },2000);
    }

    function saveTransaction(event){
        event.preventDefault();
        var btn = $(this);
        btn.addClass('disabled');
        var formdata = $('#customer-transaction').serialize();
        $.post('<?=base_url("/index.php/reprint/saveTransaction");?>', formdata, function(data){
                var data = JSON.parse(data);
                if(data.status == 'success'){
                    handleResult({
                        success: true,
                        id: 'add-service-alert',
                        msg: data.msg
                    });
                    setTimeout(function(){
                        window.location.href = data.url_redirect;
                    }, 2000)
                    return;
                } 
                else {
                    handleResult({
                        success: false,
                        id: 'add-service-alert',
                        msg: data.msg
                    });
                    btn.removeClass('disabled');
                    return;
                }
            }
        );
    }

    function handleResult(data) {
        var el = $('#'+ data.id);
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
</script>