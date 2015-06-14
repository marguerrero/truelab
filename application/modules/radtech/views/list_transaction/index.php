<div class="row">
    <h1>Rad Tech Services</h1>
    <div class="row">
        <div class="col-sm-3 pull-right">
            <div class="checkbox pull-right"><input class="auto-refresh" type="checkbox"> Auto Refresh</div>
        </div>
    </div><!--/.row-->
    <table class="table" id="customer-transaction">
        <thead>
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Reference No.</th>
                <th>Services</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="<?php echo site_url('web/js/list_radtech.js');?>"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<style type="text/css">
.trans-info {
    font-weight: bold !important;
}

</style>


<div id="transaction-details" data-backdrop="static" data-keyboard="false"  class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Customer Transaction</h4>
      </div>
      <div class="modal-body">
        <div class="row" style="text-align:center; margin-top: 15px; margin-bottom: 15px;" id="loader-container"><img src="<?=site_url('web/images/ajax-loader.gif');?>" /></div>
      <div class="row margin-left-sm" id="customer-details" style="display:none;">
        <!-- start of #customer-info-container -->
        <div id="customer-info-container" class="row">
            <div id="customer-information" class="col-sm-offset-1 col-sm-10 info-panel">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>First Name</td>
                            <td><span class="trans-info trans-firstname"></span></td>
                            <td>Reference No.</td>
                            <td><span class="trans-info trans-referenceno"></span></td>
                        </tr>
                        <tr>
                            <td>Middle Name</td>
                            <td><span class="trans-info trans-middlename"></span></td>
                            <td>Date</td>
                            <td><span class="trans-info trans-date"></span></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td><span class="trans-info trans-lastname"></span></td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td><span class="trans-info trans-age"></span></td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><span class="trans-info trans-gender"></span></td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Birthday</td>
                            <td><span class="trans-info trans-bday"></span></td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>

                </div>
            </div>
            <!-- end of #customer-info-container -->

            <!-- start of #services-container -->
            <div id="services-container" class="row">
                <div id="services" class="col-md-12 info-panel">    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody class="service-tbody">
                           
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end of #services-container -->
        </div>
      </div><!--.modal-body-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$('#customer-transaction').on('click', '.show-details', viewDetails);
$('#transaction-details').find('[data-dismiss=modal]').on('click', clearDetails);

function clearDetails(){
    $('#loader-container').show();
    $('#customer-details').hide();
    $('.trans-firstname').html('');
    $('.trans-lastname').html('');
    $('.trans-age').html('');
    $('.trans-gender').html('');
    $('.trans-bday').html('');
    $('.trans-date').html('');
    $('.trans-referenceno').html('');
}

function viewDetails(){
    var rn = $(this).attr('data-rn');
    $.ajax({
        url: 'radtech/loadSingleTransaction',
        data: {'receipt_no': rn},
        success: function(response){
            var response = $.parseJSON(response),
                customer_info = response.customer_info;
                $('.trans-firstname').html(customer_info.firstname);
                $('.trans-middlename').html(customer_info.middlename);
                $('.trans-lastname').html(customer_info.lastname);
                $('.trans-age').html(customer_info.age);
                $('.trans-gender').html(customer_info.gender);
                $('.trans-bday').html(customer_info.bday);
                $('.trans-date').html(customer_info.transdate);
                $('.trans-referenceno').html(customer_info.reference_no);
                $('.service-tbody').html('');
            var services = response.services;
                $(services).each(function(key, value){
                    var html = "";
                        html += "<tr>";
                        html += " <td><span class='service-count'>" + ( parseInt(key) + 1) + "</span></td>";
                        html += " <td><span class='service-category'>" + value.category + "</span></td>";
                        html += " <td><span class='service-subcategory'>" + value.service + "</span></td>";
                        html += " <td><span class='service-view'>" + value.update + "</span></td>";
                        html += "</tr>";
                    $('.service-tbody').append(html);
                });
            $('#loader-container').hide();
            $('#customer-details').fadeIn();
            
        }
    });
}

</script>