<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DETAIL DATA PENGIRIMAN</title>
</head>

<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<?php foreach($detail_data_pengiriman as $v) { ?>
  <tr>
    <td width="24%" rowspan="3"><img src="<?php echo base_url(); ?>assets/images/jte.png" width="156" height="63" /></td>
    <td width="44%" rowspan="3"><strong>PT. JASA TITIPAN EXPRESS</strong><br/>
      Jl. Bendungan Jago No. 36 Kemayoran<br/>
      JAKARTA - PUSAT<br/>
      Tlp : (021)4249678 <br/>
    www.jatiexpress.co.id</td>
    <td width="9%" height="31" align="center">AWB - NO</td>
    <td width="23%" align="center"><strong><?php echo $v->awb_no; ?></strong></td>
  </tr>
  <tr>
    <td height="37" align="center">SO - NO</td>
    <td align="center"><strong><?php echo $v->no_so; ?></strong></td>
  </tr>
  <tr>
    <td height="24" align="center">RESI</td>
    <td align="center"><strong><?php echo $v->pickup_info; ?></strong></td>
  </tr>
</table>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%" align="center">SHIPPER</td>
    <td width="49%" align="center">CONSIGNE</td>
    <td width="13%" align="center">DJB</td>
    <td width="13%" align="center">JKT</td>
  </tr>
  <tr>
    <td rowspan="2" align="center"><?php echo $v->shipper_name; ?> <br/><br/> <?php echo $v->master_asal; ?></td>
		
    <td rowspan="2" align="center"><?php echo $v->consignee; ?> <br/><br/> <?php echo $v->tujuan; ?></td>
	
    <td colspan="2" align="center">ISI BARCODE</td>
  </tr>
  <tr>
    <td>Weight <br/ > Weight VM <br/> Colly</td>
    <td>: <?php echo $v->weight; ?><br/>
      :-<br/>
    : <?php echo $v->colly; ?></td>
  </tr>
</table>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td rowspan="2">Name : <?php echo $v->created_by; ?><br/>Date/Time : <?php echo $v->tanggal; ?><br/>Signature :</td>
    <td rowspan="2">Pickup By : Wixi Prayoga<br/> Date/Time : <br/>Signature :</td>
    <td rowspan="2">Cnee : <br/>
       Date/Time : <br/>Signature :</td>
    <td>Total Charge</td>
    <td>Service</td>
    <td>Charges ct:</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">1</td>
  </tr>
  <?php } ?>
</table>

</body>
</html>