<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kategori extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			//inisialisasi menu
			$d['mark_dashboard'] = "";
			$d['mark_pengguna'] = "";
			$d['mark_kategori'] = "active";
			$d['mark_barang'] = "";
			$d['mark_supplier'] = "";
			$d['mark_pembelian'] = "";
			$d['mark_penjualan'] = "";
			
			//ambil data dari model
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_kategori($GLOBALS['site_limit_medium'],$uri);
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/kategori/bg_home");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			//arahkan ke halaman login
			redirect("login");
		}
	}

	function tambah()
	{
		if($this->session->userdata("logged_in")!="")
		{
			//inisialisasi menu
			$d['mark_dashboard'] = "";
			$d['mark_pengguna'] = "";
			$d['mark_kategori'] = "active";
			$d['mark_barang'] = "";
			$d['mark_supplier'] = "";
			$d['mark_pembelian'] = "";
			$d['mark_penjualan'] = "";
			
			//inisialisai variabel di view
			$d['id_param'] = "";
			$d['nm_kategori'] = "";

			$d['st'] = "tambah";
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/kategori/bg_input");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function edit($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			//inisialisasi menu
			$d['mark_dashboard'] = "";
			$d['mark_pengguna'] = "";
			$d['mark_kategori'] = "active";
			$d['mark_barang'] = "";
			$d['mark_supplier'] = "";
			$d['mark_pembelian'] = "";
			$d['mark_penjualan'] = "";
			
			//ambil data dari parameter method
			$id['kd_kategori'] = $id_param;
			//ambil data ke tabel
			$get = $this->db->get_where("kategori",$id)->row();
			//fetch data ke dalam variabel array
			$d['id_param'] = $get->kd_kategori;
			$d['nm_kategori'] = $get->nm_kategori;

			$d['st'] = "edit";
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/kategori/bg_input");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function simpan()
	{
		if($this->session->userdata("logged_in")!="")
		{
			//masukkan data POST ke dalam variabel array
			$id['kd_kategori'] = $_POST['id_param'];
			$dt['nm_kategori'] = $_POST['nm_kategori'];
			$st = $_POST['st'];
			
			//jika status form = tambah
			if($st=="tambah")
			{
				//masukkan data ke dalam tabel
				$dt['kd_kategori'] = $this->app_load_data_model->getMaxKode("kategori","3","K");
				$this->db->insert("kategori",$dt);
				redirect("dashboard/kategori");
			}
			//jika status form edit
			else if($st=="edit")
			{
				$this->db->update("kategori",$dt,$id);

				redirect("dashboard/kategori");
			}
		}
		else
		{
			redirect("login");
		}
	}

	function set()
	{
		if($this->session->userdata("logged_in")!="")
		{
			//ambil dan masukkan data ke variabel array
			$set['key'] = $_POST['key'];
			//set session untuk pencarian data
			$this->session->set_userdata($set);
			redirect("dashboard/kategori");
		}
		else
		{
			redirect("login");
		}
	}

	function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			//ambil data dari parameter 
			$id['kd_kategori'] = $id_param;
			//hapus data di dalam tabel
			$this->db->delete("kategori",$id);
			redirect("dashboard/kategori");
		}
		else
		{
			redirect("login");
		}
	}
}
