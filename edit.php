<?php
$conn = mysqli_connect("localhost", "root", "", "crud");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id_mahasiswa = $id");
    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        die("Data tidak ditemukan!");
    }
}

if (isset($_POST['submit'])) {
    // Mengambil data yang telah diinputkan di form
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $npm = mysqli_real_escape_string($conn, $_POST['npm']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);

    // Query untuk update data
    $query = "UPDATE mahasiswa SET nama = '$nama', npm = '$npm', jurusan = '$jurusan', kelas = '$kelas' WHERE id_mahasiswa = $id";

    // Mengeksekusi query dan menampilkan pesan
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Data berhasil diperbarui!');
                window.location.href = 'index.php'; // Arahkan ke halaman index
              </script>";
    } else {
        echo "<script>
                alert('Data gagal diperbarui: " . mysqli_error($conn) . "');
              </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="navbar bg-base-100 shadow-md">
        <div class="flex justify-center w-full">
            <h1 class="text-2xl font-bold text-gray-800">Edit Data Mahasiswa</h1>
        </div>
    </div>
    <div class="container mx-auto mt-10 max-w-md bg-white p-6 rounded-lg shadow-md">
        <form action="" method="post" class="space-y-4">
            <!-- Input untuk Nama -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= $row['nama']; ?>" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Input untuk NPM -->
            <div>
                <label for="npm" class="block text-sm font-medium text-gray-700">NPM</label>
                <input type="text" name="npm" id="npm" value="<?= $row['npm']; ?>" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Input untuk Jurusan -->
            <div>
                <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $row['jurusan']; ?>" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Input untuk Kelas -->
            <div>
                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                <input type="text" name="kelas" id="kelas" value="<?= $row['kelas']; ?>" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Tombol Submit -->
            <div class="flex justify-end">
                <button type="submit" name="submit"
                    class="px-4 py-2 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-600">
                    Perbarui Data
                </button>
            </div>
        </form>
    </div>
</body>
</html>
