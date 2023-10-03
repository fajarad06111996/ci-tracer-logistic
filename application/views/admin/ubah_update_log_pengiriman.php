<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> INPUT DATA PENGIRIMAN</b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="<?php echo base_url('admin/log_pengiriman'); ?>" type="button" class="btn bg-teal waves-effect"><i class="material-icons">reply</i> Kembali</a>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
						<?php foreach($ubah_update_log_pengiriman as $v) { ?>
                            <form role="form" action="<?php echo base_url("admin/simpan_update_log_pengiriman/$v->id_log_pengiriman"); ?>" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="id_pengiriman" class="form-control" value="<?php echo $v->id_pengiriman; ?>" readonly>
								<label>AWB NO / BL</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="" class="form-control" value="<?php echo $v->awb_no; ?>" readonly>
                                    </div>
                                </div>
								<label>Pick up Info</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="" class="form-control" value="<?php echo $v->pickup_info; ?>" readonly>
                                    </div>
                                </div>
								<label>Remarks</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="remarks_activity" class="form-control" value="<?php echo $v->remarks_activity; ?>">
                                    </div>
                                </div>
								<label>No Kendaraan</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="no_kendaraan" class="form-control" value="<?php echo $v->no_kendaraan; ?>">
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
	