<div class="row">
    <a href="#" class="pull-right btn btn-default" id="export" style="margin:15px;">Print</a>
    <a href="#" class="pull-right btn btn-default" id="save" style="margin:15px;">Save</a>
</div>
<div class="row">
    <h1 class="text-center">Radiology/X-Ray</h1>
    <form>
        <input type="hidden" name="cust-id" />
        <input type="hidden" name="service-id" />
        <table class="table" id="customer-service">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td colspan="4"><input type="text" class="form-control" value="<?=$customer['fullname'];?>" readonly/></td>
                    <td>Case No</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" value="" name="case-no" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="4" style="text-align:center;">Surname/First Name/Middle Name</td>
                    <td>Source</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" value="" name="source" /></td>
                </tr>
                <tr>
                    <td>Age/Sex</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" value="<?=$customer['age_sex'];?>" readonly/></td>
                    <td>DOB</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" value="<?=$customer['bday'];?>" readonly/></td>
                    <td>Date received</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" value="" name="date-recv" /></td>
                </tr>
                <tr>
                    <td>Physician</td>
                    <td>:</td>
                    <td colspan="4"><input placeholder="Physician Name" type="text" class="form-control" value="" name="physician" /></td>
                    <td>Date Released</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" value="" name="date-released" /></td>
                </tr>
            </tbody>
        </table>
        <h2>Chest PA View</h2>
        <div class="row" style="margin-top:20px; margin-bottom: 20px;">
            <div class="col-md-6"><input type="text" class="form-control" value="" name="result-1" placeholder="There is no evidence of active parenchymal Inflitrates"/></div><!--col-md-6-->
        </div><!--.row-->
        <div class="row">
            <div class="col-md-6"><input type="text" class="form-control" value="" name="result-2" placeholder="Heart is not enlarged"/></div><!--col-md-6-->
        </div><!--.row-->
        <div class="row" style="margin-top:20px; margin-bottom: 20px;">
            <div class="col-md-6"><input type="text" class="form-control" value="" name="result-3" placeholder="Aorta is not enlarged"/></div><!--col-md-6-->
        </div><!--.row-->
        <div class="row" style="margin-top:20px; margin-bottom: 20px;">
            <div class="col-md-6"><input type="text" class="form-control" value="" name="result-4" placeholder="Trachea, diaphragm and sulci are intact."/></div><!--col-md-6-->
        </div><!--.row-->
        <br />
        <h2>Impression</h2>
        <div class="row">
            <div class="col-md-6"><input type="text" class="form-control" value="" name="result-5" placeholder="NO SIGNIFICANT CHEST FINDINGS "/></div><!--col-md-6-->
        </div><!--.row-->
        <br /><br />
        <div class="row text-center">
            <div class="col-md-offset-4 col-md-4"><input type="text" class="form-control" value="" name="radiologist" placeholder="Radiologist Name"/></div><!--col-md-6-->
        </div><!--.row-->
        <div class="row text-center">
            <div class="col-md-offset-4 col-md-4 text-center">Radiologist</div><!--col-md-6-->
        </div><!--.row-->
    </form>
</div>