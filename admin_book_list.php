<?php

$title = 'Book List';
include './templates/header.php';
include './php/config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM books WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if($result){
        echo '<script>alert("Book Deleted Successfully!"); 
        window.location.href="admin_book_list.php";</script>';  
    } else {
        echo '<script>alert("Book not deleted!")</script>';
    }
}

if(isset($_POST['update'])){

    $id = $_POST['update_id'];
    $update_title = mysqli_real_escape_string($con, $_POST['update_title']);
    $update_author = mysqli_real_escape_string($con, $_POST['update_author']);
    $update_publisher = mysqli_real_escape_string($con, $_POST['update_publisher']);
    $update_price = $_POST['update_price'];
    $update_qty = $_POST['update_qty'];
    $update_category = $_POST['update_category'];
    $update_description = mysqli_real_escape_string($con, $_POST['update_description']);
    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp = $_FILES['update_image']['tmp_name'];
    $update_image_folder = './src/uploads/'.$update_image;

    $update_sql = mysqli_query($con, "UPDATE books SET title = '$update_title', author = '$update_author', publisher = '$update_publisher', price = '$update_price', qty = '$update_qty', category_id = '$update_category', description = '$update_description', image = '$update_image' WHERE id = '$update_id'") or die('query failed');

    if(!empty($update_image)){
        move_uploaded_file($update_image_tmp, $update_image_folder);
        unlink('src/uploads/'.$_POST['old_image']);
    }

    header('location:admin_book_list.php');

}



?>

<link rel="stylesheet" href="./css/books.css">
<script src="./js/admin_scripts.js" defer></script>


<div class="main-container book-main">
    <h1>Book list</h1>
    <div class="book-container">
        <?php
            $select_books = mysqli_query($con, "SELECT * FROM books") or die('query failed');

            if(mysqli_num_rows($select_books) > 0){
                while($fetch_books = mysqli_fetch_assoc($select_books)){
    
        ?>
                <div class="book-card">
                    <img src="src/uploads/<?php echo $fetch_books['image']; ?>" alt="">
                    <div class="book-info">
                        <h3><?php echo  $fetch_books['title']; ?></h3>
                        <div class="price-qty">
                            <span>Price: <?php echo $fetch_books['price']; ?></span>
                            <span>Qty: <?php echo $fetch_books['qty']; ?></span>
                        </div>
                        <p><?php echo $fetch_books['category_id']; ?></p>
                        <div class="card-btns">
                            <div class="btn-1">
                                <a href="admin_book_list.php?update=<?php echo $fetch_books['id']; ?>"><button class="btn update-btn">Update</button></a>
                            </div>
                            <div class="btn-2">
                                <a href="admin_book_list.php?delete=<?php echo $fetch_books['id']; ?>"><button name="delete" class="btn delete-btn" onclick="return confirm('Delete this book?')">Delete</button></a>
                                
                            </div>
                        </div>           
                    </div>
                </div>
                    
            <?php
                 }
                } else {
                    echo '<p class="empty">No books found!</p>';
                }
            ?>

    </div>
</div>

    
<div class="main-container update-popup" style="padding-bottom:80px" id="update-popup-id">
    <div class="update-container">
    <?php
            if(isset($_GET['update'])){
                $id = $_GET['update'];
                $update_query = mysqli_query($con, "SELECT * FROM books WHERE id = '$id'") or die('query failed');
                
                if(mysqli_num_rows($update_query) > 0){
                    while($fetch_update = mysqli_fetch_assoc($update_query)){
        ?>
        
        <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="update_id" value="<?php echo $fetch_update['id']; ?>">
                <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
                <img src="src/uploads/<?php echo $fetch_update['image']; ?>" alt="">
                <div class="input-field">
                    <i class="fas fa-book"></i>
                    <input type="text" name="update_title" id="update_title" placeholder="Title" value="<?php echo $fetch_update['title']; ?>" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="update_author" id="update_author" placeholder="Author" value="<?php echo $fetch_update['author']; ?>">
                </div>
                <div class="input-field">
                    <i class="fas fa-book"></i>
                    <input type="text" name="update_publisher" id="update_publisher" placeholder="Publisher" value="<?php echo $fetch_update['publisher']; ?>" >
                </div>
                <div class="input-field">
                    <i class="fas fa-dollar-sign"></i>
                    <input type="number" min="0" name="update_price" id="update_price" placeholder="Price" value="<?php echo $fetch_update['price']; ?>">
                </div>
                <div class="input-field">
                    <i class="fas fa-book"></i>
                    <input type="number" name="update_qty" id="update_qty" placeholder="Quantity" value="<?php echo $fetch_update['qty']; ?>">
                </div>
                <div class="input-field">
                    <i class="fas fa-book"></i>
                    <select name="update_category" id="update_category">
                        <option value="<?php echo $fetch_update['category_id']; ?>"><?php echo $fetch_update['category_id']; ?></option>
                        <option value="1">Action</option>
                        <option value="2">Adventure</option>
                        <option value="3">Comedy</option>
                        <option value="4">Crime</option>
                    </select>
                </div>
                <div class="input-field">
                    <i class="fas fa-book"></i>
                    <input type="file" accept="image/jpg, image/jpeg, image/png" name="update_image" id="update_image" placeholder="Image" value="">
                </div>
                <div class="input-field description-field">
                    
                    <textarea name="update_description" id="update_description" placeholder="Description"><?php echo $fetch_update['description']; ?></textarea>
                </div>
                <div class="card-btns">
                    <input type="submit" name="update" value="Update" class="btn update-btn">
                    <input type="reset" name="cancel" value="Close" id="close-update" class="btn">
                </div>

        </form>
        

        <?php
            }
        
        }
        
        }else{
            echo '<script>document.querySelector("#update-popup-id").style.display = "none";</script>';
        }
    

        ?>
</div>
</div>







<?php

include './templates/footer.php';

?>