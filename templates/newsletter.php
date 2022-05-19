<?php

include './php/config.php';

if(isset($_POST['news-submit'])){

$email = $_POST['news-email'];

$select_emails = mysqli_query($con, "SELECT * FROM newsletter_emails WHERE email = '$email'") or die('query failed');

if(mysqli_num_rows($select_emails) > 0){

    echo '<script>alert("You have already subscribed!")'; 

}else{

    $sql = "INSERT INTO newsletter_emails (email) VALUES ('$email')";
    echo '<script>alert("Thank you for Subscription!")</script>';
    
}

$result = mysqli_query($con, $sql);

}

mysqli_close($con);

?>

<div class="main-container">
        <div class="newsletter">
            <h2>Subscribe our newsletter for newest<br> books updates</h2>
            <form action="" method="POST">
                <input type="email" name="news-email" id="news-email" placeholder="Type your email here">
                <input type="submit" name="news-submit" value="Subscribe" class="btn">
            </form>
        </div>
    </div>