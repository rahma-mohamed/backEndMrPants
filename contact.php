<?php
@include 'config.php';
session_start();
$user_id = $_SESSION['user_id'] ;
if(!isset($user_id)){
    header('location:login.php');
}
if(isset($_POST['send'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $msg = mysqli_real_escape_string($conn, $_POST['massage']);
    $select_massage = mysqli_query($conn, "SELECT * FROM `massage` WHERE name ='$name' AND email ='$email' AND number ='$number' AND massage ='$msg'") or die('query failed');
    if(mysqli_num_rows($select_massage) > 0){
        $massage[] = 'message sent alrady!';
    }else{
        mysqli_query($conn, "INSERT INTO `massage`(user_id, name, email, number, massage) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
        $massage[] = 'message sent successfully!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
     <!-- font awesome link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--files css stayle -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php @include 'header.php'; ?>
    <section class="heading">
        <h3>contact us</h3>
        <p><a href="home.php">home</a> / contact</p>
    </section>
    <section class="contact">
        <form action="" method="POST">
            <h3>ask us any thing!</h3>
            <input type="text" name="name" placeholder="enter your name" class="box" required>
            <input type="email" name="email" placeholder="enter your email" class="box" required>
            <input type="number" name="number" placeholder="enter your number" class="box" required>
            <textarea name="massage" id="" placeholder="enter your message" class="box" required cols="30" rows="10"></textarea>
            <input type="submit" name="send" value="send message" class="btn">
        </form>
    </section>
    <?php @include 'footer.php';?>
    <script src="js/admin_script.js"></script>
</body>
</html>