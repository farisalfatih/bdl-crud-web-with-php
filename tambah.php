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
                        <option value="Bisnis Digital">Bisnis Digital</option>
                        <option value="Pendidikan Dokter">Pendidikan Dokter</option>
                        <option value="Profesi Dokter">Profesi Dokter</option>
                        <option value="Ekonomi Pembangunan">Ekonomi Pembangunan</option>
                        <option value="Manajemen">Manajemen</option>
                        <option value="Akuntansi">Akuntansi</option>
                        <option value="Kewirausahaan">Kewirausahaan</option>
                        <option value="Teknik Industri">Teknik Industri</option>
                        <option value="Teknik Kimia">Teknik Kimia</option>
                        <option value="Teknologi Pangan">Teknologi Pangan</option>
                        <option value="Teknik Sipil">Teknik Sipil</option>
                        <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Fisika">Fisika</option>
                        <option value="Administrasi Negara">Administrasi Negara</option>
                        <option value="Administrasi Bisnis">Administrasi Bisnis</option>
                        <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                        <option value="Hubungan Internasional">Hubungan Internasional</option>
                        <option value="Pariwisata">Pariwisata</option>
                        <option value="Linguistik Indonesia">Linguistik Indonesia</option>
                        <option value="D4 Bahasa Inggris">D4 Bahasa Inggris</option>
                        <option value="Arsitektur">Arsitektur</option>
                        <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                        <option value="Desain Interior">Desain Interior</option>
                        <option value="Agroteknologi">Agroteknologi</option>
                        <option value="Agribisnis">Agribisnis</option>
                        <option value="Fakultas Hukum">Fakultas Hukum</option>
                        <option value="Ilmu Hukum">Ilmu Hukum</option>
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
