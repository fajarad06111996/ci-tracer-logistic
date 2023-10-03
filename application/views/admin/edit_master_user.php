<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> EDIT MASTER USER</b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="<?php echo base_url('admin/master_user'); ?>" type="button" class="btn bg-teal waves-effect"><i class="material-icons">reply</i> Kembali</a>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
						<?php foreach ($edit_master_user as $v) { ?>
                            <form role="form" action="<?php echo base_url("admin/simpan_master_user/$v->id_user"); ?>" enctype="multipart/form-data" method="post">
                                <label>USERNAME</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control" value="<?php echo $v->username; ?>" REQUIRED>
                                        </div>
                                    </div>
									<label>PASSWORD</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="password" name="password" class="form-control" placeholder="-- Jika Tidak Rubah Password. Password Tidak Disis --" >
                                            <input type="hidden" name="password_lama" class="form-control" value="<?php echo $v->password; ?>">
                                        </div>
                                    </div>
									<label>NAMA USER</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_user" class="form-control" value="<?php echo $v->nama_user; ?>" REQUIRED>
                                        </div>
                                    </div>
									<label>TELEPON</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="telepon" class="form-control" value="<?php echo $v->telepon; ?>" REQUIRED>
                                        </div>
                                    </div>
									<label>EMAIL</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email" class="form-control" value="<?php echo $v->email; ?>">
                                        </div>
                                    </div>
									<label>SEBAGAI</label> 
									<div class="form-group">
                                        <div class="form-line">
											<select class="form-control show-tick" name="sebagai" REQUIRED>
												<option value="<?php echo $v->sebagai; ?>">Default</option>
												<option value="3">COSTUMER</option>
												<option value="2">VENDOR</option>
												<option value="1">ADMIN</option>
											</select>
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
	