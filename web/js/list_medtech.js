$(function(){
	var customerTransactionTable = null;
	 customerTransactionTable = $('#customer-transaction').DataTable({
        "ajax": "/truelab/index.php/medtech/loadTransaction",
        "columns": [
            { "data": "num" },
            { "data": "customer" },
            { "data": "reference_no" },
            { "data": "services" },
            { "data": "show" }
        ]
    });
})


