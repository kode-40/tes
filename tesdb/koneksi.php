<?php
// Menghubungkan ke database
$servername = "localhost"; // nama server
$database = "code 40"; // nama database
$username = "root";  // sesuaikan dengan username 
$password = "";      // sesuaikan dengan password 

// Membuat koneksi
$conn =mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("koneksi Gagal :" . mysqli_connect_error());
} else {
    echo "koneksi Berhasil";
}