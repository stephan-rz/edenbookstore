<?php
$title = 'Privacy Policy';
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
	<link rel="stylesheet" href="./css/privacypolicy.css">
    <div class="title-section">
        <div class="title-section-container">
            <h1>Privacy Policy</h1>
            <br>
            <ul class="breadcrump">
                <li><i class="fa-solid fa-house"></i> Home</li>
                <li>&gt; Privacy Policy</li>
            </ul>
        </div>
    </div>
    <div class="main-container" style="align-items: flex-start;">
        <div class="container">
		</div>
	
	
	<h6 class="subheader"> Last updated : May 17,2022</h6>
	
	<p class="Paragragh1" >We understand that how information about you is used and shared is important to you , 
	   and we appreciate your confidence in our ability to do so safely and responsibly. This Privacy Notice explains how "Eden Book Store"
       collects and handles your personal information through its websites,devices ,products , services,online and physical stores , and applications. </p>	
	   
	 <ul class="list">
        <li>What kind of personal data about customers is collected?</li>
		<li>What does Eden do with your personal information?</li>	
		<li>What about cookies and other forms of identification?</li>
		<li>Do we disclose your personal data?</li>
		<li>What kind of information am I able to get?</li>
		<li>What alternatives do I have?</li>
		<li>Is it OK for kids to use these services?</li>
     </ul>
	 
		<p class="Paragragh2"> Your personal information is collected so that we can provide and improve
		                      our products and services for your best.</p>
		
		
		<h3 class="header2" >Cookies </h3>
		<p class="Paragragh1">Cookies are records with little sum of information that's commonly utilized an anonymous one of a kind identifier. 
		These are sent to your browser from the website that you just visit and are stored on your computer's hard drive. 
		Our site employments these “cookies” to collection data and to progress our Benefit. You have got the choice to either acknowledge or deny these cookies, and know when a cookie is being sent to your computer. 
		On the off chance that you select to deny our cookies, you'll not be able to utilize some portions of our Service.</p>
	   
	 
	 </div>

 <?php
include './templates/newsletter.php';
include './templates/footer.php';
?>