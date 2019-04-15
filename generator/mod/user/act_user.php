<?php
	session_start();
	include"../../lib/conn.php";

	if(!isset($_SESSION['login_user'])){
		header('location: ../../login.php'); // Mengarahkan ke Home Page
	}

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

	if ($mod == "user" AND $act == "edit") {
		if(empty($_POST['passwd']))
		{
			mysqli_query($conn,"UPDATE user SET nama_lengkap = '$_POST[nama_lengkap]',
										usernm = '$_POST[usernm]',
										level = '$_POST[level]'
						WHERE id_user = '$_POST[id]'") or die(mysql_error());
			flash('example_message', '<p>Berhasil menambah data user.</p>' );

			echo"<script>
				window.history.go(-2);
			</script>";
		}
		else
		{
			if ($_POST['passwd'] == $_POST['rpasswd']) {
				$pass = md5($_POST['passwd']);
				mysqli_query($conn,"UPDATE user SET nama_lengkap = '$_POST[nama_lengkap]',
										usernm = '$_POST[usernm]',
										passwd = '$pass',
										level = '$_POST[level]'
						WHERE id_user = '$_POST[id]'") or die(mysql_error());
				flash('example_message', '<p>Berhasil mengubah data user.</p>' );

				echo"<script>
					window.history.go(-2);
				</script>";
			}
			else
			{
				flash('example_class', '<p>Password tidak sama..</p>', 'w3-red');

				echo"<script>
					window.history.back();
				</script>";
			}
		}
	}
	elseif($mod == "user" AND $act == "simpan")
	{
		if(!empty($_POST['passwd']))
		{
			if ($_POST['passwd'] == $_POST['rpasswd']) {
				$pass = md5($_POST['passwd']);
				mysqli_query($conn,"INSERT INTO user(nama_lengkap,
										usernm,
										passwd,
										level)
									VALUES('$_POST[nama_lengkap]',
											'$_POST[usernm]',
											'$pass',
											'$_POST[level]')") or die(mysql_error());
				flash('example_message', '<p>Berhasil menambah data user.</p>' );

				echo"<script>
					window.history.go(-2);
				</script>";
			}
			else
			{
				flash('example_class', '<p>Password tidak sama..</p>', 'w3-red');

				echo"<script>
					window.history.back();
				</script>";
			}
		}
		else
		{
			flash('example_class', '<p>Password Kosong</p>', 'w3-yellow');

			echo"<script>
				window.history.back();
			</script>";
		}
		
	}

?>