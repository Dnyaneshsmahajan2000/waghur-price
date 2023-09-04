<?php
include './inc/database.php';


$database = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $p_id = $_POST['p_id'];

    $data = [
        "name_of_work" => $_POST['name_of_work'],
        "name_of_agency" => $_POST['name_of_agency'],
        "agreement_no" => $_POST['agreement_no'],
        "sub_division" => $_POST['sub_division'],
        "authority" => $_POST['authority'],
        "date_receipt_tender" => $_POST['date_receipt_tender'],
        "date_work_order" => $_POST['date_work_order'],
        "star_rate_cement" => $_POST['star_rate_cement'],
        "star_rate_steel" => $_POST['star_rate_steel'],
        "labour" => $_POST['labour'],
        "material" => $_POST['material'],
        "pol" => $_POST['pol']

    ];

    $database->update("project", $data, ["p_id" => $p_id]);

    header("Location: project-view.php");
    exit;
}

include 'footer.php';
?>
