<li class="treeview">
        <?php
            $sql_menu = mysqli_query($conn, "SELECT * FROM menu ORDER BY id_menu ASC");
            while ($mn = mysqli_fetch_assoc($sql_menu)) {
                echo"
                <a href='#'
                  <i class='fa fa-edit'></i> <span>$mn[nama_menu]</span>
                  <span class='pull-right-container'>
                    <i class='fa fa-angle-left pull-right'></i>
                  </span>
                </a>";

                echo "SELECT * FROM modul WHERE id_menu = '$mn[id_menu]' ORDER BY posisi ASC";
                
                $sql_sub = mysqli_query($conn, "SELECT * FROM modul 
                    WHERE id_menu = '$mn[id_menu]' ORDER BY posisi ASC");
                while ($sm = mysqli_fetch_assoc($sql_sub)) {
                  echo "<ul class='treeview-menu'>
                          <li><a href=\"$sm[link_menu]\"><i class=\"$sm[icon_menu]\"></i> $sm[nama_modul]</a></li>
                        </ul>";
                }

            }
        ?>  
        </li>