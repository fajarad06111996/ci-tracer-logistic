<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CETAK LAPORAN PENGIRIMAN</title>
<link rel="icon" href="<?php echo base_url(); ?>assets/images/jte.ico" type="image/x-icon">
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30%"><img src="<?php echo base_url(); ?>/assets/images/jte.png" width="100" height="100" /></td>
    <td width="70%">Jl. Bendungan Jago No. 36 Kemayoran<br/> Jakarta Pusat - JAKARTA <br/>Tlp : 021. 4347698 <br/>www.jatiexpress.co.id</td>
  </tr>
</table>
<br/>
<table width="38%" border="1" cellspacing="0" cellpadding="0">
<?php foreach($tampil_invoice as $ti) { ?>
  <tr>
    <td width="29%">No Invoice</td>
    <td width="71%" align="center"><?php echo $ti->kode_invoice; ?></td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td align="center"><?php echo tgl_indo($ti->tanggal_invoice); ?></td>
  </tr>
</table>

<br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="23%" bgcolor="#0066CC">Kepada</td>
    <td width="1%">&nbsp;</td>
    <td width="76%">&nbsp;</td>
  </tr>
  <tr>
    <td>Nama Costumer</td>
    <td>:</td>
    <td><?php echo $ti->costumer_name; ?></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><?php echo $ti->address; ?></td>
  </tr>
  <tr>
    <td>Kota</td>
    <td>:</td>
    <td><?php echo $ti->city; ?></td>
  </tr>
  <!-- <tr>
    <td>NPWP</td>
    <td>:</td>
    <td><?php //echo $ti->npwp; ?></td>
  </tr> -->
</table>
<?php } ?>

<br/>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td height="32" align="center" bgcolor="#0066CC"><b>Tanggal</b></td>
    <td align="center" bgcolor="#0066CC"><b>Asal</b></td>
    <td align="center" bgcolor="#0066CC"><b>Tujuan</b></td>
    <td align="center" bgcolor="#0066CC"><b>Deskripsi</b></td>
    <td align="center" bgcolor="#0066CC"><b>QTY</b></td>
    <td align="center" bgcolor="#0066CC"><b>Berat</b></td>
    <td align="center" bgcolor="#0066CC"><b>Volume</b></td>
    <td align="center" bgcolor="#0066CC"><b>Harga</b></td>
    <td align="center" bgcolor="#0066CC"><b>Total</b></td>
  </tr>
  <?php foreach($cetak_laporan_invoice as $v) {
	  if($v->status_muat == 'QTY'){
		  $harga1 = $v->colly * $v->harga_baseon;
		  $totcolly[] = $harga1;
		  $jumlahcolly = array_sum($totcolly);
	  }if($v->status_muat == 'BERAT'){
		  $harga2 = $v->weight * $v->harga_baseon;
		  $totweight[] = $v->weight;
		  $jumlahweight = array_sum($totweight);
		  $tothargaweight[] = $v->harga;
		  $jumlahhargaweight = array_sum($tothargaweight);
	  }if($v->status_muat == 'VOLUME'){
		  $harga3 = $v->volume * $v->harga_baseon;
		  $totvolume[] = $v->volume;
		  $jumlahvolume = array_sum($totvolume);
		  $tothargavolume[] = $v->harga;
		  $jumlahhargavolume = array_sum($tothargavolume);
	  }
	   ?>
  <tr>
    <td align="center"><?php echo tgl_indo($v->tanggal); ?></td>
    <td align="center"><?php echo $v->master_asal; ?></td>
    <td align="center"><?php echo $v->tujuan; ?></td>
    <td align="center"><?php echo $v->description; ?></td>
    <td align="center"><?php echo $v->colly; ?></td>
    <td align="center"><?php echo $v->weight; ?></td>
    <td align="center"><?php echo $v->volume; ?></td>
    <td align="center">Rp. <?php echo number_format($v->harga_baseon,0,',','.'); ?></td>
    <?php if($v->status_muat == 'QTY'){ ?>
    <?php $e = $v->colly * $v->harga_baseon; 
	   $f[] = $e;
	   $h = array_sum($f);
	   ?>
    <td align="center">Rp. <?php echo number_format($harga1,0,',','.'); ?></td>
     <?php } ?>
     <?php if($v->status_muat == 'BERAT'){ ?>
       <?php $b = $v->weight * $v->harga_baseon; 
	   $c[] = $b;
	   $d = array_sum($c);
	   ?>
    <td align="center">Rp. <?php echo number_format($harga2,0,',','.'); ?></td>
    <?php } ?>
     <?php if($v->status_muat == 'VOLUME'){ ?>
       <?php $vlm = $v->volume * $v->harga_baseon; 
	   $tv[] = $vlm;
	  $vvv = array_sum($tv);
	   ?>
    <td align="center">Rp. <?php echo number_format($harga3,0,',','.'); ?></td>
    <?php } ?>
  </tr>
  <?php } ?>
</table>
<br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
if($d == ''){
	$xd = '0';
}if($h == ''){
	$xh = '0';
}if($vvv == ''){
	$xv = '0';
}if($d != ''){
	$xd = $d;
}if($h != ''){
	$xh = $h;
}if($vvv != ''){
	$xv = $vvv;
}
$total = $h + $d + $vvv;
 ?>
 <tr>
    <td width="66%"> </td>
    <td width="12%"><b>BERAT</b></td>
    <td width="22%"><b>:Rp. <?php echo number_format($xd,0,',','.'); ?></b></td>
  </tr>
 <tr>
    <td width="66%"> </td>
    <td width="12%"><b>QTY</b></td>
    <td width="22%"><b>:Rp. <?php echo number_format($xh,0,',','.'); ?></b></td>
  </tr>
  
 <tr>
    <td width="66%"> </td>
    <td width="12%"><b>VOLUME</b></td>
    <td width="22%"><b>:Rp. <?php echo number_format($xv,0,',','.'); ?></b></td>
  </tr>
  <tr>
    <td width="66%"> </td>
    <td width="12%"><b>Total</b></td>
    <td width="22%"><b>: Rp. <?php echo number_format($total,0,',','.'); ?></b></td>
  </tr>
</table>
<p>Terbilang : </p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="62%">Catatan</td>
    <td width="38%">&nbsp;</td>
  </tr>
  <tr>
    <td>Pembayaran dapat dilakukan melalui Transfer :</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>No Rek An PT Jasa Titipan Express</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Rek Bank Mandiri : #########</strong></td>
    <td>Approved</td>
  </tr>
  <tr>
    <td height="65">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Konfirmasi Pemayaran</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>Admin : 089530309250</td>
    <td><strong><?php echo $approved; ?></strong></td>
  </tr>
</table>
<br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">Jika ada pernyataan Mohon bisa hubungi kami melalui <br/> 
      email : jatiexpress@gmail.com &amp; Telp : (021)4249678 (Admin) <br/> <strong>Your Partner Logistics</strong></td>
  </tr>
</table>

<p>&nbsp;</p>
</body>
</html>