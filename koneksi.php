<?php
// Konfigurasi Database
$host       = "localhost";
$user       = "root";
$password   = "";
$database   = "sekolah_db";

// Melakukan koneksi ke MySQL
$connect = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$connect) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>