<?php
session_start();
include './inc/database.php';

$mobile = $_POST['mobile_no'];
$password = $_POST['password'];

$_SESSION['mobile'] = $mobile;

// echo $mobile;
// echo $password;

$database = new Database();

$userData = $database->get(
    'users',
    '*',
    [
        "AND" => [
            'mobile_no' => $mobile,
            'password' => $password
        ]
    ]
);

if ($userData) {
    //echo "<script>alert('User Found')</script>";
    $_SESSION['user_login'] = $userData;
   var_dump($_SESSION['user_login']);
    echo "<script>alert('Login Successfully')</script>";
    echo "<script>window.location='index.php'</script>";

} else {
    echo "<script>alert('User Not Found Please Signup First')</script>";
    echo "<script>window.location='login.php'</script>";
}
?>