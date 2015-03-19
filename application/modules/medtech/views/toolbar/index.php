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
			<option value="UA" data-template="MX">Miscellaneus</option>
			<option value="PT" data-template="MX">Pregnancy Test</option>
			<option value="UA" data-template="UA">Urinalysis</option>
		</select>
		<input type="hidden" id="code" name="code" value="<?=$code;?>" />
	</div>
	<div class="col-md-12">
	    <a href="#" class="pull-right btn btn-default disabled" id="export" style="margin:15px;">Print</a>
	    <!-- <a href="#" class="pull-right btn btn-default" id="save" style="margin:15px;">Save</a> -->
	</div>
</div>