<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
			<?php if($sebagai == '1'){ ?>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
					<a href="<?php echo base_url("admin/data_remender_besok"); ?>">
                        <div class="icon">
                            <i class="material-icons">navigate_next</i>
                        </div>
						</a>
                        <div class="content">
                            <div class="text">REMINDER BESOK</div>
                            <div class="number count-to"><?php echo $total_data_rimender_besok; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
					<a href="<?php echo base_url("admin/data_remender_hariini"); ?>">
                        <div class="icon">
                            <i class="material-icons">looks</i>
                        </div>
						</a>
                        <div class="content">
                            <div class="text">REMINDER HARI INI</div>
                            <div class="number count-to" ><?php echo $total_data_rimender_hariini; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
					<a href="<?php echo base_url("admin/data_remender_kemarin"); ?>">
                        <div class="icon">
                            <i class="material-icons">navigate_before</i>
                        </div>
						</a>
                        <div class="content">
                            <div class="text">REMINDER KEMARIN</div>
                            <div class="number count-to"><?php echo $total_data_rimender_kemaren; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">directions_transit</i>
                        </div>
                        <div class="content">
                            <div class="text">DATA USER</div>
                            <div class="number count-to"><?php echo $total_data_user; ?></div>
                        </div>
                    </div>
                </div>
				<br/>
				
				<body>
			<script src="<?php echo base_url(); ?>assets/highchart/code/highcharts.js"></script>
			<script src="<?php echo base_url(); ?>assets/highchart/code/modules/exporting.js"></script>
			<script src="<?php echo base_url(); ?>assets/highchart/code/modules/export-data.js"></script>

			<div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			<!-- <script type="text/javascript">
			Highcharts.chart('container', {
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie'
				},
				title: {
					text: 'DESKRIPSI PENGIRIMAN TRACER LOGISTIC'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %'
						}
					}
				},
				series: [{
					name: 'Brands',
					colorByPoint: true,
					data: [{
						name: 'Proses',
						y: <?php //echo $jumlah_des_proses; ?>,
						sliced: true,
						selected: true
					}, {
						name: 'Sukses',
						y: <?php //echo $jumlah_des_sukses; ?>
					}, {
						name: 'Kendala Supir',
						y: <?php //echo $jumlah_des_kendala_supir; ?>
					}, {
						name: 'Barang Rusak',
						y: <?php //echo $jumlah_des_barang_rusak; ?>
					}, {
						name: 'Terlambat',
						y: <?php //echo $jumlah_des_terlambat; ?>
					}, {
						name: 'Barang Hilang',
						y: <?php //echo $jumlah_des_barang_hilang; ?>
					}, {
						name: 'Lain-Lain',
						y: <?php //echo $jumlah_des_lain; ?>
					}]
				}]
			});
					</script> -->
					<script type="text/javascript">
			Highcharts.chart('container1', {
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie'
				},
				title: {
					text: 'DESKRIPSI PENGIRIMAN TRACER LOGISTIC'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %'
						}
					}
				},
				series: [{
					name: 'Brands',
					colorByPoint: true,
					data: [{
						name: 'Darat',
						y: <?php echo $jumlah_moda_darat; ?>,
						sliced: true,
						selected: true
					}, {
						name: 'Udara',
						y: <?php echo $jumlah_moda_laut; ?>
					}, {
						name: 'Laut',
						y: <?php echo $jumlah_moda_udara; ?>
					}]
				}]
			});
					</script>
			</body>
            </div>
			<?php } ?>
			
			<?php if($sebagai == '2'){ ?>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">label</i>
                        </div>
                        <div class="content">
                            <div class="text">KEBERANGKATAN</div>
                            <div class="number count-to"><?php echo $data_pengiriman_user_keberangkatan; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">directions_transit</i>
                        </div>
                        <div class="content">
                            <div class="text">TRANSIT</div>
                            <div class="number count-to"><?php echo $data_pengiriman_user_transit; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">place</i>
                        </div>
                        <div class="content">
                            <div class="text">KEDATANGAN</div>
                            <div class="number count-to" ><?php echo $data_pengiriman_user_kedatangan; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">beenhere</i>
                        </div>
                        <div class="content">
                            <div class="text">FINISH</div>
                            <div class="number count-to"><?php echo $data_pengiriman_user_finish; ?></div>
                        </div>
                    </div>
                </div>
            </div>
			<?php } ?>
            <!-- #END# CPU Usage -->
            

            
        </div>
    </section>