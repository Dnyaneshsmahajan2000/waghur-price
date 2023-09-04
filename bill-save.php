<?php

include './inc/database.php';

$database= new Database();
$data['project_id'] = $_POST['name_of_work'];
$data['date_measurement'] = $_POST['date_measurement'];
$data['total_amount'] = $_POST['total_amount'];
$data['quantity_cement'] = $_POST['quantity_cement'];
$data['quantity_steel'] = $_POST['quantity_steel'];

$bill = $database->insert("bills", $data);

if ($bill) {

    echo "<script> alert('Data Inserted Successfully !');</script>";
    header("Location:bill-view.php");

} else {
   echo "<script> alert('Data Failed to inserted !');</script>";
    header("Location:bill-add.php");
}
?>



