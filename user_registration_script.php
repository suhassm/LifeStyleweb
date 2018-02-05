
<?php

$con = mysqli_connect("localhost", "root", "", "ecommerce") or die(mysqli_error($con));
session_start();
$email_id = mysqli_real_escape_string($con, $_POST['email_id']);
$first_name = mysqli_real_escape_string($con, $_POST['first_name']);
$last_name = mysqli_real_escape_string($con, $_POST['last_name']);
$phone = $_POST['phone'];
$user_registration_query = "insert into users(email_id, first_name, last_name, phone,registration_time) values ('$email_id', '$first_name', '$last_name', '$phone',NOW())";
$user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
echo "User successfully inserted";
$_SESSION['email_id'] = $email_id;
$_SESSION['id'] = mysqli_insert_id($con);
?>
