<?php
include './inc/database.php';


$database = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pe_id = $_POST['pe_id'];

    $data['month'] = $_REQUEST['month']."-01";
    $data['labour'] = $_REQUEST['labour'];
    $data['material'] = $_REQUEST['material'];
    $data['pol'] = $_REQUEST['pol'];
     $data['steel'] = $_REQUEST['steel'];
     $data['cement'] = $_REQUEST['cement'];

    $database->update("price_escalation", $data, ["pe_id" => $pe_id]);

    header("Location: price-escalation-view.php");
    exit;
}

include 'footer.php';
?>
