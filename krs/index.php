<?php
include '../koneksi.php';

$result = mysqli_query($conn, "SELECT krs.id, 
                                      mahasiswa.npm, 
                                      mahasiswa.nama AS nama_mahasiswa, 
                                      matakuliah.kodemk, 
                                      matakuliah.nama AS nama_matakuliah, 
                                      matakuliah.jumlah_sks
                               FROM krs 
                               JOIN mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm 
                               JOIN matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar KRS</title>
    <link rel="stylesheet" href="../css/style.css">

    <style>
        .highlight-nama, .highlight-mk {
            color: #CD4662; 
            font weight: bold;
        }
    </style>
</head>
<body>

<h1>Daftar KRS</h1>
<a href="tambah.php">+ Tambah KRS</a>

<table>
    <tr>
        <th>No</th>
        <th>NPM</th>
        <th>Nama Mahasiswa</th>
        <th>Kode Mata Kuliah</th>
        <th>Nama Mata Kuliah</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; while($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['npm'] ?></td>
        <td><?= $row['nama_mahasiswa'] ?></td>
        <td><?= $row['kodemk'] ?></td>
        <td><?= $row['nama_matakuliah'] ?></td>
        <td>
            <span class="highlight-nama"><?= $row['nama_mahasiswa'] ?></span> Mengambil Mata Kuliah 
            <span class="highlight-mk"><?= $row['nama_matakuliah'] ?></span> 
            (<?= $row['jumlah_sks'] ?> SKS)
        </td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>
</body>
</html>
