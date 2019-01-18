<?php
    include "lib/conn.php";
    ini_set('display_errors',0);
    if(isset($_GET['page']))
    {
        $mod = $_GET['page'];
        $sql_menu = mysqli_query($conn, "SELECT * FROM modul ORDER BY id_modul ASC") or die(mysql_error());
        while ($mn = mysqli_fetch_assoc($sql_menu)) {
            if($mod == substr( $mn['link_menu'],15))
            {
                include $mn['link_folder'];
            }
        }
    }
    else
    {
        include "dashboard.php";
    }
?>