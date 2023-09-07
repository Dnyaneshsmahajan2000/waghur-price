<?php

include './inc/database.php';

$database= new Database();
$data['name_of_work'] = $_POST['name_of_work'];
$data['name_of_agency'] = $_POST['name_of_agency'];
$data['agreement_no'] = $_POST['agreement_no'];
$data['sub_division'] = $_POST['sub_division'];
$data['authority'] = $_POST['authority'];
$data['date_receipt_tender'] = $_POST['date_receipt_tendor'];
$data['date_work_order'] = $_POST['date_work_order'];
$data['star_rate_cement'] = $_POST['star_rate_cement'];
$data['star_rate_steel'] = $_POST['star_rate_steel'];
$data['labour'] = $_POST['labour'];
$data['material'] = $_POST['material'];
$data['pol'] = $_POST['pol'];


$project = $database->insert("project", $data);

if ($project) {

    echo "<script> alert('Data Inserted Successfully !');</script>";
    header("Location:project-view.php");

} else {
   echo "<script> alert('Data Failed to inserted !');</script>";
    header("Location:project-add.php");
}
?>



