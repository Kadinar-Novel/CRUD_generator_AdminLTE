<!DOCTYPE html>
<html>
<head>
  <?php 
    session_start();
    include "session.php";
    include "lib/conn.php";
    include 'script.php';
  ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs glyphicon glyphicon-user" > <?php echo $_SESSION['nama'];?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>
        <?php
            $sql_menu = mysqli_query($conn, "SELECT * FROM menu ORDER BY id_menu ASC");
            while ($mn = mysqli_fetch_assoc($sql_menu)) {
                echo"
                <li class='treeview'>
                <a href='#'
                  <i class='fa fa-edit'></i> <span>$mn[nama_menu]</span>
                  <span class='pull-right-container'>
                    <i class='fa fa-angle-left pull-right'></i>
                  </span>
                </a>
                <ul class='treeview-menu'>";
                $sql_sub = mysqli_query($conn, "SELECT * FROM modul 
                    WHERE id_menu = '$mn[id_menu]' ORDER BY posisi ASC");
                while ($sm = mysqli_fetch_assoc($sql_sub)) {
                  echo "
                          <li><a href=\"$sm[link_menu]\"><i class=\"$sm[icon_menu]\"></i> $sm[nama_modul]</a></li>
                        ";
               }
              echo "
              </ul>
              </li>
              ";
            }
        ?>  
      </ul>
    </section>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <?php
            include "content.php";
          ?>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
<?php
    include "script_under.php";
?>
</body>
</html>
