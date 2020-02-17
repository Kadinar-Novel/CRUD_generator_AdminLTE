<?php


	function nama_m($id)
	{
		include "conn.php";
		$sql = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu = '$id'") or die(mysqli_error());
		$m = mysqli_fetch_assoc($sql);

		return $m['nama_menu'];
	}

	function anti_inject($data)
	{
		$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
		return $filter_sql;
	}

	function tukar_tgl($datenow){
	$tmp = explode('-', $datenow);
	$datenow = $tmp[2]."-".$tmp[1]."-".$tmp[0];
	return	$datenow;
}

function rupiah($angka){
	$rupiah="";
	$rp=strlen($angka);
	while ($rp>3)
	{
	$rupiah = ".". substr($angka,-3). $rupiah;
	$s=strlen($angka) - 3;
	$angka=substr($angka,0,$s);
	$rp=strlen($angka);
	}
	$rupiah = "Rp." . $angka . $rupiah . ",-";
	return $rupiah;
}

function nominal($angka){
	$rupiah="";
	$rp=strlen($angka);
	while ($rp>3)
	{
	$rupiah = ".". substr($angka,-3). $rupiah;
	$s=strlen($angka) - 3;
	$angka=substr($angka,0,$s);
	$rp=strlen($angka);
	}
	$rupiah = $angka . $rupiah . ",-";
	return $rupiah;
}

function separator($angka){
	$rupiah="";
	$rp=strlen($angka);
	while ($rp>3)
	{
	$rupiah = ".". substr($angka,-3). $rupiah;
	$s=strlen($angka) - 3;
	$angka=substr($angka,0,$s);
	$rp=strlen($angka);
	}
	$rupiah = $angka . $rupiah ;
	return $rupiah;
}

function jmlWaktu($jam_masuk,$jam_keluar) { 
	list($h,$m,$s) = explode(".",$jam_masuk); 
	$dtAwal = mktime($h,$m,"1","1"); 
	list($h,$m,$s) = explode(".",$jam_keluar); 
	$dtAkhir = mktime($h,$m,"1","1"); 
	$dtSelisih = $dtAkhir-$dtAwal; 
	$totalmenit = $dtSelisih/60; 
	$jam = explode(".",$totalmenit/60); 
	$sisamenit = ($totalmenit/60)-$jam[0]; 
	$sisamenit2 = $sisamenit*60; 
	$jml_jam = $jam[0]; 
	return $jml_jam.".".$sisamenit2; 
}

function tampil_tgl($cdate){
	$dayarr = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
	$montharr = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei',   'Juni',   'Juli',   'Agustus',   'September',   'Oktober',   'November',   'Desember');
	
	$cdate = mktime(0, 0, 0, date('m',strtotime($cdate)),date('d',strtotime($cdate)),date('Y',strtotime($cdate)));
	$cdate = $dayarr[intval(date('w', $cdate))] .', '.date('d', $cdate) .' '. $montharr[intval(date('n', $cdate))].' '.date('Y', $cdate);
	return $cdate;		
}


function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}


?>