<style type="text/css">
    .result-form thead > tr > th {
        font-size: 35px;
        text-align: center !important;
    }

    .result-form thead {
        font-size: 29px;
        text-align: center !important;
    }

</style>
<div class="row">
    <a href="#" class="pull-right btn btn-default" id="export" style="margin:15px;">Print</a>
    <a href="#" class="pull-right btn btn-default" id="save" style="margin:15px;">Save</a>
</div>
<div class="row">
    <h1 class="text-center">Fecalysis</h1>
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
        <table class="result-form table">
            <tbody>
                <tr>
                    <td></td>
                    <td><b>Macroscopic Examination</td>
                </tr>
                <tr>
                    <td class="text-center">Color</td>
                    <td><input placeholder="Color"type="text" name="result-1" class="form-control" value="<?=$result['result-1'];?>"/></td>
                </tr>
                <tr>
                    <td class="text-center">Consistency</td>
                    <td><input placeholder="Consistency" type="text" name="result-2" class="form-control" value="<?=$result['result-2'];?>"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><b>Macroscopic Examination</td>
                </tr>
                <tr>
                    <td class="text-center">White blood cells</td>
                    <td><input placeholder="White blood cells" type="text" name="result-3" class="form-control" value="<?=$result['result-3'];?>"/></td>
                </tr>
                <tr>
                    <td class="text-center">Red blood cells</td>
                    <td><input placeholder="Red blood cells" type="text" name="result-4" class="form-control" value="<?=$result['result-4'];?>"/></td>
                </tr>
                <tr>
                    <td class="text-center">Occult blood</td>
                    <td><input placeholder="Occult blood" type="text" name="result-5" class="form-control" value="<?=$result['result-5'];?>"/></td>
                </tr>
                <tr>
                    <td colspan="2"><input placeholder="Negative for amoeba and other inestinal parasitic ova" type="text" name="result-6" class="form-control" value="<?=$result['result-6'];?>"/></td>
                </tr>
            </tbody>
        </table>
        <span><i>Note: this result is electronically transmitted</span>
        <br />
        <div class="row text-center" style="margin-top:40px;">
            <div class="col-md-4"><input type="text" class="form-control" value="" name="medical-technologist" placeholder="Medical Technologist Name"/></div><!--col-md-6-->
            <div class="col-md-offset-4 col-md-4"><input type="text" class="form-control" value="" name="pathologist" placeholder="Pathologist Name"/></div><!--col-md-6-->
        </div><!--.row-->
        <div class="row text-center">
            <div class="col-md-4 text-center">Medical Technologist</div><!--col-md-6-->
            <div class="col-md-offset-4 col-md-4 text-center">Pathologist</div><!--col-md-6-->
        </div><!--.row-->
    </form>
</div>