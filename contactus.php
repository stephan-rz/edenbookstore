<?php
$title = 'Contact us';
include './php/config.php';
session_start();

if(isset($_SESSION['admin_id'])){
  $user_id = $_SESSION['admin_id'];
  include './templates/admin_header.php';
} elseif(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
  include './templates/user_header.php';
}   else
  include './templates/header.php';

  if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $Message = mysqli_real_escape_string($con, $_POST['message']);

    $sql = "INSERT INTO contact_form (name, email, Message) VALUES ('$name','$email', '$Message')";
    $result = mysqli_query($con, $sql);
    if($result){
        echo '<script>alert("Message sent successfully!")</script>';
    } else {
        echo '<script>alert("Message sending failed!")</script>';
    }
}


?>


<link rel="stylesheet" href="./css/contactus.css">
    <div class="title-section">
        <div class="title-section-container">
            <h1>Contact us</h1>
            <p class="subtitle">We'd love to help you!</p><br>
            <ul class="breadcrump">
                <li><i class="fa-solid fa-house"></i> Home</li>
                <li>&gt; Contact Us</li>
            </ul>
        </div>
    </div>
    <div class="main-container" style="align-items: flex-start;">
        <div class="container">

            <div class="form-container">
                <h2>Contact Us</h2>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="input-field">
                        <i class="fas fa-user "></i>
                        <input type="text" name="name" id="name" placeholder="Name" required="">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-envelope "></i>
                        <input type="email" name="email" id="email" placeholder="Email" required="">
                    </div>

                    <div class="input-field message-field">
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                    </div>

                    <input type="submit" name="submit" value="Send" class="btn" id="submit-btn">
                </form>
            </div>

            <div class="contact-info">
                <div class="info">
                    <div class="col-1">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="col-2">
                        <p>4260 Old Spallumcheen Rd,<br> Hope, British<br>Columbia, Canada</p>
                    </div>
                </div>

                <div class="info">
                    <div class="col-1">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="col-2">
                        <p>604-869-7781</p>
                    </div>
                </div>

                <div class="info">
                    <div class="col-1">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="col-2">
                        <p>edenbookstore@gmail.com</p>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <?php
    include './templates/newsletter.php';

include './templates/footer.php';
?>
