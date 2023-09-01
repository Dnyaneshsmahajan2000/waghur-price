<?php

include './inc/database.php';
$database = new Database();

if (isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];
    $database->update("project", ['is_deleted' => 1], ["p_id" => $p_id]);
    header("Location: project-view.php");
    exit;
}

?>