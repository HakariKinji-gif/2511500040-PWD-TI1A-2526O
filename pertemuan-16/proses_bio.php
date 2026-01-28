<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error_bio'] = 'Akses tidak valid.';
    redirect_ke('index.php#biodata');
}

$kode     = bersihkan($_POST['txtKodeDos'] ?? '');
$nama     = bersihkan($_POST['txtNmDosen'] ?? '');
$alamat   = bersihkan($_POST['txtAlRmh'] ?? '');
$tanggal  = bersihkan($_POST['txtTglDosen'] ?? '');
$jja      = bersihkan($_POST['txtJJA'] ?? '');
$prodi    = bersihkan($_POST['txtProdi'] ?? '');
$nohp     = bersihkan($_POST['txtNoHP'] ?? '');
$pasangan = bersihkan($_POST['txtNamaPasangan'] ?? '');
$anak     = bersihkan($_POST['txtNmAnak'] ?? '');
$ilmu     = bersihkan($_POST['txtBidangIlmu'] ?? '');

$arrBiodata = [
  "kodedos" => $_POST["txtKodeDos"] ?? "",
  "nama" => $_POST["txtNmDosen"] ?? "",
  "alamat" => $_POST["txtAlRmh"] ?? "",
  "tanggal" => $_POST["txtTglDosen"] ?? "",
  "jja" => $_POST["txtJJA"] ?? "",
  "prodi" => $_POST["txtProdi"] ?? "",
  "nohp" => $_POST["txtNoHP"] ?? "",
  "pasangan" => $_POST["txNamaPasangan"] ?? "",
  "anak" => $_POST["txtNmAnak"] ?? "",
  "ilmu" => $_POST["txtBidangIlmu"] ?? ""
];
$_SESSION["biodata"] = $arrBiodata;

header("location: index.php#about");
