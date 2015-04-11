<div class="row template" id="CH" style="display:none;">
    <h1 class="text-center">Clinical Chemistry</h1>
    <form action="<?=site_url('/index.php/medtech/exportData');?>" method="POST">
        <input type="hidden" name="cust-id" />
        <input type="hidden" name="service-id" value="<?=$service_id; ?>" />
        <input type="hidden" class="tpl-code" name="code" value="CH" />
        
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
                    <td><input type="text" class="form-control" value="<?=$s_data["result_1"];?>" name="result_1" placeholder="Result"/></td>
                    <td>75-115mg/dl</td>
                    <td>Total Bilirubin</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_13"];?>" name="result_13" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>HbA1c</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_2"];?>" name="result_2" placeholder="Result"/></td>
                    <td>Up to 7.0%</td>
                    <td>Indirect Bil</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_14"];?>" name="result_14" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Creatinine</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_3"];?>" name="result_3" placeholder="Result"/></td>
                    <td>0.6-1.3 mg/dl </td>
                    <td>Direct Bil</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_15"];?>" name="result_15" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>BUN</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_4"];?>" name="result_4" placeholder="Result"/></td>
                    <td>13-43mg/dl</td>
                    <td>Total Protein</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_16"];?>" name="result_16" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>BUA</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_5"];?>" name="result_5" placeholder="Result"/></td>
                    <td>F: 2.4-5.7; M: 3.4-7 mg/dl</td>
                    <td>A: G ratio</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_17"];?>" name="result_17" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Cholesterol</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_6"];?>" name="result_6" placeholder="Result"/></td>
                    <td><200mg/dl</td>
                    <td>Potassium</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_18"];?>" name="result_18" placeholder="Result"/></td>
                    <td>3.3-5.5mmol/L</td>
                </tr>
                <tr>
                    <td>Triglyceride</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_7"];?>" name="result_7" placeholder="Result"/></td>
                    <td><150mg/dl</td>
                    <td>Sodium</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_19"];?>" name="result_19" placeholder="Result"/></td>
                    <td>135-145mmol/L</td>
                </tr>
                <tr>
                    <td>HDL</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_8"];?>" name="result_8" placeholder="Result"/></td>
                    <td>20-42fl</td>
                    <td>Total Calcium</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_20"];?>" name="result_20" placeholder="Result"/></td>
                    <td>8.1-10.4 mg/dl</td>
                </tr>
                <tr>
                    <td>LDL</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_9"];?>" name="result_9" placeholder="Result"/></td>
                    <td><200mg/dl</td>
                    <td>Chloride</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_21"];?>" name="result_21" placeholder="Result"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>SGOT</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_10"];?>" name="result_10" placeholder="Result"/></td>
                    <td>F: <31u/l; M: <42u/l</td>
                    <td>Others</td>
                    <td colspan="2"><input type="text" class="form-control" value="<?=$s_data["result_22"];?>" name="result_22" placeholder="Result"/></td>
                </tr>
                <tr>
                    <td>SGPT</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_11"];?>" name="result_11" placeholder="Result"/></td>
                    <td>F: <31u/l; M: <42u/l</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>Alk.Phosphatase</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_12"];?>" name="result_12" placeholder="Result"/></td>
                    <td>Adult: <258; Children: <727</td>
                    <td colspan="3"></td>
                </tr>
            </tbody>
        </table>
        <div class="row text-center" style="margin-top:20px;">
            <div class="col-md-4"><input type="text" class="form-control" value="RABIA ROSE MANUBAY, RMT" name="medical-technologist" placeholder="Medical Technologist Name"/></div><!--col-md-6-->
            <div class="col-md-offset-4 col-md-4"><input readonly type="text" class="form-control" value="GERARD L. LAMAYRA, MD. FPSP" name="pathologist" placeholder="Pathologist Name"/></div><!--col-md-6-->
        </div><!--.row-->
        <div class="row text-center">
            <div class="col-md-4 text-center">Medical Technologist</div><!--col-md-6-->
            <div class="col-md-offset-4 col-md-4 text-center">Pathologist</div><!--col-md-6-->
        </div><!--.row-->
        <span style="margin-top:30px; display: block;"><i>*** This result is electronically transmitted. No need for signature</i></span>
    </form>
</div>
