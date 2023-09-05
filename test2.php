<?php 
function printUniqueMonths($bill_data) {
    $printed_months = array(); // Array to keep track of printed months

    foreach ($bill_data as $bill) {
        $formatted_date = date("M-y", strtotime($bill['month']));

        // Check if this month has already been printed
        if (!in_array($formatted_date, $printed_months)) {
            echo $formatted_date . "\n";
            $printed_months[] = $formatted_date; // Add to the printed months array
        }
    }
}

$bill_data = $database->query("SELECT * 
               FROM price_escalation 
               WHERE month >= '$bill_start_date' AND month <= '$bill_end_date'")->fetchAll();

printUniqueMonths($bill_data);

?>