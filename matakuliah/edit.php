<?php
include '../koneksi.php';
$kodemk = $_GET['kodemk'];
$query = mysqli_query($conn, "SELECT * FROM matakuliah WHERE kodemk='$kodemk'");
$data = mysqli_fetch_assoc($query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jumlah_sks  = $_POST['jumlah_sks'];

    $update = "UPDATE matakuliah SET nama='$nama', jumlah_sks='$jumlah_sks' 
               WHERE kodemk='$kodemk'";
    mysqli_query($conn, $update);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mata Kuliah</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Edit Matakuliah</h1>
<form method="POST">
    <label>Kode Mata Kuliah</label><br>
    <input type="text" name="kodemk" value="<?= $data['kodemk'] ?>" disabled><br><br>

    <label>Nama Mata Kuliah</label><br>
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>

    <label>Jumlah SKS</label><br>
    <input type="number" name="jumlah_sks" value="<?= $data['jumlah_sks'] ?>" required><br><br>

    <button type="submit">Update</button>
</form>
<br>
<a href="index.php">Kembali</a>
</body>
</html>
