<?php

session_start();
include './inc/database.php';

$database = new Database();

if (isset($_GET['p1_id']) && is_numeric($_GET['p1_id'])) {
    $p1_id = $_GET['p1_id'];
    $project_1 = $database->get("project_1", "*", ["p1_id" => $p1_id]);

    if (!$project_1) {
        echo "Record not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Price Escalation Statement</title>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <script type="text/javascript" src="https://www.hostmath.com/Math/MathJax.js?config=OK"></script>

    <style>
        * {
            padding: 0%;
            margin: 0%;
            box-sizing: border-box;
        }

        body {
            min-width: 100vh;
            min-height: 100vh;
        }

        .container {
            padding: 0%;
            margin: 2%;
        }

        .pad td {
            padding: 5px;
        }

        h4 {
            text-align: center;
            text-decoration: underline;
        }

        .margin {
            margin: 5px;
            margin-top: 20px;
            text-align: center;

        }

        table,
        tr,
        td,
        th {
            border: 1px solid black;
        }

        td {
            padding: 2px;
        }

        .container {
            margin: 0;
            padding: 5px;
            max-width: 1300px;
        }

        .col th,
        td {
            font-size: 15px;
            padding: 5px 5px 5px 0;
            text-align: center;
            padding-bottom: 2px;
        }
    </style>
</head>

<body>
    <h4>Price Escalation Statement</h4>

    <?php

    $p1_id = $_GET['p1_id'];
    $project_1 = $database->get("project_1", "*", ["p1_id" => $p1_id]);

    ?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-7">
                <strong>Name of Division: </strong> Waghur Dam Division, Jalgaon <br>
                <strong>Name of Work:</strong>
                <?php echo $project_1['name_of_work']; ?><br>
                <strong>Name of Agency:</strong>
                <?php echo $project_1['name_of_agency']; ?> <br>
                <strong>Agreement No:</strong>
                <?php echo $project_1['agreement_no']; ?>
            </div>
            <div class="col">
                <strong>Sub-Division:</strong>
                <?php echo $project_1['sub_division']; ?><br>
                <strong>Authority:</strong>
                <?php echo $project_1['authority']; ?>

            </div>
        </div>

    </div>


    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-5">
                <table style="border: 1px solid black; ">
                    <tr>
                        <td>
                            <strong>Date of receipt of tendor: </strong> <br>
                        </td>
                        <td>
                            <?php echo $project_1['dateofreceiptof_tendor']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Date of work order </strong><br>
                        </td>
                        <td>
                            <?php echo $project_1['dateofwork_order']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Star Rate of Cement Rs.: </strong>
                        </td>
                        <td>
                            <?php echo $project_1['sroc']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Star Rate of Steel Rs.: </strong><br>
                        </td>
                        <td>
                            <?php echo $project_1['sros']; ?>
                        </td>
                    </tr>
                </table>
            </div>

            <div class=" col col-lg-4">
                <table style="border: 1px solid black;">
                    <thead>
                        <h4 style="font-size: 15px;"><b>Basics Indices for the presiding months</b></h4>
                        <th>Month</th>
                        <th>Labour</th>
                        <th>Material</th>
                        <th>POL</th>
                        <th>Steel</th>
                        <th>Cement</th>
                    </thead>
                    <tbody>

                        <?php

                        $endDate =  $project_1['dateofreceiptof_tendor'];
                            
                        $startDate = date('M-Y', strtotime('-3 months', strtotime($endDate)));

                        // Fetch data within the date range
                        $data = $database->select('price_escalation', '*', [
                            'month' => [$startDate, $endDate]
                        ]);

                        // Print or process the fetched data
                        foreach ($data as $row) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $project_1['month']; ?>
                                </td>
                                <td>
                                    <?php echo $project_1['labour']; ?>
                                </td>
                                <td>
                                    <?php echo $project_1['material']; ?>
                                </td>
                                <td>
                                    <?php echo $project_1['pol']; ?>
                                </td>
                                <td>
                                    <?php echo $project_1['steel']; ?>
                                </td>
                                <td>
                                    <?php echo $project_1['cement']; ?>
                                </td>
                            </tr>


                            <?php
                            // Process each row of data here
                            echo " lobour: " . $row['name'] . ", Date: " . $row['date_column'] . "<br>";
                        }
                        ?>
                        <tr>
                            <th>Av.Index</th>
                            <th>386.50</th>
                            <th>133.87</th>
                            <th>94.03</th>
                            <th>131.33</th>
                            <th>118.03</th>
                        </tr>
                        <tr>
                            <th style="font-size: 11px;">%as per Tendor</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <center>
        <h6>R.A. BILL No. & FINAL</h6>
    </center>
    <table class="margin mt-5">
        <tbody>
            <tr>
                <td rowspan="2"><strong>Sr. No</strong></td>
                <td rowspan="2"><strong>Date Of Measurement</strong></td>
                <td rowspan="2"><strong>Total Amount:</strong></td>
                <td colspan="4"><strong>Deduct: Schedule A/Steel/Cement/Bulk Asphal/ Amount</strong></td>
                <td rowspan="2"><strong>Net/Amount for price Escalation</strong></td>
                <td rowspan="2"><strong>Month</strong></td>
                <td colspan="3"><strong>LABOUR</strong>
                    <font style="font-size: 12px;">
                        \[V_{1}=0.85P\left(\begin{array}{c}\frac{K_{1}}{100}\times\frac{L_{1}-L_{0}}{L_{0}}\end{array}\right)\]
                    </font>
                </td>
                <td colspan="3"><strong>MATERIAL</strong>
                    <font style="font-size: 12px;">
                        \[V_{2}=0.85P\left(\begin{array}{c}\frac{K_{2}}{100}\times\frac{M_{1}-M_{0}}{M_{0}}\end{array}\right)\]
                    </font>
                </td>
                <td colspan="3"><strong>POL</strong>
                    <font style="font-size: 12px;">
                        \[V_{3}=0.85P\left(\begin{array}{c}\frac{K_{3}}{100}\times\frac{P_{1}-P_{0}}{P_{0}}\end{array}\right)\]
                    </font>
                </td>
                <td colspan="3"><strong>STEEL</strong>
                    <font style="font-size: 10px;">\[V_{5}=\frac{SO\left({SI_{1}}-{SI_{0}}\right)}{SI_{0}}\times T\]
                    </font>
                </td>
                <td colspan="3"><strong>CEMENT</strong>
                    <font style="font-size: 10px;">\[V_{5}=\frac{SO\left({SI_{1}}-{SI_{0}}\right)}{SI_{0}}\times T\]
                    </font>
                </td>

            </tr>
            <tr class="pad">
                <td>Particular</td>
                <td>Qty.</td>
                <td>Rate</td>
                <td>amount</td>
                <td>Index</td>
                <td>Av.Index</td>
                <td>Amount</td>
                <td>Index</td>
                <td>Av.Index</td>
                <td>Amount</td>
                <td>Index</td>
                <td>Av.Index</td>
                <td>Amount</td>
                <td>Index</td>
                <td>Av.Index</td>
                <td>Amount</td>
                <td>Index</td>
                <td>Av.Index</td>
                <td>Amount</td>

            </tr>
            <tr class="pad">
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>

            </tr>
            <tr class="pad">
                <td></td>
            </tr>
            <tr class="pad">
                <td>1</td>
                <td>20-Mar-23</td>
                <td>1165513</td>
                <td>Cement</td>
                <td>39.90</td>
                <td>4140</td>
                <td>165186</td>
                <td>846754</td>
                <td>Oct-21</td>
                <td>397.2</td>
                <td>418.43</td>
                <td>17.45</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>

            </tr>
            <tr>
                <th></th>
                <th>Total</th>
                <th>5454545</th>
                <th>Total</th>
                <th>212</th>
                <th>Total</th>
                <th>545546</th>
                <th>2165654</th>
                <th>Total</th>
                <th>6266</th>
                <th>Total</th>
                <th>1545</th>
                <th>64545</th>
                <th>Total</th>
                <th>5454</th>
                <th>44545</th>
                <th>Total</th>
                <th>454545</th>
                <th>544</th>
                <th>Total</th>
                <th>8454</th>
                <th>455</th>
                <th>Total</th>
                <th>5454</th>

            </tr>
            <tr>
                <th colspan="2">Grand Total</th>

                <th>5454545</th>
                <th>&nbsp; &nbsp;&nbsp;</th>
                <th>&nbsp; &nbsp;&nbsp;</th>
                <th colspan="2">Grand Total</th>
                <th>2165654</th>
                <th></th>
                <th colspan="2" style="font-size: 14px;">G.T. of LABOUR</th>
                <th>1545</th>
                <th colspan="2" style="font-size: 14px;">G.T. of MATERIAL</th>

                <th>64545</th>
                <th colspan="2" style="font-size: 14px;">G.T. of POL</th>

                <th>5454</th>
                <th colspan="2" style="font-size: 14px;">G.T. of STEEL</th>

                <th>44545</th>
                <th colspan="2" style="font-size: 14px;">G.T. of CEMENT</th>

                <th>165646</th>

            </tr>
        </tbody>
    </table>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-5 ml-5">
                <h3 style="font-size: 15px;"><b><u>Update Quantity of Cement/Steel</b></u></h3>

                <table style="border: 1px solid black; ">
                    <tr>
                        <td>
                            <strong>Date of receipt of tendor: </strong><br>
                        </td>
                        <td>
                            13-Aug-21
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Date of work order </strong><br>
                        </td>
                        <td>
                            30-Sep-21
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Date of receipt of tendor: </strong>
                        </td>
                        <td>4140</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Date of receipt of tendor: </strong><br>
                        </td>
                        <td>
                            50220
                        </td>
                    </tr>
                </table>
            </div>

            <div class=" col col-lg-4">
                <table style="border: 1px solid black;">
                    <thead>
                        <h4 style="font-size: 15px;"><b>ABSTRACT</b></h4>
                        <th>Particulars</th>
                        <th>Upto Date Amt.</th>
                        <th>Previous Paid</th>
                        <th>Now to be Paid</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Labour</td>
                            <td>384</td>
                            <td>132.9</td>
                            <td>90.13</td>

                        </tr>
                        <tr>
                            <td>Material</td>
                            <td>5646</td>
                            <td>656</td>
                            <td>66</td>

                        </tr>
                        <tr>
                            <td>Pol</td>
                            <td>6456</td>
                            <td>6151</td>
                            <td>515</td>

                        </tr>
                        <tr>
                            <td>Steel</td>
                            <td>386.50</td>
                            <td>131.33</td>
                            <td>118.03</td>
                        </tr>
                        <tr>
                            <td>Cement</td>
                            <td>51545</td>
                            <td>545454</td>
                            <td>1546514</td>

                        </tr>
                        <tr>
                            <th>TOTAL Rs.</th>
                            <th>5664496</th>
                            <th>62154</th>
                            <th>1212121215</th>

                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>










</body>

</html>