<div class="row"><h2> Add Customer Information</h2></div>
<div class="row margin-left-sm">
    <form id="customer-transaction" class="form-horizontal form-1" enctype="multipart/form-data">
    <fieldset class="main-form">
        <legend>Customer Information</legend>
        <div class="row" style="margin-bottom: 30px;"><a href="#" data-toggle="modal" data-target="#existing-customer-dialog"  id="#existing-customer-btn" class="btn btn-default">Existing Customer</a></div>
        <div class="row">
                <div class="form-group" data-service-order="1">
                    <label for="first-name" class="col-sm-2 control-label">Customer ID</label>
                    <div class="col-sm-10">
                        <input type="text" name="cust-id" class="form-control" id="cust-id" readonly placeholder="[ NEW CUSTOMER ]">
                    </div>
                </div><!--.form-group-->
                <div class="form-group">
                    <label for="last-name" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="first-name" class="form-control" id="cust-firstname" placeholder="Enter Customer's First Name">
                    </div>
                </div><!--.form-group-->
                <div class="form-group">
                    <label for="middle-name" class="col-sm-2 control-label">Middle Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="middle-name" class="form-control" id="cust-middlename" placeholder="Enter Customer's Middle Name">
                    </div>
                </div><!--.form-group-->
                <div class="form-group" data-service-order="1">
                    <label for="first-name" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="last-name" class="form-control" id="cust-lastname" placeholder="Enter Customer's Last Name">
                    </div>
                </div><!--.form-group-->
                <div class="form-group">
                    <label for="first-name" class="col-sm-2 control-label">Gender</label>
                    <div class="col-sm-1">
                        <div class="radio">
                          <label><input type="radio" name="gender" class="cust-gender" id="gender-male" value="M" checked>Male</label>
                        </div><!--.radio-->
                    </div>
                    <div class="col-sm-1">
                        <div class="radio">
                          <label><input type="radio" name="gender" class="cust-gender" id="gender-female" value="F">Female</label>
                        </div><!--.radio-->
                    </div>
                </div><!--.form-group-->
                <div class="form-group">
                    <label for="birthday" class="col-sm-2 control-label">Birthday</label>
                    <div class="col-sm-3">
                        <input name="bday" class="datepicker" type="text" class="form-control" id="cust-bday" placeholder="Customer's Birthday">
                    </div>
                </div><!--.form-group-->
                <div class="form-group">
                    <label for="birthday" class="col-sm-2 control-label">Age</label>
                    <div class="col-sm-3">
                        <input name="age"  type="text" readonly class="form-control" id="cust-age" placeholder="Customer's Age" />
                    </div>
                </div><!--.form-group-->
                 <div class="form-group">
                    <label for="physician" class="col-sm-2 control-label">Physician</label>
                    <div class="col-sm-3">
                        <input name="physician" value="Dr. Anna Janine B. Gamulo, MD" id="physician" type="text" class="form-control" placeholder="Customer's Physician" />
                    </div>
                </div><!--.form-group-->
                <!-- <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="button" class="btn btn-default pull-right" id="save-customer-btn">Save Customer</button>
                    </div>
                </div><!--.form-group--> 
            <!-- </form> -->

            <div id="save-customer-alert" class="alert alert-success col-sm-10" role="alert" style="display: none; float: left;">
                <strong></strong><p></p>
            </div>

            <!-- spacer -->
            <div style="float: left;" class="alert col-sm-2">
                <p>&nbsp;</p>
            </div>
        </div><!--.row-->
    </fieldset>
    <fieldset class="">
        <legend>Services Selection</legend>
        <div id="service-container" class="form-horizontal">
            <div class="service-form">
                <div class="form-group">
                    <label for="service-1" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                        <select data-child="service-child-1" class="form-control service-cat" id="service-1">
                            <?php echo $service_options; ?>
                        </select>
                    </div><!--.col-sm-10-->
                </div><!--.form-group-->
                <div class="form-group">
                    <label for="service-1" class="col-sm-2 control-label">Sub-Category</label>
                    <div class="col-sm-10 service-sub-cat-container">
                        <select class="form-control service-sub-cat" name="subcat-id[]" id="service-child-1-dummy">
                            <option class="service-null" value="0" selected="selected">-- SELECT SERVICE --</option>
                        </select>
                        <select class="form-control service-sub-cat" name="" id="service-child-1" style="display: none">
                            <?php echo $sub_options; ?>
                        </select>
                    </div><!--.col-sm-10-->
                </div><!--.form-group-->
                <div class="form-group">
                    <label for="first-name" class="col-sm-2 control-label">Discount</label>
                    <div class="col-sm-1">
                        <div class="checkbox">
                          <label><input class="service-discount" type="checkbox" name="has-discount[]" id="service-1-discount" value="1"></label>
                        </div><!--.radio-->
                        <div class="checkbox">
                          <label><input checked hidden class="service-discount-null" type="checkbox" name="has-discount[]" id="service-2-discount" value="0"></label>
                        </div><!--.radio-->
                          
                    </div>
                </div><!--.form-group-->
                <div class="form-group">
                    <label for="birthday" class="col-sm-2 control-label">Discount Price</label>
                    <div class="col-sm-3">
                        <select name="discount-type" class="form-control discount-type" id="" placeholder="No Discount" disabled>
                            <option class="discount-null" value="0">Discount disabled</option>
                        </select>
                    </div>
                    <div class="col-sm-3"></div>
                </div><!--.form-group-->
                <div class="form-group">
                    <label for="birthday" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-3">
                        <input disabled type="text" name="service-price" class="form-control service-price" id="" placeholder="Amount"/>
                    </div>
                    <div class="col-sm-3"><span class="extra-label">PHP</span></div>
                </div><!--.form-group-->
                <div class="hr-line"></div>
            </div><!--.service-form-->
            <input type="hidden" id="service-count" value="1" />
        </div>
    </fieldset>
    </form><!--.main-form-->
    <fieldset class="">
        <legend>Others</legend>
        <div class="row">
            <form class="photo-upload form-horizontal"  action="<?=site_url('/index.php/customer/upload');?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="photo" class="col-sm-2 control-label">Customer Photo</label>
                    <div class="col-sm-3">
                        <input name="userfile"  type="file" class="form-control" id="photo" placeholder="Customer's Photo" />
                    </div>
                    <input name="receipt-no" type="hidden" value="" id="receipt-no"/>
                </div><!--.form-group-->
            </form><!--.photo-upload-->
        </div>
    </fieldset>
    <div id="add-service-alert" class="alert alert-success col-sm-10" role="alert" style="display: none; float: left;">
        <strong></strong><p></p>
    </div>
</div><!--.row-->
<div id="button-footer" class="row margin-bottom">
    <button id="reset-fields" class="btn btn-default">Reset</button>
    <button class="btn btn-default" id="add-more-services">Add More Services</button>
    <!-- <button class="pull-right btn btn-success">Save Transaction</button> -->
    <a href="#" class="pull-right btn btn-success" id="save-trans-btn" >Save Transaction</a>
</div><!--.row-->

<div id="existing-customer-dialog" data-backdrop="static" data-keyboard="false"  class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Customer Selection</h4>
      </div>
      <div class="modal-body">
        <p>Press the check icon to select a customer.</p>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Birthday</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5">Please refresh the page</td>
                </tr>
                
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
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
    <div class="form-group">
        <label for="service-1" class="col-sm-2 control-label">Sub-Category</label>
        <div class="col-sm-10">
            <select class="form-control service-sub-cat" name="subcat-id[]" id="service-child-1-dummy">
                <option class="service-null" value="0" selected="selected">-- SELECT SERVICE --</option>
            </select>
            <select class="form-control service-sub-cat" name="" id="service-child-1" style="display: none">
                <?php echo $sub_options; ?>
            </select>
        </div><!--.col-sm-10-->
    </div><!--.form-group-->
    <div class="form-group">
        <label for="first-name" class="col-sm-2 control-label">Discount</label>
        <div class="col-sm-1">
            <div class="checkbox">
              <label><input class="service-discount" type="checkbox" name="has-discount[]" id="service-1-discount" value="1"></label>
            </div><!--.radio-->
            <div class="checkbox">
              <label><input checked hidden class="service-discount-null" type="checkbox" name="has-discount[]" id="service-2-discount" value="0"></label>
              
            </div><!--.radio-->
        </div>
    </div><!--.form-group-->
    <div class="form-group">
        <label for="birthday" class="col-sm-2 control-label">Discount Price</label>
        <div class="col-sm-3">
            <select name="discount-type[]" class="form-control discount-type" id="" placeholder="No Discount" disabled>
                <option class="discount-null" value="0">Discount disabled</option>
            </select>
        </div>
        <div class="col-sm-3"></div>
    </div><!--.form-group-->
    <div class="form-group">
        <label for="birthday" class="col-sm-2 control-label">Price</label>
        <div class="col-sm-3">
            <input disabled type="text" class="form-control service-price" id="" placeholder="Amount"/>
        </div>
        <div class="col-sm-3"><span class="extra-label">PHP</span></div>
    </div><!--.form-group-->
    <div class="hr-line"></div>
</div><!--.service-form-generator-->

<script type="text/javascript" src="<?php echo site_url('web/js/add_customer.js');?>"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>