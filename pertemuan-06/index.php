<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>

<body>
<header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
        &#9776;
    </button>
<nav>
    <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#ipk">Nilai</a></li>
        <li><a href="#contact">Kontak</a></li>
    </ul>
</nav>
</header>

<main>
    <section id="home"> 
    <h2>Selamat Datang</h2>
    <?php
    echo "Halo dunia!<br>";
    echo "Perkenalkan, nama saya Hengky Febrilien.";
    ?>
    <p>Ini contoh paragraf HTML.</p>
</section>

<section id="about">
    <?php
    $Nim = "2511500040";
    $Nama = "Hengky Febrilien";
    $TempatLahir = "Kota Pangkalpinang";
    $TanggalLahir = "12 Februari 2007";
    $hobi = "Bermain Gitar, Bernyanyi";
    $Pasangan = "-";
    $Pekerjaan = "Mahasiswa di ISB Atma Luhur";
    $NamaOrangTua = "Bapak Santo dan Ibu Aini";
    $NamaKakak = "-";
    $NamaAdik = "Xeviola Geraldine";

    ?>
    <h2>Tentang saya</h2>
    <p><strong>NIM:</strong>
    <?php
        echo $Nim;
    ?>
    </p>

    <p><strong>Nama Lengkap:</strong>
    <?php
        echo "$Nama";
    ?> &#128526;</p>

    <p><strong>Tempat Lahir:</strong>
    <?php
        echo "$TempatLahir";
    ?>
    </p>

    <p><strong>Tanggal Lahir:</strong>
    <?php
        echo "$TanggalLahir";
    ?>
    </p>

    <p><strong>Hobi:</strong>
     <?php
        echo "$hobi";
        ?>
    &#127926; </p>

    <p><strong>Pasangan:</strong>
    <?php
        echo "$Pasangan";
        ?>
    </p>

    <p><strong>Pekerjaan:</strong>
    <?php
        echo "$Pekerjaan";
        ?>
     &copy; 2025</p>

    <p><strong>Nama Orang Tua:</strong>
    <?php
        echo "$NamaOrangTua";
        ?>

    </p>
    <p><strong>Nama kakak:</strong>
    <?php
        echo "$NamaKakak";
        ?>

    </p>
    <p><strong>Nama Adik:</strong>
    <?php
        echo "$NamaAdik";
        ?>
    </p>
</section>

<section id="ipk">
<h2>Nilai saya</h2>
<P> <?php 
// --- DATA MATAKULIAH ---
$namaMatkul = ["Kalkulus", "Apliaksi Perkantoran", "Logika Informatika", "Konsep Basis Data", "Pemrograman Web Dasar"];
$sks = [3, 3, 3, 3, 3];
$hadir = [100, 100, 100, 100, 100];
$tugas = [100, 100, 100, 100, 100];
$uts = [100, 100, 80, 80, 100];
$uas = [90, 80, 85, 75, 100];

$totalBobot = 0;
$totalSKS = array_sum($sks);

function hitungGrade($na, $nhadir) {
    if ($nhadir < 70) return ["E", 0.00, "Gagal"];

    if ($na >= 85) return ["A", 4.00, "Lulus"];
    elseif ($na >= 80) return ["A-", 3.70, "Lulus"];
    elseif ($na >= 75) return ["B+", 3.30, "Lulus"];
    elseif ($na >= 70) return ["B", 3.00, "Lulus"];
    elseif ($na >= 65) return ["B-", 2.70, "Lulus"];
    elseif ($na >= 60) return ["C+", 2.30, "Lulus"];
    elseif ($na >= 55) return ["C", 2.00, "Lulus"];
    elseif ($na >= 50) return ["C-", 1.70, "Lulus"];
    elseif ($na >= 40) return ["D", 1.00, "Gagal"];
    else return ["E", 0.00, "Gagal"];
}

for ($i = 0; $i < 5; $i++) {

    $nilaiAkhir = (0.1 * $hadir[$i]) + (0.2 * $tugas[$i]) + (0.3 * $uts[$i]) + (0.4 * $uas[$i]);

    list($grade, $mutu, $status) = hitungGrade($nilaiAkhir, $hadir[$i]);

    $bobot = $mutu * $sks[$i];
    $totalBobot += $bobot;


    echo"<p><strong>Nama Matakuliah ke-".($i+1)." :</strong> {$namaMatkul[$i]}<br></p>";
    echo "<p><strong>SKS :</strong> {$sks[$i]}<br></p>";
    echo "<p><strong>Kehadiran :</strong> {$hadir[$i]}<br></p>";
    echo "<p><strong>Tugas :</strong> {$tugas[$i]}<br></p>";
    echo "<p><strong>UTS :</strong> {$uts[$i]}<br></p>";
    echo "<p><strong>UAS :</strong> {$uas[$i]}<br></p>";
    echo "<p><strong>Nilai Akhir :</strong> ".round($nilaiAkhir)."<br></p>";
    echo "<p><strong>Grade :</strong> $grade<br></p>";
    echo "<p><strong>Angka Mutu :</strong> ".number_format($mutu, 2)."<br></p>";
    echo "<p><strong>Bobot :</strong> ".number_format($bobot, 2)."<br></p>";
    echo "<p><strong>Status :</strong> $status<br><br></p>";
}

$IPK = $totalBobot / $totalSKS;

echo "<hr>";
echo "Total Bobot: ".number_format($totalBobot, 2)."<br>";
echo "Total SKS: $totalSKS<br>";
echo "<strong>IPK: ".number_format($IPK, 2)."</strong><br>";
?> </P>
</section>

  <section id="contact">
<h2>Kontak Kami</h2>
<form action="" method="GET">
<label for="txtNama"><span>Nama:</span>
<input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required
autocomplete="name">
</label>
<label for="txtEmail"><span>Email:</span>
<input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required
autocomplete="email">
</label>
<label for="txtPesan"><span>Pesan Anda:</span>
<textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
<small id="charCount">0/200 karakter</small>
</label>
<button type="submit">Kirim</button>
<button type="reset">Batal</button>
</form>
</section>

</main>

<footer>
    <p>&copy; 2025 Hengky Febrilien [2511500040]</p>
</footer>

<script src="script.js"></script>
</body>
</html>