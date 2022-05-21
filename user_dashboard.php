<?php

$title = 'Dashboard';
include './php/config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}

include './templates/user_header.php';

?>

<link rel="stylesheet" href="./user_dashboard.css">

<div class="main-container book-main">

<?php include './templates/user_navigation.php' 
?>


        <div class="form-container" style="margin-bottom:80px">
            <h3>Your Account Details</h3>
            <?php
                $select_user = mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'") or die('query failed');

                if(mysqli_num_rows($select_user) > 0){
                    while($fetch_user = mysqli_fetch_assoc($select_user)) {
                ?>

                <form action="" method="POST">
                    
                    <div class="half-container">
                        <div >
                        <label for="firstName">First Name</label>
                        <div class="input-field half-column">
                            <i class="fas fa-user"></i>
                            <input type="text" name="firstName" id="firstName" value="<?php echo $fetch_user['firstName']; ?>" required>
                        </div>
                        </div>
                        <div>
                        <label for="lastName">Last Name</label>
                        <div class="input-field half-column">
                        
                            <i class="fas fa-user"></i>
                            <input type="text" name="" id="lastName" value="<?php echo $fetch_user['lastName']; ?>" required>
                        </div>

                        </div>
                        

                    </div>
                    <div class="full-width">
                        <label for="email">Email</label>   
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" value="<?php echo $fetch_user['email']; ?>" required>
                    </div>
                    </div>

                    <div class="full-width">
                        <label for="phone">Phone Number</label> 
                    <div class="input-field ">
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" name="phone" id="phone" value="<?php echo $fetch_user['phone']; ?>" required>
                    </div>
                    </div>

                    <div class="full-width">
                        <label for="phone">Street Address</label> 
                    <div class="input-field ">
                        <i class="fa-solid fa-location-dot"></i>
                        <input type="text" name="address" id="address" value="<?php echo $fetch_user['address']; ?>" required>
                    </div>
                    </div>

                    <div class="half-container">
                    <div class="full-width">
                        <label for="phone">City</label> 
                        <div class="input-field half-column">
                            <i class="fa-solid fa-city "></i>
                            <input type="text " name="city" id="city" value="<?php echo $fetch_user['city']; ?>" required>
                        </div>
                        </div>
                    <div class="full-width">
                        <label for="phone">State/ Province</label> 
                        <div class="input-field half-column">
                            <i class="fa-solid fa-map-location-dot"></i>
                            <input type="text" name="state" id="state" value="<?php echo $fetch_user['state']; ?>" required>
                        </div>
                        </div>
                    </div>

                    <div class="half-container">
                    <div class="full-width">
                    <label for="phone">Postal/ Zip Code</label> 
                        <div class="input-field half-column">
                            <i class="fa-brands fa-usps"></i>
                            <input type="text" name="zipCode" id="zipCode" value="<?php echo $fetch_user['zipCode']; ?>" required>
                        </div>
                    </div>
                    <div class="full-width">
                    <label for="phone">Country</label> 
                        <div class="input-field half-column">
                            <i class="fa-solid fa-earth-africa"></i>
                            <select id="country" name="country" required>
                                <option value="<?php echo $fetch_user['country']; ?>" disable selected><?php echo $fetch_user['country']; ?></option>
                                <option value="australia">Sri Lanka</option>
                                <option value="australia">Australia</option>
                                <option value="canada">Canada</option>
                                <option value="usa">USA</option>
                            </select>
                        </div>
                    </div>

                    </div>

                    <input type="submit" value="Update Details" name="update-btn" class="btn" id="update-btn">


                </form>
                <?php
                    }
                    } else {
                        echo '<h1>Your cart is empty</h1>';
                    }
                ?>        
                
        </div>







</div>







<?php

include './templates/footer.php';

?>