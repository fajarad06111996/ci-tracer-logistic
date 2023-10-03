<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> EDIT MASTER HPP</b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="<?php echo base_url('admin/master_hpp'); ?>" type="button" class="btn bg-teal waves-effect"><i class="material-icons">reply</i> Kembali</a>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
						<?php foreach ($edit_master_hpp as $v) { ?>
                            <form role="form" action="<?php echo base_url("admin/simpan_master_hpp/$v->id_hpp"); ?>" enctype="multipart/form-data" method="post">
                                
								<label>Pilih Costumer</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="costumer_id" id="id_costumer" value="<?php echo $v->costumer_id; ?>" readonly="" />
														<input type="hidden" class="form-control"  id="kode_costumer" name="costumer_code" value="<?php echo $v->costumer_code; ?>" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="nama_costumer" name="costumer_name" value="<?php echo $v->costumer_name; ?>" readonly="" REQUIRED>
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
														<input type="hidden" class="form-control" name="id_asal" id="id_asal" value="<?php echo $v->id_asal; ?>" readonly="" />
														<input type="text" class="form-control"  id="kode_asal" name="kode_asal" value="<?php echo $v->kode_asal; ?>" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="asal" name="master_asal" value="<?php echo $v->master_asal; ?>" readonly="" REQUIRED>
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
														<input type="hidden" class="form-control" name="id_tujuan" id="id_tujuan" value="<?php echo $v->id_tujuan; ?>" readonly="" REQUIRED/>
														<input type="text" class="form-control"  name="kode_tujuan" id="kode_tujuanx" value="<?php echo $v->kode_tujuan; ?>" readonly="" REQUIRED>
														  <input type="text" class="form-control" name="tujuan"  id="tujuanx" value="<?php echo $v->tujuan; ?>" readonly="" REQUIRED>
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
												<option value="<?php echo $v->base_on; ?>"><?php echo $v->base_on; ?></option>
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
												<option value="<?php echo $v->layanan; ?>"><?php echo $v->layanan; ?></option>
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
                                            <input type="number" name="harga_satuan" class="form-control" value="<?php echo $v->harga_satuan; ?>" REQUIRED>
                                        </div>
                                    </div>
						<?php } ?>
                                <button type="submit" class="btn bg-purple waves-effect">
                                    <i class="material-icons"></i> Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <!-- #END# Exportable Table -->
        </div>
    </section>
	
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