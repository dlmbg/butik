<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{
			//inisialisasi menu
			$d['mark_dashboard'] = "active";
			$d['mark_pengguna'] = "";
			$d['mark_kategori'] = "";
			$d['mark_barang'] = "";
			$d['mark_supplier'] = "";
			$d['mark_pembelian'] = "";
			$d['mark_penjualan'] = "";
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/bg_home");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function logout()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$this->session->sess_destroy();
			redirect("dashboard");
		}
		else
		{
			redirect("login");
		}
	}
}
