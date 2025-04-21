<?php
include '../koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Daftar Mahasiswa</h1>
<a href="tambah.php">+ Tambah Mahasiswa</a>

<table>
    <tr>
        <th>No</th>
        <th>NPM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; while($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['npm'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['jurusan'] ?></td>
        <td><?= $row['alamat'] ?></td>
        <td>
            <a href="edit.php?npm=<?= $row['npm'] ?>">Edit</a> |
            <a href="hapus.php?npm=<?= $row['npm'] ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>
</body>
</html>
