<?php
$host_koneksi = "localhost:3306";
$username_koneksi = "root";
$password_koneksi = "";
$database_koneksi = "db_itfixertech";

$koneksi = mysqli_connect(
    $host_koneksi,
    $username_koneksi,
    $password_koneksi,
    $database_koneksi
);

if (!$koneksi) {
    die('koneksi error : ' . mysqli_connect_error());
}

