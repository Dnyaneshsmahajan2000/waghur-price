<?php

include './inc/database.php';
$database = new Database();

if (isset($_GET['p1_id'])) {
    $p1_id = $_GET['p1_id'];
    $database->update("project_1", ['is_deleted' => 1], ["p1_id" => $p1_id]);
    header("Location: project-1-view.php");
    exit;
}

?>