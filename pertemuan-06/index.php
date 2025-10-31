<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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