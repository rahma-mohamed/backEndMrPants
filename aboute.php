<?php
@include 'config.php';
session_start();
$user_id = $_SESSION['user_id'] ;
if(!isset($user_id)){
    header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>
     <!-- font awesome link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--files css stayle -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php @include 'header.php'; ?>
    <section class="heading">
        <h3>aboute us</h3>
        <p><a href="home.php">home</a> / about</p>
    </section>
    <section class="about">
    <div class="flex">
                <div class="image">
                    <img src="image/about-img-1.jpg" alt="">
                </div>
                <div class="content">
                    <h3>why choose us?</h3>
                    <p>Because here we work for your convenience and offer the highest quality and the lowest price so that you can feel the real benefit</p>
                    <a href="shop.php" class="btn">shop now</a>
                </div>
                
        </div>
        <div class="flex">
            <div class="content">
                <h3>what we provide?</h3>
                <p>All about men's comfort</p>
                <a href="contact.php" class="btn">contact us</a>
            </div>
            <div class="image">
                <img src="image/about-img-2.jpg" alt="">
            </div>
        </div>
        <div class="flex">
                <div class="image">
                    <img src="image/about-img-3.jpg" alt="">
                </div>
                <div class="content">
                    <h3>who we are?</h3>
                    <p>Mr.pants To sell pants wherever you are</p>
                    <a href="#reviews" class="btn">clients reviews</a>
                </div>
                
        </div>
    </section>
    <section class="reviews" id="reviews">
        <h1 class="title">client's reviews </h1>
        <div class="box-container">
            <div class="box">
                <img src="image/pic-1.png" alt="">
                <p>More than wonderful products and cheap prices</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>ayman ebrahem</h3>
            </div>
            <div class="box">
                <img src="image/pic-2.png" alt="">
                <p>Very nice and comfortable pants</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>rahma mohamed</h3>
            </div>
            <div class="box">
                <img src="image/pic-3.png" alt="">
                <p>Dealing with customers is more than wonderful</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>mohamed hammad</h3>
            </div>
            <div class="box">
                <img src="image/pic-4.png" alt="">
                <p>I liked the speed of response and delivery</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3> layan ayman</h3>
            </div>
            <div class="box">
                <img src="image/pic-5.png" alt="">
                <p>Thanks for the return policy</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>ebrahem ayman</h3>
            </div>
            <div class="box">
                <img src="image/pic-6.png" alt="">
                <p>The best jeans you can wear</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>joury ayman</h3>
            </div>
        </div>
    </section>
    <?php @include 'footer.php';?>
    <script src="js/admin_script.js"></script>
</body>
</html>