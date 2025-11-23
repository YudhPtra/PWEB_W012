<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Siswa</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .container { width: 50%; margin: 0 auto; border: 1px solid #ddd; padding: 20px; border-radius: 8px; }
        input[type=text], textarea { width: 100%; padding: 8px; margin: 5px 0 15px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type=submit] { width: 100%; background-color: #FFA500; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #e69500; }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center;">Form Ubah Siswa</h2>

        <?php
        include "koneksi.php";
        
        // Ambil ID dari URL
        $id = $_GET['id'];
        
        // Query data siswa berdasarkan ID
        $query = "SELECT * FROM siswa WHERE id='".$id."'";
        $sql = mysqli_query($connect, $query);
        $data = mysqli_fetch_array($sql);
        ?>
        
        <form method="post" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
            
            <label>NIS</label>
            <input type="text" name="nis" value="<?php echo $data['nis']; ?>">

            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="<?php echo $data['nama']; ?>">

            <label>Jenis Kelamin</label><br>
            <?php
            if($data['jenis_kelamin'] == "Laki-laki"){
                echo "<input type='radio' name='jenis_kelamin' value='Laki-laki' checked='checked'> Laki-laki";
                echo "<input type='radio' name='jenis_kelamin' value='Perempuan'> Perempuan";
            }else{
                echo "<input type='radio' name='jenis_kelamin' value='Laki-laki'> Laki-laki";
                echo "<input type='radio' name='jenis_kelamin' value='Perempuan' checked='checked'> Perempuan";
            }
            ?>
            <br><br>

            <label>Telepon</label>
            <input type="text" name="telp" value="<?php echo $data['telp']; ?>">

            <label>Alamat</label>
            <textarea name="alamat" style="height:100px"><?php echo $data['alamat']; ?></textarea>

            <label>Foto Saat Ini</label><br>
            <img src="images/<?php echo $data['foto']; ?>" width="100"><br><br>
            
            <label>Ganti Foto (Biarkan kosong jika tidak ingin mengubah foto)</label><br>
            <input type="file" name="foto">
            <br><br>
            
            <hr>
            <input type="submit" value="Ubah Data">
            <div style="text-align: center; margin-top: 10px;">
                <a href="index.php">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>