<?php
include '../koneksi.php';

$kodemk = $_GET['kodemk'];
mysqli_query($conn, "DELETE FROM matakuliah WHERE kodemk='$kodemk'");
header("Location: index.php");
?>
