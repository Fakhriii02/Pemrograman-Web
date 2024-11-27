<?php

$conn = mysqli_connect("localhost", "root", "", "crud");

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mahasiswa = $id");

header("Location: index.php");
?>
