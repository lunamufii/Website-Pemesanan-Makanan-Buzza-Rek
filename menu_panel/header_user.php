<header class="header">

   <div class="flex">

        <div class="logo">
            <a href="#"><img src="images/Logo1.png" class="hitam" alt="logo"></a>
        </div>

        
      
        <?php
        
        $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
        $row_count = mysqli_num_rows($select_rows);

        ?>

        <div class="item"></div>
            <a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i><span><?php echo $row_count; ?></span> </a>
        </div>
        <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>