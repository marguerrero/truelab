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
    <h1 class="text-center">Miscellaneous</h1>
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
            <thead>
                <tr>
                    <th>Test</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="test" class="form-control" readonly value="<?=$result['test'];?>"/></td>
                    <td><input type="text" name="result" class="form-control" value="<?=$result['result'];?>"/></td>
                </tr>
                <tr style="font-size:20px; text-align: center;">
                    <td>(Screening)</td>
                    <td></td>
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