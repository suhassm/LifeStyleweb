<?php

//require("includes/common.php");
$con = mysqli_connect("localhost", "root", "", "ecommerce")or die($mysqli_error($con));
session_start();

  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
  $name = filter_input(INPUT_POST, 'name');
 // $name = mysqli_real_escape_string($con, $name1);

  $email = filter_input(INPUT_POST, 'e-mail');
  //$email = mysqli_real_escape_string($con, $email1);

  $password1 = filter_input(INPUT_POST, 'password');
 // $password2 = mysqli_real_escape_string($con, $password1);
  $password = MD5($password1);

  $contact = filter_input(INPUT_POST, 'contact');
  //$contact = mysqli_real_escape_string($con, $contact1);

  $city = filter_input(INPUT_POST, 'city');
 // $city = mysqli_real_escape_string($con, $city1);

  $address = filter_input(INPUT_POST, 'address');
 // $address = mysqli_real_escape_string($con, $address1);

  $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  $regex_num = "/^[789][0-9]{9}$/";

  $query = "SELECT * FROM users WHERE email_id='$email'";
  $result = mysqli_query($con, $query)or die($mysqli_error($con));
  $num = mysqli_num_rows($result);
  
  if ($num != 0) {
    $m = "<span class='red'>Email Already Exists</span>";
    header('location: signup.php?m1=' . $m);
  } else if (!preg_match($regex_email, $email)) {
    $m = "<span class='red'>Not a valid Email Id</span>";
    header('location: signup.php?m1=' . $m);
  } else if (!preg_match($regex_num, $contact)) {
    $m = "<span class='red'>Not a valid phone number</span>";
    header('location: signup.php?m2=' . $m);
  } else {
    
    $query = "INSERT INTO users(name, email_id, password, contact, city, address,registration_time)VALUES('" . $name . "','" . $email . "','" . $password . "','" . $contact . "','" . $city . "','" . $address . "',NOW())";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    $_SESSION['email_id'] = $email;
    $_SESSION['user_id'] = $user_id;
    header('location: products.php');
  }
