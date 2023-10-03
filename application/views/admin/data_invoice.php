// <script type="text/javascript">
// $(function(){
// $("#pilihsemua").click(function () {
// $('.pilihx').attr('checked', this.checked);
// });

// $(".pilih").click(function(){
// if($(".pilihx").length == $(".pilih:checked").length) {
// $("#pilihsemua").attr("checked", "checked");
// } else {
// $("#pilihsemua").removeAttr("checked");
// }
// });
// });
// </script>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> DATA INVOICE </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PILIH DATA PENGIRIMAN
                                
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
						<form action="<?php echo base_url("admin/buat_invoice"); ?>" method="post">
                            <select id="optgroup" class='ms' multiple="multiple" name="id_pengiriman[]" REQUIRED>
                                <optgroup label="NO RESI - ASAL -> TUJUAN" >
								<?php foreach($tampil_data_pengiriman as $v) { 
								// if($v->status_pengiriman == '1'){
									// $status = 'Proses';
								// }if($v->status_pengiriman == '2'){
									// $status = 'Finish';
								// }
								?>
                                    <option value="<?php echo $v->id_pengiriman; ?>"> <?php echo $v->pickup_info; ?> (<?php echo $v->master_asal; ?> -> <?php echo $v->tujuan; ?>) <?php echo $v->harga; ?></option>
								<?php } ?>
                                </optgroup>
                            </select> <br/><br/>
							
							<label>Pilih Costumer</label>
							<div class="row clearfix">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="costumer_id" id="id_costumer" placeholder="Kode" readonly="" />
														<input type="text" class="form-control"  id="kode_costumer" name="costumer_code" placeholder="Costumer Code" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="nama_costumer" name="costumer_name" placeholder="Costumer Name" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalcostumer">Pilih Costumer</button>
													</div>
							
                        </div>
                        </div>
						<div class="modal-footer">
                                    <button class="btn btn-primary btn-block margin-bottom" type="submit"><i class="fa fa-arrow-right"></i>Buat Invoice</button>
                         </div>
						 </form>
                    </div>
                </div>
            </div>
			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Pilih</th>
                                        <th>Kode Invoice</th>
                                        <th>Costumer</th>
                                        <th>Cetak</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($tampil_data_invoice as $v) { 
								// if($v->status_pengiriman == '1'){
									// $pengiriman = 'Proses';
									// $label = 'label bg-blue';
								// }
								// if($v->status_pengiriman == '2'){
									// $pengiriman = 'Finish';
									// $label = 'label bg-green';
								// }
								// if($v->status_pengiriman == '3'){
									// $pengiriman = 'Transit';
									// $label = 'label bg-deep-orange';
								// }
								// if($v->status_pengiriman == '4'){
									// $pengiriman = 'Kedatangan';
									// $label = 'label bg-deep-orange';
								// }
								// if($v->status_pengiriman == '5'){
									// $pengiriman = 'Finish';
									// $label = 'label bg-green';
								// }
								// if($v->status_pengiriman == '6'){
									// $pengiriman = 'Finish';
									// $label = 'label bg-green';
								// }
								?>
                                     <tr>
                                        <td><a href="<?php echo base_url("admin/data_detail_invoice/$v->kode_invoice"); ?>" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float">
											<i class="material-icons">call_missed_outgoing</i>
										</a></td>
                                        <td><?php echo $v->kode_invoice; ?></td>
                                        <td><?php echo $v->costumer_name; ?></td>
                                        <td><a href="<?php echo base_url("admin/cetak_laporan_invoice/$v->kode_invoice"); ?>" class="btn bg-cyan btn-circle-lg waves-effect waves-circle waves-float" target="_blank">
											<i class="material-icons">print</i>
										</a></td>
                                       
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