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
                            <a href="<?php echo base_url('admin/master_tujuan'); ?>" type="button" class="btn bg-teal waves-effect"><i class="material-icons">reply</i> Kembali</a>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
						<?php foreach ($edit_master_tujuan as $v) { ?>
                            <form role="form" action="<?php echo base_url("admin/simpan_master_tujuan/$v->id_tujuan"); ?>" enctype="multipart/form-data" method="post">
                               <label>KODE TUJUAN</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kode_tujuan" class="form-control" value="<?php echo $v->kode_tujuan; ?>" REQUIRED>
                                        </div>
                                    </div>
									<label>TUJUAN</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tujuan" class="form-control" value="<?php echo $v->tujuan; ?>" REQUIRED>
                                        </div>
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
	