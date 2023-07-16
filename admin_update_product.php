<?php
@include 'config.php';
session_start();
$admin_id = $_SESSION['admin_id'] ;
if(!isset($admin_id)){
    header('location:login.php');
}
if(isset($_POST['update_product'])){
    $update_p_id = $_POST['update_p_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    mysqli_query($conn, "UPDATE `products` SET name = '$name', details = '$details', price = '$price' WHERE id = '$update_p_id'") or die('query failed');
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folter = 'uploaded_img/'.$image;
    $old_image = $_POST['update_p_image'];
    if(!empty($image)){
        if($image_size > 2000000){
            $massage[] = 'image size is too large';
        }else{
            mysqli_query($conn, "UPDATE `products` SET image = '$image' WHERE id = '$update_p_id'") or die('query failed');
            move_uploaded_file($image_tmp_name, $image_folter);
            unlink('uploaded_img/'.$old_image);
            $massage[] = 'image updated successfully';
        }
    }$massage[] = 'product updated successfully';

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update product</title>
   <!-- font awesome link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--files css stayle -->
    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>
   <?php @include 'admin_header.php' ;?>
   <section class="update-product">
    <?php
        // $_GET['update'] = '';
        $update_id = $_GET['update'];
        $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
        if(mysqli_num_rows($select_product) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_product)){

        
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" class="image" alt="">
        <input type="hidden" value="<?php echo $fetch_products['id']; ?>" name="update_p_id">
        <input type="hidden" value="<?php echo $fetch_products['image']; ?>" name="update_p_image">
        <input type="text" class="box" value="<?php echo $fetch_products['name']; ?>" required placeholder="update product name" name="name">
        <input type="number" min="0" class="box"  value="<?php echo $fetch_products['price']; ?>" required placeholder="enter product price" name="price">
        <textarea name="details" class="box" required placeholder="update product details" id="" cols="30" rows="10"> <?php echo $fetch_products['details']; ?></textarea>
        <input type="file" accept="image/jpg , image/jpeg, image/png"  class="box" name="image">
        <input type="submit" value="update product" name="update_product" class="btn">
        <a href="admin_products.php" class="option-btn">go back</a>
    </form>
    <?php
            }
        }else{
            echo '<p class="empty">no update product select</p>';
        }
    ?>
   </section>
  
   <script src="js/admin_script.js"></script>
</body>
</html>