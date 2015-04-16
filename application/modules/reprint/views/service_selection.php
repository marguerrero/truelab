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
    <input type="hidden" id="" name="is_edit" value="<?=$is_edit;?>" />
    <input type="hidden" name="trans-id" id="trans-id" value="<?=$trans_id;?>" />
    
    <fieldset class="<?=$allowed;?>">
        <legend>Services Selection</legend>
        <div id="service-container" class="form-horizontal">
            <div class="service-form">
                <div class="form-group">
                    <label for="service-1" class="col-sm-2 control-label">Existing Results</label>
                    <div class="col-sm-10">
                        <select data-child="service-child-1" class="form-control service-cat" id="service-1">
                            <?php foreach($data as $val): ?>
                                <option value="<?=$val['service_id'];?>">TEST</option>
                            <?php endforeach;?>
                        </select>
                    </div><!--.col-sm-10-->
                </div><!--.form-group-->
                <div class="hr-line"></div>
            </div><!--.service-form-->
            <input type="hidden" name="service-id" id="service-id" value="<?=$trans_id;?>" />
            <input type="hidden" id="service-count" value="1" />
        </div>
    </fieldset>
    </form><!--.main-form-->
    <div id="add-service-alert" class="alert alert-success col-sm-10" role="alert" style="display: none; float: left;">
        <strong></strong><p></p>
    </div>
</div><!--.row-->
<div id="button-footer" class="row margin-bottom ">
    <!-- <button class="btn btn-default">Reset</button> -->
    <button class="btn btn-default" id="add-more-services">Add More Services</button>
    <!-- <button class="pull-right btn btn-success">Save Transaction</button> -->
    <a href="#" class="pull-right btn btn-success " id="save-trans-btn" >Save Transaction</a>
</div><!--.row-->

<!-- For generating elements only -->
<div style="display:none;" class="service-form-generator">
    <div class="form-group">
        <label for="service-1" class="col-sm-2 control-label">Category</label>
        <div class="col-sm-10">
            <select data-child="service-child-1" class="form-control service-cat" id="service-1">
                <?php echo $service_options; ?>
            </select>
        </div><!--.col-sm-10-->
    </div><!--.form-group-->
    <div class="hr-line"></div>
</div><!--.service-form-generator-->
<script type="text/javascript">
    var curr_url = "<?=base_url('/index.php/reprint/'); ?>";
</script>

<!--<script type="text/javascript" src="<?php echo site_url('web/js/add_customer.js');?>"></script>-->
<!--<script type="text/javascript" src="<?php echo site_url('web/js/edit_customer.js');?>"></script>-->
<script type="text/javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>