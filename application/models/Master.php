<?php defined('BASEPATH') OR exit('No direct script access allowed');

class master extends CI_Model{
	function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");// set timezone jekardah	
	}
	public function loginuser($data)
	{
		$jalan = $this->db->get_where('tbl_user', $data);
		return $jalan;
	}
	public function dataloginuser($username)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_user` where username = '$username'");
		return $jalan->result();
	}
	public function tampil_user()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_user` where status = '1' order by nama_user desc");
		return $jalan->result();
	}
	public function edit_master_user($id_user)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_user` where id_user = '$id_user' ");
		return $jalan->result();
	}
	public function simpan_master_user($data, $id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->update('tbl_user', $data);
		return true;
	}
	public function tambah_user($data)
	{
		$jalan = $this->db->insert('tbl_user', $data);
		return $jalan;
	}
	public function cekusername($username)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_user` where username = '$username'");
		return $jalan->num_rows();
	}
	public function tambah_data_pengiriman($data)
	{
		$jalan = $this->db->insert('data_pengiriman', $data);
		return $jalan;
	}
	public function tampil_data_pengiriman()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status = '1' order by status desc");
		return $jalan->result();
	}
	public function view_data_pengiriman($pickup_info)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where pickup_info = '$pickup_info' group by pickup_info");
		return $jalan->result();
	}
	public function tampil_data_pengiriman_invoice()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status_pengiriman = '6' and status_invoice != '1' order by id_pengiriman asc");
		return $jalan->result();
	}
	public function tampil_data_pengiriman_manifest()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status_manifest = '0' order by id_pengiriman asc");
		return $jalan->result();
	}
	public function tampil_data_pengiriman_delevery()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status_pengiriman = '1' or status_pengiriman = '2' order by id_pengiriman asc");
		return $jalan->result();
	}
	public function tampil_data_invoice()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_invoice` group by kode_invoice");
		return $jalan->result();
	}
	public function tampil_data_manifest()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman`, tbl_manifest where data_pengiriman.id_pengiriman = tbl_manifest.id_pengiriman and tbl_manifest.status_manifest = '1' group by tbl_manifest.kode_manifest");
		return $jalan->result();
	}
	public function tampil_data_delevery()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman`, tbl_delevery where data_pengiriman.id_pengiriman = tbl_delevery.id_pengiriman and tbl_delevery.status_delevery = '1' group by tbl_delevery.kode_delevery");
		return $jalan->result();
	}
	public function data_manifest()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_manifest` where status_manifest = '1' group by kode_manifest");
		return $jalan->result();
	}
	public function cetak_laporan_manifest_header($kode_manifest)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_manifest` where kode_manifest = '$kode_manifest' group by kode_manifest");
		return $jalan->result();
	}
	public function cetak_laporan_delevery_header($kode_delevery)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_delevery` where kode_delevery = '$kode_delevery' group by kode_delevery");
		return $jalan->result();
	}
	public function cetak_laporan_manifest($kode_manifest)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_manifest`, data_pengiriman where tbl_manifest.id_pengiriman = data_pengiriman.id_pengiriman and tbl_manifest.kode_manifest = '$kode_manifest' order by data_pengiriman.id_pengiriman asc");
		return $jalan->result();
	}
	public function cetak_laporan_delevery($kode_delevery)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_delevery`, data_pengiriman where tbl_delevery.id_pengiriman = data_pengiriman.id_pengiriman and tbl_delevery.kode_delevery = '$kode_delevery' order by data_pengiriman.id_pengiriman asc");
		return $jalan->result();
	}
	public function view_invoice()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_invoice` group by kode_invoice desc");
		return $jalan->result();
	}
	public function tampil_invoice($kode_invoice)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_invoice`, master_costumer where tbl_invoice.costumer_id = master_costumer.costumer_id and tbl_invoice.kode_invoice = '$kode_invoice' group by tbl_invoice.kode_invoice desc");
		return $jalan->result();
	}
	public function tampil_data_pengiriman_user()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status = '1' order by created_on desc");
		return $jalan->result();
	}
	public function edit_data_pengiriman($id_pengiriman)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where id_pengiriman = '$id_pengiriman'");
		return $jalan->result();
	}
	public function simpan_data_pengiriman($data, $id_pengiriman)
	{
		$this->db->where('id_pengiriman', $id_pengiriman);
		$this->db->update('data_pengiriman', $data);
		return true;
	}
	public function update_data_pengiriman($data, $id_pengiriman)
	{
		$this->db->where('id_pengiriman', $id_pengiriman);
		$this->db->update('data_pengiriman', $data);
		return true;
	}
	public function hapus_data_pengiriman($data, $id_pengiriman)
	{
		$this->db->where('id_pengiriman', $id_pengiriman);
		$this->db->update('data_pengiriman', $data);
		return true;
	}
	public function tambah_master_shipper($data)
	{
		$jalan = $this->db->insert('master_shipper', $data);
		return $jalan;
	}
	public function cekmastershipper($shipper_code)
	{
		$jalan = $this->db->query("SELECT * FROM `master_shipper` where shipper_code = '$shipper_code'");
		return $jalan->num_rows();
	}
	public function master_shipper()
	{
		$jalan = $this->db->query("SELECT * FROM `master_shipper` where status != '0' order by shipper_code desc");
		return $jalan->result();
	}
	public function edit_master_shipper($shipper_id)
	{
		$jalan = $this->db->query("SELECT * FROM `master_shipper` where shipper_id = '$shipper_id'");
		return $jalan->result();
	}
	public function simpan_master_shipper($data, $shipper_id)
	{
		$this->db->where('shipper_id', $shipper_id);
		$this->db->update('master_shipper', $data);
		return true;
	}
	public function hapus_master_shipper($data, $shipper_id)
	{
		$this->db->where('shipper_id', $shipper_id);
		$this->db->update('master_shipper', $data);
		return true;
	}
	public function master_consignee()
	{
		$jalan = $this->db->query("SELECT * FROM `master_consignee` where status != '0' order by consignee_code desc");
		return $jalan->result();
	}
	public function tambah_master_consignee($data)
	{
		$jalan = $this->db->insert('master_consignee', $data);
		return $jalan;
	}
	public function cekmasterconsignee($consignee_code)
	{
		$jalan = $this->db->query("SELECT * FROM `master_consignee` where consignee_code = '$consignee_code'");
		return $jalan->num_rows();
	}
	public function edit_master_consignee($consignee_id)
	{
		$jalan = $this->db->query("SELECT * FROM `master_consignee` where consignee_id = '$consignee_id'");
		return $jalan->result();
	}
	public function simpan_master_consignee($data, $consignee_id)
	{
		$this->db->where('consignee_id', $consignee_id);
		$this->db->update('master_consignee', $data);
		return true;
	}
	public function hapus_master_consignee($data, $consignee_id)
	{
		$this->db->where('consignee_id', $consignee_id);
		$this->db->update('master_consignee', $data);
		return true;
	}
	public function lihat_master_shipper()
	{
		$jalan = $this->db->query("SELECT * FROM `master_shipper` where status = '1'");
		return $jalan->result();
	}
	public function lihat_master_consignee()
	{
		$jalan = $this->db->query("SELECT * FROM `master_consignee` where status = '1'");
		return $jalan->result();
	}
	public function tambah_master_vendor($data)
	{
		$jalan = $this->db->insert('master_vendor', $data);
		return $jalan;
	}
	public function lihat_master_vendor()
	{
		$jalan = $this->db->query("SELECT * FROM `master_vendor` where status = '1'");
		return $jalan->result();
	}
	public function master_vendor()
	{
		$jalan = $this->db->query("SELECT * FROM `master_vendor` where status != '0' order by vendor_code desc");
		return $jalan->result();
	}
	public function edit_master_vendor($vendor_id)
	{
		$jalan = $this->db->query("SELECT * FROM `master_vendor` where vendor_id = '$vendor_id'");
		return $jalan->result();
	}
	public function simpan_master_vendor($data, $vendor_id)
	{
		$this->db->where('vendor_id', $vendor_id);
		$this->db->update('master_vendor', $data);
		return true;
	}
	public function hapus_master_vendor($data, $vendor_id)
	{
		$this->db->where('vendor_id', $vendor_id);
		$this->db->update('master_vendor', $data);
		return true;
	}
	public function tambah_tes($data)
	{
		$jalan = $this->db->insert('tbl_tes', $data);
		return $jalan;
	}
	public function tambah_log_pengiriman($data)
	{
		$jalan = $this->db->insert('tbl_log_pengiriman', $data);
		return $jalan;
	}
	public function tampil_log_pengiriman($id_pengiriman)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_log_pengiriman`, data_pengiriman, master_hpp, master_tujuan where tbl_log_pengiriman.id_pengiriman = data_pengiriman.id_pengiriman and tbl_log_pengiriman.id_pengiriman = '$id_pengiriman'and data_pengiriman.id_hpp = master_hpp.id_hpp and master_tujuan.id_tujuan = master_hpp.id_tujuan  order by tbl_log_pengiriman.id_log_pengiriman asc");
		return $jalan->result();
	}
	public function cek_log_pengiriman($id_pengiriman)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_log_pengiriman` where id_pengiriman = '$id_pengiriman'");
		return $jalan->num_rows();
	}
	public function ubah_status_pengiriman($data1, $id_pengiriman)
	{
		$this->db->where('id_pengiriman', $id_pengiriman);
		$this->db->update('data_pengiriman', $data1);
		return true;
	}
	public function status_pengiriman_selesa($data, $id_pengiriman)
	{
		$this->db->where('id_pengiriman', $id_pengiriman);
		$this->db->update('data_pengiriman', $data);
	}
	public function ubah_update_log_pengiriman($id_log_pengiriman)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_log_pengiriman`, data_pengiriman where tbl_log_pengiriman.id_pengiriman = data_pengiriman.id_pengiriman and tbl_log_pengiriman.id_log_pengiriman = '$id_log_pengiriman'");
		return $jalan->result();
	}
	public function simpan_update_log_pengiriman($data, $id_log_pengiriman)
	{
		$this->db->where('id_log_pengiriman', $id_log_pengiriman);
		$this->db->update('tbl_log_pengiriman', $data);
		return true;
	}
	public function tampil_data_tracer($cari)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman`, master_hpp, master_tujuan where data_pengiriman.id_hpp = master_hpp.id_hpp and master_hpp.id_tujuan = master_tujuan.id_tujuan and data_pengiriman.awb_no = '$cari' or data_pengiriman.no_so = '$cari' limit 0,1");
		return $jalan->result();
	}
	public function lihat_master_user()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_user` where sebagai = '2'");
		return $jalan->result();
	}
	public function total_data_rimender_besok($besok)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where eta = '$besok' and status_pengiriman != '3'");
		return $jalan->num_rows();
	}
	public function total_data_user()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_user`");
		return $jalan->num_rows();
	}
	public function total_data_vendor()
	{
		$jalan = $this->db->query("SELECT * FROM `master_vendor` where status = '1'");
		return $jalan->num_rows();
	}
	public function total_data_rimender_kemaren($kemaren)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where eta = '$kemaren' and status_pengiriman != '3'");
		return $jalan->num_rows();
	}
	public function total_data_rimender_hariini($hariini)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where eta = '$hariini' and status_pengiriman != '3'");
		return $jalan->num_rows();
	}
	public function data_pengiriman_user_keberangkatan($id_user)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where id_user = '$id_user' and status_pengiriman = '2'");
		return $jalan->num_rows();
	}
	public function data_pengiriman_user_transit($id_user)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where id_user = '$id_user' and status_pengiriman = '3'");
		return $jalan->num_rows();
	}
	public function data_pengiriman_user_kedatangan($id_user)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where id_user = '$id_user' and status_pengiriman = '4'");
		return $jalan->num_rows();
	}
	public function data_pengiriman_user_finish()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status_pengiriman = '2'");
		return $jalan->num_rows();
	}
	public function tampil_tujuan()
	{
		$jalan = $this->db->query("SELECT * FROM `master_tujuan` where status = '1'");
		return $jalan->result();
	}
	public function edit_master_tujuan($id_tujuan)
	{
		$jalan = $this->db->query("SELECT * FROM `master_tujuan` where id_tujuan = '$id_tujuan'");
		return $jalan->result();
	}
	public function simpan_master_tujuan($data, $id_tujuan)
	{
		$this->db->where('id_tujuan', $id_tujuan);
		$this->db->update('master_tujuan', $data);
		return true;
	}
	public function tambah_tujuan($data)
	{
		$jalan = $this->db->insert('master_tujuan', $data);
		return $jalan;
	}
	public function cekmastertujuan($kode_tujuan)
	{
		$jalan = $this->db->query("SELECT * FROM `master_tujuan` where kode_tujuan = '$kode_tujuan'");
		return $jalan->num_rows();
	}
	public function tampil_hpp()
	{
		$jalan = $this->db->query("SELECT * FROM `master_hpp`, master_tujuan where master_hpp.id_tujuan = master_tujuan.id_tujuan and master_hpp.status = '1'");
		return $jalan->result();
	}
	public function edit_master_hpp($id_hpp)
	{
		$jalan = $this->db->query("SELECT * FROM `master_hpp`, master_tujuan where master_hpp.id_tujuan = master_tujuan.id_tujuan and master_hpp.status = '1' and master_hpp.id_hpp = '$id_hpp'");
		return $jalan->result();
	}
	public function simpan_master_hpp($data, $id_hpp)
	{
		$this->db->where('id_hpp', $id_hpp);
		$this->db->update('master_hpp', $data);
		return true;
	}
	public function lihat_tujuan()
	{
		$jalan = $this->db->query("SELECT * FROM `master_tujuan` where status = '1'");
		return $jalan->result();
	}
	public function tambah_masterhpp($data)
	{
		$jalan = $this->db->insert('master_hpp', $data);
		return $jalan;
	}
	public function hapus_masterhpp($data, $id_hpp)
	{
		$this->db->where('id_hpp', $id_hpp);
		$this->db->update('master_hpp', $data);
		return true;
	}
	public function lihat_hpp()
	{
		$jalan = $this->db->query("SELECT * FROM `master_hpp`, master_tujuan where master_hpp.id_tujuan = master_tujuan.id_tujuan and master_hpp.status = '1'");
		return $jalan->result();
	}
	public function tambah_dokumen($data)
	{
		$jalan = $this->db->insert('tbl_dokumen', $data);
		return $jalan;
	}
	public function lihat_dokument($id_pengiriman)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_dokumen` where id_pengiriman = '$id_pengiriman' ");
		return $jalan->result();
	}
	public function cekdokument($id_pengiriman)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_dokumen` where id_pengiriman = '$id_pengiriman' ");
		return $jalan->num_rows();
	}
	public function cetak_laporan_invoice($kode_invoice)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman`, tbl_invoice where data_pengiriman.id_pengiriman = tbl_invoice.id_pengiriman and tbl_invoice.kode_invoice = '$kode_invoice' and data_pengiriman.status_pengiriman = '6' order by data_pengiriman.pickup_date desc");
		return $jalan->result();
	}
	public function buat_invoice($data)
	{
		$jalan = $this->db->insert('tbl_invoice', $data);
		return $jalan;
	}
	public function buat_manifest($data)
	{
		$jalan = $this->db->insert('tbl_manifest', $data);
		return $jalan;
	}
	public function buat_delevery($data)
	{
		$jalan = $this->db->insert('tbl_delevery', $data);
		return $jalan;
	}
	public function ubah_status_manifest($data, $id_pengiriman)
	{
		$this->db->where('id_pengiriman', $id_pengiriman);
		$this->db->update('data_pengiriman', $data);
		return true;
	}
	public function ubah_status_invoice($data, $id_pengiriman)
	{
		$this->db->where('id_pengiriman', $id_pengiriman);
		$this->db->update('data_pengiriman', $data);
		return true;
	}
	public function jumlah_des_proses()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status = 1 and description = 'Proses'");
		return $jalan->num_rows();
	}
	public function jumlah_des_sukses()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status = 1 and description = 'Sukses'");
		return $jalan->num_rows();
	}
	public function jumlah_des_kendala_supir()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status = 1 and description = 'Kendala Supir'");
		return $jalan->num_rows();
	}
	public function jumlah_des_barang_rusak()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status = 1 and description = 'Barang Rusak'");
		return $jalan->num_rows();
	}
	public function jumlah_des_lain()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status = 1 and description = 'Lain-Lain'");
		return $jalan->num_rows();
	}
	public function jumlah_des_terlambat()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status = 1 and description = 'Terlambat'");
		return $jalan->num_rows();
	}
	public function jumlah_des_barang_hilang()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status = 1 and description = 'Barang Hilang'");
		return $jalan->num_rows();
	}
	public function jumlah_moda_darat()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status = 1 and moda = 'Darat'");
		return $jalan->num_rows();
	}
	public function jumlah_moda_udara()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status = 1 and moda = 'Udara'");
		return $jalan->num_rows();
	}
	public function jumlah_moda_laut()
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where status = 1 and moda = 'Laut'");
		return $jalan->num_rows();
	}
	public function master_costumer()
	{
		$jalan = $this->db->query("SELECT * FROM `master_costumer` where status = '1' order by costumer_name desc");
		return $jalan->result();
	}
	public function cekcostumer($costumer_code)
	{
		$jalan = $this->db->query("SELECT * FROM `master_costumer` where costumer_code = '$costumer_code'");
		return $jalan->num_rows();
	}
	public function tambah_master_costumer($data)
	{
		$jalan = $this->db->insert('master_costumer', $data);
		return $jalan;
	}
	public function edit_master_costumer($costumer_id)
	{
		$jalan = $this->db->query("SELECT * FROM `master_costumer` where costumer_id = '$costumer_id'");
		return $jalan->result();
	}
	public function simpan_master_costumer($data, $costumer_id)
	{
		$this->db->where('costumer_id', $costumer_id);
		$this->db->update('master_costumer', $data);
		return true;
	}
	public function master_tujuan()
	{
		$jalan = $this->db->query("SELECT * FROM `master_tujuan` where status = '1'");
		return $jalan->result();
	}
	public function view_log_pengiriman($id_pengiriman)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where id_pengiriman = '$id_pengiriman'");
		return $jalan->result();
	}
	public function tambah_log_tujuan($data)
	{
		$jalan = $this->db->insert('tbl_log_tujuan', $data);
		return $jalan;
	}
	public function update_log_tujuan($data, $id_pengiriman)
	{
		$this->db->where('id_pengiriman', $id_pengiriman);
		$this->db->update('data_pengiriman', $data);
		return true;
	}
	public function tampil_log_tujuan($id_pengiriman)
	{
		$jalan = $this->db->query(" SELECT * FROM `tbl_log_tujuan` where id_pengiriman = '$id_pengiriman'");
		return $jalan->result();
	}
	public function tampil_log_document($id_pengiriman)
	{
		$jalan = $this->db->query(" SELECT * FROM `tbl_log_document`, data_pengiriman where data_pengiriman.id_pengiriman = tbl_log_document.id_pengiriman and data_pengiriman.id_pengiriman = '$id_pengiriman'");
		return $jalan->result();
	}
	public function data_remender_besok($besok)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where eta = '$besok' and status_pengiriman != '3'");
		return $jalan->result();
	}
	public function data_remender_hariini($hariini)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where eta = '$hariini' and status_pengiriman != '3'");
		return $jalan->result();
	}
	public function data_remender_kemarin($kemarin)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where eta = '$kemarin' and status_pengiriman != '3'");
		return $jalan->result();
	}
	public function detail_data_pengiriman($id_pengiriman)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where id_pengiriman = '$id_pengiriman'");
		return $jalan->result();
	}
	public function tracer_pengiriman($cari)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman`, tbl_log_tujuan where data_pengiriman.id_pengiriman = tbl_log_tujuan.id_pengiriman and data_pengiriman.pickup_info = '$cari'");
		return $jalan->result();
	}
	public function tracer_pengiriman_header($cari)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman`, tbl_log_tujuan where data_pengiriman.id_pengiriman = tbl_log_tujuan.id_pengiriman and data_pengiriman.pickup_info = '$cari' group by pickup_info");
		return $jalan->result();
	}
	public function edit_log_tujuan($id_log_tujuan)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_log_tujuan` where id_log_tujuan = '$id_log_tujuan'");
		return $jalan->result();
	}
	public function simpan_log_tujuan($data, $id_log_tujuan)
	{
		$this->db->where('id_log_tujuan', $id_log_tujuan);
		$this->db->update('tbl_log_tujuan', $data);
		return true;
	}
	public function master_asal()
	{
		$jalan = $this->db->query("SELECT * FROM `master_asal` where status_asal = '1'");
		return $jalan->result();
	}
	public function cekmasterasal($kode_asal)
	{
		$jalan = $this->db->query("SELECT * FROM `master_asal` where kode_asal = '$kode_asal'");
		return  $jalan->num_rows();
	}
	public function tambah_master_asal($data)
	{
		$jalan = $this->db->insert('master_asal', $data);
		return $jalan;
	}
	public function edit_master_asal($id_asal)
	{
		$jalan = $this->db->query("SELECT * FROM `master_asal` where id_asal = '$id_asal'");
		return $jalan->result();
	}
	public function simpan_master_asal($data, $id_asal)
	{
		$this->db->where('id_asal', $id_asal);
		$this->db->update('master_asal', $data);
		return true;
	}
	public function tambah_master_tarif($data)
	{
		$jalan = $this->db->insert('master_tarif', $data);
		return $jalan;
	}
	public function master_tarif()
	{
		$jalan = $this->db->query("SELECT * FROM `master_tarif` where status_tarif = '1'");
		return $jalan->result();
	}
	public function edit_master_tarif($id_tarif)
	{
		$jalan = $this->db->query("SELECT * FROM `master_tarif` where id_tarif = '$id_tarif'");
		return $jalan->result();
	}
	public function simpan_master_tarif($data, $id_tarif)
	{
		$this->db->where('id_tarif', $id_tarif);
		$this->db->update('master_tarif', $data);
		return true;
	}
	public function cetak_laporan_pengiriman($dari_tanggal,$sampai_tanggal)
	{
		$jalan = $this->db->query("SELECT * FROM `data_pengiriman` where  tanggal >= '$dari_tanggal' and tanggal <= '$sampai_tanggal' and status = '1' order by tanggal asc");
		return $jalan->result();
	}
	public function cekasaltujuan($id_asal, $id_tujuan, $costumer_id, $jenis_layanan)
	{
		$jalan = $this->db->query("SELECT * FROM `master_hpp` where id_asal = '$id_asal' and id_tujuan = '$id_tujuan' and costumer_id = '$costumer_id' and layanan = '$jenis_layanan'");
		return $jalan->num_rows();
	}
	public function cekasaltujuanharaga($id_asal, $id_tujuan, $costumer_id, $jenis_layanan)
	{
		$jalan = $this->db->query("SELECT * FROM `master_hpp` where id_asal = '$id_asal' and id_tujuan = '$id_tujuan' and costumer_id = '$costumer_id' and layanan = '$jenis_layanan'");
		return $jalan->result();
	}
	public function tambah_log_document($data)
	{
		$jalan = $this->db->insert('tbl_log_document', $data);
		return $jalan;
	}
	public function edit_log_document($id_log_document)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_log_document` where id_log_document = '$id_log_document'");
		return $jalan->result();
	}
	public function simpan_log_document($data, $id_log_document)
	{
		$this->db->where('id_log_document', $id_log_document);
		$this->db->update('tbl_log_document', $data);
		return true;
	}
	public function tambah_master_agen($data)
	{
		$jalan = $this->db->insert('master_agen', $data);
		return $jalan;
	}
	public function master_agen()
	{
		$jalan = $this->db->query("SELECT * FROM `master_agen` where status = '1' order by id_agen desc");
		return $jalan->result();
	}
	public function cekmasteragen($agen_code)
	{
		$jalan = $this->db->query("SELECT * FROM `master_agen` where agen_code = '$agen_code' ");
		return $jalan->num_rows();
	}
	public function edit_master_agen($id_agen)
	{
		$jalan = $this->db->query("SELECT * FROM `master_agen` where id_agen = '$id_agen'");
		return $jalan->result();
	}
	public function simpan_master_agen($data, $id_agen)
	{
		$this->db->where('id_agen', $id_agen);
		$this->db->update('master_agen', $data);
		return true;
	}
	public function data_detail_invoice($kode_invoice)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_invoice`, data_pengiriman where tbl_invoice.id_pengiriman = data_pengiriman.id_pengiriman and tbl_invoice.kode_invoice = '$kode_invoice'");
		return $jalan->result();
	}
	public function ubah_invoice_status($data, $kode_invoice)
	{
		$this->db->where('kode_invoice', $kode_invoice);
		$this->db->update('tbl_invoice', $data);
		return true;
	}
	public function tambah_detail_invoice($data)
	{
		$jalan = $this->db->insert('tbl_detail_invoice', $data);
		return $jalan;
	}
	public function cek_tarif_pengiriman($id_asal, $id_tujuan)
	{
		$jalan = $this->db->query("SELECT * FROM `master_hpp` where id_asal = '$id_asal' and id_tujuan = '$id_tujuan'");
		return $jalan->result();
	}
}

