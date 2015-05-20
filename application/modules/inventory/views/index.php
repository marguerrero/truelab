
<div class="row">
    <h1>Inventory Maintenance</h1>
    <div class="row">
        <div id="main-alert" class="alert alert-success col-sm-3" role="alert" style="display: none; float: right;">
            <strong></strong><p></p>
        </div>

        <!-- spacer -->
        <div style="float: left;" class="alert col-sm-9">
            <p>&nbsp;</p>
        </div>
    </div>
    <table class="table" id="customer-transaction">
        <thead>
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Last Modified</th>
                <th>Modified By</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="row">
    <a data-toggle="modal" id="add-inventory" data-target="#inventoryModal" href="#" class="btn btn-primary">Update Inventory</a>
</div><!--/.row-->
<!-- Modal -->
<div data-backdrop="static" class="modal fade" id="inventoryModal" tabindex="-1" role="dialog" aria-labelledby="inventoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="inventoryModalLabel">Inventory</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="inventory-form">
            <?php foreach($data as $val): ?>
             <div class="form-group">
                <label for="item_<?=$val['id'];?>" class="col-sm-3 control-label"><?=$val['description'];?></label>
                <div class="col-sm-9">
                  <input type="text" maxlength="6" class="form-control" id="item_<?=$val['id'];?>" name="item_<?=$val['id'];?>" value="0" placeholder="Enter Quantity" />
                </div>
              </div>
            <?php endforeach;?>
        </form><!--/.form-horizontal #inventory-form-->
        <div id="save-inventory-alert" class="alert alert-success col-sm-10" role="alert" style="display: none; float: left;">
            <strong></strong><p></p>
        </div>

        <!-- spacer -->
        <div style="float: left;" class="alert col-sm-2">
            <p>&nbsp;</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="save-inventory" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--<script type="text/javascript" src="<?php echo site_url('web/js/list_customer.js');?>"></script>-->
<script type="text/javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    var inventoryTable = null;
    $(function(){
         inventoryTable = $('#customer-transaction').DataTable({
            "ajax": "/truelab/index.php/inventory/fetchData",
            "columns": [
                { "data": "num" },
                { "data": "description" },
                { "data": "last_modified" },
                { "data": "last_modified_by" },
                { "data": "count" }
            ]
        });
    })
    $('#add-inventory').on('click', resetForm);
    $('#save-inventory').on('click', save);
    setTimeout(reloadTable, 30000);

    function save(){
    	var data = $('#inventory-form').serialize();
    	$.post('/truelab/index.php/inventory/saveData', data, function(response){
            var response = JSON.parse(response);
    		if(response.status == 'success'){
                inventoryTable.ajax.reload();
    			resetForm();
                $('#inventoryModal').modal('hide');
    			handleResult({
                    success: true,
                    id: 'main-alert',
                    msg: response.msg
                });
    		}
    		else
    			handleResult({
                    success: false,
                    id: 'save-inventory-alert',
                    msg: response.msg
                });
    	})
    }

    function resetForm(){
    	$('#inventory-form').find('input').val(0);
    }


    function reloadTable(){
        inventoryTable.ajax.reload();
        setTimeout(reloadTable, 5000);
    }
</script>