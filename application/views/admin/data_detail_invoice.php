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
                                BASIC TABLES
                                <small>Basic example without any additional modification classes</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>NO RESI</th>
                                        <th>ASAL</th>
                                        <th>TUJUAN</th>
                                        <th>HARGA</th>
                                    </tr>
                                </thead>
								<?php foreach($data_detail_invoice as $v) { 
								$totalharga[] = $v->harga;
								$subtotal = array_sum($totalharga);
								?>
                                <tbody>
                                    <tr>
                                        <th><?php echo $v->pickup_info; ?></th>
                                        <td><?php echo $v->master_asal; ?></td>
                                        <td><?php echo $v->tujuan; ?></td>
                                        <td><?php echo $v->harga; ?></td>
                                    </tr>
                                </tbody>
								<?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
                            <form action="<?php echo base_url("admin/tambah_detail_invoice/$kode_invoice"); ?>" method="post">
                                <div class="col-md-6">
                                    <p>
                                        <b>SUB TOTAL</b>
                                    </p> 
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="subtotal" class="form-control" value="<?php echo $subtotal; ?>" REQUIRED readonly>
                                        </div>
                                    </div>
                                </div>
								 <div class="col-md-6">
                                    <p>
                                        <b>DPP</b>
                                    </p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="dpp" class="form-control" placeholder="DPP" REQUIRED>
                                        </div>
                                    </div>

                                </div>
								<div class="col-md-12">
                                    <p>
                                        <b>PPN QTY</b>
                                    </p> 
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="ppn_qty" class="form-control" placeholder="PPN QTY" REQUIRED>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                            </form>
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