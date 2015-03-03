<!DOCTYPE html>
<html>
<head>
    <title>TrueLab - Clinics and Diagnostic Center</title>

    <link rel="stylesheet" href="<?php echo web_url('bootstrap/dist/css/bootstrap.min.css', true); ?>" />

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

        .info-panel {
            margin-left: 80px;
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
</head>
<body>
    <div class="container">
        <h2 class="page-title text-success">Customer Transaction Saved</h2>

        <!-- start of #customer-info-container -->
        <div id="customer-info-container" class="row">
            <div id="customer-information" class="col-sm-12 info-panel">

                <h4>Customer Information</h4>
                <hr />

                <table class="table">
                    <tbody>
                        <tr>
                            <td>First Name</td>
                            <td>Reymar</td>
                            <td>Reference No.</td>
                            <td>TLCADC72R12RMABC</td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>Guerrero</td>
                            <td>Date</td>
                            <td>February 21, 2015</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>23</td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>Male</td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Birthday</td>
                            <td>January 11, 1992</td>
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
                        <tr>
                            <td>1</td>
                            <td>Clinical Mocroscopy</td>
                            <td>Urinalysis</td>
                            <td>&#8369; 50.00</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Clinical Microscopy</td>
                            <td>Fecalysis</td>
                            <td>&#8369; 50.00</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Clinical Chemistry</td>
                            <td>Foobar</td>
                            <td>&#8369; 110.00</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td style="text-align: right; font-weight: bold;">Total:</td>
                            <td style="font-weight: bold;">&#8369; 210.00</td>
                        </tr>
                    </tfoot>
                </table>

                <hr />

                <p class="btn btn-default">Add New Customer</p>
                <p class="btn btn-default">Edit Transaction</p>
                <p class="btn btn-success pull-right">Export to PDF</p>

            </div>
        </div>
        <!-- end of #services-container -->
    </div>
</body>
</html>