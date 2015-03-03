<div class="row template" id="CH" style="display:none;">
    <h1 class="text-center">Clinical Chemistry</h1>
    <form action="<?=site_url('/index.php/medtech/exportData');?>" method="POST">
        <input type="hidden" name="cust-id" />
        <input type="hidden" name="service-id" />
        <input type="hidden" class="tpl-code" name="code" value="CH" />
        
        <table class="table" id="customer-service">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td colspan="4"><input type="text" name="fullname" class="form-control" value="<?=$customer['fullname'];?>" readonly/></td>
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
                    <td><input type="text" class="form-control" name="age_sex" value="<?=$customer['age_sex'];?>" readonly/></td>
                    <td>DOB</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" value="<?=$customer['bday'];?>" readonly/></td>
                    <td>Date received</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" value="" name="date_recv" /></td>
                </tr>
                <tr>
                    <td>Physician</td>
                    <td>:</td>
                    <td colspan="4"><input placeholder="Physician Name" type="text" class="form-control" value="Anna Janine B. Gamulo, MD" name="physician" /></td>
                    <td>Date Released</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" value="" name="date_released" /></td>
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
                    <td>FBS/RBS</td>
                    <td><input type="text" class="form-control" value="" name="result_1" placeholder="Result"/></td>
                    <td>75-115mg/dl</td>
                    <td>Total Bilirubin</td>
                    <td><input type="text" class="form-control" value="" name="result_13" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>HbA1c</td>
                    <td><input type="text" class="form-control" value="" name="result_2" placeholder="Result"/></td>
                    <td>Up to 7.0%</td>
                    <td>Indirect Bil</td>
                    <td><input type="text" class="form-control" value="" name="result_14" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Creatinine</td>
                    <td><input type="text" class="form-control" value="" name="result_3" placeholder="Result"/></td>
                    <td>0.6-1.3 mg/dl </td>
                    <td>Direct Bil</td>
                    <td><input type="text" class="form-control" value="" name="result_15" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>BUN</td>
                    <td><input type="text" class="form-control" value="" name="result_4" placeholder="Result"/></td>
                    <td>13-43mg/dl</td>
                    <td>Total Protein</td>
                    <td><input type="text" class="form-control" value="" name="result_16" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>BUA</td>
                    <td><input type="text" class="form-control" value="" name="result_5" placeholder="Result"/></td>
                    <td>F: 2.4-5.7; M: 3.4-7 mg/dl</td>
                    <td>A: G ratio</td>
                    <td><input type="text" class="form-control" value="" name="result_16" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Cholesterol</td>
                    <td><input type="text" class="form-control" value="" name="result_6" placeholder="Result"/></td>
                    <td><200mg/dl</td>
                    <td>Potassium</td>
                    <td><input type="text" class="form-control" value="" name="result_17" placeholder="Result"/></td>
                    <td>3.3-5.5mmol/L</td>
                </tr>
                <tr>
                    <td>Triglyceride</td>
                    <td><input type="text" class="form-control" value="" name="result_7" placeholder="Result"/></td>
                    <td><150mg/dl</td>
                    <td>Sodium</td>
                    <td><input type="text" class="form-control" value="" name="result_18" placeholder="Result"/></td>
                    <td>135-145mmol/L</td>
                </tr>
                <tr>
                    <td>HDL</td>
                    <td><input type="text" class="form-control" value="" name="result_8" placeholder="Result"/></td>
                    <td>20-42fl</td>
                    <td>Total Calcium</td>
                    <td><input type="text" class="form-control" value="" name="result_18" placeholder="Result"/></td>
                    <td>8.1-10.4 mg/dl</td>
                </tr>
                <tr>
                    <td>LDL</td>
                    <td><input type="text" class="form-control" value="" name="result_9" placeholder="Result"/></td>
                    <td><200mg/dl</td>
                    <td>Chloride</td>
                    <td><input type="text" class="form-control" value="" name="result_19" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>SGOT</td>
                    <td><input type="text" class="form-control" value="" name="result_10" placeholder="Result"/></td>
                    <td>F: <31u/l; M: <42u/l</td>
                    <td>Others</td>
                    <td colspan="2"><input type="text" class="form-control" value="" name="result_20" placeholder="Result"/></td>
                </tr>
                <tr>
                    <td>SGPT</td>
                    <td><input type="text" class="form-control" value="" name="result_10" placeholder="Result"/></td>
                    <td>F: <31u/l; M: <42u/l</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>Alk.Phosphatase</td>
                    <td><input type="text" class="form-control" value="" name="result_11" placeholder="Result"/></td>
                    <td>Adult: <258; Children: <727</td>
                    <td colspan="3"></td>
                </tr>
            </tbody>
        </table>
        <span><i>Note: this result is electronically transmitted</i></span>
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
