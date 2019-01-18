<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "db_apps";

	$base_url = "";

	$conn = mysql_connect($host, $user, $pass) or die("Tidak terkoneksi ke server!");
	if ($conn) {
		$dbselect = mysql_select_db($db, $conn) or die("Tidak terhubung ke Database.");
	}

	include"fungsi_flash.php";
?>