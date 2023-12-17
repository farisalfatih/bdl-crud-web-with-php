<?php
    require 'functions.php';

    if (isset($_POST["submit"])) {

        if (tambah($_POST) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Data Mahasiswa</h1>
        <br>
        <!-- Form untuk menambahkan data -->
        <form action="" method="post" enctype="multipart/form-data">
            <ul>
                <li>
                    <label for="npm">NPM : </label>
                    <input type="text" name="npm" id="npm" required>
                </li>
                <li>
                    <label for="nama">Nama : </label>
                    <input type="text" name="nama" id="nama" required>
                </li>
                <li>
                    <label for="email">Email : </label>
                    <input type="text" name="email" id="email" required>
                </li>
                <li>
                    <label for="jurusan">Jurusan : </label>
                    <select name="jurusan" required>
                        <option value="Informatika">Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Sains Data">Sains Data</option>
                    </select>
                </li>
                <li>
                    <label for="gambar">Gambar : </label>
                    <input type="file" name="gambar" id="gambar">
                </li>
                <li>
                    <button type="submit" name="submit">Tambah Data!</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>
