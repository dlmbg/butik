<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengguna extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			//inisialisasi menu
			$d['mark_dashboard'] = "";
			$d['mark_pengguna'] = "active";
			$d['mark_kategori'] = "";
			$d['mark_barang'] = "";
			$d['mark_supplier'] = "";
			$d['mark_pembelian'] = "";
			$d['mark_penjualan'] = "";
			
			//ambil data dari model
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_pengguna($GLOBALS['site_limit_medium'],$uri);
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pengguna/bg_home");
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
			$d['mark_pengguna'] = "active";
			$d['mark_kategori'] = "";
			$d['mark_barang'] = "";
			$d['mark_supplier'] = "";
			$d['mark_pembelian'] = "";
			$d['mark_penjualan'] = "";
			
			//inisialisai variabel di view
			$d['id_param'] = "";
			$d['nama_user'] = "";
			$d['username'] = "";
			$d['st'] = "tambah";
			$d['level'] = "";
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pengguna/bg_input");
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
			$d['mark_pengguna'] = "active";
			$d['mark_kategori'] = "";
			$d['mark_barang'] = "";
			$d['mark_supplier'] = "";
			$d['mark_pembelian'] = "";
			$d['mark_penjualan'] = "";
			
			//ambil data dari parameter method
			$id['id'] = $id_param;
			//ambil data ke tabel
			$get = $this->db->get_where("user_login",$id)->row();
			//fetch data ke dalam variabel array
			$d['id_param'] = $get->id;
			$d['username'] = $get->userid;
			$d['nama_user'] = $get->nama;
			$d['level'] = $get->level;
			$d['st'] = "edit";
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pengguna/bg_input");
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
			$id['id'] = $_POST['id_param'];
			$dt['userid'] = $_POST['username'];
			$dt['nama'] = $_POST['nama_user'];
			$dt['level'] = $_POST['level'];
			$st = $_POST['st'];
			
			//jika status form = tambah
			if($st=="tambah")
			{
				//gabungkan POST field password dengan key login dari tabel
				$dt['password'] = md5($_POST['password'].$GLOBALS['key_login']);
				//masukkan data ke dalam tabel user
				$this->db->insert("user_login",$dt);
				redirect("dashboard/pengguna");
			}
			//jika status form edit
			else if($st=="edit")
			{
				//jika field password kosong
				if(empty($_POST['password']))
				{
					//update data tanpa mengubah password
					$this->db->update("user_login",$dt,$id);
				}
				//jika field password tidak kosong
				else
				{
					//gabungkan POST field password dengan key login dari tabel
					$dt['password'] = md5($_POST['password'].$GLOBALS['key_login']);
					//update data ke tabel
					$this->db->update("user_login",$dt,$id);
				}
				redirect("dashboard/pengguna");
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
			redirect("dashboard/pengguna");
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
			$id['id'] = $id_param;
			//hapus data di dalam tabel
			$this->db->delete("user_login",$id);
			redirect("dashboard/pengguna");
		}
		else
		{
			redirect("login");
		}
	}
}
