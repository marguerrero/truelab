
<div class="row template" id="HE" style="display:none">
    <h1 class="text-center">Hematology</h1>
    <form action="<?=site_url('/index.php/medtech/exportData');?>" method="POST">
        <input type="hidden" name="cust-id" />
        <input type="hidden" name="service-id" />
        <input type="hidden" class="tpl-code" name="code" value="HE" />
        <table class="table" id="customer-service">
            <table class="table" id="customer-service">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td colspan="4"><input type="text" class="form-control" name="fullname" value="<?=$customer['fullname'];?>" readonly/></td>
                    <td>Case No</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" value="<?=$customer['case_no'];?>" readonly name="case_no" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="4" style="text-align:center;">Surname/First Name/Middle Name</td>
                    <td>Source</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" value="<?=$customer['source'];?>" readonly name="source" /></td>
                </tr>
                <tr>
                    <td>Age/Sex</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="age_sex" value="<?=$customer['age_sex'];?>" readonly/></td>
                    <td>DOB</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="bday" value="<?=$customer['bday'];?>" readonly/></td>
                    <td>Date received</td>
                    <td>:</td>
                    <td><input type="text" readonly class="form-control" value="<?=$customer['date_recv'];?>" name="date_recv" /></td>
                </tr>
                <tr>
                    <td>Physician</td>
                    <td>:</td>
                    <td colspan="4"><input readonly placeholder="Physician Name" type="text" class="form-control" value="<?=$customer['physician'];?>" name="physician" /></td>
                    <td colspan="3"></td>
                </tr>
            </tbody>
        </table>
        </table>
        <table class="result-form table striped">
            <thead>
                <tr>
                    <th>Test</th>
                    <th>Result</th>
                    <th>Normal Values</th>
                    <!-- <th>Test</th>
                    <th>Result</th>
                    <th>Normal Values</th> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>WBC</td>
                    <td><input type="text" class="form-control" value="" name="result_1" placeholder="Result"/></td>
                    <td>5.0-10.0 10^3/cumm</td>
                    <!-- <td>Neutrophils</td>
                    <td><input type="text" class="form-control" value="" name="result_11" placeholder="Result"/></td>
                    <td>45-70%</td> -->
                </tr>
                <tr>
                    <td>Hemoglobin</td>
                    <td><input type="text" class="form-control" value="" name="result_2" placeholder="Result"/></td>
                    <td>Female: 11.7-14.5g/dl Male13.7-16.7g/dl</td>
                    <!-- <td>Lymphocytes</td>
                    <td><input type="text" class="form-control" value="" name="result_12" placeholder="Result"/></td>
                    <td>18-45%</td> -->
                </tr>
                <tr>
                    <td>Hematocrit</td>
                    <td><input type="text" class="form-control" value="" name="result_3" placeholder="Result"/></td>
                    <td>Female: 34.1-44.3vol% Male: 40.5-49.7vol% </td>
                    <!-- <td>Monocytes</td>
                    <td><input type="text" class="form-control" value="" name="result_13" placeholder="Result"/></td>
                    <td>4-8%</td> -->
                </tr>
                <tr>
                    <td>RBC</td>
                    <td><input type="text" class="form-control" value="" name="result_4" placeholder="Result"/></td>
                    <td>Male: 4.2–5.6 10^6/µL Female: 3.8–5.1 10^6/µL </td>
                    <!-- <td>Eosinophils</td>
                    <td><input type="text" class="form-control" value="" name="result_14" placeholder="Result"/></td>
                    <td>2-3%</td> -->
                </tr>
                <tr>
                    <td>Platelet Count</td>
                    <td><input type="text" class="form-control" value="" name="result_10" placeholder="Result"/></td>
                    <td>Female: 150-390 10^3/l   Male: 144-372 10^3/l</td>
                    <!-- <td colspan="3"></td> -->
                </tr>
                <tr>
                    <td>Neutrophils</td>
                    <td><input type="text" class="form-control" value="" name="result_5" placeholder="Result"/></td>
                    <td>45-70%</td>
                    <!-- <td>Stabs</td>
                    <td><input type="text" class="form-control" value="" name="result_15" placeholder="Result"/></td>
                    <td>1-2%</td> -->
                </tr>
                <tr>
                    <td>Lymphocytes</td>
                    <td><input type="text" class="form-control" value="" name="result_6" placeholder="Result"/></td>
                    <td>18-45%</td>
                    <!-- <td>Remarks</td>
                    <td><input type="text" class="form-control" value="" name="result_16" placeholder="Result"/></td>
                    <td></td> -->
                </tr>
                <tr>
                    <td>Monocytes</td>
                    <td><input type="text" class="form-control" value="" name="result_7" placeholder="Result"/></td>
                    <td>4-8%</td>
                    <!-- <td colspan="3"></td> -->
                </tr>
                <tr>
                    <td>Eosinophils</td>
                    <td><input type="text" class="form-control" value="" name="result_8" placeholder="Result"/></td>
                    <td>2-3%</td>
                    <!-- <td colspan="3"></td> -->
                </tr>
                <tr>
                    <td>Stabs</td>
                    <td><input type="text" class="form-control" value="" name="result_9" placeholder="Result"/></td>
                    <td>1-2%</td>
                    <!-- <td colspan="3"></td> -->
                </tr>
                
            </tbody>
        </table>
        <span><i>Note: this result is electronically transmitted</i></span>
        <br />
        <div class="row text-center" style="margin-top:40px;">
            <div class="col-md-4"><input readonly type="text" class="form-control" value="RABIA ROSE MANUBAY, RMT" name="medical-technologist" placeholder="Medical Technologist Name"/></div><!--col-md-6-->
            <div class="col-md-offset-4 col-md-4"><input readonly type="text" class="form-control" value="GERARD L. LAMAYRA, MD. FPSP" name="pathologist" placeholder="Pathologist Name"/></div><!--col-md-6-->
        </div><!--.row-->
        <div class="row text-center">
            <div class="col-md-4 text-center">Medical Technologist</div><!--col-md-6-->
            <div class="col-md-offset-4 col-md-4 text-center">Pathologist</div><!--col-md-6-->
        </div><!--.row-->
    </form>
</div>
