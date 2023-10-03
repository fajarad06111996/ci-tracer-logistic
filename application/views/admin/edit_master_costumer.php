<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> EDIT MASTER COSTUMER</b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="<?php echo base_url('admin/master_costumer'); ?>" type="button" class="btn bg-teal waves-effect"><i class="material-icons">reply</i> Kembali</a>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
						<?php foreach($edit_master_costumer as $v) { ?>
                            <form role="form" action="<?php echo base_url("admin/simpan_master_costumer/$v->costumer_id"); ?>" enctype="multipart/form-data" method="post">
                                <label>Costumer Code</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="costumer_code" class="form-control" value="<?php echo $v->costumer_code; ?>" REQUIRED>
                                        </div>
                                    </div>
									<label>Costumer Name</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="costumer_name" class="form-control" value="<?php echo $v->costumer_name; ?>" REQUIRED>
                                        </div>
                                    </div>
									<label>Alamat</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="address" class="form-control" value="<?php echo $v->address; ?>">
                                        </div>
                                    </div>
									<label>Kota</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="city" class="form-control" value="<?php echo $v->city; ?>">
                                        </div>
                                    </div>
									<label>Kode Pos</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="postal_code" class="form-control" value="<?php echo $v->postal_code; ?>">
                                        </div>
                                    </div>
									<label>Provinsi</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="province" class="form-control" value="<?php echo $v->province; ?>" REQUIRED>
                                        </div>
                                    </div>
									<label>Email</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email_id" class="form-control" value="<?php echo $v->email_id; ?>" >
                                        </div>
                                    </div>
									<label>Telepon</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="telephone" class="form-control" value="<?php echo $v->telephone; ?>">
                                        </div>
                                    </div>
						<?php } ?>
                                <button type="submit" class="btn bg-purple waves-effect">
                                    <i class="material-icons">save</i> Simpan
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