<?php
@include 'config.php';
session_start();
$admin_id = $_SESSION['admin_id'] ;
if(!isset($admin_id)){
    header('location:login.php');
}
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `massage` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_contacts.php');
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
   <section class="messages">
        <h1 class="title">  messages</h1>
        <div class="box-container">
            <?php
                 $select_massages = mysqli_query($conn, "SELECT * FROM `massage`") or die('query failed');
                 if(mysqli_num_rows($select_massages) > 0){
                     while($fetch_massages = mysqli_fetch_assoc($select_massages)){
            ?>
            <div class="box">
                <p>user id<span><?php echo $fetch_massages['user_id']; ?></span></p>
                <p>name<span><?php echo $fetch_massages['name']; ?></span></p>
                <p>number<span><?php echo $fetch_massages['number']; ?></span></p>
                <p>email<span><?php echo $fetch_massages['email']; ?></span></p>
                <p>massage<span><?php echo $fetch_massages['massage']; ?></span></p>
                <a href="admin_contacts.php?delete=<?php echo $fetch_massages['id']; ?>" onclick="return confirm('delete this user?')" class="delete-btn">delete</a>
            </div>
            <?php
                    }
                }else{
                    echo '<p class="empty">you have no messages!</p>';
                }
            ?>
        </div>
   </section>
  
   <script src="js/admin_script.js"></script>
</body>
</html>