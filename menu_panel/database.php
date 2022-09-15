<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error)   {
    die("Koneksi Gagal: " . $conn->connect_error);
}

$sql = "CREATE DATABASE shop_db";
if ($conn->query($sql) === TRUE)    {
    echo "Database berhasil dibuat";
}   else {
    echo "pembuatan database gagal : " . $conn->error;
}

$conn->close();
?>