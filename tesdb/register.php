<?php
require 'koneksi.php';
$namadepan = $_POST["namadepan"];
$namabelakang = $_POST["namabelakang"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$password = $_POST["password"];

$query_sql = "INSERT into user (namadepan, namabelakang, dob, gender, email, password)
            values ('$namadepan', '$namabelakang', '$dob', '$gender', '$email', '$password')";

if (mysqli_query($conn, $query_sql)) {
    header("location: facebook.php");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}
