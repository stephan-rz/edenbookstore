<?php

$title = 'User List';
include './php/config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}


if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM users WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if($result){
        echo '<script>alert("User Deleted Successfully!"); 
        window.location.href="admin_user_list.php";</script>';  
    } else {
        echo '<script>alert("User not deleted!")</script>';
    }
}

include './templates/admin_header.php';

?>

<link rel="stylesheet" href="./css/user_list.css">

<div class="main-container b-main">
    
    <?php include './templates/admin_navigation.php' ?>

    <div class="user-container">
        <div class="user-list">
            <h2>Our User List</h2><br>
            <ul>
                <?php
                    $select_user_list = mysqli_query($con, "SELECT * FROM users WHERE user_type = 'user'") or die('query failed');

                    if(mysqli_num_rows($select_user_list) > 0){
                        while($fetch_user_list = mysqli_fetch_assoc($select_user_list)){
                ?> 
                    <?php $name = $fetch_user_list['firstName'] . ' ' . $fetch_user_list['lastName'] ?>
                    <li><i class="fa-solid fa-user"></i><span><?php echo $name; ?></span> - 
                    <a href="admin_user_list.php?delete=<?php echo $fetch_user_list['id']; ?>" onclick="return confirm('Delete this user?');">Delete</a>
                
                    <?php
                 }

                 
                } else {
                    echo '<p class="empty">No users found!</p>';
                }
            ?>          
            </ul>  
            
            <?php
            if(isset($_GET['update'])){
                $id = $_GET['update'];
                $update_query = mysqli_query($con, "SELECT * FROM categories WHERE id = '$id'") or die('query failed');
                
                if(mysqli_num_rows($update_query) > 0){
                    while($fetch_update = mysqli_fetch_assoc($update_query)){
        ?>
            <form action="" method="post" id="cat-change-form">
                <label for="update_name">Edit user Name :</label>
                <div class="input-field cat-input-field">
                        <input type="hidden" name="update_id" value="<?php echo $fetch_update['id']; ?>">
                        <input type="text" name="update_name" id="update_name" placeholder="Title" value="<?php echo $fetch_update['name']; ?>" required>
                    </div>
                    <div class="card-btns">
                        <input type="submit" name="update" value="Update" class="btn update-btn">
                        <input type="reset" name="cancel" value="Close" id="close-cat-update" class="btn">
                </div>       

            </form>
            

                <?php
            }
        
        }
        
        }else{
            echo '<script>document.querySelector("#cat-change-form").style.display = "none";</script>';
        }
    

        ?>

        </div>
        

    </div>
    
</div>

<script>
    document.querySelector('#close-cat-update').onclick = () => {

document.querySelector('#cat-change-form').style.display = 'none';
}
</script>

<?php

include './templates/footer.php';
?>