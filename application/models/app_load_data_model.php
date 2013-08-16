<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 * @keterangan : Model untuk fetching data
	 **/
	 
	public function indexs_data_pelanggan($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Nama Pelanggan</th>
					  <th>Alamat</th>
					  <th>Jenis Pelanggan</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
		
		$where['nama_pelanggan']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("dlmbg_pelanggan");
		$config['base_url'] = base_url() . 'dashboard/pelanggan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("kode_pelanggan","DESC")->get("dlmbg_pelanggan",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td>'.$g->alamat_pelanggan.'</td>
					<td class="center">'.$g->jenis.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/pelanggan/edit/'.$g->kode_pelanggan.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pelanggan/hapus/'.$g->kode_pelanggan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_pengguna($limit,$offset)
	{
		//inisialiasi variabel
		$hasil = "";
		//gabungkan dengan tag html
		//tag html untuk membuat tabel
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Nama Pengguna</th>
					  <th>Username</th>
					  <th>Level</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';

		//get data dari session. untuk pencarian
		$where['nama']  = $this->session->userdata("key"); 
		//hitung total data untuk paging
		$tot_hal = $this->db->like($where)->get("user_login");

		//konfigurasi paging
		$config['base_url'] = base_url() . 'dashboard/pengguna/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("id","DESC")->get("user_login",$limit,$offset);
		$i=$offset+1;

		//fetching data dari database
		foreach($get->result() as $g)
		{
			//gabungkan dengan variabel yang sudah didefiniskan di awal
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->nama.'</td>
					<td class="center">'.$g->userid.'</td>
					<td class="center">'.$g->level.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/pengguna/edit/'.$g->id.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pengguna/hapus/'.$g->id.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		//gabungkan dengan navigasi paging
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_kategori($limit,$offset)
	{
		//inisialiasi variabel
		$hasil = "";
		//gabungkan dengan tag html
		//tag html untuk membuat tabel
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Nama Kategori</th>
					  <th>Jumlah Barang</th>
				  </tr>
			  </thead>';

		//get data dari session. untuk pencarian
		$where['nm_kategori']  = $this->session->userdata("key"); 

		//hitung total data untuk paging
		$tot_hal = $this->db->like($where)->get("kategori");

		//konfiguras pagung
		$config['base_url'] = base_url() . 'dashboard/kategori/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);

		//mengambil data kategori dengan limit
		$get = $this->db->query("SELECT kategori.*, (SELECT COUNT(*) FROM barang WHERE barang.kd_kategori=kategori.kd_kategori) As qty_barang
					FROM kategori where nm_kategori like '%".$where['nm_kategori']."%' ORDER BY kd_kategori ASC LIMIT ".$offset.",".$limit." ");
		$i = $offset+1;

		//fetching data
		foreach($get->result() as $g)
		{
			//gabungkan dengan variabel yang sudah didefiniskan di awal
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->nm_kategori.'</td>
					<td class="center">'.$g->qty_barang.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/kategori/edit/'.$g->kd_kategori.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/kategori/hapus/'.$g->kd_kategori.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		//tampilkan penomoran paging
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_barang($limit,$offset)
	{
		//inisialiasi variabel
		$hasil = "";
		//gabungkan dengan tag html
		//tag html untuk membuat tabel
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Kode</th>
					  <th>Nama Barang</th>
					  <th>Beli (Rp.)</th>
					  <th>Jual (Rp.)</th>
					  <th>Disc (%)</th>
				  </tr>
			  </thead>';

		//get data dari session. untuk pencarian
		$where['nm_barang']  = $this->session->userdata("key"); 

		//hitung total data untuk paging
		$tot_hal = $this->db->like($where)->get("barang");

		//konfiguras pagung
		$config['base_url'] = base_url() . 'dashboard/barang/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);

		//mengambil data kategori dengan limit
		$get = $this->db->query("SELECT * FROM barang where nm_barang like '%".$where['nm_barang']."%' ORDER BY kd_barang ASC LIMIT ".$offset.",".$limit." ");
		$i = $offset+1;

		//fetching data
		foreach($get->result() as $g)
		{
			//gabungkan dengan variabel yang sudah didefiniskan di awal
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->kd_barang.'</td>
					<td>'.$g->nm_barang.'</td>
					<td>'.$g->harga_beli.'</td>
					<td>'.$g->harga_jual.'</td>
					<td>'.$g->diskon.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/barang/edit/'.$g->kd_barang.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/barang/hapus/'.$g->kd_barang.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		//tampilkan penomoran paging
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_sistem($limit,$offset)
	{
		$hasil="";
		$where['title']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("dlmbg_setting");

		$config['base_url'] = base_url() . 'dashboard/sistem/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like($where)->get("dlmbg_setting",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-bordered bootstrap-datatable datatable'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Setting System</th>
					<th>Type</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->title."</td>
					<td>".$h->tipe."</td>
					<td>";
			$hasil .= "<a href='".base_url()."dashboard/sistem/edit/".$h->id_setting."' class='btn btn-small'><i class='icon-edit'></i> Edit</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	
	
	
	
	public function getMaxKode($tabel,$panjang,$key)
	{
		//ambil field dari tabel
		$fields = $this->db->list_fields($tabel);

		//hitung panjang tanpa key
		$loop = $panjang-1;
		//ambil nilai maksimal
		$q = $this->db->query("select MAX(RIGHT(".$fields[0].",".$loop.")) as kd_max from ".$tabel." ");
		$kd = "";
		//jika hasil fetch data lebih dari 0
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				//buat kode selanjutnya
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%0".$loop."s", $tmp);
			}
		}
		//jika masih kosong
		else
		{
			$temp_nol = "";
			for($i=1;$i<$loop;$i++)
			{
				//buat kode dengan urutan 1
				$temp_nol .= 0;
			}
			$kd = $temp_nol."1";
		}	
		return $key.$kd;
	}
}

/* End of file app_user_login_model.php */
/* Location: ./application/models/app_user_login_model.php */