<?php
session_start();
include 'inc/database.php';

$db = new Database();
$user_id=$_REQUEST['user_id'];
$name = $_POST['name'];
$mobile_no = $_POST['mobile_no'];
$type = $_POST['type'];
$permission = $_POST['permissions'];

//print_r($_POST);
$user = $db->update("users", ['name' => $name, 'mobile_no' => $mobile_no, 'type' => $type], ['id' => $user_id]);
if ($user) {
    echo "<script>alert( 'User Updated!');window.location='users.php';</script>";
} else {
    echo "<script>alert( 'Fail to Updated!');window.location='user-update.php';</script>";
 
}