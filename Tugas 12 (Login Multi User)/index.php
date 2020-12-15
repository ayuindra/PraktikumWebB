<?php 
    include 'koneksi.php';
    session_start();

    //cek sudah login atau belum
    if($_SESSION['level']==""){
		header("location:login.php?pesan=gagal");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage Perpustakaan</title>
    <link rel="stylesheet" href="css/index.css">
    
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
            <p>Perpustakaan Online untuk kita semua</p><br><br>
            <h4>Hallo <?php echo $_SESSION['nama']; ?> Anda Login Sebagai <?php echo $_SESSION['level']; ?></h4>
            
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
                <h3>Einstein, Kehidupan dan Pengaruhnya Bagi Dunia</h3>
                <span class="tanggal-posting">
                    Diposting pada 21.00 WITA, 1 April 2020
                </span>
 
                <img src="img/buku1.png">
 
                <p>Bocah berusia lima tahun itu terus menggigil di ranjang tidurnya. 
				Tapi bukan karena demam. Ia melihat jarum magnet, yang gerakannya seolah-olah dipengaruhi oleh kekuatan tersembunyi. 
				Jarum itu membangkitkan rasa ingin tahu yang memotivasinya kelak, seumur hidupnya. 
				Ayahnya memberi tahu bahwa benda menakjubkan itu bernama kompas Belasan bahkan puluhan tahun kemudian, 
				Albert Einsteinlelaki kecil taditerus mengingat pertemuan pertamanya dengan kompas. 
				Ketakjubannya akan kesetiaan jarum pada medan yang tak terlihat.
				Kecerdasan Einstein memang melampaui zamannya. Masa muda Einstein penuh pemberontakan terhadap aturan. 
				Ia bahkan menjadi panutan suci bagi anak-anak sekolah yang bermasalah di mana saja.
				Tak hanya itu, di puncak karirnya, penolakan keras Einstein terhadap penggunaan senjata membuatnya begitu 
				dicintai sekaligus dibenci. Ia bahkan menjuluki negara-negara pengibar perang sebagai orang kaya yang berusaha mengusir 
				kebosanan.Dalam biografi ini, Walter Isaacson tak hanya berhasil membedah pemikiran Einstein, tetapi juga 
				menampilkan sisi manusia dari ikon jenius ini sebagai bagian dari masyarakat semesta.
                </p>
                <a class="tombol tombol-lengkap" href="#">Selengkapnya</a>
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