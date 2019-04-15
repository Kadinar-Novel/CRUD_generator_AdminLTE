<?php
//error_reporting(0);
require_once 'helper.php';
require_once 'harviacode.php';
require_once 'proses.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD Generator</title>
</head>
<body>
<?php
/*
$arr2 = array();
$non_pk = $hc->not_primary_field("admin");
foreach ($non_pk as $row) {
	$arr2[] = "&#39;&#36;_POST[".$row['column_name']."]&#39;";
}
echo implode(", ", $arr2);
*/
?>

<form action="" method="POST">
	<table align="center" width="800px">
		<tr>
			<th colspan="3">CRUD GENERATOR</th>
		</tr>
		<tr>
			<td>Nama Table</td>
			<td>:</td>
			<td><select id="table_name" name="nmtable">
                <option value="">Please Select</option>
                <?php
                $table_list = $hc->table_list();
                $table_list_selected = isset($_POST['table_name']) ? $_POST['table_name'] : '';
                foreach ($table_list as $table) {
                	if($table['table_name'] <> 'modul' AND $table['table_name'] <> 'menu' AND $table['table_name'] <> 'user') :
                    ?>
                    <option value="<?php echo $table['table_name'] ?>" <?php echo $table_list_selected == $table['table_name'] ? 'selected="selected"' : ''; ?>><?php echo $table['table_name'] ?></option>
                    <?php
                    endif;
                }
                ?>
            </select></td>
		</tr>
		<tr>
			<td>Nama Title</td>
			<td>:</td>
			<td><input type="text" name="nmtitle" placeholder="Title untuk judul menu"></td>
		</tr>

		<tr>
			<td>Desc</td>
			<td>:</td>
			<td><input type="text" name="desc" placeholder="Untuk penjelasan menu"></td>
		</tr>

		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Generate"></td>
		</tr>

	</table>

</form>

</body>
</html>