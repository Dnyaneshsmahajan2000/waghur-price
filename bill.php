<?php


session_start();
include './inc/database.php';

$database = new Database();

if (isset($_GET['p_id']) && is_numeric($_GET['p_id'])) {
    $p_id = $_GET['p_id'];
    $project = $database->get("project", "*", ["p_id" => $p_id]);

    if (!$project) {
        echo "Record not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
function getLastThreeMonths($givenDate)
{
    // Convert the given date to a DateTime object
    $date = new DateTime($givenDate);

    // Initialize an array to store the last three months
    $lastThreeMonths = array();

    // Loop to get the last three months
    for ($i = 0; $i < 3; $i++) {
        // Subtract one month from the current date
        $date->modify('-1 month');

        // Get the year and month in "Y-m-00" format
        $yearMonth = $date->format('Y-m-00');

        // Add the result to the array
        $lastThreeMonths[] = $yearMonth;
    }

    // Return the array of last three months
    return $lastThreeMonths;
}

function getallMonths($givenDate)
{
    // Convert the given date to a DateTime object
    $date = new DateTime($givenDate);

    // Initialize an array to store the last three months
    $allMonths = array();

    // Loop to get the last three months
    for ($i = 0; $i < 3; $i++) {
        // Subtract one month from the current date
        $date->modify('month');

        // Get the year and month in "Y-m-00" format
        $yearMonth = $date->format('M-Y');

        // Add the result to the array
        $allMonths[] = $yearMonth;
    }

    // Return the array of last three months
    return $allMonths;
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
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h4>Price Escalation Statement</h4>

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-7">
                <strong>Name of Division: </strong> Waghur Dam Division, Jalgaon <br>
                <strong>Name of Work:</strong>
                <?php echo $project['name_of_work']; ?><br>
                <strong>Name of Agency:</strong>
                <?php echo $project['name_of_agency']; ?> <br>
                <strong>Agreement No:</strong>
                <?php echo $project['agreement_no']; ?>
            </div>
            <div class="col">
                <strong>Sub-Division:</strong>
                <?php echo $project['sub_division']; ?><br>
                <strong>Authority:</strong>
                <?php echo $project['authority']; ?>

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
                            <?php
                            echo date("d-M-y", strtotime($project['date_receipt_tender']));
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Date of work order </strong><br>
                        </td>
                        <td>
                            <?php echo $project['date_work_order']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Star Rate of Cement Rs.: </strong>
                        </td>
                        <td>
                            <?php echo $project['star_rate_cement']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Star Rate of Steel Rs.: </strong><br>
                        </td>
                        <td>
                            <?php echo $project['star_rate_steel']; ?>
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
                        $givenDate = $project['date_receipt_tender']; // Replace with your desired date
                        $lastThreeMonths = getLastThreeMonths($givenDate);
                        $data = $database->select("price_escalation", "*", ['month' => $lastThreeMonths]);

                        $rowCount = count($data);

                        $labourSum = 0;
                        $materialSum = 0;
                        $polSum = 0;
                        $steelSum = 0;
                        $cementSum = 0;

                        foreach ($data as $row) {
                            $formattedMonth = date("M-Y", strtotime($row['month']));
                            ?>
                            <tr>
                                <td>
                                    <?php echo $formattedMonth ?>
                                </td>
                                <td>
                                    <?php echo $row['labour'] ?>
                                </td>
                                <td>
                                    <?php echo $row['material'] ?>
                                </td>
                                <td>
                                    <?php echo $row['pol'] ?>
                                </td>
                                <td>
                                    <?php echo $row['steel'] ?>
                                </td>
                                <td>
                                    <?php echo $row['cement'] ?>
                                </td>
                            </tr>
                            <?php
                            $labourSum += $row['labour'];
                            $materialSum += $row['material'];
                            $polSum += $row['pol'];
                            $steelSum += $row['steel'];
                            $cementSum += $row['cement'];
                        }

                        $labourAvg = $rowCount > 0 ? round($labourSum / $rowCount, 2) : 0;
                        $materialAvg = $rowCount > 0 ? round($materialSum / $rowCount, 2) : 0;
                        $polAvg = $rowCount > 0 ? round($polSum / $rowCount, 2) : 0;
                        $steelAvg = $rowCount > 0 ? round($steelSum / $rowCount, 2) : 0;
                        $cementAvg = $rowCount > 0 ? round($cementSum / $rowCount, 2) : 0;

                        ?>
                        <tr>
                            <th>Av.Index</th>
                            <th>
                                <?php echo $labourAvg ?>
                            </th>
                            <th>
                                <?php echo $materialAvg ?>
                            </th>
                            <th>
                                <?php echo $polAvg ?>
                            </th>
                            <th>
                                <?php echo $steelAvg ?>
                            </th>
                            <th>
                                <?php echo $cementAvg ?>
                            </th>

                        </tr>
                        <tr>
                            <th style="font-size: 11px;">%as per Tender</th>
                            <th>
                                <?php echo $project["labour"] ?>
                            </th>
                            <th>
                                <?php echo $project["material"] ?>
                            </th>
                            <th>
                                <?php echo $project["pol"] ?>
                            </th>
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
                <td rowspan="2" style="padding: 7px;"><strong>Month</strong></td>
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
            <?php
            $data = $database->get("bills", "*");
            ?>
            <tr style="vertical-align: text-top;">
                <td>
                    <?php echo $project['p_id']; ?>
                </td>
                <td>

                    <?php


                    // display all data too be fetch from given date:
                   
                    // Function to display data
                    
                    //end function.
                    

                    ?>
                </td>
                <td>
                    <?php echo $data['total_amount']; ?>
                </td>
                <td>Cement <br> Steel <br>B.A 60/70<br> B.A 80/100 <br>Clause-38</td>
                <td>
                    <?php echo $data['quantity_cement'] . "\n" . $data['quantity_steel']; ?>
                </td>
                <td>
                    <?php echo $project['star_rate_cement'] . "\n";
                    echo $project['star_rate_steel']; ?>

                </td>
                <td>
                    <?php $amount = $project['star_rate_cement'] * $data['quantity_cement'];
                    echo $amount . "\n";
                    $amount1 = $project['star_rate_steel'] * $data['quantity_steel'];
                    echo $amount1;

                    $total_amount = $amount + $amount1;
                    ?>
                </td>

                <td>
                    <?php $netamount = $data['total_amount'] - $total_amount;
                    echo $netamount;
                    ?>
                </td>
                <td>
                    <?php

                    ?>

                </td>
                <td>
                    <?php
                    ?>
                </td>
                <td>
                    <?php
                    ?>
                </td>
                <td></td>
                <td>
                    <?php
                    ?>
                </td>
                <td>
                    <?php
                    ?>
                </td>
                <td></td>
                <td>
                    <?php
                    ?>
                </td>
                <td>
                    <?php
                    ?>
                </td>
                <td></td>
                <td>
                    <?php
                    ?>
                </td>
                <td>
                    <?php
                    ?>
                </td>
                <td></td>
                <td>
                    <?php
                    displayCement($dataToDisplay);
                    function displayCement($data)
                    {
                        foreach ($data as $row) {
                            // Display each row of data
                            echo $row['cement'] . "\n";

                        }
                    }
                    ?>
                </td>
                <td>
                    <?php
                    displayCementAvg($dataToDisplay);
                    function displayCementAvg($data)
                    {
                        $cementSum = 0;
                        $rowCount = count($data);
                        foreach ($data as $row) {

                            $cementSum = $cementSum + $row['cement'];
                        }
                        $cementAvg = $rowCount > 0 ? round($cementSum / $rowCount, 2) : 0;
                        echo $cementAvg;
                    }
                    ?>
                </td>
                <td></td>
            </tr>

            <tr>
                <?php
                $data = $database->get("bills", "*", ['project_id' => $p_id]); ?>

                <th></th>
                <th>Total</th>
                <th>
                    <?php
                    $totalamount = $data['total_amount'];
                    echo $totalamount;
                    ?>
                </th>
                <th>Total</th>
                <th>
                    <?php

                    $amount = $data['quantity_cement'];
                    $amount1 = $data['quantity_steel'];
                    $totamount = $amount + $amount1;
                    echo $totamount;

                    ?>
                </th>
                <th>Total</th>
                <th>
                    <?php
                    $amount = $project['star_rate_cement'] * $data['quantity_cement'];
                    $amount1 = $project['star_rate_steel'] * $data['quantity_steel'];
                    echo $netamount = $amount + $amount1;
                    ?>
                </th>
                <th>
                    <?php $finalamount = $totalamount - $netamount;
                    echo $finalamount; ?>
                </th>
                <th>Total</th>
                <th>
                    <?php
                    displayLabourTotal($dataToDisplay);
                    function displayLabourTotal($data)
                    {
                        $labourSum = 0;
                        foreach ($data as $row) {

                            $labourSum = $labourSum + $row['labour'];
                        }
                        echo $labourSum;
                    }
                    ?>
                </th>
                <th>Total</th>
                <th></th>
                <th>
                    <?php
                    displayMaterialTotal($dataToDisplay);
                    function displayMaterialTotal($data)
                    {
                        $materialSum = 0;
                        foreach ($data as $row) {

                            $materialSum = $materialSum + $row['material'];
                        }
                        echo $materialSum;
                    }
                    ?>
                </th>
                <th>Total</th>
                <th></th>
                <th>
                    <?php
                    displayPolTotal($dataToDisplay);
                    function displayPolTotal($data)
                    {
                        $polSum = 0;
                        foreach ($data as $row) {

                            $polSum = $polSum + $row['pol'];
                        }
                        echo $polSum;
                    }
                    ?>
                </th>
                <th>Total</th>
                <th></th>
                <th>
                    <?php
                    displaySteelTotal($dataToDisplay);
                    function displaySteelTotal($data)
                    {
                        $steelSum = 0;
                        foreach ($data as $row) {

                            $steelSum = $steelSum + $row['steel'];
                        }
                        echo $steelSum;
                    }
                    ?>
                </th>
                <th>Total</th>
                <th></th>
                <th>
                    <?php
                    displayCementTotal($dataToDisplay);
                    function displayCementTotal($data)
                    {
                        $cementSum = 0;
                        foreach ($data as $row) {

                            $cementSum = $cementSum + $row['cement'];
                        }
                        echo $cementSum;
                    }
                    ?>
                </th>
                <th>Total</th>
                <th></th>

            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
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

                <table style="border: 1px solid black;">
                    <tr>
                        <td style="width:70%;">
                            <strong>Cement</strong><br>
                        </td>
                        <td>
                            13-Aug-21
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Steel</strong><br>
                        </td>
                        <td>
                            30-Sep-21
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>B.A. 60/70 </strong>
                        </td>
                        <td>4140</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>B.A. 80/100 </strong><br>
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
<?php
// ... (previous code)

// Fetch all distinct dates from the `date_measurement` column of the `bills` table
$dateMeasurements = $database->select("bills", ["date_measurement"]);

foreach ($dateMeasurements as $measurement) {
    $selectedDate = $measurement["date_measurement"];

    // Fetch and display data from 'price_escalation' table based on the selected date
    $dataToDisplay = fetchDataFromDateMeasurement($database, $selectedDate);

    // Display the fetched data for the current date
    echo "<h2>Data for Date: " . date("d-M-y", strtotime($selectedDate)) . "</h2>";
    if ($selectedDate === $selectedDate) {
        // Display the fetched data
        displayData($dataToDisplay);

    }

    // ... (other code for displaying additional data)
}

?>