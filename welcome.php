<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['username'])){
   header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin | Welcome</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="welcomestyle.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>Halo <span><?php echo $_SESSION['username'] ?></span></h3>
      <h1>Selamat Datang di, <span>Buzza Rek</span></h1>
      <p>Ini adalah tampilan menu admin</p>
      <a href="menu_panel/admin.php" class="btn">Panel Admin</a>
      <a href="logout.php" class="btn">Logout</a>
   </div>

</div>

</body>
</html>