<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr bgcolor="#CCCCCC">
    <td height="36" align="center"><strong>NIK</strong></td>
    <td align="center"><strong>NAMA</strong></td>
    <td align="center"><strong>DIVISI</strong></td>
    <td align="center"><strong>JABATAN</strong></td>
    <td align="center"><strong>STATUS</strong></td>
    <td align="center"><strong>TINDAK LANJUT</strong></td>
    <td align="center"><strong>PIC</strong></td>
  </tr>
  <?php foreach($detail_job_desk as $v) { 
								if($v->status == '0'){
									$status = 'Proses';
									$tr = 'warning';
								}if($v->status == '1'){
									$status = 'Selesai';
									$tr = 'success';
								}if($v->status == '2'){
									$status = 'Extra';
									$tr = 'danger';
								}
								?>
  <tr>
                                        <td align="center"><?php echo $v->nik; ?></td>
                                        <td align="center"><?php echo $v->nama_pribadi; ?></td>
                                        <td align="center"><?php echo $v->master_divisi; ?></td>
                                        <td align="center"><?php echo $v->master_jabatan; ?></td>
                                        <td align="center"><?php echo $status; ?></td>
                                        <td align="center"><?php echo $v->tindakan; ?></td>
                                        <td align="center"><?php echo $v->pic; ?></td>
                                    </tr>
								<?php } ?>
</table>
<br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>- <strong>FOKUS</strong></td>
  </tr>
  <tr>
    <td><?php echo $v->fokus; ?></td>
  </tr>
</table>

</body>
</html>