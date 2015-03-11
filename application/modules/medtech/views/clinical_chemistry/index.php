<div class="row">
    <a href="#" class="pull-right btn btn-default" id="export" style="margin:15px;">Print</a>
    <a href="#" class="pull-right btn btn-default" id="save" style="margin:15px;">Save</a>
</div>
<div class="row">
    <h1 class="text-center">Clinical Chemistry</h1>
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
                    <td>FBS/RBS</td>
                    <td><input type="text" class="form-control" value="" name="result-1" placeholder="Result"/></td>
                    <td>75-115mg/dl</td>
                    <td>Total Bilirubin</td>
                    <td><input type="text" class="form-control" value="" name="result-13" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>HbA1c</td>
                    <td><input type="text" class="form-control" value="" name="result-2" placeholder="Result"/></td>
                    <td>Up to 7.0%</td>
                    <td>Indirect Bil</td>
                    <td><input type="text" class="form-control" value="" name="result-14" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Creatinine</td>
                    <td><input type="text" class="form-control" value="" name="result-3" placeholder="Result"/></td>
                    <td>0.6-1.3 mg/dl </td>
                    <td>Direct Bil</td>
                    <td><input type="text" class="form-control" value="" name="result-15" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>BUN</td>
                    <td><input type="text" class="form-control" value="" name="result-4" placeholder="Result"/></td>
                    <td>13-43mg/dl</td>
                    <td>Total Protein</td>
                    <td><input type="text" class="form-control" value="" name="result-16" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>BUA</td>
                    <td><input type="text" class="form-control" value="" name="result-5" placeholder="Result"/></td>
                    <td>F: 2.4-5.7; M: 3.4-7 mg/dl</td>
                    <td>A: G ratio</td>
                    <td><input type="text" class="form-control" value="" name="result-16" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Cholesterol</td>
                    <td><input type="text" class="form-control" value="" name="result-6" placeholder="Result"/></td>
                    <td><200mg/dl</td>
                    <td>Potassium</td>
                    <td><input type="text" class="form-control" value="" name="result-17" placeholder="Result"/></td>
                    <td>3.3-5.5mmol/L</td>
                </tr>
                <tr>
                    <td>Triglyceride</td>
                    <td><input type="text" class="form-control" value="" name="result-7" placeholder="Result"/></td>
                    <td><150mg/dl</td>
                    <td>Sodium</td>
                    <td><input type="text" class="form-control" value="" name="result-18" placeholder="Result"/></td>
                    <td>135-145mmol/L</td>
                </tr>
                <tr>
                    <td>HDL</td>
                    <td><input type="text" class="form-control" value="" name="result-8" placeholder="Result"/></td>
                    <td>20-42fl</td>
                    <td>Total Calcium</td>
                    <td><input type="text" class="form-control" value="" name="result-18" placeholder="Result"/></td>
                    <td>8.1-10.4 mg/dl</td>
                </tr>
                <tr>
                    <td>LDL</td>
                    <td><input type="text" class="form-control" value="" name="result-9" placeholder="Result"/></td>
                    <td><200mg/dl</td>
                    <td>Chloride</td>
                    <td><input type="text" class="form-control" value="" name="result-19" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>SGOT</td>
                    <td><input type="text" class="form-control" value="" name="result-10" placeholder="Result"/></td>
                    <td>F: <31u/l; M: <42u/l</td>
                    <td>Others</td>
                    <td colspan="2"><input type="text" class="form-control" value="" name="result-20" placeholder="Result"/></td>
                </tr>
                <tr>
                    <td>SGPT</td>
                    <td><input type="text" class="form-control" value="" name="result-10" placeholder="Result"/></td>
                    <td>F: <31u/l; M: <42u/l</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>Alk.Phosphatase</td>
                    <td><input type="text" class="form-control" value="" name="result-11" placeholder="Result"/></td>
                    <td>Adult: <258; Children: <727</td>
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
