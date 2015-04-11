
<div class="row template" id="UA" style="display:none">
    <h1 class="text-center">Urinalysis</h1>
    <form action="<?=site_url('/index.php/medtech/exportData');?>" method="POST">
        <input type="hidden" name="cust-id" />
        <input type="hidden" name="service-id" value="<?=$service_id; ?>" />
        <input type="hidden" class="tpl-code" name="code" value="UA" />
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
                    <th colspan="2" class="text-center">Macroscopic</th>
                    <th colspan="4" class="text-center">Microscopic</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Color</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_1"]; ?>" name="result_1" placeholder="Result"/></td>
                    <td>White blood cells</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_7"]; ?>" name="result_7" placeholder="Result"/></td>
                    <td colspan="2"><b>CAST</b></td>
                </tr>
                <tr>
                    <td>Clarity</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_2"]; ?>" name="result_2" placeholder="Result"/></td>
                    <td>Red Blood cells</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_8"]; ?>" name="result_8" placeholder="Result"/></td>
                    <td>Hyaline</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_13"]; ?>" name="result_13" placeholder="Result"/></td>
                </tr>
                <tr>
                    <td>Protein</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_3"]; ?>" name="result_3" placeholder="Result"/></td>
                    <td>Epithelial cells</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_9"]; ?>" name="result_9" placeholder="Result"/></td>
                    <td>Fine </td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_14"]; ?>" name="result_14" placeholder="Result"/></td>
                </tr>
                <tr>
                    <td>Glucose</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_4"]; ?>" name="result_4" placeholder="Result"/></td>
                    <td>Mucus threads</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_10"]; ?>" name="result_10" placeholder="Result"/></td>
                    <td>Coarse</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_15"]; ?>" name="result_15" placeholder="Result"/></td>
                </tr>
                <tr>
                    <td>PH</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_5"]; ?>" name="result_5" placeholder="Result"/></td>
                    <td>Bacteria</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_11"]; ?>" name="result_11" placeholder="Result"/></td>
                    <td>Others</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_16"]; ?>" name="result_16" placeholder="Result"/></td>
                </tr>
                <tr>
                    <td>Sp. Gravity</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_6"]; ?>" name="result_6" placeholder="Result"/></td>
                    <td>A. Urates/phosphates</td>
                    <td><input type="text" class="form-control" value="<?=$s_data["result_12"]; ?>" name="result_12" placeholder="Result"/></td>
                    <td></td>
                    <td></td>
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
