<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error_bio'] = 'Akses tidak valid.';
    redirect_ke('read_biomahasiswa.php');
}

$cmid = filter_input(INPUT_POST, 'cmid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$cmid) {
    $_SESSION['flash_error_bio'] = 'ID Mahasiswa tidak valid.';
    redirect_ke('edit_bio.php?cmid=' . (int)$_POST['cmid']);
}

$nim = bersihkan($_POST['txtNim'] ?? '');
$nama = bersihkan($_POST['txtNmLengkap'] ?? '');
$tempat_lahir = bersihkan($_POST['txtT4Lhr'] ?? '');
$tanggal_lahir = bersihkan($_POST['txtTglLhr'] ?? '');
$hobi = bersihkan($_POST['txtHobi'] ?? '');
$pasangan = bersihkan($_POST['txtPasangan'] ?? '');
$pekerjaan = bersihkan($_POST['txtKerja'] ?? '');
$nama_ortu = bersihkan($_POST['txtNmOrtu'] ?? '');
$nama_kakak = bersihkan($_POST['txtNmKakak'] ?? '');
$nama_adik = bersihkan($_POST['txtNmAdik'] ?? '');

$errors = [];

if (empty($nama)) {
    $errors[] = 'Nama lengkap wajib diisi.';
} elseif (strlen($nama) < 2) {
    $errors[] = 'Nama minimal 2 karakter.';
}

if (empty($tempat_lahir)) {
    $errors[] = 'Tempat lahir wajib diisi.';
}

if (empty($tanggal_lahir)) {
    $errors[] = 'Tanggal lahir wajib diisi.';
} elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggal_lahir)) {
    $errors[] = 'Format tanggal lahir tidak valid. Gunakan format YYYY-MM-DD.';
}

if (empty($hobi)) {
    $errors[] = 'Hobi wajib diisi.';
}

if (empty($nama_ortu)) {
    $errors[] = 'Nama orang tua wajib diisi.';
}

if (!empty($errors)) {
    $_SESSION['old_edit'] = [
        'nama' => $nama,
        'tempat_lahir' => $tempat_lahir,
        'tanggal_lahir' => $tanggal_lahir,
        'hobi' => $hobi,
        'pasangan' => $pasangan,
        'pekerjaan' => $pekerjaan,
        'nama_ortu' => $nama_ortu,
        'nama_kakak' => $nama_kakak,
        'nama_adik' => $nama_adik
    ];
    
    $_SESSION['flash_error_bio'] = implode('<br>', $errors);
    redirect_ke('edit_bio.php?cmid=' . $cmid);
}

$sql = "UPDATE biodata_mahasiswa SET 
        cnama = ?, 
        ctempat_lahir = ?, 
        ctanggal_lahir = ?, 
        chobi = ?, 
        cpasangan = ?, 
        cpekerjaan = ?, 
        cnama_ortu = ?, 
        cnama_kakak = ?, 
        cnama_adik = ? 
        WHERE cmid = ?";
        
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION['flash_error_bio'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit_bio.php?cmid=' . $cmid);
}

mysqli_stmt_bind_param($stmt, "sssssssssi", 
    $nama, $tempat_lahir, $tanggal_lahir, $hobi, 
    $pasangan, $pekerjaan, $nama_ortu, $nama_kakak, 
    $nama_adik, $cmid);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old_edit']);
    $_SESSION['flash_sukses_bio'] = 'Data mahasiswa berhasil diperbarui!';
    
    if (isset($_SESSION['biodata']) && $_SESSION['biodata']['nim'] == $nim) {
        $_SESSION['biodata'] = [
            "nim" => $nim,
            "nama" => $nama,
            "tempat" => $tempat_lahir,
            "tanggal" => $tanggal_lahir,
            "hobi" => $hobi,
            "pasangan" => $pasangan,
            "pekerjaan" => $pekerjaan,
            "ortu" => $nama_ortu,
            "kakak" => $nama_kakak,
            "adik" => $nama_adik
        ];
    }
    
    redirect_ke('read_biomahasiswa.php');
} else {
    $_SESSION['old_edit'] = [
        'nama' => $nama,
        'tempat_lahir' => $tempat_lahir,
        'tanggal_lahir' => $tanggal_lahir,
        'hobi' => $hobi,
        'pasangan' => $pasangan,
        'pekerjaan' => $pekerjaan,
        'nama_ortu' => $nama_ortu,
        'nama_kakak' => $nama_kakak,
        'nama_adik' => $nama_adik
    ];

    $_SESSION['flash_error_bio'] = 'Data gagal diperbarui. Silakan coba lagi.';
    redirect_ke('edit_bio.php?cmid=' . $cmid);
}

mysqli_stmt_close($stmt);
?>