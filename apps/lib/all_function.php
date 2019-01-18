<?php


	function nama_m($id)
	{
		$sql = mysql_query("SELECT * FROM menu WHERE id_menu = '$id'") or die(mysql_error());
		$m = mysql_fetch_assoc($sql);

		return $m['nama_menu'];
	}

	function anti_inject($data)
	{
		$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
		return $filter_sql;
	}



?>