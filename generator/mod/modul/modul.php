<?php
	//link buat paging
	$linkaksi = 'med.php?mod=modul';

	if(isset($_GET['act']))
	{
		$act = $_GET['act'];
		$linkaksi .= '&act=$act';
	}
	else
	{
		$act = '';
	}

	$aksi = 'mod/modul/act_modul.php';

	switch ($act) {
		case 'form':
			if(!empty($_GET['id']))
			{
				$act = "$aksi?mod=modul&act=edit";
				$query = mysqli_query($conn, "SELECT * FROM modul WHERE id_modul = '$_GET[id]'");
				$temukan = mysqli_num_rows($query);
				if($temukan > 0)
				{
					$c = mysqli_fetch_assoc($query);
				}
				else
				{
					header("location:med.php?mod=modul");
				}

			}
			else
			{
				$act = "$aksi?mod=modul&act=simpan";
			}

			echo"<div class='w3-container w3-small w3-pale-yellow w3-leftbar w3-border-yellow'>
				<h4 style='margin-bottom:0;padding-bottom:0;'>Form Data Modul</h4>
				<p style='margin-top:0;padding-top:0;'><i>Form Input Data Modul</i></p>
			</div>";

			echo"<form class='w3-small' method='POST' action='$act'>
				<input type='hidden' name='id' class='w3-input' placeholder='kode_kelompok' value='"?><?php echo isset($c['id_modul']) ? $c['id_modul'] : '';?><?php echo"'>
				<table>
					<tr>
						<td><label class='w3-label'>Pilih Menu</label></td>
						<td>:</td>
						<td><div class='w3-row'>
							<div class='w3-col s4'>
								<select name='id_menu' class='w3-select' required>
									<option value=''>- Pilih Menu -</option>";
								$sql_m = mysqli_query($conn,"SELECT * FROM menu ORDER BY id_menu ASC");
								while($men = mysqli_fetch_assoc($sql_m))
								{
									if(isset($c['id_menu']) && $c['id_menu'] == $men['id_menu'])
									{
										echo"<option value='$men[id_menu]' selected>$men[nama_menu]</option>";
									}
									else
									{
										echo"<option value='$men[id_menu]'>$men[nama_menu]</option>";
									}
								}
								echo"</select>
							</div>
							</div>
						</td>
					</tr>

					<tr>
						<td><label class='w3-label'>Nama Modul</label></td>
						<td>:</td>
						<td><input type='text' name='nama_modul' class='w3-input' placeholder='nama_modul' value='"?><?php echo isset($c['nama_modul']) ? $c['nama_modul'] : '';?><?php echo"' required>
						</td>
						
					</tr>
					<tr>
						<td><label class='w3-label'>Link Menu</label></td>
						<td>:</td>
						<td><input type='text' name='link_menu' class='w3-input' placeholder='nama_table' value='"?><?php echo isset($c['link_menu']) ? $c['link_menu'] : '';?><?php echo"' required>
						</td>
						
					</tr>
					<tr>
						<td><label class='w3-label'>Posisi</label></td>
						<td>:</td>
						<td><input type='text' name='posisi' class='w3-input' placeholder='posisi' value='"?><?php echo isset($c['posisi']) ? $c['posisi'] : '';?><?php echo"' required>
						</td>
						
					</tr>
					<tr>
						<td><label class='w3-label'>Icon Menu</label></td>
						<td>:</td>
						<td><input type='text' name='icon_menu' class='w3-input' placeholder='icon_menu' value='"?><?php echo isset($c['icon_menu']) ? $c['icon_menu'] : '';?><?php echo"' required>
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
			?>
<p>The table below shows all Font Awesome Web Application icons:</p>

<table class="display" id="table_id" cellspacing="0" width="100%">
	<thead>
  <tr>
    <th style="width:10px;">Icon</th>
    <th>Description</th>
  </tr>
  </thead>

  <tfoot>
  <tr>
    <th>Icon</th>
    <th>Description</th>
  </tr>
  </tfoot>

  <tbody>
  <tr>
    <td><center><span class="fa fa-adjust"></span></center></td>
    <td>fa fa-adjust</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-anchor"></span></center></td>
    <td>fa fa-anchor</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-archive"></span></center></td>
    <td>fa fa-archive</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-area-chart"></span></center></td>
    <td>fa fa-area-chart</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-arrows"></span></center></td>
    <td>fa fa-arrows</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-arrows-h"></span></center></td>
    <td>fa fa-arrows-h</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-arrows-v"></span></center></td>
    <td>fa fa-arrows-v</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-asterisk"></span></center></td>
    <td>fa fa-asterisk</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-at"></span></center></td>
    <td>fa fa-at</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-automobile"></span></center></td>
    <td>fa fa-automobile</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-balance-scale"></span></center></td>
    <td>fa fa-balance-scale</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-ban"></span></center></td>
    <td>fa fa-ban</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bank"></span></center></td>
    <td>fa fa-bank</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bar-chart"></span></center></td>
    <td>fa fa-bar-chart</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bar-chart-o"></span></center></td>
    <td>fa fa-bar-chart-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-barcode"></span></center></td>
    <td>fa fa-barcode</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bars"></span></center></td>
    <td>fa fa-bars</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-battery-0"></span></center></td>
    <td>fa fa-battery-0</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-battery-1"></span></center></td>
    <td>fa fa-battery-1</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-battery-2"></span></center></td>
    <td>fa fa-battery-2</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-battery-3"></span></center></td>
    <td>fa fa-battery-3</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-battery-4"></span></center></td>
    <td>fa fa-battery-4</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-battery-empty"></span></center></td>
    <td>fa fa-battery-empty</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-battery-full"></span></center></td>
    <td>fa fa-battery-full</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-battery-half"></span></center></td>
    <td>fa fa-battery-half</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-battery-quarter"></span></center></td>
    <td>fa fa-battery-quarter</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-battery-three-quarters"></span></center></td>
    <td>fa fa-battery-three-quarters</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bed"></span></center></td>
    <td>fa fa-bed</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-beer"></span></center></td>
    <td>fa fa-beer</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bell"></span></center></td>
    <td>fa fa-bell</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bell-o"></span></center></td>
    <td>fa fa-bell-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bell-slash"></span></center></td>
    <td>fa fa-bell-slash</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bell-slash-o"></span></center></td>
    <td>fa fa-bell-slash-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bicycle"></span></center></td>
    <td>fa fa-bicycle</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-binoculars"></span></center></td>
    <td>fa fa-binoculars</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-birthday-cake"></span></center></td>
    <td>fa fa-birthday-cake</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bolt"></span></center></td>
    <td>fa fa-bolt</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bomb"></span></center></td>
    <td>fa fa-bomb</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-book"></span></center></td>
    <td>fa fa-book</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bookmark"></span></center></td>
    <td>fa fa-bookmark</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bookmark-o"></span></center></td>
    <td>fa fa-bookmark-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-briefcase"></span></center></td>
    <td>fa fa-briefcase</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bug"></span></center></td>
    <td>fa fa-bug</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-building"></span></center></td>
    <td>fa fa-building</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-building-o"></span></center></td>
    <td>fa fa-building-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bullhorn"></span></center></td>
    <td>fa fa-bullhorn</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bullseye"></span></center></td>
    <td>fa fa-bullseye</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-bus"></span></center></td>
    <td>fa fa-bus</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-cab"></span></center></td>
    <td>fa fa-cab</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-calculator"></span></center></td>
    <td>fa fa-calculator</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-calendar"></span></center></td>
    <td>fa fa-calendar</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-calendar-o"></span></center></td>
    <td>fa fa-calendar-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-calendar-check-o"></span></center></td>
    <td>fa fa-calendar-check-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-calendar-minus-o"></span></center></td>
    <td>fa fa-calendar-minus-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-calendar-plus-o"></span></center></td>
    <td>fa fa-calendar-plus-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-calendar-times-o"></span></center></td>
    <td>fa fa-calendar-times-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-camera"></span></center></td>
    <td>fa fa-camera</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-camera-retro"></span></center></td>
    <td>fa fa-camera-retro</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-car"></span></center></td>
    <td>fa fa-car</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-caret-square-o-down"></span></center></td>
    <td>fa fa-caret-square-o-down</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-caret-square-o-left"></span></center></td>
    <td>fa fa-caret-square-o-left</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-caret-square-o-right"></span></center></td>
    <td>fa fa-caret-square-o-right</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-caret-square-o-up"></span></center></td>
    <td>fa fa-caret-square-o-up</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-cart-arrow-down"></span></center></td>
    <td>fa fa-cart-arrow-down</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-cart-plus"></span></center></td>
    <td>fa fa-cart-plus</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-cc"></span></center></td>
    <td>fa fa-cc</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-certificate"></span></center></td>
    <td>fa fa-certificate</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-check"></span></center></td>
    <td>fa fa-check</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-check-circle"></span></center></td>
    <td>fa fa-check-circle</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-check-circle-o"></span></center></td>
    <td>fa fa-check-circle-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-check-square"></span></center></td>
    <td>fa fa-check-square</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-check-square-o"></span></center></td>
    <td>fa fa-check-square-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-child"></span></center></td>
    <td>fa fa-child</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-circle"></span></center></td>
    <td>fa fa-circle</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-circle-o"></span></center></td>
    <td>fa fa-circle-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-circle-o-notch"></span></center></td>
    <td>fa fa-circle-o-notch</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-circle-thin"></span></center></td>
    <td>fa fa-circle-thin</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-clock-o"></span></center></td>
    <td>fa fa-clock-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-clone"></span></center></td>
    <td>fa fa-clone</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-close"></span></center></td>
    <td>fa fa-close</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-cloud"></span></center></td>
    <td>fa fa-cloud</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-cloud-download"></span></center></td>
    <td>fa fa-cloud-download</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-cloud-upload"></span></center></td>
    <td>fa fa-cloud-upload</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-code"></span></center></td>
    <td>fa fa-code</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-code-fork"></span></center></td>
    <td>fa fa-code-fork</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-coffee"></span></center></td>
    <td>fa fa-coffee</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-cog"></span></center></td>
    <td>fa fa-cog</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-cogs"></span></center></td>
    <td>fa fa-cogs</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-comment"></span></center></td>
    <td>fa fa-comment</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-comment-o"></span></center></td>
    <td>fa fa-comment-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-comments"></span></center></td>
    <td>fa fa-comments</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-comments-o"></span></center></td>
    <td>fa fa-comments-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-commenting"></span></center></td>
    <td>fa fa-commenting</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-commenting-o"></span></center></td>
    <td>fa fa-commenting-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-compass"></span></center></td>
    <td>fa fa-compass</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-copyright"></span></center></td>
    <td>fa fa-copyright</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-credit-card"></span></center></td>
    <td>fa fa-credit-card</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-creative-commons"></span></center></td>
    <td>fa fa-creative-commons</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-crop"></span></center></td>
    <td>fa fa-crop</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-crosshairs"></span></center></td>
    <td>fa fa-crosshairs</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-cube"></span></center></td>
    <td>fa fa-cube</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-cubes"></span></center></td>
    <td>fa fa-cubes</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-cutlery"></span></center></td>
    <td>fa fa-cutlery</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-dashboard"></span></center></td>
    <td>fa fa-dashboard</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-database"></span></center></td>
    <td>fa fa-database</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-desktop"></span></center></td>
    <td>fa fa-desktop</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-diamond"></span></center></td>
    <td>fa fa-diamond</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-dot-circle-o"></span></center></td>
    <td>fa fa-dot-circle-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-download"></span></center></td>
    <td>fa fa-download</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-edit"></span></center></td>
    <td>fa fa-edit</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-ellipsis-h"></span></center></td>
    <td>fa fa-ellipsis-h</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-ellipsis-v"></span></center></td>
    <td>fa fa-ellipsis-v</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-envelope"></span></center></td>
    <td>fa fa-envelope</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-envelope-o"></span></center></td>
    <td>fa fa-envelope-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-envelope-square"></span></center></td>
    <td>fa fa-envelope-square</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-eraser"></span></center></td>
    <td>fa fa-eraser</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-exchange"></span></center></td>
    <td>fa fa-exchange</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-exclamation"></span></center></td>
    <td>fa fa-exclamation</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-exclamation-circle"></span></center></td>
    <td>fa fa-exclamation-circle</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-exclamation-triangle"></span></center></td>
    <td>fa fa-exclamation-triangle</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-external-link"></span></center></td>
    <td>fa fa-external-link</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-external-link-square"></span></center></td>
    <td>fa fa-external-link-square</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-eye"></span></center></td>
    <td>fa fa-eye</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-eye-slash"></span></center></td>
    <td>fa fa-eye-slash</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-eyedropper"></span></center></td>
    <td>fa fa-eyedropper</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-fax"></span></center></td>
    <td>fa fa-fax</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-female"></span></center></td>
    <td>fa fa-female</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-fighter-jet"></span></center></td>
    <td>fa fa-fighter-jet</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-file-archive-o"></span></center></td>
    <td>fa fa-file-archive-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-file-audio-o"></span></center></td>
    <td>fa fa-file-audio-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-file-code-o"></span></center></td>
    <td>fa fa-file-code-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-file-excel-o"></span></center></td>
    <td>fa fa-file-excel-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-file-image-o"></span></center></td>
    <td>fa fa-file-image-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-file-movie-o"></span></center></td>
    <td>fa fa-file-movie-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-file-pdf-o"></span></center></td>
    <td>fa fa-file-pdf-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-file-photo-o"></span></center></td>
    <td>fa fa-file-photo-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-file-picture-o"></span></center></td>
    <td>fa fa-file-picture-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-file-powerpoint-o"></span></center></td>
    <td>fa fa-file-powerpoint-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-file-sound-o"></span></center></td>
    <td>fa fa-file-sound-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-file-video-o"></span></center></td>
    <td>fa fa-file-video-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-file-word-o"></span></center></td>
    <td>fa fa-file-word-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-file-zip-o"></span></center></td>
    <td>fa fa-file-zip-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-film"></span></center></td>
    <td>fa fa-film</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-filter"></span></center></td>
    <td>fa fa-filter</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-fire"></span></center></td>
    <td>fa fa-fire</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-fire-extinguisher"></span></center></td>
    <td>fa fa-fire-extinguisher</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-flag"></span></center></td>
    <td>fa fa-flag</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-flag-checkered"></span></center></td>
    <td>fa fa-flag-checkered</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-flag-o"></span></center></td>
    <td>fa fa-flag-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-flash"></span></center></td>
    <td>fa fa-flash</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-flask"></span></center></td>
    <td>fa fa-flask</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-folder"></span></center></td>
    <td>fa fa-folder</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-folder-o"></span></center></td>
    <td>fa fa-folder-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-folder-open"></span></center></td>
    <td>fa fa-folder-open</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-folder-open-o"></span></center></td>
    <td>fa fa-folder-open-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-frown-o"></span></center></td>
    <td>fa fa-frown-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-futbol-o"></span></center></td>
    <td>fa fa-futbol-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-gamepad"></span></center></td>
    <td>fa fa-gamepad</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-gavel"></span></center></td>
    <td>fa fa-gavel</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-gear"></span></center></td>
    <td>fa fa-gear</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-gears"></span></center></td>
    <td>fa fa-gears</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-genderless"></span></center></td>
    <td>fa fa-genderless</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-gift"></span></center></td>
    <td>fa fa-gift</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-glass"></span></center></td>
    <td>fa fa-glass</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-globe"></span></center></td>
    <td>fa fa-globe</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-graduation-cap"></span></center></td>
    <td>fa fa-graduation-cap</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-group"></span></center></td>
    <td>fa fa-group</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-hdd-o"></span></center></td>
    <td>fa fa-hdd-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-headphones"></span></center></td>
    <td>fa fa-headphones</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-heart"></span></center></td>
    <td>fa fa-heart</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-heart-o"></span></center></td>
    <td>fa fa-heart-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-heartbeat"></span></center></td>
    <td>fa fa-heartbeat</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-history"></span></center></td>
    <td>fa fa-history</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-home"></span></center></td>
    <td>fa fa-home</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-hotel"></span></center></td>
    <td>fa fa-hotel</td>
  </tr>  
  <tr>
    <td><center><span class="fa fa-hourglass"></span></center></td>
    <td>fa fa-hourglass</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-hourglass-1"></span></center></td>
    <td>fa fa-hourglass-1</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-hourglass-2"></span></center></td>
    <td>fa fa-hourglass-2</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-hourglass-3"></span></center></td>
    <td>fa fa-hourglass-3</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-hourglass-end"></span></center></td>
    <td>fa fa-hourglass-end</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-hourglass-half"></span></center></td>
    <td>fa fa-hourglass-half</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-hourglass-o"></span></center></td>
    <td>fa fa-hourglass-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-hourglass-start"></span></center></td>
    <td>fa fa-hourglass-start</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-i-cursor"></span></center></td>
    <td>fa fa-i-cursor</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-image"></span></center></td>
    <td>fa fa-image</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-inbox"></span></center></td>
    <td>fa fa-inbox</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-industry"></span></center></td>
    <td>fa fa-industry</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-info"></span></center></td>
    <td>fa fa-info</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-info-circle"></span></center></td>
    <td>fa fa-info-circle</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-institution"></span></center></td>
    <td>fa fa-institution</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-key"></span></center></td>
    <td>fa fa-key</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-keyboard-o"></span></center></td>
    <td>fa fa-keyboard-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-language"></span></center></td>
    <td>fa fa-language</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-laptop"></span></center></td>
    <td>fa fa-laptop</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-leaf"></span></center></td>
    <td>fa fa-leaf</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-legal"></span></center></td>
    <td>fa fa-legal</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-lemon-o"></span></center></td>
    <td>fa fa-lemon-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-level-down"></span></center></td>
    <td>fa fa-level-down</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-level-up"></span></center></td>
    <td>fa fa-level-up</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-life-bouy"></span></center></td>
    <td>fa fa-life-bouy</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-life-buoy"></span></center></td>
    <td>fa fa-life-buoy</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-life-ring"></span></center></td>
    <td>fa fa-life-ring</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-life-saver"></span></center></td>
    <td>fa fa-life-saver</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-lightbulb-o"></span></center></td>
    <td>fa fa-lightbulb-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-line-chart"></span></center></td>
    <td>fa fa-line-chart</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-location-arrow"></span></center></td>
    <td>fa fa-location-arrow</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-lock"></span></center></td>
    <td>fa fa-lock</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-magic"></span></center></td>
    <td>fa fa-magic</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-magnet"></span></center></td>
    <td>fa fa-magnet</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-mail-forward"></span></center></td>
    <td>fa fa-mail-forward</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-mail-reply"></span></center></td>
    <td>fa fa-mail-reply</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-mail-reply-all"></span></center></td>
    <td>fa fa-mail-reply-all</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-male"></span></center></td>
    <td>fa fa-male</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-map"></span></center></td>
    <td>fa fa-map</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-map-o"></span></center></td>
    <td>fa fa-map-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-map-pin"></span></center></td>
    <td>fa fa-map-pin</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-map-signs"></span></center></td>
    <td>fa fa-map-signs</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-map-marker"></span></center></td>
    <td>fa fa-map-marker</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-meh-o"></span></center></td>
    <td>fa fa-meh-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-microphone"></span></center></td>
    <td>fa fa-microphone</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-microphone-slash"></span></center></td>
    <td>fa fa-microphone-slash</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-minus"></span></center></td>
    <td>fa fa-minus</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-minus-circle"></span></center></td>
    <td>fa fa-minus-circle</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-minus-square"></span></center></td>
    <td>fa fa-minus-square</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-minus-square-o"></span></center></td>
    <td>fa fa-minus-square-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-mobile"></span></center></td>
    <td>fa fa-mobile</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-mobile-phone"></span></center></td>
    <td>fa fa-mobile-phone</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-money"></span></center></td>
    <td>fa fa-money</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-moon-o"></span></center></td>
    <td>fa fa-moon-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-mortar-board"></span></center></td>
    <td>fa fa-mortar-board</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-motorcycle"></span></center></td>
    <td>fa fa-motorcycle</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-mouse-pointer"></span></center></td>
    <td>fa fa-mouse-pointer</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-music"></span></center></td>
    <td>fa fa-music</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-navicon"></span></center></td>
    <td>fa fa-navicon</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-newspaper-o"></span></center></td>
    <td>fa fa-newspaper-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-object-group"></span></center></td>
    <td>fa fa-object-group</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-object-ungroup"></span></center></td>
    <td>fa fa-object-ungroup</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-paint-brush"></span></center></td>
    <td>fa fa-paint-brush</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-paper-plane"></span></center></td>
    <td>fa fa-paper-plane</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-paper-plane-o"></span></center></td>
    <td>fa fa-paper-plane-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-paw"></span></center></td>
    <td>fa fa-paw</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-pencil"></span></center></td>
    <td>fa fa-pencil</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-pencil-square"></span></center></td>
    <td>fa fa-pencil-square</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-pencil-square-o"></span></center></td>
    <td>fa fa-pencil-square-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-phone"></span></center></td>
    <td>fa fa-phone</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-phone-square"></span></center></td>
    <td>fa fa-phone-square</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-photo"></span></center></td>
    <td>fa fa-photo</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-picture-o"></span></center></td>
    <td>fa fa-picture-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-pie-chart"></span></center></td>
    <td>fa fa-pie-chart</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-plane"></span></center></td>
    <td>fa fa-plane</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-plug"></span></center></td>
    <td>fa fa-plug</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-plus"></span></center></td>
    <td>fa fa-plus</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-plus-circle"></span></center></td>
    <td>fa fa-plus-circle</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-plus-square"></span></center></td>
    <td>fa fa-plus-square</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-plus-square-o"></span></center></td>
    <td>fa fa-plus-square-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-power-off"></span></center></td>
    <td>fa fa-power-off</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-print"></span></center></td>
    <td>fa fa-print</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-puzzle-piece"></span></center></td>
    <td>fa fa-puzzle-piece</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-qrcode"></span></center></td>
    <td>fa fa-qrcode</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-question"></span></center></td>
    <td>fa fa-question</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-question-circle"></span></center></td>
    <td>fa fa-question-circle</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-quote-left"></span></center></td>
    <td>fa fa-quote-left</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-quote-right"></span></center></td>
    <td>fa fa-quote-right</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-random"></span></center></td>
    <td>fa fa-random</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-recycle"></span></center></td>
    <td>fa fa-recycle</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-refresh"></span></center></td>
    <td>fa fa-refresh</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-registered"></span></center></td>
    <td>fa fa-registered</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-remove"></span></center></td>
    <td>fa fa-remove</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-reorder"></span></center></td>
    <td>fa fa-reorder</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-reply"></span></center></td>
    <td>fa fa-reply</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-reply-all"></span></center></td>
    <td>fa fa-reply-all</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-retweet"></span></center></td>
    <td>fa fa-retweet</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-road"></span></center></td>
    <td>fa fa-road</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-rocket"></span></center></td>
    <td>fa fa-rocket</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-rss"></span></center></td>
    <td>fa fa-rss</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-rss-square"></span></center></td>
    <td>fa fa-rss-square</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-search"></span></center></td>
    <td>fa fa-search</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-search-minus"></span></center></td>
    <td>fa fa-search-minus</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-search-plus"></span></center></td>
    <td>fa fa-search-plus</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-send"></span></center></td>
    <td>fa fa-send</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-send-o"></span></center></td>
    <td>fa fa-send-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-server"></span></center></td>
    <td>fa fa-server</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-share"></span></center></td>
    <td>fa fa-share</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-share-alt"></span></center></td>
    <td>fa fa-share-alt</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-share-alt-square"></span></center></td>
    <td>fa fa-share-alt-square</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-share-square"></span></center></td>
    <td>fa fa-share-square</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-share-square-o"></span></center></td>
    <td>fa fa-share-square-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-shield"></span></center></td>
    <td>fa fa-shield</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-ship"></span></center></td>
    <td>fa fa-ship</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-shopping-cart"></span></center></td>
    <td>fa fa-shopping-cart</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sign-in"></span></center></td>
    <td>fa fa-sign-in</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sign-out"></span></center></td>
    <td>fa fa-sign-out</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-signal"></span></center></td>
    <td>fa fa-signal</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sitemap"></span></center></td>
    <td>fa fa-sitemap</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sliders"></span></center></td>
    <td>fa fa-sliders</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-smile-o"></span></center></td>
    <td>fa fa-smile-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-soccer-ball-o"></span></center></td>
    <td>fa fa-soccer-ball-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sort"></span></center></td>
    <td>fa fa-sort</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sort-alpha-asc"></span></center></td>
    <td>fa fa-sort-alpha-asc</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sort-alpha-desc"></span></center></td>
    <td>fa fa-sort-alpha-desc</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sort-amount-asc"></span></center></td>
    <td>fa fa-sort-amount-asc</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sort-amount-desc"></span></center></td>
    <td>fa fa-sort-amount-desc</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sort-asc"></span></center></td>
    <td>fa fa-sort-asc</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sort-desc"></span></center></td>
    <td>fa fa-sort-desc</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sort-down"></span></center></td>
    <td>fa fa-sort-down</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sort-numeric-asc"></span></center></td>
    <td>fa fa-sort-numeric-asc</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sort-numeric-desc"></span></center></td>
    <td>fa fa-sort-numeric-desc</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sort-up"></span></center></td>
    <td>fa fa-sort-up</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-space-shuttle"></span></center></td>
    <td>fa fa-space-shuttle</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-spinner"></span></center></td>
    <td>fa fa-spinner</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-spoon"></span></center></td>
    <td>fa fa-spoon</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-square"></span></center></td>
    <td>fa fa-square</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-square-o"></span></center></td>
    <td>fa fa-square-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-star"></span></center></td>
    <td>fa fa-star</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-star-half"></span></center></td>
    <td>fa fa-star-half</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-star-half-empty"></span></center></td>
    <td>fa fa-star-half-empty</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-star-half-full"></span></center></td>
    <td>fa fa-star-half-full</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-star-half-o"></span></center></td>
    <td>fa fa-star-half-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-star-o"></span></center></td>
    <td>fa fa-star-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sticky-note"></span></center></td>
    <td>fa fa-sticky-note</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sticky-note-o"></span></center></td>
    <td>fa fa-sticky-note-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-street-view"></span></center></td>
    <td>fa fa-street-view</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-suitcase"></span></center></td>
    <td>fa fa-suitcase</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-sun-o"></span></center></td>
    <td>fa fa-sun-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-support"></span></center></td>
    <td>fa fa-support</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-tablet"></span></center></td>
    <td>fa fa-tablet</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-tachometer"></span></center></td>
    <td>fa fa-tachometer</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-tag"></span></center></td>
    <td>fa fa-tag</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-tags"></span></center></td>
    <td>fa fa-tags</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-tasks"></span></center></td>
    <td>fa fa-tasks</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-taxi"></span></center></td>
    <td>fa fa-taxi</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-television"></span></center></td>
    <td>fa fa-television</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-terminal"></span></center></td>
    <td>fa fa-terminal</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-thumb-tack"></span></center></td>
    <td>fa fa-thumb-tack</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-thumbs-down"></span></center></td>
    <td>fa fa-thumbs-down</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-thumbs-o-up"></span></center></td>
    <td>fa fa-thumbs-o-up</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-thumbs-up"></span></center></td>
    <td>fa fa-thumbs-up</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-ticket"></span></center></td>
    <td>fa fa-ticket</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-times"></span></center></td>
    <td>fa fa-times</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-times-circle"></span></center></td>
    <td>fa fa-times-circle</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-times-circle-o"></span></center></td>
    <td>fa fa-times-circle-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-tint"></span></center></td>
    <td>fa fa-tint</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-toggle-down"></span></center></td>
    <td>fa fa-toggle-down</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-toggle-left"></span></center></td>
    <td>fa fa-toggle-left</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-toggle-right"></span></center></td>
    <td>fa fa-toggle-right</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-toggle-up"></span></center></td>
    <td>fa fa-toggle-up</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-toggle-off"></span></center></td>
    <td>fa fa-toggle-off</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-toggle-on"></span></center></td>
    <td>fa fa-toggle-on</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-trademark"></span></center></td>
    <td>fa fa-trademark</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-trash"></span></center></td>
    <td>fa fa-trash</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-trash-o"></span></center></td>
    <td>fa fa-trash-o</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-tree"></span></center></td>
    <td>fa fa-tree</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-trophy"></span></center></td>
    <td>fa fa-trophy</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-truck"></span></center></td>
    <td>fa fa-truck</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-tty"></span></center></td>
    <td>fa fa-tty</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-tv"></span></center></td>
    <td>fa fa-tv</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-umbrella"></span></center></td>
    <td>fa fa-umbrella</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-university"></span></center></td>
    <td>fa fa-university</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-unlock"></span></center></td>
    <td>fa fa-unlock</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-unlock-alt"></span></center></td>
    <td>fa fa-unlock-alt</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-unsorted"></span></center></td>
    <td>fa fa-unsorted</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-upload"></span></center></td>
    <td>fa fa-upload</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-user"></span></center></td>
    <td>fa fa-user</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-user-plus"></span></center></td>
    <td>fa fa-user-plus</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-user-secret"></span></center></td>
    <td>fa fa-user-secret</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-user-times"></span></center></td>
    <td>fa fa-user-times</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-users"></span></center></td>
    <td>fa fa-users</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-video-camera"></span></center></td>
    <td>fa fa-video-camera</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-volume-down"></span></center></td>
    <td>fa fa-volume-down</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-volume-off"></span></center></td>
    <td>fa fa-volume-off</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-volume-up"></span></center></td>
    <td>fa fa-volume-up</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-warning"></span></center></td>
    <td>fa fa-warning</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-wheelchair"></span></center></td>
    <td>fa fa-wheelchair</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-wifi"></span></center></td>
    <td>fa fa-wifi</td>
  </tr>
  <tr>
    <td><center><span class="fa fa-wrench"></span></center></td>
    <td>fa fa-wrench</td>
  </tr>

  </tbody>
</table>

		
				<script type="text/javascript">
					$(function()
					{
						$( ".dp" ).datepicker({
							dateFormat : "yy-mm-dd",
							showAnim : "fold"
						});
					});
				</script>
			<?php
		break;

		default :
			echo"<div class='w3-container w3-small w3-pale-green w3-leftbar w3-border-green'>
				<h4 style='margin-bottom:0;padding-bottom:0;'>Data Modul</h4>
				<p style='margin-top:0;padding-top:0;'><i>Data Semua Modul</i></p>
			</div>";

			//flash('example_message');

			echo"<table style='margin-top:12px;'>
				<tr>
					<td>
						<form class='w3-tiny' action='' method='GET'>	
							<input type='hidden' name='mod' value='modul'>
							<div class='w3-row'>
								<div class='w3-col s1'>
									<label class='w3-label'>Search</label>
								</div>
								<div class='w3-col s2'>
									<select name='field' class='w3-select w3-padding'>
										<option value=''>- Pilih -</option>
										<option value='nama_modul'>Nama Modul</option>
										<option value='link_menu'>Link Menu</option>
										<option value='posisi'>Posisi</option>
										<option value='icon_menu'>Icon</option></select>
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
					<td align='right'><a href='med.php?mod=modul' class='w3-btn w3-dark-grey w3-small'><i class='fa fa-refresh'></i> Refresh</a>
					<a href='med.php?mod=modul&act=form' class='w3-btn w3-small w3-blue'><i class='fa fa-file'></i> Tambah</a></td>
				</tr>
				
			</table>";

			echo"<div style='margin-top:12px;margin-bottom:12px;'>
			<table class='w3-table w3-striped w3-bordered w3-small w3-hoverable tbl'>
				<thead>
					<tr class='w3-yellow'>
						<th>No</th>
						<th>Menu</th>
						<th>Nama Modul</th>
						<th>Link Menu</th>
						<th>Posisi</th>
						<th>Icon Menu</th>
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

				$query = "SELECT * FROM modul ";

				$q 	= "SELECT * FROM modul";

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
				

				$sql_kul = mysqli_query($conn, $query);
				$fd_kul = mysqli_num_rows($sql_kul);

				if($fd_kul > 0)
				{
					$no = $posisi + 1;
					while ($m = mysqli_fetch_assoc($sql_kul)) {
						echo"<tr>
						
							<td>$no</td>
							<td>".nama_m($m['id_menu'])."</td>
							<td>$m[nama_modul]</td>
							<td>$m[link_menu]</td>
							<td>$m[posisi]</td>
							<td>$m[icon_menu]</td>
							<td><a href='med.php?mod=modul&act=form&id=$m[id_modul]'><i class='fa fa-pencil-square w3-large w3-text-blue'></i></a> 
							<a href='$aksi?mod=modul&act=hapus&id=$m[id_modul]' onclick=\"return confirm('Yakin hapus data');\"><i class='fa fa-trash w3-large w3-text-red'></i></a></td>
						
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
						<td colspan='7'><div class='w3-center'><i>Data Modul Not Found.</i></div></td>
					</tr>";
				}
				

				echo"</tbody>

			</table></div>";

			echo"<div class='w3-row'>
				<div class='w3-col s1'>
					<form class='w3-tiny' action='' method='GET'>
						<input type='hidden' name='mod' value='modul'>";
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
		break;
	}

	
?>