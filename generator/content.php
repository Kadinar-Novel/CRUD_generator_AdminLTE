<?php
    include "class/paging.php";
    include "lib/fungsi_indotgl.php";
    include "lib/all_function.php";
    
    if(isset($_GET['mod']))
    {
		$mod = $_GET['mod']; //modul yang akan ditampilkan
        if ($mod == "home") {
            include "dashboard.php";
        }
        elseif($mod == "user")
        {
            include "mod/user/user.php";
        }
        elseif($mod == "menu")
        {
            include "mod/menu/menu.php";
        }
        elseif($mod == "modul")
        {
            include "mod/modul/modul.php";
        } 
		elseif($mod == "bantuan")
        {
            include "mod/bantuan/bantuan.php";
        }
		elseif($mod == "generator")
        {
            include "mod/generator/index.php";
        }

    }
    else
    {
        header("location:index.php");
    }
?>