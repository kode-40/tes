<?php
// Menghubungkan ke database
$servername = "localhost";
$database = "code 40" // nama database
$username = "root";  // sesuaikan dengan username database kamu
$password = "";      // sesuaikan dengan password database kamu

// Membuat koneksi
$conn =mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("koneksi Gagal :" . mysqli_connect_error());
} else {
    echo "koneksi Berhasil"
}