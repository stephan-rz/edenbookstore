<link rel="stylesheet" href="./css/admin_dashboard.css">
<div class="admin-navigation">
<h1>Admin Dashboard</h1>
    <h2><i class="fas fa-book"></i> <?php echo $title ?></h2>
    <div class="button-container">
        <a href="admin_book_list.php" class="<?php echo ($title == "Book List" ? "active" : "")?> admin-btn btn">Book List</a>
        <a href="admin_add_books.php" class="<?php echo ($title == "Add Book" ? "active" : "")?> admin-btn btn">Add Book</a>
        <a href="admin_category.php" class="<?php echo ($title == "Add Book Category" ? "active" : "")?> admin-btn btn">Book Categories</a>
        <a href="admin_order_list.php" class="<?php echo ($title == "Order List" ? "active" : "")?> admin-btn btn">Order List</a>
        <a href="admin_user_list.php" class="<?php echo ($title == "User List" ? "active" : "")?> admin-btn btn">User List</a>
        <a href="admin_add_user.php" class="<?php echo ($title == "Add User" ? "active" : "")?> admin-btn btn">Add User</a>
        <a href="admin_logout.php" class="<?php echo ($title == "Logout" ? "active" : "")?> admin-btn btn">Logout</a>
    </div>

</div>
