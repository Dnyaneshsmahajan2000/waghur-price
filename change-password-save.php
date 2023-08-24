<?php

session_start();
//require './inc/validate.php';
require './inc/database.php';
$db = new Database();

$user_id = $_SESSION['user']['id'];
$current_password = $_REQUEST['currentpass'];
$new_password = $_REQUEST['newpass'];
$confirm_password = $_REQUEST['confirmpass'];

$user = $db->get("users", "*", ['user_id' => $user_id]);
if ($user['password'] != md5($current_password)) {
    //echo "<script>alert('Please Enter Correct current password');window.location='change-password.php';</script>";
} elseif ($new_password != $confirm_password) {
    echo "<script>alert('Sorry new password and confirm password are not match please try again'); window.location='change-password.php'; </script>";
} else {
    $update = $db->update("users", ['password' => md5($new_password)], ['user_id' => $user_id]);
    if ($update >= 0) {
        echo '<script>alert("Your Password Change Successfully");window.location="logout.php";  </script>';
    } else {
        echo '<script>alert("Failed to change");window.location="change-password.php";  </script>';
    }
}
?>