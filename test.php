<?php
session_start();
include './inc/database.php';
$user = $_SESSION['user_login'];

$db = new Database();
$id = $user['id'];

// Corrected date format
$dateString = "2021-08-13"; // Change this to your desired date

// Create a DateTime object from the input date
$date = new DateTime($dateString);

// Initialize an array to store the month names
$months = array();

// Subtract one month to exclude the current month
$date->modify('-1 month');

for ($i = 0; $i < 3; $i++) {
    // Get the month and year of the current date in the format "F-Y"
    $monthName = $date->format('F-Y');
    
    $months[] = $monthName;

    // Move to the previous month
    $date->modify('-1 month');
}

// Reverse the array to get the names in the correct order (previous to most recent)
$months = array_reverse($months);

// Create a comma-separated list of month names
$monthList = implode("', '", $months);
echo $monthList;


var_dump($data);// Process the retrieved data as needed
foreach ($data as $row) {
    echo $row['month']."\n";
    echo $row['pol']."\n";
    echo $row['labour']."\n";
}
?>
