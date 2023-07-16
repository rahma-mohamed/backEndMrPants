<?php
@include 'config.php';
session_start();
$admin_id = $_SESSION['admin_id'] ;
if(!isset($admin_id)){
    header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashbord</title>
   <!-- font awesome link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--files css stayle -->
    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>
   <?php @include 'admin_header.php' ;?>
   <section class="dashbord">
        <h1 class="title">dashbord</h1>
        <div class="box-container">
            <div class="box">
                <?php 
                    $total_pendings = 0 ;
                    $select_pendings = mysqli_query($conn, "SELECT * FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
                    while($fetch_pendings = mysqli_fetch_assoc($select_pendings)){
                        $total_pendings += $fetch_pendings['total_price'];

                    };
                ?>
                <h3>$<?php echo $total_pendings;?> /-</h3>
                <p>totl pendings</p>
            </div>
            <div class="box">
                <?php 
                    $total_completes = 0 ;
                    $select_completes = mysqli_query($conn, "SELECT * FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
                    while($fetch_completes = mysqli_fetch_assoc($select_completes)){
                        $total_completes += $fetch_completes['total_price'];

                    };
                ?>
                <h3>$<?php echo $total_completes;?> /-</h3>
                <p>completed paymets</p>
            </div>
            <div class="box">
                <?php 
                    $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                    $number_or_orders = mysqli_num_rows($select_orders);
                ?>
                <h3><?php echo $number_or_orders;?></h3>
                <p>orders placed</p>
            </div>
            <div class="box">
                <?php 
                    $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                    $number_or_products = mysqli_num_rows($select_products);
                ?>
                <h3><?php echo $number_or_products;?></h3>
                <p>products added</p>
            </div>
            <div class="box">
                <?php 
                    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
                    $number_or_users = mysqli_num_rows($select_users);
                ?>
                <h3><?php echo $number_or_users;?></h3>
                <p>normal users</p>
            </div>
            <div class="box">
                <?php 
                    $select_admin = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
                    $number_or_admin = mysqli_num_rows($select_admin);
                ?>
                <h3><?php echo $number_or_admin;?></h3>
                <p>total admin</p>
            </div>
            <div class="box">
                <?php 
                    $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
                    $number_or_account = mysqli_num_rows($select_account);
                ?>
                <h3><?php echo $number_or_account;?></h3>
                <p>total account</p>
            </div>
            <div class="box">
                <?php 
                    $select_massages = mysqli_query($conn, "SELECT * FROM `massage`") or die('query failed');
                    $number_or_massages = mysqli_num_rows($select_massages);
                ?>
                <h3><?php echo $number_or_massages;?></h3>
                <p>new massages</p>
            </div>
        </div>
   </section>
   <script src="js/admin_script.js"></script>
</body>
</html>