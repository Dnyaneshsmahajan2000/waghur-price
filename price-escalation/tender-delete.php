<?php

include './inc/database.php';
$database = new Database();

if (isset($_GET['t_id'])) {
    $t_id = $_GET['t_id'];
    $database->update("tenders", ['is_deleted' => 1], ["t_id" => $t_id]);
    header("Location: tender-view.php");
    exit;
}

?>