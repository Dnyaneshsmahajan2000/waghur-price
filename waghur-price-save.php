<?php

include './inc/database.php';
$database= new Database();

$data ['month'] = $_POST['month'];
$data['labour'] = $_POST['labour'];
$data['material'] = $_POST['material'];
$data['pol'] = $_POST['pol'];
$data['steel'] = $_POST['steel'];
$data['cement'] = $_POST['cement'];

$waghur_price = $database->insert("waghur_price", $data);
if ($waghur_price) {

    echo "<script> alert('Data Inserted Successfully !'); window.location=student-admission.php;</script>";

} else {
   echo "<script> alert('Data Failed to inserted !'); window.location=student-admission.php;</script>";

}
?>



