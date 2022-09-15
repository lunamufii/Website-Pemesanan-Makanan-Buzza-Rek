<?php

@include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $street = $_POST['street'];
   $village = $_POST['village'];
   $sub_district = $_POST['sub_district'];
   $order_system = $_POST['order_system'];
   $method = $_POST['method'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = ($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, street, village, sub_district, order_system, method, total_products, total_price) VALUES('$name','$number','$email','$street','$village','$sub_district','$order_system','$method','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Detail Pesanan Anda</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> Total Yang Harus Dibayar : Rp. ".$price_total."  </span>
         </div>
         <div class='customer-details'>
            <p> Nama : <span>".$name."</span> </p>
            <p> No Telepon : <span>".$number."</span> </p>
            <p> Email : <span>".$email."</span> </p>
            <p> Alamat : <span>".$street.", ".$village.", ".$sub_district.", Jember</span></p>
            <p> Metode Pemesanan : <span>".$order_system."</span> </p>
            <p> Metode Pembayaran : <span>".$method."</span> </p>
         </div>
         <h3>Terimakasih Telah Memesan</h3>
            <a href='products.php' class='btn'>Kembali Ke Menu</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Buzza Rek | Checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'header_user.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">Selamat Datang Di Halaman Checkout Pesanan</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $price_total = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $price_total;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }

         $grand_total = number_format($grand_total);
         $price_total = number_format($price_total);
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> Total Harga : Rp. <?= $grand_total; ?> </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Nama</span>
            <input type="text" placeholder="Masukkan Nama Anda" name="name" required>
         </div>
         <div class="inputBox">
            <span>No Telepon</span>
            <input type="number" placeholder="Masukkan No Telp Anda" name="number" required>
         </div>
         <div class="inputBox">
            <span>Email</span>
            <input type="email" placeholder="Masukkan Email Anda" name="email" required>
         </div>
         <div class="inputBox">
            <span>Nama Jalan</span>
            <input type="text" placeholder="Masukkan Nama Jalan Anda" name="street" required>
         </div>
         <div class="inputBox">
            <span>Desa</span>
            <input type="text" placeholder="Masukkan Nama Desa" name="village" required>
         </div>
         <div class="inputBox">
            <span>Kecamatan</span>
            <input type="text" placeholder="Masukkan Nama Kota" name="sub_district" required>
         </div>
         <div class="inputBox">
            <span>Metode Pemesanan</span>
            <select name="order_system">
               <option value="Delivery" selected>Delivery</option>
               <option value="Take Away">Take Away</option>
               <option value="Makan di Tempat">Makan di Tempat</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Metode Pembayaran</span>
            <select name="method">
               <option value="Cash" selected>Cash</option>
               <option value="Kartu Kredit">Kartu Kredit</option>
               <option value="DANA">DANA</option>
               <option value="OVO">OVO</option>
            </select>
         </div>
      </div>
      <input type="submit" value="Pesan Sekarang" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>