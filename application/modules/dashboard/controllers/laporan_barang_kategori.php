<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_barang_kategori extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			//inisialisasi menu
			$d['mark_dashboard'] = "";
			$d['mark_pengguna'] = "";
			$d['mark_kategori'] = "";
			$d['mark_barang'] = "";
			$d['mark_supplier'] = "";
			$d['mark_pembelian'] = "";
			$d['mark_penjualan'] = "";
			
			//ambil data dari model
			$d['kategori'] = $this->db->get("kategori");
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_laporan_barang_kategori($GLOBALS['site_limit_medium'],$uri);
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/laporan_barang_kategori/bg_home");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			//arahkan ke halaman login
			redirect("login");
		}
	}

	function act()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$set['cari'] = $_POST['kd_kategori'];
			$this->session->set_userdata($set);
			redirect("dashboard/laporan_barang_kategori");
		}
		else
		{
			//arahkan ke halaman login
			redirect("login");
		}
	}
}
