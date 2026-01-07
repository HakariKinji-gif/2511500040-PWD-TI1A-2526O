<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

# Validasi cmid dari GET
$cmid = filter_input(INPUT_GET, 'cmid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$cmid) {
    $_SESSION['flash_error_bio'] = 'ID Mahasiswa tidak valid.';
    redirect_ke('read_biomahasiswa.php');
}

# Hapus data dari database menggunakan prepared statement
$stmt = mysqli_prepare($conn, "DELETE FROM biodata_mahasiswa WHERE cmid = ?");

if (!$stmt) {
    $_SESSION['flash_error_bio'] = 'Terjadi kesalahan sistem.';
    redirect_ke('read_biomahasiswa.php');
}

mysqli_stmt_bind_param($stmt, "i", $cmid);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses_bio'] = 'Data mahasiswa berhasil dihapus!';
} else {
    $_SESSION['flash_error_bio'] = 'Data gagal dihapus. Silakan coba lagi.';
}

mysqli_stmt_close($stmt);

# Konsep PRG: Redirect ke halaman data mahasiswa
redirect_ke('read_biomahasiswa.php');
?>