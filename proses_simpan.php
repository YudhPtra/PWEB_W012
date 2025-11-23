<?php
// Panggil koneksi database
include "koneksi.php";

// 1. Ambil data teks dari form
$nis            = $_POST['nis'];
$nama           = $_POST['nama'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$telp           = $_POST['telp'];
$alamat         = $_POST['alamat'];

// 2. Ambil data FOTO
// 'foto' adalah name dari input file di form
$foto_nama = $_FILES['foto']['name'];
$foto_tmp  = $_FILES['foto']['tmp_name'];

// --- LOGIKA UPLOAD FOTO ---

// Buat nama baru agar unik (misal: 12022023_namapengguna.jpg)
// Ini menghindari file tertimpa jika ada user upload nama file yang sama
$foto_baru = date('dmYHis') . '_' . $foto_nama;

// Tentukan folder tujuan (harus sudah dibuat sebelumnya)
$path = "images/" . $foto_baru;

// Cek apakah proses upload (pemindahan file) berhasil?
if(move_uploaded_file($foto_tmp, $path)){
    
    // Jika upload BERHASIL, masukkan data ke Database
    $query = "INSERT INTO siswa (nis, nama, jenis_kelamin, telp, alamat, foto) 
              VALUES ('$nis', '$nama', '$jenis_kelamin', '$telp', '$alamat', '$foto_baru')";
    
    $sql = mysqli_query($connect, $query);

    if($sql){
        // Jika insert database sukses
        echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
    } else {
        // Jika insert database gagal
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
    }

} else {
    // Jika upload GAGAL
    echo "Maaf, Gambar gagal untuk diupload. Pastikan folder 'images' sudah dibuat.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
?>