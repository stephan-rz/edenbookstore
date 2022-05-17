<?php

include 'config.php';

$fName = $_POST['firstName'];
$lName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zipCode'];
$country = $_POST['country'];
$password = md5($_POST['password']);


$select_users = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'") or die('query failed');

if(mysqli_num_rows($select_users) > 0){
    echo '<script>alert("Email already exists!"); 
    window.location.href="../register.html";</script>';
}else{
    $sql = "INSERT INTO users (firstName, lastName, email, phone, address, city, state, zipCode, country, password) VALUES ('$fName', '$lName', '$email', '$phone', '$address', '$city', '$state', '$zip', '$country', '$password')";
    echo '<script>alert("Registration Successful!"); 
    window.location.href="../login.html";</script>';
}

$result = mysqli_query($con, $sql);

?>