<?php

$conn = mysqli_connect("localhost", "root", "", "bdl");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $rows = [];

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data) {
        global $conn;
        $npm = htmlspecialchars($data["npm"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        // upload gambar
        $gambar = upload();
        if ( !$gambar ){
                return false;
        }
    
        $query = "INSERT INTO mahasiswa (npm, nama, email, jurusan, gambar)
                VALUES ('$npm', '$nama', '$email', '$jurusan', '$gambar')";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
}

function upload() {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];
    
        // Cek apakah tidak ada gambar yang diupload
        if ($error === 4) {
            echo "<script>alert('Pilih Gambar Telebih Dahulu!');</script>";
            return false;
        }
    
        // Cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'bmp'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>alert('Yang Anda Upload Bukan Gambar!');</script>";
            return false;
        }
    
        // Cek jika ukuran terlalu besar
        if ($ukuranFile > 3000000) {
            echo "<script>alert('Ukuran Gambar Terlalu Besar, Maksimal 3 MB');</script>";
            return false;
        }
    
        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru = $namaFileBaru . '.' . $ekstensiGambar;
    
        // Lolos pengecekan, gambar siap diupload
        // Note: There is an inconsistency in variable names here (use $tmpName instead of $tmp_name)
        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        return $namaFileBaru;
    }

function hapus ($id) {
        global $conn;
        mysqli_query($conn,"DELETE FROM mahasiswa WHERE id = $id");

        return mysqli_affected_rows($conn);
}

function ubah ($data){
        global $conn;
        $id = $data["id"];
        $npm = htmlspecialchars($data["npm"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        //cek apakah user pilih gambar baru atau tidak
        if( $_FILES['gambar'] ['error'] === 4) {
                $gambar = $gambarLama;
        } else {
                $gambar = upload();
        }
    
        $query = "UPDATE mahasiswa SET 
                        npm = '$npm',
                        nama = '$nama',
                        email = '$email',
                        jurusan = '$jurusan',
                        gambar = '$gambar'
                 WHERE id = $id;
                ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
}

function cari($keyword){
        $query = "SELECT * FROM mahasiswa 
                        WHERE
                        nama LIKE '%$keyword%' OR
                        npm LIKE '%$keyword%' OR
                        email LIKE '%$keyword%' OR
                        jurusan LIKE '%$keyword%'
        ";
        return query($query);
}
?>