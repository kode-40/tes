<?php
require 'koneksi.php';
$email = $_POST["email"];
$password = $_POST["password"];

$query_sql = "select * from user
            where email = '$email' and password = '$password'";

$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    header("location: dashboard.html");
} else {
    echo "<center><h1>Email atau password Anda salah. Silahkan Coba Login Kembali.</h1>
            <button><strong><a href='facebook.php'>Login</a></strong></button></center>";
}