<?php
	// Include file koneksi
	include "../lib/conn.php";
	include "../lib/zip.php";
	
	session_start();// Memulai Session
	// Menyimpan Session
	$user_check = $_SESSION['login_user'];
	// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc
	$ses_sql=mysql_query("select nama_lengkap from user where usernm = '$user_check'", $conn);
	$row = mysql_fetch_assoc($ses_sql);
	$login_session = $row['nama_lengkap'];

	if(!isset($login_session)){
		mysql_close($conn); // Menutup koneksi
		header('location: logout.php'); // Mengarahkan ke Home Page
	}
?>