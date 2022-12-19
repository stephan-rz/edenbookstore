<link rel="stylesheet" href="./css/admin_dashboard.css">
<div class="admin-navigation">
<h1>User Dashboard</h1>
    <h2><i class="fas fa-book"></i> <?php echo $title ?></h2>
    <div class="button-container">
        <a href="user_dashboard.php" class="<?php echo ($title == "Dashboard" ? "active" : "")?> admin-btn btn">Dashboard</a>
        <a href="orders.php" class="<?php echo ($title == "Orders" ? "active" : "")?> admin-btn btn">Orders</a>
        <a href="logout.php" class="admin-btn btn">Logout</a>

    </div>

</div>

