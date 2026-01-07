<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$sql = "SELECT * FROM biodata_mahasiswa ORDER BY cmid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
    die("Query error: " . mysqli_error($conn));
}

$flash_sukses = $_SESSION['flash_sukses_bio'] ?? '';
$flash_error  = $_SESSION['flash_error_bio'] ?? '';
unset($_SESSION['flash_sukses_bio'], $_SESSION['flash_error_bio']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
    <style>
      header {
  background-color: #333;
  color: #f0e9e9ff;
  padding: 14px 0;
  text-align: center;
}

nav ul {
  list-style: none;
  padding: 0;
  margin-top: 8px;
}

nav ul li {
  display: inline-block;
  margin: 0, 15px;
}

nav ul li a {
  color: #f0e9e9ff;
  text-decoration: none;
  font-weight: 600;
}

nav ul li a:hover {
  color: #a5a0a0ff;
}
</style>
  
<style>
.data-mahasiswa {
  margin: 30px auto;
  max-width: 1200px;
  padding: 20px;
}

.pesan-status {
  padding: 15px;
  margin-bottom: 20px;
  border-radius: 5px;
  font-weight: 600;
  border: 1px solid transparent;
}

.pesan-sukses {
  background-color: #d4edda;
  color: #155724;
  border-color: #c3e6cb;
}

.pesan-error {
  background-color: #f8d7da;
  color: #721c24;
  border-color: #f5c6cb;
}

.data-mahasiswa table {
  width: 100%;
  border-collapse: collapse;
  background: white;
}

.data-mahasiswa th,
.data-mahasiswa td {
  border: 1px solid #454545ff;
  padding: 12px;
  vertical-align: middle;
}

.data-mahasiswa th {
  background-color: #333;
  color: #fff;
  text-transform: uppercase;
  font-size: 14px;
}

.data-mahasiswa tr:nth-child(even) {
  background-color: #f2f2f2;
}

.data-mahasiswa tr:hover {
  background-color: #e9e9e9;
}

</style>

<style>
  .aksi-btn {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 8px;
}

.btn-edit,
.btn-hapus {
  display: inline-block;
  min-width: 70px;
  text-align: center;
  padding: 8px 0;
  font-size: 14px;
  font-weight: 600;
  border-radius: 4px;
  border: 1px solid #333;
  text-decoration: none;
  transition: all 0.2s ease;
}

/* Edit */
.btn-edit {
  background-color: #e6e6e6;
  color: #2f2f2f;
}

.btn-edit:hover {
  background-color: #d6d6d6;
}

/* Hapus */
.btn-hapus {
  background-color: #cccccc;
  color: #2f2f2f;
}

.btn-hapus:hover {
  background-color: #b5b5b5;
}
</style>

</head>
<body>
    <header>
        <h1>Data Mahasiswa</h1>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="index.php#biodata">Input Biodata</a></li>
                <li><a href="#data">Data Mahasiswa</a></li>
            </ul>
        </nav>
    </header>

    <main class="data-mahasiswa">
      
        <h2>Daftar Biodata Mahasiswa</h2>
        
        <?php if (!empty($flash_sukses)): ?>
            <div class="pesan-status pesan-sukses">
                <?= $flash_sukses; ?>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($flash_error)): ?>
            <div class="pesan-status pesan-error">
                <?= $flash_error; ?>
            </div>
        <?php endif; ?>
        
        <?php if (mysqli_num_rows($q) > 0): ?>
            <table>
                <thead>
                    <tr>
<th>No</th>
<th>Aksi</th>
<th>NIM</th>
<th>Nama Lengkap</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Hobi</th>
<th>Pekerjaan</th>
<th>Nama Orang Tua</th>
<th>Nama Kakak</th>
<th>Nama Adik</th>
<th>Dibuat pada</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($q)): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td class="aksi">
    <div class="aksi-btn">
        <a href="edit_bio.php?cmid=<?= (int)$row['cmid']; ?>" class="btn-edit">Edit</a>
        <a href="delete_bio.php?cmid=<?= (int)$row['cmid']; ?>"
           class="btn-hapus"
           onclick="return confirm('Hapus data <?= htmlspecialchars($row['cnama']); ?>?')">
            Hapus
                                </a>
                            </td>
                            <td><?= htmlspecialchars($row['cnim']); ?></td>
                            <td><?= htmlspecialchars($row['cnama']); ?></td>
                            <td><?= htmlspecialchars($row['ctempat_lahir']); ?></td>
                            <td><?= date('d-m-Y', strtotime($row['ctanggal_lahir'])); ?></td>
                            <td><?= htmlspecialchars($row['chobi']); ?></td>
                            <td><?= htmlspecialchars($row['cpekerjaan'] ?? '-'); ?></td>
                            <td><?= htmlspecialchars($row['cnama_ortu']); ?></td>
                            <td><?= htmlspecialchars($row['cnama_kakak']); ?></td>
                            <td><?= htmlspecialchars($row['cnama_adik']); ?></td>
                            <td><?= formatTanggal($row['ccreated_at']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div style="text-align: center; padding: 40px;">
                <p style="font-size: 18px; color: #666;">Belum ada data mahasiswa.</p>
                <a href="index.php#biodata" style="color: #323435ff; text-decoration: underline;">Klik di sini untuk menambah data</a>
            </div>
        <?php endif; ?>
        
        <div style="margin-top: 30px; text-align: center;">
            <a href="index.php" style="background-color: #323435ff; color: white; padding: 10px 20px; 
               border-radius: 6px; text-decoration: none; display: inline-block;">
                Kembali ke Beranda
            </a>
        </div>
    </main>
</body>
</html>