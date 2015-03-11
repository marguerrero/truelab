<div class="row">
    <a href="#" class="pull-right btn btn-default" id="export" style="margin:15px;">Print</a>
    <a href="#" class="pull-right btn btn-default" id="save" style="margin:15px;">Save</a>
</div>
<div class="row">
    <h1 class="text-center">Hematology</h1>
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
        <table class="result-form table striped">
            <thead>
                <tr>
                    <th>Test</th>
                    <th>Result</th>
                    <th>Normal Values</th>
                    <th>Test</th>
                    <th>Result</th>
                    <th>Normal Values</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>WBC</td>
                    <td><input type="text" class="form-control" value="" name="result-1" placeholder="Result"/></td>
                    <td>5.0-10.0 10^3/cumm</td>
                    <td>Neutrophils</td>
                    <td><input type="text" class="form-control" value="" name="result-11" placeholder="Result"/></td>
                    <td>45-70%</td>
                </tr>
                <tr>
                    <td>Hemoglobin</td>
                    <td><input type="text" class="form-control" value="" name="result-2" placeholder="Result"/></td>
                    <td>Female: 11.7-14.5g/dl Male13.7-16.7g/dl</td>
                    <td>Lymphocytes</td>
                    <td><input type="text" class="form-control" value="" name="result-12" placeholder="Result"/></td>
                    <td>18-45%</td>
                </tr>
                <tr>
                    <td>Hematocrit</td>
                    <td><input type="text" class="form-control" value="" name="result-3" placeholder="Result"/></td>
                    <td>Female: 34.1-44.3vol% Male: 40.5-49.7vol% </td>
                    <td>Monocytes</td>
                    <td><input type="text" class="form-control" value="" name="result-13" placeholder="Result"/></td>
                    <td>4-8%</td>
                </tr>
                <tr>
                    <td>RBC</td>
                    <td><input type="text" class="form-control" value="" name="result-4" placeholder="Result"/></td>
                    <td>Male: 4.2–5.6 10^6/µL Female: 3.8–5.1 10^6/µL </td>
                    <td>Eosinophils</td>
                    <td><input type="text" class="form-control" value="" name="result-14" placeholder="Result"/></td>
                    <td>2-3%</td>
                </tr>
                <tr>
                    <td>MCV</td>
                    <td><input type="text" class="form-control" value="" name="result-5" placeholder="Result"/></td>
                    <td>76-96fl</td>
                    <td>Stabs</td>
                    <td><input type="text" class="form-control" value="" name="result-15" placeholder="Result"/></td>
                    <td>1-2%</td>
                </tr>
                <tr>
                    <td>MCH</td>
                    <td><input type="text" class="form-control" value="" name="result-6" placeholder="Result"/></td>
                    <td>27.0-32.0Pg</td>
                    <td>Remarks</td>
                    <td><input type="text" class="form-control" value="" name="result-16" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>MCHC</td>
                    <td><input type="text" class="form-control" value="" name="result-7" placeholder="Result"/></td>
                    <td>300-350g/l</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>RDWs</td>
                    <td><input type="text" class="form-control" value="" name="result-8" placeholder="Result"/></td>
                    <td>20-42fl</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>MPV</td>
                    <td><input type="text" class="form-control" value="" name="result-9" placeholder="Result"/></td>
                    <td>8-15fl</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>Platelet Count</td>
                    <td><input type="text" class="form-control" value="" name="result-10" placeholder="Result"/></td>
                    <td>Female: 150-390 10^3/l   Male: 144-372 10^3/l</td>
                    <td colspan="3"></td>
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
