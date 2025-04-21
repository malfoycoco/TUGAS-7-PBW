<?php
include '../koneksi.php';

// Ambil data mahasiswa dan matakuliah untuk dropdown
$mahasiswaList   = mysqli_query($conn, "SELECT npm, nama FROM mahasiswa");
$matakuliahList  = mysqli_query($conn, "SELECT kodemk, nama FROM matakuliah");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mahasiswa_npm     = $_POST['mahasiswa_npm'];
    $matakuliah_kodemk = $_POST['matakuliah_kodemk'];

    $query = "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) 
              VALUES ('$mahasiswa_npm', '$matakuliah_kodemk')";
    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data KRS</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Tambah Data KRS</h1>
<form method="POST">
    <label>Mahasiswa</label><br>
    <select name="mahasiswa_npm" required>
        <option value="">-- Pilih Mahasiswa --</option>
        <?php while ($mhs = mysqli_fetch_assoc($mahasiswaList)) : ?>
            <option value="<?= $mhs['npm'] ?>">
                <?= $mhs['npm'] ?> - <?= $mhs['nama'] ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>

    <label>Matakuliah</label><br>
    <select name="matakuliah_kodemk" required>
        <option value="">-- Pilih Matakuliah --</option>
        <?php while ($mk = mysqli_fetch_assoc($matakuliahList)) : ?>
            <option value="<?= $mk['kodemk'] ?>">
                <?= $mk['kodemk'] ?> - <?= $mk['nama'] ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>

    <button type="submit">Simpan</button>
</form>
<br>
<a href="index.php">Kembali</a>
</body>
</html>
