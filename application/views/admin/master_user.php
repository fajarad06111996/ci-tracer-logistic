<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> MASTER USER </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <button type="button" data-toggle="modal" data-target="#cari" class="btn bg-cyan waves-effect">Tambah User</button>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>USERNAME</th>
                                        <th>PASSWORD</th>
                                        <th>NAMA</th>
                                        <th>TELEPON</th>
                                        <th>EMAIL</th>
                                        <th>SEBAGAI</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($tampil_user as $v){ 
								if($v->sebagai == '1'){
									$tampil_sebagai = 'ADMIN';
								}if($v->sebagai == '2'){
									$tampil_sebagai = 'VENDOR';
								}
								if($v->sebagai == '3'){
									$tampil_sebagai = 'COSTUMER';
								}
								?>
                                     <tr>
                                        <td><?php echo $v->username; ?></td>
                                        <td>*******</td>
                                        <td><?php echo $v->nama_user; ?></td>
                                        <td><?php echo $v->telepon; ?></td>
                                        <td><?php echo $v->email; ?></td>
                                        <td><?php echo $tampil_sebagai; ?></td>
                                        <td>
										<div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url("admin/edit_master_user/$v->id_user"); ?>" class=" waves-effect waves-block">Edit</a></li>
                                        <li><a href="<?php echo base_url("admin/hapus_master_user/$v->id_user"); ?>" onclick="javascript : return confirm('Apakah Anda Yakin Ingin Menghapus ?')" class=" waves-effect waves-block">Hapus</a></li>
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
                                <form role="form" action="<?php echo base_url('admin/tambah_user'); ?>" enctype="multipart/form-data" method="post">
								 <label>USERNAME</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control" placeholder="USERNAME" REQUIRED>
                                        </div>
                                    </div>
									<label>PASSWORD</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="password" name="password" class="form-control" placeholder="PASSWORD" REQUIRED>
                                        </div>
                                    </div>
									<label>NAMA USER</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_user" class="form-control" placeholder="NAMA USER" REQUIRED>
                                        </div>
                                    </div>
									<label>TELEPON</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="telepon" class="form-control" placeholder="TELEPON" REQUIRED>
                                        </div>
                                    </div>
									<label>EMAIL</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email" class="form-control" placeholder="EMAIL">
                                        </div>
                                    </div>
									<label>FOTO USER</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="foto_user" class="form-control" placeholder="FOTO USER">
                                        </div>
                                    </div>
									<label>SEBAGAI</label> 
									<div class="form-group">
                                        <div class="form-line">
											<select class="form-control show-tick" name="sebagai" REQUIRED>
												<option >-- Please Sebagai --</option>
												<option value="3">COSTUMER</option>
												<option value="2">VENDOR</option>
												<option value="1">ADMIN</option>
											</select>
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