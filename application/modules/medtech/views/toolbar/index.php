<style type="text/css">
    #print-preview input{
        border: none !important;
        background: #fff;
        margin-top: -8px;
    }
    #print-preview {
        font-size: 12px !important;
    }
    .template-header p {
        text-align: center;
        margin: 0px;
    }
    #print-preview .table>tbody>tr>td {
        padding: 0px !important;
    }
    #template-container > .result-form th,
    #template-container > .result-form td,{
        text-align: center;
    }

    #template-container {
        padding-left: 20px;
        padding-right: 20px;
    }
</style>
<div class="row">
	<div style="display:none" class="col-md-1"><label>Template</label></div>
	<div style="display:none" class="col-md-5">
		<select id="template-select" class="form-control pull-left">
			<option value="">--Please Select--</option>
			<option value="AFB" data-template="MX">AFB</option>
			<option value="BT" data-template="MX">Blood Type</option>
			<option value="CH" data-template="CH">Clinical Chemistry</option>
			<option value="SE" data-template="SE">Fecalysis</option>
			<option value="HB" data-template="MX">HBSAG</option>
			<option value="HE" data-template="HE">Hematology</option>
			<option value="UA" data-template="MX">Miscellaneous</option>
			<option value="PT" data-template="MX">Pregnancy Test</option>
			<option value="UA" data-template="UA">Urinalysis</option>
		</select>
		<input type="hidden" id="code" name="code" value="<?=$code;?>" />
		<input type="hidden" id="require-pic" name="require-pic" value="<?=$customer['require-pic'];?>" />
        <input type="hidden" id="exported" name="exported" value="<?=$customer['exported'];?>" />
    </div>
	<div class="col-md-12">
		<div id="message-info" class="col-md-10 alert-success" style="display:none; padding: 15px; text-align:center; margin-top: 15px ">
			<span >Customer information loaded. Please review the results before printing.</span>
		</div>
        <div class="col-md-2">
            <a href="#" style="margin:15px;" data-toggle="modal" data-target="#print-preview"  id="print-preview-btn" class="pull-right btn btn-default">Preview</a>
        </div>
	    <!-- <a href="#" class="pull-right btn btn-default" id="save" style="margin:15px;">Save</a> -->
	</div>
</div>
<div id="print-preview" data-backdrop="static" data-keyboard="false"  class="modal fade">
  <div class="modal-dialog modal-lg" style="width: 900px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Review Page</h4>
      </div>
      <div class="modal-body">
        <div class="row template-header">
            <div class="col-md-offset-3 col-md-6 text-center">
                <img src="/truelab/web/images/truelab-logo.png" style="width: 255px;" /><br />
                <p>2nd - 3rd St. Nazareth, Barangay 40, Cagayan de Oro City</p>
                <p>(infront of City Health Office)</p>
                <p>Tel# 3231521 / 09177188942</p>
                <p>Email: truelab.clinicdiagnostic@gmail.com</p>
            </div>
            <?php if($customer['require-pic']): ?>
            <div class="review-profile" style="display:none padding-right: 100px; " class="col-md-3">
                <img style="margin-right: 20px; " width="140" height="120" class="pull-right" src="/truelab/web/uploads/<?=$customer['prof-pic'];?>" />
            </div>
            <?php endif; ?>
        </div>
        <div class="template-container"></div>
      </div>
      <div class="modal-footer">
        <a href="#" class="pull-right btn btn-success disabled" id="export" >Print</a>
        <button type="button" class="btn btn-default pull-right" style="margin-right: 15px;" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>