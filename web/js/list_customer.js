$(function(){
	var customerTransactionTable = null;
	 customerTransactionTable = $('#customer-transaction').DataTable({
        "ajax": "/truelab/index.php/customer/loadTransaction",
        "columns": [
            { "data": "num" },
            { "data": "customer" },
            { "data": "reference_no" },
            { "data": "date_of_transaction" },
            { "data": "edit" }
        ]
    });
})


