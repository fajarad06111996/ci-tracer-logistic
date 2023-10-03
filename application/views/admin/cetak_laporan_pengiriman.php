<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%"><img src="<?php echo base_url(); ?>/assets/images/jte.png" width="199" height="69" /></td>
    <td width="75%" align="center"><strong>DATA LAPORAN PENGIRIMAN </strong><br/>
    Jl. Bandung Jago No. 36, Kamyoran <br/>JAKARTA - PUSAT <br/>telp : (021) 4249678<br/>www.jatiexpres.co.id</td>
  </tr>
</table>
<HR/>
Dari Tanggal <b><?php echo tgl_indo($dari_tanggal); ?></b> Sampai <b><?php echo tgl_indo($sampai_tanggal); ?></b>
<br/><br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="60" align="center" bgcolor="#CCCCCC">No</td>
    <td align="center" bgcolor="#CCCCCC">Resi</td>
    <td align="center" bgcolor="#CCCCCC">Pickup Date</td>
    <td align="center" bgcolor="#CCCCCC">AWB</td>
    <td align="center" bgcolor="#CCCCCC">SO</td>
    <td align="center" bgcolor="#CCCCCC">Shipper</td>
    <td align="center" bgcolor="#CCCCCC">Consignee</td>
    <td align="center" bgcolor="#CCCCCC">Asal</td>
    <td align="center" bgcolor="#CCCCCC">Tujuan</td>
    <td align="center" bgcolor="#CCCCCC">Costumer</td>
    <td align="center" bgcolor="#CCCCCC">Berat</td>
    <td align="center" bgcolor="#CCCCCC">QTY</td>
    <td align="center" bgcolor="#CCCCCC">Volume</td>
    <td align="center" bgcolor="#CCCCCC">Moda</td>
    <td align="center" bgcolor="#CCCCCC">Tanggal</td>
    <td align="center" bgcolor="#CCCCCC">ETA</td>
  </tr>
  <?php $no=1; foreach($cetak_laporan_pengiriman as $v) { ?>
  <tr>
    <td align="center"><?php echo $no; ?></td>
    <td align="center"><?php echo $v->pickup_info; ?></td>
    <td align="center"><?php echo $v->pickup_date; ?></td>
    <td align="center"><?php echo $v->awb_no; ?></td>
    <td align="center"><?php echo $v->no_so; ?></td>
    <td align="center"><?php echo $v->shipper_name; ?></td>
    <td align="center"><?php echo $v->consignee; ?></td>
    <td align="center"><?php echo $v->master_asal; ?></td>
    <td align="center"><?php echo $v->tujuan; ?></td>
    <td align="center"><?php echo $v->costumer_name; ?></td>
    <td align="center"><?php echo $v->weight; ?></td>
    <td align="center"><?php echo $v->colly; ?></td>
    <td align="center"><?php echo $v->volume; ?></td>
    <td align="center"><?php echo $v->moda; ?></td>
    <td align="center"><?php echo $v->tanggal; ?></td>
    <td align="center"><?php echo $v->eta; ?></td>
  </tr>
  <?php $no++; } ?>
</table>

</body>
</html>