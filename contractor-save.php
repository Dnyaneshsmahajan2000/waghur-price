<?php


include './inc/database.php';

$database= new Database();


$data['name_of_contractor'] = $_POST['name_of_contractor'];
$data['address_of_contractor'] = $_POST['address_of_contractor'];
$data['contractor_representative'] = $_POST['contractor_representative'];
$data['pin_code'] = $_POST['pin_code'];
$data['email'] = $_POST['email'];
$data['mobile_number'] = $_POST['mobile_number'];
$data['landline_number'] = $_POST['landline_number'];
$data['bank_name'] = $_POST['bank_name'];
$data['account_number'] = $_POST['account_number'];
$data['ifsc_code'] = $_POST['ifsc_code'];
$data['account_type'] = $_POST['account_type'];
$data['branch_address'] = $_POST['branch_address'];
$data['branch_telephone_number'] = $_POST['branch_telephone_number'];



$filename1 = $_FILES["pwd"]["name"];
$tempname1 = $_FILES["pwd"]["tmp_name"];
$folder1 = "images/".$filename1;
move_uploaded_file($tempname1,$folder1);

$filename2 = $_FILES["pancard_number"]["name"];
$tempname2 = $_FILES["pancard_number"]["tmp_name"];
$folder2 = "images/".$filename2;
move_uploaded_file($tempname2,$folder2);

$filename3 = $_FILES["gst_number"]["name"];
$tempname3 = $_FILES["gst_number"]["tmp_name"];
$folder3 = "images/".$filename3;
move_uploaded_file($tempname3,$folder3);


$data['pwd'] = $folder1;
$data['pancard_number'] = $folder2;
$data['gst_number'] = $folder3;





$contractor = $database->insert("contractors", $data);

if ($contractor) {

    echo "<script> alert('Data Inserted Successfully !');</script>";
    header("Location:contractor-view.php");

} else {
   echo "<script> alert('Data Failed to inserted !');</script>";
    header("Location:contractor-add.php");
}

?>