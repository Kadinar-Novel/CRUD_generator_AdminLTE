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
		mysql_query("INSERT INTO menu(nama_menu, posisi)
									VALUES ('$_POST[nama_menu]', '$_POST[posisi]')") or die(mysql_error());
		flash('example_message', '<p>Berhasil menambah data biaya.</p>' );

		echo"<script>
			window.history.go(-2);
		</script>";
	}

	elseif ($mod == "menu" AND $act == "edit") 
	{
		mysql_query("UPDATE menu SET nama_menu= '$_POST[nama_menu]', posisi= '$_POST[posisi]' WHERE id_menu = '$_POST[id]'") or die(mysql_error());

		flash('example_message', '<p>Berhasil mengubah data biaya.</p>');

		echo"<script>
			window.history.go(-2);
		</script>";
	}

	elseif ($mod == "menu" AND $act == "hapus") 
	{
		mysql_query("DELETE FROM menu WHERE id_menu = '$_GET[id]'") or die(mysql_error());
		flash('example_message', '<p>Berhasil menghapus data biaya kuliah.</p>' );
		echo"<script>
			window.history.back();
		</script>";	
	}

?>