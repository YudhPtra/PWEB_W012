<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <!-- Sedikit CSS biar rapi -->
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { 
            background-color: #4CAF50; color: white; padding: 10px 20px; 
            text-decoration: none; border-radius: 5px; display: inline-block; 
            margin-bottom: 20px;
        }
        img { border-radius: 5px; object-fit: cover; }
    </style>
</head>
<body>
    <h1>Data Siswa</h1>
    
    <a href="form_simpan.php" class="btn">+ Tambah Data Baru</a>

    <table>
        <tr>
            <th>Foto</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php
        include "koneksi.php";
        
        // Ambil data siswa dari database
        $query = "SELECT * FROM siswa";
        $sql = mysqli_query($connect, $query);

        while($data = mysqli_fetch_array($sql)){ 
        ?>
            <tr>
                <td>
                    <!-- Menampilkan Gambar -->
                    <!-- Jika ada fotonya, tampilkan. Jika tidak, tampilkan teks -->
                    <?php if(file_exists("images/".$data['foto']) && $data['foto'] != ""): ?>
                        <img src="images/<?php echo $data['foto']; ?>" width="80" height="100">
                    <?php else: ?>
                        <span>Tidak ada foto</span>
                    <?php endif; ?>
                </td>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['jenis_kelamin']; ?></td>
                <td><?php echo $data['telp']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td>
                    <a href="form_ubah.php?id=<?php echo $data['id']; ?>">Ubah</a> | 
                    <!-- Tambahkan confirm agar tidak terhapus tidak sengaja -->
                     <a href="proses_hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin mau hapus data siswa bernama <?php echo $data['nama']; ?>?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>