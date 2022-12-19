<?php
$title = 'FAQs';
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
  
  <link rel="stylesheet" href="./css/style_FAQ.css">
      <div class="Box">
          <p class="Headline">
              FAQs
          </p>
          <div class="faq">
              <details>
                <summary>Q: Why do I need to register on this site before I can place an Order?</summary>
                <p class="text">A: having an account can save you time during checkout as it securely saves your address and payment details for future purchases.</p>
              </details>
              <details>
                <summary>Q: What payment methods can I use?</summary>
                <p class="text">A: You can use Credit/Debit Cards or PayPal.</p>
              </details>
              <details>
                <summary>Q: What to do if the payment is not accepted?</summary>
                <p class="text">A: Please try again after a while. If the payment is still not accepted, check your account balance. If everything is in order and you still cannot make the payment, please email us at EdenBookStore@yahoo.com and let us know about the problem. We can manage the order manually.Please visit <a href<"Contactus.php">Contactus</a> for more details.</p>
              </details>
              <details>
                <summary>Q: What are the terms and conditions?</summary>
                <p class="text">A: You can read the <a href<"Terms and condition.php">Terms and conditions</a> here.</p>
              </details>
              <details>
                <summary>Q: Can I cancel my order?</summary>
                <p class="text">If you would like to cancel your order, please do so as soon as possible. If we have already processed your order, you must contact us and return the item. Please contact EdenBookStore@yahoo.com.</p>
              </details>
              <details>
              <summary>Q: Do you have goods in stock?</summary>
                <p class="text">All products shown on our website are in stock. Lead time depends on products and quantity.</p>
              </details>

          </div>
      </div>
   
  
    
    
 <?php
 include './templates/newsletter.php';
include './templates/footer.php';
 ?>