<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .container { width: 50%; margin: 0 auto; border: 1px solid #ddd; padding: 20px; border-radius: 8px; }
        input[type=text], textarea { width: 100%; padding: 8px; margin: 5px 0 15px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center;">Form Tambah Siswa</h2>
        
        <!-- PENTING: enctype="multipart/form-data" WAJIB ADA untuk upload foto -->
        <form method="post" action="proses_simpan.php" enctype="multipart/form-data">
            
            <label>NIS</label>
            <input type="text" name="nis" required>

            <label>Nama Lengkap</label>
            <input type="text" name="nama" required>

            <label>Jenis Kelamin</label><br>
            <input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki
            <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
            <br><br>

            <label>Telepon</label>
            <input type="text" name="telp">

            <label>Alamat</label>
            <textarea name="alamat" style="height:100px"></textarea>

            <label>Pas Foto (3x4)</label><br>
            <!-- Input file -->
            <input type="file" name="foto" required>
            <br><br>
            
            <hr>
            <input type="submit" value="Simpan Data">
            <div style="text-align: center; margin-top: 10px;">
                <a href="index.php">Batal & Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>