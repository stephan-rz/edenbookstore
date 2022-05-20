<?php

$title = 'Book List';
include './templates/header.php';
include './php/config.php';
session_start();


?>

<link rel="stylesheet" href="./css/admin_dashboard.css">


<div class="main-container book-main">
    <h1>Admin Dashboad</h1>
    <div class="button-container">
        <a href="admin_book_list.php"><button class="admin-btn btn">Book List</button></a>
        <a href="admin_add_book.php"><button class="admin-btn btn">Add Book</button></a>
        <a href="admin_category_list.php"><button class="admin-btn btn">Category List</button></a>
        <a href="admin_add_category.php"><button class="admin-btn btn">Add Category</button></a>
        <a href="admin_order_list.php"><button class="admin-btn btn">Order List</button></a>
        <a href="admin_user_list.php"><button class="admin-btn btn">User List</button></a>
        <a href="admin_add_user.php"><button class="admin-btn btn">Add User</button></a>
        <a href="admin_logout.php"><button class="admin-btn btn">Logout</button></a>
    </div>

















</div>







<?php

include './templates/footer.php';

?>