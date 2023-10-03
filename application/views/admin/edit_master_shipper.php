<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> MASTER SHIPPER</b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="<?php echo base_url('admin/master_shipper'); ?>" type="button" class="btn bg-teal waves-effect"><i class="material-icons">reply</i> Kembali</a>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
						<?php foreach($edit_master_shipper as $v) { ?>
                            <form role="form" action="<?php echo base_url("admin/simpan_master_shipper/$v->shipper_id"); ?>" enctype="multipart/form-data" method="post">
                                <label>Shipper Code</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="shipper_code" class="form-control" value="<?php echo $v->shipper_code; ?>" REQUIRED>
                                        </div>
                                    </div>
									<label>Shipper Name</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="shipper_name" class="form-control" value="<?php echo $v->shipper_name; ?>" REQUIRED>
                                        </div>
                                    </div>
									<label>Alamat</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="address" class="form-control" value="<?php echo $v->address; ?>" REQUIRED>
                                        </div>
                                    </div>
									<label>Kota</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="city" class="form-control" value="<?php echo $v->city; ?>" REQUIRED>
                                        </div>
                                    </div>
									<label>Provinsi</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="province" class="form-control" value="<?php echo $v->province; ?>" REQUIRED>
                                        </div>
                                    </div>
									<label>Kode Pos</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="postal_code" class="form-control" value="<?php echo $v->postal_code; ?>">
                                        </div>
                                    </div>
									<label>State Kode</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="state_code" class="form-control" value="<?php echo $v->state_code; ?>">
                                        </div>
                                    </div>
									<label>Kode Negara</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="country_code" class="form-control" value="<?php echo $v->country_code; ?>" >
                                        </div>
                                    </div>
									<label>Nama Negara</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="country_name" class="form-control" value="<?php echo $v->country_name; ?>">
                                        </div>
                                    </div>
									<label>Attention</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="attention" class="form-control" value="<?php echo $v->attention; ?>" >
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
									<label>Fax</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="fax" class="form-control" value="<?php echo $v->fax; ?>">
                                        </div>
                                    </div>
									<label>NPWP</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="npwp" class="form-control" value="<?php echo $v->npwp; ?>" >
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