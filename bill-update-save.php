<?php
include './inc/database.php';
$database = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bill_id = $_POST['bill_id'];

    $data = [
        "project_id" => $_POST['name_of_work'],
        "date_measurement" => $_POST['date_measurement'],
        "total_amount" => $_POST['total_amount'],
        "quantity_cement" => $_POST['quantity_cement'],
        "quantity_steel" => $_POST['quantity_steel']
    ];

    $database->update("bills", $data, ["bill_id" => $bill_id]);

    header("Location: bill-view.php");
    exit;
}

include 'footer.php';
?>
