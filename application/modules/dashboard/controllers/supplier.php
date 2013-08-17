<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class supplier extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			//inisialisasi menu
			$d['mark_dashboard'] = "";
			$d['mark_pengguna'] = "";
			$d['mark_kategori'] = "";
			$d['mark_barang'] = "";
			$d['mark_supplier'] = "active";
			$d['mark_pembelian'] = "";
			$d['mark_penjualan'] = "";
			
			//ambil data dari model
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_supplier($GLOBALS['site_limit_medium'],$uri);
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/supplier/bg_home");
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
			$d['mark_barang'] = "";
			$d['mark_supplier'] = "active";
			$d['mark_pembelian'] = "";
			$d['mark_penjualan'] = "";
			
			//inisialisai variabel di view
			$d['id_param'] = "";
			$d['nm_supplier'] = "";
			$d['alamat'] = "";
			$d['telpon'] = "";

			$d['st'] = "tambah";
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/supplier/bg_input");
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
			$d['mark_barang'] = "";
			$d['mark_supplier'] = "active";
			$d['mark_pembelian'] = "";
			$d['mark_penjualan'] = "";
			
			//ambil data dari parameter method
			$id['kd_supplier'] = $id_param;
			//ambil data ke tabel
			$get = $this->db->get_where("supplier",$id)->row();
			//fetch data ke dalam variabel array
			$d['id_param'] = $get->kd_supplier;
			$d['nm_supplier'] = $get->nm_supplier;
			$d['alamat'] = $get->alamat;
			$d['telpon'] = $get->telpon;

			$d['st'] = "edit";
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/supplier/bg_input");
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
			$id['kd_supplier'] = $_POST['id_param'];
			$dt['nm_supplier'] = $_POST['nm_supplier'];
			$dt['alamat'] = $_POST['alamat'];
			$dt['telpon'] = $_POST['telpon'];
			$st = $_POST['st'];
			
			//jika status form = tambah
			if($st=="tambah")
			{
				//masukkan data ke dalam tabel
				$dt['kd_supplier'] = $this->app_load_data_model->getMaxKode("supplier","3","S");
				$this->db->insert("supplier",$dt);
				redirect("dashboard/supplier");
			}
			//jika status form edit
			else if($st=="edit")
			{
				$this->db->update("supplier",$dt,$id);

				redirect("dashboard/supplier");
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
			redirect("dashboard/supplier");
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
			$id['kd_supplier'] = $id_param;
			//hapus data di dalam tabel
			$this->db->delete("supplier",$id);
			redirect("dashboard/supplier");
		}
		else
		{
			redirect("login");
		}
	}
}
