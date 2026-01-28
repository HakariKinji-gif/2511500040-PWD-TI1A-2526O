<?php
session_start();
require __DIR__ . '/koneksi.php'; 
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    header("location: index.php#biodata");
    exit();
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

$errors = [];
if ($kode === '') $errors[] = 'Kode Dosen wajib diisi.';
if ($nama === '') $errors[] = 'Nama Dosen wajib diisi.';

if (!empty($errors)) {
    $_SESSION['old'] = $_POST;
    $_SESSION['flash_error'] = implode('<br>', $errors);
    header("location: index.php#biodata");
    exit();
}

$sql = "INSERT INTO tbl_biodata_dosen 
        (kode_dosen, nama_dosen, alamat_rumah, tanggal_jadi_dosen, jja_dosen, homebase_prodi, nomor_hp, nama_pasangan, nama_anak, bidang_ilmu_dosen) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssssssss", 
        $kode, $nama, $alamat, $tanggal, $jja, $prodi, $nohp, $pasangan, $anak, $ilmu
    );

    if (mysqli_stmt_execute($stmt)) {
        unset($_SESSION['old']);
        $_SESSION['flash_sukses'] = 'Data berhasil disimpan!';
        header("location: read.php?status=sukses"); 
    } else {
        $_SESSION['flash_error'] = 'Gagal simpan: ' . mysqli_error($conn);
        header("location: index.php#biodata");
    }
    mysqli_stmt_close($stmt);
} else {
    $_SESSION['flash_error'] = 'Kesalahan sistem Prepare: ' . mysqli_error($conn);
    header("location: index.php#biodata");
}
?