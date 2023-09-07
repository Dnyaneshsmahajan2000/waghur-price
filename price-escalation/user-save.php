<?php
session_start();
//echo $user_id=$_SESSION['user']['user_id'];
include './inc/database.php';


$db = new Database();
$name = $_POST['name'];
$mobile_no = $_POST['mobile_no'];
$password = md5($_POST['password']);

$permissions = $_POST['permissions'];
$type = $_POST['type'];

$admin = $db->insert("users", ['name' => $name, 'mobile_no' => $mobile_no, 'password' => $password, 'permissions' => $permissions, 'type' => $type]);
if ($admin) {
    echo "<script>alert( 'User Added!');window.location='users.php';</script>";
} else {
    echo "<script>alert('Oops', ' While Adding User!');
         echo window.location='user-add.php';</script>";
}

?>