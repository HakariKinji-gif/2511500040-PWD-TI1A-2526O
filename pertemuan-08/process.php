<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$_SESSION["sesNIM"] = $_POST["txtNIM"];
$_SESSION["sesName"] = $_POST["txtName"];
$_SESSION["sesTempatLahir"] = $_POST["txtTempatLahir"];
$_SESSION["sesTanggalLahir"] = $_POST["txtTanggalLahir"];
$_SESSION["sesHobi"] = $_POST["txtHobi"];
$_SESSION["sesPasangan"] = $_POST["txtPasangan"];
$_SESSION["sesPekerjaan"] = $_POST["txtPekerjaan"];
$_SESSION["sesNamaOrangTua"] = $_POST["txtNamaOrangTua"];
$_SESSION["sesNamaKakak"] = $_POST["txtNamaKakak"];
$_SESSION["sesNamaAdik"] = $_POST["txtNamaAdik"];
header("location: index.php");
exit;
}
?>