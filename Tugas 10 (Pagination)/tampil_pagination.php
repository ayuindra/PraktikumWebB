<!DOCTYPE html>
<html>
<head>
    <title>Menu Dessert</title>
    <link rel="stylesheet" type="text/css" href=tampil_pagination.css />
</head>
<body>
<center>
    <h1>Our Popular Dessert</h1>
    <h4>Ayu Made Surya Indra Dewi/1708561027</h4><hr/><br><br><br><br>
    <table border="10" bordercolor="white">
        <?php
            include 'koneksi.php';
            $batas = 3;
            $page = isset($_GET['halaman'])?(int)$_GET["halaman"] : 1;
            $mulai = ($page>1) ? ($page * $batas) - $batas : 0;
            $tampil = mysqli_query($conn, "SELECT * FROM menu_dessert ORDER BY id ASC LIMIT $mulai, $batas") or die (mysqli_error($conn));
            $no = $mulai+1;
            while($data = mysqli_fetch_array($tampil)) { 
                $id = $data["id"];
                $gambar = $data['image'];
                $nama = $data['nama_dessert']; ?>
                    
                <td>
                    <img src = "img/<?php echo $gambar; ?>" class="card-img-top" width="300" height="300"><br>
                    <h3><?php echo $nama; ?></h3>
                </td>
                    
            <?php $no++; }; ?>
    </table>
    <?php
        $hitung = mysqli_query($conn,"SELECT * FROM menu_dessert") or die (mysqli_error($conn));
        $jmldata    = mysqli_num_rows($hitung);
  
    ?>
    <br>
    <?php
        $jmlhalaman = ceil($jmldata/$batas);
        for($i=1; $i<=$jmlhalaman; $i++){
            echo '<a class="page" href="?halaman='.$i.'">'.$i.'</a>';
        }
    ?>
</center>
</body>
</html>