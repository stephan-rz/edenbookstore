<?php
$title = 'Search';
include './php/config.php';
session_start();


if(isset($_SESSION['admin_id'])){
        $user_id = $_SESSION['admin_id'];
        include './templates/admin_header.php';
    } elseif(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        include './templates/user_header.php';
}   else
        include './templates/header.php';


if(isset($_POST['add_to_cart'])){

    $book_id = $_POST['book_id'];
    $book_title = $_POST['book_title'];
    $book_price = $_POST['book_price'];
    $book_image = $_POST['book_image'];
    $book_quantity = $_POST['book_quantity'];

    $sql = "SELECT * FROM cart WHERE title = '$book_id' AND user_id = '$user_id'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        echo '<script>alert("Book already added to cart!")</script>';
    } else {
        $sql = "INSERT INTO cart (user_id, title, price, quantity, image) VALUES ('$user_id', '$book_title', '$book_price', '$book_quantity', '$book_image')";
        $result = mysqli_query($con, $sql);

        if($result){
            echo '<script>alert("Book Added to Cart Successfully!"); 
            window.location.href="search.php";</script>';  
        } else {
            echo '<script>alert("Book not added to cart!")</script>';
        }
    }
}        


?>

<link rel="stylesheet" href="./css/shop.css">
<link rel="stylesheet" href="./css/search.css">

    <div class="title-section">
        <div class="title-section-container">
            <h1><?php echo $title ?></h1>
            <br>
            <ul class="breadcrump">
                <li><i class="fa-solid fa-house"></i> Home</li>
                <li>&gt; <?php echo $title ?></li>
            </ul>
        </div>
    </div>
    <div class="main-container" style="display:block;align-items: flex-start;">

    <div class="search-page-bar">
                <div class="search">
                    <form action="" method="get" class="search-page-form">
                        <input type="text" name="search" placeholder="Search books...">
                        <button type="submit" name="submit-search" class="search-btn">
                        <i class="fa fa-search"></i>
                    </button>
                    </form>
                </div>
                
    </div>

        
        <div class="book-container">
            <?php
                $select_books = mysqli_query($con, "SELECT * FROM books") or die('query failed');
                $select_category= mysqli_query($con, "SELECT name FROM categories INNER JOIN books ON categories.id = books.category_id") or die('query failed');

                if(isset($_GET['submit-search'])){
                    $search = $_GET['search'];
                    $search_books = mysqli_query($con, "SELECT * FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%'") or die('query failed');

                if(mysqli_num_rows($search_books) > 0){
                    while(($fetch_books = mysqli_fetch_assoc($search_books)) AND ($fetch_category = mysqli_fetch_assoc($select_category))){
            ?>
            
     
            <div class="book-card">
                    <form action="" method="post" class="cart-box">
                        <img class="image" src="./src/uploads/<?php echo $fetch_books['image'] ?>" alt="">
                        <div class="info">
                            <h3><?php echo $fetch_books['title'] ?></h3>
                            <p><?php echo $fetch_category['name'] ?></p>
                            <div class="price-qty">
                                <span>$<?php echo $fetch_books['price'] ?></span>
                                <input type="number" name="book_quantity" value="1" min="1" id="book_quantity" class="qty">
                            </div>
                            <input type="hidden" name="book_id" value="<?php echo 
                            $fetch_books['id'] ?>">
                            <input type="hidden" name="book_title" value="<?php echo 
                            $fetch_books['title'] ?>">
                            <input type="hidden" name="book_price" value="<?php echo 
                            $fetch_books['price'] ?>">
                            <input type="hidden" name="book_image" value="<?php echo 
                            $fetch_books['image'] ?>">

                            
                            <div class="btn-1">
                            <button type="submit" value="Add to cart" name="add_to_cart" class="btn"><img src="./src/cart.svg" alt="" style="width:25px; margin-right:10px;"> Add to cart</button>
                            </div>
                            
                            
                            
                            
                        </div>
                    </form>
                </div>        
                <?php
                    }
                    } else {echo '<p class="empty">No result found!</p>';
                    }  
                    } else {
                        echo '<p class="empty">Seach something</p>';
                    }
                ?>

        </div>
        
        

<?php
    include './templates/newsletter.php';
    include './templates/footer.php';
?>
