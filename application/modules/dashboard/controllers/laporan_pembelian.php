<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_pembelian extends CI_Controller {

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
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_laporan_pembelian($GLOBALS['site_limit_medium'],$uri);
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/laporan_pembelian/bg_home");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			//arahkan ke halaman login
			redirect("login");
		}
	}

	function detail($id_param)
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
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_laporan_pembelian_header($id_param);
			$d['dt_retrieve_detail'] = $this->app_load_data_model->indexs_data_laporan_pembelian_detail($id_param);
			$d['param'] = $id_param;
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/laporan_pembelian/bg_detail");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			//arahkan ke halaman login
			redirect("login");
		}
	}

	function cetak_excel($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			//ambil data dari model
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_laporan_pembelian_header($id_param);
			$d['dt_retrieve_detail'] = $this->app_load_data_model->indexs_data_laporan_pembelian_detail($id_param);
			$d['param'] = $id_param;
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/laporan_pembelian/cetak",$d);
		}
		else
		{
			//arahkan ke halaman login
			redirect("login");
		}
	}

	function cetak_pdf($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			//ambil data dari model
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_laporan_penjualan_header($id_param);
			$d['dt_retrieve_detail'] = $this->app_load_data_model->indexs_data_laporan_penjualan_detail($id_param);
			$d['param'] = $id_param;
			
			//load view
			//parsing data ke view
			$this->load->helper("gen_pdf_helper");
 			$html = $this->load->view($GLOBALS['site_theme']."/laporan_pembelian/cetak",$d, true);
			pdf_create($html,$id_param.time()."");
		}
		else
		{
			//arahkan ke halaman login
			redirect("login");
		}
	}
}
