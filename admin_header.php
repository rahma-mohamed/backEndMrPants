<?php
        if(isset($massage)){
            foreach($massage as $massage){
             echo '   <div class="massage">
            <span> ' .$massage.' </span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
              </div>';
            }
        }
    ?>
<header class="header">
    <div class="flex">
        <a href="admin_page.php" class="logo">Admin <span>panel</span></a>
        <nav class="navbar">
            <a href="admin_page.php">Home</a>
            <a href="admin_products.php">products</a>
            <a href="admin_orders.php">orders</a>
            <a href="admin_users.php">users</a>
            <a href="admin_contacts.php">massages</a>
        </nav>
        <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <div>new <a href="login.php">login</a> | <a href="register.php">register</a> </div>
      </div>
    </div>
</header>