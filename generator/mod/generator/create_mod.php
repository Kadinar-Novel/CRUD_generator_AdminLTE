<?php

$string = "<?php
	if(!isset(\$_SESSION['login_user'])){
		header('location: ../../login.php'); // Mengarahkan ke Home Page
	}

	//link buat paging
	\$linkaksi = 'index.php?page=".$mod."';

	if(isset(\$_GET['act']))
	{
		\$act = \$_GET['act'];
		\$linkaksi .= '&act=\$act';
	}
	else
	{
		\$act = '';
	}

	\$aksi = 'pages/".$nama_folder."/".$file2."';

	switch (\$act) {
		case 'form':
			if(!empty(\$_GET['id']))
			{
				\$act = \"\$aksi?page=".$mod."&act=edit\";
				\$query = mysqli_query(\$conn, \"SELECT * FROM ".$nama_table." WHERE ".$pk." = '\$_GET[id]'\");
				\$temukan = mysqli_num_rows(\$query);
				if(\$temukan > 0)
				{
					\$c = mysqli_fetch_assoc(\$query);
				}
				else
				{
					header(\"location:index.php?page=".$mod."\");
				}

			}
			else
			{
				\$act = \"\$aksi?page=".$mod."&act=simpan\";
			}

		echo\"<div class='col-md-12'>
          <div class='box box-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'> ".$nama_header."</h3>
			</div>\";
			
            echo\"<form role='form'  method='POST' action='\$act' enctype='multipart/form-data' >
              <div class='box-body'>
                <div class='form-group'>
                  
                  <input type='hidden' class='form-control' name='id' value='\"?><?php echo isset(\$c['".$pk."']) ? \$c['".$pk."'] : '';?><?php echo\"'\"?> <?php echo isset(\$c['".$pk."']) ? ' readonly' : ' ';?><?php echo\" >
								</div>";

				foreach ($non_pk as $row) {
					# code...
					
					$string .= "\n\t\t\t\t\t<div class='form-group'><label >".strtoupper(str_replace('_', ' ', $row['column_name']))."</label>
					<input type='text' class='form-control' placeholder='".ucwords(str_replace('_', ' ', $row['column_name']))."' name='".$row['column_name']."' value='\"?><?php echo isset(\$c['".$row['column_name']."']) ? \$c['".$row['column_name']."'] : '';?><?php echo\"'\"?> <?php echo isset(\$c['".$row['column_name']."']) ? ' ' : ' ';?><?php echo\" >
					\t\t\t\t\t</div>";
				}
				
                $string .= "<div class='box-footer'>
					<button type='submit' class='btn btn-primary'>Submit</button> <button type='button' class='btn btn-primary' onclick='history.back()'><i class='fa fa-rotate-left'></i> Kembali</button>
				</div>
			  </div>			
            </form>
          </div>
        </div>
		\";
		break;

		default :
		echo\"
		<div class='col-xs-12'>
         <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>".$nama_header."</h3><br/>
			  <small>".$desc_header."</small><br/><br/>
			  <a href='index.php?page=".$mod."&act=form' class='w3-btn w3-big w3-blue' style='font-size:16px'><i class='fa fa-file'></i> ADD DATA</a>
            </div>
            <div class='box-body'>
              <table id='example1' class='table table-bordered table-striped'>
                <thead>
                <tr>
					<th>No</th>";
					foreach ($non_pk as $row) {
							# code...
							$string .= "\n\t\t\t\t\t\t<th>" . strtoupper(label($row['column_name'])) . "</th>";
					}
					$string .= "\n\t\t\t\t\t\t<th>Action</th>
                </tr>
                </thead>
                <tbody>\";
				\$query = \"SELECT * FROM ".$nama_table." \";
				\$sql_kul = mysqli_query(\$conn, \$query);
				\$fd_kul = mysqli_num_rows(\$sql_kul);
				
				if(\$fd_kul > 0)
				{
					\$no =  1;
					while (\$m = mysqli_fetch_assoc(\$sql_kul)) {";
						$string .= "\n\t\t\t\t\t\techo\"<tr>
						\n\t\t\t\t\t\t\t<td>\$no</td>";
					//membuat header table	
					$total_field = count($non_pk) + 2;
					foreach ($non_pk as $row) {
						# code...
						
						$string .= "\n\t\t\t\t\t\t\t<td>\$m[" . $row['column_name'] . "]</td>";
					}
						

						$string .= "\n\t\t\t\t\t\t\t<td><a href='index.php?page=".$mod."&act=form&id=\$m[".$pk."]'><i class='fa fa-pencil-square w3-large w3-text-blue'></i></a> 
							<a href='\$aksi?page=".$mod."&act=hapus&id=\$m[".$pk."]' onclick=\\\"return confirm('Are You sure want to delete?');\\\"><i class='fa fa-trash w3-large w3-text-red'></i></a></td>
						\n\t\t\t\t\t\t</tr>\";\n\t\t\t\t\t\t\$no++;
					}
				}
				else
				{
					echo\"<tr>
						<td colspan='".$total_field."'><div class='w3-center'><i>Data ".$nama_header." Not Found.</i></div></td>
					</tr>\";
				}
				
				
                echo \"</tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
          </div>
        </div>\";

		break;
	}

	
?>";

createFile($string, "../apps/pages/" . $nama_folder . "/" . $file1);

?>