<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodemk     = $_POST['kodemk'];
    $nama    = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];

    $query = "INSERT INTO matakuliah (kodemk, nama, jumlah_sks) 
              VALUES ('$kodemk', '$nama', '$jumlah_sks')";
    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Kuliah</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Tambah Mata Kuliah</h1>
<form method="POST">
    <label>Kode Mata Kuliah</label><br>
    <input type="text" name="kodemk" required><br><br>

    <label>Nama Mata Kuliah</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Jumlah SKS</label><br>
    <input type="number" name="jumlah_sks" min="1" ,max = "3" required><br><br>

    <button type="submit">Simpan</button>
</form>
<br>
<a href="index.php">Kembali</a>
</body>
</html>
