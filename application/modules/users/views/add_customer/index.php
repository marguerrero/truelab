<div class="row"><h2> Add Customer Information</h2></div>
<div class="row margin-left-sm">
    <fieldset class="">
        <legend>Customer Information</legend>
        <button class="btn btn-default">Existing Customer</button>
        <div class="row">
            <form id="customer-form" class="form-horizontal form-1">
                <div class="form-group">
                    <label for="first-name" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="first-name" class="form-control" id="cust_lastname" placeholder="Enter Customer's Last Name">
                    </div>
                </div><!--.form-group-->
                <div class="form-group">
                    <label for="last-name" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="last-name" class="form-control" id="cust_lastname" placeholder="Enter Customer's First Name">
                    </div>
                </div><!--.form-group-->
                <div class="form-group">
                    <label for="first-name" class="col-sm-2 control-label">Gender</label>
                    <div class="col-sm-1">
                        <div class="radio">
                          <label><input type="radio" name="gender" class="cust_gender" id="gender-male" value="M" checked>Male</label>
                        </div><!--.radio-->
                    </div>
                    <div class="col-sm-1">
                        <div class="radio">
                          <label><input type="radio" name="gender" class="cust_gender" id="gender-female" value="F">Female</label>
                        </div><!--.radio-->
                    </div>
                </div><!--.form-group-->
                <div class="form-group">
                    <label for="birthday" class="col-sm-2 control-label">Birthday</label>
                    <div class="col-sm-3">
                        <input name="bday" class="datepicker" type="text" class="form-control" id="cust_bday" placeholder="Customer's Birthday">
                    </div>
                </div><!--.form-group-->
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="button" class="btn btn-default pull-right" id="save-customer-btn">Save Customer</button>
                    </div>
                </div><!--.form-group-->
            </form>

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
        <form class="form-horizontal form-1">
            <div class="form-group">
                <label for="service-1" class="col-sm-2 control-label">Category</label>
                <div class="col-sm-10">
                    <select class="form-control" id="service-1">
                        <option>Clinical Chemistry</option>
                    </select>
                </div><!--.col-sm-10-->
            </div><!--.form-group-->
            <div class="form-group">
                <label for="service-1" class="col-sm-2 control-label">Sub-Category</label>
                <div class="col-sm-10">
                    <select class="form-control" id="service-1">
                        <option>Creatinine</option>
                    </select>
                </div><!--.col-sm-10-->
            </div><!--.form-group-->
            <div class="form-group">
                <label for="first-name" class="col-sm-2 control-label">Discount</label>
                <div class="col-sm-1">
                    <div class="checkbox">
                      <label><input type="checkbox" name="service-1-discount" id="service-1-discount" value="1"></label>
                    </div><!--.radio-->
                </div>
            </div><!--.form-group-->
            <div class="form-group">
                <label for="birthday" class="col-sm-2 control-label">Price</label>
                <div class="col-sm-3">
                    <input disabled type="text" class="form-control" id="birthday" placeholder="Amount"/>
                </div>
                <div class="col-sm-3"><span class="extra-label">PHP</span></div>
            </div><!--.form-group-->
        </form>
    </fieldset>
</div><!--.row-->
<div class="row margin-bottom">
    <button class="btn btn-default">Reset</button>
    <button class="pull-right btn btn-success">Save Transaction</button>
</div><!--.row-->

<script type="text/javascript" src="<?php echo site_url('web/js/add_customer.js');?>"></script>