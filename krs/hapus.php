<?php
include '../koneksi.php';

$id = $_GET['id'];

// Hapus dulu data di tabel KRS yang terkait
mysqli_query($conn, "DELETE FROM krs WHERE krs_id='$id'");

// Baru hapus dari tabel mahasiswa
mysqli_query($conn, "DELETE FROM krs WHERE id='$id'");

header("Location: index.php");
?>

