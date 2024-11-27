<?php

$conn = mysqli_connect("localhost", "root", "", "crud");


$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" 
    rel="stylesheet" 
    type="text/css" 
    />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="navbar bg-base-100 shadow-md">
  <div class="flex justify-center w-full">
    <h1 class="text-2xl font-bold text-gray-800">DATA MAHASISWA</h1>
  </div>
</div>
<div class="container mx-auto mt-8">
  <div class="overflow-x-auto">
    <table class="table-auto border-collapse border border-gray-300 w-full">
      <thead class="bg-gray-200">
        <tr>
          <th class="border border-gray-300 px-4 py-2">Nama</th>
          <th class="border border-gray-300 px-4 py-2">NPM</th>
          <th class="border border-gray-300 px-4 py-2">Jurusan</th>
          <th class="border border-gray-300 px-4 py-2">Kelas</th>
          <th class="border border-gray-300 px-4 py-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
          <tr class="hover:bg-gray-100">
            <td class="border border-gray-300 px-4 py-2"><?= $row['nama']; ?></td>
            <td class="border border-gray-300 px-4 py-2"><?= $row['npm']; ?></td>
            <td class="border border-gray-300 px-4 py-2"><?= $row['jurusan']; ?></td>
            <td class="border border-gray-300 px-4 py-2"><?= $row['kelas']; ?></td>
            <td class="border border-gray-300 px-4 py-2 text-center">
              <div class="flex justify-center space-x-2">
                <a href="edit.php?id=<?= $row['id_mahasiswa']; ?>" class="btn btn-info btn-sm">Edit</a>
                <a href="delete.php?id=<?= $row['id_mahasiswa']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?');" class="btn btn-error btn-sm">Hapus</a>
              </div>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
<div class="fixed bottom-4 right-4">
  <a href="add.php" class="btn btn-primary">Tambah Data</a>
</div>

</body>
</html>