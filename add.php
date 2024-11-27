<?php
$conn = mysqli_connect("localhost", "root", "", "crud");
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>
<?php
if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $npm = mysqli_real_escape_string($conn, $_POST['npm']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);

    $query = "INSERT INTO mahasiswa (nama, npm, jurusan, kelas) VALUES ('$nama', '$npm', '$jurusan', '$kelas')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan: " . mysqli_error($conn) . "');
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" 
    rel="stylesheet" 
    type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="navbar bg-base-100 shadow-md">
        <div class="flex justify-center w-full">
            <h1 class="text-2xl font-bold text-gray-800">Tambah Data Mahasiswa</h1>
        </div>
    </div>
    <div class="container mx-auto mt-10 max-w-md bg-white p-6 rounded-lg shadow-md">
        <form action="" method="post" class="space-y-4">
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" required 
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="npm" class="block text-sm font-medium text-gray-700">NPM</label>
                <input type="text" name="npm" id="npm" required 
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" required 
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                <input type="text" name="kelas" id="kelas" required 
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex justify-end">
                <button type="submit" name="submit" 
                    class="px-4 py-2 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-600">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</body>
</html>