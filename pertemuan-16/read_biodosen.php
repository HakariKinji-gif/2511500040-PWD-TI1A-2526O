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

</head>
<body>
    <header>
        <h1>Biodata Dosen</h1>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="index.php#biodata">Input Biodata</a></li>
                <li><a href="#biodata">Biodata Dosen</a></li>
            </ul>
        </nav>
    </header>

    <main class="biodata-dosen">
      
        <h2>Daftar Biodata Dosen</h2>
        
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
<th>Kode Dosen</th>
<th>Nama Dosen</th>
<th>Alamat Rumah </th>
<th>Tanggal Jadi Dosen</th>
<th>JJA Dosen</th>
<th>Homebase Prodi</th>
<th>Nomor HP</th>
<th>Nama Pasangan</th>
<th>Nama Anak</th>
<th>Bidang Ilmu Dosen</th>
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
                            <td><?= htmlspecialchars($row['kode_dosen']); ?></td>
                            <td><?= htmlspecialchars($row['nama_dosen']); ?></td>
                            <td><?= htmlspecialchars($row['alamat_rumah']); ?></td>
                            <td><?= date('d-m-Y', strtotime($row['tanggal_jadi_dosen'])); ?></td>
                            <td><?= htmlspecialchars($row['jja_dosen']); ?></td>
                            <td><?= htmlspecialchars($row['homebase_prodi'] ?? '-'); ?></td>
                            <td><?= htmlspecialchars($row['nomor_hp']); ?></td>
                            <td><?= htmlspecialchars($row['nama_pasangan']); ?></td>
                            <td><?= htmlspecialchars($row['nama_anak']); ?></td>
                            <td><?= htmlspecialchars($row['bidang_ilmu_dosen']); ?></td>
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