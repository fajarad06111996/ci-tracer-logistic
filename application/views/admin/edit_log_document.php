<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> EDIT DOKUMEN</b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="<?php echo base_url("admin/update_log_pengiriman/$id_pengiriman"); ?>" type="button" class="btn bg-teal waves-effect"><i class="material-icons">reply</i> Kembali</a>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
						<?php foreach ($edit_log_document as $v) { ?>
                            <form role="form" action="<?php echo base_url("admin/simpan_log_document/$v->id_log_document/$v->id_pengiriman"); ?>" enctype="multipart/form-data" method="post">
                               <label>NO DOKUMEN</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="no_document" class="form-control" value="<?php echo $v->no_document; ?>" REQUIRED>
                                        </div>
                                    </div>
									<label>JENIS DOKUMEN</label> 
									<div class="form-group">
                                        <div class="form-line">
											<select class="form-control show-tick" name="jenis_document" REQUIRED>
												<option value="<?php echo $v->jenis_document; ?>"><?php echo $v->jenis_document; ?></option>
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
                                            <input type="date" name="tanggal_document" class="form-control" value="<?php echo $v->tanggal_document; ?>" REQUIRED>
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
	