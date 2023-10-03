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
<div class="timeline">
<?php foreach($tracer_pengiriman as $v) { 
if($v->status_log_tujuan == '1'){
	$status = 'Keberangkatan';
}if($v->status_log_tujuan == '2'){
	$status = 'Kedatangan';
}if($v->status_log_tujuan == '3'){
	$status = 'Selesai';
}
?>
  <div class="container right">
    <div class="content">
      <h2><?php echo $v->tanggal_log_tujuan; ?></h2>
      <p>(<?php echo $v->kode_keberangkatan; ?>) <?php echo $v->nama_keberangkatan; ?> &#8594; (<?php echo $v->kode_tujuan; ?>) <?php echo $v->nama_tujuan; ?></p>
      <p><?php echo $status; ?></p>
    </div>
  </div>
<?php } ?>
</div>
<br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="37" bgcolor="#FFFFFF" align="center"><a href="<?php echo base_url('tracer/index'); ?>"> Kembali </a></td>
  </tr>
</table>
</body>
</html>