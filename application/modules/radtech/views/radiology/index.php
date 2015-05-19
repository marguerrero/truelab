<div class="row template" id="RD" style="display:none">
    <h1 class="text-center">Radiology/X-Ray</h1>
    <form action="<?=site_url('/index.php/radtech/exportData');?>" method="POST">
        <input type="hidden" name="cust-id" />
        <input type="hidden" name="service-id" value="<?=$service_id; ?>" />
        <input type="hidden" name="code" class="tpl-code" value="RD"/>
        <input type="hidden" name="prof_pic" class="prof_pic" value="<?=$customer['prof-pic'];?>"/>
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
        <h2>Chest PA View</h2>
        <div class="row" style="margin-top:20px; margin-bottom: 20px;">
            <?php if($result['result_1']): ?>
                <div class="col-md-12"><input type="text" class="form-control" name="result_1" value="<?=$result['result_1'];?>" placeholder="There is no evidence of active parenchymal Inflitrates"/></div><!--col-md-12-->
            <?php else: ?>
                <div class="col-md-12"><input type="text" class="form-control" name="result_1" value="There is no evidence of active parenchymal Inflitrates" placeholder="There is no evidence of active parenchymal Inflitrates"/></div><!--col-md-12-->
            <?php endif; ?>
        </div><!--.row-->
        <div class="row">
            <?php if($result['result_2']): ?>
                <div class="col-md-12"><input type="text" class="form-control" name="result_2" value="<?=$result['result_2']; ?>" placeholder="Heart is not enlarged"/></div><!--col-md-12-->
            <?php else: ?>
                <div class="col-md-12"><input type="text" class="form-control" name="result_2" value="Heart is not enlarged" placeholder="Heart is not enlarged"/></div><!--col-md-12-->
            <?php endif; ?>
        </div><!--.row-->
        <div class="row" style="margin-top:20px; margin-bottom: 20px;">
            <?php if($result['result_3']): ?>
                <div class="col-md-12"><input type="text" class="form-control" name="result_3" value="<?=$result['result_3']; ?>" placeholder="Aorta is not enlarged"/></div><!--col-md-12-->
            <?php else : ?>
                <div class="col-md-12"><input type="text" class="form-control" name="result_3" value="Aorta is not dilated " placeholder="Aorta is not enlarged"/></div><!--col-md-12-->
            <?php endif; ?>
        </div><!--.row-->
        <div class="row" style="margin-top:20px; margin-bottom: 20px;">
            <?php if($result['result_4']): ?>
                <div class="col-md-12"><input type="text" class="form-control" name="result_4" value="<?=$result['result_4']; ?>" placeholder="Trachea, diaphragm and sulci are intact."/></div><!--col-md-12-->
            <?php else : ?>
                <div class="col-md-12"><input type="text" class="form-control" name="result_4" value="Trachea, diaphragm and sulci are intact." placeholder="Trachea, diaphragm and sulci are intact."/></div><!--col-md-12-->
            <?php endif; ?>
        
        </div><!--.row-->
        <br />
        <h2>Impression</h2>
        <div class="row">
            <div class="col-md-12">
                <?php if($result['result_5']): ?>
                        <textarea style="resize: none;" class="form-control" name="result_5" placeholder="NO SIGNIFICANT CHEST FINDINGS"><?=$result["result_5"];?></textarea>
                <?php else : ?>
                    <textarea style="resize: none;" class="form-control" name="result_5" placeholder="NO SIGNIFICANT CHEST FINDINGS">NO SIGNIFICANT CHEST FINDINGS</textarea>
                <?php endif; ?>
            </div><!--col-md-12-->
        </div><!--.row-->
        <br /><br />
        <div class="row text-center">
            <div class="col-md-offset-4 col-md-4"><input type="text" value="ERIC NORMAN BRUA, MD " class="form-control" name="radiologist" placeholder="Radiologist Name"/></div><!--col-md-12-->
        </div><!--.row-->
        <div class="row text-center">
            <div class="col-md-offset-4 col-md-4 text-center">Radiologist</div><!--col-md-12-->
        </div><!--.row-->
        <span style="margin-top:30px; display: block;"><i>*** This result is electronically transmitted. No need for signature</i></span>
    </form>
</div>