<?php


include './inc/database.php';

$database= new Database();

$contractor_id=$_REQUEST['contractor_id'];
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





$file_photo = $_FILES['pwd']['name'] ?? null;
$file_path = $_FILES['pwd']['tmp_name'] ?? null;
if ($file_photo && $file_path) {
    $dest = 'image/' . time() . $file_photo;

    $old_pwd = $database->get("contractors", '*',['c_id'=>$contractor_id]);
    if ($old_pwd && isset($old_pwd['pwd'])) {
        $old_pwd_path = $old_pwd['pwd'];
        if (file_exists($old_pwd_path)) {
            unlink($old_pwd_path);
        }
    }

    $data['pwd'] = $dest;
    move_uploaded_file($file_path, $dest);
}


$file_photo = $_FILES['pancard_number']['name'] ?? null;
$file_path = $_FILES['pancard_number']['tmp_name'] ?? null;
if ($file_photo && $file_path) {
    $dest = 'image/' . time() . $file_photo;

    $old_pancard = $database->get("contractors", '*',['c_id'=>$contractor_id]);
    if ($old_pancard && isset($old_pancard['pancard_number'])) {
        $old_pancard_path = $old_pancard['pancard_number'];
        if (file_exists($old_pancard_path)) {
            unlink($old_pancard_path);
        }
    }

    $data['pancard_number'] = $dest;
    move_uploaded_file($file_path, $dest);
}
$file_photo = $_FILES['gst_number']['name'] ?? null;
$file_path = $_FILES['gst_number']['tmp_name'] ?? null;
if ($file_photo && $file_path) {
    $dest = 'image/' . time() . $file_photo;

    $old_gst = $database->get("contractors", '*',['c_id'=>$contractor_id]);
    if ($old_gst && isset($old_gst['gst_number'])) {
        $old_gst_path = $old_gst['gst_number'];
        if (file_exists($old_gst_path)) {
            unlink($old_gst_path);
        }
    }

    $data['gst_number'] = $dest;
    move_uploaded_file($file_path, $dest);
}

$contractor = $database->update("contractors", $data,['c_id'=>$contractor_id]);

if ($contractor) {

    echo "<script> alert('Data Update Successfully !');</script>";
    header("Location:contractor-view.php");

} else {
   echo "<script> alert('Data Failed to Update !');</script>";
    header("Location:contractor-view.php");
}

?>