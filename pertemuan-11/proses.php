<?php
session_start();
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php#contact");
    exit;
}

$nama  = htmlspecialchars(trim($_POST["txtNama"] ?? ""));
$email = htmlspecialchars(trim($_POST["txtEmail"] ?? ""));
$pesan = htmlspecialchars(trim($_POST["txtPesan"] ?? ""));


$_SESSION["old"] = [
    "nama" => $nama,
    "email" => $email,
    "pesan" => $pesan
];

$errors = [];

if ($nama === "") {
    $errors[] = "Nama wajib diisi";
}

if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email tidak valid";
}

if ($pesan === "") {
    $errors[] = "Pesan wajib diisi";
}

if ($nama !== "" && strlen($nama) < 3) {
    $errors[] = "Nama minimal 3 karakter";
}

if ($pesan !== "" && strlen($pesan) < 10) {
    $errors[] = "Pesan minimal 10 karakter";
}

if (!empty($errors)) {
    $_SESSION["flash_error"] = implode("<br>", $errors);
    header("Location: index.php#contact");
    exit;
}

$sql = "INSERT INTO tbl_tamu (cnama, cemail, cpesan) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION["flash_sukses"] = "Pesan berhasil dikirim";
        unset($_SESSION["old"]);
    } else {
        $_SESSION["flash_error"] = "Gagal menyimpan data";
    }

    mysqli_stmt_close($stmt);
} else {
    $_SESSION["flash_error"] = "Query error";
}


header("Location: index.php#contact");
exit;
