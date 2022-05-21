<?php
$title = 'About Us';
session_start();

if(isset($_SESSION['admin_id'])){
  $user_id = $_SESSION['admin_id'];
  include './templates/admin_header.php';
} elseif(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
  include './templates/user_header.php';
}   else
  include './templates/header.php';
?>
     <link rel="stylesheet" href="./css/aboutus.css">


<div class="main-container">



<div class="topic">About Us</div>
<br>
<div class ="description">
    <p>Eden Books(PVT) Ltd has opened up entryway for universe of Books to make perusing lovable and  advantageous for all by obtaining all aver the planet.
    Eden Books can follow its bookselling legacy to the early piece of the twentieth  century when it was laid out
      in the core of the business region of that time which was Sapallumcheen Rd Hope, British.</p>
   <p>Presently we have string substitute the business for over 50 years 
       serving to public and private area associations age to ages.
        Being third huge shipper in Canada we accept our insight, experience and mastery generally
        increase the value of you by conveying worth to cash.</p>
    <p>EdenBooks.com is the web based gateway of Eden Books the long settled book wholesaler in Canada
         and the top internet based book purchasing objective for large number of clients.</p><br>
        

<p> Our purpose:We believe in the power of knowledge. So our goal is to help those who supply it and share it with those who crave it. Which is why every action we take, and every book purchase you make helps fund it.</p> 
<p>Customer focus:- We are committed to providing customers with a valuable experience that helps them to match their activities with their values. We want to be their preferred marketplace and partner, therefore we take their feedback into account in all we do.</p>

<p>People matter:-We seek for and invest in talented people who work hard. Individual performance is rewarded, and team success is celebrated.</p>
<p>Do the right thing:-With all people and situations, we endeavor to do the right thing at all times.</p>
<p>Foster innovation:-While we accept and foster change, we look for new ideas and daring actions.</p>
<p>Passion for literacy:-We are dedicated to promoting reading. Every individual should have the opportunity to reach their full potential and actively participate in society.</p>
<p>People, Planet, Profit:-We're more than just a corporation. Our shareholders, customers, employees, community, planet, and the people affected by our common cause are all equally important to us. We want to help people achieve long-term good improvements in the world through our company. We're well on our way thanks to you.</p>
<br>
</div>
<div class="row">

<div class="col">
     <img src="src/mission.jpg" alt="Mission" width:"100%;">
 </div>
 <div class="col"><img src="src/vison.jpg" alt="Vison" width:"100%;"></div>
</div>
</div>  

<br>
<?php
include './templates/newsletter.php';
include './templates/footer.php';
?>

    

    