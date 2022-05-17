<?php
$tile = 'Contact us';
include './templates/header.php';

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
                <form action="form.php " method="post ">

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

                    <input type="submit" value="Send" class="btn" id="submit-btn">
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
include './templates/footer.php';
?>
