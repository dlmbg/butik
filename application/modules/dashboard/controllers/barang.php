<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class barang extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			//inisialisasi menu
			$d['mark_dashboard'] = "";
			$d['mark_pengguna'] = "";
			$d['mark_kategori'] = "";
			$d['mark_barang'] = "active";
			$d['mark_supplier'] = "";
			$d['mark_pembelian'] = "";
			$d['mark_penjualan'] = "";
			
			//ambil data dari model
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_barang($GLOBALS['site_limit_medium'],$uri);
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/barang/bg_home");
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
			$d['mark_kategori'] = "";
			$d['mark_barang'] = "active";
			$d['mark_supplier'] = "";
			$d['mark_pembelian'] = "";
			$d['mark_penjualan'] = "";
			
			//inisialisai variabel di view
			$d['id_param'] = "";
			$d['nm_barang'] = "";
			$d['harga_beli'] = "";
			$d['harga_jual'] = "";
			$d['diskon'] = "";
			$d['stok'] = "";
			$d['keterangan'] = "";
			$d['kd_kategori'] = "";

			$d['kategori'] = $this->db->get("kategori");

			$d['st'] = "tambah";
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/barang/bg_input");
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
			$d['mark_kategori'] = "";
			$d['mark_barang'] = "active";
			$d['mark_supplier'] = "";
			$d['mark_pembelian'] = "";
			$d['mark_penjualan'] = "";
			
			//ambil data dari parameter method
			$id['kd_barang'] = $id_param;
			//ambil data ke tabel
			$get = $this->db->get_where("barang",$id)->row();
			//fetch data ke dalam variabel array
			$d['id_param'] = $get->kd_barang;
			$d['nm_barang'] = $get->nm_barang;
			$d['harga_beli'] = $get->harga_beli;
			$d['harga_jual'] = $get->harga_jual;
			$d['diskon'] = $get->diskon;
			$d['stok'] = $get->stok;
			$d['keterangan'] = $get->keterangan;
			$d['kd_kategori'] = $get->kd_kategori;

			$d['kategori'] = $this->db->get("kategori");

			$d['st'] = "edit";
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/barang/bg_input");
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
			$id['kd_barang'] = $_POST['id_param'];
			$dt['nm_barang'] = $_POST['nm_barang'];
			$dt['harga_beli'] = $_POST['harga_beli'];
			$dt['harga_jual'] = $_POST['harga_jual'];
			$dt['diskon'] = $_POST['diskon'];
			$dt['stok'] = $_POST['stok'];
			$dt['keterangan'] = $_POST['keterangan'];
			$dt['kd_kategori'] = $_POST['kd_kategori'];
			$st = $_POST['st'];
			
			//jika status form = tambah
			if($st=="tambah")
			{
				//masukkan data ke dalam tabel
				$dt['kd_barang'] = $this->app_load_data_model->getMaxKode("barang","4","B");
				$this->db->insert("barang",$dt);
				redirect("dashboard/barang");
			}
			//jika status form edit
			else if($st=="edit")
			{
				$this->db->update("barang",$dt,$id);

				redirect("dashboard/barang");
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
			redirect("dashboard/barang");
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
			$id['kd_barang'] = $id_param;
			//hapus data di dalam tabel
			$this->db->delete("barang",$id);
			redirect("dashboard/barang");
		}
		else
		{
			redirect("login");
		}
	}
}
