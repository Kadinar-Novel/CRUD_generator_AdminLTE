<?php
	if(!isset($_SESSION['login_user'])){
		header('location: ../../login.php'); // Mengarahkan ke Home Page
	}

	//link buat paging
	$linkaksi = 'index.php?page=obat';

	if(isset($_GET['act']))
	{
		$act = $_GET['act'];
		$linkaksi .= '&act=$act';
	}
	else
	{
		$act = '';
	}

	$aksi = 'pages/obat/act_obat.php';

	switch ($act) {
		case 'form':
			if(!empty($_GET['id']))
			{
				$act = "$aksi?page=obat&act=edit";
				$query = mysqli_query($conn, "SELECT * FROM obat WHERE idObat = '$_GET[id]'");
				$temukan = mysqli_num_rows($query);
				if($temukan > 0)
				{
					$c = mysqli_fetch_assoc($query);
				}
				else
				{
					header("location:index.php?page=obat");
				}

			}
			else
			{
				$act = "$aksi?page=obat&act=simpan";
			}

		echo"<div class='col-md-12'>
          <div class='box box-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'> Obat</h3>
			</div>";
			
            echo"<form role='form'  method='POST' action='$act'>
              <div class='box-body'>
                <div class='form-group'>
                  
                  <input type='hidden' class='form-control' name='id' value='"?><?php echo isset($c['idObat']) ? $c['idObat'] : '';?><?php echo"'"?> <?php echo isset($c['idObat']) ? ' readonly' : ' ';?><?php echo" >
								</div>
					<div class='form-group'><label >KODE OBAT</label>
					<input type='text' class='form-control' placeholder='Kode Obat' name='kode_obat' value='"?><?php echo isset($c['kode_obat']) ? $c['kode_obat'] : '';?><?php echo"'"?> <?php echo isset($c['kode_obat']) ? ' ' : ' ';?><?php echo" >
										</div>
					<div class='form-group'><label >NAMA OBAT</label>
					<input type='text' class='form-control' placeholder='Nama Obat' name='nama_obat' value='"?><?php echo isset($c['nama_obat']) ? $c['nama_obat'] : '';?><?php echo"'"?> <?php echo isset($c['nama_obat']) ? ' ' : ' ';?><?php echo" >
										</div>
					<div class='form-group'><label >JENIS OBAT</label>
					<input type='text' class='form-control' placeholder='Jenis Obat' name='jenis_obat' value='"?><?php echo isset($c['jenis_obat']) ? $c['jenis_obat'] : '';?><?php echo"'"?> <?php echo isset($c['jenis_obat']) ? ' ' : ' ';?><?php echo" >
										</div><div class='box-footer'>
					<button type='submit' class='btn btn-primary'>Submit</button> <button type='button' class='btn btn-primary' onclick='history.back()'><i class='fa fa-rotate-left'></i> Kembali</button>
				</div>
			  </div>			
            </form>
          </div>
        </div>
		";
		break;

		default :
		echo"
		<div class='col-xs-12'>
         <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Obat</h3><br/>
			  <small>Halaman untuk update data obat</small><br/><br/>
			  <a href='index.php?page=obat&act=form' class='w3-btn w3-big w3-blue' style='font-size:16px'><i class='fa fa-file'></i> ADD DATA</a>
            </div>
            <div class='box-body'>
              <table id='example1' class='table table-bordered table-striped'>
                <thead>
                <tr>
					<th>No</th>
						<th>KODE OBAT</th>
						<th>NAMA OBAT</th>
						<th>JENIS OBAT</th>
						<th>Action</th>
                </tr>
                </thead>
                <tbody>";
				$query = "SELECT * FROM obat ";
				$sql_kul = mysqli_query($conn, $query);
				$fd_kul = mysqli_num_rows($sql_kul);
				
				if($fd_kul > 0)
				{
					$no =  1;
					while ($m = mysqli_fetch_assoc($sql_kul)) {
						echo"<tr>
						
							<td>$no</td>
							<td>$m[kode_obat]</td>
							<td>$m[nama_obat]</td>
							<td>$m[jenis_obat]</td>
							<td><a href='index.php?page=obat&act=form&id=$m[idObat]'><i class='fa fa-pencil-square w3-large w3-text-blue'></i></a> 
							<a href='$aksi?page=obat&act=hapus&id=$m[idObat]' onclick=\"return confirm('Are You sure want to delete?');\"><i class='fa fa-trash w3-large w3-text-red'></i></a></td>
						
						</tr>";
						$no++;
					}
				}
				else
				{
					echo"<tr>
						<td colspan='5'><div class='w3-center'><i>Data Obat Not Found.</i></div></td>
					</tr>";
				}
				
				
                echo "</tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
          </div>
        </div>";

		break;
	}

	
?>