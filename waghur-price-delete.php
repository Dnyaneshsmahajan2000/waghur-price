<?php

$database = new Database();

if (isset($_GET['wp_id'])) {
    $wp_id = $_GET['wp_id'];
    $database->delete("waghur_price", ["wp_id" => $wp_id]);
    header("Location: waghur-price-view.php"); 
    exit;
}

?>
