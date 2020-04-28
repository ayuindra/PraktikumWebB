<!DOCTYPE html>
<html>
<head>
	<title>Biodata Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href=css/daftar.css />
</head>
<body>
	<div class="heading">
		Pendaftaran Mahasiswa
	</div>
	<div class="kotak-form">
		<?php
			include "koneksi.php";
			if(isset($_POST['daftar1'])) {
				$query = "INSERT INTO tabel_mahasiswa (nim, nama, tanggal_lahir, jenis_kelamin, no_tlp, alamat) VALUES
						('".$_POST['nim']."',
					     '".$_POST['nama']."',
					     '".$_POST['tgl_lahir']."',
					     '".$_POST['jenisKelamin']."',
					     '".$_POST['noTlp']."',
					     '".$_POST['alamat']."''')";			
				$Ddaftar = mysqli_query($conn, $query) or die (mysqli_error());
				if($Ddaftar) {
					echo "Anda Berhasil Mendaftar";
				}
				else {
					echo "Mohon Maaf, Anda Gagal Mendaftar";
				}
			}
		?>
		<form action="" method="post">
			NIM Mahasiswa<br>
			<input type="text" name="nim" value="" /><br>
			Nama Lengkap<br>
			<input type="text" name="nama" value="" /><br> 
			Tanggal Lahir<br>
			<input type="date" name="tgl_lahir" required /><br>
			Jenis Kelamin<br>
			<input type="radio" name="jenisKelamin" value="Laki-laki" />Laki-laki<br>
			<input type="radio" name="jenisKelamin" value="Perempuan" />Perempuan<br>
			No Telepon<br>
			<input type="text" name="noTlp" required /><br>
			Alamat<br>
			<textarea name="alamat" rows="4" cols="50" required /></textarea><br>
			<input type="submit" name="daftar1" Value="Daftar" /><br>
		</form>
		<div id = "sambung">
			<a href="tampil data.php"><button>Data Mahasiswa</button></a>
		</div>
	</div>
</body>
</html>