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
				console.log(container);
				console.log(value);
				// container.find('.discount-type')
				// 	.find("option")
				// 	.removeAttr('option');

				setTimeout(function(){
					container.find('.discount-type')
						.find("option[value=" + value.disc_type + "]")
						.prop('selected', true)
						.trigger('change');
						console.log('updated');
				}, 1000);
				// container.find('.discount-type').trigger('change');
				// if(value.has_discount){
				// 	container.find('.service-discount').trigger('click');
				// }
				container.find('.service-price').val(value.price)
				if(value.exported == '1'){
					container.find('input').attr('readonly', true);
					container.find('select').attr('readonly', true);
					container.find('.remove-icon ').hide();
					// container.find('input').prop('disabled', true);
					// container.find('select').prop('disabled', true);
				}
			});
		} 
	});
	
})