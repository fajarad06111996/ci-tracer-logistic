
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> VIEW DATA PENGIRIMAN</b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="<?php echo base_url('admin/data_pengiriman'); ?>" type="button" class="btn bg-teal waves-effect"><i class="material-icons">reply</i> Kembali</a>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
						<?php foreach($view_data_pengiriman as $v) { ?>
                            <form action="<?php echo base_url("admin/simpan_view_data_pengiriman/$v->id_pengiriman"); ?>" enctype="multipart/form-data" method="post">
                                <label>Resi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="pickup_info" class="form-control" value="<?php echo $v->pickup_info; ?>" REQUIRED>
                                    </div>
                                </div>
								<!-- <label>Pick up date</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="pickup_date" class="form-control" value="Pick up date" REQUIRED>
                                    </div>
                                </div> -->
								<label>AWB No / BL</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="awb_no" class="form-control" value="<?php echo $v->awb_no; ?>" REQUIRED>
                                    </div>
                                </div>
								<label>No SP</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="no_so" class="form-control" value="<?php echo $v->no_so; ?>" REQUIRED>
                                    </div>
                                </div>
								<label>Pilih Shipper</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="shipper_id" id="id_shipper" value="<?php echo $v->shipper_id; ?>" REQUIRED>
														<input type="text" class="form-control"  id="kode_shipper" name="shipper_code" value="<?php echo $v->shipper_code; ?>" readonly="" REQUIRED>
														  <input type="text" class="form-control" id="nama_shipper" name="shipper_name" value="<?php echo $v->shipper_name; ?>" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalshipper">Pilih Shipper</button>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahshipper">Tambah Shipper</button>
													</div>
													</div>
								<label>Pilih Asal</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="id_asal" id="id_asal" value="<?php echo $v->id_asal; ?>" readonly="" />
														<input type="text" class="form-control"  id="kode_asal" name="kode_asal" value="<?php echo $v->kode_asal; ?>" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="asal" name="master_asal" value="<?php echo $v->master_asal; ?>" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalasal">Pilih Asal</button>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahasal">Tambah Asal</button>
													</div>
													</div>
								<!--<label>Deskripsi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="description">
                                        <option value="Proses">Proses</option>
                                        <option value="Sukses">Sukses</option>
                                        <option value="Terlambat">Terlambat</option>
                                        <option value="Barang Hilang">Barang Hilang</option>
                                        <option value="Kendala Supir">Kendala Supir</option>
                                        <option value="Barang Rusak">Barang Rusak</option>
                                        <option value="Lain-Lain">Lain-Lain</option>
                                    </select>
                                    </div>
                                </div> -->
								<label>Pilih Consignee</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="consignee_id" id="id_consignee" value="<?php echo $v->consignee_id; ?>" readonly="" />
														<input type="text" class="form-control"  id="kode_consignee" name="consignee_code" value="<?php echo $v->consignee_code; ?>" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="nama_consignee" name="consignee" value="<?php echo $v->consignee; ?>" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalconsignee">Pilih Consignee</button>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahconsingee">Tambah Consignee</button>
													</div>
													</div>
								<label>Pilih Tujuan</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="id_tujuan" id="id_tujuan" value="<?php echo $v->id_tujuan; ?>" readonly="" />
														<input type="text" class="form-control"  id="kode_tujuanx" name="kode_tujuan" value="<?php echo $v->kode_tujuan; ?>" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="tujuanx" name="nama_tujuan" value="<?php echo $v->tujuan; ?>" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModaltujuan">Pilih Tujuan</button>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahlokasi">Tambah Tujuan</button>
													</div>
													</div>
								<!--<label>Pilih HPP</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="id_hpp" id="id_hpp" value="Kode" readonly="" REQUIRED />
														<input type="text" class="form-control"  id="kode_asalx" value="Kode Asal" readonly="" REQUIRED>
														<input type="text" class="form-control"  id="asalx" value="Asal" readonly="" REQUIRED>
														<input type="text" class="form-control"  id="kode_tujuan" value="Kode Tujuan" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="tujuan"  value="Tujuan" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="base_on" name="base_on" value="Base On" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="harga_satuan" name="harga" value="Harga Satuan" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalhpp">Pilih HPP</button>
													</div>
													</div> -->
								<!--<label>Alamat</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="address" class="form-control" value="Alamat">
                                    </div>
                                </div> -->
								<!-- <label>Tujuan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="destination" class="form-control" value="Destination">
                                    </div>
                                </div> -->
								<label>Pilih Vendor</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="id_vendor" id="id_vendor" value="<?php echo $v->vendor_id; ?>" readonly="" />
														<input type="text" class="form-control"  id="kode_vendor" name="vendor_code" value="<?php echo $v->vendor_code; ?>" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="nama_vendor" name="vendor_name" value="<?php echo $v->vendor_name; ?>" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalvendor">Pilih Vendor</button>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahvendor">Tambah Vendor</button>
													</div>
													</div>
								<label>Pilih Costumer</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="id_costumer" id="id_costumer" value="<?php echo $v->id_costumer; ?>" readonly="" />
														<input type="text" class="form-control"  id="kode_costumer" name="costumer_code" value="<?php echo $v->costumer_code; ?>" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="nama_costumer" name="costumer_name" value="<?php echo $v->costumer_name; ?>" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalcostumer">Pilih Costumer</button>
													</div>
													</div>
								<label>Berat</label>
								<div class="row clearfix">
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="weight" class="form-control" value="<?php echo $v->weight; ?>" REQUIRED>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="satuan_weight" REQUIRED>
                                        <option value="<?php echo $v->satuan_weight; ?>"> <?php echo $v->satuan_weight; ?> </option>
                                        <option value="KGS">KGS</option>
                                        <option value="TON">TON</option>
                                    </select>
                                    </div>
                                </div>
                                </div>
                                </div>
								<label>QTY</label>
								<div class="row clearfix">
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="colly" class="form-control" value="<?php echo $v->colly; ?>" REQUIRED>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" data-live-search="true" name="satuan_colly" REQUIRED>
                                        <option value="<?php echo $v->satuan_colly; ?>"> <?php echo $v->satuan_colly; ?></option>
                                        <option value="BAGS">BAGS</option>
													<option value="BALE(S)">BALE(S)</option>
													<option value="BOTTLE">BOTTLE</option>
													<option value="BOXES">BOXES</option>
													<option value="BUNDELS">BUNDELS</option>
													<option value="CANS">CANS</option>
													<option value="CASE">CASE</option>
													<option value="COILS">COILS</option>
													<option value="CRATE">CRATE</option>
													<option value="CTNS">CTNS</option>
													<option value="DRUM">DRUM</option>
													<option value="GRAMS">GRAMS</option>
													<option value="ISOTANKS">ISOTANKS</option>
													<option value="JUG">JUG</option>
													<option value="LITRE">LITRE</option>
													<option value="LOT">LOT</option>
													<option value="MILLIGRAMS">MILLIGRAMS</option>
													<option value="MILLITERS">MILLITERS</option>
													<option value="MTR">MTR</option>
													<option value="PAILS">PAILS</option>
													<option value="PAIRS">PAIRS</option>
													<option value="PALLET">PALLET</option>
													<option value="PCS">PCS</option>
													<option value="PKGS">PKGS</option>
													<option value="ROLLS">ROLLS</option>
													<option value="SET">SET</option>
													<option value="SLIP SHEET">SLIP SHEET</option>
													<option value="SPOOLS">SPOOLS</option>
													<option value="STRIPS">STRIPS</option>
													<option value="TIN">TIN</option>
													<option value="TOTE">TOTE</option>
													<option value="TRAY">TRAY</option>
													<option value="WOODEN CASE">WOODEN CASE</option>
                                    </select>
                                    </div>
                                </div>
                                </div>
                                </div>
								<label>Volume</label>
								<div class="row clearfix">
                                <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="volume_panjang" class="form-control" value="<?php echo $v->volume_panjang; ?>" REQUIRED>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="volume_lebar" class="form-control" value="<?php echo $v->volume_lebar; ?>" REQUIRED>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="volume_tinggi" class="form-control" value="<?php echo $v->volume_tinggi; ?>" REQUIRED>
                                    </div>
                                </div>
                                </div>
                                </div>
								<label> Volume</label>
                                <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="satuan_volume" REQUIRED>
                                        <option value="<?php echo $v->satuan_volume; ?>"><?php echo $v->satuan_volume; ?></option>
                                        <option value="CBM">CBM</option>
                                    </select>
                                    </div>
                                </div>
                                </div>
								<!--<label>Moda Tranportasi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="moda" class="form-control" value="Moda Tranportasi">
                                    </div>
                                </div> -->
								<label>Moda Tranportasi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="moda" REQUIRED>
                                        <option value="<?php echo $v->moda; ?>"><?php echo $v->moda; ?></option>
                                        <option value="Darat">Darat</option>
                                        <option value="Laut">Laut</option>
                                        <option value="Udara">Udara</option>
                                    </select>
                                    </div>
                                </div>
								<label>LAYANAN</label> 
									<div class="form-group">
                                        <div class="form-line">
											<select class="form-control show-tick" name="jenis_layanan" REQUIRED>
												<option value="<?php echo $v->jenis_layanan; ?>"><?php echo $v->jenis_layanan; ?></option>
												<option value="YES">YES</option>
												<option value="REGULER">REGULER</option>
												<option value="EXPRESS">EXPRESS</option>
												<!-- <option value="CHARTER">CHARTER</option> -->
											</select>
									</div>
									</div>
								<label>Jenis Tarif</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="jenis_tarif" REQUIRED>
                                        <option value="<?php echo $v->jenis_tarif; ?>">Default</option>
                                        <option value="0">Free</option>
                                        <option value="1">Cash</option>
                                    </select>
                                    </div>
                                </div>
								<label>Pembayaran</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" name="pembayaran" REQUIRED>
                                        <option value="<?php echo $v->pembayaran; ?>">Default</option>
                                        <option value="0">Cash</option>
                                        <option value="1">Credit</option>
                                    </select>
                                    </div>
                                </div>
								<!-- <label>Harga</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="harga" class="form-control" value="Harga">
                                    </div>
                                </div> -->
								<label>TAT (Hari)</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="tat" class="form-control" value="<?php echo $v->tat; ?>">
                                    </div>
                                </div>
								<label>ETA</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="eta" class="form-control" value="<?php echo $v->eta; ?>" REQUIRED>
                                    </div>
                                </div>
								<label>Deskripsi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="description" class="form-control" value="<?php echo $v->description; ?>">
                                    </div>
                                </div>
								<!-- <label>Received By</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="recaived_by" class="form-control" value="Received By">
                                    </div>
                                </div> -->
								<!-- <label>ATA</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="ata" class="form-control" value="ATA">
                                    </div>
                                </div> -->
								<!-- <label>Keterangan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="remarks" class="form-control" value="Remarks">
                                    </div>
                                </div> -->
						
                                <button type="submit" class="btn bg-purple waves-effect">
                                    <i class="material-icons">add_circle_outline</i> Simpan
                                </button>
								<a href="<?php echo base_url("admin/detail_data_pengiriman/$v->id_pengiriman"); ?>" class="btn bg-blue waves-effect" target="_balnk">
                                    <i class="material-icons">print</i> Cetak
                                </a>
								<?php } ?>
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
	
	
	<!-- MASTER SHIPPER -->
							<div class="modal fade" id="myModalshipper" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:500px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Daftar Shipper</h4>
                                        </div>
                                        <div class="body table-responsive">
                                            <table id="lookupshipper" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Shipper</th>
                                                        <th>Nama Shipper</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                <?php foreach($lihat_master_shipper as $lms) { ?>
                                                 <tr class="pilihshipper" data-idshipper="<?php echo $lms->shipper_id; ?>" data-kodeshipper="<?php echo $lms->shipper_code; ?>" data-namashipper="<?php echo $lms->shipper_name; ?>" >
                                                            <td><?php echo $lms->shipper_code; ?></td>
                                                            <td><?php echo $lms->shipper_name; ?></td>
                                                        </tr>
                                                        <?php } ?>            
                                                        </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							
							<!-- untuk tambah data -->
							<div class="modal fade" id="myModalconsignee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:500px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Daftar Consignee</h4>
                                        </div>
                                        <div class="body table-responsive">
                                            <table id="lookupconsignee" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Consignee</th>
                                                        <th>Nama Consignee</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                <?php foreach($lihat_master_consignee as $lmc) { ?>
                                                 <tr class="pilihconsignee" data-idconsignee="<?php echo $lmc->consignee_id; ?>" data-kodeconsignee="<?php echo $lmc->consignee_code; ?>" data-namaconsignee="<?php echo $lmc->consignee_name; ?>" >
                                                            <td><?php echo $lmc->consignee_code; ?></td>
                                                            <td><?php echo $lmc->consignee_name; ?></td>
                                                        </tr>
                                                        <?php } ?>            
                                                        </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<!-- untuk tambah data -->
							<div class="modal fade" id="myModalhpp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:500px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Daftar Harga HPP</h4>
                                        </div>
                                        <div class="body table-responsive">
                                            <table id="lookuphpp" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Asal</th>
                                                        <th>Asal</th>
                                                        <th>Kode Tujuan</th>
                                                        <th>Tujuan</th>
                                                        <th>Base On</th>
                                                        <th>Harga</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                <?php foreach($lihat_hpp as $lhpp) { ?>
                                                 <tr class="pilihhpp" data-idhpp="<?php echo $lhpp->id_hpp; ?>" data-kodeasalx="<?php echo $lhpp->kode_asal; ?>" data-asalx="<?php echo $lhpp->master_asal; ?>" data-kodetujuan="<?php echo $lhpp->kode_tujuan; ?>" data-tujuan="<?php echo $lhpp->tujuan; ?>" data-baseon="<?php echo $lhpp->base_on; ?>" data-hargasatuan="<?php echo $lhpp->harga_satuan; ?>" >
                                                            <td><?php echo $lhpp->kode_asal; ?></td>
                                                            <td><?php echo $lhpp->master_asal; ?></td>
                                                            <td><?php echo $lhpp->kode_tujuan; ?></td>
                                                            <td><?php echo $lhpp->tujuan; ?></td>
                                                            <td><?php echo $lhpp->base_on; ?></td>
                                                            <td><?php echo $lhpp->harga_satuan; ?></td>
                                                        </tr>
                                                        <?php } ?>            
                                                        </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<!-- untuk tambah data -->
							<div class="modal fade" id="myModalcostumer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:500px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Daftar Costumer</h4>
                                        </div>
                                        <div class="body table-responsive">
                                            <table id="lookupcostumer" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Costumer</th>
                                                        <th>Nama Costumer</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                <?php foreach($master_costumer as $cm) { ?>
                                                 <tr class="pilihcostumer" data-idcostumer="<?php echo $cm->costumer_id; ?>" data-kodecostumer="<?php echo $cm->costumer_code; ?>" data-namacostumer="<?php echo $cm->costumer_name; ?>" >
                                                            <td><?php echo $cm->costumer_code; ?></td>
                                                            <td><?php echo $cm->costumer_name; ?></td>
                                                        </tr>
                                                        <?php } ?>            
                                                        </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<!-- untuk tambah data -->
							<div class="modal fade" id="myModaltujuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:500px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Daftar Tujuan</h4>
                                        </div>
                                        <div class="body table-responsive">
                                            <table id="lookuptujuan" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Tujuan</th>
                                                        <th>Nama Tujuan</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                <?php foreach($master_tujuan as $mj) { ?>
                                                 <tr class="pilihtujuan" data-idtujuan="<?php echo $mj->id_tujuan; ?>" data-kodetujuanx="<?php echo $mj->kode_tujuan; ?>" data-tujuanx="<?php echo $mj->tujuan; ?>" >
                                                            <td><?php echo $mj->kode_tujuan; ?></td>
                                                            <td><?php echo $mj->tujuan; ?></td>
                                                        </tr>
                                                        <?php } ?>            
                                                        </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<!-- untuk tambah data -->
							<div class="modal fade" id="myModalasal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:500px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Daftas Asal</h4>
                                        </div>
                                        <div class="body table-responsive">
                                            <table id="lookupasal" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Asal</th>
                                                        <th>Asal</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                <?php foreach($master_asal as $lma) { ?>
                                                 <tr class="pilihasal" data-idasal="<?php echo $lma->id_asal; ?>" data-kodeasal="<?php echo $lma->kode_asal; ?>" data-asal="<?php echo $lma->master_asal; ?>" >
                                                            <td><?php echo $lma->kode_asal; ?></td>
                                                            <td><?php echo $lma->master_asal; ?></td>
                                                        </tr>
                                                        <?php } ?>            
                                                        </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<!-- untuk tambah data -->
							<div class="modal fade" id="myModalvendor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:500px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Daftar Vendor</h4>
                                        </div>
                                        <div class="body table-responsive">
                                            <table id="lookupvendor" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kode Vendor</th>
                                                        <th>Nama Vendor</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                <?php foreach($lihat_master_vendor as $lmv) { ?>
                                                 <tr class="pilihvendor" data-idvendor="<?php echo $lmv->vendor_id; ?>" data-kodevendor="<?php echo $lmv->vendor_code; ?>" data-namavendor="<?php echo $lmv->vendor_name; ?>" >
                                                            <td><?php echo $lmv->vendor_code; ?></td>
                                                            <td><?php echo $lmv->vendor_name; ?></td>
                                                        </tr>
                                                        <?php } ?>            
                                                        </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							
			<div class="modal fade" id="tambahshipper">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url('admin/tambah_master_shipper_pengiriman'); ?>" enctype="multipart/form-data" method="post">
								<label>Shipper Code</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="shipper_code" class="form-control" value="Shipper Code" REQUIRED>
                                        </div>
                                    </div>
									<label>Shipper Name</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="shipper_name" class="form-control" value="Shipper Name" REQUIRED>
                                        </div>
                                    </div>
									<label>Alamat</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="address" class="form-control" value="Alamat" REQUIRED>
                                        </div>
                                    </div>
									<label>Kota</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="city" class="form-control" value="Kota" REQUIRED>
                                        </div>
                                    </div>
									<label>Provinsi</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="province" class="form-control" value="Provinsi" REQUIRED>
                                        </div>
                                    </div>
									<label>Kode Pos</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="postal_code" class="form-control" value="Kode Pos">
                                        </div>
                                    </div>
									<label>State Kode</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="state_code" class="form-control" value="State Kode">
                                        </div>
                                    </div>
									<label>Kode Negara</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="country_code" class="form-control" value="Kode Negara" >
                                        </div>
                                    </div>
									<label>Nama Negara</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="country_name" class="form-control" value="Nama Negara">
                                        </div>
                                    </div>
									<label>Attention</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="attention" class="form-control" value="Attention" >
                                        </div>
                                    </div>
									<label>Email</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email_id" class="form-control" value="Email" >
                                        </div>
                                    </div>
									<label>Telepon</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="telephone" class="form-control" value="Telepon">
                                        </div>
                                    </div>
									<label>Fax</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="fax" class="form-control" value="Fax">
                                        </div>
                                    </div>
									<label>NPWP</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="npwp" class="form-control" value="NPWP" >
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
							
				<div class="modal fade" id="tambahconsingee">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url('admin/tambah_master_consignee'); ?>" enctype="multipart/form-data" method="post">
								<label>Consignee Code</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="consignee_code" class="form-control" value="Shipper Code" REQUIRED>
                                        </div>
                                    </div>
									<label>Consignee Name</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="consignee_name" class="form-control" value="Shipper Name" REQUIRED>
                                        </div>
                                    </div>
									<label>Alamat</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="address" class="form-control" value="Alamat" REQUIRED>
                                        </div>
                                    </div>
									<label>Kota</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="city" class="form-control" value="Kota" REQUIRED>
                                        </div>
                                    </div>
									<label>Provinsi</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="province" class="form-control" value="Provinsi" REQUIRED>
                                        </div>
                                    </div>
									<label>Kode Pos</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="postal_code" class="form-control" value="Kode Pos">
                                        </div>
                                    </div>
									<label>State Kode</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="state_code" class="form-control" value="State Kode">
                                        </div>
                                    </div>
									<label>Kode Negara</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="country_code" class="form-control" value="Kode Negara" >
                                        </div>
                                    </div>
									<label>Nama Negara</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="country_name" class="form-control" value="Nama Negara">
                                        </div>
                                    </div>
									<label>Attention</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="attention" class="form-control" value="Attention" >
                                        </div>
                                    </div>
									<label>Email</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email_id" class="form-control" value="Email" >
                                        </div>
                                    </div>
									<label>Telepon</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="telephone" class="form-control" value="Telepon">
                                        </div>
                                    </div>
									<label>Fax</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="fax" class="form-control" value="Fax">
                                        </div>
                                    </div>
									<label>NPWP</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="npwp" class="form-control" value="NPWP" >
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
						
			<div class="modal fade" id="tambahlokasi">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url('admin/tambah_tujuan_pengiriman'); ?>" enctype="multipart/form-data" method="post">
								 <label>KODE LOKASI</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kode_tujuan" class="form-control" value="KODE LOKASI" REQUIRED>
                                        </div>
                                    </div>
									<label>LOKASI</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tujuan" class="form-control" value="LOKASI" REQUIRED>
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
						
		<div class="modal fade" id="tambahvendor">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url('admin/tambah_master_vendor_pengiriman'); ?>" enctype="multipart/form-data" method="post">
								<label>Vendor Code</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="vendor_code" class="form-control" value="Shipper Code" REQUIRED>
                                        </div>
                                    </div>
									<label>Vendor Name</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="vendor_name" class="form-control" value="Shipper Name" REQUIRED>
                                        </div>
                                    </div>
									<label>Alamat</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="address" class="form-control" value="Alamat">
                                        </div>
                                    </div>
									<label>Kota</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="city" class="form-control" value="Kota">
                                        </div>
                                    </div>
									<label>Kode Pos</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="postal_code" class="form-control" value="Kode Pos">
                                        </div>
                                    </div>
									<label>State Kode</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="state_code" class="form-control" value="State Kode">
                                        </div>
                                    </div>
									<label>Provinsi</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="province" class="form-control" value="Provinsi" >
                                        </div>
                                    </div>
									<label>Kode Negara</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="country_code" class="form-control" value="Kode Negara" >
                                        </div>
                                    </div>
									<label>Nama Negara</label>
								<div class="form-group">
                                        <div class="form-line focused warning">
                                            <input type="text" name="country_name" class="form-control" value="Nama Negara">
                                        </div>
                                    </div>
									<label>Attention</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="attention" class="form-control" value="Attention" >
                                        </div>
                                    </div>
									<label>Email</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email_id" class="form-control" value="Email" >
                                        </div>
                                    </div>
									<label>Telepon</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="telephone" class="form-control" value="Telepon">
                                        </div>
                                    </div>
									<label>Fax</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="fax" class="form-control" value="Fax">
                                        </div>
                                    </div>
									<label>NPWP</label>
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="npwp" class="form-control" value="NPWP" >
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
						
						
	<div class="modal fade" id="tambahasal">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url('admin/tambah_master_asal_pengiriman'); ?>" enctype="multipart/form-data" method="post">
								 <label>KODE ASAL</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kode_asal" class="form-control" value="KODE ASAL" REQUIRED>
                                        </div>
                                    </div>
									<label>MASTER ASAL</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="master_asal" class="form-control" value="MASTER ASAL" REQUIRED>
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