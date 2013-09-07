<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penjualan extends CI_Controller {

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
			$d['mark_pembelian'] = "";
			$d['mark_penjualan'] = "active";
			
			//ambil data dari model
			$d['supplier'] = $this->db->get("supplier");
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_temp_penjualan();
			$d['nomorTransaksi'] = $this->app_load_data_model->getMaxKode("penjualan","6","JL");
			$d['cek'] = $this->db->get("tmp_penjualan")->num_rows();
			
			//load view
			//parsing data ke view
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/penjualan/bg_home");
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
				redirect("dashboard/penjualan");
			}
			else
			{
				//ambil harga diskon
				$g = $this->db->get_where("barang",array("kd_barang"=>$_POST['kd_barang']))->row();
				$harga_jual = $g->harga_jual-($g->harga_jual*$g->diskon/100);

				//masukkan data POST ke dalam variabel array
				$dt['userid'] = $this->session->userdata("username");
				$dt['kd_barang'] = $_POST['kd_barang'];
				$dt['qty'] = $_POST['qty'];
				$dt['harga_jual'] = $harga_jual;

				//masukkan data ke dalam tabel
				$this->db->insert("tmp_penjualan",$dt);
				redirect("dashboard/penjualan");
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
			$d['no_penjualan'] = $this->app_load_data_model->getMaxKode("penjualan","6","JL");
			$d['tgl_transaksi'] = $_POST['tgl_transaksi'];
			$d['catatan'] = $_POST['catatan'];
			$d['pelanggan'] = $_POST['pelanggan'];
			$d['userid'] = $this->session->userdata("username");
			//masukkan data ke dalam tabel
			$this->db->insert("penjualan",$d);

			//ambil data dari tabel temporary
			$get = $this->db->get("tmp_penjualan");
			foreach($get->result() as $g)
			{
				$dt['no_penjualan'] = $d['no_penjualan'];
				$dt['kd_barang'] = $g->kd_barang;
				$dt['harga_jual'] = $g->harga_jual;
				$dt['jumlah'] = $g->qty;
				//masukkan data ke dalam tabel
				$this->db->insert("penjualan_item",$dt);
				$this->db->query("update barang set stok=stok-".$g->qty." where kd_barang='".$g->kd_barang."'");
			}
			$this->db->truncate('tmp_penjualan'); 
			
			redirect("dashboard/penjualan/detail/".$d['no_penjualan']);
			
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
			$this->db->delete("tmp_penjualan",$id);
			redirect("dashboard/penjualan");
		}
		else
		{
			redirect("login");
		}
	}

	function detail($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$get = $this->db->get_where("penjualan",array("no_penjualan"=>$id_param))->row();
			$d['tgl_transaksi'] = $get->tgl_transaksi;
			$d['pelanggan'] = $get->pelanggan;

			$d['detail'] = $this->app_load_data_model->indexs_data_penjualan_nota($id_param);

 			$this->load->view($GLOBALS['site_theme']."/penjualan/nota_penjualan",$d);
		}
		else
		{
			redirect("login");
		}
	}
}
