<?php
include './inc/database.php';


$database = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $p1_id = $_POST['p1_id'];

    $data = [
        "name_of_work" => $_POST['name_of_work'],
        "name_of_agency" => $_POST['name_of_agency'],
        "agreement_no" => $_POST['agreement_no'],
        "sub_division" => $_POST['sub_division'],
        "authority" => $_POST['authority'],
        "dateofreceiptof_tendor" => $_POST['dateofreceiptof_tendor'],
        "dateofwork_order" => $_POST['dateofwork_order'],
        "sroc" => $_POST['sroc'],
        "sros" => $_POST['sros'],
        "labour" => $_POST['labour'],
        "material" => $_POST['material'],
        "pol" => $_POST['pol']

    ];

    $database->update("project_1", $data, ["p1_id" => $p1_id]);

    header("Location: project-1-view.php");
    exit;
}

include 'footer.php';
?>
