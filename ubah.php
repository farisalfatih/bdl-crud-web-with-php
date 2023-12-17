<?php
    require 'functions.php';

    // ambil data di URL
    $id = $_GET['id'];
    // query data mahasiswa berdasarkan id
    $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

    if (isset($_POST["submit"])) {
        if ( ubah ($_POST) > 0 ) {
            echo "
                <script>
                    alert('Data Berhasil Diubah!');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Diubah!');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Mahasiswa</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="container">
        <h1>Ubah Data Mahasiswa</h1>
        <br><br>
        <!-- Form untuk Mengubah data -->
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $mhs["id"] ?>">
            <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"] ?>">
            <ul>
                <li>
                    <label for="npm">NPM : </label>
                    <input type="text" name="npm" id="npm" required value="<?= $mhs["npm"];?>">
                </li>
                <li>
                    <label for="nama">Nama : </label>
                    <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"];?>">
                </li>
                <li>
                    <label for="email">Email : </label>
                    <input type="text" name="email" id="email" required value="<?= $mhs["email"];?>">
                </li>
                <li>
                <label for="jurusan">Jurusan : </label>
                    <select name="jurusan" required type="text">
                        <option value="Informatika">Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Sains Data">Sains Data</option>
                    </select>
                </li>
                <li>
                    <label for="gambar">Gambar : </label>
                    <img src="img/<?= $mhs['gambar']?>" width="70">
                    <br>
                    <input type="file" name="gambar" id="gambar">
                </li>
                <li>
                    <button type="submit" name="submit">Ubah Data!</button>
                </li>
            </ul>
        </form>
    </div>

    <script>
        // Add event listener to update the selectedJurusan span when the select changes
        document.getElementById('jurusanSelect').addEventListener('change', function() {
            document.getElementById('selectedJurusan').innerText = 'Selected Jurusan: ' + this.value;
        });
    </script>
</body>
</html>
