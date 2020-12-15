<!DOCTYPE html>
<html>
<head>
	<title>Data</title>
	<link rel="stylesheet" type="text/css" href=css/daftar.css />
</head>
<body>
<center>
	<div class="judul">
		<h1>Data Mahasiswa</h1>
	</div><br>
	<table width="80%" border="3" align="center" cellpadding="4" cellspacing="4" margin = "10%">
		<thead>
			<tr>
				<th>NIM</th>
				<th>Nama Lengkap</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>No Telpon</th>
				<th>Alamat</th>
				<th>Action</th>
			</tr>
		</thead>
	<?php
		include "koneksi.php";	
		$tampil = mysqli_query($conn, "SELECT *FROM tabel_mahasiswa ORDER BY nim ASC") or die (mysqli_error());

		while ($row = mysqli_fetch_array($tampil)) {?>
			
			<tr>
				<td><?php echo $row['nim']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['tanggal_lahir']; ?></td>
				<td><?php echo $row['jenis_kelamin']; ?></td>
				<td><?php echo $row['no_tlp']; ?></td>
				<td><?php echo $row['alamat']; ?></td> 
				<td align= "center">
					<a href="edit.php?nim=<?php echo $row['nim'];?>"><button>EDIT</button></a>
					<a href="hapus.php?nim=<?php echo $row['nim']; ?>"><button>DELETE</button></a>
				</td>
			</tr>
		<?php } ?>
	</table><br>
	<div id = "sambung">
		<a href="input.php"><button>Input Data</button></a>
	</div>	
	</center>
</body>
</html>