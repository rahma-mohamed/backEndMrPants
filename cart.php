<?php
@include 'config.php';
session_start();
$user_id = $_SESSION['user_id'] ;
if(!isset($user_id)){
    header('location:login.php');
}
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
    header('location:cart.php');
}
if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:cart.php');
}
if(isset($_POST['update_qunatity'])){
    $cart_id = $_POST['cart_id'];
    $cart_qunatity = $_POST['cart_qunatity'];
    mysqli_query($conn, "UPDATE `cart` SET qunatity = '$cart_qunatity' WHERE id = '$cart_id'") or die('query failed');
    $massage[] = 'cart qunatity updated!';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart</title>
     <!-- font awesome link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--files css stayle -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php @include 'header.php'; ?>
    <section class="heading">
        <h3>shopping cart</h3>
        <p><a href="home.php">home</a> / cart</p>
    </section>
    <section class="shopping-cart">
        <h1 class="title">products added</h1>
        <div class="box-container">
            
            <?php
                $grand_total = 0;
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            ?>
            <div class="box">
                <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from cart?')"></a>
                <a href="view_page.php?pid=<?php echo $fetch_cart['pid']; ?>" class="fas fa-eye"></a>
                <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" class="image" alt="">
                <div class="name"><?php echo $fetch_cart['name']; ?></div>
                <div class="price">$<?php echo $fetch_cart['price']; ?>/-</div>
                <form action="" method="post">
                    <input type="hidden" value="<?php echo $fetch_cart['id']; ?>" name="cart_id">
                    <input type="number" class="qty" min="1" value="<?php echo $fetch_cart['qunatity']; ?>" name="cart_qunatity">
                    <input type="submit" value="update" name="update_qunatity" class="option-btn">
                </form>
                <div class="sub-total">sub-total : <span><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['qunatity']); ?></span></div>
            </div>
            <?php
                $grand_total += $sub_total;
                    }
                }else{
                    echo '<p class="empty">your cart is empty</p>';
                }
            ?>
        </div>
        <div class="more-btn">
        <a href="cart.php?delete_all" onclick="return confirm('delete all from cart?')" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled' ?>">delete all</a>
        </div>
        <div class="cart-total">
            <p>grand total : <span>$<?php echo $grand_total; ?>/-</span></p>
            <a href="shop.php" class="option-btn">continue shoping</a>
            <a href="checkout.php" class="btn <?php echo ($grand_total > 1)?'':'disabled' ?>">proceed to checkout</a>
        </div>
    </section>
    <?php @include 'footer.php';?>
    <script src="js/admin_script.js"></script>
</body>
</html>