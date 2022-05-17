<?php

$title = 'Sign up';
include './templates/header.php';
include './php/config.php';


if(isset($_POST['submit'])){

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
    window.location.href="register.php";</script>';
}else{
    $sql = "INSERT INTO users (firstName, lastName, email, phone, address, city, state, zipCode, country, password) VALUES ('$fName', '$lName', '$email', '$phone', '$address', '$city', '$state', '$zip', '$country', '$password')";
    echo '<script>alert("Registration Successful!"); 
    window.location.href="login.php";</script>';
}
$result = mysqli_query($con, $sql);
}


?>

    <div class="main-container">
        <div class="container">
            <div class="form-container">
                <h2>Create an Account</h2>
                <form action="" method="post">


                    <div class="half-container">
                        <div class="input-field half-column">
                            <i class="fas fa-user "></i>
                            <input type="text" name="firstName" id="firstName" placeholder="First Name" required>
                        </div>

                        <div class="input-field half-column">
                            <i class="fas fa-user "></i>
                            <input type="text" name="lastName" id="lastName" placeholder="Last Name" required>
                        </div>

                    </div>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                    </div>

                    <div class="input-field ">
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" name="phone" id="phone" placeholder="Phone Number" required>
                    </div>

                    <div class="input-field ">
                        <i class="fa-solid fa-location-dot"></i>
                        <input type="text" name="address" id="address" placeholder="Street Address" required>
                    </div>


                    <div class="half-container">
                        <div class="input-field half-column">
                            <i class="fa-solid fa-city "></i>
                            <input type="text " name="city" id="city" placeholder="City" required>
                        </div>

                        <div class="input-field half-column">
                            <i class="fa-solid fa-map-location-dot"></i>
                            <input type="text" name="state" id="state" placeholder="State/ Province" required>
                        </div>
                    </div>

                    <div class="half-container">

                        <div class="input-field half-column">
                            <i class="fa-brands fa-usps"></i>
                            <input type="text" name="zipCode" id="zipCode" placeholder="Postal/ Zip Code" required>
                        </div>

                        <div class="input-field half-column">
                            <i class="fa-solid fa-earth-africa"></i>
                            <select id="country" name="country" required>
                                <option value=" " disable selected>- Select Country -</option>
                                <option value="australia">Sri Lanka</option>
                                <option value="australia">Australia</option>
                                <option value="canada">Canada</option>
                                <option value="usa">USA</option>
                            </select>
                        </div>


                    </div>


                    <div class="input-field">
                        <i class="fas fa-key"></i>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <i class="far fa-eye" id="togglePassword"></i>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-key"></i>
                        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
                    </div>
                    <input type="submit" value="Create Account" name="submit" class="btn" id="submit-btn">
                    <p>Already have an account?<a href="./login.html"> Login now</a></p>
                </form>
            </div>
        </div>

    </div>


<?php
include './templates/footer.php';
?>
