<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$sql = "SELECT * FROM tbl_biodata_dosen ORDER BY id DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
    die("Query error: " . mysqli_error($conn));
}

$flash_sukses = $_SESSION['flash_sukses_bio'] ?? '';
$flash_error  = $_SESSION['flash_error_bio'] ?? '';
unset($_SESSION['flash_sukses_bio'], $_SESSION['flash_error_bio']);
?>