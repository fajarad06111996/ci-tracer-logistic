<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $judul; ?></title>
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #474e5d;
  font-family: Helvetica, sans-serif;
}

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: white;
  top: 0;
  bottom: 0;
  left: 25%;
  margin-left: -3px;
}

/* Container around content */
.container {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.container::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -17px;
  background-color: white;
  border: 4px solid #FF9F55;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.left {
  left: 0;
}

/* Place the container to the right */
.right {
  left: 25%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid white;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
  left: -16px;
}

/* The actual content */
.content {
  padding: 20px 30px;
  background-color: white;
  position: relative;
  border-radius: 6px;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline::after {
  left: 31px;
  }
  
  /* Full-width containers */
  .container {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .container::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
  left: 15px;
  }
  
  /* Make all right containers behave like the left ones */
  .right {
  left: 0%;
  }
}
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="37" width="15%" bgcolor="#FFFFFF"><img src="<?php echo base_url(); ?>/assets/images/jte.png" width="236" height="86" /></td>
    <td bgcolor="#FFFFFF" width="85%" align="center"><b> TRACER PENGIRIMAN <br/><br/><?php echo $cari; ?> </b></td>
  </tr>
</table>
<br/>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#FFFFFF" align="center">Shipper<hr/></td>
    <td bgcolor="#FFFFFF" align="center">Consignee <hr/></td>
    <td bgcolor="#FFFFFF" align="center">Asal <hr/></td>
    <td bgcolor="#FFFFFF" align="center">Tujuan <hr/></td>
    <td bgcolor="#FFFFFF" align="center">Deskripsi <hr/></td>
    <td bgcolor="#FFFFFF" align="center">Berat <hr/></td>
    <td bgcolor="#FFFFFF" align="center">QTY <hr/></td>
    <td bgcolor="#FFFFFF" align="center">Volume <hr/></td>
  </tr>
  <?php foreach($tracer_pengiriman_header as $header) { ?>
  <tr>
    <td bgcolor="#FFFFFF" align="center"><?php echo $header->shipper_name; ?></td>
    <td bgcolor="#FFFFFF" align="center"><?php echo $header->consignee; ?></td>
    <td bgcolor="#FFFFFF" align="center"><?php echo $header->master_asal; ?></td>
    <td bgcolor="#FFFFFF" align="center"><?php echo $header->tujuan; ?></td>
    <td bgcolor="#FFFFFF" align="center"><?php echo $header->remarks; ?></td>
    <td bgcolor="#FFFFFF" align="center"><?php echo $header->weight; ?> (<?php echo $header->satuan_weight; ?>)</td>
    <td bgcolor="#FFFFFF" align="center"><?php echo $header->colly; ?> (<?php echo $header->satuan_colly; ?>)</td>
    <td bgcolor="#FFFFFF" align="center"><?php echo $header->volume; ?> (<?php echo $header->satuan_volume; ?>)</td>
  </tr>
  <?php } ?>
</table>

<br/>
<div class="timeline">
<?php foreach($tracer_pengiriman as $v) { 
if($v->status_log_asal == '1'){
										$status = 'PICK UP';
									}if($v->status_log_asal == '2'){
										$status = 'DEPARTED';
									}if($v->status_log_asal == '3'){
										$status = 'TRANSIT';
									}if($v->status_log_asal == '4'){
										$status = 'ARRAVED';
									}if($v->status_log_asal == '5'){
										$status = 'DELIVERED';
									}if($v->status_log_asal == '6'){
										$status = 'FINISH';
									}
?>
  <div class="container right">
    <div class="content">
      <h2><?php echo $v->tanggal_log_asal; ?></h2>
      <p>(<?php echo $v->kode_asal; ?>) <?php echo $v->nama_asal; ?></p>
	  <?php if($v->status_log_asal != '6') { ?>
      <p><?php echo $status; ?> by <b><?php echo $v->pic_pengiriman; ?> </b></p>
	  <?php } ?>
	  <?php if($v->status_log_asal == '6') { ?>
      <p><?php echo $status; ?> Recaived By <b><?php echo $v->recaived_by; ?> </b></p>
	  <?php } ?>
    </div>
  </div>
<?php } ?>
</div>
<br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="37" bgcolor="#FFFFFF" align="center"><a href="<?php echo base_url('admin/form_tracer'); ?>"> Kembali </a></td>
  </tr>
</table>
</body>
</html>