<?php

include './inc/database.php';
$database = new Database();

if (isset($_GET['c_id'])) {
    $c_id = $_GET['c_id'];
    $database->update("contractors", ['is_deleted' => 1], ["c_id" => $c_id]);
    header("Location: contractor-view.php");
    exit;
}

?>