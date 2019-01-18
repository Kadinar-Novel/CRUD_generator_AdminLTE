<?php

$string = "<?php
	session_start();
	include \"../../lib/conn.php\";
	
	if(!isset(\$_SESSION['login_user'])){
		header('location: ../../login.php'); // Mengarahkan ke Home Page
	}

	if(isset(\$_GET['page']) && isset(\$_GET['act']))
	{
		\$mod = \$_GET['page'];
		\$act = \$_GET['act'];
	}
	else
	{
		\$mod = \"\";
		\$act = \"\";
	}

	if(\$mod == \"".$mod."\" AND \$act == \"simpan\")
	{
		//variable input
		";
		$arr = array();
		$arr2 = array();
		foreach ($non_pk as $row) {
			$arr[] = "\n\t\t\t\t\t\t\t\t\t\t".$row['column_name'];
			$arr2[] = "\n\t\t\t\t\t\t\t\t\t\t'\$".$row['column_name']."'";
			$string .= "\n\t\t\$".$row['column_name']."= \$_POST['".$row['column_name']."'];";
		}

		$string .="\n\n\t\tmysqli_query(\$conn, \"INSERT INTO ".$nama_table."(";
									$string .= implode(", ", $arr);
									$string .=")
									VALUES (";
									$string .= implode(", ", $arr2);
									$string .=")\") ;
		echo\"<script>
			window.history.go(-2);
		</script>\";
	}

	elseif (\$mod == \"".$mod."\" AND \$act == \"edit\") 
	{
		//variable input
		\$".$pk." = trim(\$_POST['id']);";
		$arr3 = array();
		foreach ($non_pk as $row) {
			$arr3[] = "\n\t\t\t\t\t\t\t\t\t\t".$row['column_name']."= '\$".$row['column_name']."'";
			$string .= "\n\t\t\$".$row['column_name']."= \$_POST['".$row['column_name']."'];";
		}

		$string .= "\n\n\t\tmysqli_query(\$conn, \"UPDATE ".$nama_table." SET ";
						$string .= implode(", ", $arr3);
					$string .= " 
					WHERE ".$pk." = '\$_POST[id]'\");

		echo\"<script>
			window.history.go(-2);
		</script>\";
	}

	elseif (\$mod == \"".$mod."\" AND \$act == \"hapus\") 
	{
		mysqli_query(\$conn, \"DELETE FROM ".$nama_table." WHERE ".$pk." = '\$_GET[id]'\");
		echo\"<script>
			window.history.back();
		</script>\";	
	}

?>";


createFile($string, "../apps/pages/" . $nama_folder . "/" . $file2);

?>