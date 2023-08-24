<?php
include 'header.php';

$database = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $wp_id = $_POST['wp_id'];

    $data = [
        "month" => $_POST['month'],
        "labour" => $_POST['labour'],
        "material" => $_POST['material'],
        "pol" => $_POST['pol'],
        "steel" => $_POST['steel'],
        "cement" => $_POST['cement']

    ];

    $database->update("waghur_price", $data, ["wp_id" => $wp_id]);

    header("Location: waghur-price-view.php");
    exit;
}

include 'footer.php';
?>
