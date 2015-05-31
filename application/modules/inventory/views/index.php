
<style type="text/css">
    .categories-combo {
        margin-bottom: 30px;
    }
    .services-container {
        height: 500px;
        overflow-y: scroll;
        overflow-x: hidden;
    }
    .draggable {
        padding: 15px;
    }

</style>
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
    <table class=" table-striped" id="customer-transaction">
        <thead>
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Last Modified</th>
                <th>Quantity</th>
                <th>Services</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="row">
    <a data-toggle="modal" id="add-item" data-target="#addItemModal" href="#" class="btn btn-primary">Add Item</a>
    <a data-toggle="modal" id="add-inventory" data-target="#inventoryModal" href="#" class="btn btn-primary">Update Inventory</a>
</div><!--/.row-->

<div class="service-container-template" style="display:none;">
  <p draggable="true" id="{service_id}" ondragstart="drag(event)" class="bg-primary draggable category-{category_class}">
    {service_name}
    <input type="hidden" name="services[]" value="{s_id}" />
  </p>
</div><!--/.service-container-template-->

<!-- Modals -->
<!-- Service Reference Popup START -->
<div data-backdrop="static" class="modal fade" id="servicesModal" tabindex="-1" role="dialog" aria-labelledby="servicesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="servicesModalLabel">Inventory Service Reference</h4>
      </div>
      <div class="modal-body">
            <div class="container-fluid">
                <div class="col-md-6">
                    <h4>Available Services</h4>
                    <select class="form-control categories-combo">
                        <option data-id="null">All Categories</option>
                        <?php foreach ($categories as $key => $value):  ?>
                            <option data-id="<?=$value['id'];?>"><?=$value['name'];?></option>
                        <?php endforeach; ?>
                    </select><!--/.categories-combo-->
                    <div ondrop="drop(event)" ondragover="allowDrop(event)" class="services-container" id="available-services">
                    </div><!--.available-services-->
                </div><!--/.col-md-6-->
                <div class="col-md-6">
                    <h4>Selected Services</h4>
                    <p><b>Item: </b> <span class="item-name-dynamic"></span></p>
                    <form class="item-service-form">
                        <input type="hidden" class="inventory-id" name="id" value="" />
                        <div ondrop="drop(event)" ondragover="allowDrop(event)" class="services-container" id="selected-services">
                        </div><!--.selected-services-->
                    </form>
                    <div id="save-services-alert" class="alert alert-success col-sm-10" role="alert" style="display: none; float: left;">
                        <strong></strong><p></p>
                    </div>

                    <!-- spacer -->
                    <div style="float: left;" class="alert col-sm-2">
                        <p>&nbsp;</p>
                    </div>
                </div><!--/.col-md-6-->
            </div><!--/.container-fluid-->
       </div><!-- /.modal-body-->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="save-services-btn">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 
<script>

    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
        console.log(ev.target.class);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        console.log(ev.dataTransfer);
        console.log(data);
        ev.target.appendChild(document.getElementById(data));
    }
</script>
<!-- Service Reference Popup END -->


<!-- Message box prompt START -->
<div data-backdrop="static" class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="msgModalLabel">Inventory</h4>
      </div>
      <div class="modal-body">
        <div class="popup-msg"></div>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 
<!-- Message box prompt END -->

<!-- Add new item on the inventory START -->
<div data-backdrop="static" class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="inventoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="inventoryModalLabel">Inventory</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="add-item-form">
            <div class="form-group">
	            <label for="item-name" class="col-sm-3 control-label">Item Name</label>
	            <div class="col-sm-9">
	              <input type="text" maxlength="155" class="form-control" id="item-name" name="item-name" placeholder="Enter Item Name" />
	            </div>
            </div><!--/.form-group-->
            <div class="form-group">
	            <label for="item-qty" class="col-sm-3 control-label">Quantity</label>
	            <div class="col-sm-9">
	              <input type="text" maxlength="6" class="form-control" id="item-qty" value="0" name="item-qty" placeholder="Enter initial quantity" />
	            </div>
            </div><!--/.form-group-->
        </form><!--/.form-horizontal #inventory-form-->
        <div id="save-item-alert" class="alert alert-success col-sm-10" role="alert" style="display: none; float: left;">
            <strong></strong><p></p>
        </div>

        <!-- spacer -->
        <div style="float: left;" class="alert col-sm-2">
            <p>&nbsp;</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="save-item" class="btn btn-primary">Add Item</button>
      </div>
    </div>
  </div>
</div>
<!-- Add new item on the inventory END -->


<!-- Update inventory items from version 1 START-->
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

<!-- Update inventory items from version 1 END-->
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
                { "data": "count" },
                { "data": "url" }
            ]
        });
    })
    $('#customer-transaction').on('click', '.item-services > span', openServicePopup);
    $('#add-inventory').on('click', resetForm);
    $('#save-inventory').on('click', save);
    $('#save-item').on('click', addItem);
    $('#save-services-btn').on('click', saveServices);
    setTimeout(reloadTable, 30000);
    $('.categories-combo').on('change', displayServices);

    function displayServices(){
        var id = $(this).find(':selected').attr('data-id'); 
        if(id != 'null'){
            $('#available-services p').hide();
            $('.category-' + id).fadeIn();
        } else 
            $('#available-services p').fadeIn();
    }

    function saveServices(){
        var btn = $(this);
        var data = $('.item-service-form').serialize();
        btn.attr('disabled', true);
        $.post('/truelab/index.php/inventory/saveServices', data, function(response){
            btn.attr('disabled', false);
            var response = JSON.parse(response);
            if(response.status == 'success'){
                $('#servicesModal').modal('hide');
                
                handleResult({
                    success: true,
                    id: 'main-alert',
                    msg: response.msg
                });
            }
            else
                handleResult({
                    success: false,
                    id: 'save-services-alert',
                    msg: response.msg
                });
        })
    }

    function openServicePopup(){
        var id = $(this).attr('data-id'),
            itemName = $(this).attr('data-name');
        $('#available-services').html('');
        $('#selected-services').html('');
        $('.item-name-dynamic').html('');
        $('.inventory-id').val(null);
        $('.categories-combo')
            .val('All Categories')
            .trigger('change');
        $.ajax({
            url: 'inventory/initializeServices', 
            data: {id:id}, 
            method : 'GET' ,
        // }, function(response){
            success: function(response){
            var response = JSON.parse(response),
                available = response.data.available,
                selected = response.data.selected;                                  
                $('.inventory-id').val(id);
                $('.item-name-dynamic').html(itemName);
                $(available).each(function(key, val){
                    var tmpl = $('.service-container-template').html();
                    tmpl = tmpl.replace('{service_id}', val.id);
                    tmpl = tmpl.replace('{s_id}', val.id);
                    tmpl = tmpl.replace('{service_name}', val.description);
                    tmpl = tmpl.replace('{category_class}', val.cat_id);
                    $('#available-services').append(tmpl);
                });
                $(selected).each(function(key, val){
                    var tmpl = $('.service-container-template').html();
                    tmpl = tmpl.replace('{service_id}', val.id);
                    tmpl = tmpl.replace('{s_id}', val.id);
                    tmpl = tmpl.replace('{service_name}', val.description);
                    tmpl = tmpl.replace('{category_class}', val.cat_id);
                    $('#selected-services').append(tmpl);
                });
            }
            
        });
        $('#servicesModal').modal();
    }
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
                    id: 'save-item-alert',
                    msg: response.msg
                });
    	})
    }

    function addItem(){ 
    	var data = $('#add-item-form').serialize();
    	$.post('/truelab/index.php/inventory/addData', data, function(response){
            var response = JSON.parse(response);
    		if(response.status == 'success'){
                inventoryTable.ajax.reload();
    			resetForm();
                $('#addItemModal').modal('hide');
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
    	$('#add-item-form').find('input').val("");
    }


    function reloadTable(){
        inventoryTable.ajax.reload();
        setTimeout(reloadTable, 5000);
    }
</script>