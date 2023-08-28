<?php

include './inc/database.php';


$database = new Database();

if (isset($_GET['pe_id'])) {
    $pe_id = $_GET['pe_id'];
    $database->update("price_escalation", ['is_deleted'=>1],["pe_id" => $pe_id]);
    header("Location: price-escalation-view.php");
    exit;
}

?>