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

	if($mod == "data_laporan" AND $act == "simpan")
	{
		//variable input
		
		$kode= $_POST['kode'];
		$uraian= $_POST['uraian'];
		$pagu= $_POST['pagu'];
		$realisasi= $_POST['realisasi'];
		$sisa= $_POST['sisa'];
		$kode_dipa= $_POST['kode_dipa'];
		$bulan= $_POST['bulan'];
		$tahun= $_POST['tahun'];
		$tgl= $_POST['tgl'];
		$modtime= $_POST['modtime'];

		mysqli_query($conn, "INSERT INTO data_laporan(
										kode, 
										uraian, 
										pagu, 
										realisasi, 
										sisa, 
										kode_dipa, 
										bulan, 
										tahun, 
										tgl, 
										modtime)
									VALUES (
										'$kode', 
										'$uraian', 
										'$pagu', 
										'$realisasi', 
										'$sisa', 
										'$kode_dipa', 
										'$bulan', 
										'$tahun', 
										'$tgl', 
										'$modtime')") ;
		echo"<script>
			window.history.go(-2);
		</script>";
	}

	elseif ($mod == "data_laporan" AND $act == "edit") 
	{
		//variable input
		$id = trim($_POST['id']);
		$kode= $_POST['kode'];
		$uraian= $_POST['uraian'];
		$pagu= $_POST['pagu'];
		$realisasi= $_POST['realisasi'];
		$sisa= $_POST['sisa'];
		$kode_dipa= $_POST['kode_dipa'];
		$bulan= $_POST['bulan'];
		$tahun= $_POST['tahun'];
		$tgl= $_POST['tgl'];
		$modtime= $_POST['modtime'];

		mysqli_query($conn, "UPDATE data_laporan SET 
										kode= '$kode', 
										uraian= '$uraian', 
										pagu= '$pagu', 
										realisasi= '$realisasi', 
										sisa= '$sisa', 
										kode_dipa= '$kode_dipa', 
										bulan= '$bulan', 
										tahun= '$tahun', 
										tgl= '$tgl', 
										modtime= '$modtime' 
					WHERE id = '$_POST[id]'");

		echo"<script>
			window.history.go(-2);
		</script>";
	}

	elseif ($mod == "data_laporan" AND $act == "hapus") 
	{
		mysqli_query($conn, "DELETE FROM data_laporan WHERE id = '$_GET[id]'");
		echo"<script>
			window.history.back();
		</script>";	
	}

?>