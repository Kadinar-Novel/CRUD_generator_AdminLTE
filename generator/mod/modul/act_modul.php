<?php
	session_start();
	include"../../lib/conn.php";
	//include"../../lib/fungsi_flash.php";

	if(isset($_GET['mod']) && isset($_GET['act']))
	{
		$mod = $_GET['mod'];
		$act = $_GET['act'];
	}
	else
	{
		$mod = "";
		$act = "";
	}

	if($mod == "modul" AND $act == "simpan")
	{
		$link_menu = "index.php?page=".$_POST['link_menu'];	
		$link_folder = "pages/".$_POST['link_menu']."/".$_POST['link_menu'].".php";	
		mysqli_query($conn,"INSERT INTO modul(id_menu, nama_modul, link_menu, link_folder, posisi, icon_menu)
									VALUES ('$_POST[id_menu]', '$_POST[nama_modul]', '$link_menu', '$link_folder', '$_POST[posisi]', '$_POST[icon_menu]')") or die(mysql_error());
		//flash('example_message', '<p>Berhasil menambah modul.</p>' );

		echo"<script>
			window.history.go(-2);
		</script>";
	}

	elseif ($mod == "modul" AND $act == "edit") 
	{
		mysqli_query($conn,"UPDATE modul SET id_menu= '$_POST[id_menu]', nama_modul= '$_POST[nama_modul]', posisi= '$_POST[posisi]', icon_menu= '$_POST[icon_menu]' WHERE id_modul = '$_POST[id]'") or die(mysql_error());

		//flash('example_message', '<p>Berhasil mengubah modul.</p>');

		echo"<script>
			window.history.go(-2);
		</script>";
	}

	elseif ($mod == "modul" AND $act == "hapus") 
	{
		mysqli_query($conn,"DELETE FROM modul WHERE id_modul = '$_GET[id]'") or die(mysql_error());
		//flash('example_message', '<p>Berhasil menghapus modul.</p>' );
		echo"<script>
			window.history.back();
		</script>";	
	}

?>