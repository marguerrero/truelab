<div class="row template" id="RD" style="display:none">
    <h1 class="text-center">Radiology/X-Ray</h1>
    <form action="<?=site_url('/index.php/radtech/exportData');?>" method="POST">
        <input type="hidden" name="cust-id" />
        <input type="hidden" name="service-id" />
        <input type="hidden" name="code" class="tpl-code" value="RD"/>
        <table class="table" id="customer-service">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td colspan="4"><input type="text" class="form-control" name="fullname" value="<?=$customer['fullname'];?>" readonly/></td>
                    <td>Case No</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" value="" name="case_no" /></td>
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
                    <td><input type="text" class="form-control"  name="age_sex" value="<?=$customer['age_sex'];?>" readonly/></td>
                    <td>DOB</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="bday" value="<?=$customer['bday'];?>" readonly/></td>
                    <td>Date received</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" value="" name="date_recv" /></td>
                </tr>
                <tr>
                    <td>Physician</td>
                    <td>:</td>
                    <td colspan="4"><input placeholder="Physician Name" type="text" class="form-control" value="" name="physician" /></td>
                    <td>Date Released</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" value="" name="date_released" /></td>
                </tr>
            </tbody>
        </table>
        <h2>Chest PA View</h2>
        <div class="row" style="margin-top:20px; margin-bottom: 20px;">
            <div class="col-md-6"><input type="text" class="form-control" name="result_1" value="There is no evidence of active parenchymal Inflitrates" placeholder="There is no evidence of active parenchymal Inflitrates"/></div><!--col-md-6-->
        </div><!--.row-->
        <div class="row">
            <div class="col-md-6"><input type="text" class="form-control" name="result_2" value="Heart is not enlarged" placeholder="Heart is not enlarged"/></div><!--col-md-6-->
        </div><!--.row-->
        <div class="row" style="margin-top:20px; margin-bottom: 20px;">
            <div class="col-md-6"><input type="text" class="form-control" name="result_3" value="Aorta is not enlarged" placeholder="Aorta is not enlarged"/></div><!--col-md-6-->
        </div><!--.row-->
        <div class="row" style="margin-top:20px; margin-bottom: 20px;">
            <div class="col-md-6"><input type="text" class="form-control" name="result_4" value="Trachea, diaphragm and sulci are intact." placeholder="Trachea, diaphragm and sulci are intact."/></div><!--col-md-6-->
        </div><!--.row-->
        <br />
        <h2>Impression</h2>
        <div class="row">
            <div class="col-md-6"><input type="text" class="form-control" name="result_5" value="NO SIGNIFICANT CHEST FINDINGS " placeholder="NO SIGNIFICANT CHEST FINDINGS "/></div><!--col-md-6-->
        </div><!--.row-->
        <br /><br />
        <div class="row text-center">
            <div class="col-md-offset-4 col-md-4"><input type="text" class="form-control" name="radiologist" placeholder="Radiologist Name"/></div><!--col-md-6-->
        </div><!--.row-->
        <div class="row text-center">
            <div class="col-md-offset-4 col-md-4 text-center">Radiologist</div><!--col-md-6-->
        </div><!--.row-->
    </form>
</div>