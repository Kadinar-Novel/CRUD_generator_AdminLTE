<?php
include "lib/conn.php";
$error=''; // Variabel untuk menyimpan pesan error
if (isset($_POST['submit'])) {
	
		$username=$_POST['username'];
		$password=$_POST['password'];
		$pass = md5($password);		
		$query = mysqli_query($conn, "SELECT * FROM user WHERE passwd='$pass' AND usernm='$username'");
        $rows = mysqli_num_rows($query);
       if ($rows == 1) {
            session_start();
			$a = mysqli_fetch_assoc($query);
			$_SESSION['login_user']=$username; // Membuat Sesi/session
			$_SESSION['login_id'] = $a['iduser'];
			$_SESSION['level'] = $a['level'];
			$_SESSION['nama'] = $a['nama_lengkap'];
			mysqli_query($conn, "UPDATE user SET last_login = NOW() WHERE id_user = '$a[id_user]'");
			header("Location: index.php"); // Mengarahkan ke halaman profil
		} else {
            $error = "Username atau Password salah.";
            header("Location: login.php");
		}
	
}
?>