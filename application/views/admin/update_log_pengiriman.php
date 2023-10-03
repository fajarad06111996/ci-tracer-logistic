<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> UPDATE LOG PENGIRIMAN </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="<?php echo base_url('admin/log_pengiriman'); ?>" type="button" class="btn bg-teal waves-effect"><i class="material-icons">reply</i> Kembali</a>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   
                            </ul>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#HEADER" data-toggle="tab">
                                        <i class="material-icons">home</i> HEADER
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#LOG" data-toggle="tab">
                                        <i class="material-icons">local_shipping</i> UPDATE PENGIRIMAN
                                    </a>
                                </li> 
								<li role="presentation">
                                    <a href="#DOC" data-toggle="tab">
                                        <i class="material-icons">email</i> DOKUMEN PENGIRIMAN
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="HEADER">
								<?php foreach($edit_data_pengiriman as $v) { ?>
								<form role="form" action="<?php echo base_url("admin/update_data_pengiriman/$v->id_pengiriman"); ?>" enctype="multipart/form-data" method="post">
                                <label>No RESI</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="pickup_info" class="form-control" value="<?php echo $v->pickup_info; ?>" REQUIRED>
                                    </div>
                                </div>
								<!--<label>Pick up date</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="pickup_date" class="form-control" value="<?php //echo $v->pickup_date; ?>" REQUIRED>
                                    </div>
                                </div> -->
								<label>AWB No / BL</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="awb_no" class="form-control" value="<?php echo $v->awb_no; ?>" REQUIRED>
                                    </div>
                                </div>
								<label>NO SO</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="no_so" class="form-control" value="<?php echo $v->no_so; ?>">
                                    </div>
                                </div>
								<label>Pilih Shipper</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="shipper_id" id="id_shipper" value="<?php echo $v->shipper_id; ?>" readonly="" />
														<input type="text" class="form-control"  id="kode_shipper" name="shipper_code" value="<?php echo $v->shipper_code; ?>" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="nama_shipper" name="shipper_name" value="<?php echo $v->shipper_name; ?>" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalshipper">Pilih Shipper</button>
													</div>
													</div>
													
								<label>Pilih Asal</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="id_asal" id="id_asal" value="<?php echo $v->id_asal; ?>" readonly="" />
														<input type="text" class="form-control"  id="kode_asal" name="kode_asal" value="<?php echo $v->kode_asal; ?>" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="asal" name="master_asal" value="<?php echo $v->master_asal; ?>" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalasal">Pilih Asal</button>
													</div>
													</div>
								
								<label>Pilih Consignee</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="consignee_id" id="id_consignee" value="<?php echo $v->consignee_id; ?>" readonly="" />
														<input type="text" class="form-control"  id="kode_consignee" name="consignee_code" value="<?php echo $v->consignee_code; ?>" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="nama_consignee" name="consignee" value="<?php echo $v->consignee; ?>" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalconsignee">Pilih Consignee</button>
													</div>
													</div>
									<label>Pilih Lokasi</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="id_tujuan" id="id_tujuan" value="<?php echo $v->id_tujuan; ?>" readonly="" />
														<input type="text" class="form-control"  id="kode_tujuanx" name="kode_tujuan" value="<?php echo $v->kode_tujuan; ?>" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="tujuanx" name="nama_tujuan" value="<?php echo $v->tujuan; ?>" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModaltujuan">Pilih Tujuan</button>
													</div>
													</div> 
								<!--<label>Alamat</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="address" class="form-control" value="<?php //echo $v->address; ?>">
                                    </div>
                                </div> -->
								
									<label>Pilih Vendor</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="id_vendor" id="id_vendor" value="<?php echo $v->vendor_id; ?>" readonly="" />
														<input type="text" class="form-control"  id="kode_vendor" name="vendor_code" value="<?php echo $v->vendor_code; ?>" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="nama_vendor" name="vendor_name" value="<?php echo $v->vendor_name; ?>" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalvendor">Pilih Vendor</button>
													</div>
													</div>
													
								<label>Pilih Costumer</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="id_costumer" id="id_costumer" value="<?php echo $v->id_costumer; ?>" readonly="" />
														<input type="text" class="form-control"  id="kode_costumer" name="costumer_code" value="<?php echo $v->costumer_code; ?>" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="nama_costumer" name="costumer_name" value="<?php echo $v->costumer_name; ?>" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalcostumer">Pilih Costumer</button>
													</div>
													</div>
								<label>Berat</label>
								<div class="row clearfix">
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="weight" class="form-control" value="<?php echo $v->weight; ?>" REQUIRED>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="satuan_weight" REQUIRED>
                                        <option value="<?php echo $v->satuan_weight; ?>"> <?php echo $v->satuan_weight; ?> </option>
                                        <option value="KGS">KGS</option>
                                    </select>
                                    </div>
                                </div>
                                </div>
                                </div><label>QTY</label>
								<div class="row clearfix">
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="colly" class="form-control" value="<?php echo $v->colly; ?>" REQUIRED>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick"  data-live-search="true" name="satuan_colly" REQUIRED>
                                        <option value="<?php echo $v->satuan_colly; ?>"><?php echo $v->satuan_colly; ?></option>
                                        <option value="BAGS">BAGS</option>
													<option value="BALE(S)">BALE(S)</option>
													<option value="BOTTLE">BOTTLE</option>
													<option value="BOXES">BOXES</option>
													<option value="BUNDELS">BUNDELS</option>
													<option value="CANS">CANS</option>
													<option value="CASE">CASE</option>
													<option value="COILS">COILS</option>
													<option value="CRATE">CRATE</option>
													<option value="CTNS">CTNS</option>
													<option value="DRUM">DRUM</option>
													<option value="GRAMS">GRAMS</option>
													<option value="ISOTANKS">ISOTANKS</option>
													<option value="JUG">JUG</option>
													<option value="LITRE">LITRE</option>
													<option value="LOT">LOT</option>
													<option value="MILLIGRAMS">MILLIGRAMS</option>
													<option value="MILLITERS">MILLITERS</option>
													<option value="MTR">MTR</option>
													<option value="PAILS">PAILS</option>
													<option value="PAIRS">PAIRS</option>
													<option value="PALLET">PALLET</option>
													<option value="PCS">PCS</option>
													<option value="PKGS">PKGS</option>
													<option value="ROLLS">ROLLS</option>
													<option value="SET">SET</option>
													<option value="SLIP SHEET">SLIP SHEET</option>
													<option value="SPOOLS">SPOOLS</option>
													<option value="STRIPS">STRIPS</option>
													<option value="TIN">TIN</option>
													<option value="TOTE">TOTE</option>
													<option value="TRAY">TRAY</option>
													<option value="WOODEN CASE">WOODEN CASE</option>
                                    </select>
                                    </div>
                                </div>
                                </div>
                                </div>
								<label>Volume</label>
								<div class="row clearfix">
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="volume" class="form-control" value="<?php echo $v->volume; ?>" REQUIRED>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="satuan_volume" REQUIRED>
                                        <option value="<?php echo $v->satuan_volume; ?>"><?php echo $v->satuan_volume; ?></option>
                                        <option value="MATRIX TON">MATRIX TON</option>
                                        <option value="SINGLE">SINGLE</option>
                                        <option value="COMBO">COMBO</option>
                                    </select>
                                    </div>
                                </div>
                                </div>
                                </div>
								<label>Moda Tranportasi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="moda" REQUIRED>
                                        <option value="<?php echo $v->moda; ?>"><?php echo $v->moda; ?></option>
                                        <option value="Darat">Darat</option>
                                        <option value="Laut">Laut</option>
                                        <option value="Udara">Udara</option>
                                    </select>
                                    </div>
                                </div>
								<label>TAT</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="tat" class="form-control" value="<?php echo $v->tat; ?>">
                                    </div>
                                </div>
								<label>ETA</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="eta" class="form-control" value="<?php echo $v->eta; ?>">
                                    </div>
                                </div>
								
								<label>Deskripsi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="description" class="form-control" value="<?php echo $v->description; ?>">
                                    </div>
                                </div>
								<label>Di Terima Oleh</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="recaived_by" class="form-control" value="<?php echo $v->recaived_by; ?>">
                                    </div>
                                </div>
								<!-- <label>ATA</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="ata" class="form-control" value="<?php echo $v->ata; ?>">
                                    </div>
                                </div> -->
								<label>Keterangan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="remarks" class="form-control" value="<?php echo $v->remarks; ?>">
                                    </div>
                                </div>
								<br/>
								<?php //if($v->status_pengiriman != '2') { ?>
								<button type="submit" class="btn bg-purple waves-effect">
                                    <i class="material-icons">save</i> Update Pengiriman
                                </button>
								<?php //} ?>
								</form>
                                </div>
								<?php } ?>
								
								
                                <div role="tabpanel" class="tab-pane fade" id="LOG">
								<?php if($v->status_pengiriman != '6') { ?>
								<button type="button" data-toggle="modal" data-target="#update_tujuan" class="btn bg-cyan waves-effect">Update Pengiriman</button>
								<?php } ?>
							<div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th> KODE ASAL </th>
                                        <th> NAMA ASAL </th>
                                        <th>TANGGAL </th>
                                        <th>PIC </th>
                                        <th>STATUS </th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($tampil_log_tujuan as $tlt) {
									if($tlt->status_log_asal == '1'){
										$status = 'PICK UP';
									}if($tlt->status_log_asal == '2'){
										$status = 'DEPARTED';
									}if($tlt->status_log_asal == '3'){
										$status = 'TRANSIT';
									}if($tlt->status_log_asal == '4'){
										$status = 'ARRAVED';
									}if($tlt->status_log_asal == '5'){
										$status = 'DELIVERED';
									}if($tlt->status_log_asal == '6'){
										$status = 'FINISH';
									}
								?>
                                     <tr>
                                        <td><?php echo $tlt->kode_asal; ?></td>
                                        <td><?php echo $tlt->nama_asal; ?></td>
                                        <td><?php echo $tlt->tanggal_log_asal; ?></td>
                                        <td><?php echo $tlt->pic_pengiriman; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td>
										<div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url("admin/edit_log_tujuan/$tlt->id_log_tujuan/$tlt->id_pengiriman"); ?>" class=" waves-effect waves-block">Edit</a></li>
                                    </ul>
                                </div>
										</td>
                                    </tr>
								<?php } ?>
                                </tbody>
                            </table>
                        </div>
                                </div>
								
								<div role="tabpanel" class="tab-pane fade" id="DOC">
								<?php if($cekdokument != '1') { ?>
								<button type="button" data-toggle="modal" data-target="#dokumen" class="btn bg-cyan waves-effect">Dokumen Pengiriman</button>
								<?php } ?>
								<button type="button" data-toggle="modal" data-target="#tambahdokumen" class="btn bg-cyan waves-effect">Tambah Dokument</button>
								<div class="body table-responsive">
												<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
													<thead>
														<tr>
															<th>NO RESI</th>
															<th>NO DOKUMEN</th>
															<th>JENIS DOKUMEN</th>
															<th>TANGGAL DOKUMEN</th>
															<th>Opsi</th>
														</tr>
													</thead>
													<tbody>
													<?php foreach($tampil_log_document as $document) { ?>
														 <tr>
														 <td><?php echo $document->pickup_info; ?></td>
														 <td><?php echo $document->no_document; ?></td>
															<td><?php echo $document->jenis_document; ?></td>
															<td><?php echo tgl_indo($document->tanggal_document); ?></td>
															<td>
															<div class="btn-group">
														<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
															<span class="caret"></span>
															<span class="sr-only">Toggle Dropdown</span>
														</button>
														<ul class="dropdown-menu">
															<li><a href="<?php echo base_url("admin/edit_log_document/$document->id_log_document/$document->id_pengiriman"); ?>" class=" waves-effect waves-block">Edit</a></li>
															<!-- <li><a href="<?php //echo base_url("admin/hapus_document_entri_so/$document->document_id/$form/$v->id_data_spk/$form/$halaman"); ?>" onclick="javascript : return confirm('Data Akan Di Hapus')" class=" waves-effect waves-block">Hapus</a></li> -->
														</ul>
													</div>
															</td>
														</tr>
													<?php } ?>
													</tbody>
												</table>
											</div>
								
								<br/>
									<?php foreach($lihat_dokument as $dokumen) { ?>                                   
								   <div class="body table-responsive">
								<p><b>- Gambar 1</b></p>	
                            <img src="<?php echo base_url(); ?>assets/dokumen/<?php echo $dokumen->gambar_suratjalan; ?>" class="js-animating-object img-responsive">
							<br/>
							<p><b>- Gambar 2</b></p>
							<img src="<?php echo base_url(); ?>assets/dokumen/<?php echo $dokumen->gambar_bap; ?>" class="js-animating-object img-responsive">
									
									<br/>
							<p><b>- Gambar 3</b></p>
							<img src="<?php echo base_url(); ?>assets/dokumen/<?php echo $dokumen->gambar; ?>" class="js-animating-object img-responsive">
									<?php } ?>
                        </div>
                                </div>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <!-- #END# Exportable Table -->
        </div>
    </section>
	
	<div class="modal fade" id="update">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url('admin/tambah_log_pengiriman'); ?>" enctype="multipart/form-data" method="post">
							<?php foreach($edit_data_pengiriman as $vv) { ?>
							<input type="hidden" name="id_pengiriman" class="form-control" value="<?php echo $vv->id_pengiriman; ?>" readonly>
							<label>AWB NO / NO BL</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="awb_no" class="form-control" value="<?php echo $vv->awb_no; ?>" readonly>
                                        </div>
                                    </div>
							<label>PICK UP INFO</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pickup_info" class="form-control" value="<?php echo $vv->pickup_info; ?>" readonly>
                                        </div>
                                    </div>
							<?php } ?>
									<label>Jenis Kegiatan</label> 
									<div class="form-group">
                                        <div class="form-line">
											<select class="form-control show-tick" name="jenis_kegiatan" REQUIRED>
												<option>Pilih Kegiatan</option>
												<option value="2">Update Keberangkatan</option>
												<option value="3">Update Transit</option>
												<option value="4">Update Kedatangan</option>
											</select>
									</div>
									</div>
									<label>Remarks Pengiriman</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="remarks_activity" class="form-control" placeholder="Remarks Pengiriman">
                                        </div>
                                    </div>
									<?php if($cek_log_pengiriman == ''){ ?>
								<label>No Kendaraan</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="no_kendaraan" class="form-control" placeholder="No Kendaraan">
                                        </div>
                                    </div>
                                </div>
									<?php } ?>
									<?php if($cek_log_pengiriman > 0){ ?>
								<label>No Kendaraan</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="no_kendaraan" class="form-control" value="<?php echo $tlg->no_kendaraan; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
									<?php } ?>
                                <!-- modal untuk footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn bg-purple waves-effect">
                                    <i class="material-icons">add_circle_outline</i> Simpan
                                </button>
                                </div>
                                </form>
                            </div>

                          </div>
                        </div>
                        </div>
						
						<div class="modal fade" id="dokumen">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url('admin/tambah_dokumen'); ?>" enctype="multipart/form-data" method="post">
							
							<input type="hidden" name="id_pengiriman" class="form-control" value="<?php echo $v->id_pengiriman; ?>" readonly>
							<label>AWB NO / BL</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="" class="form-control" value="<?php echo $v->awb_no; ?> " readonly>
                                        </div>
                                    </div>
									<label>NO SO</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="" class="form-control" value="<?php echo $v->no_so; ?>" readonly>
                                        </div>
                                    </div>
									<label>Tujuan</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="" class="form-control" value="<?php echo $v->tujuan; ?>" readonly>
                                        </div>
                                    </div>
							<label>Gambar 1</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="gambar_suratjalan" class="form-control" placeholder="" >
                                        </div>
                                    </div>
							<label>Gambar 2</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="gambar_bap" class="form-control" value="" >
                                        </div>
                                    </div>
									<label>Gambar 3</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="gambar" class="form-control" value="" >
                                        </div>
                                    </div>
                                <!-- modal untuk footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn bg-purple waves-effect">
                                    <i class="material-icons">add_circle_outline</i> Simpan
                                </button>
                                </div>
                                </form>
                            </div>

                          </div>
                        </div>
                        </div>
						
						
						<div class="modal fade" id="update_tujuan">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url('admin/tambah_log_tujuan'); ?>" enctype="multipart/form-data" method="post">
							<?php foreach($view_log_pengiriman as $vlg) { ?>
							<input type="hidden" name="id_pengiriman" class="form-control" value="<?php echo $vlg->id_pengiriman; ?>" readonly>
							
							<div class="col-md-6">
							<p>NO RESI</p>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="" class="form-control" value="<?php echo $vlg->pickup_info; ?>" readonly>
                                        </div>
                                    </div>
                                    </div>
							<div class="col-md-6">
							<p>AWB NO / BL</p>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="" class="form-control" value="<?php echo $vlg->awb_no; ?> " readonly>
                                        </div>
                                    </div>
                                    </div>
									<div class="col-md-6">
									<p>NO SP</p>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="" class="form-control" value="<?php echo $vlg->no_so; ?>" readonly>
                                        </div>
                                    </div>
                                    </div>
								<div class="col-md-6">
									<p>PIC PENGIRIMAN</p>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pic_pengiriman" class="form-control" placeholder="PIC PENGIRIMAN" REQUIRED>
                                        </div>
                                    </div>
                                    </div>
									<div class="col-md-12">
									<p>STATUS</p> 
									<div class="form-group">
                                        <div class="form-line">
											<select class="form-control show-tick" name="status_log_asal" REQUIRED>
												<option value="1">Pick Up</option>
												<option value="2">Departed</option>
												<option value="3">Transit</option>
												<option value="4">Arraved</option>
												<option value="5">Delivered</option>
												<option value="6">Finish</option>
											</select>
									</div>
									</div>
									</div>
									<label>Pilih Asal</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="id_asal" id="id_asalx" placeholder="Kode" readonly="" />
														<input type="text" class="form-control"  id="kode_asalx" name="kode_asal" placeholder="Kode Asal" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="asalx" name="nama_asal" placeholder="Asal" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalasalx">Pilih Asal</button>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahasal">Tambah Asal</button>
													</div>
													</div>
										<?php } ?>
                                <!-- modal untuk footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn bg-purple waves-effect">
                                    <i class="material-icons">add_circle_outline</i> Update Pengiriman
                                </button>
                                </div>
                                </form>
                            </div>

                          </div>
                        </div>
                        </div>
						
						<div class="modal fade" id="finis">
                          <div class="modal-dialog">
								<?php if($cek_log_pengiriman > 0){ ?>
                            <div class="modal-content">
                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url("admin/status_pengiriman_selesa"); ?>" enctype="multipart/form-data" method="post">
							<?php foreach($edit_data_pengiriman as $vv) { ?>
							<input type="hidden" name="id_pengiriman" class="form-control" value="<?php echo $vv->id_pengiriman; ?>" readonly>
							<label>AWB NO / NO BL</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="awb_no" class="form-control" value="<?php echo $vv->awb_no; ?>" readonly>
                                        </div>
                                    </div>
							<label>PICK UP INFO</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pickup_info" class="form-control" value="<?php echo $vv->pickup_info; ?>" readonly>
                                        </div>
                                    </div>
							<?php } ?>
									<label>Jenis Kegiatan</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="jenis_kegiatan" class="form-control" value="<?php echo $kegiatan; ?>" readonly>
                                        </div>
                                    </div>
									<label>Remarks Pengiriman</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="remarks_activity" class="form-control" value="<?php echo $tlg->remarks_activity; ?>">
                                        </div>
                                    </div>
								<label>No Kendaraan</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="no_kendaraan" class="form-control" value="<?php echo $tlg->no_kendaraan; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal untuk footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success waves-effect">
                                    <i class="material-icons">add_circle_outline</i> Finish
                                </button>
                                </div>
                                </form>
                            </div>
								<?php } ?>
                          </div>
                        </div>
                        </div>
						
						<!-- untuk tambah data -->
							<div class="modal fade" id="myModalhpp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:800px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Daftar Harga Tujuan</h4>
                                        </div>
                                        <div class="body table-responsive">
                                            <table id="lookuphpp" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Tujuan</th>
                                                        <th>Tujuan</th>
                                                        <th>Base On</th>
                                                        <th>Harga</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                <?php foreach($lihat_hpp as $lhpp) { ?>
                                                 <tr class="pilihhpp" data-idhpp="<?php echo $lhpp->id_hpp; ?>" data-kodetujuan="<?php echo $lhpp->kode_tujuan; ?>" data-tujuan="<?php echo $lhpp->tujuan; ?>" data-baseon="<?php echo $lhpp->base_on; ?>" data-hargasatuan="<?php echo $lhpp->harga_satuan; ?>" >
                                                            <td><?php echo $lhpp->kode_tujuan; ?></td>
                                                            <td><?php echo $lhpp->tujuan; ?></td>
                                                            <td><?php echo $lhpp->base_on; ?></td>
                                                            <td><?php echo $lhpp->harga_satuan; ?></td>
                                                        </tr>
                                                        <?php } ?>            
                                                        </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                </div>
                            </div>
							<!-- untuk tambah data -->
							<div class="modal fade" id="myModaltujuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:800px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Daftar Tujuan</h4>
                                        </div>
                                        <div class="modal-body table-responsive">
                                            <table id="lookuptujuan" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Tujuan</th>
                                                        <th>Nama Tujuan</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                <?php foreach($master_tujuan as $mj) { ?>
                                                 <tr class="pilihtujuan" data-idtujuan="<?php echo $mj->id_tujuan; ?>" data-kodetujuanx="<?php echo $mj->kode_tujuan; ?>" data-tujuanx="<?php echo $mj->tujuan; ?>" >
                                                            <td><?php echo $mj->kode_tujuan; ?></td>
                                                            <td><?php echo $mj->tujuan; ?></td>
                                                        </tr>
                                                        <?php } ?>            
                                                        </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<!-- untuk tambah data -->
							<div class="modal fade" id="myModalasalx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:500px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">DaftaR Asal</h4>
                                        </div>
                                        <div class="body table-responsive">
                                            <table id="lookupasalx" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Asal</th>
                                                        <th>Asal</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                <?php foreach($master_asal as $lma) { ?>
                                                 <tr class="pilihasalx" data-idasalx="<?php echo $lma->id_asal; ?>" data-kodeasalx="<?php echo $lma->kode_asal; ?>" data-asalx="<?php echo $lma->master_asal; ?>" >
                                                            <td><?php echo $lma->kode_asal; ?></td>
                                                            <td><?php echo $lma->master_asal; ?></td>
                                                        </tr>
                                                        <?php } ?>            
                                                        </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<div class="modal fade" id="tambahasal">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url("admin/tambah_master_asal_log_pengiriman/$vlg->id_pengiriman"); ?>" enctype="multipart/form-data" method="post">
								 <label>KODE ASAL</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kode_asal" class="form-control" placeholder="KODE ASAL" REQUIRED>
                                        </div>
                                    </div>
									<label>MASTER ASAL</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="master_asal" class="form-control" placeholder="MASTER ASAL" REQUIRED>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal untuk footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn bg-purple waves-effect">
                                    <i class="material-icons">add_circle_outline</i> Tambah
                                </button>
                                </div>
                                </form>
                            </div>

                          </div>
                        </div>
                        </div>
						
						<div class="modal fade" id="tambahdokumen">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
								<?php //$halaman = 'document'; ?>
                                <form role="form" action="<?php echo base_url("admin/tambah_log_document/$vlg->id_pengiriman"); ?>" enctype="multipart/form-data" method="post">
									
									<label>NO DOKUMEN</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="no_document" class="form-control" placeholder="NO DOCUMENT" REQUIRED>
                                        </div>
                                    </div>
									<label>JENIS DOKUMEN</label> 
									<div class="form-group">
                                        <div class="form-line">
											<select class="form-control show-tick" name="jenis_document" REQUIRED>
												<option value="SI">SI</option>
												<option value="PACKING LIST">PACKING LIST</option>
												<option value="INVOICE IMPORT">INVOICE IMPORT</option>
												<option value="DO">DO</option>
												<option value="SPPB">SPPB</option>
											</select>
									</div>
									</div>
									<label>TANGGAL DOKUMEN</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="date" name="tanggal_document" class="form-control" placeholder="" REQUIRED>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal untuk footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn bg-purple waves-effect">
                                    <i class="material-icons">add_circle_outline</i> Tambah Document
                                </button>
                                </div>
                                </form>
                            </div>

                          </div>
                        </div>
                        </div>