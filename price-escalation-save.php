<?php

include './inc/database.php';

$database= new Database();
$data['name_of_work'] = $_POST['name_of_work'];
$data['name_of_agency'] = $_POST['name_of_agency'];
$data['agreement_no'] = $_POST['agreement_no'];
$data['sub_division'] = $_POST['sub_division'];
$data['authority'] = $_POST['authority'];
$data['dateofreceiptof_tendor'] = $_POST['dateofreceiptof_tendor'];
$data['dateofwork_order'] = $_POST['dateofwork_order'];
$data['sroc'] = $_POST['sroc'];
$data['sros'] = $_POST['sros'];
$data['labour'] = $_POST['labour'];
$data['material'] = $_POST['material'];
$data['pol'] = $_POST['pol'];


$price_escalation = $database->insert("price_escalation", $data);

if ($price_escalation) {

    echo "<script> alert('Data Inserted Successfully !');</script>";
    header("Location:price-escalation-view.php");

} else {
   echo "<script> alert('Data Failed to inserted !');</script>";
    header("Location:price-escalation-add.php");
}
?>



