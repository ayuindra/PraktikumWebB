<?php 
    include 'koneksi.php';
    session_start();

    //cek sudah login atau belum
    if($_SESSION['status_user']==""){
		header("location:login.php?pesan=gagal");
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>	
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <style>
        body{
            background-color: #CDDAE2;
        }
    </style>	
</head>
<body>
    <nav class="navigasi">
        <ul>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="#" data-toggle="modal" data-target="#edit"><?php echo $_SESSION['nama']; ?></a></li>
            <li><a href="#sectionKontak">Kontak</a></li>
            <li><a href="#sectionTentang">Tentang</a></li>
            <li><a href="#sectionGaleri">Galeri</a></li>
            <li><a href="#sectionHome">Home</a></li>
        </ul>
    </nav>

    <div id="sectionHome">
        <h1>Selamat Datang, <?php echo $_SESSION['nama']; ?></h1>
        <h3>Habiskan Waktumu Dengan Menjelajahi Ruang Dan Waktu Bersama Buku Kami</h3>
    </div>

    <div id="sectionGaleri">
        <h2>Galeri Buku</h2>
        <center><form action="#sectionGaleri" method="GET">
            <label>Cari Buku</label><br><br>
            <input type="text" name="cari">
            <input type="submit" value="Cari">
        </form></center>
        <?php 
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
                                $penerbit = $data['nama_penerbit'];
                                $rak = $data['rak'];
                                $stok = $data['stok']; ?>
            <br>
            <div class="card" style="width: 18rem;">
                <img src="img/<?php echo $gambar; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $nama; ?></h5>
                    <p class="card-text"><?php echo $id; ?></p>
                    <p class="card-text"><?php echo $penulis; ?></p>
                    <p class="card-text"><?php echo $tahun_terbit; ?></p>
                    <p class="card-text"><?php echo $penerbit; ?></p>
                    <p class="card-text"><?php echo $rak; ?></p>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary"><a href="#form-peminjaman">Pinjam</a></button>
                </div>
            </div>
        <?php $no++; }; 
        $hitung = mysqli_query($conn,"SELECT * FROM tb_buku") or die (mysqli_error($conn));
        $jmldata    = mysqli_num_rows($hitung);
        ?>
        <br>
        <center><?php
            $jmlhalaman = ceil($jmldata/$batas);
            for($i=1; $i<=$jmlhalaman; $i++){
                //echo '<a class="page" href="?halaman='.$i.'">'.$i.'</a>';
            } } 
        else{ 
            $tampil = mysqli_query($conn, "SELECT * FROM tb_buku LIMIT $mulai, $batas") or die (mysqli_error($conn));
                        while($data = mysqli_fetch_array($tampil)) { 
                        $id = $data['kode_buku'];
                        $gambar = $data['gambar'];
                        $nama = $data['judul_buku']; 
                        $penulis = $data['penulis'];
                        $tahun_terbit=$data['tahun_terbit'];
                        $penerbit = $data['nama_penerbit']; 
                        $rak = $data['rak'];
                        $stok = $data['stok']; ?>
             <br>
             <div class="card" style="width: 18rem;">
                <img src="img/<?php echo $gambar; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $nama; ?></h5>
                    <p class="card-text"><?php echo $id; ?></p>
                    <p class="card-text"><?php echo $penulis; ?></p>
                    <p class="card-text"><?php echo $tahun_terbit; ?></p>
                    <p class="card-text"><?php echo $penerbit; ?></p>
                    <p class="card-text"><?php echo $rak; ?></p>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary"><a href="#form-peminjaman">Pinjam</a></button>
                </div>
            </div>
        <?php $no++; }; 
        $hitung = mysqli_query($conn,"SELECT * FROM tb_buku") or die (mysqli_error($conn));
        $jmldata = mysqli_num_rows($hitung);
        ?>
        <br>
        <center><?php
            $jmlhalaman = ceil($jmldata/$batas);
            for($i=1; $i<=$jmlhalaman; $i++){
                echo '<a class="page" href="?halaman='.$i.'">'.$i.'</a>';
            } } ?></center>
    </div>
    <br><br><hr>

    <div id="form-peminjaman">
        <center><h1>Form Peminjaman Buku</h1><br>
        <form  action="proses_pinjam.php" method="post">
        <table>
            <tr>
            <td></td>
            <td><input type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $_SESSION['id'];?>"></td>
            </tr>
            <tr>
            <td>Nama Peminjam</td>
            <td><input type="text" id="nama" name="nama" value="<?php echo $_SESSION['nama'];?>"></td>
            </tr>
            <tr>
            <td>Judul Buku</td>
            <td><input type="text" id="judul" name="judul" placeholder="Masukan Judul Buku"></td>
            </tr>
            <tr>
            <td>Kode Buku</td>
            <td><input type="text" id="kode" name="kode" placeholder="Masukan Kode Buku"></td>
            </tr>
            <tr>
            <td>Tanggal Pinjam</td>
            <td><input type="date" id="tanggal" name="tanggal"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Pinjam"></td>
            </tr>
        </table>
    </form></center>
    </div>

    <br><br><br><hr><br><br>

    <!-- Modal Popup untuk Edit User Profile-->
    <?php 
            $id = $_SESSION['id'];
            $sql = mysqli_query($conn, "SELECT * FROM tb_user WHERE id='$id'")or die (mysqli_error($conn));
            $data = mysqli_fetch_assoc($sql);?>
    <div id="edit"class="modal fade" style="display:none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Profile </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-peminjaman">
                            <form id="defaultForm" action="edit_profile.php?act=edit" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <table>
                                <td></td>
                                <td><input type="hidden" id="id" name="id" width="100%" value="<?php echo $data['id'];?>"></td>
                                </tr>
                                <td>Nama</td>
                                <td><input type="text" id="nama" name="nama" width="100%" value="<?php echo $data['nama'];?>"></td>
                                </tr>
                                <td>Username</td>
                                <td><input type="text" id="username" name="username" width="100%" value="<?php echo $data['username'];?>"></td>
                                </tr>
                                <td>Password</td>
                                <td><input type="text" id="password" name="password" width="100%" value="<?php echo $data['passwords'];?>"></td>
                                </tr>
                                <tr>
                                <td>Tanggal Lahir</td>
                                <td><input type="date" id="tgl" name="tgl" width="100%" value="<?php echo $data['tanggal_lahir']; ?>"></td>
                                </tr>
                                <td>Jenis Kelamin</td>
                                <td><input type="text" id="jk" name="jk" width="100%" readonly value="<?php echo $data['jenis_kelamin'];?>"></td>
                                </tr>
                                <td>Alamat</td>
                                <td><input type="text" id="alamat" name="alamat" width="100%" value="<?php echo $data['alamat'];?>"></td>
                                </tr>
                                <tr>
                                <td>No Telpon</td>
                                <td><input type="text" id="tlp" name="tlp" width="100%" value="<?php echo $data['no_tlp'];?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="submit" value="Simpan"></td>
                                </tr>
                            </table>
                            </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div><!-- tutup modal input -->

    <div id="sectionTentang">
        <h1>About Us</h1>
        <p style="text-align:justify; width:90%;"><img src="img/perpus.jpg" style="float:left; margin: 0px 20px 20px 0px;">
            Perpustakaan adalah sebuah koleksi buku dan majalah. Walaupun dapat diartikan sebagai koleksi pribadi perseorangan, 
            namun perpustakaan lebih umum dikenal sebagai sebuah koleksi besar yang dibiayai dan dioperasikan oleh sebuah kota atau institusi, 
            serta dimanfaatkan oleh masyarakat yang rata-rata tidak mampu membeli sekian banyak buku dengan biaya sendiri.
            Tetapi, dengan koleksi dan penemuan media baru selain buku untuk menyimpan informasi, banyak perpustakaan kini juga merupakan 
            tempat penyimpanan dan/atau akses ke map, cetak atau hasil seni lainnya, mikrofilm, mikrofiche, tape audio, CD, LP, tape video dan 
            DVD. Selain itu, perpustakaan juga menyediakan fasilitas umum untuk mengakses gudang data CD-ROM dan internet.
            Perpustakaan dapat juga diartikan sebagai kumpulan informasi yang bersifat ilmu pengetahuan, hiburan, rekreasi, dan ibadah yang 
            merupakan kebutuhan hakiki manusia.
            Oleh karena itu perpustakaan modern telah didefinisikan kembali sebagai tempat untuk mengakses informasi dalam format apapun, 
            apakah informasi itu disimpan dalam gedung perpustakaan tersebut ataupun tidak. Dalam perpustakaan modern ini selain kumpulan 
            buku tercetak, sebagian buku dan koleksinya ada dalam perpustakaan digital (dalam bentuk data yang bisa diakses lewat jaringan 
            komputer.</p>
    </div>
    <hr>
    <div id="sectionKontak">
        <h1>Kontak</h1>
        <div class="card">
            <img src="img/buku2.jpg?>" width="300" height="250">
            <h2>Hubungi Kami Melalui</h2>
            <p>Email : <a href="mailto:ayuindra182@gmail.com">ayuindra182@gmail.com</a></p>
            <p>Telepon : <a href="tel:08123456789">08123456789</a></p>
            <p>Alamat : Bukit Jimbaran Bali</p>
        </div>
    </div>

    <footer>
            @copyright 2020 - Ayu Indra
    </footer>


    <!-- Modal
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> 
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
    <script type="text/javascript">
    
    
        $(document).ready(function(){
            $('#exampleModal').on('show.bs.modal', function (e) {
                var getDetail = $(this).data('id');
                //fungsi AJAX untuk melakukan fetch data 
                $.ajax({
                    type : 'post',
                    url : 'dataBuku.php',
                    //detail per identifier ditampung pada berkas detail.php yang berada di folder application/view 
                    //data :  'getDetail='+ getDetail,
                    data:{getDetail : getDetail},
                    //memanggil fungsi getDetail dan mengirimkannya 
                    success : function(data){
                        $('.modal-body').html(data); //menampilkan data dalam bentuk dokumen HTML 
                    }
                });
            });
        }); 
  </script> -->

</body>
</html>