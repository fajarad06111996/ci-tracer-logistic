<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CETAK LAPORAN MANIFEST</title>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%"><img src="<?php echo base_url(); ?>/assets/images/jte.png" width="199" height="69" /></td>
    <td width="75%" align="center"><p>DATA LIST MANIFEST</p></td>
  </tr>
</table>
<HR/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php foreach($cetak_laporan_manifest_header as $header) { ?>
  <tr>
    <td width="11%">Kode Manifest</td>
    <td width="39%">: <?php echo $header->kode_manifest; ?></td>
    <td width="9%">Asal </td>
    <td width="41%">:<?php echo $header->asal; ?></td>
  </tr>
  <tr>
    <td>Pengemudi</td>
    <td>:<?php echo $header->pengemudi; ?></td>
    <td>Tujuan</td>
    <td>:<?php echo $header->tujuan; ?></td>
  </tr>
  <tr>
    <td>No Polisi</td>
    <td>:<?php echo $header->nopol; ?></td>
    <td>Date</td>
    <td>:<?php echo $header->created_on; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
</table>
<br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="26" align="center" bgcolor="#0033CC"><b>No</b></td>
    <td align="center" bgcolor="#0033CC"><b>No Resi</b></td>
    <td align="center" bgcolor="#0033CC"><b>NO AWB</b></td>
    <td align="center" bgcolor="#0033CC"><b>NO SO</b></td>
    <td align="center" bgcolor="#0033CC"><b>Berat</b></td>
    <td align="center" bgcolor="#0033CC"><b>QTY</b></td>
    <td align="center" bgcolor="#0033CC"><b>Volume</b></td>
    <td align="center" bgcolor="#0033CC"><b>Vendor</b></td>
  </tr>
  <?php $no=1; foreach($cetak_laporan_manifest as $v) { ?>
  <tr>
    <td align="center"><?php echo $no; ?></td>
    <td align="center"><?php echo $v->pickup_info; ?></td>
    <td align="center"><?php echo $v->awb_no; ?></td>
    <td align="center"><?php echo $v->no_so; ?></td>
    <td align="center"><?php echo $v->weight; ?> <?php echo $v->satuan_weight; ?></td>
    <td align="center"><?php echo $v->colly; ?> <?php echo $v->satuan_colly; ?></td>
    <td align="center"><?php echo $v->volume; ?> <?php echo $v->satuan_volume; ?></td>
    <td align="center"><?php echo $v->vendor_name; ?></td>
  </tr>
  <?php $no++; } ?>
</table>
<br/><br/>
<br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%" align="center">PIC</td>
    <td width="50%">&nbsp;</td>
    <td width="25%" align="center">APPROVED</td>
  </tr>
  <tr>
    <td height="72"></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td align="center"><HR/><?php echo $nama_pic; ?></td>
    <td>&nbsp;</td>
    <td align="center"><HR/><?php echo $approved; ?></td>
  </tr>
</table>


</body>
<br/><br/>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%"><img src="<?php echo base_url(); ?>/assets/images/jte.png" width="199" height="69" /></td>
    <td width="75%" align="center"><p>DATA LIST MANIFEST</p></td>
  </tr>
</table>
<HR/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php foreach($cetak_laporan_manifest_header as $header) { ?>
  <tr>
    <td width="11%">Kode Manifest</td>
    <td width="39%">: <?php echo $header->kode_manifest; ?></td>
    <td width="9%">Asal </td>
    <td width="41%">:<?php echo $header->asal; ?></td>
  </tr>
  <tr>
    <td>Pengemudi</td>
    <td>:<?php echo $header->pengemudi; ?></td>
    <td>Tujuan</td>
    <td>:<?php echo $header->tujuan; ?></td>
  </tr>
  <tr>
    <td>No Polisi</td>
    <td>:<?php echo $header->nopol; ?></td>
    <td>Date</td>
    <td>:<?php echo $header->created_on; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
</table>
<br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="26" align="center" bgcolor="#0033CC"><b>No</b></td>
    <td align="center" bgcolor="#0033CC"><b>No Resi</b></td>
    <td align="center" bgcolor="#0033CC"><b>NO AWB</b></td>
    <td align="center" bgcolor="#0033CC"><b>NO SO</b></td>
    <td align="center" bgcolor="#0033CC"><b>Berat</b></td>
    <td align="center" bgcolor="#0033CC"><b>QTY</b></td>
    <td align="center" bgcolor="#0033CC"><b>Volume</b></td>
    <td align="center" bgcolor="#0033CC"><b>Vendor</b></td>
    <td align="center" bgcolor="#0033CC"><b>Harga</b></td>
  </tr>
  <?php $no=1; foreach($cetak_laporan_manifest as $v) { ?>
  <tr>
    <td align="center"><?php echo $no; ?></td>
    <td align="center"><?php echo $v->pickup_info; ?></td>
    <td align="center"><?php echo $v->awb_no; ?></td>
    <td align="center"><?php echo $v->no_so; ?></td>
    <td align="center"><?php echo $v->weight; ?> <?php echo $v->satuan_weight; ?></td>
    <td align="center"><?php echo $v->colly; ?> <?php echo $v->satuan_colly; ?></td>
    <td align="center"><?php echo $v->volume; ?> <?php echo $v->satuan_volume; ?></td>
    <td align="center"><?php echo $v->vendor_name; ?></td>
    <td align="center">Rp. <?php echo number_format($v->harga,0,',','.'); ?></td>
  </tr>
  <?php $no++; } ?>
</table>
<br/><br/>
<br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%" align="center">PIC</td>
    <td width="50%">&nbsp;</td>
    <td width="25%" align="center">APPROVED</td>
  </tr>
  <tr>
    <td height="72"></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td align="center"><HR/><?php echo $nama_pic; ?></td>
    <td>&nbsp;</td>
    <td align="center"><HR/><?php echo $approved; ?></td>
  </tr>
</table>


</body>

</html>