<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tracer extends CI_Controller {
	function __construct(){
	parent::__construct();
		// if($this->session->userdata('id_user') == ""){
			// redirect(base_url('app/index'));
		// }
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
		$data['judul'] = 'JTE TRACER || FORM TRACER';
		$this->load->view('tracer/form_tracer', $data);
	}
	public function data_tracer()
	{
		$data['judul'] = 'JTE TRACER || DATA TRACER';
		$cari = $this->input->post('cari');
		$data['cari'] = $this->input->post('cari');
		$data['tracer_pengiriman'] = $this->master->tracer_pengiriman($cari);
		$this->load->view('tracer/tracer_pengiriman', $data);
	}
}