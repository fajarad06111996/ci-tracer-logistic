<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> LOG PENGIRIMAN </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
			<?php if($sebagai == '1') { ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <!-- <a href="<?php //echo base_url('admin/input_data_pengiriman'); ?>" type="button" class="btn bg-cyan waves-effect">Tambah Data</a> -->
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Pilih</th>
                                        <th>Status Pengiriman</th>
                                        <th>NO RESI</th>
                                        <th>Shipper Name</th>
                                        <th>AWB No</th>
                                        <th>NO SP</th>
                                        <th>Description</th>
                                        <th>Consignee</th>
                                        <th>Vendor</th>
                                        <th>Asal</th>
                                        <th>Tujuan</th>
                                        <th>Berat</th>
                                        <th>QTY</th>
                                        <th>Volume</th>
                                        <th>Moda</th>
                                        <th>Harga</th>
                                        <th>TAT</th>
                                        <th>ETA</th>
                                        <th>Di Terima</th>
                                        <th>Keterangan</th>
										<th>Status Pengiriman</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($tampil_data_pengiriman as $v) { 
								if($v->status_pengiriman == '1'){
									$pengiriman = 'PICK UP';
									$label = 'label bg-blue';
								}
								if($v->status_pengiriman == '2'){
									$pengiriman = 'DEPARTED';
									$label = 'label bg-green';
								}
								if($v->status_pengiriman == '3'){
									$pengiriman = 'TRANSIT';
									$label = 'label bg-deep-orange';
								}
								if($v->status_pengiriman == '4'){
									$pengiriman = 'ARRAVED';
									$label = 'label bg-deep-orange';
								}
								if($v->status_pengiriman == '5'){
									$pengiriman = 'DELIVERED';
									$label = 'label bg-green';
								}
								if($v->status_pengiriman == '6'){
									$pengiriman = 'FINISH';
									$label = 'label bg-green';
								}
								?>
                                     <tr>
                                        <td><a href="<?php echo base_url("admin/update_log_pengiriman/$v->id_pengiriman"); ?>" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
											<i class="material-icons">call_missed_outgoing</i>
										</a></td>
                                        <td><span class="<?php echo $label; ?>"><?php echo $pengiriman; ?></span></td>
                                        <td><?php echo $v->pickup_info; ?></td>
                                        <td><?php echo $v->shipper_name; ?></td>
                                        <td><?php echo $v->awb_no; ?></td>
                                        <td><?php echo $v->no_so; ?></td>
                                        <td><?php echo $v->description; ?></td>
                                        <td><?php echo $v->consignee; ?></td>
                                        <td><?php echo $v->vendor_name; ?></td>
                                        <td><?php echo $v->master_asal; ?></td>
                                        <td><?php echo $v->tujuan; ?></td>
                                        <td><?php echo $v->weight; ?></td>
                                        <td><?php echo $v->colly; ?></td>
                                        <td><?php echo $v->volume; ?></td>
                                        <td><?php echo $v->moda; ?></td>
                                        <td><?php echo $v->harga; ?></td>
                                        <td><?php echo $v->tat; ?></td>
                                        <td><?php echo $v->eta; ?></td>
                                        <td><?php echo $v->recaived_by; ?></td>
                                        <td><?php echo $v->remarks; ?></td>
										<td><span class="<?php echo $label; ?>"><?php echo $pengiriman; ?> (<?php echo $v->awb_no; ?>)</span></td>
                                        <td>
										<div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu"><?php //if($v->status_pengiriman == '1') { ?>
                                       <!--  <li><a href="<?php //echo base_url("admin/edit_data_pengiriman/$v->id_pengiriman"); ?>" class=" waves-effect waves-block">Edit</a></li>
										<?php //} ?>
										<?php //if($v->status_pengiriman == '1') { ?>
                                        <li><a href="<?php //echo base_url("admin/hapus_data_pengiriman/$v->id_pengiriman/$v->awb_no"); ?>" class=" waves-effect waves-block" onclick="javascript : return confirm('Data Pengiriman Akan Di Hapus')">Hapus</a></li>
									<?php //} ?> -->
										<li><a href="<?php echo base_url("admin/update_log_pengiriman/$v->id_pengiriman"); ?>" class=" waves-effect waves-block">Update</a></li>
                                    </ul>
                                </div>
										</td>
                                    </tr>
								<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
			<?php } ?>
			<?php if($sebagai == '2') { ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <!-- <a href="<?php //echo base_url('admin/input_data_pengiriman'); ?>" type="button" class="btn bg-cyan waves-effect">Tambah Data</a> -->
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Status Pengiriman</th>
                                        <th>Pick Up Info</th>
                                        <th>Pick up date</th>
                                        <th>Shipper Name</th>
                                        <th>AWB No</th>
                                        <th>Description</th>
                                        <th>Consignee</th>
                                        <th>Address</th>
                                        <th>Destination</th>
                                        <th>Weight</th>
                                        <th>Colly</th>
                                        <th>Moda</th>
                                        <th>Harga</th>
                                        <th>TAT</th>
                                        <th>ETA</th>
                                        <th>Received By</th>
                                        <th>ATA</th>
                                        <th>Remarks</th>
										<th>Status Pengiriman</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($tampil_data_pengiriman_user as $vs) { 
								if($vs->status_pengiriman == '1'){
									$pengiriman = 'Proses';
									$label = 'label bg-blue';
								}
								if($vs->status_pengiriman == '2'){
									$pengiriman = 'Keberangkatan';
									$label = 'label bg-orange';
								}
								if($vs->status_pengiriman == '3'){
									$pengiriman = 'Transit';
									$label = 'label bg-deep-orange';
								}
								if($vs->status_pengiriman == '4'){
									$pengiriman = 'Kedatangan';
									$label = 'label bg-deep-orange';
								}
								if($vs->status_pengiriman == '5'){
									$pengiriman = 'Finish';
									$label = 'label bg-green';
								}
								?>
                                     <tr>
                                        <td><span class="<?php echo $label; ?>"><?php echo $pengiriman; ?></span></td>
                                        <td><?php echo $vs->pickup_info; ?></td>
                                        <td><?php echo tgl_indo($vs->pickup_date); ?></td>
                                        <td><?php echo $vs->shipper_name; ?></td>
                                        <td><?php echo $vs->awb_no; ?></td>
                                        <td><?php echo $vs->description; ?></td>
                                        <td><?php echo $vs->consignee; ?></td>
                                        <td><?php echo $vs->address; ?></td>
                                        <td><?php echo $vs->destination; ?></td>
                                        <td><?php echo $vs->weight; ?></td>
                                        <td><?php echo $vs->colly; ?></td>
                                        <td><?php echo $vs->moda; ?></td>
                                        <td><?php echo $vs->harga; ?></td>
                                        <td><?php echo $vs->tat; ?></td>
                                        <td><?php echo $vs->eta; ?></td>
                                        <td><?php echo $vs->recaived_by; ?></td>
                                        <td><?php echo $vs->ata; ?></td>
                                        <td><?php echo $vs->remarks; ?></td>
										<td><span class="<?php echo $label; ?>"><?php echo $pengiriman; ?> (<?php echo $vs->awb_no; ?>)</span></td>
                                        <td>
										<div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu"><?php if($vs->status_pengiriman == '1') { ?>
                                        <li><a href="<?php echo base_url("admin/edit_data_pengiriman/$vs->id_pengiriman"); ?>" class=" waves-effect waves-block">Edit</a></li>
										<?php } ?>
										<?php if($vs->status_pengiriman == '1') { ?>
                                        <li><a href="<?php echo base_url("admin/hapus_data_pengiriman/$vs->id_pengiriman/$vs->awb_no"); ?>" class=" waves-effect waves-block" onclick="javascript : return confirm('Data Pengiriman Akan Di Hapus')">Hapus</a></li>
									<?php } ?>
										<li><a href="<?php echo base_url("admin/update_log_pengiriman/$vs->id_pengiriman"); ?>" class=" waves-effect waves-block">Update</a></li>
                                    </ul>
                                </div>
										</td>
                                    </tr>
								<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
			<?php } ?>
            </div>
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <!-- #END# Exportable Table -->
        </div>
    </section>