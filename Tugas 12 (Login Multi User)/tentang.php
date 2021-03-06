<?php 
    include 'koneksi.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
    <link rel="stylesheet" href="css/tentang.css">

    <style>
        body{
            <?php if($_SESSION['level'] == "Admin"){ ?>
                background-color: #47B2BD;
            <?php }
            else if($_SESSION['level'] == "Mahasiswa"){?>
                background-color: #8FBC8F;
            <?php } 
            else if($_SESSION['level'] == "Dosen"){?>
                background-color: #D2B48C;
            <?php }
            else if($_SESSION['level'] == "Pegawai"){?>
                background-color: #D8BFD8;
            <?php }; ?>
        }
    </style>
</head>
<body>
     
    <div class="utama">
        
        <header>
            <h2>Buku Pintar</h2>
            <p>Perpustakaan Online untuk kita semua</p>
        </header>
 
        <nav class="navigasi">
            <ul>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="kontak.php">Kontak</a></li>
                <li><a href="galeri.php">Galeri Buku</a></li>
                <li><a href="tentang.php">About</a></li>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
 
        <div class="banner">
            <img src="img/latar.jpg">
        </div>
 
		<div class="menu-kiri">
            <div class="kotak">
                <h3>User</h3>
 
                <nav class="menu-populer">
                    <ul>
                        <center><li><?php echo $_SESSION['nama']; ?></li>
                        <br><hr><br>
                        <li><?php echo $_SESSION['level']; ?></li></center>
                    </ul>
                </nav>
            </div>
		</div>     

        <div class="menu-tengah">
            <div class="kotak">
				<h3>Sekilas Tentang Buku Pintar</h3>
				<img src="img/perpus.jpg">
				<p align="justify">Buku Pintar merupakan perpustakaan online yang menyediakan beragam buku 
				bacaan yang dapat diakses secara gratis oleh semua orang dari berbagai kalangan</p>
            </div>
        </div>
 
        <div class="menu-kanan">
            <div class="kotak">
                <h3>Jadwal Buka</h3>
                <img src="img/buku2.jpg">
 
                <h4 align="center">Jadwal Buka</h4>
                <center>
                    <p>Senin-Jumat</p>
					<p>08.00 WITA - 16.00 WITA</p>
                </center>
            </div>
 
 
            <div class="kotak">
                <h3>Buku Terpopuler</h3>
 
                <nav class="menu-populer">
                    <ul>
                        <li><a href="#">Buku Psikologi</a></li>
                        <li><a href="#">Buku Kesehatan</a></li>
                        <li><a href="#">Buku Pemrograman</a></li>
                        <li><a href="#">Buku Design</a></li>
                        <li><a href="#">Buku Matematika</a></li>
                    </ul>
                </nav>
            </div>
        </div>
 
        <footer>
            @copyright 2020 - Ayu Indra
        </footer>
 
    </div>
 
</body>
</html>