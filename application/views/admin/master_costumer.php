<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> MASTER COSTUMER </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <button type="button" data-toggle="modal" data-target="#tambah" class="btn bg-cyan waves-effect">Tambah Costumer</button>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>KODE </th>
                                        <th>NAMA</th>
                                        <th>KOTA</th>
                                        <th>PROVINSI</th>
                                        <th>TELEPON</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($master_costumer as $v) { ?>
                                     <tr>
                                        <td><?php echo $v->costumer_code; ?></td>
                                        <td><?php echo $v->costumer_name; ?></td>
                                        <td><?php echo $v->city; ?></td>
                                        <td><?php echo $v->province; ?></td>
                                        <td><?php echo $v->telephone; ?></td>
                                        <td>
										<div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url("admin/edit_master_costumer/$v->costumer_id"); ?>" class=" waves-effect waves-block">Edit</a></li>
                                        <li><a href="<?php echo base_url("admin/hapus_master_costumer/$v->costumer_id/$v->costumer_name"); ?>" class=" waves-effect waves-block" onclick="javascript : return confirm('Data Akan Di Hapus')">Hapus</a></li>
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
	
	
	<div class="modal fade" id="tambah">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url('admin/tambah_master_costumer'); ?>" enctype="multipart/form-data" method="post">
								<label>Costumer Code</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="costumer_code" class="form-control" placeholder="Costumer Code" REQUIRED>
                                        </div>
                                    </div>
									<label>Costumer Name</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="costumer_name" class="form-control" placeholder="Costumer Name" REQUIRED>
                                        </div>
                                    </div>
									<label>Alamat</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="address" class="form-control" placeholder="Alamat">
                                        </div>
                                    </div>
									<label>Kota</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="city" class="form-control" placeholder="Kota">
                                        </div>
                                    </div>
									<label>Kode Pos</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="postal_code" class="form-control" placeholder="Kode Pos">
                                        </div>
                                    </div>
									<label>Provinsi</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="province" class="form-control" placeholder="Provinsi" REQUIRED>
                                        </div>
                                    </div>
									<label>Email</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email_id" class="form-control" placeholder="Email" >
                                        </div>
                                    </div>
									<label>Telepon</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="telephone" class="form-control" placeholder="Telepon">
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
						