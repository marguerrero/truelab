<script type="text/javascript">
	$('#template-select').val('');
	$('#template-select').on('change', displayTemplate);
	$('#export').on('click', exportData);

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
		$('.active-template').find('form').submit();
	}
</script>
	