<?php

include './inc/database.php';

$database= new Database();
$data['month'] = $_POST['month'];
$data['labour'] = $_POST['labour'];
$data['material'] = $_POST['material'];
$data['pol'] = $_POST['pol'];
$data['steel'] = $_POST['steel'];
$data['cement'] = $_POST['cement'];
$year = date('Y', strtotime($data['month']));
$month = date('m', strtotime($data['month']));

$data['month'] = "$year-$month"; 
$waghur_price = $database->insert("waghur_price", $data);

if ($waghur_price) {

    echo "<script> alert('Data Inserted Successfully !');</script>";
    header("Location:waghur-price-view.php");

} else {
   echo "<script> alert('Data Failed to inserted !');</script>";
    header("Location:waghur-price-add.php");
}
?>



