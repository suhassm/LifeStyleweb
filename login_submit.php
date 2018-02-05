<?php

//require("includes/common.php");
$con = mysqli_connect("localhost", "root", "", "ecommerce")or die($mysqli_error($con));
session_start();
 
$email = mysqli_real_escape_string($con,filter_input(INPUT_POST, 'e-mail'));
//$password = ;
$password = mysqli_real_escape_string($con, filter_input(INPUT_POST, 'password'));
$password1 = MD5($password);
// Query checks if the email and password are present in the database.
$query = "SELECT id, email_id FROM users WHERE email_id='" . $email . "' AND password='" . $password1 . "'";
$result = mysqli_query($con, $query) or die($mysqli_error($con));
$num = mysqli_num_rows($result);
// If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
if ($num == 0) {
  $error = "<span class='red'>Please enter correct E-mail id and Password</span>";
  header('location: login.php?error=' . $error);
} else {  
  $row = mysqli_fetch_array($result);
  $_SESSION['email_id'] = $row['email_id'];
  $_SESSION['user_id'] = $row['id'];
  header('location: products.php');
}

