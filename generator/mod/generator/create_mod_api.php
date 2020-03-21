<?php
$string = "<?php
	header(\"Access-Control-Allow-Origin: *\");
	session_start();
	header(\"Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS\");
    include \"../../lib/conn.php\";
    mysqli_set_charset(\$conn,'utf8');

    \$method = isset(\$_POST['_METHOD']) ? \$_POST['_METHOD'] : \$_SERVER['REQUEST_METHOD'];

    \$key = isset(\$_REQUEST['".$pk."']) ? \$_REQUEST['".$pk."'] : '';
    ";

    $arr = array();
    $arr2 = array();
    foreach ($non_pk as $row) {
        $arr[] = "\n\t\t\t\t\t\t\t\t\t\t".$row['column_name'];
        $arr2[] = "\n\t\t\t\t\t\t\t\t\t\t'\$".$row['column_name']."'";
    }
    $arr3 = array();
    foreach ($non_pk as $row) {
        $arr3[] = "\n\t\t\t\t\t\t\t\t\t\t".$row['column_name']."= '\$".$row['column_name']."'";
        $string .= "\n\t\t\$".$row['column_name']."= isset(\$_REQUEST['".$row['column_name']."']) ? \$_REQUEST['".$row['column_name']."'] : '' ;";
    }

$string .= "
    switch (\$method) {
        case 'GET':
          \$sql = \"SELECT * FROM ".$nama_table." \".(\$key ?\" WHERE ".$pk." =\$key\":''); 
        break;
        case 'PUT': ";
            $string .= "\$sql = \"UPDATE ".$nama_table." SET ";
            $string .= implode(", ", $arr3);
            $string .= " WHERE ".$pk." = \$key \";";
            $string .= "
        break;
        case 'POST': ";
            $string .="\$sql = \"INSERT INTO ".$nama_table."( ";
            $string .= implode(", ", $arr);
            $string .=") VALUES (";
            $string .= implode(", ", $arr2) ;
            $string .= ")\";
        break;
        case 'DELETE':
           \$sql = \"DELETE FROM ".$nama_table." WHERE ".$pk." = \$key\"; 
        break;
    }";
$string .= "       
      // excecute SQL statement
      \$result = mysqli_query(\$conn,\$sql);
      
      // print results, insert id or affected row count
      if (\$method == 'GET') {
		  \$row = mysqli_num_rows(\$result);
          if (\$row==0) {
              \$data['status'] = 201;
              \$data['msg'] = 'Data not found';
              echo json_encode(\$data);
          }else{
			\$response = array();
			\$response[\"data\"] = array();
			while (\$row = mysqli_fetch_assoc(\$result)) {
				\$data = \$row;
				array_push(\$response[\"data\"], \$data);
			}
			echo json_encode(\$response);			  
          }  
      } elseif (\$method == 'POST') {
          if (!\$result) {
              \$data['status'] = 201;
              \$data['msg'] = 'Insert failed';  
          }else{
              \$data['status'] = 200;
              \$data['msg'] = 'Insert successful';
          }
          echo json_encode(\$data);
      } elseif (\$method == 'PUT') {
          if (!\$result) {
              \$data['status'] = 201;
              \$data['msg'] = 'Update failed'; 
          }else{
              \$data['status'] = 200;
              \$data['msg'] = 'Update successful';
          }
          echo json_encode(\$data);
      } elseif (\$method == 'DELETE') {
          if (!\$result) {
              \$data['status'] = 201;
              \$data['msg'] = 'Delete failed';  
          }else{
              \$data['status'] = 200;
              \$data['msg'] = 'Delete successful';
          }
          echo json_encode(\$data);
      }
       
      // close mysql connection
      mysqli_close(\$conn);
?>";


createFile($string, "../apps/pages/" . $nama_folder . "/" . $file3);

?>
