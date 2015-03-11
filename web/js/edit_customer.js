$(function(){
	var trans_id = $('#service-id').val();
	$.ajax({
		url: '/truelab/index.php/customer/loadServices', 
		data: {'trans_id': trans_id }, 
		success:function(response){
			var response = $.parseJSON(response),
				services = response.customer_services; console.log(response.customer_services);
			$(services).each(function(key, value){ console.log(value);
				if(key > 0)
					$('#add-more-services').trigger('click');
				var container = $($('.service-form')[key]);
				container.find('.service-cat').find('option[value="'+ value.category_id +'"]').prop('selected', true);
				container.find('.service-cat').trigger('change');
				container.find('.service-sub-cat').find('option[value="'+ value.subcat_id +'"]').prop('selected', true);
				if(value.has_discount)
					container.find('.service-discount').prop('checked', true);
				container.find('.service-price').val(value.price)
			});
		} 
	});
	
})