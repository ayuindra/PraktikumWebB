<?php
include 'koneksi.php';
session_start(); //mengaktifkan session

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE
                               username = '$username' AND 
                               password = '$password'");
$hitung = mysqli_num_rows($query);

if($hitung > 0){
    $data = mysqli_fetch_assoc($query);
    if($data['level'] == "Admin"){
        $nama = $data['nama'];
        $_SESSION['nama'] = $nama;
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Admin";
        echo "<script>alert('$nama Login Sebagai Admin');
	          document.location.href='index.php'</script>\n";
    }
    else if($data['level'] == "Mahasiswa"){
        $nama = $data['nama'];
        $_SESSION['nama'] = $nama;
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Mahasiswa";
        echo "<script>alert('$nama Login Sebagai Mahasiswa');
	          document.location.href='index.php'</script>\n";
    }
    else if($data['level'] == "Dosen"){
        $nama = $data['nama'];
        $_SESSION['nama'] = $nama;
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Dosen";
        echo "<script>alert('$nama Login Sebagai Dosen');
	          document.location.href='index.php'</script>\n";
    }
    else if($data['level'] == "Pegawai"){
        $nama = $data['nama'];
        $_SESSION['nama'] = $nama;
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Pegawai";
        echo "<script>alert('$nama Login Sebagai Pegawai');
	          document.location.href='index.php'</script>\n";
    }
    else{
        echo "<script>alert('Anda Gagal Melakukan Login, Ulangi Kembali');
	          document.location.href='index.php'</script>\n";
    }
}
else{
    echo "<script>alert('Anda Gagal Melakukan Login, Ulangi Kembali');
	          document.location.href='index.php'</script>\n";; 
}
?>