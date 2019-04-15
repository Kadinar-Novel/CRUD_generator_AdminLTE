<?php
	if(!isset($_SESSION['login_user'])){
		header('location: ../../login.php'); // Mengarahkan ke Home Page
	}

	if(isset($_SESSION['level']) AND $_SESSION['level'] <> 'admin')
	{
		echo"<div class='w3-container w3-red'><p>Dilarang mengakses file ini.</p></div>";
		die();
	}

	//link buat paging
	$linkaksi = "med.php?mod=user";

	if(isset($_GET['act']))
	{
		$act = $_GET['act'];
		$linkaksi .= "&act=$act";
	}
	else
	{
		$act = "";
	}

	$aksi = "mod/user/act_user.php";

	switch ($act) {
		case 'form':
			if(!empty($_GET['id']))
			{
				$act = "$aksi?mod=user&act=edit";
				$query = mysqli_query($conn,"SELECT * FROM user WHERE id_user = '$_GET[id]'");
				$temukan = mysqli_num_rows($query);
				if($temukan > 0)
				{
					$c = mysqli_fetch_assoc($query);
				}
				else
				{
					header("location:med.php?mod=user");
				}

			}
			else
			{
				$act = "$aksi?mod=user&act=simpan";	
			}

			echo"<div class=\"w3-container w3-small w3-pale-yellow w3-leftbar w3-border-yellow\">
				<h4 style=\"margin-bottom:0;padding-bottom:0;\">Form User</h4>
				<p style=\"margin-top:0;padding-top:0;\"><i>Form untuk pengguna sistem.</i></p>
			</div>";

			flash('example_class');

			echo"<form class='w3-small' method='POST' action='$act'>
				<input type='hidden' name='id' value='"?><?php echo isset($c['id_user']) ? $c['id_user'] : '';?><?php echo"'>
				<table>
					<tr>
						<td width='220px'><label class='w3-label'>Nama Lengkap</label></td>
						<td width='10px'>:</td>
						<td><input type='text' name='nama_lengkap' class='w3-input' placeholder='nama lengkap' value='"?><?php echo isset($c['nama_lengkap']) ? $c['nama_lengkap'] : '';?><?php echo"' required></td>
					</tr>
					<tr>
						<td><label class='w3-label'>Username</label></td>
						<td>:</td>
						<td><input type='text' name='usernm' class='w3-input' placeholder='username' value='"?><?php echo isset($c['usernm']) ? $c['usernm'] : '';?><?php echo"' required></td>
					</tr>
					<tr>
						<td><label class='w3-label'>Password</label></td>
						<td>:</td>
						<td><input type='password' name='passwd' class='w3-input' placeholder='password'></td>
					</tr>
					<tr>
						<td><label class='w3-label'>Repeat Password</label></td>
						<td>:</td>
						<td><input type='password' name='rpasswd' class='w3-input' placeholder='repeat password'></td>
					</tr>
					<tr>
						<td><label class='w3-label'>Level</label></td>
						<td>:</td>
						<td><div class='w3-row'>
							<div class='w3-col s4'>
								<select name='level' class='w3-select' required>
									<option value='user' "?><?php echo (isset($c['level']) AND $c['level'] == "user") ? 'selected' : ''; ?><?php echo">User</option>
									<option value='admin' "?><?php echo (isset($c['level']) AND $c['level'] == "admin") ? 'selected' : ''; ?><?php echo">Administrator</option>
								</select>
							</div>
							</div>
						</td>
					</tr>
					
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align='right'><button type='submit' name='submit' value='simpan' class='w3-btn'>Simpan Data</button>&nbsp;

						<button type='button' class='w3-btn w3-orange' onclick='history.back()'>Kembali</button></td>
					</tr>
				</table>
					
					
				</p>

			</form>";
			?>
				<script type="text/javascript">
					$(function()
					{
						$('.mny').number(true);
						$('#jumlah').keyup(function(){
							var biaya = $('#jumlah').val();
							$('#jumlah2').val(biaya);
						});

						$( ".dp" ).datepicker({
							dateFormat : "yy-mm-dd",
							showAnim : "fold"
						});
					});
				</script>
			<?php
		break;
		
		default :
			echo"<div class=\"w3-container w3-small w3-pale-green w3-leftbar w3-border-green\">
				<h4 style=\"margin-bottom:0;padding-bottom:0;\">Data User</h4>
				<p style=\"margin-top:0;padding-top:0;\"><i>Semua data pengguna dari sistem.</i></p>
			</div>";

			flash('example_message');

			echo"<table style=\"margin-top:12px;\">
				<tr>
					<td>
						<form class='w3-tiny' action='' method='GET'>	
							<input type='hidden' name='mod' value='user'>
							<div class='w3-row'>
								<div class='w3-col s1'>
									<label class='w3-label'>Cari</label>
								</div>
								<div class='w3-col s2'>
									<select name='field' class='w3-select w3-padding w3-border'>
										<option value='1'>Nama</option>
										<option value='2'>Username</option>
										<option value='3'>Level</option>
									</select>
								</div>
								<div class='w3-col s4'>
									<input type='text' name='cari' class='w3-input w3-border' placeholder='cari ...'>
								</div>
								<div class='w3-col s1'>
									<button type='submit' class='w3-btn w3-tiny'>GO</button>
								</div>
							</div>
						</form>
					</td>
					<td align='right'><a href='med.php?mod=user' class='w3-btn w3-small'>Refresh</a>
					<a href='med.php?mod=user&act=form' class='w3-btn w3-small w3-blue'>Tambah</a></td>
				</tr>
				
			</table>";

			echo"<div style=\"margin-top:12px;margin-bottom:12px;\">
			<table class=\"w3-table w3-striped w3-bordered w3-small w3-hoverable tbl\">
				<thead>
					<tr class=\"w3-yellow\">
						<th>ID</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Level</th>
						<th>Last Login</th>
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

				$query = "SELECT * FROM user";

				$q 	= "SELECT * FROM user";

				if(isset($_GET['cari']))
				{
					$fld = array('','nama_lengkap', 'usernm', 'level');
					if(is_numeric($_GET['field']))
					{
						$indx = (int)$_GET['field'];	
					}
					else
					{
						$indx = 1;
					}
					

					$hideinp = "<input type='hidden' name='field' value='$_GET[field]'>
								<input type='hidden' name='cari' value='$_GET[cari]'>";

					$linkaksi .= "&field=$_GET[field]&cari=$_GET[cari]";

					$query .= " WHERE $fld[$indx] LIKE '%$_GET[cari]%'";
					$q .= " WHERE $fld[$indx] LIKE '%$_GET[cari]%'";
				}

				$query .= " ORDER BY id_user ASC LIMIT $posisi, $batas";
				$q 	.= " ORDER BY id_user ASC";
				

				$sql_kel = mysqli_query($conn, $query) or die(mysqli_error());
				$fd_kel = mysqli_num_rows($sql_kel);

				if($fd_kel > 0)
				{
					$no = $posisi + 1;
					while ($m = mysqli_fetch_assoc($sql_kel)) {
						echo"<tr>
							<td>$m[id_user]</td>
							<td>$m[nama_lengkap]</td>
							<td>$m[usernm]</td>
							<td>".strtoupper($m['level'])."</td>
							<td>$m[last_login]</td>
							<td><a href='med.php?mod=user&act=form&id=$m[id_user]'>Edit</a></td>
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
						<td colspan='10'><div class='w3-center'><i>Data User Not found.</i></div></td>
					</tr>";
				}
				

				echo"</tbody>

			</table></div>";

			echo"<div class='w3-row'>
				<div class='w3-col s1'>
					<form class='w3-tiny' action='' method='GET'>
						<input type='hidden' name='mod' value='user'>";
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
					<ul class=\"w3-pagination w3-right w3-tiny\">
						$linkHalaman
					</ul>
				</div>
			</div>";
		break;
	}

	
?>
