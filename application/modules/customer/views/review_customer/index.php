
<style type="text/css">
    .container {
        margin-bottom: 50px;
    }

    h2.page-title {
        margin-bottom: 50px;
    }

    .info-panel hr {
        margin-top: 0;
    }

    #customer-information .table tr td {
        border-top: none;
    }

    #customer-information .table tr td:first-child, #customer-information .table tr td:nth-child(3) {
        font-weight: bold;
        text-align: right;
    }

     #customer-information .table tr td:nth-child(2), #customer-information .table tr td:nth-child(4) {
        font-style: italic;
    }
</style>
<div class="row"><h2> Customer Information Saved</h2></div>
<div class="row margin-left-sm">
    <!-- start of #customer-info-container -->
    <div id="customer-info-container" class="row">
        <div id="customer-information" class="col-sm-12 info-panel">

            <h4>Customer Information</h4>
            <hr />

            <table class="table">
                <tbody>
                    <tr>
                        <td>First Name</td>
                        <td><?=$customer['firstname']; ?></td>
                        <td>Reference No.</td>
                        <td><?=$customer['reference_no']; ?></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><?=$customer['lastname']; ?></td>
                        <td>Date</td>
                        <td><?=$customer['transaction_date']; ?></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td>23</td>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><?=$customer['gender']; ?></td>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Birthday</td>
                        <td><?=$customer['birthday']; ?></td>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <!-- end of #customer-info-container -->

    <!-- start of #services-container -->
    <div id="services-container" class="row">
        <div id="services" class="col-md-12 info-panel">
            
            <h4>Services</h4>
            <hr />

            <table class="table">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($services as $key => $value) : ?>
                    <tr>
                        <td><?=$value['count']; ?></td>
                        <td><?=$value['category']; ?></td>
                        <td><?=$value['service']; ?></td>
                        <td>&#8369; <?=$value['price'];?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td style="text-align: right; font-weight: bold;">Total:</td>
                        <td style="font-weight: bold;">&#8369; <?=$total; ?></td>
                    </tr>
                </tfoot>
            </table>

            <hr />

            <a href="/truelab/index.php/customer/add/" class="btn btn-default">Add New Customer</a>
            <a href="/truelab/index.php/customer/edit/<?=$customer['reference_no']; ?>"class="btn btn-default">Edit Transaction</a>
            <p class="btn btn-success pull-right">Export to PDF</p>

        </div>
    </div>
    <!-- end of #services-container -->
</div>
