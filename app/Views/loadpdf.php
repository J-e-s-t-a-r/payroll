<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Load PDF</title>

    <style>
        .table{
            border-collapse: collapse;
            width: 100%;
        }
        .th, .td, .h2 {
            border: 1px solid black;
            padding: 8px;
        }
        .th {
            background-color: #002060;
            color:White;
        }
        .td1 {
            text-align:center;
        }
        .td2 {
            border: 1px solid black;
            padding: 5px;
        }
        .td3 {
            border: 1px solid black;
            text-align:right;
            padding: 5px;
        }
        .width-50 {
            width: 25%;
        }
    </style>
</head>
<body>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h2 class="h2 td1">LEO70 PMO DRAFT PAYSLIP</h2>

                                <br>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="20%"></th>
                                            <th width="40%"></th>
                                            <th width="25%"></th>
                                            <th width="15%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($data): ?>
                                        <tr>
                                            <td>DILG ID:</td>
                                            <td> <?= $data['DILG_ID']; ?> </td>
                                            <td>Month: </td>
                                            <td> <?= $data['Month']; ?> </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Employee Name:</td>
                                            <td> <?= $data['Name']; ?> </td>
                                            <td>Date Range: </td>
                                            <td> <?= $data['Range']; ?></td>
                                        </tr>

                                        <tr>
                                            <td>Position:</td>
                                            <td> <?= $data['Position']; ?> </td>
                                            <td>with 8% Tax: </td>
                                            <td> <?= $data['Tax']; ?> </td>
                                        </tr>
                                    </tbody>
                                </table>
                
                                <br>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="25%"></th>
                                            <th width="25%"></th>
                                            <th width="25%"></th>
                                            <th width="25%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="td th" colspan="2"><b>EARNINGS</b></td>
                                            <td class="td th" colspan="2"><b>DEDUCTIONS</b></td>
                                        </tr>

                                        <tr>
                                            <td class="td2">Basic Salary</td>
                                            <td class="td3"> <i><?= number_format($data['Salary'],2); ?> </i> </td>
                                            <td class="td2">UT/L/A</td>
                                            <td class="td3"> <?= number_format($data['Minutes'],2); ?> </td>
                                        </tr> 
                                        
                                        <tr>
                                            <td class="td2">Cut-off</td>
                                            <td class="td3"> <?= number_format($data['Salary']/2,2); ?></td>
                                            <td class="td2">SSS</td>
                                            <td class="td3"> <?= number_format($data['SSS']*2,2); ?> </td>
                                        </tr>

                                        <tr>
                                            <td class="td2"></td>
                                            <td class="td3"></td>
                                            <td class="td2">PhilHealth</td>
                                            <td class="td3"> <?= number_format($data['PH'],2); ?> </td>
                                        </tr>

                                        <tr>
                                            <td class="td2"></td>
                                            <td class="td3"></td>
                                            <td class="td2">8% Tax</td>
                                            <td class="td3"> <?= number_format($data['Tax'],2); ?> </td>
                                        </tr>

                                        <tr>
                                            <td class="td2" height="18px"></td>
                                            <td class="td3"></td>
                                            <td class="td2"></td>
                                            <td class="td3"></td>
                                        </tr>

                                        <tr>
                                            <td class="td2">TOTAL EARNINGS</td>
                                            <td class="td3"><?= number_format($data['Salary']/2,2); ?></td>
                                            <td class="td2">TOTAL DEDUCTIONS</td>
                                            <td class="td3"> <?= number_format($data['TotalDeduc'],2); ?> </td>
                                        </tr>

                                        <tr>
                                            <td class="td2"></td>
                                            <td class="td3"></td>
                                            <td class="td2"><b> NET SALARY </b></td>
                                            <td class="td3"><b> <?= number_format($data['NetPay'],2); ?> </b></td>
                                        </tr>

                                        
                                    </tbody>
                                </table>
                                <?php endif; ?>           
                                

                                <p><i>Disclaimer: This is not an official payslip. This document is for internal usage of LEO70PMO only and must not be shared with external parties.</i></p>

                            </div>
                        </div>                    
</body>
</html>