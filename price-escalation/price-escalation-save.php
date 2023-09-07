<?php

include './inc/database.php';

$database= new Database();
$data['month'] = $_REQUEST['month']."-01";
$data['labour'] = $_REQUEST['labour'];
$data['material'] = $_REQUEST['material'];
$data['pol'] = $_REQUEST['pol'];
 $data['steel'] = $_REQUEST['steel'];
 $data['cement'] = $_REQUEST['cement'];

//$month = date('M-Y', strtotime($data['month']));

//$data['month'] = "$year $month"; 
$price_escalation = $database->insert("price_escalation", $data);

if ($price_escalation) {

   echo "<script> alert('Data Inserted Successfully !');</script>";
    header("Location:price-escalation-view.php");

} else {
  echo "<script> alert('Data Failed to inserted !');</script>";
   header("Location:price-escalation-add.php");
}
?>



