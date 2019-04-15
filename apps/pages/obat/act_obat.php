<?php
	session_start();
	include "../../lib/conn.php";
	
	if(!isset($_SESSION['login_user'])){
		header('location: ../../login.php'); // Mengarahkan ke Home Page
	}

	if(isset($_GET['page']) && isset($_GET['act']))
	{
		$mod = $_GET['page'];
		$act = $_GET['act'];
	}
	else
	{
		$mod = "";
		$act = "";
	}

	if($mod == "obat" AND $act == "simpan")
	{
		//variable input
		
		$kode_obat= $_POST['kode_obat'];
		$nama_obat= $_POST['nama_obat'];
		$jenis_obat= $_POST['jenis_obat'];

		mysqli_query($conn, "INSERT INTO obat(
										kode_obat, 
										nama_obat, 
										jenis_obat)
									VALUES (
										'$kode_obat', 
										'$nama_obat', 
										'$jenis_obat')") ;
		echo"<script>
			window.history.go(-2);
		</script>";
	}

	elseif ($mod == "obat" AND $act == "edit") 
	{
		//variable input
		$idObat = trim($_POST['id']);
		$kode_obat= $_POST['kode_obat'];
		$nama_obat= $_POST['nama_obat'];
		$jenis_obat= $_POST['jenis_obat'];

		mysqli_query($conn, "UPDATE obat SET 
										kode_obat= '$kode_obat', 
										nama_obat= '$nama_obat', 
										jenis_obat= '$jenis_obat' 
					WHERE idObat = '$_POST[id]'");

		echo"<script>
			window.history.go(-2);
		</script>";
	}

	elseif ($mod == "obat" AND $act == "hapus") 
	{
		mysqli_query($conn, "DELETE FROM obat WHERE idObat = '$_GET[id]'");
		echo"<script>
			window.history.back();
		</script>";	
	}

?>