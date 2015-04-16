
$('#customer-transaction').on('click', '.customer-select', proceedNextStep);
$(function(){
    var customerTransactionTable = null;
     customerTransactionTable = $('#customer-transaction').DataTable({
        "ajax": "/truelab/index.php/customer/getCustomers",
        "columns": [
            { "data": "num" },
            { "data": "lastname" },
            { "data": "firstname" },
            { "data": "birthday" },
            { "data": "select" }
        ]
    });
})


function proceedNextStep(){
    var cust_id = $(this).attr('data-id');
    window.location.href = "/truelab/index.php/reprint/reprintSelection/"+cust_id;
}