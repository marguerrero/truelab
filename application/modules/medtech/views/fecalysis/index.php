<style type="text/css">
    #SE .result-form thead > tr > th {
        font-size: 35px;
        text-align: center !important;
    }

    #SE .result-form thead {
        font-size: 29px;
        text-align: center !important;
    }

</style>
<div class="row template" id="SE" style="display:none">
    <h1 class="text-center">Fecalysis</h1>
    <form action="<?=site_url('/index.php/medtech/exportData');?>" method="POST">
        <input type="hidden" name="cust-id" />
        <input type="hidden" name="service-id" />
        <input type="hidden" class="tpl-code" name="code" value="SE" />
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
        <table class="result-form table">
            <tbody>
                <tr>
                    <td></td>
                    <td><b>Macroscopic Examination</td>
                </tr>
                <tr>
                    <td class="text-center">Color</td>
                    <td><input placeholder="Please Enter Color"type="text" name="result_1" class="form-control" value="<?=$result['result-1'];?>"/></td>
                </tr>
                <tr>
                    <td class="text-center">Consistency</td>
                    <td><input placeholder="Please Enter Consistency" type="text" name="result_2" class="form-control" value="<?=$result['result-2'];?>"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><b>Macroscopic Examination</td>
                </tr>
                <tr>
                    <td class="text-center">White blood cells</td>
                    <td><input placeholder="Please Enter White blood cells" type="text" name="result_3" class="form-control" value="<?=$result['result-3'];?>"/></td>
                </tr>
                <tr>
                    <td class="text-center">Red blood cells</td>
                    <td><input placeholder="RPlease Enter ed blood cells" type="text" name="result_4" class="form-control" value="<?=$result['result-4'];?>"/></td>
                </tr>
                <tr>
                    <td class="text-center">Occult blood</td>
                    <td><input placeholder="Please EnterOccult blood" type="text" name="result_5" class="form-control" value="<?=$result['result-5'];?>"/></td>
                </tr>
                <tr>
                    <td colspan="2"><input placeholder="Negative for amoeba and other inestinal parasitic ova" type="text" name="result_6" class="form-control" value="Negative for amoeba and other inestinal parasitic ova"/></td>
                </tr>
            </tbody>
        </table>
        <span><i>Note: this result is electronically transmitted</i></span>
        <br />
        <div class="row text-center" style="margin-top:40px;">
            <div class="col-md-4"><input type="text" class="form-control" value="RABIA ROSE MANUBAY, RMT" name="medical-technologist" placeholder="Medical Technologist Name"/></div><!--col-md-6-->
            <div class="col-md-offset-4 col-md-4"><input readonly type="text" class="form-control" value="GERARD L. LAMAYRA, MD. FPSP" name="pathologist" placeholder="Pathologist Name"/></div><!--col-md-6-->
        </div><!--.row-->
        <div class="row text-center">
            <div class="col-md-4 text-center">Medical Technologist</div><!--col-md-6-->
            <div class="col-md-offset-4 col-md-4 text-center">Pathologist</div><!--col-md-6-->
        </div><!--.row-->
    </form>
</div>