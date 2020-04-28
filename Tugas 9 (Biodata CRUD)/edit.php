<!DOCTYPE html>
<html>
<head>
	<title>EDIT DATA MAHASISWA</title>
	<link rel="stylesheet" type="text/css" href="css/edit.css">
</head>
<body>
	<div class="heading">
		Edit Data Mahasiswa
	</div>
	<?php
		include "koneksi.php";
		$nim = $_GET['nim'];
		$query = "SELECT * FROM tabel_mahasiswa WHERE nim = '$nim'";	
		$tampil = mysqli_query($conn,$query) or die (mysqli_error());
		$row = mysqli_fetch_array($tampil);	
	?>
	<div class="kotak">
	<form action="tampil data.php" method="post">
			<table width="90%" height="40px">
				<tr>
					<td>Nama</td>
					<td>
						<input type="hidden" name="nim" value="<?php echo $row['nim'] ?>">
						<input type="text" name="nama" value="<?php echo $row['nama'] ?>">
					</td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>
						<input type="date" name="tgl_lahir" value="<?php echo $row['tanggal_lahir'] ?>">
					</td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>
						<input type="radio" name="jenis_kelamin" value="<?php echo $row['jenis_kelamin'] ?>">Laki-laki<br>
						<input type="radio" name="jenis_kelamin" value="<?php echo $row['jenis_kelamin'] ?>">Perempuan<br>
					</td>
				</tr>
				<tr>
					<td>No Telpon</td>
					<td>
						<input type="text" name="no_tlp" value="<?php echo $row['no_tlp'] ?>">
					</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>
						<input type="text" name="alamat" value="<?php echo $row['alamat'] ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="simpan" value="Simpan Perubahan"></td>
				</tr>					
			</table>
		</form>	
		</div>	
	<?php
		include 'koneksi.php';
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$nim  = $_POST['nim'];
		$nama = $_POST['nama'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$jenis_kelamin  = $_POST['jenis_kelamin'];
		$no_tlp = $_POST['no_tlp'];
		$alamat = $_POST['alamat'];
		$query = "UPDATE tabel_mahasiswa SET nama = '$nama', tanggal_lahir = '$tgl_lahir', jenis_kelamin = 'jenis_kelamin', no_tlp = 'no_tlp', alamat = '$alamat' WHERE nim = '$nim'";
		//mysqli_select_db("simak", $conn);	
		mysqli_query($query) or die (mysqli_error());
		
	?>				
</body>
