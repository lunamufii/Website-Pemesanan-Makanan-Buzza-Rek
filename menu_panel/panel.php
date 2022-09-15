<?php

@include 'config.php';

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `order` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:panel.php');
      $message[] = 'Menu telah dihapus';
   }else{
      header('location:panel.php');
      $message[] = 'Menu gagal dihapus';
   };
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Pesanan</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/panel.css">

</head>
<body>

<?php include 'header_admin.php'; ?>

<section class="display-product-table">

   <table>

      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>No Telp</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Desa</th>
        <th>Kecamatan</th>
        <th>Metode Pesan</th>
        <th>Metode Pembayaran</th>
        <th>Pesanan</th>
        <th>Total Harga</th>
        <th>Aksi</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `order`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['number']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['street']; ?></td>
            <td><?php echo $row['village']; ?></td>
            <td><?php echo $row['sub_district']; ?></td>
            <td><?php echo $row['order_system']; ?></td>
            <td><?php echo $row['method']; ?></td>
            <td><?php echo $row['total_products']; ?></td>
            <td><?php echo $row['total_price']; ?></td>
            <td>
               <a href="panel.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Yang bener mau ngehapus data?');"> <i class="fas fa-trash"></i> Hapus </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>Tidak Ada Pesanan</div>";
            };
         ?>
      </tbody>
   </table>

</section>
    

<script src="js/script.js"></script>

</body>
</html>