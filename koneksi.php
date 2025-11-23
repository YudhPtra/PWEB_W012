<?php

$host       = "sql300.infinityfree.com"; 
$user       = "if0_40208473";        
$password   = "9R7UNP86JpQc";              
$database   = "if0_40208473_w012_db";    

$connect = mysqli_connect($host, $user, $password, $database);

if (!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>