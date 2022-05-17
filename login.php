<?php

$title = 'Sign In';
include './templates/header.php';
include './php/config.php';
session_start();

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $select_users = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$password'") or die('query failed');

    if(mysqli_num_rows($select_users) > 0){
        $row = mysqli_fetch_assoc($select_users);
        
        if($row['user_type'] == 'admin'){

            $_SESSION['admin_name'] = $row['firstName'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['id'];
            header('location:admin_dashboard.php');
            
        }elseif ($row['user_type'] == 'user') {

            $_SESSION['user_name'] = $row['firstName'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location:home.html');
        }
    
    }else{
        echo '<script>alert("Incorrect email or password!")';
    }
    
}

?>

    <div class="main-container">
        <div class="container login-card">
            <div class="form-container">
                <h2>Sign In</h2>
                <form action="" method="post" class="login-form">

                    <div class="input-field">
                        <i class="fas fa-envelope "></i>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-key"></i>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <i class="far fa-eye" id="togglePassword"></i>
                    </div>
                    <div class="condition">
                        <input type="checkbox" id="condition" required>
                        <label for="condition">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                    </div>
                    <div class="submit-btn-sec">
                        <input type="submit" name="submit" value="Sign In" class="btn login-btn" id="submit-btn">
                    </div>
                </form>

                <div class="form-b">
                    <p>Don't have an account? <a href="register.php">Sign Up</a></p>
                    <p style="font-style: italic;">Forgot your password?</p>

                </div>

            </div>
        </div>

    </div>

<?php
include './templates/footer.php';
?>