<div class="row">
	<div style="display:none" class="col-md-1"><label>Template</label></div>
	<div style="display:none" class="col-md-5">
		<select id="template-select" class="form-control pull-left">
			<option value="">--Please Select--</option>
			<option value="UTZ" data-template="UTZ">Ultrasound</option>
			<option value="RD" data-template="RD">X Ray</option>
		</select>
		<input type="hidden" id="code" name="code" value="<?=$code;?>" />
	</div>
	<div class="col-md-12">
	    <a href="#" class="pull-right btn btn-default disabled" id="export" style="margin:15px;">Print</a>
	    <!-- <a href="#" class="pull-right btn btn-default" id="save" style="margin:15px;">Save</a> -->
	</div>
</div>