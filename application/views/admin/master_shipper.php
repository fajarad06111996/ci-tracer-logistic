<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> MASTER SHIPPER </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <button type="button" data-toggle="modal" data-target="#tambah" class="btn bg-cyan waves-effect">Tambah Shipper</button>
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
                                        <th>NEGARA</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($master_shipper as $v) { ?>
                                     <tr>
                                        <td><?php echo $v->shipper_code; ?></td>
                                        <td><?php echo $v->shipper_name; ?></td>
                                        <td><?php echo $v->city; ?></td>
                                        <td><?php echo $v->province; ?></td>
                                        <td><?php echo $v->country_name; ?></td>
                                        <td>
										<div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url("admin/edit_master_shipper/$v->shipper_id"); ?>" class=" waves-effect waves-block">Edit</a></li>
                                        <li><a href="<?php echo base_url("admin/hapus_master_shipper/$v->shipper_id"); ?>" class=" waves-effect waves-block" onclick="javascript : return confirm('Data Akan Di Hapus')">Hapus</a></li>
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
                                <form role="form" action="<?php echo base_url('admin/tambah_master_shipper'); ?>" enctype="multipart/form-data" method="post">
								<label>Shipper Code</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="shipper_code" class="form-control" placeholder="Shipper Code" REQUIRED>
                                        </div>
                                    </div>
									<label>Shipper Name</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="shipper_name" class="form-control" placeholder="Shipper Name" REQUIRED>
                                        </div>
                                    </div>
									<label>Alamat</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="address" class="form-control" placeholder="Alamat" REQUIRED>
                                        </div>
                                    </div>
									<label>Kota</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="city" class="form-control" placeholder="Kota" REQUIRED>
                                        </div>
                                    </div>
									<label>Provinsi</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="province" class="form-control" placeholder="Provinsi" REQUIRED>
                                        </div>
                                    </div>
									<label>Kode Pos</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="postal_code" class="form-control" placeholder="Kode Pos">
                                        </div>
                                    </div>
									<label>State Kode</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="state_code" class="form-control" placeholder="State Kode">
                                        </div>
                                    </div>
									<label>Kode Negara</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="country_code" class="form-control" placeholder="Kode Negara" >
                                        </div>
                                    </div>
									<label>Nama Negara</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="country_name" class="form-control" placeholder="Nama Negara">
                                        </div>
                                    </div>
									<label>Attention</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="attention" class="form-control" placeholder="Attention" >
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
									<label>Fax</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="fax" class="form-control" placeholder="Fax">
                                        </div>
                                    </div>
									<label>NPWP</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="npwp" class="form-control" placeholder="NPWP" >
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
						