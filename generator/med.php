<?php
  include "lib/conn.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD GENERATOR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="js/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.css">

    <link rel="shortcut icon" href="favicon.ico" />
    <style>
    .w3-theme {color:#fff !important;background-color:#4CAF50 !important;}
    .w3-btn {background-color:#4CAF50 ;margin-bottom:4px;}
    .w3-code{border-left:4px solid #4CAF50}
    @media only screen and (max-width: 601px) {.w3-top{position:static;} #main{margin-top:0px !important}}


    .tbl th.header { 
        background-image: url(js/table.sorter/themes/blue/bg.gif);
        cursor: pointer; 
        font-weight: bold; 
        background-repeat: no-repeat; 
        background-position: center left; 
        padding-left: 20px; 
        margin-left: -1px; 
    }

    .tbl th.headerSortUp { 
      background-image: url(js/table.sorter/themes/blue/asc.gif);
      cursor: pointer; 
        font-weight: bold; 
        background-repeat: no-repeat; 
        background-position: center left; 
        padding-left: 20px; 
        margin-left: -1px; 

    } 
    .tbl th.headerSortDown { 
      background-image: url(js/table.sorter/themes/blue/desc.gif);
      cursor: pointer; 
        font-weight: bold; 
        background-repeat: no-repeat; 
        background-position: center left; 
        padding-left: 20px; 
        margin-left: -1px; 
    }
    #flash {
        position:absolute;
        top:0px;
        left:0px;
        z-index:5000;
        width:100%;
        height:500px;
        background-color:#c00;
        display:none;
    }
 
    .ui-datepicker {
        font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
        font-size: 80.5%;
    }
    .ui-tooltip-content {
        font-size: 80.5%;
    }

    .display {
        font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
        font-size: 80.5%;   
    }


    </style>
    <script src="js/jquery-1.12.2.min.js"></script>
    <script src="js/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/jquery.number.js"></script>
    <script src="js/table.sorter/jquery.tablesorter.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/w3codecolors.js"></script>

    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>

</head>
<body>

<div class="w3-top">

<div class="w3-row w3-white w3-padding">
  <div class="w3-half" style="margin:17px 0 2px 0"><b>CRUD GENERATOR</b></div>
</div>

<ul class="w3-navbar w3-green w3-small w3-card-4">
  <li><a class="w3-hover-black w3-padding-10" href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li><a class="w3-hover-black w3-padding-10" href="med.php?mod=menu"><i class="fa fa-wrench"></i> Menu  Setting</a></li>
  <li><a class="w3-hover-black w3-padding-10" href="med.php?mod=generator"><i class="fa fa-wrench"></i> CRUD Generator</a></li>
  <li><a class="w3-hover-black w3-padding-10" href="med.php?mod=modul"><i class="fa fa-folder-open"></i>  Modul Setting</a></li>
  <li class="w3-right"><a class="w3-hover-black w3-padding-10" href="med.php?mod=bantuan"><i class="fa fa-question-circle"></i> Help</a></li>
</ul>
</div>



<div id="main" class="w3-container" style="margin-top:103px">
    <?php include "content.php"; ?>
    <br>
</div>


</body>
</html> 