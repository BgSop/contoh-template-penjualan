<?php 
	include "admin/koneksi.php";
	$user 	= mysqli_real_escape_string($koneksi, $_POST['username']);
	$pass	= mysqli_real_escape_string($koneksi, md5($_POST['password']));

	$sql	= mysqli_query($koneksi, "SELECT * FROM tbl_login WHERE username='$user' AND password='$pass'");
	$data	= mysqli_fetch_array($sql);

	if(mysqli_num_rows($sql) > 0){
		session_start();
		$_SESSION['id']				= $data['id_user'];
		$_SESSION['nama_lengkap']				= $data['nama_lengkap'];
		$_SESSION['username']				= $data['username'];
		$_SESSION['password']				= $data['password'];
		$_SESSION['level']				= $data['level'];

		echo "<script>
		alert('Selamat Datang $_SESSION[nama_lengkap]');
		window.location='admin/pages/index.php';
		</script>";
	}else{
		echo "<script>
		alert('Username atau Password Anda Salah!');
		window.location='index.php';
		</script>";
	}

?>