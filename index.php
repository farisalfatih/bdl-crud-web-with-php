<?php
    require 'functions.php';
    $mahasiswa = query('SELECT * FROM mahasiswa');

    //tombol cari ditekan
    if ( isset($_POST["cari"]) ){
        $mahasiswa = cari ($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/index.css">
    <title>Halaman Admin</title>
</head>
<body>
    <div class="container">
        <h1>DAFTAR MAHASISWA</h1>
        <form action="" method="post">
            <input type="text" name="keyword" size="70" autofocus placeholder="Apa ang Anda Cari?" autocomplete="off">
            <button type="submit" name="cari" class="tombolcari">Cari!..</button>
        </form>

        <a href="tambah.php" class="tomboltambah">Tambah Data</a>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th> 
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>

            <?php $i = 1 ?>
            <?php foreach($mahasiswa as $row) : ?>
            <tr>
                <td class="spesial"><?php echo $i ?></td>
                <td>
                    <a href="ubah.php?id=<?php echo $row["id"];  ?>" class="tombolubah">Ubah</a>
                    <a href="hapus.php?id=<?php echo $row["id"];  ?>" onclick="return confirm('Apakah Anda Yakin?')" class="tombolhapus">Hapus</a>
                </td>
                <td class="spesial">
                    <img src="img/<?php echo $row["gambar"] ?>" width="50">
                </td>
                <td><?php echo $row["npm"] ?></td>
                <td><?php echo $row["nama"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["jurusan"] ?></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
