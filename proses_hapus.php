<?php
include "koneksi.php";

$id = $_GET['id'];

// 1. Ambil data foto dulu sebelum dihapus record-nya
$query = "SELECT * FROM siswa WHERE id='".$id."'";
$sql = mysqli_query($connect, $query); 
$data = mysqli_fetch_array($sql); 

// 2. Hapus file fisik di folder images
if(is_file("images/".$data['foto'])) {
    unlink("images/".$data['foto']); 
}

// 3. Hapus data di database
$query2 = "DELETE FROM siswa WHERE id='".$id."'";
$sql2 = mysqli_query($connect, $query2); 

if($sql2){ 
    header("location: index.php"); 
}else{
    echo "Data gagal dihapus. <a href='index.php'>Kembali</a>";
}
?>