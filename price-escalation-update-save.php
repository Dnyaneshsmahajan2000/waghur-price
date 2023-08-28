<?php
include './inc/database.php';


$database = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pe_id = $_POST['pe_id'];

    $data = [
        "month" => $_POST['month'],
        "labour" => $_POST['labour'],
        "material" => $_POST['material'],
        "pol" => $_POST['pol'],
        "steel" => $_POST['steel'],
        "cement" => $_POST['cement']

    ];

    $database->update("price_escalation", $data, ["pe_id" => $pe_id]);

    header("Location: price-escalation-view.php");
    exit;
}

include 'footer.php';
?>
