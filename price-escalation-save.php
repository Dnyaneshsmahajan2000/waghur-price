<?php

include './inc/database.php';

$database= new Database();
$data['month'] = $_POST['month'];
$data['labour'] = $_POST['labour'];
$data['material'] = $_POST['material'];
$data['pol'] = $_POST['pol'];
 $data['steel'] = $_POST['steel'];
 $data['cement'] = $_POST['cement'];

$month = date('M-Y', strtotime($data['month']));

$data['month'] = "$year $month"; 
$price_escalation = $database->insert("price_escalation", $data);

if ($price_escalation) {

   echo "<script> alert('Data Inserted Successfully !');</script>";
    header("Location:price-escalation-view.php");

} else {
  echo "<script> alert('Data Failed to inserted !');</script>";
   header("Location:price-escalation-add.php");
}
?>



