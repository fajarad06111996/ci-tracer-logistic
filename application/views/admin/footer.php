
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/dropzone/dropzone.js"></script>
	
	<!-- Multi Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/multi-select/js/jquery.multi-select.js"></script>
	
	<!-- Input Mask Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
	<!-- Morris Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/morrisjs/morris.js"></script>
	<!-- ChartJs -->
    <script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flot-charts/jquery.flot.time.js"></script>
	<script type="text/javascript">

//            jika dipilih, idpenduduk / nama penduduk akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("id_negara").value = $(this).attr('data-idnegara');
                document.getElementById("kode").value = $(this).attr('data-kode');
                document.getElementById("negara").value = $(this).attr('data-negara');
                $('#myModal').modal('hide');
            });

//            tabel lookup 
            $(function () {
                $("#lookup").dataTable();
            });
        </script>
		<script type="text/javascript">

//            jika dipilih, idpenduduk / nama penduduk akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilihshipper', function (e) {
                document.getElementById("id_shipper").value = $(this).attr('data-idshipper');
                document.getElementById("kode_shipper").value = $(this).attr('data-kodeshipper');
                document.getElementById("nama_shipper").value = $(this).attr('data-namashipper');
                $('#myModalshipper').modal('hide');
            });

//            tabel lookup 
            $(function () {
                $("#lookupshipper").dataTable();
            });
        </script>
		<script type="text/javascript">

//            jika dipilih, idpenduduk / nama penduduk akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilihconsignee', function (e) {
                document.getElementById("id_consignee").value = $(this).attr('data-idconsignee');
                document.getElementById("kode_consignee").value = $(this).attr('data-kodeconsignee');
                document.getElementById("nama_consignee").value = $(this).attr('data-namaconsignee');
                $('#myModalconsignee').modal('hide');
            });

//            tabel lookup 
            $(function () {
                $("#lookupconsignee").dataTable();
            });
        </script>
		<script type="text/javascript">

//            jika dipilih, idpenduduk / nama penduduk akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilihtujuan', function (e) {
                document.getElementById("id_tujuan").value = $(this).attr('data-idtujuan');
                document.getElementById("kode_tujuanx").value = $(this).attr('data-kodetujuanx');
                document.getElementById("tujuanx").value = $(this).attr('data-tujuanx');
                $('#myModaltujuan').modal('hide');
            });

//            tabel lookup 
            $(function () {
                $("#lookuptujuan").dataTable();
            });
        </script>
		<script type="text/javascript">

//            jika dipilih, idpenduduk / nama penduduk akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilihasal', function (e) {
                document.getElementById("id_asal").value = $(this).attr('data-idasal');
                document.getElementById("kode_asal").value = $(this).attr('data-kodeasal');
                document.getElementById("asal").value = $(this).attr('data-asal');
                $('#myModalasal').modal('hide');
            });

//            tabel lookup 
            $(function () {
                $("#lookupasal").dataTable();
            });
        </script>
		<script type="text/javascript">

//            jika dipilih, idpenduduk / nama penduduk akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilihasalx', function (e) {
                document.getElementById("id_asalx").value = $(this).attr('data-idasalx');
                document.getElementById("kode_asalx").value = $(this).attr('data-kodeasalx');
                document.getElementById("asalx").value = $(this).attr('data-asalx');
                $('#myModalasalx').modal('hide');
            });

//            tabel lookup 
            $(function () {
                $("#lookupasalx").dataTable();
            });
        </script>
		<script type="text/javascript">

//            jika dipilih, idpenduduk / nama penduduk akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilihhpp', function (e) {
                document.getElementById("id_hpp").value = $(this).attr('data-idhpp');
                document.getElementById("kode_asalx").value = $(this).attr('data-kodeasalx');
                document.getElementById("asalx").value = $(this).attr('data-asalx');
                document.getElementById("kode_tujuan").value = $(this).attr('data-kodetujuan');
                document.getElementById("tujuan").value = $(this).attr('data-tujuan');
                document.getElementById("base_on").value = $(this).attr('data-baseon');
                document.getElementById("harga_satuan").value = $(this).attr('data-hargasatuan');
                $('#myModalhpp').modal('hide');
            });

//            tabel lookup 
            $(function () {
                $("#lookuphpp").dataTable();
            });
        </script>
		<script type="text/javascript">

//            jika dipilih, idpenduduk / nama penduduk akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilihvendor', function (e) {
                document.getElementById("id_vendor").value = $(this).attr('data-idvendor');
                document.getElementById("kode_vendor").value = $(this).attr('data-kodevendor');
                document.getElementById("nama_vendor").value = $(this).attr('data-namavendor');
                $('#myModalvendor').modal('hide');
            });

//            tabel lookup 
            $(function () {
                $("#lookupvendor").dataTable();
            });
        </script>
		<script type="text/javascript">

//            jika dipilih, idpenduduk / nama penduduk akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilihcostumer', function (e) {
                document.getElementById("id_costumer").value = $(this).attr('data-idcostumer');
                document.getElementById("kode_costumer").value = $(this).attr('data-kodecostumer');
                document.getElementById("nama_costumer").value = $(this).attr('data-namacostumer');
                $('#myModalcostumer').modal('hide');
            });

//            tabel lookup 
            $(function () {
                $("#lookupcostumer").dataTable();
            });
        </script>
		<!--<script type="text/javascript">

//            jika dipilih, idpenduduk / nama penduduk akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilihtujuan', function (e) {
                document.getElementById("id_tujuan").value = $(this).attr('data-idtujuan');
                document.getElementById("kode_tujuanx").value = $(this).attr('data-kodetujuanx');
                document.getElementById("nama_tujuan").value = $(this).attr('data-namatujuan');
                $('#myModaltujuan').modal('hide');
            });

//            tabel lookup 
            $(function () {
                $("#lookuptujuan").dataTable();
            });
        </script> -->
		
	<script type="text/javascript">
    $(document).ready(function() {
        //$('#optgroup').multiSelect();
		$('#optgroup').multiSelect({ selectableOptgroup: true });
    });
</script>
</body>

</html>