<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'crud');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tambahkan data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $jurusan = $_POST['jurusan'];
    $kelas = $_POST['kelas'];

    $conn->query("INSERT INTO mahasiswa (nama, npm, jurusan, kelas) VALUES ('$nama', '$npm', '$jurusan', '$kelas')");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h1>Tambah Mahasiswa</h1>
    <form action="" method="POST">
        <label>Nama: </label>
        <input type="text" name="nama" required><br>
        <label>NPM: </label>
        <input type="text" name="npm" required><br>
        <label>Jurusan: </label>
        <input type="text" name="jurusan" required><br>
        <label>Kelas: </label>
        <input type="text" name="kelas" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
