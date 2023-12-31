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

        $yearMonth = $date->format('Y-m-01');

        // Add the result to the array
        $lastThreeMonths[] = $yearMonth;
    }

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
                            <?php echo $project['date_work_order'];
                            $bill_start_date = $project['date_work_order'];
                            ?>
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
                                    <?php echo number_format($row['labour'],1); ?>
                                </td>
                                <td>
                                    <?php echo number_format($row['material'],1); ?>
                                </td>
                                <td>
                                    <?php echo number_format($row['pol'],1); ?>
                                </td>
                                <td>
                                    <?php echo number_format($row['steel'],1); ?>
                                </td>
                                <td>
                                    <?php echo number_format($row['cement'],1); ?>
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
                                <?php 
                                $Labour_B=$labourAvg;
                                echo
                                number_format($labourAvg,2) ?>
                            </th>
                            <th>
                                <?php 
                                $Material_B=$materialAvg;
                                echo number_format($materialAvg,2); ?>
                            </th>
                            <th>
                                <?php 
                                $Pol_B=$polAvg;
                                echo number_format($polAvg,2); ?>
                            </th>
                            <th>
                                <?php 
                                $Steel_B=$steelAvg;
                                echo number_format($steelAvg,2); ?>
                            </th>
                            <th>
                                <?php 
                                $Cement_B=$cementAvg;
                                echo number_format($cementAvg,2); ?>
                            </th>

                        </tr>
                        <tr>
                            <th style="font-size: 11px;">%as per Tender</th>
                            <th>
                                <?php 
                               $Labour_D=$project['labour']/100;
                                echo $project["labour"] ?>
                            </th>
                            <th>
                                <?php 
                                $Material_D=$project['material']/100;
                                echo $project["material"] ?>
                            </th>
                            <th>
                                <?php 
                                
                                $Pol_D=$project['pol']/100;
                                echo $project["pol"] ?>
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <?php
                $c = 0;
                $projectdata = $database->select(
                    "bills",
                    "*",
                    ['project_id' => $p_id]
                );
                $count=1;
                $totalSum=0;
                $netTotalSum=0;
               $totalMaterial=0;
               $totalSteel=0;
               $totalCement=0;
               $totalPol=0;
               $totalLabour=0;
               
                foreach ($projectdata as $data) {
                    ?>
   
    <center>
        <h6>R.A. BILL No. & FINAL</h6>
    </center>
    <table class="margin mt-5">
                     
    <tbody>
            
    <table class="margin mt-5 ">
        <tbody>
            <tr>

                <td rowspan="2"><strong>Sr. No</strong></td>
                <td rowspan="2"><strong>Date Of Measurement</strong></td>
                <td rowspan="2"><strong>Total Amount:</strong></td>
                <td colspan="4"><strong>Deduct: Schedule A/Steel/Cement/Bulk Asphalt Amount</strong></td>
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
            <tr style="vertical-align: text-top;">
               <td>
                        <?php echo ++$c; ?>
                    </td>

                    <td>
                        <?php
                        $bill_end_date = $data['date_measurement'];
                        
                        /*if($count==1)
                        {
                        }
                        else{
                            $last_bill
                            
                        }*/
                        echo date("d-M-y", strtotime($data['date_measurement'])); ?>
                    </td>
                    <td>
                        <?php echo number_format($data['total_amount']); ?>
                    </td>
                    <td style="  ">Cement <br> Steel <br>B.A 60/70<br> B.A 80/100 <br>Clause-38</td>
                    <td>
                        <?php echo number_format($data['quantity_cement'],3) . "\n" . number_format($data['quantity_steel'],3); ?>
                    </td>
                    <td>
                        <?php echo number_format($project['star_rate_cement']) . "\n" . number_format($project['star_rate_steel']); ?>
                    </td>
                    <td>
                        <?php
                        $amount = $project['star_rate_cement'] * $data['quantity_cement'];
                        echo number_format($amount ). "\n";
                        $amount1 = $project['star_rate_steel'] * $data['quantity_steel'];
                        echo
                        number_format($amount1 );

                        $total_amount = $amount + $amount1;
                        ?>
                    </td>
                    <td>
                        <?php $netamount = $data['total_amount'] - $total_amount;
                        $C=$netamount;
                      echo  ($netamount);
                        ?>
                    </td>
                    <td>
                        <?php
                        $bill_data = $database->query("SELECT * 
                        FROM price_escalation 
                        WHERE month >= '$bill_start_date' AND month <= '$bill_end_date'")->fetchAll();
                        foreach ($bill_data as $bill) {
                            echo date("M-y", strtotime($bill['month'])) . "\n";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $labourcount = 0;
                        $totalLabourAmount = 0;
                        foreach ($bill_data as $bill) {
                            echo $bill['labour'] . "\n";
                            $totalLabourAmount += $bill['labour'];
                            $labourcount++;
                        }
                        ?>
                    </td>
                    <td>
                     <?php
                    $averageLabourAmount = ($labourcount > 0) ? $totalLabourAmount / $labourcount : 0;
                      $Labour_A=$averageLabourAmount;
                       echo (number_format($averageLabourAmount, 2));
                     ?>
                    </td>
                    <td>
                      <?php  
                      

                
                    $Labour_P = ($Labour_A - $Labour_B) / $Labour_B;
                      
                    $labour = $Labour_P * 0.85 * $C * $Labour_D;
                    $totalLabour += $labour;
                    echo number_format($labour,3);
                      ?>
                    </td>
                    <td>
                        <?php
                        $materialcount = 0;
                        $totalmaterialAmount = 0;
                        foreach ($bill_data as $bill) {
                            echo $bill['material'] . "\n";
                            $materialcount++;
                            $totalmaterialAmount += $bill['material'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $averagematerialAmount = ($materialcount > 0) ? $totalmaterialAmount / $materialcount : 0;
                       $Material_A=$averagematerialAmount;
                        echo
                        (number_format( $averagematerialAmount, 2));
                        ?>
                    </td>
                    <td><?php 
                    $Material_P = ($Material_A - $Material_B) / $Material_B;
                      
                    $Material = $Material_P * 0.85 * $C * $Material_D;
                    $totalMaterial+=$Material;                    
                      echo number_format($Material,3);
                     
                    
                    ?></td>
                    <td>
                        <?php
                        $polcount = 0;
                        $totalpolAmount = 0;
                        foreach ($bill_data as $bill) {
                            echo $bill['pol'] . "\n";
                            $polcount++;
                            $totalpolAmount += $bill['pol'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $averagepolAmount = ($polcount > 0) ? $totalpolAmount / $polcount : 0;
                      $Pol_A=$averagepolAmount; 
                      echo 
                        (number_format( $averagepolAmount, 2));
  
                       ?>
                    </td>
                    <td>
                        <?php 
                         $Pol_P = ($Pol_A - $Pol_B) / $Pol_B;
                      
                         $Pol= $Pol_P * 0.85 * $C * $Pol_D;
                         
                         $totalPol=$Pol;
                         
                           echo number_format($Pol,3);
                            
                        ?>
                    </td>
                    <td>
                        <?php
                        $steelcount = 0;
                        $totalsteelAmount = 0;
                        foreach ($bill_data as $bill) {
                            echo $bill['steel'] . "\n";
                            $steelcount++;
                            $totalsteelAmount += $bill['steel'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $averagesteelAmount = ($steelcount > 0) ? $totalsteelAmount / $steelcount : 0;
                        echo   (number_format($averagesteelAmount, 2));

                  ?>
                    </td>
                    <td></td>
                    <td>
                        <?php
                        $cementcount = 0;
                        $totalcementAmount = 0;
                        foreach ($bill_data as $bill) {
                            echo $bill['cement'] . "\n";
                            $cementcount++;
                            $totalcementAmount += $bill['cement'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $averagecementAmount = ($cementcount > 0) ? $totalcementAmount / $cementcount : 0;
                        echo   (number_format($averagecementAmount, 2));
   
                      ?>
                    </td>
                    <td></td>
                </tr>
                <?php ?>

                <tr style="vertical-align: text-top;">
                    <?php
                    ?>
                    <th></th>
                    <th>Total</th>
                    <th>
                        <?php
                        $totalamount = $data['total_amount'];
                        $totalSum += $data['total_amount'];

                        echo number_format($totalamount);
                        ?>
                    </th>
                    <th>Total</th>
                    <th>
                         <?php
                        $amount = $data['quantity_cement'];
                        $amount1 = $data['quantity_steel'];
                        $totamount = $amount + $amount1;
                        echo 
                        number_format($totamount);
                        ?>
                    </th>
                    <th>Total</th>
                    <th>
                        <?php
                        $amount = $project['star_rate_cement'] * $data['quantity_cement'];
                        $amount1 = $project['star_rate_steel'] * $data['quantity_steel'];
                        $netamount = $amount + $amount1;
                       echo  number_format($netamount);

                     ?>
                    </th>
                    <th>
                   <?php 
                        $finalamount = $totalamount - $netamount;
                    $netTotalSum+=$finalamount;
                      
                    echo number_format($finalamount); 
                        ?>
                    </th>
                    <th>Total</th>
                    <th>
                        <?php
                        echo number_format($totalLabourAmount, 2);
                        ?>
                    </th>
                    <th>Total</th>
                    <th>
                        <?php ?>
                    </th>
                    <th>
                        <?php echo number_format($totalmaterialAmount, 2);
                        ?>
                    </th>
                    <th>Total</th>
                    <th></th>
                    <th>
                        <?php echo number_format($totalpolAmount, 2);
                        ?>
                    </th>
                    <th>Total</th>
                    <th></th>
                    <th>
                        <?php echo number_format($totalsteelAmount, 2);
                        ?>
                    </th>
                    <th>Total</th>
                    <th></th>
                    <th>
                        <?php echo number_format($totalcementAmount, 2);
                        ?>
                    </th>
                    <th>Total</th>
                    <th></th>
                </tr>
            <?php
            $bill_start_date = $data['date_measurement'];
                        
         ?>

            <tr>
                <td></td>
            </tr>

            <tr>
                <th colspan="2">Grand Total</th>
                <th><?php echo number_format($totalSum);?></th>
                <th>&nbsp; &nbsp;&nbsp;</th>
                <th>&nbsp; &nbsp;&nbsp;</th>
                <th colspan="2">Grand Total</th>
                <th><?php echo number_format($netTotalSum);?></th>
                <th></th>
                <th colspan="2" style="font-size: 14px;">G.T. of LABOUR</th>
                <th><?php echo number_format($totalLabour,3); ?></th>
                <th colspan="2" style="font-size: 14px;">G.T. of MATERIAL</th>
                <th><?php echo number_format($totalMaterial,3);?></th>
                <th colspan="2" style="font-size: 14px;">G.T. of POL</th>
                <th><?php echo number_format($totalPol,3);?></th>
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
            <?php }?>

        </div>
    </div>
    </div>

</body>

</html>