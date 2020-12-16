<?php
	include "koneksi.php";
	$nim = $_GET['nim'];
	$hapus = mysqli_query($conn, "DELETE FROM tabel_mahasiswa WHERE nim ='$nim'") or die(mysql_error());
	header("location:tampil data.php"); 
?>