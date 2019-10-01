<?php
	if(!isset($_SESSION['login_user'])){
		header('location: ../../login.php'); // Mengarahkan ke Home Page
	}

	//link buat paging
	$linkaksi = 'index.php?page=data_laporan';

	if(isset($_GET['act']))
	{
		$act = $_GET['act'];
		$linkaksi .= '&act=$act';
	}
	else
	{
		$act = '';
	}

	$aksi = 'pages/data_laporan/act_data_laporan.php';

	switch ($act) {
		case 'form':
			if(!empty($_GET['id']))
			{
				$act = "$aksi?page=data_laporan&act=edit";
				$query = mysqli_query($conn, "SELECT * FROM data_laporan WHERE id = '$_GET[id]'");
				$temukan = mysqli_num_rows($query);
				if($temukan > 0)
				{
					$c = mysqli_fetch_assoc($query);
				}
				else
				{
					header("location:index.php?page=data_laporan");
				}

			}
			else
			{
				$act = "$aksi?page=data_laporan&act=simpan";
			}

		echo"<div class='col-md-12'>
          <div class='box box-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'> Realisasi Anggaran</h3>
			</div>";
			
            echo"<form role='form'  method='POST' action='$act' enctype='multipart/form-data' >
              <div class='box-body'>
                <div class='form-group'>
                  
                  <input type='hidden' class='form-control' name='id' value='"?><?php echo isset($c['id']) ? $c['id'] : '';?><?php echo"'"?> <?php echo isset($c['id']) ? ' readonly' : ' ';?><?php echo" >
								</div>
					<div class='form-group'><label >KODE</label>
					<input type='text' class='form-control' placeholder='Kode' name='kode' value='"?><?php echo isset($c['kode']) ? $c['kode'] : '';?><?php echo"'"?> <?php echo isset($c['kode']) ? ' ' : ' ';?><?php echo" >
										</div>
					<div class='form-group'><label >URAIAN</label>
					<input type='text' class='form-control' placeholder='Uraian' name='uraian' value='"?><?php echo isset($c['uraian']) ? $c['uraian'] : '';?><?php echo"'"?> <?php echo isset($c['uraian']) ? ' ' : ' ';?><?php echo" >
										</div>
					<div class='form-group'><label >PAGU</label>
					<input type='text' class='form-control' placeholder='Pagu' name='pagu' value='"?><?php echo isset($c['pagu']) ? $c['pagu'] : '';?><?php echo"'"?> <?php echo isset($c['pagu']) ? ' ' : ' ';?><?php echo" >
										</div>
					<div class='form-group'><label >REALISASI</label>
					<input type='text' class='form-control' placeholder='Realisasi' name='realisasi' value='"?><?php echo isset($c['realisasi']) ? $c['realisasi'] : '';?><?php echo"'"?> <?php echo isset($c['realisasi']) ? ' ' : ' ';?><?php echo" >
										</div>
					<div class='form-group'><label >SISA</label>
					<input type='text' class='form-control' placeholder='Sisa' name='sisa' value='"?><?php echo isset($c['sisa']) ? $c['sisa'] : '';?><?php echo"'"?> <?php echo isset($c['sisa']) ? ' ' : ' ';?><?php echo" >
										</div>
					<div class='form-group'><label >KODE DIPA</label>
					<input type='text' class='form-control' placeholder='Kode Dipa' name='kode_dipa' value='"?><?php echo isset($c['kode_dipa']) ? $c['kode_dipa'] : '';?><?php echo"'"?> <?php echo isset($c['kode_dipa']) ? ' ' : ' ';?><?php echo" >
										</div>
					<div class='form-group'><label >BULAN</label>
					<input type='text' class='form-control' placeholder='Bulan' name='bulan' value='"?><?php echo isset($c['bulan']) ? $c['bulan'] : '';?><?php echo"'"?> <?php echo isset($c['bulan']) ? ' ' : ' ';?><?php echo" >
										</div>
					<div class='form-group'><label >TAHUN</label>
					<input type='text' class='form-control' placeholder='Tahun' name='tahun' value='"?><?php echo isset($c['tahun']) ? $c['tahun'] : '';?><?php echo"'"?> <?php echo isset($c['tahun']) ? ' ' : ' ';?><?php echo" >
										</div>
					<div class='form-group'><label >TGL</label>
					<input type='text' class='form-control' placeholder='Tgl' name='tgl' value='"?><?php echo isset($c['tgl']) ? $c['tgl'] : '';?><?php echo"'"?> <?php echo isset($c['tgl']) ? ' ' : ' ';?><?php echo" >
										</div>
					<div class='form-group'><label >MODTIME</label>
					<input type='text' class='form-control' placeholder='Modtime' name='modtime' value='"?><?php echo isset($c['modtime']) ? $c['modtime'] : '';?><?php echo"'"?> <?php echo isset($c['modtime']) ? ' ' : ' ';?><?php echo" >
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
              <h3 class='box-title'>Realisasi Anggaran</h3><br/>
			  <small>Halaman untuk mengelola data anggara</small><br/><br/>
			  <a href='index.php?page=data_laporan&act=form' class='w3-btn w3-big w3-blue' style='font-size:16px'><i class='fa fa-file'></i> ADD DATA</a>
            </div>
            <div class='box-body'>
              <table id='example1' class='table table-bordered table-striped'>
                <thead>
                <tr>
					<th>No</th>
						<th>KODE</th>
						<th>URAIAN</th>
						<th>PAGU</th>
						<th>REALISASI</th>
						<th>SISA</th>
						<th>KODE DIPA</th>
						<th>BULAN</th>
						<th>TAHUN</th>
						<th>TGL</th>
						<th>MODTIME</th>
						<th>Action</th>
                </tr>
                </thead>
                <tbody>";
				$query = "SELECT * FROM data_laporan ";
				$sql_kul = mysqli_query($conn, $query);
				$fd_kul = mysqli_num_rows($sql_kul);
				
				if($fd_kul > 0)
				{
					$no =  1;
					while ($m = mysqli_fetch_assoc($sql_kul)) {
						echo"<tr>
						
							<td>$no</td>
							<td>$m[kode]</td>
							<td>$m[uraian]</td>
							<td>$m[pagu]</td>
							<td>$m[realisasi]</td>
							<td>$m[sisa]</td>
							<td>$m[kode_dipa]</td>
							<td>$m[bulan]</td>
							<td>$m[tahun]</td>
							<td>$m[tgl]</td>
							<td>$m[modtime]</td>
							<td><a href='index.php?page=data_laporan&act=form&id=$m[id]'><i class='fa fa-pencil-square w3-large w3-text-blue'></i></a> 
							<a href='$aksi?page=data_laporan&act=hapus&id=$m[id]' onclick=\"return confirm('Are You sure want to delete?');\"><i class='fa fa-trash w3-large w3-text-red'></i></a></td>
						
						</tr>";
						$no++;
					}
				}
				else
				{
					echo"<tr>
						<td colspan='12'><div class='w3-center'><i>Data Realisasi Anggaran Not Found.</i></div></td>
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