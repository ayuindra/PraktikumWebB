<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeri Buku</title>
    <link rel="stylesheet" href="galeri.css">
</head>
<body>
     
    <div class="utama">
        
        <header>
            <h2>Buku Pintar</h2>
            <p>Perpustakaan Online untuk kita semua</p>
        </header>
 
        <nav class="navigasi">
            <ul>
                <li><a href="galeri.php">Kontak</a></li>
                <li><a href="galeri.php">Galeri Buku</a></li>
                <li><a href="galeri.php">About</a></li>
                <li><a href="galeri.php">Home</a></li>
            </ul>
        </nav>
 
        <div class="banner">
            <img src="img/latar.jpg">
        </div>  

        <div class="menu-tengah">
            <div class="kotak-tengah">
                <h3>Galeri Buku</h3>
                <form action="galeri.php" method="GET">
                    <label>Cari : </label>
                    <input type="text" name="cari">
                    <input type="submit" value="Cari">
                </form>
                <?php
                    if(isset($_GET['cari'])){
                        $cari = $_GET['cari'];
                        echo "<b>Hasil Pencarian : " .$cari."</b>";
                    }
                ?>
                <table>
                <?php 
                    include 'koneksi.php';
                    $batas = 2;
                    $page = isset($_GET['halaman'])?(int)$_GET["halaman"] : 1;
                    $mulai = ($page>1) ? ($page * $batas) - $batas : 0;
                    $no = $mulai+1;
                    if(isset($_GET['cari'])){
                        $cari = $_GET['cari'];
                        $tampil = mysqli_query($conn, "SELECT * FROM tb_buku WHERE 
                                                                judul_buku LIKE '%".$cari."%' OR
                                                                tahun_terbit LIKE '%".$cari."%' OR
                                                                penulis LIKE '%".$cari."%' OR
                                                                nama_penerbit LIKE '%".$cari."%'
                                                                ORDER BY judul_buku ASC") or die (mysqli_error($conn));
                        while($data = mysqli_fetch_array($tampil)) { 
                            $id = $data["kode_buku"];
                            $gambar = $data['gambar'];
                            $nama = $data['judul_buku']; 
                            $penulis = $data['penulis'];
                            $tahun_terbit=$data['tahun_terbit'];
                            $penerbit = $data['nama_penerbit'];?>
                       
                            <tr>
                                <td><img src = "img/<?php echo $gambar; ?>"width="50" height="50"></td>
                            </tr>
                            <tr>
                                <td><b>Judul Buku : <?php echo $nama; ?></b></td>>
                            </tr>
                            <tr>
                                <td>Penulis : <?php echo $penulis; ?></td>
                            </tr>
                                <td>Tahun Terbit : <?php echo $tahun_terbit; ?></td>
                            </tr>
                            <tr>
                                <td>Penerbit : <?php echo $penerbit; ?></td>
                            </tr>
                            <tr>
                                <td>Kode Buku : <?php echo $id; ?></td>
                            </tr>
            
                        <?php $no++; }; ?>
                    </table>
                   <?php }
                    else{
                        $tampil = mysqli_query($conn, "SELECT * FROM tb_buku ORDER BY judul_buku ASC LIMIT $mulai, $batas ") or die (mysqli_error($conn));
                        while($data = mysqli_fetch_array($tampil)) { 
                        $id = $data["kode_buku"];
                        $gambar = $data['gambar'];
                        $nama = $data['judul_buku']; 
                        $penulis = $data['penulis'];
                        $tahun_terbit=$data['tahun_terbit'];
                        $penerbit = $data['nama_penerbit']; ?>
                   
                        <tr>
                            <td>
                                <img src = "img/<?php echo $gambar; ?>"width="50" height="50">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Judul Buku : <?php echo $nama; ?></b></td>>
                        </tr>
                        <tr>
                            <td>Penulis : <?php echo $penulis; ?></td>
                        </tr>
                            <td>Tahun Terbit : <?php echo $tahun_terbit; ?></td>
                        </tr>
                        <tr>
                            <td>Penerbit : <?php echo $penerbit; ?></td>
                        </tr>
                        <tr>
                            <td>Kode Buku : <?php echo $id; ?></td>
                        </tr>
        
                    <?php $no++; }; ?>
                </table>
                <?php
                    $hitung = mysqli_query($conn,"SELECT * FROM tb_buku") or die (mysqli_error($conn));
                    $jmldata    = mysqli_num_rows($hitung);
            
                ?>
                <br>
                <?php
                    $jmlhalaman = ceil($jmldata/$batas);
                    for($i=1; $i<=$jmlhalaman; $i++){
                        echo '<a class="page" href="?halaman='.$i.'">'.$i.'</a>';
                    }
                
                    };?>
                    
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