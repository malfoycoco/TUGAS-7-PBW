<?php
include '../koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM matakuliah");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mata Kuliah</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Daftar Mata Kuliah</h1>
<a href="tambah.php">+ Tambah Mata Kuliah</a>

<table>
    <tr>
        <th>No</th>
        <th>Kode Mata Kuliah</th>
        <th>Nama Mata Kuliah</th>
        <th>Jumlah SKS</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; while($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['kodemk'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['jumlah_sks'] ?></td>
        <td>
            <a href="edit.php?kodemk=<?= $row['kodemk'] ?>">Edit</a> |
            <a href="hapus.php?kodemk=<?= $row['kodemk'] ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>
</body>
</html>
