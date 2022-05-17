<?php

include 'config.php';
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
            header('location: ./php/admin_dashboard.php');
            
        }elseif ($row['user_type'] == 'user') {

            $_SESSION['user_name'] = $row['firstName'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location: ./home.html');
        }
    
    }else{
        echo '<script>alert("Incorrect email or password!")';
    }
    
}

?>