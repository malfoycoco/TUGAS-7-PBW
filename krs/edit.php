<?php
include '../koneksi.php';

$id = $_GET['id'];

// Ambil data KRS yang akan diedit
$query = mysqli_query($conn, "SELECT * FROM krs WHERE id='$id'");
$data  = mysqli_fetch_assoc($query);

// Ambil data mahasiswa dan matakuliah untuk dropdown
$mahasiswaList   = mysqli_query($conn, "SELECT npm, nama FROM mahasiswa");
$matakuliahList  = mysqli_query($conn, "SELECT kodemk, nama FROM matakuliah");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mahasiswa_npm     = $_POST['mahasiswa_npm'];
    $matakuliah_kodemk = $_POST['matakuliah_kodemk'];

    $update = "UPDATE krs SET mahasiswa_npm='$mahasiswa_npm', matakuliah_kodemk='$matakuliah_kodemk' 
               WHERE id='$id'";
    mysqli_query($conn, $update);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit KRS</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Edit Data KRS</h1>
<form method="POST">
    <label>Mahasiswa</label><br>
    <select name="mahasiswa_npm" required>
        <option value="">-- Pilih Mahasiswa --</option>
        <?php while ($mhs = mysqli_fetch_assoc($mahasiswaList)) : ?>
            <option value="<?= $mhs['npm'] ?>" <?= $mhs['npm'] == $data['mahasiswa_npm'] ? 'selected' : '' ?>>
                <?= $mhs['npm'] ?> - <?= $mhs['nama'] ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>

    <label>Matakuliah</label><br>
    <select name="matakuliah_kodemk" required>
        <option value="">-- Pilih Matakuliah --</option>
        <?php while ($mk = mysqli_fetch_assoc($matakuliahList)) : ?>
            <option value="<?= $mk['kodemk'] ?>" <?= $mk['kodemk'] == $data['matakuliah_kodemk'] ? 'selected' : '' ?>>
                <?= $mk['kodemk'] ?> - <?= $mk['nama'] ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>

    <button type="submit">Update</button>
</form>
<br>
<a href="index.php">Kembali</a>
</body>
</html>
