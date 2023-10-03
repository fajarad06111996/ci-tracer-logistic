<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('master'); //meload master model	
		date_default_timezone_set("Asia/Jakarta");// set timezone jekardah
		// if($this->session->userdata('id_siswa')==null){
			// redirect(base_url());
		// }
		//$this->load->library('googlemaps');
		
	}
	public function index()
	{
		$this->load->view('login/login');
	}

	public function loginuser()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//$md5 = md5($password);
		$data = array('username' => $username,
						'password' => $password);
		$jalan = $this->master->loginuser($data);
		if($jalan->num_rows() > 0)
		{
			$data['akun'] = $this->master->dataloginuser($username);
			foreach($data['akun'] as $akun){
				//session_start();
				$sesi['nama_user'] = $akun->nama_user;
				$sesi['username'] = $username;
				$sesi['id_user'] = $akun->id_user;
				$sesi['sebagai'] = $akun->sebagai;
				$sesi['status'] = $akun->status;
				$this->session->set_userdata($sesi);
				//var_dump($akun->bagian);
				if($akun->sebagai == '1'){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Login Sukses',
				text: '	Aplikasi TRACER JTEEXPRESS LOGISTIC',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/index')."';	
			  } ,2100); 
			 </script>";
				}
				if($akun->sebagai == '3')
				{
					echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Login Sukses',
				text: '	Aplikasi TRACER JTEEXPRESS LOGISTIC',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('tracer/index')."';	
			  } ,2100); 
			 </script>";
				}
			}
		} else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Login Gagal Ke Aplikasi TRACER JTEEXPRESS LOGISTIC',
				text: 'Periksa Username dan Password Anda Kembali',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('app/index')."';	
			  } ,2100); 
			 </script>";
		}
	}
    public function logout()
	{
		$this->session->unset_userdata('username');
		session_destroy();
		echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Berhasil Keluar !',
				text: 'Aplikasi TRACER JTEEXPRESS LOGISTIC',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('app/index')."';	
			  } ,2100); 
			 </script>";
	}
	
}
