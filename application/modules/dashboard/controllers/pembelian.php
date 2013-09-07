<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pembelian extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{
			//inisialisasi menu
			$d['mark_dashboard'] = "";
			$d['mark_pengguna'] = "";
			$d['mark_kategori'] = "";
			$d['mark_barang'] = "";
			$d['mark_supplier'] = "";
			$d['mark_pembelian'] = "active";
			$d['mark_penjualan'] = "";
			
			//ambil data dari model
			$d['supplier'] = $this->db->get("supplier");
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_temp_pembelian();
			$d['nomorTransaksi'] = $this->app_load_data_model->getMaxKode("pembelian","6","BL");
			$d['cek'] = $this->db->get("tmp_pembelian")->num_rows();
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pembelian/bg_home");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			//arahkan ke halaman login
			redirect("login");
		}
	}

	function tambah_item()
	{
		if($this->session->userdata("logged_in")!="")
		{
			//masukkan data POST ke dalam variabel array
			$cek = $this->db->get_where("barang",array("kd_barang"=>$_POST['kd_barang']))->num_rows();
			if($cek==0){
				$this->session->set_flashdata("salah","Kode barang tidak ditemukan");
				redirect("dashboard/pembelian");
			}
			else
			{
				$dt['kd_barang'] = $_POST['kd_barang'];
				$dt['qty'] = $_POST['qty'];
				$dt['userid'] = $this->session->userdata("username");

				//masukkan data ke dalam tabel
				$this->db->insert("tmp_pembelian",$dt);
				redirect("dashboard/pembelian");
			}
			
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
			$d['no_pembelian'] = $this->app_load_data_model->getMaxKode("pembelian","6","BL");
			$d['tgl_transaksi'] = $_POST['tgl_transaksi'];
			$d['catatan'] = $_POST['catatan'];
			$d['kd_supplier'] = $_POST['kd_supplier'];
			$d['userid'] = $this->session->userdata("username");
			//masukkan data ke dalam tabel
			$this->db->insert("pembelian",$d);

			//ambil data dari tabel temporary
			$get = $this->db->get("tmp_pembelian");
			foreach($get->result() as $g)
			{
				$dt['no_pembelian'] = $d['no_pembelian'];
				$dt['kd_barang'] = $g->kd_barang;
				$dt['harga_beli'] = $g->harga_beli;
				$dt['jumlah'] = $g->qty;
				//masukkan data ke dalam tabel
				$this->db->insert("pembelian_item",$dt);
				$this->db->query("update barang set stok=stok+".$g->qty." where kd_barang='".$g->kd_barang."'");
			}
			$this->db->truncate('tmp_pembelian'); 
			
			redirect("dashboard/pembelian");
			
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
			$this->db->delete("tmp_pembelian",$id);
			redirect("dashboard/pembelian");
		}
		else
		{
			redirect("login");
		}
	}
}
