$(function(){
    $('.auto-refresh').click(reloadTable);
	var customerTransactionTable = null;
	 customerTransactionTable = $('#customer-transaction').DataTable({
        "ajax": "/truelab/index.php/radtech/loadTransaction",
        "columns": [
            { "data": "num" },
            { "data": "customer" },
            { "data": "reference_no" },
            { "data": "services" },
            { "data": "show" }
        ]
    });

    setTimeout(reloadTable, 5000);

    function reloadTable(){
        var autoRefresh = $('.auto-refresh').is(':checked');
        if(autoRefresh){
            customerTransactionTable.ajax.reload();
            setTimeout(reloadTable, 5000);
            console.log('reloading');
        }
    }
})


