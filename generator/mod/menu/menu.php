<?php
	//link buat paging
	$linkaksi = 'med.php?mod=menu';

	if(isset($_GET['act']))
	{
		$act = $_GET['act'];
		$linkaksi .= '&act=$act';
	}
	else
	{
		$act = '';
	}

	$aksi = 'mod/menu/act_menu.php';

	switch ($act) {
		case 'form':
			if(!empty($_GET['id']))
			{
				$act = "$aksi?mod=menu&act=edit";
				$query = mysqli_query($conn,"SELECT * FROM menu WHERE id_menu = '$_GET[id]'");
				$temukan = mysqli_num_rows($query);
				if($temukan > 0)
				{
					$c = mysqli_fetch_assoc($query);
				}
				else
				{
					header("location:med.php?mod=menu");
				}

			}
			else
			{
				$act = "$aksi?mod=menu&act=simpan";
			}

			echo"<div class='w3-container w3-small w3-pale-yellow w3-leftbar w3-border-yellow'>
				<h4 style='margin-bottom:0;padding-bottom:0;'>Form Data Menu</h4>
				<p style='margin-top:0;padding-top:0;'><i>Form Input Data Menu</i></p>
			</div>";

			echo"<form class='w3-small' method='POST' action='$act'>
				<input type='hidden' name='id' class='w3-input' placeholder='kode_kelompok' value='"?><?php echo isset($c['id_menu']) ? $c['id_menu'] : '';?><?php echo"' required>
				<table>
					<tr>
						<td width='220px'><label class='w3-label'>Nama Menu</label></td>
						<td width='10px'>:</td>
						<td><input type='text' name='nama_menu' class='w3-input' placeholder='nama_menu' value='"?><?php echo isset($c['nama_menu']) ? $c['nama_menu'] : '';?><?php echo"' required>
						</td>
						
					</tr>
					<tr>
						<td><label class='w3-label'>Posisi</label></td>
						<td>:</td>
						<td><input type='text' name='posisi' class='w3-input' placeholder='posisi' value='"?><?php echo isset($c['posisi']) ? $c['posisi'] : '';?><?php echo"' required>
						</td>
						
					</tr><tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align='right'><button type='submit' name='submit' value='simpan' class='w3-btn'><i class='fa fa-save'></i> Simpan Data</button>&nbsp;

						<button type='button' class='w3-btn w3-orange' onclick='history.back()'><i class='fa fa-rotate-left'></i> Kembali</button></td>
					</tr>
				</table>
					
					
				</p>

			</form>";
		break;

		default :
			echo"<div class='w3-container w3-small w3-pale-green w3-leftbar w3-border-green'>
				<h4 style='margin-bottom:0;padding-bottom:0;'>Data Menu</h4>
				<p style='margin-top:0;padding-top:0;'><i>Kumpulan Semua Menu</i></p>
			</div>";

			//flash('example_message');

			echo"<table style='margin-top:12px;'>
				<tr>
					<td>
						<form class='w3-tiny' action='' method='GET'>	
							<input type='hidden' name='mod' value='menu'>
							<div class='w3-row'>
								<div class='w3-col s1'>
									<label class='w3-label'>Search</label>
								</div>
								<div class='w3-col s2'>
									<select name='field' class='w3-select w3-padding'>
										<option value=''>- Pilih -</option>
										<option value='nama_menu'>Nama Menu</option>
										<option value='posisi'>Posisi</option></select>
								</div>
								<div class='w3-col s4'>
									<input type='text' name='cari' class='w3-input' placeholder='cari ...'>
								</div>
								<div class='w3-col s1'>
									<button type='submit' class='w3-btn w3-tiny'><i class='fa fa-paper-plane'></i> GO</button>
								</div>
							</div>
						</form>
					</td>
					<td align='right'><a href='med.php?mod=menu' class='w3-btn w3-dark-grey w3-small'><i class='fa fa-refresh'></i> Refresh</a>
					<a href='med.php?mod=menu&act=form' class='w3-btn w3-small w3-blue'><i class='fa fa-file'></i> Tambah</a></td>
				</tr>
				
			</table>";

			echo"<div style='margin-top:12px;margin-bottom:12px;'>
			<table class='w3-table w3-striped w3-bordered w3-small w3-hoverable tbl'>
				<thead>
					<tr class='w3-yellow'>
						<th>No</th>
						<th>Nama Menu</th>
						<th>Posisi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>";

				$p      = new Paging;
				$batas  = 10;
			    if(isset($_GET['show']) && is_numeric($_GET['show']))
				{
					$batas = (int)$_GET['show'];
					$linkaksi .="&show=$_GET[show]";
				}

				$posisi = $p->cariPosisi($batas);

				$query = "SELECT * FROM menu ";

				$q 	= "SELECT * FROM menu";

				if(!empty($_GET['field']))
				{
					$hideinp = "<input type='hidden' name='field' value='$_GET[field]'>
								<input type='hidden' name='cari' value='$_GET[cari]'>";

					$linkaksi .= "&field=$_GET[field]&cari=$_GET[cari]";

					$query .= " WHERE $_GET[field] LIKE '%$_GET[cari]%'";
					$q .= " WHERE $_GET[field] LIKE '%$_GET[cari]%'";
				}

				$query .= " LIMIT $posisi, $batas";
				$q 	.= " ";
				

				$sql_kul = mysqli_query($conn,$query);
				$fd_kul = mysqli_num_rows($sql_kul);

				if($fd_kul > 0)
				{
					$no = $posisi + 1;
					while ($m = mysqli_fetch_assoc($sql_kul)) {
						echo"<tr>
						
							<td>$no</td>
							<td>$m[nama_menu]</td>
							<td>$m[posisi]</td>
							<td>
							<a href='med.php?mod=menu&act=form&id=$m[id_menu]'><i class='fa fa-pencil-square w3-large w3-text-blue'></i></a> 
							<a href='$aksi?mod=menu&act=hapus&id=$m[id_menu]' onclick=\"return confirm('Yakin hapus data');\"><i class='fa fa-trash w3-large w3-text-red'></i></a> 
							
							</td>
						
						</tr>";
						$no++;
					}
	

					$jmldata = mysqli_num_rows(mysqli_query($conn,$q));

					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
		    		$linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman, $linkaksi);
				}
				else
				{
					echo"<tr>
						<td colspan='4'><div class='w3-center'><i>Data Menu Not Found.</i></div></td>
					</tr>";
				}
				
				/*<a href='javascript:void(0);' class='detail' onclick=\"PopupCenter('popup/popup.php?mod=menu&id=$m[id_menu]', 'Edit Setoran', '500', '600')\"><i class='fa fa-list-ul w3-large w3-text-blue-grey'></i></a>*/
				echo"</tbody>

			</table></div>";

			echo"<div class='w3-row'>
				<div class='w3-col s1'>
					<form class='w3-tiny' action='' method='GET'>
						<input type='hidden' name='mod' value='menu'>";
						if(!empty($hideinp))
						{
							echo $hideinp;
						}
						echo"<select class='w3-select w3-border' name='show' onchange='submit()'>
							<option value=''>- Show -</option>";
							$i=10;
							while($i <= 100)
							{
								if(isset($_GET['show']) AND (int)$_GET['show'] == $i)
								{
									echo"<option value='$i' selected>$i</option>";	
								}
								else
								{
									echo"<option value='$i'>$i</option>";
								}

								$i+=10;
							}
						echo"</select>
					</form>
				</div>
				<div class='w3-col s11'>
					<ul class='w3-pagination w3-right w3-tiny'>
						$linkHalaman
					</ul>
				</div>
			</div>";

			?>

			<script>
			function PopupCenter(url, title, w, h) {
			    // Fixes dual-screen position                            Most browsers      Firefox
			    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
			    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

			    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
			    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

			    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
			    var top = ((height / 2) - (h / 2)) + dualScreenTop;
			    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

			    // Puts focus on the newWindow
			    if (window.focus) {
			        newWindow.focus();
			    }
			}
			</script>

			<?php
		break;
	}

	
?>
