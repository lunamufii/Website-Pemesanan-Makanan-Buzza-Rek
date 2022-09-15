<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error)   {
    die("Koneksi Gagal: " . $conn->connect_error);
}
echo "Koneksi Berhasil"
?>