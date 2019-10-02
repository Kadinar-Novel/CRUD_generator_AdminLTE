<?php
	session_start();
	include"../../lib/conn.php";

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

	if($mod == "menu" AND $act == "simpan")
	{
		mysqli_query($conn,"INSERT INTO menu(nama_menu, posisi)
									VALUES ('$_POST[nama_menu]', '$_POST[posisi]')") or die(mysqli_error());
		//flash('example_message', '<p>Berhasil menambah data biaya.</p>' );

		echo"<script>
			window.history.go(-2);
		</script>";
	}

	elseif ($mod == "menu" AND $act == "edit") 
	{
		mysqli_query($conn,"UPDATE menu SET nama_menu= '$_POST[nama_menu]', posisi= '$_POST[posisi]' WHERE id_menu = '$_POST[id]'") or die(mysqli_error());

		//flash('example_message', '<p>Berhasil mengubah data biaya.</p>');

		echo"<script>
			window.history.go(-2);
		</script>";
	}

	elseif ($mod == "menu" AND $act == "hapus") 
	{
		mysqli_query($conn,"DELETE FROM menu WHERE id_menu = '$_GET[id]'") or die(mysqli_error());
		//flash('example_message', '<p>Berhasil menghapus data biaya kuliah.</p>' );
		echo"<script>
			window.history.back();
		</script>";	
	}

?>