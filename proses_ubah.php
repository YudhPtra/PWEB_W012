<?php
include "koneksi.php";

$id = $_GET['id'];

// Ambil data dari form
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ 
    // Bagian ini biasanya ditandai dengan checklist, tapi di form kita
    // kita pakai logika: jika $_FILES['foto']['name'] ada isinya, berarti user mau ganti.
}

// Cek apakah ada file foto baru yang dikirim?
if($_FILES['foto']['name'] != ""){
    
    // --- KONDISI 1: USER GANTI FOTO ---
    
    $foto_nama = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_baru = date('dmYHis').$foto_nama;
    $path = "images/".$foto_baru;

    // Proses upload foto baru
    if(move_uploaded_file($foto_tmp, $path)){ 
        
        // Cek foto lama untuk dihapus
        $query = "SELECT * FROM siswa WHERE id='".$id."'";
        $sql = mysqli_query($connect, $query); 
        $data = mysqli_fetch_array($sql); 

        // Hapus file foto lama jika ada
        if(is_file("images/".$data['foto'])) 
            unlink("images/".$data['foto']); 

        // Query update data text + nama foto baru
        $query = "UPDATE siswa SET nis='".$nis."', nama='".$nama."', jenis_kelamin='".$jenis_kelamin."', telp='".$telp."', alamat='".$alamat."', foto='".$foto_baru."' WHERE id='".$id."'";
        $sql = mysqli_query($connect, $query); 

        if($sql){ 
            echo "<script>alert('Data berhasil diubah!'); window.location='index.php';</script>";
        }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='form_ubah.php?id=".$id."'>Kembali Ke Form</a>";
        }
    }else{
        echo "Maaf, Gambar gagal untuk diupload.";
        echo "<br><a href='form_ubah.php?id=".$id."'>Kembali Ke Form</a>";
    }

}else{ 
    
    // --- KONDISI 2: USER TIDAK GANTI FOTO ---
    
    // Query update data text SAJA, kolom foto jangan diusik
    $query = "UPDATE siswa SET nis='".$nis."', nama='".$nama."', jenis_kelamin='".$jenis_kelamin."', telp='".$telp."', alamat='".$alamat."' WHERE id='".$id."'";
    $sql = mysqli_query($connect, $query); 

    if($sql){ 
        echo "<script>alert('Data berhasil diubah (Tanpa ganti foto)!'); window.location='index.php';</script>";
    }else{
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='form_ubah.php?id=".$id."'>Kembali Ke Form</a>";
    }
}
?>