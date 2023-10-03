<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> DELEVERY </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PILIH RESI
                                
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
						<form action="<?php echo base_url("admin/buat_delevery"); ?>" method="post">
                            <select id="optgroup" class='ms' multiple="multiple" name="id_pengiriman[]">
                                <optgroup label="RESI - TUJUAN" >
								<?php foreach($tampil_data_pengiriman as $v) { 
								// if($v->status_pengiriman == '1'){
									// $status = 'Proses';
								// }if($v->status_pengiriman == '6'){
									// $status = 'Finish';
								// }
								?>
                                    <option value="<?php echo $v->id_pengiriman; ?>"><b><?php echo $v->no_so; ?></b> - (<?php echo $v->master_asal; ?> -> <?php echo $v->tujuan; ?> )</option>
								<?php } ?>
                                </optgroup>
                            </select> <BR/><BR/>
							<div class="row clearfix">
							<div class="col-md-6">
                                    <p>
                                        <b>No Polisi</b>
                                    </p>
                                    
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nopol" class="form-control" placeholder="Nomor Polisi" REQUIRED>
                                        </div>
                                    </div>
                                </div>
								 <div class="col-md-6">
                                    <p>
                                        <b>Pengemudi</b>
                                    </p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pengemudi" class="form-control" placeholder="Pengemudi" REQUIRED>
                                        </div>
                                    </div>

                                </div>
                        </div>
                        </div>
						 
						<div class="modal-footer">
                                    <button class="btn btn-primary btn-block margin-bottom" type="submit"><i class="fa fa-arrow-right"></i>Buat Delevery</button>
                         </div>
						 </form>
                    </div>
                </div>
            </div>
			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Kode Delevery</th>
                                        <th>Tanggal</th>
                                        <th>Pengemudi</th>
                                        <th>Nopol</th>
										<!-- <th>Status Pengiriman</th> -->
										<th>Total Resi</th>
										<th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($tampil_data_delevery as $v) { 
								if($v->status_pengiriman == '1'){
									$pengiriman = 'Pick Up';
									$label = 'label bg-blue';
								}
								if($v->status_pengiriman == '2'){
									$pengiriman = 'Departed';
									$label = 'label bg-green';
								}
								if($v->status_pengiriman == '3'){
									$pengiriman = 'Transit';
									$label = 'label bg-deep-orange';
								}
								if($v->status_pengiriman == '4'){
									$pengiriman = 'Arraved';
									$label = 'label bg-deep-orange';
								}
								if($v->status_pengiriman == '5'){
									$pengiriman = 'Delivered';
									$label = 'label bg-green';
								}
								if($v->status_pengiriman == '6'){
									$pengiriman = 'Finish';
									$label = 'label bg-green';
								}
								?>
                                     <tr>
                                        <td><?php echo $v->kode_delevery; ?></td>
                                        <td><?php echo tgl_indo($v->tanggal); ?></td>
                                        <td><?php echo $v->pengemudi; ?></td>
                                        <td><?php echo $v->nopol; ?></td>
										<!-- <td><span class="<?php //echo $label; ?>"><?php //echo $pengiriman; ?></span></td> -->
										<?php $jumlahdatadelevery = $this->db->query("SELECT * FROM `tbl_delevery`, data_pengiriman where tbl_delevery.id_pengiriman = data_pengiriman.id_pengiriman and tbl_delevery.kode_delevery = '$v->kode_delevery' "); 
												$jumlah =  $jumlahdatadelevery->num_rows();
										?>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><a href="<?php echo base_url("admin/cetak_laporan_delevery/$v->kode_delevery"); ?>" class="btn bg-blue waves-effect" target="_blank">
                                    <i class="material-icons">print</i> Cetak
                                </a></td>
                                    </tr>
								<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <!-- #END# Exportable Table -->
        </div>
    </section>