<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "login_db2";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>