$(function(){
	var trans_id = $('#service-id').val();
	$.ajax({
		url: '/truelab/index.php/customer/loadServices', 
		data: {'trans_id': trans_id }, 
		success:function(response){
			var response = $.parseJSON(response),
				services = response.customer_services; 
			$(services).each(function(key, value){ 
				if(key > 0){
					$('#add-more-services').trigger('click');
				} 
				var container = $($('.service-form')[key]);
				container.find('.service-cat').find('option[value="'+ value.category_id +'"]').prop('selected', true);
				container.find('.service-cat').trigger('change');
				container.find('.service-sub-cat').find('option[value="'+ value.subcat_id +'"]').prop('selected', true);
				container.find('.service-sub-cat').trigger('change');
				container.find('.cs-id').val(value.service_id);
				setTimeout(function(){
					container.find('.discount-type')
						.find("option[value=" + value.disc_type + "]")
						.prop('selected', true)
						.trigger('change');
					container.find('.service-price').val(value.price)
					if(value.exported == '1'){
						container.find('input').attr('readonly', true);
						container.find('select').attr('disabled', true);
						container.find('.remove-icon ').hide();
						
					}
				}, 1000);
				
				if(value.exported == '1'){
					container.find('input').attr('readonly', true);
					container.find('select').attr('disabled', true);
					container.find('.remove-icon ').hide();
					container.find('.is-exported').val(1);
				}
				if(value.is_reprint == '1')
					container.find('.is-reprint').val(1);
				console.log(value);
				console.log(container);
			});
		} 
	});
	
})