<?php
include './inc/database.php';


$database = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $t_id = $_POST['t_id'];

    $data['name_of_work'] = $_POST['name_of_work'];
    $data['name_of_contractor'] = $_POST['name_of_contractor'];
    $data['tender_amount'] = $_POST['tender_amount'];
    $data['tender_rate'] = $_POST['tender_rate'];
    $data['tender_updated_price'] = $_POST['tender_updated_price'];
    $data['type_of_tender'] = $_POST['type_of_tender'];
    $data['tender_code'] = $_POST['tender_code'];
    $data['tender_price_proposal'] = $_POST['tender_price_proposal'];
    $data['at_work'] = $_POST['at_work'];
    $data['price_increase'] = $_POST['price_increase'];
    $data['goods_service_tax'] = $_POST['goods_service_tax'];
    $data['total'] = $_POST['total'];
    $data['grace_period'] = $_POST['grace_period'];

    $database->update("tenders", $data, ["t_id" => $t_id]);

    header("Location: tender-view.php");
    exit;
}

include 'footer.php';
?>
