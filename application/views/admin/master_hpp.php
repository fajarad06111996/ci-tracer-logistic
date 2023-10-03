<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> MASTER HPP </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <button type="button" data-toggle="modal" data-target="#cari" class="btn bg-cyan waves-effect">Tambah Harga HPP</button>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>KODE ASAL</th>
                                        <th>ASAL</th>
                                        <th>KODE TUJUAN</th>
                                        <th>TUJUAN</th>
                                        <th>COSTUMER</th>
                                        <th>LAYANAN</th>
                                        <th>BASE ON</th>
                                        <th>HARGA SATUAN</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($tampil_hpp as $v){ ?>
                                     <tr>
                                        <td><?php echo $v->kode_asal; ?></td>
                                        <td><?php echo $v->master_asal; ?></td>
                                        <td><?php echo $v->kode_tujuan; ?></td>
                                        <td><?php echo $v->tujuan; ?></td>
                                        <td><?php echo $v->costumer_name; ?></td>
                                        <td><?php echo $v->layanan; ?></td>
                                        <td><?php echo $v->base_on; ?></td>
                                        <td>Rp. <?php echo number_format($v->harga_satuan,2,',','.'); ?></td>
                                        <td>
										<div class="btn-group">
										<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul class="dropdown-menu">
											<li><a href="<?php echo base_url("admin/edit_master_hpp/$v->id_hpp"); ?>" class=" waves-effect waves-block">Edit</a></li>
											<li><a href="<?php echo base_url("admin/hapus_masterhpp/$v->id_hpp"); ?>" class=" waves-effect waves-block" onclick="javascript : return confirm('Data Akan Di Hapus')">Hapus</a></li>
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
            </div>
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <!-- #END# Exportable Table -->
        </div>
    </section>
	
	
	<div class="modal fade" id="cari">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url('admin/tambah_masterhpp'); ?>" enctype="multipart/form-data" method="post">
								 <label>Pilih Costumer</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="costumer_id" id="id_costumer" placeholder="Kode" readonly="" />
														<input type="hidden" class="form-control"  id="kode_costumer" name="costumer_code" placeholder="Costumer Code" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="nama_costumer" name="costumer_name" placeholder="Costumer Name" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalcostumer">....</button>
													</div>
													</div>
								<label>PILIH ASAL</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="id_asal" id="id_asal" placeholder="Kode" readonly="" />
														<input type="text" class="form-control"  id="kode_asal" name="kode_asal" placeholder="KODE ASAL" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="asal" name="master_asal" placeholder="ASAL" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalasal">. . .</button>
													</div>
													</div>
								 <label>PILIH TUJUAN</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="id_tujuan" id="id_tujuan" placeholder="Kode" readonly="" REQUIRED/>
														<input type="text" class="form-control"  name="kode_tujuan" id="kode_tujuanx" placeholder="KODE TUJUAN" readonly="" REQUIRED>
														  <input type="text" class="form-control" name="tujuan" id="tujuanx" placeholder="TUJUAN" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModaltujuan">. . .</button>
													</div>
													</div>
									<div class="col-md-6">
									<label>BASE ON</label> 
									<div class="form-group">
                                        <div class="form-line">
											<select class="form-control show-tick" name="base_on" REQUIRED>
												<option value="QTY">QTY</option>
												<option value="BERAT">BERAT</option>
												<option value="VOLUME">VOLUME</option>
												<!-- <option value="CHARTER">CHARTER</option> -->
											</select>
									</div>
									</div>
									</div>
									<div class="col-md-6">
									<label>LAYANAN</label> 
									<div class="form-group">
                                        <div class="form-line">
											<select class="form-control show-tick" name="layanan" REQUIRED>
												<option value="YES">YES</option>
												<option value="REGULER">REGULER</option>
												<option value="EXPRESS">EXPRESS</option>
												<!-- <option value="CHARTER">CHARTER</option> -->
											</select>
									</div>
									</div>
									</div>
									<label>HARGA SATUAN</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="harga_satuan" class="form-control" placeholder="HARGA SATUAN" REQUIRED>
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
						
						
							<!-- untuk tambah data -->
							<div class="modal fade" id="myModalasal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:800px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">DAFTAR ASAL</h4>
                                        </div>
                                        <div class="modal-body table-responsive">
                                            <table id="lookupasal" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>KODE ASAL</th>
                                                        <th>ASAL</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                <?php foreach($master_asal as $lma) { ?>
                                                 <tr class="pilihasal" data-idasal="<?php echo $lma->id_asal; ?>" data-kodeasal="<?php echo $lma->kode_asal; ?>" data-asal="<?php echo $lma->master_asal; ?>" >
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
						
						<!-- untuk tambah data -->
							<div class="modal fade" id="myModaltujuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:800px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">DAFTAR TUJUAN</h4>
                                        </div>
                                        <div class="modal-body table-responsive">
                                            <table id="lookuptujuan" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>KODE TUJUAN</th>
                                                        <th>TUJUAN</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                <?php foreach($lihat_tujuan as $lt) { ?>
                                                 <tr class="pilihtujuan" data-idtujuan="<?php echo $lt->id_tujuan; ?>" data-kodetujuanx="<?php echo $lt->kode_tujuan; ?>" data-tujuanx="<?php echo $lt->tujuan; ?>" >
                                                            <td><?php echo $lt->kode_tujuan; ?></td>
                                                            <td><?php echo $lt->tujuan; ?></td>
                                                        </tr>
                                                        <?php } ?>            
                                                        </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<!-- untuk tambah data -->
							<div class="modal fade" id="myModalcostumer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:500px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Daftar Costumer</h4>
                                        </div>
                                        <div class="body table-responsive">
                                            <table id="lookupcostumer" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Costumer</th>
                                                        <th>Nama Costumer</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                <?php foreach($master_costumer as $cm) { ?>
                                                 <tr class="pilihcostumer" data-idcostumer="<?php echo $cm->costumer_id; ?>" data-kodecostumer="<?php echo $cm->costumer_code; ?>" data-namacostumer="<?php echo $cm->costumer_name; ?>" >
                                                            <td><?php echo $cm->costumer_code; ?></td>
                                                            <td><?php echo $cm->costumer_name; ?></td>
                                                        </tr>
                                                        <?php } ?>            
                                                        </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                </div>
                            </div>