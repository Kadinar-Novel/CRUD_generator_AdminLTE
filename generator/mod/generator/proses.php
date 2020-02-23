<?php
	

	if(isset($_POST['submit']))
	{
		//set data
		$nama_table = safe($_POST['nmtable']);
		$mod = safe($_POST['nmtable']);
		$act = "act_".$mod;
		$api = "api_".$mod;
		$nama_folder = $mod;

		$nama_header = $_POST['nmtitle'];
		$desc_header = $_POST['desc'];

		//nama file
		$file1 = $mod.".php";
		$file2 = $act.".php";
		$file3 = $api.".php";

		//create folder
		if (!file_exists("../apps/pages/" . $nama_folder))
        {
        	umask(0);
            mkdir("../apps/pages/" . $nama_folder, 0777, true);
        }

		$pk = $hc->primary_field($nama_table);
        $non_pk = $hc->not_primary_field($nama_table);
        $all = $hc->all_field($nama_table);


        //generate
        include "create_mod.php";
        include "create_mod_aksi.php";
        include "create_mod_api.php";


	}

?>