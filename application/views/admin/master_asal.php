<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> MASTER ASAL </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <button type="button" data-toggle="modal" data-target="#tambahasal" class="btn bg-cyan waves-effect">Tambah Asal</button>
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
                                        <th>MASTER ASAL</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($master_asal as $v){ ?>
                                     <tr>
                                        <td><?php echo $v->kode_asal; ?></td>
                                        <td><?php echo $v->master_asal; ?></td>
                                        <td>
										<div class="btn-group">
										<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul class="dropdown-menu">
											<li><a href="<?php echo base_url("admin/edit_master_asal/$v->id_asal"); ?>" class=" waves-effect waves-block">Edit</a></li>
											<li><a href="<?php echo base_url("admin/hapus_master_asal/$v->id_asal/$v->master_asal"); ?>" class=" waves-effect waves-block">Hapus</a></li>
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
	
	
	<div class="modal fade" id="tambahasal">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url('admin/tambah_master_asal'); ?>" enctype="multipart/form-data" method="post">
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