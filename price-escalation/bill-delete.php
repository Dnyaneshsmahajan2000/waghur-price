<?php

include './inc/database.php';
$database = new Database();

if (isset($_GET['bill_id'])) {
    $bill_id = $_GET['bill_id'];
    $database->update("bills", ['is_deleted' => 1], ["bill_id" => $bill_id]);
    header("Location: bill-view.php");
    exit;
}

?>