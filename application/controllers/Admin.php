<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
	function __construct(){
	parent::__construct();
		if($this->session->userdata('id_user') == ""){
			redirect(base_url('app/index'));
		}
		$this->load->model('master'); 
		//date_default_timezone_set("Asia/Jakarta");// meload master model
		//$this->load->library('googlemaps');
		$this->load->helper('tglid'); //tanggalindonesia
		//$desa = $this->master->profil_desa();
		//foreach($desa as $v){
			
			// $this->alamat_desa = $v->alamat_desa;
			//var_dump($db);
		//}	
		$this->load->library('ciqrcode'); 
	}
	public function index()
	{
		$data['judul'] = 'JTE TRACER || HOME';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		// $hariini = date('20y-m-d');
		// $plussatu = mktime(0,0,0,date("n"),date("j")+1,date("Y"));
		// $haribesok = date("d-m-Y", $plussatu);
		$besok = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d'))));
		$kemaren = date('Y-m-d', strtotime("-1 day", strtotime(date('Y-m-d'))));
		$hariini = date('Y-m-d');
		$data['total_data_rimender_besok'] = $this->master->total_data_rimender_besok($besok);
		$data['total_data_vendor'] = $this->master->total_data_vendor();
		$data['total_data_rimender_kemaren'] = $this->master->total_data_rimender_kemaren($kemaren);
		$data['total_data_rimender_hariini'] = $this->master->total_data_rimender_hariini($hariini);
		$id_user = $this->session->userdata('id_user');
		// $data['data_pengiriman_user_keberangkatan'] = $this->master->data_pengiriman_user_keberangkatan($id_user);
		// $data['data_pengiriman_user_transit'] = $this->master->data_pengiriman_user_transit($id_user);
		// $data['data_pengiriman_user_kedatangan'] = $this->master->data_pengiriman_user_kedatangan($id_user);
		$data['total_data_user'] = $this->master->total_data_user();
		$data['jumlah_des_proses'] = $this->master->jumlah_des_proses();
		$data['jumlah_des_sukses'] = $this->master->jumlah_des_sukses();
		$data['jumlah_des_kendala_supir'] = $this->master->jumlah_des_kendala_supir();
		$data['jumlah_des_barang_rusak'] = $this->master->jumlah_des_barang_rusak();
		$data['jumlah_des_terlambat'] = $this->master->jumlah_des_terlambat();
		$data['jumlah_des_barang_hilang'] = $this->master->jumlah_des_barang_hilang();
		$data['jumlah_des_lain'] = $this->master->jumlah_des_lain();
		$data['jumlah_moda_darat'] = $this->master->jumlah_moda_darat();
		$data['jumlah_moda_laut'] = $this->master->jumlah_moda_laut();
		$data['jumlah_moda_udara'] = $this->master->jumlah_moda_udara();
		$data['data_pengiriman_user_finish'] = $this->master->data_pengiriman_user_finish();
		$this->load->view('admin/index', $data);
		$this->load->view('admin/footer');
	}
	public function data_pengiriman()
	{
		$data['judul'] = 'JTE TRACER || DATA PENGIRIMAN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['tampil_data_pengiriman'] = $this->master->tampil_data_pengiriman();
		$this->load->view('admin/data_pengiriman', $data);
		$this->load->view('admin/footer');
	}
	public function log_pengiriman()
	{
		$data['judul'] = 'JTE TRACER || LOG PENGIRIMAN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		//$id_user = $this->session->userdata('id_user');
		$data['tampil_data_pengiriman'] = $this->master->tampil_data_pengiriman();
		//$data['tampil_data_pengiriman_user'] = $this->master->tampil_data_pengiriman_user($id_user);
		$this->load->view('admin/log_pengiriman', $data);
		$this->load->view('admin/footer');
	}
	public function data_invoice()
	{
		$data['judul'] = 'JTE TRACER || DATA INVOICE';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		//$id_user = $this->session->userdata('id_user');
		$data['tampil_data_pengiriman'] = $this->master->tampil_data_pengiriman_invoice();
		$data['tampil_data_invoice'] = $this->master->tampil_data_invoice();
		$data['master_costumer'] = $this->master->master_costumer();
		//$data['tampil_data_pengiriman_user'] = $this->master->tampil_data_pengiriman_user($id_user);
		$this->load->view('admin/data_invoice', $data);
		$this->load->view('admin/footer');
	}
	public function data_detail_invoice($kode_invoice)
	{
		$data['judul'] = 'JTE TRACER || DATA DETAIL INVOICE';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		//$id_user = $this->session->userdata('id_user');
		$data['kode_invoice'] = $kode_invoice;
		$data['data_detail_invoice'] = $this->master->data_detail_invoice($kode_invoice);
		//$data['tampil_data_pengiriman_user'] = $this->master->tampil_data_pengiriman_user($id_user);
		$this->load->view('admin/data_detail_invoice', $data);
		$this->load->view('admin/footer');
	}
	public function data_manifest()
	{
		$data['judul'] = 'JTE TRACER || DATA MANIFEST';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		//$id_user = $this->session->userdata('id_user');
		$data['tampil_data_pengiriman'] = $this->master->tampil_data_pengiriman_manifest();
		$data['tampil_data_manifest'] = $this->master->tampil_data_manifest();
		$data['master_asal'] = $this->master->master_asal();
		$data['master_tujuan'] = $this->master->master_tujuan();
		//$data['tampil_data_pengiriman_user'] = $this->master->tampil_data_pengiriman_user($id_user);
		$this->load->view('admin/data_manifest', $data);
		$this->load->view('admin/footer');
	}
	public function form_laporan_manifest()
	{
		$data['judul'] = 'JTE TRACER || DATA MANIFEST';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['data_manifest'] = $this->master->data_manifest();
		$this->load->view('admin/form_laporan_manifest', $data);
		$this->load->view('admin/footer');
	}
	public function cetak_laporan_manifest($kode_manifest)
	{
		$data['nama_pic'] = $this->session->userdata('nama_user');
		$data['approved'] = $this->input->post('approved');
		$data['cetak_laporan_manifest_header'] = $this->master->cetak_laporan_manifest_header($kode_manifest);
		$data['cetak_laporan_manifest'] = $this->master->cetak_laporan_manifest($kode_manifest);
		$this->load->view('admin/cetak_laporan_manifest', $data);
	}
	public function buat_manifest()
	{
		$id_pengiriman = $this->input->post('id_pengiriman');
		$nopol = strtoupper($this->input->post('nopol'));
		$pengemudi = strtoupper($this->input->post('pengemudi'));
		$asal = $this->input->post('asal');
		$tujuan = $this->input->post('tujuan');
		$status_manifest = '1';
		$created_by = $this->session->userdata('nama_user');
		$created_on = date('20y-m-d H:i:s');
		if($id_pengiriman == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA PENGIRIMAN / RESI TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_manifest/')."';	
			  } ,2100); 
			 </script>";
		}else{
		function kode_acak($n = 10){
			$aKod = NULL;
			$kode = "0123456789"; //jumlah kode = 63
  
			for ($i=0; $i<$n; $i++) {
     		$acakAngka = rand(1, strlen($kode));
     		$aKod .= substr($kode, $acakAngka, 1);
  			}
  			return $aKod;
		}
		$kode = kode_acak($n = 3);
		$bln = date('m');
		$thn = date('20y');
		$kode_manifest = "JTE-".$kode."-".$bln."-".$thn."";
		$id = sizeof($id_pengiriman);
		$arraymax = array( $id);
		$jumlah = max($arraymax);
		
		for( $i=0; $i < $jumlah; $i++){
		$data[$i] = array('id_pengiriman' => $id_pengiriman[$i],
						'nopol' => $nopol,
						'pengemudi' => $pengemudi,
						'asal' => $asal,
						'tujuan' => $tujuan,
						'kode_manifest' => $kode_manifest,
						'status_manifest' => $status_manifest,
						'created_by' => $created_by,
						'created_on' => $created_on);
		$data1[$i] = array('status_manifest' => '1');
		$jalan = $this->master->buat_manifest($data[$i]);
		$jalan1 = $this->master->ubah_status_manifest($data1[$i], $id_pengiriman[$i]);
		}
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MANIFEST BERHASIL DI BUAT',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_manifest/')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MANIFEST GAGAL DI BUAT',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_manifest/')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	
	public function data_delevery()
	{
		$data['judul'] = 'JTE TRACER || DATA DELEVERY';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		//$id_user = $this->session->userdata('id_user');
		$data['tampil_data_pengiriman'] = $this->master->tampil_data_pengiriman_delevery();
		$data['tampil_data_delevery'] = $this->master->tampil_data_delevery();
		//$data['tampil_data_pengiriman_user'] = $this->master->tampil_data_pengiriman_user($id_user);
		$this->load->view('admin/data_delevery', $data);
		$this->load->view('admin/footer');
	}
	public function cetak_laporan_delevery($kode_delevery)
	{
		$data['nama_pic'] = $this->session->userdata('nama_user');
		$data['approved'] = $this->input->post('approved');
		$data['cetak_laporan_delevery_header'] = $this->master->cetak_laporan_delevery_header($kode_delevery);
		$data['cetak_laporan_delevery'] = $this->master->cetak_laporan_delevery($kode_delevery);
		$this->load->view('admin/cetak_laporan_delevery', $data);
	}
	public function buat_delevery()
	{
		$id_pengiriman = $this->input->post('id_pengiriman');
		$nopol = strtoupper($this->input->post('nopol'));
		$pengemudi = strtoupper($this->input->post('pengemudi'));
		$status_delevery = '1';
		$created_by = $this->session->userdata('nama_user');
		$created_on = date('20y-m-d H:i:s');
		if($id_pengiriman == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA PENGIRIMAN / RESI TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_delevery/')."';	
			  } ,2100); 
			 </script>";
		}else{
		function kode_acak($n = 10){
			$aKod = NULL;
			$kode = "0123456789"; //jumlah kode = 63
  
			for ($i=0; $i<$n; $i++) {
     		$acakAngka = rand(1, strlen($kode));
     		$aKod .= substr($kode, $acakAngka, 1);
  			}
  			return $aKod;
		}
		$kode = kode_acak($n = 3);
		$bln = date('m');
		$thn = date('20y');
		$kode_delevery = "JTE-DEV-".$kode."-".$bln."-".$thn."";
		$id = sizeof($id_pengiriman);
		$arraymax = array( $id);
		$jumlah = max($arraymax);
		
		for( $i=0; $i < $jumlah; $i++){
		$data[$i] = array('id_pengiriman' => $id_pengiriman[$i],
						'nopol' => $nopol,
						'pengemudi' => $pengemudi,
						'kode_delevery' => $kode_delevery,
						'status_delevery' => $status_delevery,
						'created_by' => $created_by,
						'created_on' => $created_on);
		$jalan = $this->master->buat_delevery($data[$i]);
		}
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DELEVERY BERHASIL DI BUAT',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_delevery/')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DELEVERY GAGAL DI BUAT',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_delevery/')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function buat_invoice()
	{
		$id_pengiriman = $this->input->post('id_pengiriman');
		$costumer_id = $this->input->post('costumer_id');
		$costumer_code = $this->input->post('costumer_code');
		$costumer_name = $this->input->post('costumer_name');
		$tanggal_invoice = date('20y-m-d');
		$created_by = $this->session->userdata('nama_user');
		$created_on = date('20y-m-d H:i:s');
		
		function kode_acak($n = 10){
			$aKod = NULL;
			$kode = "0123456789"; //jumlah kode = 63
  
			for ($i=0; $i<$n; $i++) {
     		$acakAngka = rand(1, strlen($kode));
     		$aKod .= substr($kode, $acakAngka, 1);
  			}
  			return $aKod;
		}
		$kode = kode_acak($n = 3);
		$bln = date('m');
		$thn = date('20y');
		$kode_invoice = "JTE-".$kode."-".$bln."-".$thn."";
		$id = sizeof($id_pengiriman);
		$arraymax = array( $id);
		$jumlah = max($arraymax);
		
		for( $i=0; $i < $jumlah; $i++){
		$data[$i] = array('id_pengiriman' => $id_pengiriman[$i],
						'costumer_id' => $costumer_id,
						'costumer_code' => $costumer_code,
						'costumer_name' => $costumer_name,
						'tanggal_invoice' => $tanggal_invoice,
						'kode_invoice' => $kode_invoice,
						'invoice_status' => '0',
						'created_by' => $created_by,
						'created_on' => $created_on);
		$data1[$i] = array('status_invoice' => '1');
		$jalan = $this->master->buat_invoice($data[$i]);
		$jalan1 = $this->master->ubah_status_invoice($data1[$i], $id_pengiriman[$i]);
		}
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'INVOICE BERHASIL DI TAMBAH',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_invoice/')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'INVOICE GAGAL DI TAMBAH',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_invoice/')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function tambah_detail_invoice($kode_invoice)
	{
		$dpp = $this->input->post('dpp');
		$ppn_qty = $this->input->post('ppn_qty');
		$subtotal = $this->input->post('subtotal');
		$created_by = $this->session->userdata('nama_user');
		$created_on = date('20y-m-d H:i:s');
		
		$ppn = ($ppn_qty * $dpp) / 100;
		
		$data = array('kode_invoice' => $kode_invoice,
						'dpp' => $dpp,
						'ppn' => $ppn,
						'ppn_qty' => $ppn_qty,
						'subtotal' => $subtotal,
						'created_by' => $created_by,
						'created_on' => $created_on);
		$data1 = array('kode_invoice' => $kode_invoice,
						'dpp' => $dpp,
						'ppn' => $ppn,
						'ppn_qty' => $ppn_qty,
						'subtotal' => $subtotal,
						'invoice_status' => '1');
		$jalan = $this->master->tambah_detail_invoice($data);
		$jalan1 = $this->master->ubah_invoice_status($data1, $kode_invoice);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'INVOICE BERHASIL DI TAMBAH',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_invoice/')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'INVOICE GAGAL DI TAMBAH',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_invoice/')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function update_log_pengiriman($id_pengiriman)
	{
		$data['judul'] = 'JTE TRACER || UPDATE LOG PENGIRIMAN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['edit_data_pengiriman'] = $this->master->edit_data_pengiriman($id_pengiriman);
		$data['tampil_log_pengiriman'] = $this->master->tampil_log_pengiriman($id_pengiriman);
		$data['view_log_pengiriman'] = $this->master->view_log_pengiriman($id_pengiriman);
		$data['tampil_log_tujuan'] = $this->master->tampil_log_tujuan($id_pengiriman);
		$data['tampil_log_document'] = $this->master->tampil_log_document($id_pengiriman);
		$data['lihat_hpp'] = $this->master->lihat_hpp();
		$data['cek_log_pengiriman'] = $this->master->cek_log_pengiriman($id_pengiriman);
		$data['lihat_dokument'] = $this->master->lihat_dokument($id_pengiriman);
		$data['cekdokument'] = $this->master->cekdokument($id_pengiriman);
		$data['master_tujuan'] = $this->master->master_tujuan();
		$data['master_asal'] = $this->master->master_asal();
		$this->load->view('admin/update_log_pengiriman', $data);
		$this->load->view('admin/footer');
	}
	public function tambah_log_pengiriman()
	{
		$id_pengiriman = $this->input->post('id_pengiriman');
		$awb_no = $this->input->post('awb_no');
		$pickup_info = $this->input->post('pickup_info');
		$remarks_activity = $this->input->post('remarks_activity');
		$jenis_kegiatan = $this->input->post('jenis_kegiatan');
		$no_kendaraan = strtoupper($this->input->post('no_kendaraan'));
		$time_activity = date('20y-m-d H:i:s');
		$created_by = $this->session->userdata('nama_user');;
		$created_on = date('20y-m-d H:i:s');
		$data = array('id_pengiriman' => $id_pengiriman,
						'awb_no' => $awb_no,
						'pickup_info' => $pickup_info,
						'remarks_activity' => $remarks_activity,
						'jenis_kegiatan' => $jenis_kegiatan,
						'no_kendaraan' => $no_kendaraan,
						'time_activity' => $time_activity,
						'created_by' => $created_by,
						'created_on' => $created_on);
		$data1 = array('status_pengiriman' => $jenis_kegiatan);				
		$jalan1 = $this->master->ubah_status_pengiriman($data1, $id_pengiriman);
		$jalan = $this->master->tambah_log_pengiriman($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'LOG PENGIRIMAN BERHASIL DI TAMBAH',
				text: '".$awb_no."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'LOG PENGIRIMAN GAGAL DI TAMBAH',
				text: '".$awb_no."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function status_pengiriman_selesa()
	{
		$id_pengiriman = $this->input->post('id_pengiriman');
		$awb_no = $this->input->post('awb_no');
		$pickup_info = $this->input->post('pickup_info');
		$remarks_activity = $this->input->post('remarks_activity');
		$jenis_kegiatan = $this->input->post('jenis_kegiatan');
		$no_kendaraan = strtoupper($this->input->post('no_kendaraan'));
		$time_activity = date('20y-m-d H:i:s');
		$created_by = $this->session->userdata('nama_user');;
		$created_on = date('20y-m-d H:i:s');
		$data = array('id_pengiriman' => $id_pengiriman,
						'awb_no' => $awb_no,
						'pickup_info' => $pickup_info,
						'remarks_activity' => $remarks_activity,
						'jenis_kegiatan' => '5',
						'no_kendaraan' => $no_kendaraan,
						'time_activity' => $time_activity,
						'created_by' => $created_by,
						'created_on' => $created_on);
		$data1 = array('status_pengiriman' => '5');				
		$jalan1 = $this->master->ubah_status_pengiriman($data1, $id_pengiriman);
		$jalan = $this->master->tambah_log_pengiriman($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'LOG PENGIRIMAN SELESAI',
				text: '".$awb_no."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'GAGAL DI SIMPAN',
				text: '".$awb_no."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function edit_log_tujuan($id_log_tujuan, $id_pengiriman)
	{
		$data['judul'] = 'JTE TRACER || LAPORAN DATA PENGIRIMAN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['id_pengiriman'] = $id_pengiriman;
		$data['master_asal'] = $this->master->master_asal();
		$data['edit_log_tujuan'] = $this->master->edit_log_tujuan($id_log_tujuan);
		$this->load->view('admin/edit_log_tujuan', $data);
		$this->load->view('admin/footer');
	}
	public function simpan_log_tujuan($id_log_tujuan, $id_pengiriman)
	{
		$kode_asal = $this->input->post('kode_asal');
		$nama_asal = $this->input->post('nama_asal');
		$status_log_asal = $this->input->post('status_log_asal');
		$modified_by = $this->session->userdata('nama_user');
		$modified_on = date('20y-m-d H:i:s');
		$data = array('kode_asal' => $kode_asal,
						'nama_asal' => $nama_asal,
						'status_log_asal' => $status_log_asal,
						'modified_by' => $modified_by,
						'modified_on' => $modified_on);
		$datax = array(//'kode_tujuan' => $kode_tujuan,
						//'tujuan' => $nama_tujuan,
						'recaived_by' => $recaived_by,
						'status_pengiriman' => $status_log_asal);
		$jalanx = $this->master->update_log_tujuan($datax, $id_pengiriman);			
		$jalan = $this->master->simpan_log_tujuan($data, $id_log_tujuan);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'LOG TUJAUN BERHASIL DI UBAH',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'LOG TUJAUN GAGAL DI UBAH',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function laporan_data_invoice()
	{
		$data['judul'] = 'JTE TRACER || LAPORAN DATA PENGIRIMAN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['tampil_data_pengiriman'] = $this->master->tampil_data_pengiriman();
		$data['view_invoice'] = $this->master->view_invoice();
		$this->load->view('admin/laporan_data_invoice', $data);
		$this->load->view('admin/footer');
	}
	public function cetak_laporan_invoice($kode_invoice)
	{
		$dari_tanggal = $this->input->post('dari_tanggal');
		$sampai_tanggal = $this->input->post('sampai_tanggal');
		//$kode_invoice = $this->input->post('kode_invoice');
		$data['nama_pic'] = $this->input->post('nama_pic');
		$data['nama_perusahaan'] = $this->input->post('nama_perusahaan');
		$data['alamat_perusahaan'] = $this->input->post('alamat_perusahaan');
		$data['jenis_kegiatan'] = $this->input->post('jenis_kegiatan');
		$data['approved'] = $this->input->post('approved');
		$data['d'] = '';
		$data['h'] = '';
		$data['vvv'] = '';
		$data['cetak_laporan_invoice'] = $this->master->cetak_laporan_invoice($kode_invoice);
		$data['tampil_invoice'] = $this->master->tampil_invoice($kode_invoice);
		$this->load->view('admin/cetak_laporan_invoice', $data);
	}
	public function edit_data_pengiriman($id_pengiriman)
	{
		$data['judul'] = 'JTE TRACER || EDIT DATA PENGIRIMAN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['lihat_master_shipper'] = $this->master->lihat_master_shipper();
		$data['lihat_master_consignee'] = $this->master->lihat_master_consignee();
		$data['lihat_master_user'] = $this->master->lihat_master_user();
		$data['lihat_master_vendor'] = $this->master->lihat_master_vendor();
		$data['lihat_hpp'] = $this->master->lihat_hpp();
		$data['master_costumer'] = $this->master->master_costumer();
		$data['master_tujuan'] = $this->master->master_tujuan();
		$data['edit_data_pengiriman'] = $this->master->edit_data_pengiriman($id_pengiriman);
		$this->load->view('admin/edit_data_pengiriman', $data);
		$this->load->view('admin/footer');
	}
	public function ubah_update_log_pengiriman($id_log_pengiriman)
	{
		$data['judul'] = 'JTE TRACER || EDIT DATA PENGIRIMAN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['ubah_update_log_pengiriman'] = $this->master->ubah_update_log_pengiriman($id_log_pengiriman);
		$this->load->view('admin/ubah_update_log_pengiriman', $data);
		$this->load->view('admin/footer');
	}
	public function simpan_update_log_pengiriman($id_log_pengiriman)
	{
		$id_pengiriman = $this->input->post('id_pengiriman');
		$remarks_activity = $this->input->post('remarks_activity');
		$no_kendaraan = $this->input->post('no_kendaraan');
		$modified_by = $this->session->userdata('nama_user');
		$modified_on = date('20y-m-d H:i:s');
		$data = array('remarks_activity' => $remarks_activity,
						'no_kendaraan' => $no_kendaraan,
						'modified_by' => $modified_by,
						'modified_on' => $modified_on);
		$jalan = $this->master->simpan_update_log_pengiriman($data, $id_log_pengiriman);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'LOG PENGIRIMAN BERHASIL DI UBAH',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'LOG PENGIRIMAN GAGAL DI UBAH',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function master_user()
	{
		$data['judul'] = 'JTE TRACER || MASTER USER';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['tampil_user'] = $this->master->tampil_user();
		$this->load->view('admin/master_user',$data);
		$this->load->view('admin/footer');
	}
	public function edit_master_user($id_user)
	{
		$data['judul'] = 'JTE TRACER || MASTER USER';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['edit_master_user'] = $this->master->edit_master_user($id_user);
		$this->load->view('admin/edit_master_user',$data);
		$this->load->view('admin/footer');
	}
	public function tambah_user()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama_user = strtoupper($this->input->post('nama_user'));
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$foto_user = $this->input->post('foto_user');
		$status = '1';
		$sebagai = $this->input->post('sebagai');
		$created_by = $this->session->userdata('nama_user');
		$created_on = date('20y-m-d H:i:s');
		$cekusername = $this->master->cekusername($username);
		if($cekusername > 0){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'USERNAME SUDAH ADA ',
				text: '".$username."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_user')."';	
			  } ,2100); 
			 </script>";
		}else{
			
		$this->load->library('upload');
		$buktiselesai = "";
		error_reporting(0);
		$nmfile = "User".$username.$nama_user.time();
		$configfoto['upload_path'] = 'assets/images';
		$configfoto['allowed_types'] = 'jpg|jpeg|gif|png';
		$configfoto['max_size'] = '800000000000';
		$config['max_width']            = '450';
		$config['max_height']           = '660';
		$configfoto['file_name'] = $nmfile;
		$this->upload->initialize($configfoto);
		if($_FILES['foto_user']['name']){
			
			if($this->upload->do_upload('foto_user')){
				$lpr = $this->upload->data();
				$buktiselesai = $lpr['file_name'];
			}
			else {
				$data['errors'] = array("errors" => $this->upload->display_errors());
			}
		}
		
		
		$data = array('username' => $username,
						'password' => $password,
						'nama_user' => $nama_user,
						'telepon' => $telepon,
						'email' => $email,
						'foto_user' => $buktiselesai,
						'status' => $status,
						'sebagai' => $sebagai,
						'created_by' => $created_by,
						'created_on' => $created_on);
		$jalan = $this->master->tambah_user($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data User Berhasil Di Tambah ',
				text: '".$nama_user."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_user')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data User Gagal Di Tambah',
				text: '".$nama_user."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_user')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function simpan_master_user($id_user)
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password_lama = $this->input->post('password_lama');
		$nama_user = strtoupper($this->input->post('nama_user'));
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$foto_user = $this->input->post('foto_user');
		$status = '1';
		$sebagai = $this->input->post('sebagai');
		$modified_by = $this->session->userdata('nama_user');
		$modified_on = date('20y-m-d H:i:s');
		if($password == ''){
			$pass = $password_lama;
		}else{
			$pass = $password;
		}
		$data = array('username' => $username,
						'password' => $pass,
						'nama_user' => $nama_user,
						'telepon' => $telepon,
						'email' => $email,
						'status' => $status,
						'sebagai' => $sebagai,
						'modified_by' => $modified_by,
						'modified_on' => $modified_on);
		$jalan = $this->master->simpan_master_user($data, $id_user);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data User Berhasil Di Ubah ',
				text: '".$nama_user."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_user')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data User Gagal Di Ubah',
				text: '".$nama_user."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_user')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function hapus_master_user($id_user)
	{
		$data = array('status' => '0');
		$jalan = $this->master->simpan_master_user($data, $id_user);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data User Berhasil Di Ubah ',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_user')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data User Gagal Di Hapus',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_user')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function input_data_pengiriman()
	{
		$data['judul'] = 'JTE TRACER || INPUT DATA';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['lihat_master_shipper'] = $this->master->lihat_master_shipper();
		$data['lihat_master_consignee'] = $this->master->lihat_master_consignee();
		$data['lihat_master_user'] = $this->master->lihat_master_user();
		$data['lihat_master_vendor'] = $this->master->lihat_master_vendor();
		$data['lihat_hpp'] = $this->master->lihat_hpp();
		$data['master_asal'] = $this->master->master_asal();
		$data['master_costumer'] = $this->master->master_costumer();
		$data['master_tujuan'] = $this->master->master_tujuan();
		$this->load->view('admin/input_data_pengiriman', $data);
		$this->load->view('admin/footer');
	}
	public function tambah_data_pengiriman()
	{
		$pickup_info = $this->input->post('pickup_info');
		$pickup_date = $this->input->post('pickup_date');
		$shipper_name = strtoupper($this->input->post('shipper_name'));
		$shipper_code = $this->input->post('shipper_code');
		$shipper_id = $this->input->post('shipper_id');
		$awb_no = $this->input->post('awb_no');
		$no_so = strtoupper($this->input->post('no_so'));
		$description = $this->input->post('description');
		$consignee = strtoupper($this->input->post('consignee'));
		$consignee_code = $this->input->post('consignee_code');
		$consignee_id = $this->input->post('consignee_id');
		$address = $this->input->post('address');
		$id_hpp = $this->input->post('id_hpp');
		$weight = $this->input->post('weight');
		$satuan_weight = $this->input->post('satuan_weight');
		$colly = $this->input->post('colly');
		$satuan_colly = $this->input->post('satuan_colly');
		$volume_panjang = $this->input->post('volume_panjang');
		$volume_lebar = $this->input->post('volume_lebar');
		$volume_tinggi = $this->input->post('volume_tinggi');
		$satuan_volume = $this->input->post('satuan_volume');
		//$harga = $this->input->post('harga');
		$moda = $this->input->post('moda');
		$jenis_tarif = $this->input->post('jenis_tarif');
		$jenis_layanan = $this->input->post('jenis_layanan');
		$pembayaran = $this->input->post('pembayaran');
		$tat = $this->input->post('tat');
		$eta = $this->input->post('eta');
		$id_tujuan = $this->input->post('id_tujuan');
		$kode_tujuan = $this->input->post('kode_tujuan');
		$id_asal = $this->input->post('id_asal');
		$kode_asal = $this->input->post('kode_asal');
		$master_asal = $this->input->post('master_asal');
		$tujuan = $this->input->post('nama_tujuan');
		$id_costumer = $this->input->post('id_costumer');
		$costumer_code = $this->input->post('costumer_code');
		$costumer_name = $this->input->post('costumer_name');
		$status_muat = $this->input->post('base_on');
		$tanggal = date('20y-m-d');
		$recaived_by = $this->input->post('recaived_by');
		$ata = $this->input->post('ata');
		$vendor_id = $this->input->post('id_vendor');
		$vendor_code = $this->input->post('vendor_code');
		$vendor_name = $this->input->post('vendor_name');
		$remarks = strtoupper($this->input->post('remarks'));
		$status_pengiriman = '1';
		$status_manifest = '0';
		$status = '1';
		$status_invoice = '0';
		$created_by = $this->session->userdata('nama_user');
		$created_on = date('20y-m-d H:i:s');
		$volume = $volume_panjang * $volume_lebar * $volume_tinggi;
		$costumer_id = $id_costumer;
		$cekasaltujuan = $this->master->cekasaltujuan($id_asal, $id_tujuan, $costumer_id, $jenis_layanan);
		// if($status_muat == 'BERAT'){
			// $total_harga = $weight * $harga;
		// }if($status_muat == 'QTY'){
			// $total_harga = $colly * $harga;
		// }if($status_muat == 'VOLUME'){
			// $total_harga = $volume * $harga;
		// }
		if($shipper_id == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA SHIPPER TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
		else if($consignee_id == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA CONSIGNEE TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}else if($id_asal == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA ASAL TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}else if($id_tujuan == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA TUJUAN TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}else if($vendor_id == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA VENDOR TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
		else if($id_costumer == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA COSTUMER TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
		else if($cekasaltujuan == 0){
			$cek_baseon = '';
			$total_harga = '';
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA ASAL TUJUAN TIDAK DI TEMUKAN',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
		// else if($cekasaltujuan != 0){
			// $cekasaltujuanharaga = $this->master->cekasaltujuanharaga($id_asal, $id_tujuan);
			// foreach($cekasaltujuanharaga as $cekharga){
				// $cek_baseon = $cekharga->base_on;
				// $harga_satuan = $cekharga->harga_satuan;
			// }
			// if($cek_baseon == 'BERAT'){
				// $total_harga = $weight * $harga_satuan;
			// }
			// else if($cek_baseon == 'QTY'){
				// $total_harga = $weight * $harga_satuan;
			// }
			// else if($cek_baseon == 'VOLUME'){
				// $total_harga = $weight * $harga_satuan;
			// }
		// }
		// else if($cek_baseon == 'BERAT'){
			// $total_harga = $weight * $harga_satuan;
		// }else if($cek_baseon == 'QTY'){
			// $total_harga = $colly * $harga_satuan;
		// }else if($cek_baseon == 'VOLUME'){
			// $total_harga = $volume * $harga_satuan;
		// }
		else {
			
			$cekasaltujuanharaga = $this->master->cekasaltujuanharaga($id_asal, $id_tujuan, $costumer_id, $jenis_layanan);
			$jenis_tarif = $jenis_tarif;
			if($jenis_tarif == 0){
				$total_harga = '0';
				$harga_baseon = '0';
				foreach($cekasaltujuanharaga as $cekharga){
				//$cek_baseon = $cekharga->base_on;
				//$harga_satuan = $cekharga->harga_satuan;
				$status_muat = $cekharga->base_on;
				//$harga_baseon = $cekharga->harga_satuan;
				}
			}else{
			foreach($cekasaltujuanharaga as $cekharga){
				$cek_baseon = $cekharga->base_on;
				$harga_satuan = $cekharga->harga_satuan;
				$status_muat = $cekharga->base_on;
				$harga_baseon = $cekharga->harga_satuan;
			if($cek_baseon == 'QTY'){
				$total_harga = $colly * $harga_satuan;
			}
			else if($cek_baseon == 'BERAT'){
				$total_harga = $weight * $harga_satuan;
			}
			else if($cek_baseon == 'VOLUME'){
				$total_harga = $volume * $harga_satuan;
			}
		}
			}
			
		$data = array('pickup_info' => $pickup_info,
						'pickup_date' => $pickup_date,
						'shipper_name' => $shipper_name,
						'shipper_code' => $shipper_code,
						'shipper_id' => $shipper_id,
						'awb_no' => $awb_no,
						'no_so' => $no_so,
						'description' => $description,
						'consignee' => $consignee,
						'consignee_code' => $consignee_code,
						'consignee_id' => $consignee_id,
						'address' => $address,
						'id_hpp' => $id_hpp,
						'weight' => $weight,
						'satuan_weight' => $satuan_weight,
						'colly' => $colly,
						'satuan_colly' => $satuan_colly,
						'volume_panjang' => $volume_panjang,
						'volume_lebar' => $volume_lebar,
						'volume_tinggi' => $volume_tinggi,
						'volume' => $volume,
						'satuan_volume' => $satuan_volume,
						'harga' => $total_harga,
						'harga_baseon' => $harga_baseon,
						'moda' => $moda,
						'jenis_tarif' => $jenis_tarif,
						'jenis_layanan' => $jenis_layanan,
						'pembayaran' => $pembayaran,
						'tat' => $tat,
						'eta' => $eta,
						'id_tujuan' => $id_tujuan,
						'kode_tujuan' => $kode_tujuan,
						'id_asal' => $id_asal,
						'kode_asal' => $kode_asal,
						'master_asal' => $master_asal,
						'tujuan' => $tujuan,
						'id_costumer' => $id_costumer,
						'costumer_code' => $costumer_code,
						'costumer_name' => $costumer_name,
						'tanggal' => $tanggal,
						'status_muat' => $status_muat,
						'recaived_by' => $recaived_by,
						'ata' => $ata,
						'remarks' => $remarks,
						'vendor_id' => $vendor_id,
						'vendor_code' => $vendor_code,
						'vendor_name' => $vendor_name,
						'status_pengiriman' => $status_pengiriman,
						'status_manifest' => $status_manifest,
						'status' => $status,
						'status_invoice' => $status_invoice,
						'created_by' => $created_by,
						'created_on' => $created_on);
						// var_dump($data);
		//}
		// var_dump($cekasaltujuan);	
		$jalan = $this->master->tambah_data_pengiriman($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Tambah Data Pengiriman ',
				text: '".$awb_no."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/view_data_pengiriman/$pickup_info")."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Gagal Tambah Data Pengiriman',
				text: '".$awb_no."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
	}
	}
	public function simpan_data_pengiriman($id_pengiriman)
	{
		$pickup_info = $this->input->post('pickup_info');
		$pickup_date = $this->input->post('pickup_date');
		$shipper_name = strtoupper($this->input->post('shipper_name'));
		$shipper_code = $this->input->post('shipper_code');
		$shipper_id = $this->input->post('shipper_id');
		$awb_no = $this->input->post('awb_no');
		$no_so = $this->input->post('no_so');
		$description = $this->input->post('description');
		$consignee = strtoupper($this->input->post('consignee'));
		$consignee_code = $this->input->post('consignee_code');
		$consignee_id = $this->input->post('consignee_id');
		$address = $this->input->post('address');
		$id_hpp = $this->input->post('id_hpp');
		$weight = $this->input->post('weight');
		$satuan_weight = $this->input->post('satuan_weight');
		$colly = $this->input->post('colly');
		$satuan_colly = $this->input->post('satuan_colly');
		$volume_panjang = $this->input->post('volume_panjang');
		$volume_lebar = $this->input->post('volume_lebar');
		$volume_tinggi = $this->input->post('volume_tinggi');
		$satuan_volume = $this->input->post('satuan_volume');
		$moda = $this->input->post('moda');
		$jenis_tarif = $this->input->post('jenis_tarif');
		$jenis_layanan = $this->input->post('jenis_layanan');
		$pembayaran = $this->input->post('pembayaran');
		$harga = $this->input->post('harga');
		$status_muat = $this->input->post('base_on');
		$tat = $this->input->post('tat');
		$eta = $this->input->post('eta');
		$recaived_by = $this->input->post('recaived_by');
		$ata = $this->input->post('ata');
		$vendor_id = $this->input->post('id_vendor');
		$vendor_code = $this->input->post('vendor_code');
		$vendor_name = $this->input->post('vendor_name');
		$id_costumer = $this->input->post('id_costumer');
		$costumer_code = $this->input->post('costumer_code');
		$costumer_name = $this->input->post('costumer_name');
		$id_tujuan = $this->input->post('id_tujuan');
		$kode_tujuan = $this->input->post('kode_tujuan');
		$tujuan = $this->input->post('nama_tujuan');
		$id_asal = $this->input->post('id_asal');
		$kode_asal = $this->input->post('kode_asal');
		$master_asal = $this->input->post('master_asal');
		$remarks = strtoupper($this->input->post('remarks'));
		$modified_by = $this->session->userdata('nama_user');
		$modified_on = date('20y-m-d H:i:s');
		$volume = $volume_panjang * $volume_lebar * $volume_tinggi;
		$costumer_id = $id_costumer;
		$cekasaltujuan = $this->master->cekasaltujuan($id_asal, $id_tujuan, $costumer_id, $jenis_layanan);
		// if($status_muat == 'BERAT'){
			// $total_harga = $weight * $harga;
		// }if($status_muat == 'QTY'){
			// $total_harga = $colly * $harga;
		// }if($status_muat == 'VOLUME'){
			// $total_harga = $volume * $harga;
		// }
		if($shipper_id == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA SHIPPER TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/edit_data_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}
		else if($consignee_id == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA CONSIGNEE TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/edit_data_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}else if($id_asal == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA ASAL TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/edit_data_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}else if($id_tujuan == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA TUJUAN TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/edit_data_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}else if($vendor_id == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA VENDOR TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/edit_data_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}
		else if($id_costumer == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA COSTUMER TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/edit_data_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}
		else if($cekasaltujuan == 0){
			$cek_baseon = '';
			$total_harga = '';
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA ASAL TUJUAN TIDAK DI TEMUKAN',
				type: 'error',
				timer: 11000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/edit_data_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}
		// else if($cekasaltujuan != 0){
			// $cekasaltujuanharaga = $this->master->cekasaltujuanharaga($id_asal, $id_tujuan);
			// foreach($cekasaltujuanharaga as $cekharga){
				// $cek_baseon = $cekharga->base_on;
				// $harga_satuan = $cekharga->harga_satuan;
			// }
			// if($cek_baseon == 'BERAT'){
				// $total_harga = $weight * $harga_satuan;
			// }
			// else if($cek_baseon == 'QTY'){
				// $total_harga = $weight * $harga_satuan;
			// }
			// else if($cek_baseon == 'VOLUME'){
				// $total_harga = $weight * $harga_satuan;
			// }
		// }
		// else if($cek_baseon == 'BERAT'){
			// $total_harga = $weight * $harga_satuan;
		// }else if($cek_baseon == 'QTY'){
			// $total_harga = $colly * $harga_satuan;
		// }else if($cek_baseon == 'VOLUME'){
			// $total_harga = $volume * $harga_satuan;
		// }
		else {
			
			$cekasaltujuanharaga = $this->master->cekasaltujuanharaga($id_asal, $id_tujuan, $costumer_id, $jenis_layanan);
			$jenis_tarif = $jenis_tarif;
			if($jenis_tarif == 0){
				$total_harga = '0';
				$harga_baseon = '0';
				foreach($cekasaltujuanharaga as $cekharga){
				//$cek_baseon = $cekharga->base_on;
				//$harga_satuan = $cekharga->harga_satuan;
				$status_muat = $cekharga->base_on;
				//$harga_baseon = $cekharga->harga_satuan;
				}
			}else{
			foreach($cekasaltujuanharaga as $cekharga){
				$cek_baseon = $cekharga->base_on;
				$harga_satuan = $cekharga->harga_satuan;
				$status_muat = $cekharga->base_on;
				$harga_baseon = $cekharga->harga_satuan;
			if($cek_baseon == 'QTY'){
				$total_harga = $colly * $harga_satuan;
			}
			else if($cek_baseon == 'BERAT'){
				$total_harga = $weight * $harga_satuan;
			}
			else if($cek_baseon == 'VOLUME'){
				$total_harga = $volume * $harga_satuan;
			}
		}
			}
		$data = array('pickup_info' => $pickup_info,
						'pickup_date' => $pickup_date,
						'shipper_name' => $shipper_name,
						'shipper_code' => $shipper_code,
						'shipper_id' => $shipper_id,
						'awb_no' => $awb_no,
						'no_so' => $no_so,
						'description' => $description,
						'consignee' => $consignee,
						'consignee_code' => $consignee_code,
						'consignee_id' => $consignee_id,
						'address' => $address,
						'id_hpp' => $id_hpp,
						'weight' => $weight,
						'satuan_weight' => $satuan_weight,
						'colly' => $colly,
						'satuan_colly' => $satuan_colly,
						'volume_panjang' => $volume_panjang,
						'volume_lebar' => $volume_lebar,
						'volume_tinggi' => $volume_tinggi,
						'volume' => $volume,
						'satuan_volume' => $satuan_volume,
						'moda' => $moda,
						'jenis_tarif' => $jenis_tarif,
						'jenis_layanan' => $jenis_layanan,
						'pembayaran' => $pembayaran,
						'harga' => $total_harga,
						'harga_baseon' => $harga_baseon,
						'status_muat' => $status_muat,
						'tat' => $tat,
						'eta' => $eta,
						'vendor_id' => $vendor_id,
						'vendor_code' => $vendor_code,
						'vendor_name' => $vendor_name,
						'id_costumer' => $id_costumer,
						'costumer_code' => $costumer_code,
						'costumer_name' => $costumer_name,
						'id_tujuan' => $id_tujuan,
						'kode_tujuan' => $kode_tujuan,
						'tujuan' => $tujuan,
						'id_asal' => $id_asal,
						'kode_asal' => $kode_asal,
						'master_asal' => $master_asal,
						'recaived_by' => $recaived_by,
						'ata' => $ata,
						'remarks' => $remarks,
						'modified_by' => $modified_by,
						'modified_on' => $modified_on);
						// var_dump($data);
		$jalan = $this->master->simpan_data_pengiriman($data, $id_pengiriman);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Ubah Data Pengiriman ',
				text: '".$pickup_info."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_pengiriman')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Gagal Ubah Data Pengiriman',
				text: '".$pickup_info."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	
	public function update_data_pengiriman($id_pengiriman)
	{
		$pickup_info = $this->input->post('pickup_info');
		$pickup_date = $this->input->post('pickup_date');
		$shipper_name = strtoupper($this->input->post('shipper_name'));
		$shipper_code = $this->input->post('shipper_code');
		$shipper_id = $this->input->post('shipper_id');
		$awb_no = $this->input->post('awb_no');
		$no_so = $this->input->post('no_so');
		$description = $this->input->post('description');
		$consignee = strtoupper($this->input->post('consignee'));
		$consignee_code = $this->input->post('consignee_code');
		$consignee_id = $this->input->post('consignee_id');
		$address = $this->input->post('address');
		$destination = $this->input->post('destination');
		$weight = $this->input->post('weight');
		$colly = $this->input->post('colly');
		$moda = $this->input->post('moda');
		$harga = $this->input->post('harga');
		$tat = $this->input->post('tat');
		$eta = $this->input->post('eta');
		$recaived_by = $this->input->post('recaived_by');
		$ata = $this->input->post('ata');
		$id_user = $this->input->post('id_user');
		$remarks = strtoupper($this->input->post('remarks'));
		$modified_by = $this->session->userdata('nama_user');
		$modified_on = date('20y-m-d H:i:s');
		$data = array(//'pickup_info' => $pickup_info,
						// 'pickup_date' => $pickup_date,
						// 'shipper_name' => $shipper_name,
						// 'shipper_code' => $shipper_code,
						// 'shipper_id' => $shipper_id,
						// 'awb_no' => $awb_no,
						// 'no_so' => $no_so,
						// 'description' => $description,
						// 'consignee' => $consignee,
						// 'consignee_code' => $consignee_code,
						// 'consignee_id' => $consignee_id,
						// 'address' => $address,
						// 'id_hpp' => $id_hpp,
						// 'weight' => $weight,
						// 'colly' => $colly,
						// 'harga' => $harga,
						// 'moda' => $moda,
						// 'tat' => $tat,
						// 'eta' => $eta,
						// 'tanggal' => $tanggal,
						// 'status_muat' => $status_muat,
						//'status_pengiriman' => '2',
						'recaived_by' => $recaived_by,
						//'description' => $description,
						//'ata' => $ata,
						'remarks' => $remarks);
						// var_dump($data);
		$jalan = $this->master->update_data_pengiriman($data, $id_pengiriman);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Update Data Pengiriman ',
				text: '".$awb_no."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Gagal Update Data Pengiriman',
				text: '".$awb_no."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function hapus_data_pengiriman($id_pengiriman, $awb_no)
	{
		$awb_no = $awb_no;
		$modified_by = $this->session->userdata('nama_user');
		$modified_on = date('20y-m-d H:i:s');
		$status = '0';
		$data = array('modified_by' => $modified_by,
						'modified_on' => $modified_on,
						'status' => $status);
		$jalan = $this->master->hapus_data_pengiriman($data, $id_pengiriman);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Hapus Data Pengiriman ',
				text: '".$awb_no."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_pengiriman')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Gagal Hapus Data Pengiriman',
				text: '".$awb_no."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function view_data_pengiriman($pickup_info)
	{
		$data['judul'] = 'JTE TRACER || VIEW DATA PENGIRIMAN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['lihat_master_shipper'] = $this->master->lihat_master_shipper();
		$data['lihat_master_consignee'] = $this->master->lihat_master_consignee();
		$data['lihat_master_user'] = $this->master->lihat_master_user();
		$data['lihat_master_vendor'] = $this->master->lihat_master_vendor();
		$data['lihat_hpp'] = $this->master->lihat_hpp();
		$data['master_asal'] = $this->master->master_asal();
		$data['master_costumer'] = $this->master->master_costumer();
		$data['master_tujuan'] = $this->master->master_tujuan();
		$data['view_data_pengiriman'] = $this->master->view_data_pengiriman($pickup_info);
		$this->load->view('admin/view_data_pengiriman', $data);
		$this->load->view('admin/footer');
	}
	
	public function simpan_view_data_pengiriman($id_pengiriman)
	{
		$pickup_info = $this->input->post('pickup_info');
		$pickup_date = $this->input->post('pickup_date');
		$shipper_name = strtoupper($this->input->post('shipper_name'));
		$shipper_code = $this->input->post('shipper_code');
		$shipper_id = $this->input->post('shipper_id');
		$awb_no = $this->input->post('awb_no');
		$no_so = $this->input->post('no_so');
		$description = $this->input->post('description');
		$consignee = strtoupper($this->input->post('consignee'));
		$consignee_code = $this->input->post('consignee_code');
		$consignee_id = $this->input->post('consignee_id');
		$address = $this->input->post('address');
		$id_hpp = $this->input->post('id_hpp');
		$weight = $this->input->post('weight');
		$satuan_weight = $this->input->post('satuan_weight');
		$colly = $this->input->post('colly');
		$satuan_colly = $this->input->post('satuan_colly');
		$volume_panjang = $this->input->post('volume_panjang');
		$volume_lebar = $this->input->post('volume_lebar');
		$volume_tinggi = $this->input->post('volume_tinggi');
		$satuan_volume = $this->input->post('satuan_volume');
		$moda = $this->input->post('moda');
		$jenis_tarif = $this->input->post('jenis_tarif');
		$jenis_layanan = $this->input->post('jenis_layanan');
		$pembayaran = $this->input->post('pembayaran');
		$harga = $this->input->post('harga');
		$status_muat = $this->input->post('base_on');
		$tat = $this->input->post('tat');
		$eta = $this->input->post('eta');
		$recaived_by = $this->input->post('recaived_by');
		$ata = $this->input->post('ata');
		$vendor_id = $this->input->post('id_vendor');
		$vendor_code = $this->input->post('vendor_code');
		$vendor_name = $this->input->post('vendor_name');
		$id_costumer = $this->input->post('id_costumer');
		$costumer_code = $this->input->post('costumer_code');
		$costumer_name = $this->input->post('costumer_name');
		$id_tujuan = $this->input->post('id_tujuan');
		$kode_tujuan = $this->input->post('kode_tujuan');
		$tujuan = $this->input->post('nama_tujuan');
		$id_asal = $this->input->post('id_asal');
		$kode_asal = $this->input->post('kode_asal');
		$master_asal = $this->input->post('master_asal');
		$remarks = strtoupper($this->input->post('remarks'));
		$modified_by = $this->session->userdata('nama_user');
		$modified_on = date('20y-m-d H:i:s');
		$volume = $volume_panjang * $volume_lebar * $volume_tinggi;
		$costumer_id = $id_costumer;
		$cekasaltujuan = $this->master->cekasaltujuan($id_asal, $id_tujuan, $costumer_id, $jenis_layanan);
		// if($status_muat == 'BERAT'){
			// $total_harga = $weight * $harga;
		// }if($status_muat == 'QTY'){
			// $total_harga = $colly * $harga;
		// }if($status_muat == 'VOLUME'){
			// $total_harga = $volume * $harga;
		// }
		if($shipper_id == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA SHIPPER TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
		else if($consignee_id == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA CONSIGNEE TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}else if($id_asal == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA ASAL TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}else if($id_tujuan == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA TUJUAN TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}else if($vendor_id == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA VENDOR TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
		else if($id_costumer == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA COSTUMER TIDAK BOLEH KOSONG',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
		else if($cekasaltujuan == 0){
			$cek_baseon = '';
			$total_harga = '';
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA ASAL TUJUAN TIDAK DI TEMUKAN',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
		// else if($cekasaltujuan != 0){
			// $cekasaltujuanharaga = $this->master->cekasaltujuanharaga($id_asal, $id_tujuan);
			// foreach($cekasaltujuanharaga as $cekharga){
				// $cek_baseon = $cekharga->base_on;
				// $harga_satuan = $cekharga->harga_satuan;
			// }
			// if($cek_baseon == 'BERAT'){
				// $total_harga = $weight * $harga_satuan;
			// }
			// else if($cek_baseon == 'QTY'){
				// $total_harga = $weight * $harga_satuan;
			// }
			// else if($cek_baseon == 'VOLUME'){
				// $total_harga = $weight * $harga_satuan;
			// }
		// }
		// else if($cek_baseon == 'BERAT'){
			// $total_harga = $weight * $harga_satuan;
		// }else if($cek_baseon == 'QTY'){
			// $total_harga = $colly * $harga_satuan;
		// }else if($cek_baseon == 'VOLUME'){
			// $total_harga = $volume * $harga_satuan;
		// }
		else {
			
			$cekasaltujuanharaga = $this->master->cekasaltujuanharaga($id_asal, $id_tujuan, $costumer_id, $jenis_layanan);
			$jenis_tarif = $jenis_tarif;
			if($jenis_tarif == 0){
				$total_harga = '0';
				$harga_baseon = '0';
				foreach($cekasaltujuanharaga as $cekharga){
				//$cek_baseon = $cekharga->base_on;
				//$harga_satuan = $cekharga->harga_satuan;
				$status_muat = $cekharga->base_on;
				//$harga_baseon = $cekharga->harga_satuan;
				}
			}else{
			foreach($cekasaltujuanharaga as $cekharga){
				$cek_baseon = $cekharga->base_on;
				$harga_satuan = $cekharga->harga_satuan;
				$status_muat = $cekharga->base_on;
				$harga_baseon = $cekharga->harga_satuan;
			if($cek_baseon == 'QTY'){
				$total_harga = $colly * $harga_satuan;
			}
			else if($cek_baseon == 'BERAT'){
				$total_harga = $weight * $harga_satuan;
			}
			else if($cek_baseon == 'VOLUME'){
				$total_harga = $volume * $harga_satuan;
			}
		}
			}
		$data = array('pickup_info' => $pickup_info,
						'pickup_date' => $pickup_date,
						'shipper_name' => $shipper_name,
						'shipper_code' => $shipper_code,
						'shipper_id' => $shipper_id,
						'awb_no' => $awb_no,
						'no_so' => $no_so,
						'description' => $description,
						'consignee' => $consignee,
						'consignee_code' => $consignee_code,
						'consignee_id' => $consignee_id,
						'address' => $address,
						'id_hpp' => $id_hpp,
						'weight' => $weight,
						'satuan_weight' => $satuan_weight,
						'colly' => $colly,
						'satuan_colly' => $satuan_colly,
						'volume_panjang' => $volume_panjang,
						'volume_lebar' => $volume_lebar,
						'volume_tinggi' => $volume_tinggi,
						'volume' => $volume,
						'satuan_volume' => $satuan_volume,
						'moda' => $moda,
						'jenis_tarif' => $jenis_tarif,
						'jenis_layanan' => $jenis_layanan,
						'pembayaran' => $pembayaran,
						'harga' => $total_harga,
						'harga_baseon' => $harga_baseon,
						'status_muat' => $status_muat,
						'tat' => $tat,
						'eta' => $eta,
						'vendor_id' => $vendor_id,
						'vendor_code' => $vendor_code,
						'vendor_name' => $vendor_name,
						'id_costumer' => $id_costumer,
						'costumer_code' => $costumer_code,
						'costumer_name' => $costumer_name,
						'id_tujuan' => $id_tujuan,
						'kode_tujuan' => $kode_tujuan,
						'tujuan' => $tujuan,
						'id_asal' => $id_asal,
						'kode_asal' => $kode_asal,
						'master_asal' => $master_asal,
						'recaived_by' => $recaived_by,
						'ata' => $ata,
						'remarks' => $remarks,
						'modified_by' => $modified_by,
						'modified_on' => $modified_on);
						// var_dump($data);
		$jalan = $this->master->simpan_data_pengiriman($data, $id_pengiriman);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Ubah Data Pengiriman ',
				text: '".$awb_no."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/view_data_pengiriman/$pickup_info")."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Gagal Ubah Data Pengiriman',
				text: '".$awb_no."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/view_data_pengiriman/$pickup_info")."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function master_vendor()
	{
		$data['judul'] = 'JTE TRACER || MASTER VENDOR';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['master_vendor'] = $this->master->master_vendor();
		$this->load->view('admin/master_vendor', $data);
		$this->load->view('admin/footer');
	}
	public function edit_master_vendor($vendor_id)
	{
		$data['judul'] = 'JTE TRACER || EDIT MASTER VENDOR';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['edit_master_vendor'] = $this->master->edit_master_vendor($vendor_id);
		$this->load->view('admin/edit_master_vendor', $data);
		$this->load->view('admin/footer');
	}
	public function tambah_master_vendor()
	{
		$vendor_code = strtoupper($this->input->post('vendor_code'));
		$vendor_name = strtoupper($this->input->post('vendor_name'));
		$address = strtoupper($this->input->post('address'));
		$city = strtoupper($this->input->post('city'));
		$postal_code = $this->input->post('postal_code');
		$state_code = $this->input->post('state_code');
		$province = strtoupper($this->input->post('province'));
		$country_code = $this->input->post('country_code');
		$country_name = $this->input->post('country_name');
		$attention = $this->input->post('attention');
		$email_id = $this->input->post('email_id');
		$telephone = $this->input->post('telephone');
		$fax = $this->input->post('fax');
		$npwp = $this->input->post('npwp');
		$created_by = strtoupper($this->session->userdata('nama_user'));
		$created_on = date('20y-m-d H:i:s');
		
		$data = array('vendor_code' => $vendor_code,
						'vendor_name' => $vendor_name,
						'address' => $address,
						'city' => $city,
						'postal_code' => $postal_code,
						'state_code' => $state_code,
						'province' => $province,
						'country_code' => $country_code,
						'country_name' => $country_name,
						'attention' => $attention,
						'email_id' => $email_id,
						'telephone' => $telephone,
						'fax' => $fax,
						'npwp' => $npwp,
						'created_by' => $created_by,
						'status' => '1',
						'created_on' => $created_on);
		$jalan = $this->master->tambah_master_vendor($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Vendor Berhasil Input',
				text: '".$vendor_code."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_vendor')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Vendor Gagal Input',
				text: '".$vendor_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_vendor')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function tambah_master_vendor_pengiriman()
	{
		$vendor_code = strtoupper($this->input->post('vendor_code'));
		$vendor_name = strtoupper($this->input->post('vendor_name'));
		$address = strtoupper($this->input->post('address'));
		$city = strtoupper($this->input->post('city'));
		$postal_code = $this->input->post('postal_code');
		$state_code = $this->input->post('state_code');
		$province = strtoupper($this->input->post('province'));
		$country_code = $this->input->post('country_code');
		$country_name = $this->input->post('country_name');
		$attention = $this->input->post('attention');
		$email_id = $this->input->post('email_id');
		$telephone = $this->input->post('telephone');
		$fax = $this->input->post('fax');
		$npwp = $this->input->post('npwp');
		$created_by = strtoupper($this->session->userdata('nama_user'));
		$created_on = date('20y-m-d H:i:s');
		
		$data = array('vendor_code' => $vendor_code,
						'vendor_name' => $vendor_name,
						'address' => $address,
						'city' => $city,
						'postal_code' => $postal_code,
						'state_code' => $state_code,
						'province' => $province,
						'country_code' => $country_code,
						'country_name' => $country_name,
						'attention' => $attention,
						'email_id' => $email_id,
						'telephone' => $telephone,
						'fax' => $fax,
						'npwp' => $npwp,
						'created_by' => $created_by,
						'status' => '1',
						'created_on' => $created_on);
		$jalan = $this->master->tambah_master_vendor($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Vendor Berhasil Input',
				text: '".$vendor_code."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Vendor Gagal Input',
				text: '".$vendor_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function simpan_master_vendor($vendor_id)
	{
		$vendor_code = strtoupper($this->input->post('vendor_code'));
		$vendor_name = strtoupper($this->input->post('vendor_name'));
		$address = strtoupper($this->input->post('address'));
		$city = strtoupper($this->input->post('city'));
		$postal_code = $this->input->post('postal_code');
		$state_code = $this->input->post('state_code');
		$province = strtoupper($this->input->post('province'));
		$country_code = $this->input->post('country_code');
		$country_name = $this->input->post('country_name');
		$attention = $this->input->post('attention');
		$email_id = $this->input->post('email_id');
		$telephone = $this->input->post('telephone');
		$fax = $this->input->post('fax');
		$npwp = $this->input->post('npwp');
		$modified_by = strtoupper($this->session->userdata('nama_user'));
		$modified_on = date('20y-m-d H:i:s');
		
		$data = array('vendor_code' => $vendor_code,
						'vendor_name' => $vendor_name,
						'address' => $address,
						'city' => $city,
						'postal_code' => $postal_code,
						'state_code' => $state_code,
						'province' => $province,
						'country_code' => $country_code,
						'country_name' => $country_name,
						'attention' => $attention,
						'email_id' => $email_id,
						'telephone' => $telephone,
						'fax' => $fax,
						'npwp' => $npwp,
						'modified_by' => $modified_by,
						'modified_on' => $modified_on);
		$jalan = $this->master->simpan_master_vendor($data, $vendor_id);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Vendor Berhasil Ubah',
				text: '".$vendor_code."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_vendor')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Vendor Gagal Ubah',
				text: '".$vendor_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_vendor')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function hapus_master_vendor($vendor_id)
	{
		$status = '0';
		$data = array('status' => $status);
		$jalan = $this->master->hapus_master_vendor($data, $vendor_id);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Vendor Berhasil Di Hapus ',
				text: 'Master Vendor',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_vendor')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Vendor Gagal Di Hapus',
				text: 'Master Vendor',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_vendor')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function master_agen()
	{
		$data['judul'] = 'JTE TRACER || MASTER AGEN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['master_agen'] = $this->master->master_agen();
		$this->load->view('admin/master_agen', $data);
		$this->load->view('admin/footer');
	}
	public function edit_master_agen($id_agen)
	{
		$data['judul'] = 'JTE TRACER || MASTER AGEN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['edit_master_agen'] = $this->master->edit_master_agen($id_agen);
		$this->load->view('admin/edit_master_agen', $data);
		$this->load->view('admin/footer');
	}
	public function tambah_master_agen()
	{
		$agen_name = strtoupper($this->input->post('agen_name'));
		$agen_code = strtoupper($this->input->post('agen_code'));
		$address = strtoupper($this->input->post('address'));
		$city = strtoupper($this->input->post('city'));
		$postal_code = $this->input->post('postal_code');
		$state_code = $this->input->post('state_code');
		$province = strtoupper($this->input->post('province'));
		$country_code = $this->input->post('country_code');
		$country_name = $this->input->post('country_name');
		$attention = $this->input->post('attention');
		$email_id = $this->input->post('email_id');
		$telephone = $this->input->post('telephone');
		$fax = $this->input->post('fax');
		$npwp = $this->input->post('npwp');
		$created_by = strtoupper($this->session->userdata('nama_user'));
		$created_on = date('20y-m-d H:i:s');
		$cekmasteragen = $this->master->cekmasteragen($agen_code);
		if($cekmasteragen > 0){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Agen Sudah Ada',
				text: '".$agen_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_agen')."';	
			  } ,2100); 
			 </script>";
		}
		else{
		$data = array('agen_code' => $agen_code,
						'agen_name' => $agen_name,
						'address' => $address,
						'city' => $city,
						'postal_code' => $postal_code,
						'state_code' => $state_code,
						'province' => $province,
						'country_code' => $country_code,
						'country_name' => $country_name,
						'attention' => $attention,
						'email_id' => $email_id,
						'telephone' => $telephone,
						'fax' => $fax,
						'npwp' => $npwp,
						'created_by' => $created_by,
						'status' => '1',
						'created_on' => $created_on);
		$jalan = $this->master->tambah_master_agen($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Agen Berhasil Input',
				text: '".$agen_code."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_agen')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Agen Gagal Input',
				text: '".$agen_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_agen')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function simpan_master_agen($id_agen)
	{
		$agen_name = strtoupper($this->input->post('agen_name'));
		$agen_code = strtoupper($this->input->post('agen_code'));
		$address = strtoupper($this->input->post('address'));
		$city = strtoupper($this->input->post('city'));
		$postal_code = $this->input->post('postal_code');
		$state_code = $this->input->post('state_code');
		$province = strtoupper($this->input->post('province'));
		$country_code = $this->input->post('country_code');
		$country_name = $this->input->post('country_name');
		$attention = $this->input->post('attention');
		$email_id = $this->input->post('email_id');
		$telephone = $this->input->post('telephone');
		$fax = $this->input->post('fax');
		$npwp = $this->input->post('npwp');
		$modified_by = strtoupper($this->session->userdata('nama_user'));
		$modified_on = date('20y-m-d H:i:s');
		
		$data = array('agen_code' => $agen_code,
						'agen_name' => $agen_name,
						'address' => $address,
						'city' => $city,
						'postal_code' => $postal_code,
						'state_code' => $state_code,
						'province' => $province,
						'country_code' => $country_code,
						'country_name' => $country_name,
						'attention' => $attention,
						'email_id' => $email_id,
						'telephone' => $telephone,
						'fax' => $fax,
						'npwp' => $npwp,
						'modified_by' => $modified_by,
						'modified_on' => $modified_on);
		$jalan = $this->master->simpan_master_agen($data, $id_agen);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Agen Berhasil Ubah',
				text: '".$agen_code."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_agen')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Agen Gagal Ubah',
				text: '".$agen_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_agen')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function hapus_master_agen($id_agen, $agen_code)
	{
		$data = array('status' => '0');
		$jalan = $this->master->simpan_master_agen($data, $id_agen);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Agen Berhasil Di Hapus',
				text: '".$agen_code."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_agen')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Agen Gagal Di Hapus',
				text: '".$agen_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_agen')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function master_costumer()
	{
		$data['judul'] = 'JTE TRACER || MASTER COSTUMER';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['master_costumer'] = $this->master->master_costumer();
		$this->load->view('admin/master_costumer', $data);
		$this->load->view('admin/footer');
	}
	public function edit_master_costumer($costumer_id)
	{
		$data['judul'] = 'JTE TRACER || EDIT MASTER COSTUMER';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['edit_master_costumer'] = $this->master->edit_master_costumer($costumer_id);
		$this->load->view('admin/edit_master_costumer', $data);
		$this->load->view('admin/footer');
	}
	public function tambah_master_costumer()
	{
		$costumer_name = strtoupper($this->input->post('costumer_name'));
		$costumer_code = strtoupper($this->input->post('costumer_code'));
		$address = strtoupper($this->input->post('address'));
		$city = strtoupper($this->input->post('city'));
		$postal_code = $this->input->post('postal_code');
		$province = strtoupper($this->input->post('province'));
		$email_id = $this->input->post('email_id');
		$telephone = $this->input->post('telephone');
		$created_by = strtoupper($this->session->userdata('nama_user'));
		$created_on = date('20y-m-d H:i:s');
		$cekcostumer = $this->master->cekcostumer($costumer_code);
		if($cekcostumer > 0){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Costumer Sudah Ada',
				text: '".$costumer_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_costumer')."';	
			  } ,2100); 
			 </script>";
		}else{
		$data = array('costumer_name' => $costumer_name,
						'costumer_code' => $costumer_code,
						'address' => $address,
						'city' => $city,
						'postal_code' => $postal_code,
						'province' => $province,
						'email_id' => $email_id,
						'telephone' => $telephone,
						'created_by' => $created_by,
						'status' => '1',
						'created_on' => $created_on);
		$jalan = $this->master->tambah_master_costumer($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Costumer Berhasil Input',
				text: '".$costumer_name."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_costumer')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Costumer Gagal Input',
				text: '".$costumer_name."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_costumer')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function simpan_master_costumer($costumer_id)
	{
		$costumer_name = strtoupper($this->input->post('costumer_name'));
		$costumer_code = strtoupper($this->input->post('costumer_code'));
		$address = strtoupper($this->input->post('address'));
		$city = strtoupper($this->input->post('city'));
		$postal_code = $this->input->post('postal_code');
		$province = strtoupper($this->input->post('province'));
		$email_id = $this->input->post('email_id');
		$telephone = $this->input->post('telephone');
		$modified_by = strtoupper($this->session->userdata('nama_user'));
		$modified_on = date('20y-m-d H:i:s');
		$data = array('costumer_name' => $costumer_name,
						'costumer_code' => $costumer_code,
						'address' => $address,
						'city' => $city,
						'postal_code' => $postal_code,
						'province' => $province,
						'email_id' => $email_id,
						'telephone' => $telephone,
						'modified_by' => $modified_by,
						'status' => '1',
						'modified_on' => $modified_on);
		$jalan = $this->master->simpan_master_costumer($data, $costumer_id);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Costumer Berhasil Ubah',
				text: '".$costumer_name."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_costumer')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Costumer Gagal Ubah',
				text: '".$costumer_name."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_costumer')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function hapus_master_costumer($costumer_id, $costumer_name)
	{
		$status = '0';
		$data = array('status' => $status);
		$jalan = $this->master->simpan_master_costumer($data, $costumer_id);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Costumer Berhasil Di Hapus ',
				text: '".$costumer_name."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_costumer')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Costumer Gagal Di Hapus',
				text: '".$costumer_name."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_costumer')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function master_shipper()
	{
		$data['judul'] = 'JTE TRACER || MASTER SHIPPER';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['master_shipper'] = $this->master->master_shipper();
		$this->load->view('admin/master_shipper', $data);
		$this->load->view('admin/footer');
	}
	public function edit_master_shipper($shipper_id)
	{
		$data['judul'] = 'JTE TRACER || EDIT MASTER SHIPPER';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['edit_master_shipper'] = $this->master->edit_master_shipper($shipper_id);
		$this->load->view('admin/edit_master_shipper', $data);
		$this->load->view('admin/footer');
	}
	public function tambah_master_shipper()
	{
		$shipper_code = strtoupper($this->input->post('shipper_code'));
		$shipper_name = strtoupper($this->input->post('shipper_name'));
		$address = strtoupper($this->input->post('address'));
		$city = strtoupper($this->input->post('city'));
		$postal_code = $this->input->post('postal_code');
		$state_code = $this->input->post('state_code');
		$province = strtoupper($this->input->post('province'));
		$country_code = $this->input->post('country_code');
		$country_name = $this->input->post('country_name');
		$attention = $this->input->post('attention');
		$email_id = $this->input->post('email_id');
		$telephone = $this->input->post('telephone');
		$fax = $this->input->post('fax');
		$npwp = $this->input->post('npwp');
		$created_by = strtoupper($this->session->userdata('nama_user'));
		$created_on = date('20y-m-d H:i:s');
		$cekmastershipper = $this->master->cekmastershipper($shipper_code);
		if($cekmastershipper > 0){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Shipper Sudah Ada',
				text: '".$shipper_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_shipper')."';	
			  } ,2100); 
			 </script>";
		}else{
		$data = array('shipper_code' => $shipper_code,
						'shipper_name' => $shipper_name,
						'address' => $address,
						'city' => $city,
						'postal_code' => $postal_code,
						'state_code' => $state_code,
						'province' => $province,
						'country_code' => $country_code,
						'country_name' => $country_name,
						'attention' => $attention,
						'email_id' => $email_id,
						'telephone' => $telephone,
						'fax' => $fax,
						'npwp' => $npwp,
						'created_by' => $created_by,
						'status' => '1',
						'created_on' => $created_on);
		$jalan = $this->master->tambah_master_shipper($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Shipper Berhasil Input',
				text: '".$shipper_code."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_shipper')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Shipper Gagal Input',
				text: '".$shipper_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_shipper')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	
	public function tambah_master_shipper_pengiriman()
	{
		$shipper_code = strtoupper($this->input->post('shipper_code'));
		$shipper_name = strtoupper($this->input->post('shipper_name'));
		$address = strtoupper($this->input->post('address'));
		$city = strtoupper($this->input->post('city'));
		$postal_code = $this->input->post('postal_code');
		$state_code = $this->input->post('state_code');
		$province = strtoupper($this->input->post('province'));
		$country_code = $this->input->post('country_code');
		$country_name = $this->input->post('country_name');
		$attention = $this->input->post('attention');
		$email_id = $this->input->post('email_id');
		$telephone = $this->input->post('telephone');
		$fax = $this->input->post('fax');
		$npwp = $this->input->post('npwp');
		$created_by = strtoupper($this->session->userdata('nama_user'));
		$created_on = date('20y-m-d H:i:s');
		$cekmastershipper = $this->master->cekmastershipper($shipper_code);
		if($cekmastershipper > 0){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Shipper Sudah Ada',
				text: '".$shipper_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}else{
		$data = array('shipper_code' => $shipper_code,
						'shipper_name' => $shipper_name,
						'address' => $address,
						'city' => $city,
						'postal_code' => $postal_code,
						'state_code' => $state_code,
						'province' => $province,
						'country_code' => $country_code,
						'country_name' => $country_name,
						'attention' => $attention,
						'email_id' => $email_id,
						'telephone' => $telephone,
						'fax' => $fax,
						'npwp' => $npwp,
						'created_by' => $created_by,
						'status' => '1',
						'created_on' => $created_on);
		$jalan = $this->master->tambah_master_shipper($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Shipper Berhasil Input',
				text: '".$shipper_code."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Shipper Gagal Input',
				text: '".$shipper_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function simpan_master_shipper($shipper_id)
	{
		$shipper_code = strtoupper($this->input->post('shipper_code'));
		$shipper_name = strtoupper($this->input->post('shipper_name'));
		$address = strtoupper($this->input->post('address'));
		$city = strtoupper($this->input->post('city'));
		$postal_code = $this->input->post('postal_code');
		$state_code = $this->input->post('state_code');
		$province = strtoupper($this->input->post('province'));
		$country_code = $this->input->post('country_code');
		$country_name = $this->input->post('country_name');
		$attention = $this->input->post('attention');
		$email_id = $this->input->post('email_id');
		$telephone = $this->input->post('telephone');
		$fax = $this->input->post('fax');
		$npwp = $this->input->post('npwp');
		$modified_by = strtoupper($this->session->userdata('nama_user'));
		$modified_on = date('20y-m-d H:i:s');
		
		$data = array('shipper_code' => $shipper_code,
						'shipper_name' => $shipper_name,
						'address' => $address,
						'city' => $city,
						'postal_code' => $postal_code,
						'state_code' => $state_code,
						'province' => $province,
						'country_code' => $country_code,
						'country_name' => $country_name,
						'attention' => $attention,
						'email_id' => $email_id,
						'telephone' => $telephone,
						'fax' => $fax,
						'npwp' => $npwp,
						'modified_by' => $modified_by,
						'modified_on' => $modified_on);
		$jalan = $this->master->simpan_master_shipper($data, $shipper_id);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Shipper Berhasil Ubah',
				text: '".$shipper_code."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_shipper')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Shipper Gagal Ubah',
				text: '".$shipper_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_shipper')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function hapus_master_shipper($shipper_id)
	{
		$status = '0';
		$data = array('status' => $status);
		$jalan = $this->master->hapus_master_shipper($data, $shipper_id);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Shipper Berhasil Di Hapus ',
				text: 'Master Shipper',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_shipper')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Shipper Gagal Di Hapus',
				text: 'Master Shipper',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_shipper')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function master_consignee()
	{
		$data['judul'] = 'JTE TRACER || MASTER CONSIGNEE';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['master_consignee'] = $this->master->master_consignee();
		$this->load->view('admin/master_consignee', $data);
		$this->load->view('admin/footer');
	}
	public function edit_master_consignee($consignee_id)
	{
		$data['judul'] = 'JTE TRACER || MASTER CONSIGNEE';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['edit_master_consignee'] = $this->master->edit_master_consignee($consignee_id);
		$this->load->view('admin/edit_master_consignee', $data);
		$this->load->view('admin/footer');
	}
	public function tambah_master_consignee()
	{
		$consignee_code = strtoupper($this->input->post('consignee_code'));
		$consignee_name = strtoupper($this->input->post('consignee_name'));
		$address = strtoupper($this->input->post('address'));
		$city = strtoupper($this->input->post('city'));
		$postal_code = $this->input->post('postal_code');
		$state_code = $this->input->post('state_code');
		$province = strtoupper($this->input->post('province'));
		$country_code = strtoupper($this->input->post('country_code'));
		$country_name = strtoupper($this->input->post('country_name'));
		$attention = $this->input->post('attention');
		$email_id = $this->input->post('email_id');
		$telephone = $this->input->post('telephone');
		$fax = $this->input->post('fax');
		$npwp = $this->input->post('npwp');
		$created_by = strtoupper($this->session->userdata('nama_user'));
		$created_on = date('20y-m-d H:i:s');
		$cekmasterconsignee = $this->master->cekmasterconsignee($consignee_code);
		if($cekmasterconsignee > 0){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Consignee Sudah Ada',
				text: '".$consignee_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_consignee')."';	
			  } ,2100); 
			 </script>";
		}else{
		$data = array('consignee_code' => $consignee_code,
						'consignee_name' => $consignee_name,
						'address' => $address,
						'city' => $city,
						'postal_code' => $postal_code,
						'state_code' => $state_code,
						'province' => $province,
						'country_code' => $country_code,
						'country_name' => $country_name,
						'attention' => $attention,
						'email_id' => $email_id,
						'telephone' => $telephone,
						'fax' => $fax,
						'npwp' => $npwp,
						'created_by' => $created_by,
						'status' => '1',
						'created_on' => $created_on);
		$jalan = $this->master->tambah_master_consignee($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Consignee Berhasil Input',
				text: '".$consignee_code."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_consignee')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Consignee Gagal Input',
				text: '".$consignee_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_consignee')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function tambah_master_consignee_pengiriman()
	{
		$consignee_code = strtoupper($this->input->post('consignee_code'));
		$consignee_name = strtoupper($this->input->post('consignee_name'));
		$address = strtoupper($this->input->post('address'));
		$city = strtoupper($this->input->post('city'));
		$postal_code = $this->input->post('postal_code');
		$state_code = $this->input->post('state_code');
		$province = strtoupper($this->input->post('province'));
		$country_code = strtoupper($this->input->post('country_code'));
		$country_name = strtoupper($this->input->post('country_name'));
		$attention = $this->input->post('attention');
		$email_id = $this->input->post('email_id');
		$telephone = $this->input->post('telephone');
		$fax = $this->input->post('fax');
		$npwp = $this->input->post('npwp');
		$created_by = strtoupper($this->session->userdata('nama_user'));
		$created_on = date('20y-m-d H:i:s');
		$cekmasterconsignee = $this->master->cekmasterconsignee($consignee_code);
		if($cekmasterconsignee > 0){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Consignee Sudah Ada',
				text: '".$consignee_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}else{
		$data = array('consignee_code' => $consignee_code,
						'consignee_name' => $consignee_name,
						'address' => $address,
						'city' => $city,
						'postal_code' => $postal_code,
						'state_code' => $state_code,
						'province' => $province,
						'country_code' => $country_code,
						'country_name' => $country_name,
						'attention' => $attention,
						'email_id' => $email_id,
						'telephone' => $telephone,
						'fax' => $fax,
						'npwp' => $npwp,
						'created_by' => $created_by,
						'status' => '1',
						'created_on' => $created_on);
		$jalan = $this->master->tambah_master_consignee($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Consignee Berhasil Input',
				text: '".$consignee_code."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Consignee Gagal Input',
				text: '".$consignee_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function simpan_master_consignee($consignee_id)
	{
		$consignee_code = strtoupper($this->input->post('consignee_code'));
		$consignee_name = strtoupper($this->input->post('consignee_name'));
		$address = strtoupper($this->input->post('address'));
		$city = strtoupper($this->input->post('city'));
		$postal_code = $this->input->post('postal_code');
		$state_code = $this->input->post('state_code');
		$province = strtoupper($this->input->post('province'));
		$country_code = strtoupper($this->input->post('country_code'));
		$country_name = strtoupper($this->input->post('country_name'));
		$attention = $this->input->post('attention');
		$email_id = $this->input->post('email_id');
		$telephone = $this->input->post('telephone');
		$fax = $this->input->post('fax');
		$npwp = $this->input->post('npwp');
		$modified_by = strtoupper($this->session->userdata('nama_user'));
		$modified_on = date('20y-m-d H:i:s');
		
		$data = array('consignee_code' => $consignee_code,
						'consignee_name' => $consignee_name,
						'address' => $address,
						'city' => $city,
						'postal_code' => $postal_code,
						'state_code' => $state_code,
						'province' => $province,
						'country_code' => $country_code,
						'country_name' => $country_name,
						'attention' => $attention,
						'email_id' => $email_id,
						'telephone' => $telephone,
						'fax' => $fax,
						'npwp' => $npwp,
						'modified_by' => $modified_by,
						'modified_on' => $modified_on);
		$jalan = $this->master->simpan_master_consignee($data, $consignee_id);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Consignee Berhasil Ubah',
				text: '".$consignee_code."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_consignee')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Consignee Gagal Ubah',
				text: '".$consignee_code."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_consignee')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function hapus_master_consignee($consignee_id)
	{
		$status = '0';
		$data = array('status' => $status);
		$jalan = $this->master->hapus_master_consignee($data, $consignee_id);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Consignee Berhasil Di Hapus ',
				text: 'Master Consignee',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_consignee')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Master Consignee Gagal Di Hapus',
				text: 'Master Consignee',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_consignee')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function form_tracer()
	{
		$data['judul'] = 'JTE TRACER || FORM TRACER';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/form_tracer', $data);
	}
	public function data_tracer()
	{
		$data['judul'] = 'JTE TRACER || DATA TRACER';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$cari = $this->input->post('cari');
		$data['tampil_data_tracer'] = $this->master->tampil_data_tracer($cari);
		//$data['lihat_dokument'] = $this->master->lihat_dokument($id_pengiriman);
		$this->load->view('admin/data_tracer', $data);
	}
	public function tracer_pengiriman()
	{
		$data['judul'] = 'JTE TRACER || TRACER PENGIRIMAN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$cari = $this->input->post('cari');
		$data['cari'] = $this->input->post('cari');
		//$data['tampil_data_tracer'] = $this->master->tampil_data_tracer($cari);
		$data['tracer_pengiriman'] = $this->master->tracer_pengiriman($cari);
		$data['tracer_pengiriman_header'] = $this->master->tracer_pengiriman_header($cari);
		$this->load->view('admin/tracer_pengiriman', $data);
	}
	public function form_cek_tarif()
	{
		$data['judul'] = 'JTE TRACER || FORM CEK TARIF';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$data['tampil_tujuan'] = $this->master->tampil_tujuan();
		$data['master_asal'] = $this->master->master_asal();
		$this->load->view('admin/form_cek_tarif',$data);
	}
	public function cek_tarif_pengiriman()
	{
		$data['judul'] = 'JTE TRACER || FORM CEK TARIF';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$id_asal = $this->input->post('id_asal');
		$id_tujuan = $this->input->post('id_tujuan');
		$data['cek_tarif_pengiriman'] = $this->master->cek_tarif_pengiriman($id_asal, $id_tujuan);
		$this->load->view('admin/cek_tarif_pengiriman',$data);
	}
	public function master_tujuan()
	{
		$data['judul'] = 'JTE TRACER || MASTER TUJUAN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['tampil_tujuan'] = $this->master->tampil_tujuan();
		$this->load->view('admin/master_tujuan',$data);
		$this->load->view('admin/footer');
	}
	public function edit_master_tujuan($id_tujuan)
	{
		$data['judul'] = 'JTE TRACER || MASTER TUJUAN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['edit_master_tujuan'] = $this->master->edit_master_tujuan($id_tujuan);
		$this->load->view('admin/edit_master_tujuan',$data);
		$this->load->view('admin/footer');
	}
	public function tambah_tujuan()
	{
		$kode_tujuan = strtoupper($this->input->post('kode_tujuan'));
		$tujuan = strtoupper($this->input->post('tujuan'));
		$status = '1';
		$cekmastertujuan = $this->master->cekmastertujuan($kode_tujuan);
		if($cekmastertujuan > 0){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'KODE TUJUAN SUDAH ADA ',
				text: '".$kode_tujuan."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_tujuan')."';	
			  } ,2100); 
			 </script>";
		}else{
		$data = array('kode_tujuan' => $kode_tujuan,
						'tujuan' => $tujuan,
						'status' => $status);
		$jalan = $this->master->tambah_tujuan($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TUJUAN ".$kode_tujuan."',
				text: 'BERHASIL DI TAMBAH',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_tujuan')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TUJUAN ".$kode_tujuan."',
				text: 'GAGAL DI TAMBAH',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_tujuan')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function tambah_tujuan_pengiriman()
	{
		$kode_tujuan = strtoupper($this->input->post('kode_tujuan'));
		$tujuan = strtoupper($this->input->post('tujuan'));
		$status = '1';
		$cekmastertujuan = $this->master->cekmastertujuan($kode_tujuan);
		if($cekmastertujuan > 0){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'KODE TUJUAN SUDAH ADA ',
				text: '".$kode_tujuan."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}else{
		$data = array('kode_tujuan' => $kode_tujuan,
						'tujuan' => $tujuan,
						'status' => $status);
		$jalan = $this->master->tambah_tujuan($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TUJUAN ".$kode_tujuan."',
				text: 'BERHASIL DI TAMBAH',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TUJUAN ".$kode_tujuan."',
				text: 'GAGAL DI TAMBAH',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function simpan_master_tujuan($id_tujuan)
	{
		$kode_tujuan = strtoupper($this->input->post('kode_tujuan'));
		$tujuan = strtoupper($this->input->post('tujuan'));
		$status = '1';
		$cekmastertujuan = $this->master->cekmastertujuan($kode_tujuan);
		if($cekmastertujuan > 0){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'KODE TUJUAN SUDAH ADA ',
				text: '".$kode_tujuan."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_tujuan')."';	
			  } ,2100); 
			 </script>";
		}else{
		$data = array('kode_tujuan' => $kode_tujuan,
						'tujuan' => $tujuan,
						'status' => $status);
		$jalan = $this->master->simpan_master_tujuan($data, $id_tujuan);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TUJUAN ".$kode_tujuan."',
				text: 'BERHASIL DI UBAH',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_tujuan')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TUJUAN ".$kode_tujuan."',
				text: 'GAGAL DI UBAH',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_tujuan')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function hapus_master_tujuan($id_tujuan, $kode_tujuan)
	{
		$status = '0';
		$data = array('status' => $status);
		$jalan = $this->master->simpan_master_tujuan($data, $id_tujuan);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TUJUAN ".$kode_tujuan."',
				text: 'BERHASIL DI UBAH',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_tujuan')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TUJUAN ".$kode_tujuan."',
				text: 'GAGAL DI UBAH',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_tujuan')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function master_asal()
	{
		$data['judul'] = 'JTE TRACER || MASTER ASAL';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['master_asal'] = $this->master->master_asal();
		$this->load->view('admin/master_asal',$data);
		$this->load->view('admin/footer');
	}
	public function edit_master_asal($id_asal)
	{
		$data['judul'] = 'JTE TRACER || EDIT MASTER ASAL';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['edit_master_asal'] = $this->master->edit_master_asal($id_asal);
		$this->load->view('admin/edit_master_asal',$data);
		$this->load->view('admin/footer');
	}
	public function tambah_master_asal()
	{
		$kode_asal = strtoupper($this->input->post('kode_asal'));
		$master_asal = strtoupper($this->input->post('master_asal'));
		$status_asal = '1';
		$cekmasterasal = $this->master->cekmasterasal($kode_asal);
		if($cekmasterasal > 0){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER ASAL ".$kode_asal."',
				text: 'SUDAH ADA',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_asal')."';	
			  } ,2100); 
			 </script>";
		}else{
			$data = array('kode_asal' => $kode_asal,
							'master_asal' => $master_asal,
							'status_asal' => $status_asal);
		$jalan = $this->master->tambah_master_asal($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER ASAL ".$master_asal."',
				text: 'BERHASIL DI TAMBAH',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_asal')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER ASAL ".$master_asal."',
				text: 'GAGAL DI TAMBAH',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_asal')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function tambah_master_asal_pengiriman()
	{
		$kode_asal = strtoupper($this->input->post('kode_asal'));
		$master_asal = strtoupper($this->input->post('master_asal'));
		$status_asal = '1';
		$cekmasterasal = $this->master->cekmasterasal($kode_asal);
		if($cekmasterasal > 0){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER ASAL ".$kode_asal."',
				text: 'SUDAH ADA',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}else{
			$data = array('kode_asal' => $kode_asal,
							'master_asal' => $master_asal,
							'status_asal' => $status_asal);
		$jalan = $this->master->tambah_master_asal($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER ASAL ".$master_asal."',
				text: 'BERHASIL DI TAMBAH',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER ASAL ".$master_asal."',
				text: 'GAGAL DI TAMBAH',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/input_data_pengiriman')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function tambah_master_asal_log_pengiriman($id_pengiriman)
	{
		$kode_asal = strtoupper($this->input->post('kode_asal'));
		$master_asal = strtoupper($this->input->post('master_asal'));
		$status_asal = '1';
		$cekmasterasal = $this->master->cekmasterasal($kode_asal);
		if($cekmasterasal > 0){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER ASAL ".$kode_asal."',
				text: 'SUDAH ADA',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}else{
			$data = array('kode_asal' => $kode_asal,
							'master_asal' => $master_asal,
							'status_asal' => $status_asal);
		$jalan = $this->master->tambah_master_asal($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER ASAL ".$master_asal."',
				text: 'BERHASIL DI TAMBAH',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER ASAL ".$master_asal."',
				text: 'GAGAL DI TAMBAH',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function simpan_master_asal($id_asal)
	{
		$kode_asal = strtoupper($this->input->post('kode_asal'));
		$master_asal = strtoupper($this->input->post('master_asal'));
		$status_asal = '1';
		$data = array('kode_asal' => $kode_asal,
							'master_asal' => $master_asal,
							'status_asal' => $status_asal);
		$jalan = $this->master->simpan_master_asal($data, $id_asal);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER ASAL ".$master_asal."',
				text: 'BERHASIL DI UBAH',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_asal')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER ASAL ".$master_asal."',
				text: 'GAGAL DI UBAH',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_asal')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function hapus_master_asal($id_asal, $master_asal)
	{
		$data = array('status_asal' => '0');
		$jalan = $this->master->simpan_master_asal($data, $id_asal);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER ASAL ".$master_asal."',
				text: 'BERHASIL DI HAPUS',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_asal')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER ASAL ".$master_asal."',
				text: 'GAGAL DI HAPUS',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_asal')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function master_hpp()
	{
		$data['judul'] = 'JTE TRACER || MASTER HPP';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['master_asal'] = $this->master->master_asal();
		$data['master_costumer'] = $this->master->master_costumer();
		$data['lihat_tujuan'] = $this->master->lihat_tujuan();
		$data['tampil_hpp'] = $this->master->tampil_hpp();
		$this->load->view('admin/master_hpp',$data);
		$this->load->view('admin/footer');
	}
	public function edit_master_hpp($id_hpp)
	{
		$data['judul'] = 'JTE TRACER || EDIT MASTER HPP';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['master_asal'] = $this->master->master_asal();
		$data['master_costumer'] = $this->master->master_costumer();
		$data['lihat_tujuan'] = $this->master->lihat_tujuan();
		$data['tampil_hpp'] = $this->master->tampil_hpp();
		$data['edit_master_hpp'] = $this->master->edit_master_hpp($id_hpp);
		$this->load->view('admin/edit_master_hpp',$data);
		$this->load->view('admin/footer');
	}
	public function tambah_masterhpp()
	{
		$id_asal = $this->input->post('id_asal');
		$kode_asal = $this->input->post('kode_asal');
		$master_asal = $this->input->post('master_asal');
		$id_tujuan = $this->input->post('id_tujuan');
		$kode_tujuan = $this->input->post('kode_tujuan');
		$tujuan = $this->input->post('tujuan');
		$base_on = $this->input->post('base_on');
		$harga_satuan = $this->input->post('harga_satuan');
		$costumer_id = $this->input->post('costumer_id');
		$costumer_code = $this->input->post('costumer_code');
		$costumer_name = $this->input->post('costumer_name');
		$layanan = $this->input->post('layanan');
		$created_by = $this->session->userdata('nama_user');
		$created_on = date('20y-m-d H:i:s');
		if($costumer_id == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER COSTUMER TIDAK BOLEH KOSONG',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_hpp')."';	
			  } ,2100); 
			 </script>";
		}
		if($id_tujuan == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TUJUAN TIDAK BOLEH KOSONG',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_hpp')."';	
			  } ,2100); 
			 </script>";
		}if($id_asal == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER ASAL TIDAK BOLEH KOSONG',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_hpp')."';	
			  } ,2100); 
			 </script>";
		}
		else{
		$data = array('id_tujuan' => $id_tujuan,
						'costumer_code' => $costumer_code,
						'costumer_id' => $costumer_id,
						'costumer_name' => $costumer_name,
						'id_asal' => $id_asal,
						'kode_asal' => $kode_asal,
						'master_asal' => $master_asal,
						'kode_tujuan' => $kode_tujuan,
						'tujuan' => $tujuan,
						'base_on' => $base_on,
						'harga_satuan' => $harga_satuan,
						'layanan' => $layanan,
						'created_by' => $created_by,
						'created_on' => $created_on,
						'status' => '1');
		$jalan = $this->master->tambah_masterhpp($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER HPP BERHASIL DI TAMBAH',
				text: 'HARGA SATUAN RP ".$harga_satuan."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_hpp')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER HPP GAGAL DI TAMBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_hpp')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function simpan_master_hpp($id_hpp)
	{
		$id_asal = $this->input->post('id_asal');
		$kode_asal = $this->input->post('kode_asal');
		$master_asal = $this->input->post('master_asal');
		$id_tujuan = $this->input->post('id_tujuan');
		$kode_tujuan = $this->input->post('kode_tujuan');
		$tujuan = $this->input->post('tujuan');
		$base_on = $this->input->post('base_on');
		$harga_satuan = $this->input->post('harga_satuan');
		$costumer_id = $this->input->post('costumer_id');
		$costumer_code = $this->input->post('costumer_code');
		$costumer_name = $this->input->post('costumer_name');
		$layanan = $this->input->post('layanan');
		$modified_by = $this->session->userdata('nama_user');
		$modified_on = date('20y-m-d H:i:s');
		if($costumer_id == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER COSTUMER TIDAK BOLEH KOSONG',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_hpp')."';	
			  } ,2100); 
			 </script>";
		}
		if($id_tujuan == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TUJUAN TIDAK BOLEH KOSONG',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_hpp')."';	
			  } ,2100); 
			 </script>";
		}if($id_asal == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER ASAL TIDAK BOLEH KOSONG',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_hpp')."';	
			  } ,2100); 
			 </script>";
		}else{
		$data = array('id_tujuan' => $id_tujuan,
						'costumer_id' => $costumer_id,
						'costumer_code' => $costumer_code,
						'costumer_name' => $costumer_name,
						'id_asal' => $id_asal,
						'kode_asal' => $kode_asal,
						'master_asal' => $master_asal,
						'kode_tujuan' => $kode_tujuan,
						'tujuan' => $tujuan,
						'base_on' => $base_on,
						'harga_satuan' => $harga_satuan,
						'layanan' => $layanan,
						'modified_by' => $modified_by,
						'modified_on' => $modified_on,
						'status' => '1');
		$jalan = $this->master->simpan_master_hpp($data, $id_hpp);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER HPP BERHASIL DI UBAH',
				text: 'HARGA SATUAN RP ".$harga_satuan."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_hpp')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER HPP GAGAL DI UBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_hpp')."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function hapus_masterhpp($id_hpp)
	{
		$data = array('status' => '0');
		$jalan = $this->master->hapus_masterhpp($data, $id_hpp);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER HPP BERHASIL DI HAPUS ',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_hpp')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER HPP GAGAL DI HAPUS',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_hpp')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function tambah_tes()
	{
		$id = $this->input->post('id');
		$tes1 = $this->input->post('tes1');
		$tes2 = $this->input->post('tes2');
		$data = array('id' => $id,
						'tes1' => $tes1,
						'tes2' => $tes2);
		$jalan = $this->master->tambah_tes($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Berhasil ',
				text: 'tes',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_vendor')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Gagal',
				text: 'tes',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_vendor')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function tambah_dokumen()
	{
		$id_pengiriman = $this->input->post('id_pengiriman');
		$gambar_suratjalan = $this->input->post('gambar_suratjalan');
		$gambar_bap = $this->input->post('gambar_bap');
		$gambar = $this->input->post('gambar');
		
		$this->load->library('upload');
		$buktiselesai1 = "";
		error_reporting(0);
		$nmfile = "GAMBAR_SURATJALAN".time();
		$configfoto['upload_path'] = 'assets/dokumen';
		$configfoto['allowed_types'] = 'jpg|jpeg|gif|png|pdf';
		$configfoto['max_size'] = '800000000000';
		$config['max_width']            = '450';
		$config['max_height']           = '660';
		$configfoto['file_name'] = $nmfile;
		$this->upload->initialize($configfoto);
		if($_FILES['gambar_suratjalan']['name']){
			
			if($this->upload->do_upload('gambar_suratjalan')){
				$lpr = $this->upload->data();
				$buktiselesai1 = $lpr['file_name'];
			}
			else {
				$data['errors'] = array("errors" => $this->upload->display_errors());
			}
		}
		
		$this->load->library('upload');
		$buktiselesai2 = "";
		error_reporting(0);
		$nmfile = "GAMBAR_BAP".time();
		$configfoto['upload_path'] = 'assets/dokumen';
		$configfoto['allowed_types'] = 'jpg|jpeg|gif|png|pdf';
		$configfoto['max_size'] = '800000000000';
		$config['max_width']            = '450';
		$config['max_height']           = '660';
		$configfoto['file_name'] = $nmfile;
		$this->upload->initialize($configfoto);
		if($_FILES['gambar_bap']['name']){
			
			if($this->upload->do_upload('gambar_bap')){
				$lpr = $this->upload->data();
				$buktiselesai2 = $lpr['file_name'];
			}
			else {
				$data['errors'] = array("errors" => $this->upload->display_errors());
			}
		}
		
		$this->load->library('upload');
		$buktiselesai3 = "";
		error_reporting(0);
		$nmfile = "GAMBAR".time();
		$configfoto['upload_path'] = 'assets/dokumen';
		$configfoto['allowed_types'] = 'jpg|jpeg|gif|png|pdf';
		$configfoto['max_size'] = '800000000000';
		$config['max_width']            = '450';
		$config['max_height']           = '660';
		$configfoto['file_name'] = $nmfile;
		$this->upload->initialize($configfoto);
		if($_FILES['gambar']['name']){
			
			if($this->upload->do_upload('gambar')){
				$lpr = $this->upload->data();
				$buktiselesai3 = $lpr['file_name'];
			}
			else {
				$data['errors'] = array("errors" => $this->upload->display_errors());
			}
		}
		
		$data = array('id_pengiriman' => $id_pengiriman,
						'gambar_suratjalan' => $buktiselesai1,
						'gambar' => $buktiselesai3,
						'gambar_bap' => $buktiselesai2);
		$jalan = $this->master->tambah_dokumen($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Dokumen Berhasil Di Tambah',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Dokumen Gagal Di Tambah',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function tambah_log_tujuan()
	{
		$id_pengiriman = $this->input->post('id_pengiriman');
		$kode_asal = $this->input->post('kode_asal');
		$nama_asal = $this->input->post('nama_asal');
		$pic_pengiriman = strtoupper($this->input->post('pic_pengiriman'));
		$recaived_by = $this->input->post('recaived_by');
		$tanggal_log_asal = date('20y-m-d H:i:s');
		$status_log_asal = $this->input->post('status_log_asal');
		$created_by = $this->session->userdata('nama_user');
		$created_on = date('20y-m-d H:i:s');
		if($kode_asal == ''){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA ASAL TIDAK BOLEH KOSONG',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}else{
		$data = array('id_pengiriman' => $id_pengiriman,
						'kode_asal' => $kode_asal,
						'nama_asal' => $nama_asal,
						'pic_pengiriman' => $pic_pengiriman,
						'tanggal_log_asal' => $tanggal_log_asal,
						'status_log_asal' => $status_log_asal,
						'created_by' => $created_by,
						'created_on' => $created_on);
		$datax = array(//'kode_tujuan' => $kode_tujuan,
						//'tujuan' => $nama_tujuan,
						'recaived_by' => $recaived_by,
						'status_pengiriman' => $status_log_asal);
		$jalanx = $this->master->update_log_tujuan($datax, $id_pengiriman);
		$jalan = $this->master->tambah_log_tujuan($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'UPDATE LOG PENGIRIMAN BERHASIL DI TAMBAH',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'UPDATE LOG PENGIRIMAN GAGAL DI TAMBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}
		}
	}
	public function tambah_log_document($id_pengiriman)
	{
		$id_pengiriman = $id_pengiriman;
		$no_document = strtoupper($this->input->post('no_document'));
		$jenis_document = $this->input->post('jenis_document');
		$tanggal_document = $this->input->post('tanggal_document');
		$status_log_document = '1';
		$created_by = $this->session->userdata('nama_user');
		$created_on = date('20y-m-d H:i:s');
		
		$data = array('id_pengiriman' => $id_pengiriman,
						'no_document' => $no_document,
						'jenis_document' => $jenis_document,
						'tanggal_document' => $tanggal_document,
						'status_log_document' => $status_log_document,
						'created_by' => $created_by,
						'created_on' => $created_on);
		$jalan = $this->master->tambah_log_document($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DOKUMENT BERHASIL DI TAMBAH',
				text: '".$no_document."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DOKUMENT GAGAL DI TAMBAH',
				text: '".$no_document."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function edit_log_document($id_log_document, $id_pengiriman)
	{
		$data['judul'] = 'JTE TRACER || EDIT DOKUMEN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['id_pengiriman'] = $id_pengiriman;
		$data['edit_log_document'] = $this->master->edit_log_document($id_log_document);
		$this->load->view('admin/edit_log_document', $data);
		$this->load->view('admin/footer');
	}
	public function simpan_log_document($id_log_document,  $id_pengiriman)
	{
		$id_pengiriman = $id_pengiriman;
		$no_document = strtoupper($this->input->post('no_document'));
		$jenis_document = $this->input->post('jenis_document');
		$tanggal_document = $this->input->post('tanggal_document');
		$status_log_document = '1';
		$modified_by = $this->session->userdata('nama_user');
		$modified_on = date('20y-m-d H:i:s');
		
		$data = array('no_document' => $no_document,
						'jenis_document' => $jenis_document,
						'tanggal_document' => $tanggal_document,
						'status_log_document' => $status_log_document,
						'modified_by' => $modified_by,
						'modified_on' => $modified_on);
		$jalan = $this->master->simpan_log_document($data, $id_log_document);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DOKUMENT BERHASIL DI UBAH',
				text: '".$no_document."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DOKUMENT GAGAL DI UBAH',
				text: '".$no_document."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/update_log_pengiriman/$id_pengiriman")."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function detail_data_pengiriman($id_pengiriman)
	{
		$data['detail_data_pengiriman'] = $this->master->detail_data_pengiriman($id_pengiriman);
		$this->load->view('admin/detail_data_pengiriman', $data);
	}
	public function data_remender_besok()
	{
		$data['judul'] = 'JTE TRACER || DATA REMENDER BESOK';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$besok = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d'))));
		$data['data_remender_besok'] = $this->master->data_remender_besok($besok);
		$this->load->view('admin/data_remender_besok', $data);
		$this->load->view('admin/footer');
	}
	public function data_remender_hariini()
	{
		$data['judul'] = 'JTE TRACER || DATA REMENDER HARIINI';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$hariini = date('Y-m-d');
		$data['data_remender_hariini'] = $this->master->data_remender_hariini($hariini);
		$this->load->view('admin/data_remender_hariini', $data);
		$this->load->view('admin/footer');
	}
	public function data_remender_kemarin()
	{
		$data['judul'] = 'JTE TRACER || DATA REMENDER KEMARIN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date('Y-m-d'))));
		$data['data_remender_kemarin'] = $this->master->data_remender_kemarin($kemarin);
		$this->load->view('admin/data_remender_kemarin', $data);
		$this->load->view('admin/footer');
	}
	public function master_tarif()
	{
		$data['judul'] = 'JTE TRACER || MASTER TARIF';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['lihat_master_vendor'] = $this->master->lihat_master_vendor();
		$data['lihat_tujuan'] = $this->master->lihat_tujuan();
		$data['master_asal'] = $this->master->master_asal();
		$data['master_tarif'] = $this->master->master_tarif();
		$this->load->view('admin/master_tarif',$data);
		$this->load->view('admin/footer');
	}
	public function edit_master_tarif($id_tarif)
	{
		$data['judul'] = 'JTE TRACER || EDIT MASTER TARIF';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['lihat_master_vendor'] = $this->master->lihat_master_vendor();
		$data['lihat_tujuan'] = $this->master->lihat_tujuan();
		$data['master_asal'] = $this->master->master_asal();
		$data['edit_master_tarif'] = $this->master->edit_master_tarif($id_tarif);
		$this->load->view('admin/edit_master_tarif',$data);
		$this->load->view('admin/footer');
	}
	public function tambah_master_tarif()
	{
		$vendor_id = $this->input->post('id_vendor');
		$vendor_code = $this->input->post('vendor_code');
		$vendor_name = $this->input->post('vendor_name');
		$id_asal = $this->input->post('id_asal');
		$kode_asal = $this->input->post('kode_asal');
		$master_asal = $this->input->post('master_asal');
		$id_tujuan = $this->input->post('id_tujuan');
		$kode_tujuan = $this->input->post('kode_tujuan');
		$tujuan = $this->input->post('tujuan');
		$baseon_tarif = $this->input->post('baseon_tarif');
		$harga_tarif = $this->input->post('harga_tarif');
		$created_by = $this->session->userdata('nama_user');
		$created_on = date('20y-m-d H:i:s');
		
		$data = array('vendor_id' => $vendor_id,
						'vendor_code' => $vendor_code,
						'vendor_name' => $vendor_name,
						'id_asal' => $id_asal,
						'kode_asal' => $kode_asal,
						'master_asal' => $master_asal,
						'id_tujuan' => $id_tujuan,
						'kode_tujuan' => $kode_tujuan,
						'tujuan' => $tujuan,
						'baseon_tarif' => $baseon_tarif,
						'harga_tarif' => $harga_tarif,
						'status_tarif' => '1',
						'created_by' => $created_by,
						'created_on' => $created_on);
		$jalan = $this->master->tambah_master_tarif($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TARIF BERHASIL DI TAMBAH',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_tarif')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TARIF BERHASIL DI TAMBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_tarif')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function simpan_master_tarif($id_tarif)
	{
		$vendor_id = $this->input->post('id_vendor');
		$vendor_code = $this->input->post('vendor_code');
		$vendor_name = $this->input->post('vendor_name');
		$id_asal = $this->input->post('id_asal');
		$kode_asal = $this->input->post('kode_asal');
		$master_asal = $this->input->post('master_asal');
		$id_tujuan = $this->input->post('id_tujuan');
		$kode_tujuan = $this->input->post('kode_tujuan');
		$tujuan = $this->input->post('tujuan');
		$baseon_tarif = $this->input->post('baseon_tarif');
		$harga_tarif = $this->input->post('harga_tarif');
		$modified_by = $this->session->userdata('nama_user');
		$modified_on = date('20y-m-d H:i:s');
		
		$data = array('vendor_id' => $vendor_id,
						'vendor_code' => $vendor_code,
						'vendor_name' => $vendor_name,
						'id_asal' => $id_asal,
						'kode_asal' => $kode_asal,
						'master_asal' => $master_asal,
						'id_tujuan' => $id_tujuan,
						'kode_tujuan' => $kode_tujuan,
						'tujuan' => $tujuan,
						'baseon_tarif' => $baseon_tarif,
						'harga_tarif' => $harga_tarif,
						'status_tarif' => '1',
						'modified_by' => $modified_by,
						'modified_on' => $modified_on);
		$jalan = $this->master->simpan_master_tarif($data, $id_tarif);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TARIF BERHASIL DI UBAH',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_tarif')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TARIF BERHASIL DI UBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_tarif')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function hapus_master_tarif($id_tarif)
	{
		$data = array('status_tarif' => '0');
		$jalan = $this->master->simpan_master_tarif($data, $id_tarif);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TARIF BERHASIL DI HAPUS',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_tarif')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER TARIF BERHASIL DI HAPUS',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_tarif')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function laporan_data_pengiriman()
	{
		$data['judul'] = 'JTE TRACER || LAPORAN DATA PENGIRIMAN';
		$data['id_user'] = $this->session->userdata('id_user');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['foto_user'] = $this->session->userdata('foto_user');
		$data['sebagai'] = $this->session->userdata('sebagai');
		$data['status'] = $this->session->userdata('status');
		$this->load->view('admin/header', $data);
		$data['tampil_data_pengiriman'] = $this->master->tampil_data_pengiriman();
		$data['view_invoice'] = $this->master->view_invoice();
		$this->load->view('admin/laporan_data_pengiriman', $data);
		$this->load->view('admin/footer');
	}
	public function cetak_laporan_pengiriman()
	{
		$dari_tanggal = $this->input->post('dari_tanggal');
		$sampai_tanggal = $this->input->post('sampai_tanggal');
		$data['dari_tanggal'] = $this->input->post('dari_tanggal');
		$data['sampai_tanggal'] = $this->input->post('sampai_tanggal');
		$data['cetak_laporan_pengiriman'] = $this->master->cetak_laporan_pengiriman($dari_tanggal,$sampai_tanggal);
		$this->load->view('admin/cetak_laporan_pengiriman', $data);
	}
}