<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> DATA REMENDER KEMARIN </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <!-- <a href="<?php //echo base_url('admin/input_data_pengiriman'); ?>" type="button" class="btn bg-cyan waves-effect">Tambah Data</a> -->
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Pick Up Info</th>
                                        <th>Pick up date</th>
                                        <th>Shipper Name</th>
                                        <th>NO SO</th>
                                        <th>AWB No</th>
                                        <th>Description</th>
                                        <th>Consignee</th>
                                        <th>Vendor</th>
                                        <th>Alamat</th>
                                        <th>Tujuan</th>
                                        <th>Berat</th>
                                        <th>Colly</th>
                                        <th>Moda</th>
                                        <th>Harga</th>
                                        <th>TAT</th>
                                        <th>ETA</th>
                                        <th>Di Terima</th>
                                        <th>ATA</th>
                                        <th>Keterangan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($data_remender_kemarin as $v) { 
								?>
                                     <tr>
                                        <td><?php echo $v->pickup_info; ?></td>
                                        <td><?php echo tgl_indo($v->pickup_date); ?></td>
                                        <td><?php echo $v->shipper_name; ?></td>
                                        <td><?php echo $v->no_so; ?></td>
                                        <td><?php echo $v->awb_no; ?></td>
                                        <td><?php echo $v->description; ?></td>
                                        <td><?php echo $v->consignee; ?></td>
                                        <td><?php echo $v->vendor_name; ?></td>
                                        <td><?php echo $v->address; ?></td>
                                        <td><?php echo $v->tujuan; ?></td>
                                        <td><?php echo $v->weight; ?></td>
                                        <td><?php echo $v->colly; ?></td>
                                        <td><?php echo $v->moda; ?></td>
                                        <td><?php echo $v->harga; ?></td>
                                        <td><?php echo $v->tat; ?></td>
                                        <td><?php echo $v->eta; ?></td>
                                        <td><?php echo $v->recaived_by; ?></td>
                                        <td><?php echo $v->ata; ?></td>
                                        <td><?php echo $v->remarks; ?></td>
                                        <td>
										<div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu"><?php if($v->status_pengiriman == '1'){ ?>
                                        <li><a href="<?php echo base_url("admin/edit_data_pengiriman/$v->id_pengiriman"); ?>" class=" waves-effect waves-block">Edit</a></li>
										
                                        <li><a href="<?php echo base_url("admin/hapus_data_pengiriman/$v->id_pengiriman/$v->awb_no"); ?>" class=" waves-effect waves-block" onclick="javascript : return confirm('Data Pengiriman Akan Di Hapus')">Hapus</a></li>
										<?php } ?>
                                        <li><a href="<?php echo base_url("admin/detail_data_pengiriman"); ?>" target="_blank" class=" waves-effect waves-block">Detail</a></li>
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