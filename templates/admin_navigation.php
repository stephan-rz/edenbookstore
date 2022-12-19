<link rel="stylesheet" href="./css/admin_dashboard.css">
<div class="admin-navigation">
<h1>Admin Dashboard</h1>
    <h2><i class="fas fa-book"></i> <?php echo $title ?></h2>
    <div class="button-container">
        <a href="admin_dashboard.php" class="<?php echo ($title == "Dashboard" ? "active" : "")?> admin-btn btn">Dashboard</a>
        <a href="admin_book_list.php" class="<?php echo ($title == "Book List" ? "active" : "")?> admin-btn btn">Book List</a>
        <a href="admin_add_books.php" class="<?php echo ($title == "Add Book" ? "active" : "")?> admin-btn btn">Add Book</a>
        <a href="admin_category.php" class="<?php echo ($title == "Add Book Category" ? "active" : "")?> admin-btn btn">Book Categories</a>
        <a href="admin_orders.php" class="<?php echo ($title == "Orders List" ? "active" : "")?> admin-btn btn">Orders List</a>
        <a href="admin_user_list.php" class="<?php echo ($title == "User List" ? "active" : "")?> admin-btn btn">User List</a>
    </div>

</div>

