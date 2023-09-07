<?php


include './inc/database.php';

$database = new Database();


$data['name_of_contractor_english'] = $_POST['name_of_contractor_english'];
$data['name_of_contractor_marathi'] = $_POST['name_of_contractor_marathi'];
$data['address_of_contractor_english'] = $_POST['address_of_contractor_english'];
$data['address_of_contractor_marathi'] = $_POST['address_of_contractor_marathi'];
$data['contractor_representative_name'] = $_POST['contractor_representative_name'];
$data['contractor_representative_mobile'] = $_POST['contractor_representative_mobile'];
$data['pwd_registration_no'] = $_POST['pwd_registration_no'];
$data['pwd_valid_date'] = $_POST['pwd_valid_date'];
$data['pin_code'] = $_POST['pin_code'];
$data['email'] = $_POST['email'];
$data['mobile_number'] = $_POST['mobile_number'];
$data['alternate_number_1'] = $_POST['alternate_number_1'];
$data['alternate_number_2'] = $_POST['alternate_number_2'];
$data['landline_number'] = $_POST['landline_number'];
$data['alternate_landline_number'] = $_POST['alternate_landline_number'];
$data['pancard_number'] = $_POST['pancard_number'];
$data['gst_number'] = $_POST['gst_number'];
$data['bank_name'] = $_POST['bank_name'];
$data['account_number'] = $_POST['account_number'];
$data['ifsc_code'] = $_POST['ifsc_code'];
$data['account_type'] = $_POST['account_type'];
$data['branch_address'] = $_POST['branch_address'];
$data['branch_telephone_number'] = $_POST['branch_telephone_number'];


$file_photo = $_FILES['pwd_document']['name'];
$file_path = $_FILES['pwd_document']['tmp_name'];
$dest = 'images/' . time() . $file_photo;
$data['pwd_document'] = $dest;
move_uploaded_file($file_path, $dest);

$file_photo = $_FILES['pancard_document']['name'];
$file_path = $_FILES['pancard_document']['tmp_name'];
$dest = 'images/' . time() . $file_photo;
$data['pancard_document'] = $dest;
move_uploaded_file($file_path, $dest);

$file_photo = $_FILES['gst_document']['name'];
$file_path = $_FILES['gst_document']['tmp_name'];
$dest = 'images/' . time() . $file_photo;
$data['gst_document'] = $dest;
move_uploaded_file($file_path, $dest);


$contractor = $database->insert("contractors", $data);

if ($contractor) {

    echo "<script> alert('Data Inserted Successfully !');</script>";
    header("Location:contractor-view.php");

} else {
    echo "<script> alert('Data Failed to inserted !');</script>";
    header("Location:contractor-add.php");
}

?>